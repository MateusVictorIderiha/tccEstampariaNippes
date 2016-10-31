<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produto
 *
 * @author rm02540
 */

namespace estamparia\model;

use estamparia\libs\CrudEstamparia;

abstract class ProdutoModel extends CrudEstamparia {

    //put your code here
    protected $idProduto;
    protected $nome;
    protected $preco;
    protected $fotoProduto;
    protected $idCor;
    protected $idTipoProduto;
    protected $idMarca;
    protected $idModelo;
    protected $idCategoria;
    protected $idMaterial;
    protected $tabela = "tcc_produtos";
    protected $consultaColunaId = "id_produto";

    
}
