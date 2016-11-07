<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tamanho
 *
 * @author rm02540
 */

namespace estamparia\libs;

use estamparia\libs\Crud;

class TamanhoModel extends Crud {

    //put your code here
    private $idTamanho;
    private $tamanho;
    protected $tabela = "Tamanho";

    public function getIdTamanho() {
        return $this->idTamanho;
    }

    public function getTamanho() {
        return $this->tamanho;
    }

    public function setIdTamanho($idTamanho) {
        $this->idTamanho = $idTamanho;
    }

    public function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
    }

    public function editar($id) {
        
    }

    public function inserir() {
        
    }

}