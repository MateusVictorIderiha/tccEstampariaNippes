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
        //$peso = empty($objProduto->getPeso()) ? "-" : $objProduto->getPeso();
        echo "
        <section class='margin-left12'>
            <figure id='imgCamiseta'>
                <img class='floatleft relative padding30' width='430px' height='622px' src='../imagens/".$objProduto->getFotoProduto()."' title='".$objProduto->getNome()."' />
                <figcaption class='margin-left12'>
                </figcaption>
            </figure>
            <section class='textcenter oswald padding30'>
                <p class='font25px whitecolor'>".$objProduto->getNome()."</p>
				<p class='font15px'> Camiseta ".$objProduto->getDescricao()."</p>";
                                
				//<p class='lineheight6'>de  <s>R$ ".." </s></p>
				echo "<p class='lineheight6'>por <b class='font25px textblack'>".$precoFormatado." </b>  </p>";
				
			//$objProduto->consultarProdutoComEstoque($objProduto->getIdProduto());
                        $cores = $objProduto->mostrarCoresProduto();

                                echo "<input type='hidden' value='".$objProduto->getIdProduto()."' id='idModeloProduto' id='modelo' name='modelo' data-toggle='tooltip' title='Modelo da camiseta' data-placement='bottom' />
                                    <div><p class='font25px textblack margintop'>COR</p> 
                                    <select id='cor' name='cor' data-toggle='tooltip' title='Informe a cor da camiseta' data-placement='bottom' >
                                        <option value=''>Selecione uma cor...</option>";
                                foreach ($cores as $cor) {
                                    $objCor = new \estamparia\model\CorModel($cor["id_cor"]);
                                    echo "<option value='".$objCor->getIdCor()."'>".$objCor->getCor()."</option>";
                                }        
                                
                                    echo "</select>
                                </p></div>

                                <div><p class='font25px textblack margintop'>TAMANHO</p>         
                                    <select id='tamanhoProduto' name='tamanho' data-toggle='tooltip' title='Informe o tamanho da camiseta' data-placement='bottom' />
                                        <option value=''>Selecione o Tamanho...</option>";
                                    foreach ($array as $value) {
                                        
                                    }
                                    echo "</select>
                                </p></div>

                                <div>
                                    <p>
                                        Tecido: ".$objProduto->getMaterial()."
                                    </p>
                                    <p>
                                        Modelo: ".$objProduto->getModelo()."
                                    </p>
                                </div>
			<div class='textcenter '>
                    <input class='btn btn-primary2 margintop2' type='submit' value='COMPRAR' data-toggle='tooltip' title='Clique aqui para comprar' data-placement='bottom'/>
					 </div>	
					 <p class='century margintop3'> <u>Frete Grátis* </u></p>
            </section>
        </section>";
    }
    }