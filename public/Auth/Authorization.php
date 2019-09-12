<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Tuupola\Middleware\HttpBasicAuthentication;
use Firebase\JWT\JWT;
require_once 'src/config/Db.php';
/**
 *
 */
class Authorization
{

    public function login($request, $response, array $args)
    {
        // $data = $request->getParsedBody();
        // $email = $data['email'];
        // $senha = $data['senha'];
        // return $response->write($email .' - '. $senha);

        $input = $request->getParsedBody();

        try{
            // Get DB Object
            $db = new db();
            $db = $db->connect();
            $sql = "SELECT * FROM users WHERE email= :email";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("email", $input['email']);

            $stmt->execute();

            $user = json_encode($stmt->fetchAll(PDO::FETCH_OBJ));

            return $user;


        } catch(PDOException $e){

            return '{"error": {"text": '.$e->getMessage().'}}';
        }
    }

}
