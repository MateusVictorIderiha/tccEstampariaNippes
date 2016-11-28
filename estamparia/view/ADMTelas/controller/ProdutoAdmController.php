<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view\adm\controller;


use estamparia\view\adm\view\CaracteristicasProdutoView;
/**
 * Description of ProdutoAdmController
 *
 * @author Mateus
 */
class ProdutoAdmController {
    //put your code here
    
    public function mostrarPagina() {
        $objCaracteristica = new CaracteristicasProdutoView();
        $objCaracteristica->mostrarTopo();
        $objCaracteristica->mostrarCaracteristicaModelo();
        $objCaracteristica->mostrarCaracteristicaTamanho();
        $objCaracteristica->mostrarCaracteristicaCor();
    }
}
