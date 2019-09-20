<?php
namespace App\Controllers;

/**
 *
 */
class HomeController
{
    public function index($request, $response){

        //print_r(get_class_methods($response));
        return '[{"text" : "Home"}]';
    }
}
