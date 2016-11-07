<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModeloEstampaModel
 *
 * @author Mateus
 */

namespace estamparia\model;

class ModeloEstampaModel {

    //put your code here
    private $idModeloEstampa;
    private $descricaoModelo;
    protected $tabela = "ModeloEstampa";

    public function getIdModeloEstampa() {
        return $this->idModeloEstampa;
    }

    public function getDescricaoModelo() {
        return $this->descricaoModelo;
    }

    public function setIdModeloEstampa($idModeloEstampa) {
        $this->idModeloEstampa = $idModeloEstampa;
    }

    public function setDescricaoModelo($descricaoModelo) {
        $this->descricaoModelo = $descricaoModelo;
    }

}