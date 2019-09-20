<?php
namespace App\Controllers;
use App\Models\UserModel;

/**
*
*/
class AuthController
{
    public function login($request, $response, $args){
        $data = [
            'user'     => 'Marcelo',
            'password' => '2006'
        ];
        $all = new UserModel();

        // var_dump($all->users($request, $response));
        $result = $all->users($request, $data);
        return $result;
        // return "ok";
    //print_r(get_class_methods($response));
    //return '[{"text" : "Login"}]';
    //return 'conttoler';
}
}
