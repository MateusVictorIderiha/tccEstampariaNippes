<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;

use estamparia\controller\EstruturaView;

/**
 * Description of HomeController
 *
 * @author Mateus
 */
class HomeController extends EstruturaView{
    //put your code here
    public function __construct() {
        parent::__construct();
        $stylevalor3["caminho"] = "bootstrap/jquery-ui/jquery-ui.css";
        $stylevalor3["media"] = "All";
        
        array_push($this->styles, $stylevalor3);
    }
}
