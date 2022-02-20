<?php

namespace App\Http;

class Response
{
    /**
     * código do status http
     *
     * @var int
     */
    private $httpCode = 200;

    /**
     * cabeçalho do response
     *
     * @var array
     */
    private $headers = [];

    /**
     * tipo de conteudo que está sendo retornado
     *
     * @var string
     */    
    private $contentType = 'text/html';

    /**
     * conteúdo do response
     *
     * @var mixed
     */
    private $content;

    public function __construct(string $httpCode,mixed $content, $contentType = 'text/html')
    {
        $this->httpCode = $httpCode;
        $this->content  = $content;
        $this->setContentType($contentType);
    }

    /**
     * Método responsável por alterar o content-type do response
     *
     * @param string $contentType
     * @return void
     */
    public function setContentType(string $contentType)
    {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /**
     * Método responsável por adicionar um registro no cabeçalho no response
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    public function addHeader(string $key, string $value)
    {
        $this->headers[$key] = $value;
    }


    /**
     * Método responsável por enviar os headers para o navegador
     *
     * @return void
     */
    private function sendHeaders()
    {
        
        http_response_code($this->httpCode); // status
        foreach($this->headers as $key => $value) {
            header("{$key}:{$value}");
        }
    }

    /**
     * Método responsável por enviar a reposta para o usuário
     *
     * @return void
     */
    public function sendResponse()
    {
        // Envia os Headers
        $this->sendHeaders();

        // Imprime o conteúdo
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                exit;
        }
    }

}