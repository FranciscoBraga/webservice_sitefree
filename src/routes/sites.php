<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Site;

// Routes
$app->group('/api/v1', function(){

    $this->get('/sites', function($request, $response){
            $sites = Site::get();
            return $response->withJson( $sites);
    });

    //adicionado produto 
    $this->post('/sites/adicionando' , function(){

        $dados = $request->getParsedBody();
        $sites = Site::create($dados);
        return $response->withJson($sites);
    })
});


