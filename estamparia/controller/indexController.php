<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;

use estamparia\view\HomeView;
use estamparia\view\PedidosView;
use estamparia\view\CatalagoView;
use estamparia\view\ContatoView;
use estamparia\view\CadastroView;
use estamparia\view\SobreView;

/**
 * Description of indexController
 *
 * @author Mateus
 */
class indexController {

    //put your code here
    public function paginasMenu() {
        if(isset($_REQUEST["pagina"])){
            switch ($_REQUEST["pagina"]) {
                case ("pedidos"):
                    $objpedidos = new PedidosView();
                    $objpedidos->mostrarConteudo();
                    $objpedidos->mostrarRodape();
                    break;
                case ("catalago"):
                    $objCatalago = new CatalagoView();
                    $objCatalago->mostrarConteudo();
                    $objCatalago->mostrarRodape();
                    break;
                case ("faleConosco"):
                    $objContato = new ContatoView();
                    $objContato->mostrarConteudo();
                    $objContato->mostrarRodape();
                    break;
                case ("home"):
                    $objHome = new HomeView();
                    $objHome->mostrarConteudo();
                    $objHome->mostrarRodape();
                    break;
                case ("cadastrar"):
                case ("login"):
                    $objCadastrar = new CadastroView();
                    $objCadastrar->mostrarConteudo();
                    $objCadastrar->mostrarRodape();
                    break;
                case ("sobre"):
                    $objSobre = new SobreView();
                    $objSobre->mostrarConteudo();
                    $objSobre->mostrarRodape();
                    break;
            } 
        } elseif(empty($_REQUEST["pagina"])) {
            $objHome = new HomeView();
            $objHome->mostrarConteudo();
            $objHome->mostrarRodape();
        }
    }

}
