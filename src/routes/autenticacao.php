<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\User;
use App\Models\Site;
use \Firebase\JWT\JWT;

//
$app->get('/api/login', function($request, $response){
    
    return $this->renderer->render($response,'login.phtml');
});

$app->post('/api/token', function($request, $response){

    $dados  = $request->getParsedBody();

    $email = $dados['email'] ?? null;
    $senha = $dados['password'] ? md5($dados['password']) : null;

    $user = User::where('email', $email)->first();
  

    if(!is_null($user) && $senha === $user->password){

        $secretKey = $this->get('settings')['secretKey'];
        $chaveAcesso = JWT::encode($user, $secretKey);

        $sites = Site::get();
   
     
       return $this->renderer->render($response, 'lista.phtml',['value' => $response->withJson( $sites)]);

        
        // $response->withJSON([
        //     'chave' => $chaveAcesso
        // ]);
    }
     
    return $this->renderer->render($response, 'login.phtml',['error'=>' Não foi possivel logar']);
});