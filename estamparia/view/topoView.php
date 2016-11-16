<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view;

use estamparia\model\ClienteModel;

/**
 * Description of topoView
 *
 * @author Mateus
 */
class topoView {

    //put your code here
    protected $botoes = array();
    protected $javascripts = array();
    protected $styles = array();
    protected $minhaConta = "<a href='?pagina=wp_login'> LOGIN | CRIE SUA CONTA</a>";

    public function __construct($botoes, $javascripts, $styles) {
        $this->botoes = $botoes;
        $this->javascripts = $javascripts;
        $this->styles = $styles;
    }

    public function setMinhaConta($minhaConta) {
        $this->minhaConta = $minhaConta;
    }
        
    public function mostrarTopo() {
        echo "<!doctype html>
        <html lang='pt-BR'>
            <head>
                <meta charset='utf-8'>
                <meta name='viewport' content='width = device-width, initial-scale = 1' />";
        foreach ($this->styles as $style) {
                echo "<link rel='stylesheet' type='text/css' href='$style[caminho]' media='$style[media]' />";
        }
        foreach ($this->javascripts as $javascript){
                echo "<script src='$javascript[caminho]' ></script>";
        }
                echo "<title>Nippes Estamparia</title>"
        . "</head>"
        . "<body>";
        echo "<header class='century'>
            <nav class='first'>
                <img class='logotipo' src='img/logo.png'/> <b class='font15px'>| ESTAMPARIA </b>
                <ul class='cabecalhotopo'>
                    <li class='menuMinhaConta'>";
        echo $this->minhaConta;
                    //<li><a>Facebook | Google </a></li>
        echo        "</li>
                </ul>		
            </nav>
            <nav class='firstcabecalho'>
                <ul class='cabecalho'>";
            foreach ($this->botoes as $botao) {
                    echo "<li><a href='".$botao["caminho"]."' name='$botao[nome]]'> $botao[valor] </a></li>";
            }
            echo "</ul>
                <div class='pesquisa'>
                    <input type='text'/>
                    <button>I</button>

                    <a href='?pagina=wp_venda&acao=mostrar_carrinho'>
                        <img class='carrinho relative' src='img/carrinho2.png' /> 
                    </a>
                </div>	
            </nav>
        </header>";
                
    }

}
