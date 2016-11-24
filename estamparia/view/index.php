<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use estamparia\controller\InicialController;

require_once '../../vendor/autoload.php';

$objController = new InicialController();
$objController->carregarPagina();