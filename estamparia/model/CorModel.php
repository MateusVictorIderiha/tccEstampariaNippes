<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CorModel
 *
 * @author Mateus
 */

namespace estamparia\model;

use estamparia\libs\Crud;

class CorModel extends Crud {

    //put your code here
    // ainda se tem que arrumar a LOGICA DAS CLASSES Cor, PadraoDaCor e CodigoDaCor
    private $idCor;
    private $cor;
    private $rgb;
    private $cmyk;
    protected $tabela = "Cor";

    public function getIdCor() {
        return $this->idCor;
    }

    public function getCor() {
        return $this->cor;
    }

    public function getRgb() {
        return $this->rgb;
    }

    public function getCmyk() {
        return $this->cmyk;
    }

    public function setIdCor($idCor) {
        $this->idCor = $idCor;
    }

    public function setCor($cor) {
        $this->cor = $cor;
    }

    public function setRgb($rgb) {
        $this->rgb = $rgb;
    }

    public function setCmyk($cmyk) {
        $this->cmyk = $cmyk;
    }

    public function editar($id) {
        
    }

    public function inserir() {
        
    }

}