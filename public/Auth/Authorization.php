<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Tuupola\Middleware\HttpBasicAuthentication;
use Firebase\JWT\JWT;
/**
 *
 */
class Authorization
{

    public function login($request, $response, array $args) : Response
    {
        $data = $request->getParsedBody();
        $response->getBody()->write("Teste");
        return $response;
    }
}
