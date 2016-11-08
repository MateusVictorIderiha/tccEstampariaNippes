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

class ProdutoModel extends Crud {

    //put your code here
    protected $idProduto;
    protected $nome;
    protected $preco;
    protected $fotoProduto;
    //protected $marca;
    protected $peso;
    protected $idTipoProduto;
    protected $idModelo;
    protected $idMaterial;
    protected $idCor;
    protected $idCategoria;
    protected $personalizado = "N";
    protected $idTamanho;
    protected $quantidade;
    protected $tabela = "tcc_produtos";
    protected $consultaColunaId = "id_produto";

    public function __construct($idProduto = null, $personalizado = null) {
        parent::__construct();

        if(!empty($idProduto) and ! empty($personalizado)) {
            $lista = $this->consultar($idProduto);
            if($lista) {
                $this->idProduto = $lista["id_produto"];
                $this->nome = $lista["nome"];
                $this->preco = $lista["preco"];
                $this->fotoProduto = $lista["fotoProduto"];
                $this->idModelo = $lista["id_modelo"];
                $this->idMaterial = $lista["id_material"];
                $this->idCor = $lista["id_cor"];
                $this->idCategoria = $lista["id_categoria"];
                $this->idTipoProduto = $lista["id_tipoProduto"];
                $this->peso = $lista["peso"];
                ($personalizado == "S") ? ($this->personalizado = $personalizado):"";
            }
        }
    }

    public function __get($propriedade) {       
        if($propriedade == "Cor"){
            $objCor = new CorModel($this->idCor);
            return $objCor;
        }
        
        if($propriedade == "Tamanho"){
            $objTamanho = new TamanhoModel();
            return $objTamanho;
        }
        
        if($propriedade == "quantidade"){
            
        }
    }
    
    
    public function inserir() {
        $comando = $this->banco->prepare("INSERT INTO $this->tabela(`nome`, `preco`,
                `fotoProduto`, `id_modelo`, `id_material`, `id_cor`, `id_categoria`,
                `id_tipoProduto`, peso) VALUES (:nome, :preco, :fotoProduto, :id_modelo,
                :id_material, :id_cor, :id_categoria, :id_tipoProduto, :peso)");
        $comando->bindParam(":nome", $this->nome);
        $comando->bindParam(":preco", $this->preco);
        $comando->bindParam(":fotoProduto", $this->fotoProduto);
        $comando->bindParam(":id_modelo", $this->idModelo);
        $comando->bindParam(":id_material", $this->idMaterial);
        $comando->bindParam(":id_cor", $this->idCor);
        $comando->bindParam(":id_categoria", $this->idCategoria);
        $comando->bindParam(":id_tipoProduto", $this->idTipoProduto);
        $comando->bindParam(":peso", $this->peso);
        $comando->execute();

        return $this->banco->lastInsertId();
    }

    public function editar($id) {
        $comando = $this->banco->prepare("UPDATE $this->tabela SET "
                . "`nome`=:nome, `preco`=:preco, fotoProduto`=:fotoProduto,"
                . " `id_modelo`=:id_modelo, `id_material`=:id_material,`id_cor`=:id_cor,"
                . " `id_categoria`=:id_categoria,`id_tipoProduto`=:id_tipoProduto, `peso`=:peso"
                . " WHERE $this->consultaColunaId = $id");
        $comando->bindParam(":nome", $this->nome);
        $comando->bindParam(":preco", $this->preco);
        $comando->bindParam(":fotoProduto", $this->fotoProduto);
        $comando->bindParam(":id_modelo", $this->idModelo);
        $comando->bindParam(":id_material", $this->idMaterial);
        $comando->bindParam(":id_cor", $this->idCor);
        $comando->bindParam(":id_categoria", $this->idCategoria);
        $comando->bindParam(":id_tipoProduto", $this->idTipoProduto);
        $comando->bindParam(":peso", $this->peso);
        $comando->execute();
    }

    public function mostrarInformacoes() {
        $informacoes[] = $this->idProduto;
        $informacoes[] = $this->nome;
        $informacoes[] = $this->fotoProduto;
        $informacoes[] = $this->preco;
        $informacoes[] = $this->peso;
        $informacoes[] = $this->personalizado;
        $informacoes[] = $this->idProduto;
        $informacoes[] = $this->idCor;
        $informacoes[] = $this->idCategoria;
        $informacoes[] = $this->idMaterial;
        $informacoes[] = $this->idModelo;
        return $informacoes;
    }

}
