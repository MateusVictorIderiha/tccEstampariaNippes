<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use estamparia\model\ClienteModel;
use estamparia\model\ContatoModel;
use estamparia\model\EnderecoModel;

$contato1 = new ContatoModel();
$contato1->setContato("996068325");
$contato1->setCpf_cliente("45899604867");
$contato1->setId_tipoContato("2");
// $contato1->inserir();
// $contato1->editar("1");
$contato1->consultarTudo();

$endereco1 = new EnderecoModel();
$endereco1->setCep("18070710");
$endereco1->setNumeroDaCasa("2195");
$endereco1->setCpf_cliente("45899604867");
$endereco1->inserir();
$endereco1->consultarTudo();

$cliente1 = new ClienteModel();
$cliente1->setCpf("1234567811");
$cliente1->setDataNascimento("1999-12-21"); // ANO - MÊS - DIA
$cliente1->setNome("Pedro");
$cliente1->setEmail("Pedro@etec.gov.sp.br");
$cliente1->setRg("987456321");
$cliente1->setSenha("159753");
// $cliente1->inserir();
// $cliente1->deletar("cpf_cliente", "45899303832");
// $cliente1->editar("1234567810");
$cliente1->consultarTudo();