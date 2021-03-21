<?php 

namespace App\Http;

class Request{
    /**
     * Metodo HTTP da requisição
     * @var string
     */
    private $httpMethod;

    /**
     * URI da pagina
     * @var string
     */
    private $uri;

    /**
     * Parametros da URL ($_GET)
     * @var array
     */
    private $queryParamans = [];

    /**
     * Variaveis recebidas no POST da pagina ($_POST)
     * @var array
     */
    private $postVars = [];

    /**
     * Cabeçalho da requisição
     * @var array 
     */ 
    private $headers;


    public function __construct()
    {
        $this->queryParamans    = $_GET ?? [];
        $this->postVars         = $_POST ?? [];
        $this->headers          = getallheaders();
        $this->httpMethod       = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri              = $_SERVER['REQUEST_URI'] ?? '';
    }

    

    /**
     * Metodo responsavel por retornar metodo http da requisição
     * @return string
     */
    public function getHttpMethod() {
        return $this->httpMethod;
    }



    /**
     * Metodo responsavel por retornar uri da requisição
     * @return string
     */
    public function getUri() {
        return $this->uri;
    }



    /**
     * Metodo responsavel por retornar parametros da requisição
     * @return string
     */
    public function getQueryParamns() {
        return $this->queryParamans;
    }



    /**
     * Metodo responsavel por retornar variaveis recebidas no post da requisição
     * @return string
     */
    public function getPostVars() {
        return $this->postVars;
    }



/**
     * Metodo responsavel por retornar headers da requisição
     * @return string
     */
    public function getHeaders() {
        return $this->headers;
    }



}