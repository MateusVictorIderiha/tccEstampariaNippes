<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\model;

use estamparia\model\ProdutoModel;

/**
 * Description of ProdMateriaPrimaModel
 *
 * @author Mateus
 */
class ProdMateriaPrimaModel extends ProdutoModel{
    //put your code here
    protected $personalizado = "M";
          
    public function consultarTodosSemEstampa() {
        $comando = $this->banco->prepare("SELECT * FROM $this->tabela WHERE personalizado='M'"); // Materia Prima (Sem estampa)
        $comando->execute();
        $lista = $comando->fetchAll(\PDO::FETCH_ASSOC);
        return $lista;
    }
    
}
