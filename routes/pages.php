<?php 


use App\Controller\Pages;
use App\Http\Response;

//ROTA HOME
$obRouter->get('/', [
    function() {
        return new Response(200, Pages\Home::getHome());
    }
]);

//ROTA HOME
$obRouter->get('/sobre', [
    function() {
        return new Response(200, Pages\Sobre::getSobre());
    }
]);

//ROTA DINAMICA
$obRouter->get('/pagina/{idPagina}', [
    function($idPagina) {
        return new Response(200, 'Pagina '.$idPagina);
    }
]);