<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view\ADM\view;

use estamparia\view\ADM\view\TopoAdm;

/**
 * Description of EstruturaADM
 *
 * @author Mateus
 */
class EstruturaADM{
    //put your code here
    protected $javascripts = array();
    protected $styles = array();

    public function __construct($configuracoesPagina = null) {
        $this->guardarStylesPadrao($configuracoesPagina);
        $this->guardarJavascriptsPadrao($configuracoesPagina);
    }
    
    public function guardarStylesPadrao($styles = null) {

    }
    
    public function guardarJavascriptsPadrao($javascript = null) {
        /* $javasriptValor1["caminho"] = "../../bootstrap/js/jquery.js";
         $javasriptValor4["caminho"] = "../../bootstrap/js/validate/dist/jquery.validate.js";
        $javasriptValor2["caminho"] = "../../bootstrap/jquery-ui/jquery-ui.js";
        $this->javascripts[] = $javasriptValor1;
        $this->javascripts[] = $javasriptValor4;
        $this->javascripts[] = $javasriptValor2;
        
        array_push($this->javascripts, $javasriptValor1);
        if(isset($javascript["javascript"]) and !empty($javascript["javascript"])){
            foreach ($javascript["javascript"] as $javascript) {
                array_push($this->javascripts, $javascript);
            } 
        }

        $javasriptValor3["caminho"] = "../../javascript.js";
        $this->javascripts[] = $javasriptValor3;*/
    }
    
    public function mostrarTopo() {
        $objTopoAdm = new \estamparia\view\adm\view\TopoAdm($this->javascripts, $this->styles);
        $objTopoAdm->mostrarTopo();
    }
    
}