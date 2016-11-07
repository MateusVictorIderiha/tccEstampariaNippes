<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CodigoDaCor
 *
 * @author Mateus
 */
// ainda se tem que arrumar a LOGICA DAS CLASSES Cor, PadraoDaCor e CodigoDaCor

namespace estamparia\model;

use estamparia\libs\Crud;

class CodigoDaCorModel extends Crud {

    //put your code here
    private $idCodigo;
    private $codigo;
    private $padraoCor;
    private $idCor;
    protected $tabela = "tcc_codigo";

    public function getIdCodigo() {
        return $this->idCodigo;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getPadraoCor() {
        return $this->padraoCor;
    }

    public function getIdCor() {
        return $this->idCor;
    }

    public function setIdCodigo($idCodigo) {
        $this->idCodigo = $idCodigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setPadraoCor($padraoCor) {
        $this->padraoCor = $padraoCor;
    }

    public function setIdCor($idCor) {
        $this->idCor = $idCor;
    }

    public function editar($id) {
        
    }

    public function inserir() {
        
    }

}