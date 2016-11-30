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
                echo $novoNome = date('Y-m-d_H-i-s').$extensao;
                move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho.$novoNome);
                return $novoNome;
            }
        }
    }
    
    public function salvar() {
        array_filter($_POST);
        var_dump($_POST);
        if($_POST["personalizavel"] == "N"){
            $classe = '\estamparia\model\ProdLojaModel';
        } elseif ($_POST["personalizavel"] == "S") {
            $classe = '\estamparia\model\ProdMateriaPrimaModel';
        }
        if(!isset($_POST["idProduto"]) || empty($_POST["idProduto"])){
            $objProduto = new $classe();
            $objProduto->setNome($_POST["nome"]);
            $objProduto->setModelo($_POST["modelo"]);
            $objProduto->setMaterial($_POST["tecido"]);
            $objProduto->setIdCor($_POST["cor"]);
            $objProduto->setIdTamanho($_POST["tamanho"]);
            $objProduto->setPreco($_POST["preco"]);
            $objProduto->setQuantidadeTotal($_POST["quantidadeestoque"]);
            //$caminho = "E:/ETEC/3TIPIT/DS2/UwAmp/www/tcc/estamparia/imagens/usuarios/produtos/";
//            getcwd();dir
            $nomeFoto = $objProduto->fazerUploadFoto($caminho);
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
            $quantidadeTotal = $objProduto->getQuantidadeTotal() - $_POST["quantidadeestoque"];
            $objProduto->setQuantidadeTotal($quantidadeTotal);
            if(isset($_FILES)){
                var_dump($_FILES);
                $caminho = "E:/ETEC/3TIPIT/DS2/UwAmp/www/tcc/estamparia/imagens/usuarios/produtos/";
                $nomeFoto = $this->fazerUploadFoto($caminho);
                $objProduto->setFotoProduto("produtos/".$nomeFoto);
            } else {
                $objProduto->setFotoProduto($_POST["imagemAtual"]);
            }
           /* $verifica = $objProduto->editar($_POST["idProduto"]);
            if($verifica){
                header("location:?pagina=wp_Produto_Adm");
                echo "PRODUTO EDITADO COM SUCESSO!!!";
            }*/
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
