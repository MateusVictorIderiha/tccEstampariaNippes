<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteModel
 *
 * @author rm02540
 */

namespace estamparia\model;

use estamparia\libs\UsuarioModel;
use estamparia\model\ContatoModel;
use estamparia\model\EnderecoModel;

final class ClienteModel extends UsuarioModel {

    //put your code here
    private $rg;
    private $idEndereco = array();
    private $idContato = array();

    public function __construct($usuario = null, $senha = null) {
        parent::__construct($usuario, $senha);
        
        if(!empty($usuario) and !empty($senha)){
            $lista = $this->validaUsuario($usuario, $senha);
            if($lista){
                $this->email = $lista["email"];
                $this->rg = $lista["rg"];
                $this->dataNascimento = $lista["dataNascimento"];
                
                $endereco = new EnderecoModel();
                $this->idEndereco = $endereco->retornarIdEnderecoUsuario($this->cpf);
                
                $contato = new ContatoModel();
                $this->idContato = $contato->retornarIdContatoUsuario($this->cpf);
            }
        }
    }
    
    public function __get($propriedade) {
        if($propriedade == "Endereco"){
           $objsEnderecos = array();
            foreach ($this->idEndereco as $idEndereco) {
                $endereco = new EnderecoModel($idEndereco);
                $objsEnderecos = $endereco;
            }
            return $objsEnderecos;
        }
        
        if($propriedade == "Contato"){
            $objsContatos = array();
            foreach ($this->idContato as $idContato) {
                $contato = new ContatoModel($idContato);
                $objsContatos = $contato;
            }
            return $objsContatos;
        }
    }
    public function setIdEndereco($idEndereco) {
        $this->idEndereco = $idEndereco;
    }
    
    public function setIdContato($idContato) {
        $this->idContato = $idContato;
    }

    public function getIdEndereco() {
        return $this->idEndereco;
    }

    public function getIdContato() {
        $contato = new ContatoModel\ContatoModel($this->cpf);
        return $contato->getIdContato();
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getRg() {
        return $this->rg;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

}
