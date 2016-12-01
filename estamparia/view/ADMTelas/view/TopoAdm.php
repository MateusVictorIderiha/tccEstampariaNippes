<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view\adm\view;

/**
 * Description of TopoAdm
 *
 * @author Mateus
 */
class TopoAdm {
    //put your code here
    private $javascripts;
    private $styles;
    
    public function __construct($javascripts = null, $styles = null) {
        $this->javascripts = $javascripts;
        $this->styles = $styles;
    }

    public function head() {
        echo "<!doctype html>
<html lang='pt-BR'>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1' />

        <link rel='stylesheet' type='text/css' media='all' href='../../bootstrap/css/bootstrap.css' />
        <link rel='stylesheet' type='text/css' media='all' href='../../bootstrap/jquery-ui/jquery-ui.css' />
        <link rel='stylesheet' type='text/css' media='all' href='css/msg.css' />

        <script src='../../bootstrap/js/jquery.js' ></script>
        <script src='../../bootstrap/js/bootstrap.js' ></script> 
        <script src='../../bootstrap/jquery-ui/jquery-ui.js' ></script>
        <script src='../../bootstrap/js/validate/dist/jquery.validate.js' ></script> 
        <script src='../../javascript.js' ></script>

        <link href='css/estilo.css' rel='stylesheet' type='text/css' media='screen'>
        <link href='css/estiloadm.css' rel='stylesheet' type='text/css' media='screen'>

        <title>Nippes Estamparia</title>
    </head>";
    }
    
    public function mostrarTopo(){
        echo "
    <body>	
        <header>
            <figure>
                <img class='logotipo' src='img/logo.png' width='150px' height='50px' />
            </figure>
            <figure class='user'>
                <img src='img/user.png' width='50px' height='50px' />
            </figure>
            <h1 class='admin'><a href='#'>Admin</a></h1>
                        </header>
                        <nav class='espacoentre'>
                            <ul>
                                <br>
                                <li><a class='espacoentre' href='?pagina=wp_produto_adm'> PRODUTOS</a></li>
                                <li><a class='espacoentre' href='?pagina=wp_orcamento_adm'> ORCAMENTOS</a></li>
                            </ul>
                        </nav>";
        /*echo "<!doctype html>
        <html lang='pt-BR'>
            <head>
                <meta charset='utf-8' />
                <meta name='viewport' content='width = device-width, initial-scale = 1' />
                ";
        foreach ($this->styles as $style) {
                echo "<link rel='stylesheet' type='text/css' href='".$style['caminho']."' media='".$style['media']."' />
                      ";
        }
        foreach ($this->javascripts as $javascript){
                echo "<script src='".$javascript['caminho']."' ></script>
                        ";
        }
                echo "<title>Nippes Estamparia</title>
            </head>
        <body>
        ";
        echo "<header>
            <figure>
                <img class='logotipo' src='img/logo.png' width='150px' height='50px' />
            </figure>
            <figure class='user'>
                <img src='img/user.png' width='50px' height='50px' />
            </figure>
            <h1 class='admin'><a href='#'>Admin<h1>
                        </header>
                        <nav class='espacoentre'>
                            <ul>
                                <br>
                                <li><a class='espacoentre' href='ADMprodutos.html'> PRODUTOS</a></li>
                                <li><a class='espacoentre' href='ADMcliente.html'> CLIENTE</a></li>
                                <li><a class='espacoentre' href='ADMcontato.html'> CONTATO</a></li>
                                <li><a class='espacoentre' href='ADMID.html'> ID INFORM</a></li>
                                <li><a class='espacoentre' href='ADMpromocao.html'> PROMOÇÕES</a></li>
                                <li><a class='espacoentre' href='ADMvenda.html'> ORCAMENTOS</a></li>
                            </ul>
                        </nav>";*/
    }
    
    public function fecharPagina() {
        echo "</body></html>";
    }
}
