<?php

namespace estamparia\view;

use estamparia\view\EstruturaView;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BemVindoView extends EstruturaView{
    private $nome;
    private $pedido;
    private $compras;
    
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


                <table class='margin-left12' style='width:50%'>
                    <tr>
                        <th>Imagem do Produto</th>
                        <th>Nome do Produto</th> 
                        <th>Data da Compra</th>
                    </tr>
                    <tr>
                        <td><figure>
                                <img class='floatleft' width='100px' height='100px' src='img/home/home2.jpg' title='Camisa' />
                            </figure>
                        </td>
                        <td><p class='font33px'>Until The Very End</p></td>
                        <td><p class='font33px'>07/11/2016</p></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </section>";
    }
}

