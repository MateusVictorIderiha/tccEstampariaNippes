<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view;

use estamparia\view\EstruturaView;

/**
 * Description of VendasView
 *
 * @author Mateus
 */
class VendasView extends EstruturaView{

    //put your code here
    public function mostrarConteudo() {
        echo "           
        <section class='margin-left3'>
            <p class='font33px'> Carrinho  <img src='img/carrinho2.png' width='30px'/></p>
            <figure>
                <img class='floatleft' width='150px' height='150px' src='img/home/home2.jpg' title='Camisa' />
                <figcaption class='margin-left12'>
                    <table style='width:50%'>
                        <tr>
                            <td><a href='#' class='font25px'><b>Until The Very End</b></a></td>
                            <td>Cor: Roxo</td> 
                            <td><p class='font20px'>Preço: R$ 50,00</p></td>

                        </tr>
                        <tr>
                            <td><p class='font20px'>Camiseta Until The Very End</p></td>
                            <td>
                                <div>
                                    <p>Quantidade:
                                        <select id='quantidade' name='quantidade' data-toggle='tooltip' title='Informe a quantidade' data-placement='bottom' />
                                    <option value=''></option>
                                    <option value=''>GG</option></p>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div>Tamanho:
                                    <select id='tamanho' name='tamanho' data-toggle='tooltip' title='Informe o tamanho da camiseta' data-placement='bottom' />
                                    <option value=''></option>
                                    <option value=''>P</option>
                                    <option value=''>M</option>
                                    <option value=''>G</option>
                                    <option value=''>GG</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><a href='#'> <img src='img/lixinho.png' width='20px'/> Remover Produto</a></td>
                        </tr>
                        <tr>
                        </tr>
                    </table>
                </figcaption>
            </figure>		
            <section class='margin-left60 top'>
                <p class='font25px whitecolor'>TOTAL: R$ 50,00
                <div class='upper'>
                    <input class='col-lg-3 col-md-6 col-sm-6 col-xs-6 btn btn-primary2' type='submit' value='FINALIZAR COMPRA' data-toggle='tooltip' title='Clique aqui para Finalizar sua Compra' data-placement='bottom'/>
                </div>	
            </section>
        </section>";
    }

}
