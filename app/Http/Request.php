<?php

namespace App\Http;

class Request
{
    public function __construct()
    {
        // CONSTRUCTOR PROMOTION
        $this->queryParams  = $_GET ?? [];                      // Parâmetros da URL ($_GET)
        $this->postVars     = $_POST ?? [];                     // Váriaveis recebidas do post da página ($_POST)
        $this->headers      = getallheaders();                  // Cabeçalho da requisição
        $this->httpMethod   = $_SERVER['REQUEST_METHOD'] ?? ''; // Método HTTP da requisição
        $this->uri          = $_SERVER['REQUEST_URI']?? '';     // URI da página
    }

    /**
     * Método responsável por retornar o método HTTP da requisição
     *
     * @return string
     */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    /**
     * Método responsável por retornar a URI da requisição
     *
     * @return string
     */
    public function getURI()
    {
        return $this->uri;
    }

    /**
     * Método responsável por retornar os headers da página
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Método responsável por retornar os Parâmetros da URL ($_GET)
     *
     * @return array
     */
    public function getqueryParams()
    {
        return $this->queryParams;
    }

    /**
     * Método responsável por retornar os Parâmetros da URL ($_POST)
     *
     * @return void
     */
    public function getPostVars()
    {
        return $this->postVars;
    }
}