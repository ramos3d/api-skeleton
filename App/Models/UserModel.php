<?php
namespace App\Models;
/**
 *
 */

// require __DIR__ . '/../../src/config/Database.php';
// require 'src/config/Database.php';
// $d = new Database;
require 'src/config/Database.php';
class UserModel
{

    public function users($request, $data = NULL){



        //
        // try{
        //     // Get DB Object
        //     $db = new db();
        //     $db = $db->connect();
        //     $sql = "SELECT * FROM users WHERE email= :email";
        //     $stmt = $db->prepare($sql);
        //     $stmt->bindParam("email", $input['email']);
        //
        //     $stmt->execute();
        //
        //     $user = json_encode($stmt->fetchAll(PDO::FETCH_OBJ));
        //
        //     return $user;
        //
        //
        // } catch(PDOException $e){
        //
        //     return '{"error": {"text": '.$e->getMessage().'}}';
        // }


        // $sql = "SELECT * FROM users";
        // try{
        //     // Get DB Object
        //     $db = new Db;
        //     // // Connect
        //     //$db = $db->connect();
        //     // $stmt = $db->query($sql);
        //     // $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        //     // $db = null;
        //     // echo json_encode($users);
        // } catch(PDOException $e){
        //     echo '{"error": {"text": '.$e->getMessage().'}';
        // }


         var_dump($data);

         // return json_encode($input);
    }
}
