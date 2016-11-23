<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view;

use estamparia\view\EstruturaView;
use estamparia\model\ProdLojaModel;
/**
 * Description of CatalagoView
 *
 * @author Mateus
 */
class ProdutoView extends EstruturaView{
    //put your code here
    private $idProduto;
    
    public function __construct($idProduto) {
        parent::__construct();
        
        $this->idProduto = $idProduto;
    }
    public function mostrarConteudo() {
        $objProduto = new ProdLojaModel($this->idProduto);
        $preco = $objProduto->getPreco();
        $precoFormatado = "R$ ".number_format($preco, 2, ",", ".");
        echo"
        <section class='margin-left12'>
            <figure>
                <img class='floatleft relative padding30' width='430px' height='622px' src='../imagens/".$objProduto->getFotoProduto()."' title='".$objProduto->getNome()."' />
                <figcaption class='margin-left12'>
                </figcaption>
            </figure>
            <section class='textcenter oswald padding30'>
                <p class='font25px whitecolor'>".$objProduto->getNome()."</p>
				<p class='font15px'> Camiseta ".$objProduto->getNome()."</p>";
                                
				//<p class='lineheight6'>de  <s>R$ ".." </s></p>
				echo "<p class='lineheight6'>por <b class='font25px textblack'>".$precoFormatado." </b>  </p>";
				
				
                            echo "<div><p class='font25px textblack margintop'>TAMANHO</p>
                                         
                                    <select id='tamanho' name='tamanho' data-toggle='tooltip' title='Informe o tamanho da camiseta' data-placement='bottom' />
                                    <option value=''>Selecione o Tamanho...</option>
                                    <option value=''>P</option>
                                    <option value=''>M</option>
                                    <option value=''>G</option>
                                    <option value=''>GG</option>
                                    </select>
                                </div>
								                <div class='textcenter '>
                    <input class='btn btn-primary2 margintop2' type='submit' value='COMPRAR' data-toggle='tooltip' title='Clique aqui para comprar' data-placement='bottom'/>
					 </div>	
					 <p class='century margintop3'> <u>Frete Grátis* </u></p>
            </section>
        </section>";
    }
    }