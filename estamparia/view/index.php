<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use estamparia\controller\ClienteController;
use estamparia\view\topoView;
use estamparia\view\rodapeView;
use estamparia\view\SobreView;

require_once '../../vendor/autoload.php';

$styles = array();
$stylevalor1["caminho"] = "bootstrap/css/bootstrap.css";
$stylevalor1["media"] = "All";
$stylevalor2["caminho"] = "css/estilo.css";
$stylevalor2["media"] = "Screen";
array_push($styles, $stylevalor1);
array_push($styles, $stylevalor2);

$javasripts = array();
$javasriptValor1["caminho"] = "bootstrap/js/jquery.js";
$javasriptValor2["caminho"] = "bootstrap/js/bootstrap.js";
$javasriptValor3["caminho"] = "";
array_push($javasripts, $javasriptValor1);
array_push($javasripts, $javasriptValor2);

$botoes = array();
$botaoValor1["caminho"] = "Home.html";
$botaoValor1["nome"] = "Home";
$botaoValor1["valor"] = "Home";
$botaoValor2["caminho"] = "Pedidos.html";
$botaoValor2["nome"] = "Pedidos";
$botaoValor2["valor"] = "Pedidos";
$botaoValor3["caminho"] = "Catalago.html";
$botaoValor3["nome"] = "Catalago";
$botaoValor3["valor"] = "Catálago";
$botaoValor4["caminho"] = "FaleConosco.html";
$botaoValor4["nome"] = "Contato";
$botaoValor4["valor"] = "Contato";
array_push($botoes, $botaoValor1);
array_push($botoes, $botaoValor2);
array_push($botoes, $botaoValor3);
array_push($botoes, $botaoValor4);

$topo = new topoView($botoes, $javasripts, $styles);
$topo->mostrarTopo();

$sobre = new SobreView();
$sobre->mostrarConteudo();

$controllerCliente = new ClienteController($_GET, $_POST);


$rodape = new rodapeView();
$rodape->mostrarRodape();