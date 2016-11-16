<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;

use estamparia\view\SobreView;
use estamparia\controller\PadraoController;

/**
 * Description of SobreController
 *
 * @author Mateus
 */
class SobreController implements PadraoController{
    //put your code here
    public function mostrarPagina() {
        $objSobre = new SobreView();
        $objSobre->mostrarConteudo();
        $objSobre->mostrarRodape();
    }
}
