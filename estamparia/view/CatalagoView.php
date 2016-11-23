<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view;

use estamparia\view\EstruturaView;

/**
 * Description of CatalagoView
 *
 * @author Mateus
 */
class CatalagoView extends EstruturaView{
    //put your code here
    private $listaProdutos;
    private $caminhoImagem = "../imagens/";


    public function __construct($listaProdutos) {
        parent::__construct();
        
        $this->listaProdutos = $listaProdutos;
    }
    
    public function mostrarConteudo() {
        echo "     
            <section class='min-width50 textcenter'>
                <header class='textcenter'>
                    <h1 class='whitecolor'>NOSSOS PRODUTOS:</h1>
                </header>
                ";
        foreach ($this->listaProdutos as $produto) {
                $preco = "R$ ".number_format($produto['preco'], 2, ',', '.');
                echo "<figure class='catalogovenda'>
                    <img src='". $this->caminhoImagem.$produto['fotoProduto']. "' ".
                        "data-toggle='tooltip' data-placement='top' title='Camiseta ".
                        $produto['nome']." a ".$preco."'/>
                    <figcaption>
                        <p>
                            <a href='?pagina=wp_produto&acao=consultar_produto&id=".$produto["id_produto"]."'> "
                                .$produto['descricao']." a partir de <b>".$preco.
                            "</b> </a>
                        </p>
                    </figcaption>
                </figure>";
        }
 	echo "
                <div class='botaovermais'>
                    <input class='col-lg-6 col-md-6 col-sm-6 col-xs-6 btn btn-primary' type='submit' value='Ver Mais' data-toggle='tooltip' title='Clique aqui para ENTRAR' data-placement='bottom'/>
                </div>		
            </section>";
    }
}
