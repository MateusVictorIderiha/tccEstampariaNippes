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

use estamparia\model\UsuarioModel;
use estamparia\model\ContatoModel;
use estamparia\model\EnderecoModel;

final class ClienteModel extends UsuarioModel {

    //put your code here
    private $rg;
    private $idEndereco = array();
    private $idContato = array();

    public function __construct($usuario = null, $senha = null) {
        parent::__construct($usuario, $senha);

        if(!empty($usuario) and ! empty($senha)) {
            $lista = $this->validaUsuario($usuario, $senha);
            if($lista) {
                $this->rg = $lista["RG"];
                $this->dataNascimento = $lista["dataNascimento"];

                $endereco = new EnderecoModel();
                $this->idEndereco = $endereco->retornarIdEnderecoUsuario($this->idUsuario);

                $contato = new ContatoModel();
                $this->idContato = $contato->retornarIdContatoUsuario($this->idUsuario);
            }
        }
    }

    public function __get($propriedade) {
        if($propriedade == "Endereco") {
            foreach ($this->idEndereco as $listaEnderecos){
                foreach ($listaEnderecos as $idEndereco) {
                    $endereco = new EnderecoModel($idEndereco);
                    $objsEnderecos[] = $endereco;
                }
            }
            return $objsEnderecos;
        }

        if($propriedade == "Contato") {
            foreach ($this->idContato as $listaIds) {
                foreach ($listaIds as $idContato) {
                    $contato = new ContatoModel($idContato);
                    $objsContatos[] = $contato;
                }
            }
            return $objsContatos;
        }
    }

    public function getRg() {
        return $this->rg;
    }

    public function getIdEndereco() {
        return $this->idEndereco;
    }

    public function getIdContato() {
        return $this->idContato;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function setIdEndereco($idEndereco) {
        $this->idEndereco = $idEndereco;
    }

    public function setIdContato($idContato) {
        $this->idContato = $idContato;
    }
   
    public function mostrarInformacoes() {
        $informacoesCliente = parent::mostrarInformacoes();
        $informacoesCliente[] = $this->rg;
        $cliente = $informacoesCliente;
        
         
        /*
          foreach($this->idEndereco as $listaEnderecos){
          foreach ($listaEnderecos as $idEndereco) {
          $endereco = new EnderecoModel();
          $enderecos[] = $endereco->consultar($idEndereco);
          }
          }

          foreach ($this->idContato as $listaContatos) {
          foreach ($listaContatos as $idContato) {
          $objContato = new ContatoModel();
          $contatos[] = $objContato->consultar($idContato);
          }
          }
         */
        
        $listaObjEnderecos = $this->Endereco;
        foreach ($listaObjEnderecos as $objEndereco) {
            $enderecos[] = $objEndereco->mostrarInformacoes();
        }

        $listaObjContatos = $this->Contato;
        foreach ($listaObjContatos as $objContato) {
            $contatos[] = $objContato->mostrarInformacoes();
        }

        $todaInformacao = array("Informações pessoais: " => $cliente,
            "Endereços: " => $enderecos, "Contatos: " => $contatos);

        return $todaInformacao;
    }

}
