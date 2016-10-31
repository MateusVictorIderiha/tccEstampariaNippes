<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PadraoDeCores
 *
 * @author Mateus
 */
// ainda se tem que arrumar a LOGICA DAS CLASSES Cor, PadraoDaCor e CodigoDaCor

namespace estamparia\model;

use estamparia\libs\CrudEstamparia;

class PadraoDeCoresModel extends CrudEstamparia {

    //put your code here
    private $idPadraoDaCor;
    private $padraoDaCor;
    protected $tabela = "PadraoDaCor";

    public function getIdPadraoDaCor() {
        return $this->idPadraoDaCor;
    }

    public function getPadraoDaCor() {
        return $this->padraoDaCor;
    }

    public function setIdPadraoDaCor($idPadraoDaCor) {
        $this->idPadraoDaCor = $idPadraoDaCor;
    }

    public function setPadraoDaCor($padraoDaCor) {
        $this->padraoDaCor = $padraoDaCor;
    }

    public function editar($id) {
        
    }

    public function inserir() {
        
    }

}
