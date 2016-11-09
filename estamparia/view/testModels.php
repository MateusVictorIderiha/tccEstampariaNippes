<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use estamparia\model\ClienteModel;
use estamparia\model\CamisetaModel;
use estamparia\model\VendaModel;

require_once '../../vendor/autoload.php';

$objCli = new ClienteModel("45899604867", "123456");
var_dump($objCli->mostrarInformacoes());

//var_dump($objProd->saidaEstoque(2));
var_dump($objProd = new CamisetaModel("1","1"));
// var_dump($objProd->entradaEstoque(5));
var_dump($objProd = new CamisetaModel("1","1"));

var_dump($objVenda = new VendaModel());
$objVenda->setIdVenda("3");

$objVenda->setIdProduto("1");
$objVenda->setQuantidade(4);
//var_dump($objVenda->inserir());

var_dump($objVenda->inserirProdutoVenda());
var_dump($objVenda);