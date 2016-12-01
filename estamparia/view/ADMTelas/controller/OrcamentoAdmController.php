<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view\adm\controller;

use estamparia\controller\PadraoController;
use estamparia\view\adm\view\OrcamentoAdmView;

/**
 * Description of OrcamentoAdmController
 *
 * @author Mateus
 */
class OrcamentoAdmController implements PadraoController{
    //put your code here
    public function mostrarPagina() {
        $obj = new OrcamentoAdmView();
        $obj->head();
        $obj->mostrarTopo();
        $obj->mostrarPagina();
        $obj->fecharPagina();
    }

}
