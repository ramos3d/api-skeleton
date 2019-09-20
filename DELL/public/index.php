<?php

 error_reporting(E_ALL);
 ini_set('display_errors', 'On');
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require_once __DIR__. '/../vendor/autoload.php';

$app = new \Slim\App();



// Routes
require __DIR__. '/../src/routes/routes.php';

$app->run();
