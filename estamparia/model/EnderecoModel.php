<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnderecoModel
 *
 * @author rm02540
 */

namespace estamparia\model;

use estamparia\model\CepModel;

final class EnderecoModel extends CepModel {

    //put your code here
    private $idEndereco;
    private $numeroDaCasa;
    private $complemento;
    private $idCliente;
    private $idCep;
    protected $tabela = "tcc_endereco";
    protected $consultaColunaId = "id_endereco";

    public function __construct($idEndereco = null) {
        parent::__construct();

        if(!empty($idEndereco)) {
            $lista = $this->consultar($idEndereco);
            if($lista) {
                $this->idEndereco = $lista["id_endereco"];
                $this->numeroDaCasa = $lista["numero"];
                $this->complemento = $lista["complemento"];
                $this->idCliente = $lista["id_usuario"];
                $this->idCep = $lista["id_cep"];
            }
        }
    }

    public function retornarIdEnderecoUsuario($id) {
        $comando = $this->banco->prepare("SELECT $this->consultaColunaId FROM $this->tabela "
                . "WHERE id_usuario = $id");
        $comando->execute();
        $lista = $comando->fetchAll(\PDO::FETCH_ASSOC);

        if($lista) {
            return $lista;
        } else {
            return false;
        }
    }

    public function getIdEndereco() {
        return $this->idEndereco;
    }

    public function getNumeroDaCasa() {
        return $this->numeroDaCasa;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function getIdCep() {
        return $this->idCep;
    }

    public function setIdEndereco($idEndereco) {
        $this->idEndereco = $idEndereco;
    }

    public function setNumeroDaCasa($numeroDaCasa) {
        $this->numeroDaCasa = $numeroDaCasa;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    public function setIdCep($idCep) {
        $this->idCep = $idCep;
    }

    public function editar($id_endereco) {
        $comando = $this->banco->prepare("UPDATE $this->tabela SET cep=:cep, "
                . "numero=:numero, complemento=:complemento, cpf_cliente=:cpf_cliente "
                . "WHERE id_endereco=$id_endereco");
        $comando->bindParam(":cep", $this->cep);
        $comando->bindParam(":numero", $this->numeroDaCasa);
        $comando->bindParam(":complemento", $this->complemento);
        $comando->bindParam(":cpf_cliente", $this->cpfCliente);

        $comando->execute();
    }

    public function inserir() {
        $comando = $this->banco->prepare("INSERT INTO $this->tabela(cep, numero, "
                . "complemento, cpf_cliente) values(:cep, :numero, :complemento, :cpf_cliente)");
        $comando->bindParam(":cep", $this->cep);
        $comando->bindParam(":numero", $this->numeroDaCasa);
        $comando->bindParam(":complemento", $this->complemento);
        $comando->bindParam(":cpf_cliente", $this->cpfCliente);

        $comando->execute();
        return $this->banco->lastInsertId();
    }

    public function mostrarInformacoes() {
        $informacoes[] = $this->idEndereco;
        $informacoes[] = $this->numeroDaCasa;
        $informacoes[] = $this->complemento;
        $informacoes[] = $this->idCep;
        $informacoes[] = $this->idCliente;
        return $informacoes;
    }

}
