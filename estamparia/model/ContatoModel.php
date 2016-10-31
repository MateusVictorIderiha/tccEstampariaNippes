<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContatoModel
 *
 * @author Mateus
 */

namespace estamparia\model;

use estamparia\libs\CrudEstamparia;

class ContatoModel extends CrudEstamparia {

    //put your code here
    private $idContato;
    private $contato; // contato em si
    private $idTipoContato; // id do tipo contato, exemplo: email, telefone
    private $cpfCliente;
    protected $tabela = "contato";
    protected $consultaColunaId = "id_contato";

    public function __construct($idContato = null) {
        parent::__construct();
        if(!empty($idContato)){
            $lista = $this->consultar($idContato);
            if($lista) {
                $this->idContato = $lista["id_contato"];
                $this->idTipoContato = $lista["id_tipoContato"];
                $this->contato = $lista["contato"];
                $this->cpfCliente = $lista["cpf_cliente"];
            }
        }
    }
    
    public function retornarIdContatoUsuario($cpf) {
        $idContatos = array();
        $comando = $this->banco->prepare("SELECT $this->consultaColunaId FROM "
                . "$this->tabela WHERE cpf_cliente = $cpf");
        $comando->execute();
        $lista = $comando->fetch(\PDO::FETCH_ASSOC);
        
        if(count($lista) != 0) {
            foreach ($lista as $resultadoIdContato) {
                $idContatos = $resultadoIdContato;
            }
            return $idContatos;
        }
    }
    
    public function getIdContato() {
        return $this->idContato;
    }

    public function getContato() {
        return $this->contato;
    }

    public function getIdTipoContato() {
        return $this->idTipoContato;
    }

    public function getCpfCliente() {
        return $this->cpfCliente;
    }

    public function setIdContato($idContato) {
        $this->idContato = $idContato;
    }

    public function setContato($contato) {
        $this->contato = $contato;
    }

    public function setIdTipoContato($idTipoContato) {
        $this->idTipoContato = $idTipoContato;
    }

    public function setCpfCliente($cpfCliente) {
        $this->cpfCliente = $cpfCliente;
    }

    public function editar($id_contato) {
        $comando = $this->banco->prepare("UPDATE contato SET id_tipo=:id_tipo,"
                . "contato=:contato,cpf_cliente=:cpf_cliente WHERE id_contato=$id_contato");
        $comando->bindParam(":id_tipo", $this->idTipoContato);
        $comando->bindParam(":contato", $this->contato);
        $comando->bindParam(":cpf_cliente", $this->cpfCliente);
        $comando->execute();
    }

    public function inserir() {
        $comando = $this->banco->prepare("INSERT INTO $this->tabela(contato, id_tipo,"
                . " cpf_cliente) values(:contato,:id_tipo,:cpf_cliente)");
        $comando->bindParam(":contato", $this->contato);
        $comando->bindParam(":id_tipo", $this->idTipoContato);
        $comando->bindParam(":cpf_cliente", $this->cpfCliente);
        $comando->execute();
        return $this->banco->lastInsertId();
    }

}
