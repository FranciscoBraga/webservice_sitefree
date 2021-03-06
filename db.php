<?php
if (PHP_SAPI != 'cli') {
       Exit('Rodar via cli');
    }

require __DIR__ . '/vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/src/dependencies.php';

$db = $container->get('db');
var_dump($db);
$schema = $db->schema();
//$tabela = 'sites';
$tabela = 'sites';

//criando coluna e  referenciando-a
$schema->table($tabela, function($table)
{
    $table->integer('id_user')->unsigned();
    $table->foreign('id_user')->references('id')->on('users');
});

 /* $schema->dropIfExists($tabela);

//cria tabela
$schema->create($tabela, function($table){
 
    $table->increments('id');
    $table->string('name', 120);
    $table->string('title', 250);
    $table->text('description');
    $table->string('pathImage', 200);
    $table->string('gitPath', 200);
    $table->string('sitePath', 200);
    $table->boolean('final');
    $table->timestamps();


});


$db->table($tabela)->insert([
   
    'name'  =>'site 1',
    'title' =>'site 1',
    'description'   =>'site 1',
    'pathImage' =>'img.jpg',
    'gitPath'   =>'site 1',
    'sitePath'  =>'site 1',
    'final' => true,
    'created_at' => '2019-1-23',
    'updated_at' => '2019-1-23'
]); 

$schema->dropIfExists($tabela);

$schema->create($tabela , function($table){
    $table->increments('id');
    $table->string('name', 150);
    $table->string('email',200);
    $table->string('password',32);
    $table->timestamps();

});

$db->table($tabela)->insert([

    'name'=> "Francisco",
    'email' => 'ico@ico.com',
    'password'=> md5('123456'),
    'created_at' => '2019-1-23',
    'updated_at' => '2019-1-23'
]); */
