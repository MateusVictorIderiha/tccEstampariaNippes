<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace estamparia\view\adm\controller;

use estamparia\controller\InicialController;
/**
 * Description of InicialAdmController
 *
 * @author Mateus
 */
class InicialAdmController extends InicialController{
    //put your code here
    protected $caminho = '\\estamparia\\view\\adm\\controller\\';
    
    public function pegaController() {
        parent::pegaController();
        if($this->controller == "Home"){
            
        }
    }
}
