<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;

use estamparia\model\ProdutoModel;
use estamparia\view\CatalagoView;

/**
 * Description of ProdutoController
 *
 * @author Mateus
 */
class ProdutoController {
    //put your code here
    
    public function mostrarPagina() {
        $objCatalogo = new CatalagoView();
        $objCatalogo->mostrarConteudo();
        $objCatalogo->mostrarRodape(); 
    }
}
