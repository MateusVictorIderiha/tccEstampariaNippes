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
use estamparia\model\ModeloEstampaModel;
/**
 * Description of PedidosController
 *
 * @author Mateus
 */
class PedidosController implements PadraoController{
    //put your code here
    private $idProduto;
    private $idVenda;
    private $idUsuario;
    private $idModeloEstampa;
    private $formandos;
    private $quantidade;
    private $descricao;
    private $descricoesPedido;
    private $imagens;
    private $login;
    private $senha;
    private $erro;
        
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
            $objPedidos->mostrarTopo();
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
            $objPedidos->mostrarTopo();
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
    
    public function pegarImg() {
        $this->idProduto = $_POST["idProduto"];
        $objProdMateria = new ProdMateriaPrimaModel($this->idProduto);
        $listaProdutos = $objProdMateria->mostraFotoProduto($_POST["cor"]);
       // echo "<a href='?pagina=wp_produto&acao=consultar_img_produto&id="
         //   .$listaProdutos['id_produto']."' target='_blank'>Ver a camiseta</a>";
        $objProd = new \estamparia\model\ProdLojaModel($listaProdutos["id_produto"]);
        $foto = $objProd->getFotoProduto();
        $caminho = "../imagens/".$foto;
        echo "<img src='".$caminho."' />";
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
        if(isset($_POST["modelo"]) && isset($_POST["cor"]) && isset($_POST["tamanho"])){
            $idExemplosModelos = $_POST["modelo"];
            $objProduto = new ProdMateriaPrimaModel($idExemplosModelos);
            $nome = $objProduto->getNome();
            $listaPrdouto = $objProduto->encontrarIdProdutoSemelhante($nome, $_POST["cor"], $_POST["tamanho"]);
            if($listaPrdouto){
                $name = ($_POST["nameArray"] === "true") ? "idProduto[]" :"idProduto";
                echo "<input class='txtIdProdutoFormandos' type='hidden' "
                . "name='".$name."' value='".$listaPrdouto['id_produto']."' />";
            } else{
                echo "nenhum registro";
            }
        }else{
            echo "não pego";
        }
    }
    
    public function pegaUsuarioLogado() {
        $objUsuario = new ClienteModel();
        if($objUsuario->verificaLoginCookie() || $objUsuario->verificaLoginSessao()){
            $usuario = $objUsuario->pegaValidaId();
            if(isset( $usuario["usuario"]) && isset($usuario["senha"]) && isset($usuario["idUsuario"])){
                $this->idUsuario = $usuario["idUsuario"];
                $this->login = $usuario["usuario"];
                $this->senha = $usuario["senha"];
                return true;
            }
        } 
        $this->erro = $objUsuario->expulsaUsuario();
        return false;
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
            }
        }
    }
    
    public function pegasVariaveisPost() {
        array_filter($_POST);
        if(isset($_POST["qtdTotal"])){
            if(is_array($_POST["qtdTotal"])){
                $this->quantidade = array_filter($_POST["qtdTotal"]);
            } else {
                $this->quantidade = $_POST["qtdTotal"];
            }
        } else {
            $this->erro = "erro: Preencha o campo quantidade que é obrigatorio e deve conter apenas números";
            return false;
        }
        if(isset($_POST["idProduto"])){
            if(is_array($_POST["idProduto"])){
                $this->idProduto = array_filter($_POST["idProduto"]);
            } else {
                $this->idProduto = $_POST["idProduto"];
            }
        } else {
            $this->erro = "Sem campo do produto";
            return false;
        }
        if(isset($_POST["formandos"])){
            $this->formandos = $_POST["formandos"];
        } else {
            $this->formandos = false;
        }

        $this->descricoesPedido = isset($_POST["descricaoPedidos"]) ? $_POST["descricaoPedidos"] : "";
        $this->descricao = isset($_POST["descricao"]) ? $_POST["descricao"] : "";
        return true;
    }
    
    public function fazerPedido() {
        if($this->pegasVariaveisPost() && $this->pegaUsuarioLogado()){
            $objOrcamento = new OrcamentoModel();  
            if($objOrcamento->validandoOrcamento()){
                $this->idVenda = $_COOKIE["idVenda"];
            } else {
                $objCliente = new ClienteModel($this->login, base64_decode($this->senha));
                $objOrcamento->setIdCliente($objCliente->getIdUsuario());
                $objOrcamento->setIdEndereco(1);
                $this->idVenda = $objOrcamento->inserir();
            }
            
            $objModEstampa = new ModeloEstampaModel();
            $objModEstampa->setDescricaoModelo($this->descricao);
            /*$objModEstampa->setCaminhoImagem("E:/ETEC/3TIPIT/DS2/UwAmp/www/tcc/"
                    . "estamparia/imagens/usuarios/pedidos/".$this->idUsuario."/");*/
            $caminhoPadrao = $_SERVER["DOCUMENT_ROOT"];
            $caminho = $caminhoPadrao."tcc/estamparia/imagens/";
            $caminhoImg = "usuarios/pedidos/".$objCliente->getIdUsuario()."/";

            $objModEstampa->setCaminhoImagem($caminhoImg);
            $this->idModeloEstampa = $objModEstampa->inserir();
            $this->idModeloEstampa = 10;

            if($this->formandos === "true"){
                $verificando = $this->cadastrarProdutoVendaFormandos();
                $verificando != 0 ? ($this->fazerUploadFoto($caminho.$caminhoImg)) : "";
                header("location: ?pagina=wp_bem_vindo&acao=mostrar_bem_vindo");
            } else {
                $verificando = $this->cadastrarProdutoVenda();
                $verificando != 0 ? $this->fazerUploadFoto($caminho.$caminhoImg) : "";
                header("location: ?pagina=wp_bem_vindo&acao=mostrar_bem_vindo");
            }
            $continua = isset($_POST["continuar"]) ? $_POST["continuar"] : false;

            if($continua == "true"){
                setcookie("idVenda", $this->idVenda, time()+216000);
                header("location:?pagina=wp_pedidos");
            } else {
                isset($_COOKIE["idVenda"]) ? setcookie($_COOKIE["idVenda"]) : "";
            }
        } else {
            echo $this->erro;
        }
    }

    public function cadastrarProdutoVenda() {
        $objOrcamento = new OrcamentoModel();  
        $objOrcamento->setIdModeloEstampa($this->idModeloEstampa);
        $objOrcamento->setProdutosVenda(array("id_produto" => $this->idProduto, 
            "quantidade" => $this->quantidade));
        $objOrcamento->setIdVenda($this->idVenda);
        $objOrcamento->setTipoFormandos("S");
        $objOrcamento->setDescricaoPedido($this->descricoesPedido);
        return $objOrcamento->inserirProdutoVenda();
        
    }
    
    public function cadastrarProdutoVendaFormandos() {
        if(count($this->idProduto) == count($this->quantidade)){
            foreach ($this->idProduto as $indice => $idProduto) {
                $objOrcamento = new OrcamentoModel();  
                $objOrcamento->setIdModeloEstampa($this->idModeloEstampa);
                $objOrcamento->setProdutosVenda(array("id_produto" => $idProduto, 
                    "quantidade" => $this->quantidade[$indice]));
                $objOrcamento->setTipoFormandos("S");
                $objOrcamento->setDescricaoPedido($this->descricoesPedido);
                $objOrcamento->setIdVenda($this->idVenda);
                $verifica = $objOrcamento->inserirProdutoVenda();
                unset($objOrcamento);
                if(!$verifica){
                    $this->erro = "ja existe";
                }
                return $verifica;
            }
        } else {
            $this->erro = "erro";
        }
    }
}
