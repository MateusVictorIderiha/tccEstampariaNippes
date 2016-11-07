<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Promocao
 *
 * @author rm02540
 */

namespace estamparia\model;

use estamparia\libs\Crud;

class PromocaoModel extends Crud {

    //put your code here
    private $idPromocao;
    private $datafinal;
    private $dataInicial;
    private $precoDaPromocao;
    private $promocao;
    protected $tabela = "Promocao";

    public function getIdPromocao() {
        return $this->idPromocao;
    }

    public function getDatafinal() {
        return $this->datafinal;
    }

    public function getDataInicial() {
        return $this->dataInicial;
    }

    public function getPrecoDaPromocao() {
        return $this->precoDaPromocao;
    }

    public function getPromocao() {
        return $this->promocao;
    }

    public function setIdPromocao($idPromocao) {
        $this->idPromocao = $idPromocao;
    }

    public function setDatafinal($datafinal) {
        $this->datafinal = $datafinal;
    }

    public function setDataInicial($dataInicial) {
        $this->dataInicial = $dataInicial;
    }

    public function setPrecoDaPromocao($precoDaPromocao) {
        $this->precoDaPromocao = $precoDaPromocao;
    }

    public function setPromocao($promocao) {
        $this->promocao = $promocao;
    }

    public function editar($id) {
        
    }

    public function inserir() {
        
    }

}