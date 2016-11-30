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
//use estamparia\libs\TamanhoModel;

abstract class ProdutoModel extends Crud {
    //put your code here
    protected $idProduto;
    protected $nome;
    protected $preco;
    protected $fotoProduto;
    //protected $marca;
    protected $peso;
    protected $tipoProduto;
    protected $modelo;
    protected $material;
    protected $categoria;
    protected $personalizado;
    protected $idCor;
    protected $quantidadeTotal;    
    protected $idTamanho;
    protected $descricao;
    protected $tabela = "tcc_produtos";
    protected $consultaColunaId = "id_produto";

    public function __construct($idProduto = null) {
        parent::__construct();

            $lista = $this->consultar($idProduto);
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
                $this->personalizado = $lista["personalizado"];
                $this->idTamanho = $lista["id_tamanho"];
                $this->descricao = $lista["descricao"];
                $this->quantidadeTotal = $lista["quantidade"];
            }
    }
    
    public function __set($name, $value) {
        if($value != null && !empty($value)){
            $name = $value;
        }
    }

    public function __get($propriedade) {
        if($propriedade == "Cor") {
            $objCor = new CorModel($this->idCor);
            return $objCor->getCor();
        }
        if($propriedade == "Tamanho") {
            $objTamanho = new TamanhoModel($this->idTamanho);
            return $objTamanho->getTamanho();
        }
/*
        if($propriedade == "Tamanho") {
            $objTamanho = new TamanhoModel();
            return $objTamanho;
        }*/
    }

    public function getIdModelo() {
        return $this->idModelo;
    }

    public function getIdTamanho() {
        return $this->idTamanho;
    }

    public function setIdModelo($idModelo) {
        $this->idModelo = $idModelo;
    }

    public function setIdTamanho($idTamanho) {
        $this->idTamanho = $idTamanho;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
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
/*
    public function mostrarProdutosSemelhantes() {
        $comando = $this->banco->prepare("SELECT * FROM $this->tabela WHERE nome=:nome");
        $comando->bindParam(":nome", $this->nome);
        $comando->execute();
        $lista = $comando->fetchAll(\PDO::FETCH_ASSOC);
        return $lista;
    }*/
    
    public function mostrarTamanhosProduto($cor) {
        $comando = $this->banco->prepare("SELECT DISTINCT id_tamanho FROM $this->tabela "
                . "WHERE nome=:nome and id_cor=:cor");
        $comando->bindParam(":nome", $this->nome);
        $comando->bindParam(":cor", $cor);
        $comando->execute();
        $lista = $comando->fetchAll(\PDO::FETCH_ASSOC);
        return $lista;
    }
     
    public function mostrarCoresProduto() {
        $comando = $this->banco->prepare("SELECT DISTINCT id_cor FROM $this->tabela WHERE nome=:nome");
        $comando->bindParam(":nome", $this->nome);
        $comando->execute();
        $lista = $comando->fetchAll(\PDO::FETCH_ASSOC);
        return $lista;
    }
    
    public function mostraFotoProduto($idCor){
        $comando = $this->banco->prepare("SELECT id_produto FROM $this->tabela WHERE nome=:nome and id_cor = :cor");
        $comando->bindParam(":nome", $this->nome);
        $comando->bindParam(":cor", $idCor);
        $comando->execute();
        $lista = $comando->fetch(\PDO::FETCH_ASSOC);
        return $lista;
    }
    
    public function encontrarIdProdutoSemelhante($nomeModelo, $idCor, $idTamanho) {
        $comando = $this->banco->prepare("SELECT * FROM $this->tabela WHERE "
                . "nome='$nomeModelo' and id_cor=$idCor and id_tamanho=$idTamanho");
        $comando->execute();
        $lista = $comando->fetch(\PDO::FETCH_ASSOC);
        return $lista;
    }
    
    public function inserir() {
        $comando = $this->banco->prepare("INSERT INTO $this->tabela(nome, preco,
                fotoProduto, modelo, material, id_cor, categoria,
                tipoProduto, personalizado, peso, quantidade, id_tamanho) VALUES (:nome, :preco, :fotoProduto, :id_modelo,
                :id_material, :id_cor, :id_categoria, :id_tipoProduto, :personalizado, :peso, :quantidade, :tamanho)");
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
        $comando->bindParam(":quantidade", $this->quantidadeTotal);
        $comando->bindParam(":tamanho", $this->idTamanho);
        $comando->execute();
        var_dump($comando);
        return $this->banco->lastInsertId();
    }

    public function editar($id) {
        $comando = $this->banco->prepare("UPDATE $this->tabela SET "
                . "nome=:nome, preco=:preco, fotoProduto=:fotoProduto,"
                . " modelo=:id_modelo, material=:id_material, id_cor=:id_cor,"
                . " categoria=:id_categoria, tipoProduto=:id_tipoProduto, peso=:peso, id_tamanho=:tamanho"
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
        $comando->bindParam(":tamanho", $this->idTamanho);
        var_dump($comando);
        $verifica = $comando->execute();

        if($verifica){
            return true;
        } else {
            return false;
        }
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
        $informacoes[] = $this->tamanho;
        return $informacoes;
    }
}
