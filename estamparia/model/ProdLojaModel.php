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
    protected $personalizado = "N";
    
    public function consultarTodosProdutosLoja() {
        $comando = $this->banco->prepare("SELECT * FROM $this->tabela WHERE personalizado='N'");
        $comando->execute();
        $lista = $comando->fetchAll(\PDO::FETCH_ASSOC);
        return $lista;
    }
    
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

    public function inserirCarrinho() {
        $_COOKIE[$this->idProduto] = $this->idProduto;
        //setcookie("produtos", $listaProduto, time()+604800);
    }
    
    public function removerCarrinho() {
        setcookie("produtos"[$this->idProduto]);
    }
    
    public function saidaEstoque($quantidadeSaida) {
        $lista = $this->consultarEstoque($this->idProduto, $this->idTamanho);

        if($lista){            
            $quantidade = $lista["quantidade"];
            if($quantidade >= $quantidadeSaida){
                $quantidadeAtual = $quantidade - $quantidadeSaida;
                
                $comando = $this->banco->prepare("UPDATE tcc_estoque SET quantidade=:qtdAtual"
                        . " WHERE id_produto = $this->idProduto and id_tamanho = $this->idTamanho");
                $comando->bindParam(":qtdAtual", $quantidadeAtual);
                return $comando->execute();
            }
        } else {
            return "Não há produto em estoque";
        }
    }
    
    public function entradaEstoque($quantidadeEntrada) {
        $lista = $this->consultarEstoque($this->idProduto, $this->idTamanho);
            
        if($lista){            
            $quantidade = $lista["quantidade"];
            if($quantidadeEntrada > 0){
                $quantidadeAtual = $quantidade + $quantidadeEntrada;
                
                $comando = $this->banco->prepare("UPDATE tcc_estoque SET quantidade=:qtdAtual"
                        . " WHERE id_produto = $this->idProduto and id_tamanho = $this->idTamanho");
                $comando->bindParam(":qtdAtual", $quantidadeAtual);
                return $comando->execute();
            }
        } else {
            return "Não há produto em estoque";
        }
    }
    
}
