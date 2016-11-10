<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view;

require_once '../../vendor/autoload.php';

use estamparia\view\EstruturaView;

/**
 * Description of SobreView
 *
 * @author Mateus
 */
class SobreView extends EstruturaView{
    //put your code here
    
    public function mostrarConteudo() {
        echo "
        <section class='padding-bottom10 textcenter'>
            <figure class='textcenter'>
                <img class='logonipees textcenter' src='img/logonipees.png'/>
            </figure>
            <p class='font33px'> Sobre Nós!  </p>
            <p class='font25px bolder textblack'>Quem nos somos?</p>
            <p class='paddingleftright'>A empresa Nippes surgiu do entusiasmo de Fernando em produzir camisetas, pois sempre admirou as diversas estampas. Apesar de não ter sido inaugurada ainda, ele pretende trabalhar mais virtualmente. Já existe um local físico que será mais usado como estoque, pois ele não venderá apenas camisetas sob encomenda, como também, seus próprios produtos (camisetas a pronta entrega. Por ser algo recente, o único funcionário que a empresa possui é o irmão de Fernando.</p>
        </section>";
    }
}
