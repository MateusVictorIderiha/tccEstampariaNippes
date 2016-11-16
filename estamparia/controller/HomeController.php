<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;

use estamparia\view\HomeView; 
use estamparia\controller\PadraoController;

/**
 * Description of HomeController
 *
 * @author Mateus
 */
class HomeController implements PadraoController{
    //put your code here

    public function mostrarPagina() {
        $objHome = new HomeView;
        $objHome->mostrarConteudo();
        $objHome->mostrarRodape();
    }
}
