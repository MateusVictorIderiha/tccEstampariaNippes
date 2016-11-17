<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdutoModel
 *
 * @author rm02540
 */

namespace estamparia\model;

use estamparia\libs\Crud;
use estamparia\libs\TamanhoModel;

abstract class ProdutoModel extends Crud {

    //put your code here
    protected $idProduto;
    protected $nome;
    protected $preco;
    protected $fotoProduto;
    //protected $marca;
    protected $peso;
    protected $tipoProduto;
    protected $idModelo;
    protected $material;
    protected $categoria;
    protected $personalizado = "N";
    protected $idCor;
    protected $idTamanho;
    protected $quantidade;
    protected $tabela = "tcc_produtos";
    protected $consultaColunaId = "id_produto";

    public function __construct($idProduto = null, $idTamanho = null , $personalizado = null) {
        parent::__construct();

            $usarConsulta = empty($idTamanho) ? ($this->consultar($idProduto)) :
                ($this->consultarProdutoComEstoque($idProduto, $idTamanho));
            $lista = $usarConsulta; // Consultar Produto ou Consultar Estoque e Produto
            if($lista) {
                $this->idProduto = $lista["id_produto"];
                $this->nome = $lista["nome"];
                $this->preco = $lista["preco"];
                $this->fotoProduto = $lista["fotoProduto"];
                $this->modelo = $lista["modelo"];
                $this->material = $lista["material"];
                $this->idCor = $lista["id_cor"];
                $this->categoria = $lista["categoria"];
                $this->tipoProduto = $lista["tipoProduto"];
                $this->peso = $lista["peso"];
                ($personalizado == "S") ? ($this->personalizado = $personalizado) : "";
                (!empty($idTamanho)) ? ($this->idTamanho = $lista["id_tamanho"]) : "";
                (!empty($idTamanho)) ? ($this->quantidade = $lista["quantidade"]) : "";
            }
    }

    public function __get($propriedade) {
        if($propriedade == "Cor") {
            $objCor = new CorModel($this->idCor);
            return $objCor;
        }

        if($propriedade == "Tamanho") {
            $objTamanho = new TamanhoModel();
            return $objTamanho;
        }
    }

    public function getIdProduto() {
        return $this->idProduto;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getFotoProduto() {
        return $this->fotoProduto;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getTipoProduto() {
        return $this->tipoProduto;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getMaterial() {
        return $this->material;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getPersonalizado() {
        return $this->personalizado;
    }

    public function getIdCor() {
        return $this->idCor;
    }

    public function getIdTamanho() {
        return $this->idTamanho;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function setFotoProduto($fotoProduto) {
        $this->fotoProduto = $fotoProduto;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function setTipoProduto($tipoProduto) {
        $this->tipoProduto = $tipoProduto;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function setMaterial($material) {
        $this->material = $material;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function setPersonalizado($personalizado) {
        $this->personalizado = $personalizado;
    }

    public function setIdCor($idCor) {
        $this->idCor = $idCor;
    }

    public function setIdTamanho($idTamanho) {
        $this->idTamanho = $idTamanho;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
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
    
    public function inserir() {
        $comando = $this->banco->prepare("INSERT INTO $this->tabela(`nome`, `preco`,
                `fotoProduto`, `modelo`, `material`, `id_cor`, `categoria`,
                `tipoProduto`, personalizado, peso) VALUES (:nome, :preco, :fotoProduto, :id_modelo,
                :id_material, :id_cor, :id_categoria, :id_tipoProduto, :personalizado, :peso)");
        $comando->bindParam(":nome", $this->nome);
        $comando->bindParam(":preco", $this->preco);
        $comando->bindParam(":fotoProduto", $this->fotoProduto);
        $comando->bindParam(":id_modelo", $this->modelo);
        $comando->bindParam(":id_material", $this->material);
        $comando->bindParam(":id_cor", $this->idCor);
        $comando->bindParam(":id_categoria", $this->categoria);
        $comando->bindParam(":id_tipoProduto", $this->tipoProduto);
        $comando->bindParam(":personalizado", $this->personalizado);
        $comando->bindParam(":peso", $this->peso);
        $comando->execute();

        return $this->banco->lastInsertId();
    }

    public function editar($id) {
        $comando = $this->banco->prepare("UPDATE $this->tabela SET "
                . "`nome`=:nome, `preco`=:preco, fotoProduto`=:fotoProduto,"
                . " `modelo`=:id_modelo, `material`=:id_material,`id_cor`=:id_cor,"
                . " `categoria`=:id_categoria,`tipoProduto`=:id_tipoProduto, `peso`=:peso"
                . " WHERE $this->consultaColunaId = $id");
        $comando->bindParam(":nome", $this->nome);
        $comando->bindParam(":preco", $this->preco);
        $comando->bindParam(":fotoProduto", $this->fotoProduto);
        $comando->bindParam(":id_modelo", $this->modelo);
        $comando->bindParam(":id_material", $this->material);
        $comando->bindParam(":id_cor", $this->idCor);
        $comando->bindParam(":id_categoria", $this->categoria);
        $comando->bindParam(":id_tipoProduto", $this->tipoProduto);
        $comando->bindParam(":peso", $this->peso);
        $comando->execute();
    }

    public function consultarProdutos() {
        
    }
    
    public function consultarPedidos() {
        
    }
    
    public function consultar() {
        
    }
    
    public function mostrarInformacoes() {
        $informacoes[] = $this->idProduto;
        $informacoes[] = $this->nome;
        $informacoes[] = $this->fotoProduto;
        $informacoes[] = $this->preco;
        $informacoes[] = $this->peso;
        $informacoes[] = $this->personalizado;
        $informacoes[] = $this->idCor;
        $informacoes[] = $this->categoria;
        $informacoes[] = $this->material;
        $informacoes[] = $this->modelo;
        $informacoes[] = $this->tipoProduto;
        $informacoes[] = $this->idTamanho;
        $informacoes[] = $this->quantidade;
        return $informacoes;
    }

}
