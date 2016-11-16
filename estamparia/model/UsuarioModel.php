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
    protected $rg;
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
                $this->rg = $lista["RG"];
                $this->dataNascimento = $lista["dataNascimento"];
                $this->postSenhaLogin = $this->Md5EncodeSenha($senha);
                $this->cpf = $lista["cpf_usuario"];
                $this->nome = $lista["nome"];
            }
        }
    }
    
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getPostUsuarioLogin() {
        return $this->postUsuarioLogin;
    }

    public function getPostSenhaLogin() {
        return $this->postSenhaLogin;
    }

    public function getLogin() {
        return $this->login;
    }
    
    public function getRg() {
        return $this->rg;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setPostUsuarioLogin($postUsuarioLogin) {
        $this->postUsuarioLogin = $postUsuarioLogin;
    }

    public function setPostSenhaLogin($postSenhaLogin) {
        $this->postSenhaLogin = $postSenhaLogin;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function Md5EncodeSenha($senha) {
        $senhaMd5 = md5($senha);
        $encriptografado = base64_encode($senhaMd5);
        return $encriptografado;
    }

    public function retornaLogin($id) {
        $lista = $this->consultar($id);
        
        return $lista["login"];
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
        header("location:?pagina=wp_login");
    }

    public function loginSessao($postUsuario, $postSenha) {
        $login = $this->validaUsuario($postUsuario, md5($postSenha));
        if($login) {
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION["usuario"] = $login["id_usuario"];
            $_SESSION["senha"] = base64_encode($login["senha"]);
            //header("location:?pagina=wp_Cliente&acao=mostrar_bem_vindo");
            echo $_SESSION["usuario"];
            echo "<a href='?pagina=wp_Cliente&acao=mostrar_bem_vindo'>link<a/>";
        } else {
            echo "Senha ou usuario incorretos";
        }
    }

    public function logoutSessao() {
        if(!isset($_SESSION)){
            session_start();
        }
        if(isset($_SESSION["usuario"]) and isset($_SESSION["senha"])) {
            unset($_SESSION["usuario"]);
            unset($_SESSION["senha"]);
            header("location:?pagina=wp_home");
        }
    }

    public function loginCookie($postUsuario, $postSenha) {
        $login = $this->validaUsuario($postUsuario, md5($postSenha));
        if($login) {
            setcookie("usuario", $login["id_usuario"], time()+604800);
            setcookie('senha', base64_encode($login["senha"]), time()+604800);
            if(isset($_COOKIE["usuario"]) and !empty($_COOKIE["usuario"])){
                echo "O cookie id é ".$_COOKIE["usuario"];
            }
            echo "<a href='?pagina=wp_Cliente&acao=mostrar_bem_vindo'>link<a/>";
        } else {
            echo "Senha ou usuario incorretos";
        }
    }

    public function logoutCookie() {
        if(isset($_COOKIE["usuario"]) and isset($_COOKIE["senha"])) {
            setcookie("usuario");
            setcookie("senha");
            /*unset($_COOKIE["usuario"]);
            unset($_COOKIE["senha"]);*/
            header("location:?pagina=wp_home");
        }
    }

    /*
     * varifica se o usuario logado no momento está valido
     * se passa as variaveis globais COOKIE ou SESSION para a verificação
     */

    public function verificaLoginSessao() {
        $login = null;
        $senha = null;
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['usuario']) and isset($_SESSION['senha']) and 
                !empty($_SESSION['usuario']) and !empty($_SESSION['senha'])) {
            $idUsuario = $_SESSION['usuario'];
            $senha = $_SESSION['senha'];
            
            $objCliente = new ClienteModel();
            $login = $objCliente->retornaLogin($idUsuario);
        }
        
        if($this->validaUsuario($login, base64_decode($senha))) {
            return true;
        } else {
            return false;
        }
    }
    
    public function verificaLoginCookie() {
        $login = null;
        $senha = null;
        if (isset($_COOKIE['usuario']) and isset($_COOKIE['senha']) and 
                !empty($_COOKIE['usuario']) and !empty($_COOKIE['senha'])) {
            $idUsuario = $_COOKIE['usuario'];
            $senha = base64_decode($_COOKIE['senha']);
            
            $objCliente = new ClienteModel();
            $login = $objCliente->retornaLogin($idUsuario);
        }
        
        
        if($this->validaUsuario($login, $senha)) {
            return true;
        } else {
            return false;
        }
    }

    public function inserir() {
        $comando = $this->banco->prepare("INSERT INTO $this->tabela(cpf_usuario,"
                . " senha, RG, dataNascimento, nome, nivel, login) values(:cpf_usuario,"
                . " :senha, :rg, :dataNascimento, :nome, :nivel, :login)");
        $comando->bindParam(":cpf_usuario", $this->cpf);
        $comando->bindParam(":senha", md5($this->postSenhaLogin));
        $comando->bindParam(":login", $this->postUsuarioLogin);
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
        $comando->bindParam(":senha", md5($this->postSenhaLogin));
        $comando->bindParam(":login", $this->postUsuarioLogin);
        $comando->bindParam(":rg", $this->rg);
        $comando->bindParam(":dataNascimento", $this->dataNascimento);
        $comando->bindParam(":nome", $this->nome);
        $comando->execute();
    }

    public function mostrarInformacoes() {
        $informacoes[] = $this->idUsuario;
        $informacoes[] = $this->login; // Email
        $informacoes[] = $this->cpf;
        $informacoes[] = $this->nome;
        $informacoes[] = $this->dataNascimento;
        return $informacoes;
    }

}
