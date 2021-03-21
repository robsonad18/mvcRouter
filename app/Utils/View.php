<?php

namespace App\Utils;

class View
{
    /**
     * Variaveis padrões do projeto
     * @var array
     */
    private static $vars = [];


    /**
     * Metodo responsavel por definir os dados iniciais das classes
     * @param array
     */
    public static function init($vars = [])
    {
        self::$vars = $vars;
    }



    /**
     * Metodo responsavel por retornar o conteudo de uma view
     * @param mixed $view 
     * @return void 
     */
    private static function getContentsView(string $view)
    {
        $file = __DIR__ . '/../../resource/View/' . $view . '.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }


    /**
     * Metodo responsavel por retornar o conteudo renderizado
     * @param mixed $view 
     * @return void 
     */
    public static function render(string $view, array $vars = [])
    {
        // CONTEUDO DA VIEW
        $contentView = self::getContentsView($view);

        // MERGE DE VARIAVEIS DA VIEW
        $vars = array_merge(self::$vars, $vars);

        // CHAVES DO ARRAY DE VARIAVEIS
        $keys = array_keys($vars);
        $keys = array_map(function ($item) {
            return '{{' . $item . '}}';
        }, $keys);

        // Retorna o conteudo renderizado
        return str_replace($keys, array_values($vars), $contentView);
    }
}
