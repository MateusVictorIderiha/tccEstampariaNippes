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
    protected $produtosVenda; // idProdutoVenda
    protected $idVenda;
    //protected $quantidade;
    //protected $precoProdutos;
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

    public function __construct($idVenda = null, $idProdutoVenda = null) {
        parent::__construct();
        $usarConsulta = empty($idProdutoVenda) ? ($this->consultar($idVenda)) :
                ($this->consultarVendaComProdutovenda($idProdutoVenda));
        $lista = $usarConsulta;
        if($lista) {
            (!empty($idProdutoVenda)) ? ($this->idVenda = $lista["id_venda"]) : "";
            $this->idVenda = $lista["id_venda"];
            $this->produtoVenda = array("id_produtoVenda" => $lista["id_produtoVenda"],
                "id_produto" => $lista["id_produto"], "id_venda" => $lista["id_venda"], "quantidade" => $lista["quantidade"]);
            $this->dataAberto = $lista["dataAberto"];
            $this->dataFinalizado = $lista["dataFinalizada"];
            $this->tipoVenda = $lista["tipoVenda"];
            $this->statusDaVenda = $lista["VendaStatus"];
            $this->desconto = $lista["desconto"];
            $this->total = $lista["total"];
            $this->idEndereco = $lista["id_endereco"];
            (!empty($idProdutoVenda)) ? ($this->idCliente = $lista["id_cliente"]) : "";
            //(!empty($idProduto)) ? ($this->quantidade = $lista["quantidade"]) : "";
            //(!empty($idProduto)) ? ($this->precoProdutos = $lista["preco"]) : "";
        }
    }

    public function __get($propriedade) {
        
    }

    public function getProdutosVenda() {
        return $this->produtosVenda;
    }

    public function getIdVenda() {
        return $this->idVenda;
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

    public function setProdutosVenda($produtoVenda) {
        $this->produtosVenda = $produtoVenda;
    }

    public function setIdVenda($idVenda) {
        $this->idVenda = $idVenda;
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

    public function getTipoVenda() {
        if($this->tipoVenda == "V") {
            return "Venda";
        } elseif($this->tipoVenda == "O") {
            return "Orçamento";
        }
    }

    public function consultarProdutoVenda($idVenda) {
        $comando = $this->banco->prepare("SELECT * FROM tcc_produtoVenda WHERE "
                . "id_venda = :idVenda");
        $comando->bindParam(":idVenda", $idVenda);

        $comando->execute();
        $listaProdutoVenda = $comando->fetch(\PDO::FETCH_ASSOC);
        if($listaProdutoVenda) {
            return $listaProdutoVenda;
        } else {
            return false;
        }
    }

    public function consultarVendaComProdutovenda($idVenda) { // Consulta na Venda e ProdutoVenda
        $listaProdutoVenda = $this->consultar($idVenda);
        if($listaProdutoVenda) {
            $listaVenda = $this->consultarProdutoVenda($listaProdutoVenda["id_venda"]); // Consulta tcc_venda
            if($listaVenda) {
                $listaProdutoVenda["quantidade"] = $listaVenda["quantidade"];
                $listaProdutoVenda["preco"] = $listaVenda["preco"];
                $listaProdutoVenda["foto"] = $listaVenda["foto"];
                $listaProdutoVenda["id_ModEstampa"] = $listaVenda["id_ModEstampa"];
                $listaProdutoVenda["id_produto"] = $listaVenda["id_produto"];

                return $listaProdutoVenda; // lista Venda e ProdutoVenda
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function consultarVendaCliente($idCliente) {
        $comando = $this->banco->prepare("SELECT * FROM tcc_vendas WHERE "
                . "id_cliente = :idCliente");
        $status = "Finalizado";
        $comando->bindParam(":idCliente", $idCliente);

        $comando->execute();
        $listaProdutoVenda = $comando->fetchAll(\PDO::FETCH_ASSOC);
        if($listaProdutoVenda) {
            return $listaProdutoVenda;
        } else {
            return false;
        }
    }

    /*public function consultarProdVendasCliente($id) {
        $vendas = $this->consultarProdVendasCliente($id);
        foreach ($vendas as $venda) {
            $comando = $this->banco->prepare("SELECT * FROM tcc_produtoVenda WHERE "
                    . "id_venda = :idVenda");
            $comando->bindParam(":idVenda", $venda["id_venda"]);
            $comando->execute();
            $listaProdutoVenda = $comando->fetchAll(\PDO::FETCH_ASSOC);
            if($listaProdutoVenda) {
                $venda[] = $listaProdutoVenda;
            }
        }
        return $vendas;
    }*/
    
    public function calcularTotal() {
        if(isset($this->produtoVenda)){
            foreach ($this->produtoVenda as $produtoVenda) {
                $objProduto = new ProdLojaModel($produtoVenda["id_produto"]);
                $conjuntoPrecos = $objProduto->getPreco() * $produtoVenda["quantidade"];
                $conjuntoTotais[] = $conjuntoPrecos;
            }
            $this->total = array_sum($conjuntoTotais);
        } else {
            return "não há produtos";
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
                . "(dataAberto, VendaStatus, tipoVenda, desconto, total,"
                . " id_cliente, id_funcionario, id_endereco) "
                . "VALUES (:dataAberto, :VendaStatus, :tipoVenda, :desconto, "
                . ":total, :id_cliente, id_funcionario, :id_endereco)");
        date_default_timezone_set("Brazil/East");
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
        foreach ($this->produtosVenda as $produtoVenda){
            if(isset($produtoVenda["quantidade"]) and isset($produtoVenda["id_produto"])){
                $comando = $this->banco->prepare("INSERT INTO tcc_produtovenda"
                        . "(quantidade, preco, id_produto, id_venda) "
                        . "VALUES (:quantidade,:preco, :id_produto,:id_venda)");
                $comando->bindParam(":quantidade", $this->produtoVenda["quantidade"]);

                $objProduto = new ProdLojaModel($this->produtoVenda["id_produto"]);
                $precoUnitario = $objProduto->getPreco();

                $comando->bindParam(":preco", $precoUnitario);
                $comando->bindParam(":id_produto", $this->produtoVenda["id_produto"]);
                $comando->bindParam(":id_venda", $this->idVenda);
                return $comando->execute() ? true : false;
            } else {
                return false; //já existe
            }
        }
    }

    public function mostrarInformacoes() {
        $informacoes[] = $this->idProdutoVenda;
        $informacoes[] = $this->idVenda;
        $informacoes[] = $this->idProduto;
        //$informacoes[] = $this->precoProdutos;
        //$informacoes[] = $this->quantidade;
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
