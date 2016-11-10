<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view;

use estamparia\view\topoView;

/**
 * Description of EstruturaView
 *
 * @author Mateus
 */
class EstruturaView {
    //put your code here
    protected $topo;
    protected $rodape;
    protected $botoesTopo = array();
    protected $javascripts = array();
    protected $styles = array();
    
    public function __construct($configuracoesPagina = null) {
        $this->guardarStylesPadrao($configuracoesPagina);
        $this->guardarJavascriptsPadrao($configuracoesPagina);
        $this->guardarBotoesTopo();
        
        $objTopo = new topoView($this->botoesTopo, $this->javascripts, $this->styles);
        $this->topo = $objTopo->mostrarTopo();
    }
    
    public function guardarStylesPadrao($styles = null) {
        $stylevalor1["caminho"] = "bootstrap/css/bootstrap.css";
        $stylevalor1["media"] = "All";
        
        array_push($this->styles, $stylevalor1);
        if(isset($styles["style"]) and !empty($styles["style"])){
            foreach ($styles["style"] as $style) {
                array_push($this->styles, $style);
            }
        }
        
        $stylevalor2["caminho"] = "css/estilo.css";
        $stylevalor2["media"] = "All";
        
        array_push($this->styles, $stylevalor2);
    }
    
    public function guardarJavascriptsPadrao($javascript = null) {
        $javasriptValor1["caminho"] = "bootstrap/js/jquery.js";
        $javasriptValor2["caminho"] = "bootstrap/js/bootstrap.js";
        //cadastro, Home
        
        array_push($this->javascripts, $javasriptValor1);
        if(isset($javascript["javascript"]) and !empty($javascript["javascript"])){
            foreach ($javascript["javascript"] as $javascript) {
                array_push($this->javascripts, $javascript);
            } 
        }
        array_push($this->javascripts, $javasriptValor2);
        $javasriptValor4["caminho"] = "javascript.js"; //cadastro
        array_push($this->javascripts, $javasriptValor4);
    }

    public function guardarBotoesTopo() {
        $botaoValor1["caminho"] = "?pagina=home";
        $botaoValor1["nome"] = "Home";
        $botaoValor1["valor"] = "Home";
        $botaoValor2["caminho"] = "?pagina=pedidos";
        $botaoValor2["nome"] = "Pedidos";
        $botaoValor2["valor"] = "Pedidos";
        $botaoValor3["caminho"] = "?pagina=catalago";
        $botaoValor3["nome"] = "Catalago";
        $botaoValor3["valor"] = "Catálago";
        $botaoValor4["caminho"] = "?pagina=faleConosco";
        $botaoValor4["nome"] = "Contato";
        $botaoValor4["valor"] = "Contato";
        array_push($this->botoesTopo, $botaoValor1);
        array_push($this->botoesTopo, $botaoValor2);
        array_push($this->botoesTopo, $botaoValor3);
        array_push($this->botoesTopo, $botaoValor4);
    }
    
}
