<?php

// Application middleware
//
$app->add(new Tuupola\Middleware\JwtAuthentication([
    "header" => "X-Token",
    "regexp" => "/(.*)/",
    "path" => "/api",
    "ignore" => ["/api","/api/token",'/api/v1/sites/lista'],
    "secret" => $container->get('settings')['secretKey']
]));

//cors
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});
