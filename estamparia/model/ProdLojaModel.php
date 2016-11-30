<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\model;

use estamparia\model\ProdutoModel;

/**
 * Description of ProdLojaModel
 *
 * @author Mateus
 */
class ProdLojaModel extends ProdutoModel{
    //put your code here
    //protected $lotes;
    protected $personalizado = "N";
    
    public function __construct($idProduto = null) {
        parent::__construct($idProduto);
        
        
        /*
          $this->lotes = $this->consultarEstoque($idProduto);
         * $this->lotes = $this->consultarEstoque($idProduto);
        
        if(isset($idProduto)){
            $this->lotes = $this->consultarEstoque($idProduto);
            if($this->lotes){
                $this->quantidadeTotal = $this->calcularQuantidadeTotal($this->lotes);
            }
        }*/
    }
    
    public function getLotes() {
        return $this->lotes;
    }

    public function getQuantidadeTotal() {
        return $this->quantidadeTotal;
    }

    public function getPersonalizado() {
        return $this->personalizado;
    }

    public function setLotes($lotes) {
        $this->lotes = $lotes;
    }

    public function setQuantidadeTotal($quantidadeTotal) {
        $this->quantidadeTotal = $quantidadeTotal;
    }

    public function setPersonalizado($personalizado) {
        $this->personalizado = $personalizado;
    }
    
    public function consultarTodosProdutosLoja() {
        $comando = $this->banco->prepare("SELECT * FROM $this->tabela WHERE personalizado='N'");
        $comando->execute();
        $lista = $comando->fetchAll(\PDO::FETCH_ASSOC);
        return $lista;
    }
/*    
    public function consultarEstoque($idProduto,$idTamanho) {
        $comando = $this->banco->prepare("SELECT * FROM tcc_estoque WHERE "
                . "id_produto=$idProduto and id_tamanho = $idTamanho");
        $comando->execute();
        $listaEstoque = $comando->fetch(\PDO::FETCH_ASSOC);

        if($listaEstoque) {
            return $listaEstoque;
        } else {
            return false;
        }
    }
    
    public function consultarProdutoComEstoque($idProduto, $idTamanho) {  
        $listaEstoque = $this->consultarEstoque($idProduto, $idTamanho);
        if($listaEstoque){
            $listaProduto = $this->consultar($listaEstoque["id_produto"]);
            if($listaProduto){
                $listaProduto["id_tamanho"] = $listaEstoque["id_tamanho"];
                $listaProduto["quantidade"] = $listaEstoque["quantidade"];
                return $listaProduto;
            }
        }
        return false;
    }

    public function calcularQuantidadeTotal($lotes) {
        if(isset($lotes)){
            $quantidade = 0;
            foreach ($lotes as $lote) {
                if(isset($lote["quantidade"]) && $lote["quantidade"] > 0){
                    $quantidade += $lote["quantidade"];
                }
            }
            return $quantidade;
        }
    }
    
    public function consultarEstoque($idProduto){
        $comando = $this->banco->prepare("SELECT * FROM tcc_lotes WHERE id_produto=$idProduto");
        $comando->execute();
        $lista = $comando->fetchAll(\PDO::FETCH_ASSOC);
        return $lista;
    }
    public function consultarProdutoComEstoque($idProduto) {
        $listaProduto = $this->consultar($idProduto);
        if($listaProduto){
            $listaEstoque = $this->consultarEstoque($idProduto);
            
            $listaProduto["lotes"] = $listaEstoque;
            
            $quantidade = $this->calcularQuantidadeTotal($listaProduto["lotes"]);
            $listaProduto["quantidadeTotal"] = $quantidade;
            
            return $listaProduto;
            $listaProduto["id_lotes"] = $listaEstoque["id_lotes"];
            $listaProduto["dataIniciada"] = $listaEstoque["dataIniciada"];
            $listaProduto["dataFinalizada"] = $listaEstoque["dataFinalizada"];
            $listaProduto["ativa"] = $listaEstoque["ativa"];
            $listaProduto["quantidade"] = $listaEstoque["quantidade"];
            
        } else {
            return false;
        }
    }
    */


    public function inserirCarrinho() {
        $_COOKIE[$this->idProduto] = $this->idProduto;
        //setcookie("produtos", $listaProduto, time()+604800);
    }
    
    public function removerCarrinho() {
        setcookie("produtos"[$this->idProduto]);
    }
    
    public function saidaEstoque($quantidadeSaida) {
        /*$this->lotes = $this->consultarEstoque($this->idProduto);
        $this->calcularQuantidadeTotal($this->lotes);
        if($this->quantidadeTotal > 0 && $this->quantidadeTotal >= $quantidadeSaida){
            foreach ($this->lotes as $lote) {
                // QtdAtualLote - QtdSaida é igual = RESULTADO, se for negativo passa para o próximo lote pois FALTOU ficou DEVENDO
                $quantidadeSaida = $lote["quantidade"] - $quantidadeSaida; 

                if($quantidadeSaida >= 0){
                    // Se for positivo executa e da update normal
                    $comando = $this->banco->prepare("UPDATE tcc_estoque SET quantidade=:qtdAtual"
                            . " WHERE id_produto = $this->idProduto and id_lotes = ".$lote["id_lotes"]);
                    $comando->bindParam(":qtdAtual", $quantidadeSaida);
                    return $comando->execute(); // PARA AQUI
                } else {
                    $comando = $this->banco->prepare("UPDATE tcc_estoque SET "
                            . "quantidade=:qtdAtual, dataFinalizada=:dataFinalizada"
                        . " WHERE id_produto = $this->idProduto and id_lotes = ".$lote["id_lotes"]);
                    $comando->bindParam(":qtdAtual", 0); // zerou o estoque que ficou DEVENDO e Finalizou o lote com DATA
                    $dataFin = date("Y-m-d");
                    $comando->bindParam(":dataFinalizada", $dataFin); // zerou o estoque que ficou DEVENDO e Finalizou o lote com DATA
                    $comando->execute();
                    $quantidadeSaida = $quantidadeSaida * -1; // transformando negativo em POSITIVO, para calcular o que FALTOU, ficou DEVENDO
                }
            }
        } else {
            return "Não há produtos em estoque";
        }*/
        if($this->quantidadeTotal > 0 && $this->quantidadeTotal >= $quantidadeSaida){
            $quantidadeAtual = $this->quantidadeTotal - $quantidadeSaida;
            if($quantidadeAtual >= 0){
                $comando = $this->banco->prepare("UPDATE tcc_estoque SET quantidade=:qtdAtual"
                        . " WHERE id_produto = $this->idProduto and id_lotes = ".$quantidadeAtual);
                $comando->bindParam(":qtdAtual", $quantidadeSaida);
                return $comando->execute(); // PARA AQUI
            }

        } else {
            return "Não há produtos em estoque";
        }
        
    }
    /*
    public function entradaEstoque($quantidadeEntrada) {
        if($quantidadeEntrada > 0){
            $comando = $this->banco->prepare("INSERT INTO tcc_lotes(dataIniciada, "
                    . "quantidade, id_produto) VALUES (:dataIniciada, :quantidade, :id_produto)");
            $dataIni = date("Y-m-d");
            $comando->bindParam(":dataIniciada", $dataIni);
            $comando->bindParam(":quantidade", $quantidadeEntrada);
            $comando->bindParam(":id_produto", $this->idProdutos);       
            return $comando->execute();
        }
    }
         */
}
