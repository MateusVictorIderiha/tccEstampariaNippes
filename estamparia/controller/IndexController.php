<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;

/**
 * Description of IndexController
 *
 * @author Mateus
 */
class IndexController {
    //put your code here
    private $controller;
    private $acao;
    const CAMINHO = '\\estamparia\\controller\\';
    
    public function formataCamelCase($naoFormatado) {
        $listaQuebrada = explode("_", $naoFormatado);
        foreach ($listaQuebrada as $parte) {
            $primeiraMaiuscula[] = ucfirst($parte);
        }
        $camelCase = implode("", $primeiraMaiuscula);
        return $camelCase;
    }
    
    public function removePrefixoCamelCase($pagina) {
        if(stristr($pagina, "wp_") !== false){
            $removePref = str_ireplace("wp_", "", $pagina);
            return $this->formataCamelCase($removePref);
        } else {
            return "Home";
        }
    }
    
    public function pegaController() {
        if(isset($_REQUEST["pagina"])){
            $pagina = $this->removePrefixoCamelCase($_REQUEST["pagina"]);
            if(class_exists(self::CAMINHO.$pagina."Controller")){
                $this->controller = self::CAMINHO.$pagina."Controller";
            } elseif($pagina == "Login" or $pagina == "Cadastrar" or $pagina == "BemVindo") {
                $this->controller = self::CAMINHO."Cliente"."Controller";
            } elseif($pagina == "Carrinho") {
                $this->controller = self::CAMINHO."Venda"."Controller";
            } else {
                $this->controller = self::CAMINHO."Home"."Controller";
            }
        } else {
            $this->controller = self::CAMINHO."Home"."Controller";
        }
    }
    
    public function pegaAcao() {
        if(isset($_REQUEST["acao"])){
            $camelCase = $this->formataCamelCase($_REQUEST["acao"]);
            $metodo = lcfirst($camelCase);
            if(method_exists($this->controller, $metodo)){
                $this->acao = $metodo;
            } else {
                $this->acao = "mostrarPagina";
            }
        } else {
            $this->acao = "mostrarPagina";
        }
    }
    
    public function carregarPagina() {
        $this->pegaController();
        if(isset($this->controller)){
            $this->pegaAcao();
            if(isset($this->acao)){
                $objPagina = new $this->controller;
                $metodo = $this->acao;
                $objPagina->$metodo();
            }
        }
    }
}
