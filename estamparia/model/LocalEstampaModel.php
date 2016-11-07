<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LocalEstampaModel
 *
 * @author Mateus
 */

namespace estamparia\model;

class LocalEstampaModel {

    //put your code here
    private $idLocalEstampa;
    private $localEstampa;
    protected $tabela = "local_estampa";

    public function getIdLocalEstampa() {
        return $this->idLocalEstampa;
    }

    public function getLocalEstampa() {
        return $this->localEstampa;
    }

    public function setIdLocalEstampa($idLocalEstampa) {
        $this->idLocalEstampa = $idLocalEstampa;
    }

    public function setLocalEstampa($localEstampa) {
        $this->localEstampa = $localEstampa;
    }

}