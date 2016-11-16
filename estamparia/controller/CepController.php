<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;

use estamparia\model\CepModel;

/**
 * Description of CepController
 *
 * @author Mateus
 */
class CepController {
    //put your code here
    public function pesquisarCep() {
        $cep = $_POST["cep"];
        $objCep = new CepModel();
        $sobreCep = $objCep->consultarCep($cep);
        
        $_POST["respostaCepEstado"] = $sobreCep["estado"];
        $_POST["respostaCepCidade"] = $sobreCep["cidade"];
        $_POST["respostaCepRua"] = $sobreCep["rua"];
        
        return $_POST;
        
        //var_dump($sobreCep);
        //return $sobreCep;
    }
}
