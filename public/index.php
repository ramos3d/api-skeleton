<?php
require __DIR__ . '/../vendor/autoload.php';
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Tuupola\Middleware\HttpBasicAuthentication;
use Firebase\JWT\JWT;

require 'Auth/Authorization.php';

//secretkey
$container['secretkey'] = "secretloko";

$app = new \Slim\App($container);


$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

// Token Exhibition
// $app->get('/auth', function (Request $request, Response $response) use ($app) {
//     $key = $this->get("secretkey");
//     $token = array(
//         "user" => "@fidelissauro",
//         "twitter" => "https://twitter.com/fidelissauro",
//         "github" => "https://github.com/msfidelis"
//     );
//     $jwt = JWT::encode($token, $key);
//     return $response->withJson(["auth-jwt" => $jwt], 200)
//         ->withHeader('Content-type', 'application/json');
// });


// $app->post('/auth', function ($request, $response, $args) : Response {
//         $data = $request->getParsedBody();
//
//         $email = $data['email'];
//         $senha = $data['senha'];
//         // $response->getBody()->write("Teste");
//         return $response->write($email . $senha);
// });
$app->post('/auth', Authorization::class . ':login');

$app->get('/', function ($request, $response) {
    $response->getBody()->write("Home");

    return $response;
});
$app->get('/api', function (Request $request, Response $response) {
    $response->getBody()->write("Welcome to the API section");
    return $response;
});

$app->add(new Tuupola\Middleware\HttpBasicAuthentication([
    "path" => "/api", /* or ["/admin", "/api"] */
    "realm" => "Protected",
    "users" => [
        "marcelo" => "123",
        "somebody" => "456"
    ],

    "after" => function ($response, $arguments) {
        return $response->withHeader("X-Brawndo", "plants crave");
    }
]));


$app->run();
