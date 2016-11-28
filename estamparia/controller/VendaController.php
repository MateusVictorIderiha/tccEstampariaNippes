<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;

use estamparia\view\VendasView;
use estamparia\model\TamanhoModel;
use estamparia\controller\PadraoController;

/**
 * Description of VendaController
 *
 * @author Mateus
 */
class VendaController implements PadraoController{
    //put your code here
    
    public function mostrarCarrinho() {
        $objTamanho = new TamanhoModel();
        $listaTamanhos = $objTamanho->consultarTudo();
        
        $objCarrinho = new VendasView($listaTamanhos);        
        $objCarrinho->mostrarTopo();
        $objCarrinho->mostrarConteudo();
        $objCarrinho->mostrarRodape();
    }

    public function mostrarPagina() {
        
    }

}
