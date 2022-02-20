<?php

namespace App\Http;
use \Closure;

class Router
{
    /**
     * URL Completa do projeto (raiz)
     *
     * @var string
     */
    private string $url;

    /**
     * Prefixo de todas as rotas
     *
     * @var string
     */
    private string $prefix = '';

    /**
     * Indice de rotas
     *
     * @var array
     */
    private array $routes = [];


    /**
     * Instância de Request
     *
     * @var Request
     */
    private Request $request;


    public function __construct($url)
    {
        $this->request  = new Request();
        $this->url      = $url;
        $this->setPrefix();
    }

    /**
     * Método responsável por definir o prefixo das rotas
     *
     */
    private function setPrefix()
    {
        // informações da URL Atual
        $parseUrl = parse_url($this->url);

        // definindo o prefixo
        $this->prefix = $parseUrl['path'] ?? '';
    }

    /**
     * Método responsável por adicionar uma rota na classe
     *
     * @param string $method
     * @param string $route
     * @param mixed $params
     * @return void
     */
    private function addRoute(string $method, string $route, mixed $params = [])
    {
        // Validação dos parâmetros
        foreach($params as $key => $value) {
            if($value instanceof Closure) {
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }
        echo "<pre>";
        print_r($params);
        echo "</pre>";

    }
    
    /**
     * Método responsável por definir uma rota de get
     *
     * @param string $route
     * @param mixed $params
     * @return void
     */
    public function get(string $route, mixed $params = [])
    {
        return $this->addRoute('GET', $route, $params);
    }

}