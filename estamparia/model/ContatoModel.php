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

use estamparia\libs\Crud;

class ContatoModel extends Crud {

    //put your code here
    private $idContato;
    private $contato; // contato em si
    private $tipoContato; // id do tipo contato, exemplo: email, telefone
    private $idCliente;
    protected $tabela = "tcc_contato";
    protected $consultaColunaId = "id_contato";

    public function __construct($idContato = null) {
        parent::__construct();

        if(!empty($idContato)) {
            $lista = $this->consultar($idContato);
            if($lista) {
                $this->idContato = $lista["id_contato"];
                $this->tipoContato = $lista["tipo"];
                $this->contato = $lista["contato"];
                $this->idCliente = $lista["id_usuario"];
            }
        }
    }

    public function getIdContato() {
        return $this->idContato;
    }

    public function getContato() {
        return $this->contato;
    }

    public function getTipoContato() {
        return $this->tipoContato;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function setIdContato($idContato) {
        $this->idContato = $idContato;
    }

    public function setContato($contato) {
        $this->contato = $contato;
    }

    public function setTipoContato($tipoContato) {
        $this->tipoContato = $tipoContato;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function retornarIdContatoUsuario($id, $tipoContato = null) {
        if($tipoContato == null) {
            $comando = $this->banco->prepare("SELECT $this->consultaColunaId FROM "
                    . "$this->tabela WHERE id_usuario = $id");
            $comando->execute();
            $lista = $comando->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $comando = $this->banco->prepare("SELECT $this->consultaColunaId FROM "
                    . "$this->tabela WHERE id_usuario = $id and tipo = $tipoContato");
            $comando->execute();
            $lista = $comando->fetchAll(\PDO::FETCH_ASSOC);
        }
        if($lista) {
            return $lista;
        } else {
            return false;
        }
    }

    public function editar($id_contato) {
        $comando = $this->banco->prepare("UPDATE contato SET id_tipo=:id_tipo,"
                . "contato=:contato,cpf_cliente=:cpf_cliente WHERE id_contato=$id_contato");
        $comando->bindParam(":id_tipo", $this->tipoContato);
        $comando->bindParam(":contato", $this->contato);
        $comando->bindParam(":cpf_cliente", $this->idCliente);
        $comando->execute();
    }

    public function inserir() {
        $comando = $this->banco->prepare("INSERT INTO $this->tabela(contato, tipo,"
                . " id_usuario) values(:contato,:tipo,:id_cliente)");
        $comando->bindParam(":contato", $this->contato);
        $comando->bindParam(":tipo", $this->tipoContato);
        $comando->bindParam(":id_cliente", $this->idCliente);
        $comando->execute();
        return $this->banco->lastInsertId();
    }

    public function mostrarInformacoes() {
        $informacoes[] = $this->idContato;
        $informacoes[] = $this->contato;
        $informacoes[] = $this->tipoContato;
        $informacoes[] = $this->idCliente;
        return $informacoes;
    }

}
