<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CrudEstamparia
 *
 * @author Mateus
 */

namespace estamparia\libs;

use estamparia\libs\Crud;

abstract class CrudEstamparia extends Crud {

    //put your code here
    function __construct() {
        $servidor = "localhost";
        $banco = "EstampariaTCC";
        $dsn = "mysql:host=$servidor; dbname=$banco";
        $usuario = "root";
        $senha = "root";
        $conexao = new PDO($dsn, $usuario, $senha);
        parent::__construct($conexao);
    }

}
