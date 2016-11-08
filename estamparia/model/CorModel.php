<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CorModel
 *
 * @author Mateus
 */

namespace estamparia\model;

use estamparia\libs\Crud;

class CorModel extends Crud {

    //put your code here
    // ainda se tem que arrumar a LOGICA DAS CLASSES Cor, PadraoDaCor e CodigoDaCor
    private $idCor;
    private $cor;
    protected $tabela = "tcc_cor";
    protected $consultaColunaId = "id_cor";

    public function __construct($idCor = null) {
        parent::__construct();
        
        if(!empty($idCor)){
            $lista = $this->consultar($idCor);
            if($lista) {
                $this->idCor = $lista["id_cor"];
                $this->cor = $lista["cor"];
            }
        }
    }

    public function mostrarInformacoes() {
        $informacoes[] = $this->idCor;
        $informacoes[] = $this->cor;
        return $informacoes;
    }

    public function inserir() {
        $comando = $this->banco->prepare("INSERT INTO $this->tabela(id_cor, cor)"
                . " values(:id_cor, :cor)");
        $comando->bindParam(":id_cor", $this->idCor);
        $comando->bindParam(":cor", $this->cor);
        $comando->execute();
        return $this->banco->lastInsertId();
    }

    public function editar($id) {
        $comando = $this->banco->prepare("UPDATE $this->tabela SET "
                . "`cor`=:cor, WHERE $this->consultaColunaId = $id");
        $comando->bindParam(":cor", $this->cor);
        $comando->execute();
    }

}
