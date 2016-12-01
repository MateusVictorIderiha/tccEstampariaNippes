<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view\adm\controller;

use estamparia\view\adm\view\CaracteristicasProdutoView;
use estamparia\controller\PadraoController;
use estamparia\view\adm\view\ProdutoAdmView;
use estamparia\model\ProdLojaModel;
/**
 * Description of ProdutoAdmController
 *
 * @author Mateus
 */
class ProdutoAdmController implements PadraoController{
    //put your code here
    
    public function mostrarPagina() {
        $objProduto = new ProdLojaModel();
        $todos = $objProduto->consultarTudo();
                
        $objCaracteristica = new ProdutoAdmView($todos);
        $objCaracteristica->head();
        $objCaracteristica->mostrarTopo();
        $objCaracteristica->mostrarPagina();
        $objCaracteristica->fecharPagina();
    }
    
    public function mostrarCaracteristicas() {
        $objCaracteristica = new CaracteristicasProdutoView();
        $objCaracteristica->head();
        $objCaracteristica->mostrarTopo();
        $objCaracteristica->mostrarCaracteristicaModelo();
        $objCaracteristica->mostrarCaracteristicaTamanho();
        $objCaracteristica->mostrarCaracteristicaCor();
        $objCaracteristica->fecharPagina();
    }
    
        
    public function fazerUploadFoto($caminho) {     
        if(isset($_FILES["imagem"])){
            date_default_timezone_set("Brazil/East");
            
            $extensao = strtolower(substr($_FILES["imagem"]["name"], -4));
            if($extensao == ".jpeg" || $extensao == ".jpeg2000" || $extensao == ".png" ||
                    $extensao == ".eps" || $extensao == ".crd" || $extensao == ".ai" ||
                    $extensao == ".svg" || $extensao == ".jpg"){
                $novoNome = date('Y-m-d_H-i-s').$extensao;
                move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho.$novoNome);
                return $novoNome;
            }
        }
    }
    
    public function salvar() {
        array_filter($_POST);
        
        if($_POST["personalizavel"] == "N"){
            $classe = '\estamparia\model\ProdLojaModel';
        } elseif ($_POST["personalizavel"] == "S") {
            $classe = '\estamparia\model\ProdMateriaPrimaModel';
        }
        if($_POST["personalizavel"] == 'N' && $_POST["quantidadeestoque"] >= 0){
            $objProduto = new $classe();
            $objProduto->setNome($_POST["nome"]);
            $objProduto->setModelo($_POST["modelo"]);
            $objProduto->setMaterial($_POST["tecido"]);
            $objProduto->setIdCor($_POST["cor"]);
            $objProduto->setIdTamanho($_POST["tamanho"]);
            $objProduto->setPreco($_POST["preco"]);
            $objProduto->setDescricao($_POST["descricao"]);
            if(isset($_POST["quantidadeestoque"]) && $_POST["quantidadeestoque"] >= 0){
                $objProduto->setQuantidadeTotal($_POST["quantidadeestoque"]);
            }
            $caminhoAdm = $_SERVER["DOCUMENT_ROOT"];
            $caminhoImg = $caminhoAdm."tcc/estamparia/imagens/produtos/";
            $nomeFoto = $this->fazerUploadFoto($caminhoImg);
            $objProduto->setFotoProduto("produtos/".$nomeFoto);


            $verifica = $objProduto->inserir();
            if($verifica){
                header("location: ?pagina=wp_Produto_Adm");
                echo "PRODUTO CADASTRADO COM SUCESSO!!!";
            }
        } else {
            $objProduto = new $classe($_POST["idProduto"]);
            $objProduto->setNome($_POST["nome"]);
            $objProduto->setModelo($_POST["modelo"]);
            $objProduto->setMaterial($_POST["tecido"]);
            $objProduto->setIdCor($_POST["cor"]);
            $objProduto->setIdTamanho($_POST["tamanho"]);
            $objProduto->setPreco($_POST["preco"]);
            $objProduto->setDescricao($_POST["descricao"]);

            if($_POST["personalizavel"] == 'N' && $_POST["quantidadeestoque"] >= 0){
                $quantidadeTotal = $objProduto->getQuantidadeTotal() + $_POST["quantidadeestoque"];
                $objProduto->setQuantidadeTotal($quantidadeTotal);
            }
            if(isset($_FILES["imagem"])){
                $caminhoAdm = $_SERVER["DOCUMENT_ROOT"];
                $caminhoImg = $caminhoAdm."tcc/estamparia/imagens/produtos/";
                $nomeFoto = $this->fazerUploadFoto($caminhoImg);
                $objProduto->setFotoProduto("produtos/".$nomeFoto);
            } else {
                $objProduto->setFotoProduto($_POST["imagemAtual"]);
            }
            var_dump($objProduto);
            $verifica = $objProduto->editar($_POST["idProduto"]);
            if($verifica){
                header("location:?pagina=wp_Produto_Adm");
                echo "PRODUTO EDITADO COM SUCESSO!!!";
            }
        }
    }
    
    public function excluir() {
        if(isset($_POST["idProduto"])){
            $objProduto = new \estamparia\model\ProdLojaModel($_POST["idProduto"]);
            if($objProduto->getIdProduto() !== null){
                $excuiu = $objProduto->deletar($objProduto->getIdProduto());
                echo $excuiu == true ? 'id: '.$_POST["idProduto"].' PRODUTO EXCLUÍDO '
                        . 'COM SUCESSO' : 'FALHA AO CADASTRAR ID:'.$_POST["idProduto"].
                        ' você não pode excluir um produto que já foi vendido';
            }
        }
    }
}
