<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use estamparia\model\ClienteModel;
use estamparia\model\CamisetaModel;
use estamparia\model\VendaModel;
use estamparia\model\OrcamentoModel;

require_once '../../vendor/autoload.php';
/*
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
var_dump($objVenda);*/
/*
        $objOrcamento = new OrcamentoModel();
        $produtoVenda = array("id_produto" => 6, "quantidade" => 5);
        $objOrcamento->setProdutosVenda($produtoVenda);
        $objOrcamento->setIdVenda(3);

        $objCliente = new ClienteModel;
        $idCliente = $objCliente->getIdUsuario();
        $objOrcamento->

        echo "Secesso ProdVenda";
        $prodVenda = $objOrcamento->inserirProdutoVenda();
        echo $prodVenda ? "ok":"errou";*/
$objUparImg = new estamparia\controller\PedidosController();
var_dump($objUparImg->fazerUploadFoto("E:/ETEC/3TIPIT/DS2/UwAmp/www/tcc/"
                    . "estamparia/imagens/usuarios/pedidos/"."1"));