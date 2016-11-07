<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cep
 *
 * @author rm02540
 */

namespace estamparia\model;

use estamparia\libs\Crud;

abstract class CepModel extends Crud {

    //put your code here
    private $cep;
    private $estado;
    private $cidade;
    private $rua;
    private $bairro;
    protected $tabela = "Cep";
    protected $consultaColunaId = "id_cep";

    public function __construct() {
        parent::__construct();
    }
    
    function getCep() {
        return $this->cep;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getRua() {
        return $this->rua;
    }

    function getBairro() {
        return $this->bairro;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setRua($rua) {
        $this->rua = $rua;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

}