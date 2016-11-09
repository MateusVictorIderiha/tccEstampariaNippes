<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view;

/**
 * Description of rodapeView
 *
 * @author Mateus
 */
class rodapeView {
    //put your code here
    
    public function mostrarRodape() {
        echo "<footer class='rodape textcenter'>
                    <p>© RUA MARIA GERMANI CEP: 18053030, Nº883 - JULIO DE MESQUITA TEL:(15)32025270 | E-MAIL: NIPPES@HOTMAIL.COM </p>
                    <figure>
                        <figcaption>CONECTE-SE</figcaption>
                        <img src='img/iconeeees.png' alt='icones'  class='icones' />
                    </figure> <p> <a href='home.html'> Home </a> | <a href='home.html'> Catalogo </a> | <a href='home.html'>  Pedidos </a>| <a href='home.html'> Login</a> | <a href='home.html'> Sobre Nós</a> </p>
                    <p class='gray'> © RUA MARIA GERMANI CEP: 18053030, Nº883 - JULIO DE MESQUITA TEL:(15)32025270 | E-MAIL: NIPPES@HOTMAIL.COM 
                </footer>
            </body>
        </html>";
    }
}
