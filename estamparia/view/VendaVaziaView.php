<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view;

use estamparia\view\EstruturaView;

/**
 * Description of VendaVaziaView
 *
 * @author Mateus
 */
class VendaVaziaView extends EstruturaView{
    //put your code here
    public function mostrarConteudo() {
        echo "  
        <section class='margin-left12'>
            <p class='font33px'> Carrinho  <img src='img/carrinho2.png'/></p>
            <figure>
                <figcaption class='margin-left'>
                    <table style='width:50%'>
                        <tr>
                            <td><p class='font25px'><b>Seu carrinho está VAZIO!</b></td>
                            <td></td> 
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div>

                                </div>
                            </td>
                            <td>

                                <div>
                            </td>
                        </tr>
                        <tr>
                            <td><a href='catalogo.html'> Venha Conhecer nossas camisetas!</a></td>
                        </tr>
                        <tr>
                        </tr>
                    </table>
                </figcaption>
            </figure>		
        </section>";
    }
}
