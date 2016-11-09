<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\model;

use estamparia\libs\Crud;

/**
 * Description of VendaModel
 *
 * @author Mateus
 */
class VendaModel extends Crud {

    //put your code here
    protected $idProduto;
    protected $idVenda;
    protected $quantidade;
    protected $precoProdutos;
    protected $dataAberto;
    protected $dataFinalizado;
    protected $statusDaVenda;
    protected $tipoVenda = "V"; // V é tipo VENDA ou O é tipo ORÇAMENTO
    protected $desconto;
    protected $total;
    protected $idCliente;
    protected $idEndereco;
    protected $tabela = "tcc_vendas";
    protected $consultaColunaId = "id_venda";

    public function __construct($idVenda = null, $idProduto = null) {
        parent::__construct();
        $usarConsulta = empty($idProduto) ? ($this->consultar($idVenda)) :
                ($this->consultarVendaProdutovenda($idVenda, $idProduto));
        $lista = $usarConsulta;
        if($lista) {
            (!empty($idProduto)) ? ($this->idVenda = $lista["id_venda"]) : "";
            $this->idVenda = $lista["id_venda"];
            $this->idProduto = $lista["id_produto"];
            $this->dataAberto = $lista["dataAberto"];
            $this->dataFinalizado = $lista["dataFinalizada"];
            $this->tipoVenda = $lista["tipoVenda"];
            $this->statusDaVenda = $lista["VendaStatus"];
            $this->desconto = $lista["desconto"];
            $this->total = $lista["total"];
            $this->idEndereco = $lista["id_endereco"];
            (!empty($idProduto)) ? ($this->idCliente = $lista["id_cliente"]) : "";
            (!empty($idProduto)) ? ($this->quantidade = $lista["quantidade"]) : "";
            (!empty($idProduto)) ? ($this->precoProdutos = $lista["preco"]) : "";
        }
    }

    public function __get($propriedade) {
        
    }

    public function getIdProdutoVenda() {
        return $this->idProdutoVenda;
    }

    public function getIdProduto() {
        return $this->idProduto;
    }

    public function getIdVenda() {
        return $this->idVenda;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getPrecoProdutos() {
        return $this->precoProdutos;
    }

    public function getDataAberto() {
        return $this->dataAberto;
    }

    public function getDataFinalizado() {
        return $this->dataFinalizado;
    }

    public function getStatusDaVenda() {
        return $this->statusDaVenda;
    }

    public function getTipoVenda() {
        if($this->tipoVenda == "V") {
            return "Venda";
        } elseif($this->tipoVenda == "O") {
            return "Orçamento";
        }
    }

    public function getDesconto() {
        return $this->desconto;
    }

    public function getTotal() {
        return $this->total;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function getIdEndereco() {
        return $this->idEndereco;
    }

    public function setIdProdutoVenda($idProdutoVenda) {
        $this->idProdutoVenda = $idProdutoVenda;
    }

    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    public function setIdVenda($idVenda) {
        $this->idVenda = $idVenda;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function setPrecoProdutos($precoProdutos) {
        $this->precoProdutos = $precoProdutos;
    }

    public function setDataAberto($dataAberto) {
        $this->dataAberto = $dataAberto;
    }

    public function setDataFinalizado($dataFinalizado) {
        $this->dataFinalizado = $dataFinalizado;
    }

    public function setStatusDaVenda($statusDaVenda) {
        $this->statusDaVenda = $statusDaVenda;
    }

    public function setTipoVenda($tipoVenda) {
        $this->tipoVenda = $tipoVenda;
    }

    public function setDesconto($desconto) {
        $this->desconto = $desconto;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function setIdEndereco($idEndereco) {
        $this->idEndereco = $idEndereco;
    }

    public function consultarProdutoVenda($idProduto, $idVenda) {
        $comando = $this->banco->prepare("SELECT * FROM tcc_produtoVenda WHERE "
                . "id_produto=:idProduto and id_venda = :idVenda");
        $comando->bindParam(":idProduto", $idProduto);
        $comando->bindParam(":idVenda", $idVenda);
        $comando->execute();
        $listaProdutoVenda = $comando->fetch(\PDO::FETCH_ASSOC);
        if($listaProdutoVenda) {
            return $listaProdutoVenda;
        } else {
            return false;
        }
    }

    public function consultarVendaProdutovenda($idProduto, $idVenda) { // Consulta na ProdutoVenda
        $listaProdutoVenda = $this->consultarProdutoVenda($idProduto, $idVenda);

        if($listaProdutoVenda) {
            $listaVenda = $this->consultar($listaProdutoVenda["id_venda"]); // Consulta tcc_venda
            if($listaVenda) {
                $listaVenda["quantidade"] = $listaProdutoVenda["quantidade"];
                $listaVenda["preco"] = $listaProdutoVenda["preco"];
                $listaVenda["foto"] = $listaProdutoVenda["foto"];
                $listaVenda["id_ModEstampa"] = $listaProdutoVenda["id_ModEstampa"];
                $listaVenda["id_produto"] = $listaProdutoVenda["id_produto"];

                return $listaVenda; // lista Venda e ProdutoVenda
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar($id) {
        $comando = $this->banco->prepare("UPDATE $this->tabela SET "
                . "`dataAberto`=:dataAberto, `VendaStatus`=:vendaStatus, 
                    `tipoVenda`=:tipoVenda, `desconto`=:desconto, `total`=:total, 
                    `id_cliente`=:idCliente, `id_funcionario`=:idFuncionario, 
                    `id_endereco`=:idEndereco, WHERE $this->consultaColunaId = $id");
        $comando->bindParam(":VendaStatus", $this->statusDaVenda);
        $comando->bindParam(":tipoVenda", $this->tipoVenda);
        $comando->bindParam(":desconto", $this->desconto);
        $comando->bindParam(":total", $this->total);
        $comando->bindParam(":idCliente", $this->idCliente);
        $comando->bindParam(":idEndereco", $this->idEndereco);
        $comando->bindParam(":idFuncionario", $this->idFuncionario);
        $comando->execute();
    }
    
    public function inserir() {
        $comando = $this->banco->prepare("INSERT INTO $this->tabela"
                . "(`dataAberto`, `VendaStatus`, `tipoVenda`, `desconto`, `total`,"
                . " `id_cliente`, `id_funcionario`, `id_endereco`) "
                . "VALUES (:dataAberto, :VendaStatus, :tipoVenda, :desconto, "
                . ":total, :id_cliente, id_funcionario, :id_endereco)");
        $this->dataAberto =  date('Y-m-d H:i:s');
        $comando->bindParam(":dataAberto", $this->dataAberto);
        $this->statusDaVenda = "Aberto";
        $comando->bindParam(":VendaStatus", $this->statusDaVenda);
        $comando->bindParam(":tipoVenda", $this->tipoVenda);
        $comando->bindParam(":desconto", $this->desconto);
        $comando->bindParam(":total", $this->total);
        $comando->bindParam(":id_cliente", $this->idCliente);
        $comando->bindParam(":id_endereco", $this->idEndereco);
        $comando->execute();
        return $this->banco->lastInsertId();
    }

    public function inserirProdutoVenda() {
        $valida = $this->consultarProdutoVenda($this->idProduto, $this->idVenda);
        if($valida == 0){
            $comando = $this->banco->prepare("INSERT INTO `tcc_produtovenda`"
                    . "(`quantidade`, `preco`, `id_produto`, `id_venda`) "
                    . "VALUES (:quantidade,:preco, :id_produto,:id_venda)");
            $comando->bindParam(":quantidade", $this->quantidade);
            $comando->bindParam(":preco", $this->precoProdutos);
            $comando->bindParam(":id_produto", $this->idProduto);
            $comando->bindParam(":id_venda", $this->idVenda);
            return $comando->execute() ? true : false;
        } else {
            return false; //já existe
        }
    }

    public function mostrarInformacoes() {
        $informacoes[] = $this->idProdutoVenda;
        $informacoes[] = $this->idVenda;
        $informacoes[] = $this->idProduto;
        $informacoes[] = $this->precoProdutos;
        $informacoes[] = $this->quantidade;
        $informacoes[] = $this->dataAberto;
        $informacoes[] = $this->dataFinalizado;
        $informacoes[] = $this->tipoVenda;
        $informacoes[] = $this->statusDaVenda;
        $informacoes[] = $this->desconto;
        $informacoes[] = $this->total;
        $informacoes[] = $this->idEndereco;
        $informacoes[] = $this->idCliente;
        return $informacoes;
    }

}
