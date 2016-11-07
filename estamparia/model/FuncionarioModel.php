<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Funcionario
 *
 * @author rm02540
 */

namespace estamparia\model;

use estamparia\libs\UsuarioModel;

final class FuncionarioModel extends UsuarioModel {

    //put your code here

    protected $nivel = "ufnippes";

    public function getSenha() {
        return $this->senha;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

}