<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Tuupola\Middleware\HttpBasicAuthentication;
use App\Controllers\HomeController;
use App\Controllers\AuthController;

require 'src/config/Database.php';


$app = new \Slim\App;
$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Hello home");
    return $response;
    //or
    //return $this->view->render($response, 'home.html');
});

$app->post('/', HomeController::class . ':index');

// This route requires JWT Authentication
$app->post('/auth', AuthController::class . ':login');

// This requires just a basic login & password to authenticate
$app->get('/api', function (Request $request, Response $response) {
    $response->getBody()->write("Welcome to the API section");
    return $response;
});

// Adding basic protection to path /api
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




$app->get('/all', function (Request $request, Response $response) {
    $sql = "SELECT * FROM users";
    try{
        // Get DB Object
        $db = new Database;
        // Connect
        $db = $db->connect();
        $stmt = $db->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($users);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});




/* testes */
