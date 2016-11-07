<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\model\VendaModel;

/**
 * Description of VendaModel
 *
 * @author Mateus
 */
class VendaModel {
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
    
}