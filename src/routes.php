<?php
use Slim\Http\Request;
use Slim\Http\Response;
use \Firebase\JWT\JWT;
use \Slim\Views\PhpRenderer;

$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer(__DIR__ .'/../templates/');
};

$app->get('/', function (Request $request, Response $response) {
    // $response->getBody()->write("Hello home");
     // return $response;

    return $this->view->render($response, 'index.phtml');
});

$app->post('/login', function (Request $request, Response $response, array $args) {

    $input = $request->getParsedBody();
    $sql = "SELECT * FROM users WHERE email= :email";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("email", $input['email']);
    $sth->execute();
    $user = $sth->fetchObject();

    // verify email address.
    if(!$user) {
        return $this->response->withJson(['error' => true, 'message' => 'These credential does not match our records.']);
    }

    // verify password.
    $md5 = md5($input['password']);
    if ($md5 != $user->password) {

        return $this->response->withJson(['error' => true, 'message' => 'These credential does not match our records.']);
    }

    $settings = $this->get('settings'); // Get Settings Array.

    $token = JWT::encode([
        'id' => $user->id,
        'email' => $user->email
    ],
    $settings['jwt']['secret'], "HS256"
);

return $this->response->withJson(['token' => $token]);

});


$app->group('/api', function(\Slim\App $app) {

    $app->get('/user',function(Request $request, Response $response, array $args) {
        print_r($request->getAttribute('decoded_token_data'));

        /*output
        stdClass Object
        (
        [id] => 2
        [email] => arjunphp@gmail.com
        )

        */
    });

});
