<?php

require __DIR__ . '/vendor/autoload.php';

use App\Http\Router;
use App\Utils\View;

define('URL', 'http://localhost/wdev/wdev-rotas');

// Define valor padrão das variaveis
View::init([
    'URL' => URL
]);

// Objeto da rota
$obRouter = new Router(URL);

// Imclui arquivo de rotas
include __DIR__.'/routes/pages.php';

// Imprime o response da rota
$obRouter->run()
         ->sendResponse();