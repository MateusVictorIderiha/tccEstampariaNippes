<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\model;

use estamparia\model\VendaModel;

/**
 * Description of OrcamentoModel
 *
 * @author Mateus
 */
class OrcamentoModel extends VendaModel {
    //put your code here
    protected $idFuncionario;
    protected $dataOrcamento;
    protected $foto;
    protected $idModeloEstampa;
    protected $descricaoPedido;
    protected $tipoFormandos;
    protected $tipoVenda = "O";
    
    public function __construct($idVenda = null, $idProduto = null) {
        parent::__construct($idVenda, $idProduto);
        
            $usarConsulta = empty($idProduto) ? ($this->consultar($idVenda)) :
                ($this->consultarVendaProdutovenda($idVenda, $idProduto));
            $lista = $usarConsulta;
            if($lista){
                $this->idFuncionario = $lista["id_funcionario"];
                $this->dataOrcamento = $lista["dataOrcamento"];
                $this->foto = $lista["foto"];
                $this->idModeloEstampa = $lista["id_modEstampa"];
                $this->descricaoPedido = $lista["descricaoPedido"];
                $this->tipoFormandos = $lista["tipoFormandos"];
            }
    }
    
    public function getIdFuncionario() {
        return $this->idFuncionario;
    }

    public function getDataOrcamento() {
        return $this->dataOrcamento;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getIdModeloEstampa() {
        return $this->idModeloEstampa;
    }

    public function getTipoVenda() {
        return $this->tipoVenda;
    }

    public function setIdFuncionario($idFuncionario) {
        $this->idFuncionario = $idFuncionario;
    }

    public function setDataOrcamento($dataOrcamento) {
        $this->dataOrcamento = $dataOrcamento;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setIdModeloEstampa($idModeloEstampa) {
        $this->idModeloEstampa = $idModeloEstampa;
    }

    public function setTipoVenda($tipoVenda) {
        $this->tipoVenda = $tipoVenda;
    }

    public function continuarOrcamento() {
        setcookie("idVenda", $this->idVenda);
    }
    
    public function getDescricaoPedido() {
        return $this->descricaoPedido;
    }

    public function getTipoFormandos() {
        return $this->tipoFormandos;
    }

    public function setDescricaoPedido($descricaoPedido) {
        $this->descricaoPedido = $descricaoPedido;
    }

    public function setTipoFormandos($tipoFormandos) {
        $this->tipoFormandos = $tipoFormandos;
    }
    
    public function validandoOrcamento() {
        if(isset($_COOKIE['idVenda'])){
            $comando = $this->banco->prepare("SELECT VendaStatus FROM $this->tabela"
                    . " WHERE id_venda = ".$_COOKIE['idVenda']);
            $comando->execute();
            $produto = $comando->fetch(\PDO::FETCH_ASSOC);
            if($produto["VendaStatus"] == "Solicitado"){
                return true;
            } else {
                return false;
            }
        } else {
            echo "semcokie";
            return false;
        }
    }
        
    public function inserir() {
        $comando = $this->banco->prepare("INSERT INTO $this->tabela"
                . "(dataAberto, VendaStatus, tipoVenda, id_cliente, id_endereco) "
                . "VALUES (:dataAberto, :VendaStatus, :tipoVenda, :id_cliente, :id_endereco)");
        date_default_timezone_set("Brazil/East");
        $this->dataAberto = date('Y-m-d H:i:s');
        $comando->bindParam(":dataAberto", $this->dataAberto);
        $this->statusDaVenda = "Solicitado";
        $comando->bindParam(":VendaStatus", $this->statusDaVenda);
        $comando->bindParam(":tipoVenda", $this->tipoVenda);
        $comando->bindParam(":id_cliente", $this->idCliente);
        $comando->bindParam(":id_endereco", $this->idEndereco);
        $comando->execute();
        return $this->banco->lastInsertId();
    }
    
    public function inserirProdutoVenda() {
       /* foreach ($this->produtosVenda as $produtoVenda){
            if(isset($produtoVenda["quantidade"]) and isset($produtoVenda["id_produto"])){
                foreach ($produtoVenda["quantidade"] as $quantidadeTotal){
                    $comando = $this->banco->prepare("INSERT INTO tcc_produtovenda"
                            . "(quantidade, id_ModEstampa, id_produto, id_venda) "
                            . "VALUES (:quantidade, :id_ModEstampa, :id_produto, :id_venda)");
                    var_dump($quantidadeTotal);
                    var_dump($this->idModeloEstampa);
                    var_dump($produtoVenda["id_produto"]);
                    var_dump($this->idVenda);
                    $comando->bindParam(":quantidade", $quantidadeTotal);
                    $comando->bindParam(":id_ModEstampa", $this->idModeloEstampa);                     
                    $comando->bindParam(":id_produto", $produtoVenda["id_produto"]);
                    $comando->bindParam(":id_venda", $this->idVenda);
                    $comando->execute();
                    return $comando ? true : false;
                }
            } else {
                return false; //já existe
            }*/
        if(isset($this->produtosVenda["quantidade"]) and isset($this->produtosVenda["id_produto"])){
            $comando = $this->banco->prepare("INSERT INTO tcc_produtovenda"
                    . "(quantidade, id_ModEstampa, id_produto, id_venda, descricaoPedido, tipoFormandos) "
                    . "VALUES (:quantidade, :id_ModEstampa, :id_produto, :id_venda, "
                    . ":descricao, :formandos)");
            $comando->bindParam(":quantidade", $this->produtosVenda["quantidade"]);
            $comando->bindParam(":id_ModEstampa", $this->idModeloEstampa);                     
            $comando->bindParam(":id_produto", $this->produtosVenda["id_produto"]);
            $comando->bindParam(":id_venda", $this->idVenda);
            $comando->bindParam(":descricao", $this->descricaoPedido);
            $comando->bindParam(":formandos", $this->tipoFormandos);
            $comando->execute();
            return $this->banco->lastInsertId();
        }
    }
    
        public function editar($id) {
        $comando = $this->banco->prepare("UPDATE $this->tabela SET "
                . "`VendaStatus`=:vendaStatus, `tipoVenda`=:tipoVenda, 
                    `desconto`=:desconto, `total`=:total,`id_cliente`=:idCliente, 
                    `id_funcionario`=:idFuncionario, `id_endereco`=:idEndereco, 
                    `dataOrcamento`=:dataOrcamento  WHERE $this->consultaColunaId = $id");
        $comando->bindParam(":VendaStatus", $this->statusDaVenda);
        $comando->bindParam(":tipoVenda", $this->tipoVenda);
        $comando->bindParam(":desconto", $this->desconto);
        $comando->bindParam(":total", $this->total);
        $comando->bindParam(":idCliente", $this->idCliente);
        $comando->bindParam(":idEndereco", $this->idEndereco);
        $comando->bindParam(":idFuncionario", $this->idFuncionario);
        $comando->bindParam(":dataOrcamento", "date('Y-m-d h:i:s')");
        $comando->execute();
    }

    public function editarProdutoVenda($idVenda, $idProduto) {
        $comando = $this->banco->prepare("UPDATE `tcc_produtovenda` SET `"
                . "preco`=:preco,`foto`=:foto,`id_ModEstampa`=:id_ModEstampa"
            . " WHERE id_venda = $idVenda and id_produto = $idProduto");
        $comando->bindParam(":preco", $this->precoProdutos);
        $comando->bindParam(":foto", $this->foto);
        $comando->bindParam(":id_ModEstampa", $this->idModeloEstampa);
        $comando->execute();
    }
}
