<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CodigoDaCor
 *
 * @author Mateus
 */
// ainda se tem que arrumar a LOGICA DAS CLASSES Cor, PadraoDaCor e CodigoDaCor

namespace estamparia\model;

use estamparia\libs\Crud;

class CodigoDaCorModel extends Crud {

    //put your code here
    private $idCodigoCor;
    private $codigo;
    private $idCor;
    protected $padraoCor;
    protected $tabela = "tcc_codigo";
    protected $consultaColunaId = "id_codigoCor";

    public function __construct($idCodigoCor) {
        parent::__construct();
        
        if(!empty($idCodigoCor)){
            $lista = $this->consultar($idCodigoCor);
            if($lista){
                $this->idCodigoCor = $lista["id_codigoCor"];
                $this->codigo = $lista["codigo"];
                $this->idCor = $lista["id_cor"];
                $this->padraoCor = $lista["padraoCor"];
            }
        }
    }
    
    public function __get($propriedade) {
        if($propriedade == "Cor"){
            $objCor = new CorModel($this->idCor);
            return $objCor;
        }
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

    public function mostrarInformacoes() {
        $informacoes[] = $this->idCodigoCor;
        $informacoes[] = $this->codigo;
        $informacoes[] = $this->padraoCor;
        $informacoes[] = $this->idCor;
        return $informacoes;
    }

}