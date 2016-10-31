<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of ValidadorLogin
 *
 * @author Mateus
 */

namespace estamparia\libs;

use estamparia\libs\CrudEstamparia;

class ValidadorLogin extends CrudEstamparia {

    //put your code here
    private $usuario;
    private $senha;
    private $statusSessao = false;
    private $dadosBanco;
    private $cookieSeguranca;
    protected $tabela = "usuario";

    public function __construct($usuario, $senha) {
        parent::__construct();
        $this->usuario = $usuario;
        $this->senha = $senha;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function criptSenha($senha) {
        return md5($senha);
    }

    public function loginSessao($postUsuario, $postSenha) {
        md5($postSenha);
        $comando = $this->banco->prepare("SELECT * from $this->tabela where "
                . "(cpf_cliente=:cpf_cliente or email=:email) and senha=:senha");
        $comando->bindParam(":cpf_cliente", $postUsuario);
        $comando->bindParam(":email", $postUsuario);
        $comando->bindParam(":senha", $postSenha);
        $comando->execute();
        $login = $comando->fetch(\PDO::FETCH_ASSOC);

        if(count($login) == 1) {
            $_SESSION["usuario"] = $login[0]["cpf_cliente"];
            $_SESSION["senha"] = $login[0]["senha"];
        }
    }

    public function logoutSessao() {
        if(isset($_SESSION["usuario"]) and isset($_SESSION["senha"])) {
            unset($_SESSION["usuario"]);
            unset($_SESSION["senha"]);
        }
    }

    public function loginCookie($param) {
        
    }

    public function logoutCookie($param) {
        
    }

    public function verificaLogin() {
        if(isset($_SESSION["usuario"]) and isset($_SESSION["senha"])) {
            $comando = $this->banco->prepare("SELECT cpf_cliente, email, senha from $this->tabela where "
                    . "(cpf_cliente=:cpf_cliente or email=:email) and senha=:senha");
        }
    }

    public function editar($id);

    public function inserir();
}
