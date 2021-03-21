<?php 

namespace App\Http;

class Response {
    /**
     * Codigo do Status HTTP
     * @var integer
     */
    private $httpCode = 200;

    /**
     * Cabeçalho do response
     * @var array
     */
    private $headers = [];

    /**
     * Tipo de conteudo que está sendo retornado
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Conteudo da Response
     * @var mixed
     */
    private $content;


    public function __construct($httpCode, $content, $contentType = 'text/html')
    {
        $this->httpCode     = $httpCode;
        $this->content      = $content;

        $this->setContentType($contentType);
    }  
    
    

    /**
     * Metodo responsavel por alterar o content type do response
     * @var string
     */
    public function setContentType($contentType)
    {
        $this->contentType  = $contentType;
        $this->addHeader('Content-type', $contentType);
    }



    /**
     * Adiciona registro ao cabeçalho da requisição
     * 
     */
    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }



    private function sendHeaders()
    {
        // STATUS
        http_response_code($this->httpCode);

        // ENVIAR HEADERS
        foreach($this->headers as $key => $value)
        {
            header($key.': '.$value);
        }
    }



    public function sendResponse() 
    {
        // ENVIAR OS HEADERS
        $this->sendHeaders();

        // IMPRIME CONTEUDO
        switch($this->contentType)
        {
            case 'text/html':
                echo $this->content;
                exit;
        }
    }


}