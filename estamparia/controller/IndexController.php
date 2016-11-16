<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;

/**
 * Description of indexController
 *
 * @author Mateus
 */

class IndexController {
    const CAMINHO = 'estamparia\\controller\\';
    protected $controller;
    protected $acao;
    //put your code here

    public function formata($texto){
        $textoQeubrado = explode("_", $texto);
        foreach ($textoQeubrado as $parte) {
            $maiusculo = ucfirst($parte);
            $todo[] = $maiusculo;
        }
        return $todo;
    }
    
    public function formataPagina($texto){
        if(stristr($texto, "wp_") !== false){
            $semPref = str_ireplace("wp_", "", $texto);
            $lista = $this->formata($semPref);
            return implode("", $lista);
        } else {
            return "Home";
        }
    }
    
    public function pegaController() {
       if(isset($_REQUEST["pagina"])){
           $pagina = $this->formataPagina($_REQUEST["pagina"]);
            switch ($pagina) {
                case ("Pedidos"):
                case ("Catalago"):
                case ("FaleConosco"):
                case ("Home"):
                case ("Sobre"):
                    $this->controller = self::CAMINHO.$pagina.'Controller';
                    break;
                case ("Cadastrar"):
                case ("Login"):
                    $this->controller = self::CAMINHO.'Cliente'.'Controller';
                    break;
            } 
        } elseif(empty($_REQUEST["pagina"])) {
            $this->controller = self::CAMINHO.'Home'.'Controller';
        } 
    }
    
    public function pegaAcao() {
        if(isset($_REQUEST["acao"])){
            $listaAcao = $this->formata($_REQUEST["acao"]);
            $acaoMaiusculo = implode("", $listaAcao);
            $acao = lcfirst($acaoMaiusculo);
            $this->acao = $acao;
        } else {
            $this->acao = 'mostrarPagina';
        }
    }
    
    public function paginasMenu() {
        $this->pegaController();
        $this->pegaAcao();
        
        $obj = new $this->controller();
        $obj->$this->acao();
        
    }
}
