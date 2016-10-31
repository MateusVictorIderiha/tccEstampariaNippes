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

use estamparia\model\PessoaModel;

abstract class UsuarioModel extends PessoaModel {

    //put your code here
    //private $dadosBanco;
    private $cookieSeguranca;
    protected $usuarioLogin;
    protected $senhaLogin;
    protected $email;
    protected $tabela = "tcc_usuario";
    protected $consultaColunaId = "cpf_usuario";
    protected $nivel = "uc";

    public function __construct($usuario = null, $senha = null) {
        parent::__construct();
        
        if(!empty($usuario) and !empty($senha)){
            $lista = $this->validaUsuario($usuario, $senha);
            if($lista){
                $this->usuarioLogin = $usuario;
                $this->senhaLogin = $lista["senha"];
                $this->cpf = $lista["cpf_usuario"];
                $this->nome = $lista["nome"];
            }
        }
    }
    
    public function encriptSenha($senha) {
        return md5($senha);
    }
    
    public function validaUsuario($usuario, $senha){
        $comando = $this->banco->prepare("SELECT * from $this->tabela where "
                . "(cpf_cliente=:cpf_cliente or email=:email) and senha=:senha");
        $comando->bindParam(":cpf_cliente", $usuario);
        $comando->bindParam(":email", $usuario);
        $comando->bindParam(":senha", $senha);
        $comando->execute();
        $login = $comando->fetch(\PDO::FETCH_ASSOC);

        if(count($login) == 1) {
            return $login;
        } else {
            return false;
        }
    }
    
    public function expulsaUsuario() {
        header("location:../view/home.phtml");
    }

    public function loginSessao($postUsuario, $postSenha) {
        $login = $this->validaUsuario($postUsuario, $this->encriptSenha($postSenha));
        if($login){
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

    public function loginCookie($postUsuario, $postSenha) {
        $login = $this->validaUsuario($postUsuario, $this->encriptSenha($postSenha));
        if($login){
            $_COOKIE["usuario"] = $postUsuario;
            $_COOKIE["senha"] = $this->encriptSenha($postSenha);
        }
    }

    public function logoutCookie() {
        if(isset($_COOKIE["usuario"]) and isset($_COOKIE["senha"])){
            unset($_COOKIE["usuario"]);
            unset($_COOKIE["senha"]);
        }
    }

    public function verificaLogin() {
        if(isset($this->usuarioLogin) and isset($this->senhaLogin)) {
            if($this->validaUsuario($this->usuarioLogin, $this->senhaLogin)){
                return true;
            } else {
                $this->expulsaUsuario();
            }
        }
    }

    public function inserir() {
        $comando = $this->banco->prepare("INSERT INTO $this->tabela(cpf_usuario,"
                . " email, senha, RG, dataNascimento, nome, nivel) values(:cpf_usuario,"
                . " :email, :senha, :rg, :dataNascimento, :nome, :nivel)");
        $comando->bindParam(":cpf_usuario", $this->cpf);
        $comando->bindParam(":email", $this->email);
        $comando->bindParam(":senha", $this->senhaLogin);
        $comando->bindParam(":rg", $this->rg);
        $comando->bindParam(":dataNascimento", $this->dataNascimento);
        $comando->bindParam(":nome", $this->nome);
        $comando->bindParam(":nivel", $this->nivel);
        $comando->execute();

        /*    $comandoContato = $this->banco->prepare("INSERT INTO ".$this->id_contato->getTabela()
          ."(id_contato, id_tipo, contato, cpf_cliente) values(:id_contato,"
          . " :id_tipo, :senha, :rg, :dataNascimento, :nome)"); */
        return $this->banco->lastInsertId();  // está retornando sempre string'0' talvez seja por que Tabela Cliente não é autoincrement
    }

    public function editar($cpf) {
        $comando = $this->banco->prepare("UPDATE $this->tabela SET "
                . "cpf_usuario=:cpf_usuario,email=:email,senha=:senha,RG=:rg,"
                . "dataNascimento=:dataNascimento,nome=:nome WHERE $this->consultaColunaId=$cpf");
        $comando->bindParam(":cpf_usuario", $this->cpf);
        $comando->bindParam(":email", $this->email);
        $comando->bindParam(":senha", $this->senha);
        $comando->bindParam(":rg", $this->rg);
        $comando->bindParam(":dataNascimento", $this->dataNascimento);
        $comando->bindParam(":nome", $this->nome);
        $comando->execute();
    }

}
