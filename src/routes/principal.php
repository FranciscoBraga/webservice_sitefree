<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\User;
use \Firebase\JWT\JWT;

$app->get('/api', function($request, $response){
    return $this->renderer->render($response, 'index.phtml');
});


