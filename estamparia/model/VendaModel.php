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
    protected $idProdutoVenda;
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

    public function __construct($idProdutoVenda) {
        parent::__construct();
        if(!empty($idProdutoVenda)) {
            $lista = $this->consultarVendaProdutovenda($idProdutoVenda);
            if($lista) {
                $this->idProdutoVenda = $lista["id_produtoVenda"];
                $this->idVenda = $lista["id_venda"];
                $this->idProduto = $lista["id_produto"];
                $this->dataAberto = $lista["dataAberto"];
                $this->dataFinalizado = $lista["dataFinalizado"];
                $this->tipoVenda = $lista["tipoVenda"];
                $this->statusDaVenda = $lista["statusDaVenda"];
                $this->desconto = $lista["desconto"];
                $this->total = $lista["total"];
                $this->idEndereco = $lista["id_endereco"];
                $this->idCliente = $lista["id_cliente"];
                $this->quantidade = $lista["quantidade"];
                $this->precoProdutos = $lista["preco"];
            }
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

    public function consultarProdutoVenda($idProdutoVenda) {
        $comando = $this->banco->prepare("SELECT * FROM tcc_produtoVenda WHERE "
                . "id_produtoVenda=$idProdutoVenda");
        $comando->execute();
        $listaProdutoVenda = $comando->fetch(\PDO::FETCH_ASSOC);
        if($listaProdutoVenda) {
            return $listaProdutoVenda;
        } else {
            return false;
        }
    }

    public function consultarVendaProdutovenda($idProdutoVenda) { // Consulta na ProdutoVenda
        $listaProdutoVenda = $this->consultarProdutoVenda($idProdutoVenda);

        if($listaProdutoVenda) {
            $listaVenda = $this->consultar($listaProdutoVenda["id_venda"]); // Consulta tcc_venda
            if($listaVenda) {
                $listaVenda[] = $listaProdutoVenda["id_produtoVenda"];
                $listaVenda[] = $listaProdutoVenda["quantidade"];
                $listaVenda[] = $listaProdutoVenda["preco"];
                $listaVenda[] = $listaProdutoVenda["foto"];
                $listaVenda[] = $listaProdutoVenda["id_modEstampa"];
                $listaVenda[] = $listaProdutoVenda["id_produto"];
                return $listaVenda; // lista Venda e ProdutoVenda
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar($id) {
        
    }

    public function inserir() {
        $comando = $this->banco->prepare("INSERT INTO `tcc_produtovenda`"
                . "(`quantidade`, `preco`, `foto`, `id_ModEstampa`, `id_produto`,"
                . " `id_venda`) VALUES (:quantidade,:preco,:foto,:id_ModEstampa,:id_produto,:id_venda)");
        $comando->bindParam(":quantidade", $this->quantidade);
        $comando->bindParam(":preco", $this->precoProdutos);
        $comando->bindParam(":id_ModEstampa", $this->idModEstampa);
        $comando->bindParam(":id_produto", $this->idProduto);
        $comando->bindParam(":id_venda", $this->idVenda);
        $comando->execute();
        return $this->banco->lastInsertId();
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
