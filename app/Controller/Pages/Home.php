<?php

namespace App\Controller\Pages;
use App\Utils\View;
use App\Model\Entity\Organization;

class Home extends Page
{
    /**
     * Método responsável por retornar o conteúdo (view) da homepage
     *
     * @return string
     */
    public static function getHome()
    {
        $organization = new Organization();

        $content = View::render('pages/home', [
            'name' =>  $organization->name,
            'description' => 'Teste com MVC'
        ]);

        return parent::getPage('WeslleyRAraujo', $content);
    }
}