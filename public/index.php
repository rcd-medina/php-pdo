<?php

use app\classes\URI;
use app\classes\Routes;

// ====================================================================================================
// Carrega classes e helpers.
// ====================================================================================================
require "../bootstrap.php";

// ====================================================================================================
// Estrutura que simula, de maneira bem simples, um sistema de rotas em PHP.
// ====================================================================================================
$routes = [
    '/public' => 'controllers/index.php'
];

$uri = URI::load();

//dd($uri);
require Routes::load($routes, $uri);


