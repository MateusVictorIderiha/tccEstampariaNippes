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

use estamparia\libs\CrudEstamparia;

class CodigoDaCorModel extends CrudEstamparia {

    //put your code here
    private $idCodigo;
    private $codigo;
    private $idPadraCor;
    private $idCor;
    protected $tabela = "Codigo";

    public function getIdCodigo() {
        return $this->idCodigo;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getIdPadraCor() {
        return $this->idPadraCor;
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

    public function setIdPadraCor($idPadraCor) {
        $this->idPadraCor = $idPadraCor;
    }

    public function setIdCor($idCor) {
        $this->idCor = $idCor;
    }

    public function editar($id) {
        
    }

    public function inserir() {
        
    }

}
