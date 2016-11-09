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
            }
    }
    
    public function inserir() {
        $comando = $this->banco->prepare("INSERT INTO $this->tabela"
                . "(`dataAberto`, `VendaStatus`, `tipoVenda`, `id_cliente`, `id_endereco`) "
                . "VALUES (:dataAberto, :VendaStatus, :tipoVenda, :id_cliente, :id_endereco)");
        $comando->bindParam(":dataAberto", "date('Y-m-d H:i:s:')");
        $comando->bindParam(":VendaStatus", $this->statusDaVenda);
        $comando->bindParam(":tipoVenda", $this->tipoVenda);
        $comando->bindParam(":id_cliente", $this->idCliente);
        $comando->bindParam(":id_endereco", $this->idEndereco);
        $comando->execute();
        return $this->banco->lastInsertId();
    }
    
    public function inserirProdutoVenda() {
        $comando = $this->banco->prepare("INSERT INTO `tcc_produtovenda`"
            . "(`quantidade`, `id_ModEstampa`, `id_produto`, `id_venda`) "
                . "VALUES (:quantidade,:id_ModEstampa,:id_produto,:id_venda)");
        $comando->bindParam(":quantidade", $this->quantidade);
        $comando->bindParam(":id_ModEstampa", $this->idModEstampa);
        $comando->bindParam(":id_produto", $this->idProduto);
        $comando->bindParam(":id_venda", $this->idVenda);
        $comando->execute();
        return $this->banco->lastInsertId();
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
