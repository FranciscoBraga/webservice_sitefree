<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Site;

// Routes
$app->group('/api/v1', function(){

    $this->get('/sites/lista', function($request, $response){
            $sites = Site::get();
            return $response->withJson( $sites);
    });

    //adicionado site 
    $this->post('/sites/adiciona' , function($request, $response){

        $dados = $request->getParsedBody();
        $sites = Site::create($dados);
        return $response->withJson($sites);
    });
    //retornando site pelo id
    $this->get('/sites/lista/{id}', function($request, $response, $args){
        $sites = Site::findOrFail($args['id']);
        return $response->withJson($sites);
    });

    //atualizado site pelo id
    $this->put('/sites/atualiza/{id}', function($request, $response, $args){

        $dados = $request->getParsedBody();
        $sites = Site::findOrFail($args['id']);
        $sites->update($dados);
        return $response->withJson($sites);
    });
      //remove site pelo id
    $this->get('/sites/remove/{id}', function($request, $response, $args){
        
        $sites = Site::findOrFail($args['id']);
        $sites->delete();
        return $response->withJson( $sites);
});
});


