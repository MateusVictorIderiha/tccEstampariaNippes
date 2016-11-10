<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;



/**
 * Description of InicialController
 *
 * @author Mateus
 */
class InicialController {
    //put your code here
    
    public function carregarController($param) {
        if(isset($_REQUEST["Controle"])){
            
        } else {
            return "Index";
        }
        if(isset($_REQUEST["Acao"])){
            
        } else {
            return "Index";
        }
    }
}
