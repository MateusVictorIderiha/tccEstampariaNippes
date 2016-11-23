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
class camisaView extends EstruturaView{
    //put your code here
    public function mostrarConteudo() {
        echo"
            <section class='textcenter oswald padding30'>
                <p class='font25px whitecolor'>UNTIL THE VERY END</p>
				<p class='font15px'>Camiseta Until The Very End</p>
				<p>Vendido por Nippes Estamparia</p>
				<p class='lineheight6'>de  <s>R$ 99,90 </s></p>
				<p class='lineheight6'>por <b class='font25px textblack'>R$ 79,99 </b>  </p>
				<p class='textblack lineheight6'><b>2x</b> de <b class='whitecolor'>R$ 40,00</b>  sem juros no cartão <p>
				
				 <div><p class='font25px textblack margintop'>TAMANHO</p>
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