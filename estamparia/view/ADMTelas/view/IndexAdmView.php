<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use estamparia\view\adm\controller\InicialAdmController;

require_once '../../../../vendor/autoload.php';

/**
 * Description of IndexAdmView
 *
 * @author Mateus
 */

$objInicialController = new InicialAdmController();
$objInicialController->carregarPagina();