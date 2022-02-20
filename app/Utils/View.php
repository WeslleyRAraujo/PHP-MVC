<?php

namespace App\Utils;

class View
{

    /**
     * Método responsável por retornar o conteúdo da view
     *
     * @param string $view
     * @return string
     */
    private static function getContentView(string $view)
    {
        $file = __DIR__ . "/../../resources/view/{$view}.html";
        return file_exists($file) ?file_get_contents($file) : '';
    }

    /**
     * Método responsável por retornar o conteúdo renderizado da view
     *
     * @param string $view
     * @param array $vars (string/numerics)
     * @return string
     */
    public static function render(string $view, array $vars = [])
    {
        // conteúdo da view
        $contentView = self::getContentView($view);

        // chaves do array de variáveis
        $keys = array_keys($vars);
        $keys = array_map(function($item) {
            return "{{{$item}}}";
        }, $keys);

        // retorna o conteúdo renderizado
        return str_replace($keys, array_values($vars), $contentView);
    }
}