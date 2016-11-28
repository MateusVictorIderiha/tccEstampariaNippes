<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;

use estamparia\view\ContatoView;
use estamparia\controller\PadraoController;

/**
 * Description of ContatoController
 *
 * @author Mateus
 */
class ContatoController implements PadraoController{
    //put your code here
    
    public function mostrarPagina() {
        $objContato = new ContatoView();
        $objContato->mostrarTopo();
        $objContato->mostrarConteudo();
        $objContato->mostrarRodape();
    }

}
