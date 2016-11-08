<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use estamparia\model\ClienteModel;

require_once '../../vendor/autoload.php';

$objCli = new ClienteModel("45899604867", "123456");
var_dump($objCli->mostrarInformacoes());
