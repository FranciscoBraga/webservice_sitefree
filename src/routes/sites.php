<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->group('/api/v1', function(){

    $this->get('/sites', function($request, $response){
            return $response->withJson(['nome'=>'site 1']);
    });
});


