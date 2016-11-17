<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;

use estamparia\view\PedidosView;
use estamparia\controller\PadraoController;

/**
 * Description of PedidosController
 *
 * @author Mateus
 */
class PedidosController implements PadraoController{
    //put your code here
    public function mostrarPagina() {
        $objPedidos = new PedidosView();
        $objPedidos->mostrarConteudo();
        $objPedidos->mostrarRodape();
    }
}
