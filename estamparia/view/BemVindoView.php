<?php

namespace estamparia\view;

use estamparia\view\EstruturaView;
use estamparia\model\OrcamentoModel;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BemVindoView extends EstruturaView{
    private $nome;
    private $pedido;
    private $compras;
    
    public function __construct($compras) {
        parent::__construct();
        
        $this->compras = $compras;
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function getPedido() {
        return $this->pedido;
    }

    public function getCompras() {
        return $this->compras;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setPedido($pedido) {
        $this->pedido = $pedido;
    }

    public function setCompras($compras) {
        $this->compras = $compras;
    }
    
    public function mostrarConteudo() {
    echo "        
            <section class='margin-left12'>
                <p class='font33px'> Bem-vindo $this->nome";

        echo "  <img src='img/login.png' width='40px'/></p></a>
                <figure>
                    <figcaption class='margin-left'>
                        <a href='?pagina=wp_carrinho&acao=mostrar_carrinho' class='font25px'><b>Confira Seu Carrinho</b></a>
                    </figcaption>
                </figure>		
            </section>
            <section><p class='margin-left12'>Confira suas compras já realizadas</p>


                <table class='container'>
                    <tr>
                        <th>Imagem da estampa</th>
                        <th>Venda</th>
                        <th>Data da iniciada</th> 
                        <th>Data Orcamento</th>
                        <th>Status</th>
                        <th>Quantidade</th>
                        <th>Preco</th>
                        <th>Total</th>
                    </tr>";
        foreach ($this->compras as $venda) {
            $objOrcamento = new OrcamentoModel();
            
            $listaOrcamentos = $objOrcamento->consultarVendaComProdutovenda($venda["id_venda"]);
                   echo " <tr>
                        <td>
                            <figure>
                                <img class='floatleft' width='100px' height='100px' src='' title='Camisa' />
                            </figure>
                        </td>
                        <td><p class='font15px'>".$listaOrcamentos['id_venda']."</p></td>
                        <td><p class='font15px'>".$listaOrcamentos['dataAberto']."</p></td>
                        <td><p class='font15px'>".$listaOrcamentos['dataOrcamento']."</p></td>
                        <td><p class='font15px'>".$listaOrcamentos['VendaStatus']."</p></td>
                        <td><p class='font15px'>".$listaOrcamentos['quantidade']."</p></td>
                        <td><p class='font15px'>".$listaOrcamentos['preco']."</p></td>
                        <td><p class='font15px'>".$listaOrcamentos['total']."</p></td>
                    </tr>";
            }
        
                echo "</table>
            </section>";
    }
}

