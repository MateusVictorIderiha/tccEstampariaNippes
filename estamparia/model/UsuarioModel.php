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

namespace estamparia\model;

use estamparia\model\PessoaModel;

abstract class UsuarioModel extends PessoaModel {

    //put your code here
    private $cookieSeguranca;
    protected $idUsuario;
    protected $postUsuarioLogin;
    protected $postSenhaLogin;
    protected $login; // Uma das formas de login do usuario, Cliente é o email
    protected $tabela = "tcc_usuario";
    protected $consultaColunaId = "id_usuario";
    protected $nivel = "uc";

    public function __construct($usuario = null, $senha = null) {
        parent::__construct();

        if(!empty($usuario) and ! empty($senha)) {
            $lista = $this->validaUsuario($usuario, $senha);
            if($lista) {
                $this->idUsuario = $lista["id_usuario"];
                $this->postUsuarioLogin = $usuario;
                $this->login = $lista["login"];
                $this->postSenhaLogin = $this->Md5EncodeSenha($senha);
                $this->cpf = $lista["cpf_usuario"];
                $this->nome = $lista["nome"];
            }
        }
    }

    public function Md5EncodeSenha($senha) {
        $senhaMd5 = md5($senha);
        $encriptografado = base64_encode($senhaMd5);
        return $encriptografado;
    }

    public function validaUsuario($usuario, $senha) {
        $comando = $this->banco->prepare("SELECT * from $this->tabela where "
                . "(cpf_usuario=:cpf_usuario or login=:login) and senha=:senha");
        $comando->bindParam(":cpf_usuario", $usuario);
        $comando->bindParam(":login", $usuario);
        $comando->bindParam(":senha", $senha);
        $comando->execute();
        $login = $comando->fetch(\PDO::FETCH_ASSOC);

        if($login) {
            return $login;
        } else {
            return false;
        }
    }

    public function expulsaUsuario() {
        header("location:../view/home.phtml");
    }

    public function loginSessao($postUsuario, $postSenha) {
        $login = $this->validaUsuario($postUsuario, md5($postSenha));
        if($login) {
            $_SESSION["usuario"] = $login[0]["id_usuario"];
            $_SESSION["senha"] = base64_encode($login[0]["senha"]);
        }
    }

    public function logoutSessao() {
        if(isset($_SESSION["usuario"]) and isset($_SESSION["senha"])) {
            unset($_SESSION["usuario"]);
            unset($_SESSION["senha"]);
        }
    }

    public function loginCookie($postUsuario, $postSenha) {
        $login = $this->validaUsuario($postUsuario, md5($postSenha));
        if($login) {
            $_COOKIE["usuario"] = $login[0]["id_usuario"];
            $_COOKIE["senha"] = base64_encode($login[0]["senha"]);
        }
    }

    public function logoutCookie() {
        if(isset($_COOKIE["usuario"]) and isset($_COOKIE["senha"])) {
            unset($_COOKIE["usuario"]);
            unset($_COOKIE["senha"]);
            header("location:");
        }
    }

    /*
     * varifica se o usuario logado no momento está valido
     * se passa as variaveis globais COOKIE ou SESSION para a verificação
     */

    public function verificaLogin($login, $senha) {
        if(isset($this->postUsuarioLogin) and isset($this->postSenhaLogin)
                and isset($login) and isset($senha)
                and $this->postUsuarioLogin == $login
                and $this->postSenhaLogin == $senha) {
            if($this->validaUsuario($login, base64_decode($senha))) {
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

    public function editar($id) {
        $comando = $this->banco->prepare("UPDATE $this->tabela SET "
                . "cpf_usuario=:cpf_usuario,email=:email,senha=:senha,RG=:rg,"
                . "dataNascimento=:dataNascimento,nome=:nome WHERE $this->consultaColunaId=$id");
        $comando->bindParam(":cpf_usuario", $this->cpf);
        $comando->bindParam(":email", $this->email);
        $comando->bindParam(":senha", $this->senha);
        $comando->bindParam(":rg", $this->rg);
        $comando->bindParam(":dataNascimento", $this->dataNascimento);
        $comando->bindParam(":nome", $this->nome);
        $comando->execute();
    }

    public function mostrarInformacoes() {
        $informacoes[] = $this->idUsuario;
        $informacoes[] = $this->login; // Email
        $informacoes[] = $this->nivel;
        $informacoes[] = $this->cpf;
        $informacoes[] = $this->nome;
        $informacoes[] = $this->dataNascimento;
        return $informacoes;
    }

}
