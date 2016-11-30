<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view;

use estamparia\view\topoView;
use estamparia\view\rodapeView;
use estamparia\model\ClienteModel;

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
        $this->guardarBotoesTopo($configuracoesPagina);
    }
    public function addCaminho($antigoCaminho = null) {
        $novocaminho = $this->getCaminho().$antigoCaminho;
        return $novocaminho;
    }
    
    public function getCaminho() {
        return $this->caminho;
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
        
        array_push($this->javascripts, $javasriptValor1);
        if(isset($javascript["javascript"]) and !empty($javascript["javascript"])){
            foreach ($javascript["javascript"] as $javascript) {
                array_push($this->javascripts, $javascript);
            } 
        }
        array_push($this->javascripts, $javasriptValor2);
        $javasriptValor4["caminho"] = "javascript.js"; 
        array_push($this->javascripts, $javasriptValor4);
    }

    public function guardarBotoesTopo($botoes = null) {
        $botaoValor1["caminho"] = "?pagina=wp_home";
        $botaoValor1["nome"] = "home";
        $botaoValor1["valor"] = "HOME";
        
        $botaoValor2["caminho"] = "?pagina=wp_pedidos";
        $botaoValor2["nome"] = "pedidos";
        $botaoValor2["valor"] = "PEDIDOS";
        
        $botaoValor3["caminho"] = "?pagina=wp_produto";
        $botaoValor3["nome"] = "catalogo";
        $botaoValor3["valor"] = "CATÁLOGO";
        
        $botaoValor4["caminho"] = "?pagina=wp_contato";
        $botaoValor4["nome"] = "contato";
        $botaoValor4["valor"] = "CONTATO";
        
        $botaoValor5["caminho"] = "?pagina=wp_sobre";
        $botaoValor5["nome"] = "sobre";
        $botaoValor5["valor"] = "SOBRE";
        
        array_push($this->botoesTopo, $botaoValor1);
        array_push($this->botoesTopo, $botaoValor2);
        array_push($this->botoesTopo, $botaoValor3);
        array_push($this->botoesTopo, $botaoValor4);
        array_push($this->botoesTopo, $botaoValor5);
        
        if(isset($botoes["botao"]) and !empty($botoes["botao"])){
            foreach ($botoes["botao"] as $botao) {
                array_push($this->botoesTopo, $botao);
            } 
        }
    }
    
    public function mostrarTopo() {
        $objTopo = new topoView($this->botoesTopo, $this->javascripts, $this->styles);
        $objCliente = new ClienteModel();
        if($objCliente->verificaLoginSessao() or $objCliente->verificaLoginCookie()){
            $minhaConta = 
                    //"<a href='?pagina=wp_login&acao=mostrar_bem_vindo'> MINHA CONTA</a>"
                    //. "<ul>"
                   // . "     <li>"
                   //. "         <a href='#'>Editar Perfil</a>"
                    //. "         <a href='#'>Compras efetuadas</a>"
                    //. "         <a href='#'>Meus Pedidos</a>".
                     "         <a class='font15px' href='?pagina=wp_login&acao=sair'>Sair da Conta</a>";
                    //. "     </lu>"
                    //. "</ul>";
            $objTopo->setMinhaConta($minhaConta);
        }
        $this->topo = $objTopo->mostrarTopo();
    }
    
    public function mostrarRodape() {
        $botaoValor5["caminho"] = "?pagina=wp_Login";
        $botaoValor5["nome"] = "Cliente";
        $botaoValor5["valor"] = "LOGIN";
                
        $botoes = $this->botoesTopo;
        $botoes[] = $botaoValor5;
        
        $objRodape = new rodapeView($botoes);
        $objRodape->mostrarRodape();
    }
}
