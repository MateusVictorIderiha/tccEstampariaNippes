<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PessoaModel
 *
 * @author rm02540
 */

namespace estamparia\model;

use estamparia\libs\CrudEstamparia;

abstract class PessoaModel extends CrudEstamparia {

    //put your code here
    protected $nome;
    protected $cpf;
    protected $dataNascimento;

    // Talves apage o get e set
    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

}
