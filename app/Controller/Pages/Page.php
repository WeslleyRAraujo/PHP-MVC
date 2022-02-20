<?php

namespace App\Controller\Pages;
use App\Utils\View;

class Page
{
    
    /**
     * Método responsável por retornar o header da página
     *
     * @return string
     */
    private static function getHeader() {
        return View::render('pages/header');
    }

    /**
     * Método responsável por retornar o footer da página
     *
     * @return string
     */
    private static function getFooter() {
        return View::render('pages/footer');
    }

    /**
     * Método responsável por retornar o conteúdo (view) da página genérica (template)
     * @param string $title, titulo da página
     * @param string $content, conteudo da página
     * @return string
     */
    public static function getPage(string $title , string $content)
    {
        return View::render('pages/page', [
            'title' => $title,
            'header' => self::getHeader(),
            'content' => $content,
            'footer' => self::getFooter()
        ]);
    }
}