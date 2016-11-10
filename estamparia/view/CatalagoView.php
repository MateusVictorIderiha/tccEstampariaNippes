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
    public function mostrarConteudo() {
        echo "           
            <section class='min-width50 textcenter'>
                <figure class='catalogovenda'>
                    <img src='img/img1.png' title='Camisa'/>
                    <figcaption>
                        <p>
                            <a href='#'>	Jazzman a partir de <b>R$64,90</b> </a>
                        </p>
                    </figcaption>
                </figure>
                <figure class='catalogovenda'>
                    <img src='img/img2.png' title='Camisa' />
                    <figcaption>
                        <p>
                            <a href='#'>Music is the way a partir de <b>R$64,90</b></a>
                        </p>
                    </figcaption>
                </figure>	
                <figure class='catalogovenda'>
                    <img src='img/img3.png' title='Camisa' />
                    <figcaption>
                        <p>
                            <a href='#'>Dark Prince a partir de <b>R$64,90</b></a>
                        </p>
                    </figcaption>
                </figure>	
                <figure class='catalogovenda'>
                    <img src='img/img4.png' title='Camisa' />
                    <figcaption>
                        <p>
                            <a href='#'>Infinite Love a partir de <b>R$64,90</b></a>
                        </p>
                    </figcaption>
                </figure>	
                <figure class='catalogovenda'>
                    <img src='img/img5.png' title='Camisa' />
                    <figcaption>
                        <p>
                            <a href='#'>Am I Free Or Tield Up a partir de <b>R$64,90</b></a>
                        </p>
                    </figcaption>
                </figure>		
                <figure class='catalogovenda'>
                    <img src='img/img6.png' title='Camisa' />
                    <figcaption>
                        <p>
                            <a href='#'>Until The Very End a partir de <b>R$64,90</b></a>
                        </p>
                    </figcaption>
                </figure>		
                <figure class='catalogovenda'>
                    <img src='img/img7.png' title='Camisa' />
                    <figcaption>
                        <p>
                            <a href='#'>Winter is Coming a partir de <b>R$64,90</b></a>
                        </p>
                    </figcaption>
                </figure>	
                <figure class='catalogovenda'>
                    <img src='img/img8.png' title='Camisa' />
                    <figcaption>
                        <p>
                            <a href='#'>Tente outra vez a partir de <b>R$64,90</b></a>
                        </p>
                    </figcaption>
                </figure>	
                <figure class='catalogovenda'>
                    <img src='img/img2.png' title='Camisa' />
                    <figcaption>
                        <p>
                            <a href='#'>Tente outra vez a partir de <b>R$64,90</b></a>
                        </p>
                    </figcaption>
                </figure>	
                <figure class='catalogovenda'>
                    <img src='img/img1.png' title='Camisa' />
                    <figcaption>
                        <p>
                            <a href='#'>Tente outra vez a partir de <b>R$64,90</b></a>
                        </p>
                    </figcaption>
                </figure>	
                <div class='botaovermais'>
                    <input class='col-lg-6 col-md-6 col-sm-6 col-xs-6 btn btn-primary' type='submit' value='Ver Mais' data-toggle='tooltip' title='Clique aqui para ENTRAR' data-placement='bottom'/>
                </div>		
            </section>";
    }
}
