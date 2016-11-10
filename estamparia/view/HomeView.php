<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view;

use estamparia\view\EstruturaView;
/**
 * Description of HomeView
 *
 * @author Mateus
 */
class HomeView extends EstruturaView{
    //put your code here
    
    public function __construct() {
        $javasriptValor3["caminho"] = "bootstrap/jquery-ui/jquery-ui.js";
        
        $javascripts[] = $javasriptValor3;
        $configuracoes["javascript"] = $javascripts;
        
        $stylevalor3["caminho"] = "bootstrap/jquery-ui/jquery-ui.css";
        $stylevalor3["media"] = "All";
        
        $styles[] = $stylevalor3;
        $configuracoes["style"] = $styles;
        
        parent::__construct($configuracoes);
    }
    public function mostrarConteudo() {
        echo "        
            <section class='banner'>
            <div id='myCarousel' class='carousel slide container alturaSlide col-lg-12' data-ride='carousel'>
                <ol class='carousel-indicators container padding'>
                    <li data-target='#myCarousel' data-slide-to='1'></li>
                    <li data-target='#myCarousel' data-slide-to='2'></li>
                    <li data-target='#myCarousel' data-slide-to='3'></li>
                </ol>
                <div class='carousel-inner' role='listbox' >
                    <div class='item container alturaSlide'>
                        <img src='img/imagens/img5.jpg' alt='img2' />
                    </div>
                    <div class='item active container alturaSlide'>
                        <img src='imagens/img8.png' alt='img2' />
                    </div>
                    <div class='item container alturaSlide'>
                        <img src='imagens/img8.png' alt='img2' />
                    </div>
                    <a class='left carousel-control' href='#myCarousel' role='button' data-slide='prev'>
                        <span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>
                        <span class='sr-only'>Previous</span>
                    </a>
                    <a class='right carousel-control' href='#myCarousel' role='button' data-slide='next'>
                        <span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>
                        <span class='sr-only'>Next</span>
                    </a>	
                </div>
            </div>
        </section>	
        <section class='textcenter'>
            <header>
                <h1 class='font33px'>Conheça nossas promoçoes e nossas variedades de estampas!</h1>
            </header>
            <figure class='figcaptionlateral'>
                <img width='300px' height='300px' src='img/home/home1.jpg' title='Camisa'/>
                <figcaption>
                    <a href='#'>	A partir de <b>R$64,90</b> </a>
                </figcaption>
            </figure>	
            <figure class='figcaptionlateral'>
                <img width='300px' height='300px' src='img/home/home2.jpg' title='Camisa' />
                <figcaption>
                    <a href='#'>A partir de <b>R$64,90</b></a>
                </figcaption>
            </figure>	
            <figure class='figcaptionlateral'>
                <img width='300px' height='300px' src='img/home/home3.jpg' title='Camisa' />
                <figcaption>
                    <a href='#'>A partir de <b>R$64,90</b></a>
                </figcaption>
            </figure>	
            <figure class='figcaptionlateral'>
                <img width='300px' height='300px' src='img/home/home4.jpg' title='Camisa' />
                <figcaption>
                    <a href='#'>A partir de <b>R$64,90</b></a>
                </figcaption>
            </figure>	
            <section class='imagenspromo'>
                <figure>
                    <img width='600px' height='300px' src='img/banner1.jpg' title='Camisa'/>
                    <figcaption>
                        <a href='#'>	NIPPES ESTAMPAS</a>
                        <p class='textjustify textblack'>Nada melhor que renovar seu guarda-roupa com as nossas novidades. Transforme-se com os produtos que trazem as últimas tendências de qualidade</p>
                    </figcaption>
                </figure>

                <figure>
                    <img width='600px' height='300px' src='img/banner2.jpg' title='Camisa' />
                    <figcaption>
                        <a href='#'>NIPPES ESTAMPAS</b></a>
                        <p class='textjustify textblack'>Nada melhor que renovar seu guarda-roupa com as nossas novidades. Transforme-se com os produtos que trazem as últimas tendências de qualidade</p>
                    </figcaption>
                </figure>	
            </section>
        </section>";
    }
}
