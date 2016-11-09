<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;



/**
 * Description of ClienteController
 *
 * @author Mateus
 */
class ClienteController {

    //put your code here
    private $get;

    public function __construct($get, $post) {
        if(isset($post["Cadastrar"])){
            echo "olá ^^";
        }
    }
    
}
