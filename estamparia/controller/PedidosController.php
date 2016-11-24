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
        $objUsuario = new ClienteModel();
        if($objUsuario->verificaLoginCookie() || $objUsuario->verificaLoginSessao()){
            $usuario = $objUsuario->pegaValidaId();
            if($usuario){
                $login = $usuario["usuario"];
                $senha = $usuario["senha"];
            }
        }  else {
            $objPedidos = new PedidosView();
            echo "Você deve estar logado para fazer um pedido. <a href=?pagina=wp_login>"
            . "Clique aqui para LOGAR</a>";
            $objPedidos->mostrarRodape();
        }
        if(isset($login) and isset($senha)){
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
        $idProdutos = $_POST["idProduto"];
        $formandos = $_POST["formandos"];

        $objUsuario = new ClienteModel();
        if($objUsuario->verificaLoginCookie() || $objUsuario->verificaLoginSessao()){
            $usuario = $objUsuario->pegaValidaId();
            if($usuario){
                var_dump($usuario);
                $login = $usuario["usuario"];
                $senha = $usuario["senha"];
            }
        } else {
            $objUsuario->expulsaUsuario();
        }
        if(isset($login) and isset($senha)){
            $objOrcamento = new OrcamentoModel();
            
            $objCliente = new ClienteModel($login, base64_decode($senha));
            $objOrcamento->setIdCliente($objCliente->getIdUsuario());
            //$objOrcamento->setIdEndereco(1);

            echo "Secesso Venda";
            //$venda = $objOrcamento->inserir();
            $venda = true;
            /*
            if($venda != 0){
                if(count($idProduto) == 1){
                    $produtoVenda = array("id_produto" => $idProduto[0], "quantidade" => $quantidadeTotal[0]);
                    $objOrcamento->setProdutoVenda($produtoVenda);
                    

                    echo "Secesso ProdVenda";
                    $prodVenda = $objOrcamento->inserirProdutoVenda();
                    
                } elseif(count($quantidadeTotal) > 1) {
                
                }*/
            if($formandos === "true"){
                
            } else {
                foreach ($idProdutos as $indice => $idProduto) {
                    $produtoVenda = array("id_produto" => $idProduto, "quantidade" => $quantidadeTotal[$indice]);
                    $objOrcamento->setProdutoVenda($produtoVenda);
                    
                    echo "Secesso ProdVenda";
                    $prodVenda = $objOrcamento->inserirProdutoVenda();
                }
            }

                    var_dump($prodVenda);
                if($prodVenda){
                    echo "Upando";
                    $caminhoUsuario = "/usuarios/pedidos/";
                    $idCliente = $objCliente->getIdUsuario();
                    $objProduto->fazerUploadFoto("../imagens".$caminhoUsuario.$idCliente);
                }
        } else {
            $objUsuario->expulsaUsuario();
        }
    }
}
