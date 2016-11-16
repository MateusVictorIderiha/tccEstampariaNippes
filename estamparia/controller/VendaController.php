<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;

use estamparia\view\CadastroView;

/**
 * Description of VendaController
 *
 * @author Mateus
 */
class VendaController {
    //put your code here
    
    public function mostrarCarrinho() {
        $objCarrinho = new CadastroView();
        $objCarrinho->mostrarConteudo();
        $objCarrinho->mostrarRodape();
    }
}
