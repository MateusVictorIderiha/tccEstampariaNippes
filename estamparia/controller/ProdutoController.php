<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;

use estamparia\model\CamisetaModel;
use estamparia\model\ProdLojaModel;
use estamparia\view\CatalagoView;

/**
 * Description of ProdutoController
 *
 * @author Mateus
 */
class ProdutoController {
    //put your code here
    
    public function mostrarPagina() {
        $objProduto = new ProdLojaModel();
        $listaProdutos = $objProduto->consultarTodosProdutosLoja();
        $objCatalogo = new CatalagoView($listaProdutos);
        $objCatalogo->mostrarConteudo();
        $objCatalogo->mostrarRodape(); 
    }
    
    public function consultarProduto(){
        if(isset($_GET["id"])){
            $objProduto = new ProdLojaModel();
            $produto = $objProduto->consultar($_GET["id"]);
            if($produto["personalizado"] == "N" and $produto["preco"] !== 0){
                var_dump($produto);
            }
            
        } else {
            echo "Não há produto";
        }
    }
    
    public function adicionarCarrinho() {
        if(isset($_GET["id"])){
            $objProduto = new ProdLojaModel();
            $objProduto->setIdProduto($_GET["id"]);
            $objProduto->setIdCor($_GET["idCor"]);
            $objProduto->setIdTamanho($_GET["idTamanho"]);
            $objProduto->inserirCarrinho();
        }
    }
    
    public function removerCarrinho() {
        if(isset($_GET["id"])){
            $objProduto = new ProdLojaModel();
            $objProduto->setIdProduto($_GET["id"]);
            $objProduto->removerCarrinho();
        }
    }
}
