<?php

namespace App\Controller\Pages;

use App\Utils\View;

use App\Model\Entity\Organization;

class Sobre extends Page
{
    /**
     * METDDO RESPONSAVEL POR RETORNAR O CONTEUDO DA PAGINA SOBRE
     * 
     * @var App\Controller\Pages\funciton
     */
    public static function getSobre()
    {
        $content = View::render('pages/sobre', [
            'name'         => 'Pagina de sobre',
        ]);

        return parent::getPage('SOBRE > WDEV', $content);
    }
}
