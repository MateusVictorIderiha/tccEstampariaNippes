<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\controller;

use estamparia\controller\EstruturaView;
use estamparia\model\ClienteModel;

require_once '../../vendor/autoload.php';

/**
 * Description of CadastroController
 *
 * @author Mateus
 */
class CadastroController {
    //put your code here
    public function cadastrarCliente() {
        if(isset($_POST)){
            $cpf = $_POST["cpf"];
            $nome = $_POST["nome"];
            $sexo = $_POST["sexo"];
            $dataNascimento = $_POST["dataNascimento"];
            $
            $objCliente = new ClienteModel();
            $objCliente->setCpf($cpf);
        }
    }
}
