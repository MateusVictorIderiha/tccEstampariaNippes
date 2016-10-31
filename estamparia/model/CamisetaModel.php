<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CamisetaModel
 *
 * @author rm02540
 */

namespace estamparia\model;

use estamparia\model\ProdutoModel;

final class CamisetaModel extends ProdutoModel {

    //put your code here
    protected $idTipoProduto = "Camiseta";
    protected $tabela = "Produto";

    public function getIdTipoProduto() {
        return $this->idTipoProduto;
    }

    public function getTabela() {
        return $this->tabela;
    }

    public function setIdTipoProduto($idTipoProduto) {
        $this->idTipoProduto = $idTipoProduto;
    }

    public function setTabela($tabela) {
        $this->tabela = $tabela;
    }

    public function editar($id) {
        
    }

    public function inserir() {
        
    }

}
