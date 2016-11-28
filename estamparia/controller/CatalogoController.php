<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;

use estamparia\view\CatalagoView;
use estamparia\controller\PadraoController;

/**
 * Description of CatalogoController
 *
 * @author Mateus
 */
class CatalogoController implements PadraoController{
    //put your code here
    
    public function mostrarPagina() {
        $objCatalogo = new CatalagoView();
        $objCatalogo->mostrarConteudo();
        $objCatalogo->mostrarTopo();
        $objCatalogo->mostrarRodape(); 
    }
}
