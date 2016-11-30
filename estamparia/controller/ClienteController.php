<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;

use estamparia\view\CadastroView;
use estamparia\model\ClienteModel;
use estamparia\model\ContatoModel;
use estamparia\model\EnderecoModel;
use estamparia\controller\PadraoController;
use estamparia\view\BemVindoView;

/**
 * Description of ClienteController
 *
 * @author Mateus
 */
class ClienteController implements PadraoController {

    //put your code here
    public function mostrarPagina() {
        $objCliente = new CadastroView();
        $objCliente->mostrarTopo();
        $objCliente->mostrarConteudo();
        $objCliente->mostrarRodape();
    }
    
    public function cadastrarCliente() {
        $cpf = $_POST["cpf"];
        $nome = $_POST["nome"];
        $rg = $_POST["rg"];
        $dataNascimento = $_POST["dataNascimento"];
        $telefones = $_POST["telefone"];
        $celulares = $_POST["celular"];

        $idCep = $_POST["cep"];
        $rua = $_POST["rua"];
        $numero = $_POST["numero"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $complemento = $_POST["complemento"];
        $numeroDaCasa = $_POST["numero"];
        
        $senha = $_POST["cadSenha"];
        $usuario = $_POST["email"];
        
        var_dump($_POST);
        $objCliente = new ClienteModel();
        $objCliente->setCpf($cpf);
        $objCliente->setNome($nome);
        $objCliente->setPostUsuarioLogin($usuario);
        $objCliente->setPostSenhaLogin($senha);
        $objCliente->setDataNascimento('2016-05-11');
        $objCliente->setRg($rg);
        $idCliente = $objCliente->inserir();
        if($idCliente){
            foreach ($telefones as $telefone){
                $objTelefone = new ContatoModel;
                $objTelefone->setContato($telefone);
                $objTelefone->setTipoContato("Telefone");
                $objTelefone->setIdCliente($idCliente);
                $objTelefone->inserir();
            }
            foreach ($celulares as $celular) {   
                $objContato = new ContatoModel();
                $objContato->setContato($celular);
                $objContato->setTipoContato("Celular");
                $objContato->setIdCliente($idCliente);
                $objContato->inserir();
            }
            
            $objEndereco = new EnderecoModel();
            $objEndereco->setIdCep(1);
            $objEndereco->setNumeroDaCasa('173');
            $objEndereco->setIdCliente($idCliente);
            $objEndereco->setComplemento($complemento);
            $objEndereco->inserir();
            
            echo "cadastrado com sucesso!";
        } else {
            echo 'errou';
        }
    }
    
    public function logarCliente() {
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        
        $cookie = isset($_POST["loginCookie"]) ? ($_POST["loginCookie"]) : (false);
        
        $objClienet = new ClienteModel();
        if($cookie == 1){
            $verifica = $objClienet->loginCookie($usuario, $senha);
            if($verifica){
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $verifica = $objClienet->loginSessao($usuario, $senha);
            if($verifica){
                echo 1;
            } else {
                echo 0;
            } 
        }
        return false;
    }
    
    public function mostrarBemVindo() {
        $objCliente = new ClienteModel();
        if($objCliente->verificaLoginSessao() || $objCliente->verificaLoginCookie()){
            $objBemVindo = new BemVindoView();
            if(isset($_COOKIE["usuario"])){
                $lista = $objCliente->consultar($_COOKIE["usuario"]);
            } elseif ($_SESSION["usuario"]) {
                $lista = $objCliente->consultar($_SESSION["usuario"]);
            }
            $objBemVindo->setNome($lista['nome']); // TERMINAR
            $objBemVindo->mostrarTopo();
            $objBemVindo->mostrarConteudo();
            $objBemVindo->mostrarRodape();
        } else {
            $objCliente->expulsaUsuario();
        }
    }
    
    public function sair() {
        $objCliente = new ClienteModel();
        
        $objCliente->logoutSessao();
        $objCliente->logoutCookie();
    }
}
