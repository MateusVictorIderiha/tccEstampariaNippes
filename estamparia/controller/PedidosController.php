<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;

use estamparia\view\PedidosView;
use estamparia\controller\PadraoController;
use estamparia\model\ProdMateriaPrimaModel;
use estamparia\model\CorModel;
use estamparia\model\TamanhoModel;
use estamparia\model\OrcamentoModel;
use estamparia\model\ClienteModel;

/**
 * Description of PedidosController
 *
 * @author Mateus
 */
class PedidosController implements PadraoController{
    //put your code here
    private $idProduto;
    private $nome;
    private $idCor;
    private $tamanho;
    
    public function mostrarPagina() {
        isset($_SESSION) ? "" : session_start();
        if(isset($_COOKIE["usuario"]) and isset($_COOKIE["senha"])){
            $usuario = $_COOKIE["usuario"];
            $senha = base64_decode($_COOKIE["senha"]);
        } elseif (isset($_SESSION["usuario"]) and isset($_SESSION["senha"])) {
            $usuario = $_SESSION["usuario"];
            $senha = base64_decode($_SESSION["senha"]);
        }  else {
            $objPedidos = new PedidosView();
            echo "Você deve estar logado para fazer um pedido. <a href=?pagina=wp_login>"
            . "Clique aqui para LOGAR</a>";
            $objPedidos->mostrarRodape();
        }
        if(isset($usuario) and isset($senha)){
            $produtoMateriaPrima = new ProdMateriaPrimaModel();
            $lista = $produtoMateriaPrima->consultarTodosSemEstampa();

            foreach ($lista as $produtoMateria) {
                $itensUnicos[$produtoMateria["id_produto"]] = $produtoMateria["nome"];
            }

            $objPedidos = new PedidosView(array_unique($itensUnicos));
            $objPedidos->mostrarConteudo();
            $objPedidos->mostrarRodape();
        } else {
            $objCliente = new ClienteModel();
            $objCliente->expulsaUsuario();
        }
    }
    
    public function pegarCores() {
      $this->idProduto = $_POST["idProduto"];
      $objProdMateria = new ProdMateriaPrimaModel($this->idProduto);
      $listaProdutos = $objProdMateria->mostrarCoresProduto();
      
      echo "<option value=''></option>";
      foreach ($listaProdutos as $produto) {
          $objCor = new CorModel($produto["id_cor"]);
          echo "<option value='$produto[id_cor]'>". $objCor->getCor() ."</option>";
          unset($objCor);
      }
    }
    
    public function pegarTamanhos() {
        if(isset($_POST["cor"])){
            $this->idProduto = $_POST["idProduto"];

            $objProdMateria = new ProdMateriaPrimaModel($this->idProduto);
            $listaProdutos = $objProdMateria->mostrarTamanhosProduto($_POST["cor"]);

            echo "<option value=''></option>";
            foreach ($listaProdutos as $produto) {
              $objTamanho = new TamanhoModel($produto["id_tamanho"]);
              echo "<option value='$produto[id_tamanho]'>".$objTamanho->getTamanho() ."</option>";
              unset($objTamanho);
            } 
        }
    }
    
    public function pegarIdProduto() {
        if(isset($_POST["modelo"]) && isset($_POST["tamanho"]) && isset($_POST["cor"])){
            $idExemplosModelos = $_POST["modelo"];
            $objProduto = new ProdMateriaPrimaModel($idExemplosModelos);
            $nome = $objProduto->getNome();
            $listaPrdouto = $objProduto->encontrarIdProdutoSemelhante($nome, $_POST["cor"], $_POST["tamanho"]);
            if($listaPrdouto){
                echo "<input type='hidden' name='idProduto' value='".$listaPrdouto['id_produto']."' />";
                echo "<a href='?pagina=wp_produto&acao=consultar_produto&id="
                .$listaPrdouto['id_produto']."' target='_blank'>Ver a camiseta</a>";
            } else{
                echo "nenhum registro";
            }
        }else{
            echo "não pego";
        }
    }
    
    public function fazerPedido() {
        //$modelo = $_POST["modelo"];
        //$cor = $_POST["cor"];
        //$tamanho = $_POST["tamanho"];
        $tamanho = $_POST["tamanho"];
        $quantidadeTotal = $_POST["qtdTotal"];
        $descricao = $_POST["descricao"];
        $idProduto = $_POST["idProduto"];

        
        if(isset($_COOKIE["usuario"]) and isset($_COOKIE["senha"])){
            $usuario = $_COOKIE["usuario"];
            $senha = base64_decode($_COOKIE["senha"]);
        } elseif (isset($_SESSION["usuario"]) and isset($_SESSION["senha"])) {
            $usuario = $_SESSION["usuario"];
            $senha = base64_decode($_SESSION["senha"]);
        }
        if(isset($usuario) and isset($senha)){
            $objOrcamento = new OrcamentoModel();
            $objOrcamento->setProduto($idProduto);
            
            $objCliente = new ClienteModel($usuario, $senha);
            $objOrcamento->setIdEndereco(1);
            $objOrcamento->setIdCliente($objCliente->getIdUsuario());
            
            $produtoVenda[] = array("id_produto" => $idProduto, "quantidade" => $quantidadeTotal);
            $objOrcamento->setProdutoVenda($produtoVenda);
            
            $objProduto = new ProdMateriaPrimaModel();
            $caminhoUsuario = $objCliente->getCaminhoUsuario();
            $idCliente = $objCliente->getIdUsuario();
            
            $venda = $objOrcamento->inserir();
            if($venda != 0){
                $prodVenda = $objOrcamento->inserirProdutoVenda();
                if($prodVenda){
                    $objProduto->fazerUploadFoto("../imagens/".$caminhoUsuario.$idCliente);
                }
            }

        } else {
            $objCliente = new ClienteModel();
            $objCliente->expulsaUsuario();
        }
    }
}
