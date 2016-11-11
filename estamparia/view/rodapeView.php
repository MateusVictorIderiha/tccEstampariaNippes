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
    
    public function __construct($botoes) {
        $this->botoes = $botoes;
    }    
    
    public function mostrarRodape() {
        echo "      
         <footer class='rodape textcenter'>
            <p>© RUA MARIA GERMANI CEP: 18053030, Nº883 - JULIO DE MESQUITA TEL:(15)32025270 | E-MAIL: NIPPES@HOTMAIL.COM </p>
            <figure>
                <figcaption>CONECTE-SE</figcaption>
                <img src='img/iconeeees.png' alt='icones'  class='icones' />
            </figure> 
            <p> ";
        
            $qtdBotoes = count($this->botoes);
            $inicio = 1;
            foreach ($this->botoes as $botao) {
                    $botao = "<a href='".$botao["caminho"]."' name='$botao[nome]]'> $botao[valor] </a>";
                    $botoes = $botao; // $inicio != $qtdBotoes ? " | " : "";
                    if($inicio == 1){
                        $inicio++;
                    } elseif ($inicio <= $qtdBotoes) {
                        echo " | ";
                        $inicio++;
                    }
                    echo $botoes;
            }
            
            echo "</p>
            <p class='gray'> © RUA MARIA GERMANI CEP: 18053030, Nº883 - JULIO DE MESQUITA TEL:(15)32025270 | E-MAIL: NIPPES@HOTMAIL.COM 
        </footer>
    </body>
</html>";
    }
}
