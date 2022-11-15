<?php
if (PHP_SAPI != 'cli') {
    exit ('Rodar via CLI');
}

require __DIR__ . '/vendor/autoload.php';

// Instantiate the app
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/src/dependencies.php';

$db = $container->get('db');

$schema = $db->schema();
$tabela = 'alunos';

/*
$schema->dropIfExists($tabela);

$schema->create($tabela, function($table){
    
    $table->increments('id');
    $table->string('nome', 30);
    $table->string('email', 30);
    $table->timestamps();
    
});

//Preenche a tabela
$db->table($tabela)->insert([
    'nome' => 'Gabriel Medeiros',
    'email' => 'gabriel@gmail.com',
    'created_at' => '2019-10-22',
    'updated_at' => '2019-10-22'
]);

//Preenche a tabela
$db->table($tabela)->insert([
    'nome' => 'Pedro Lucas',
    'email' => 'pedro@gmail.com',
    'created_at' => '2020-01-10',
    'updated_at' => '2030-01-10'
]);

*/