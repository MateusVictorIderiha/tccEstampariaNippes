<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\model;

use estamparia\model\ProdutoModel;

/**
 * Description of ProdPersonalizadoModel
 *
 * @author Mateus
 */
class ProdPersonalizadoModel extends ProdutoModel{
    //put your code here
    protected $personalizado = "S";
    
    public function consultarTodosPedidos() {
        $comando = $this->banco->prepare("SELECT * FROM $this->tabela WHERE personalizado='S'");
        $comando->execute();
        $lista = $comando->fetchAll(\PDO::FETCH_ASSOC);
        return $lista;   
    }
}
