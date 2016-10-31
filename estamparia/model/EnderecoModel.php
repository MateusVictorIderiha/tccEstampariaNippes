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

class EnderecoModel extends CepModel {

    //put your code here
    private $idEndereco;
    private $numeroDaCasa;
    private $complemento;
    private $cpfCliente;
    private $cep;
    protected $tabela = "tcc_endereco";
    protected $consultaColunaId = "id_endereco";

    public function __construct($idEndereco = null) {
        parent::__construct();

        if(!empty($idEndereco)) {
            $lista = $this->consultar($idEndereco);
            /* $comando = $this->banco->prepare("SELECT * FROM $this->tabela WHERE id_endereco = $idEndereco");
              $comando->execute();
              $lista = $comando->fetch(\PDO::FETCH_ASSOC); */

            if($lista) {
                $endereco->idEndereco = $lista["id_endereco"];
                $endereco->numeroDaCasa = $lista["numero"];
                $endereco->complemento = $lista["complemento"];
                $endereco->cpfCliente = $lista["cpf_cliente"];
                $endereco->cep = $lista["cep"];
            } else {
                echo "id inexistente";
            }
        }
    }

    public function retornarIdEnderecoUsuario($cpf) {
        $idEnderecos = array();
        $comando = $this->banco->prepare("SELECT $this->consultaColunaId FROM $this->tabela WHERE cpf_cliente = $cpf");
        $comando->execute();
        $lista = $comando->fetch(\PDO::FETCH_ASSOC);

        if(count($lista) != 0) {
            foreach ($lista as $resultadoIdEndereco) {
                /*            $endereco = new EnderecoModel();
                  $endereco->idEndereco = $lista["id_endereco"];
                  $endereco->numeroDaCasa = $lista["numero"];
                  $endereco->complemento = $lista["complemento"];
                  $endereco->cpfCliente = $lista["cpf_cliente"];
                  $endereco->cep = $lista["cep"];
                 */
                $idEnderecos = $resultadoIdEndereco;
            }
            return $idEnderecos;
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

    public function getCpfCliente() {
        return $this->cpfCliente;
    }

    public function getCep() {
        return $this->cep;
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

    public function setCpfCliente($cpfCliente) {
        $this->cpfCliente = $cpfCliente;
    }

    public function setCep($cep) {
        $this->cep = $cep;
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

}
