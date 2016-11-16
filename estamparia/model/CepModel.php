<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cep
 *
 * @author rm02540
 */

namespace estamparia\model;

use estamparia\libs\Crud;

class CepModel extends Crud {

    //put your code here
    protected $id_cep;
    protected $cep;
    protected $estado;
    protected $cidade;
    protected $bairro;
    protected $rua;
    protected $tabela = "tcc_cep";
    protected $consultaColunaId = "id_cep";

    public function __construct($idCep = null) {
        parent::__construct();
        
        $lista = $this->consultar($idCep);
        
        if($lista){
            $this->id_cep = $idCep;
            $this->cep = $lista["cep"];
            $this->estado = $lista["estado"];
            $this->cidade = $lista["cidade"];
            $this->rua = $lista["rua"];
        }
    }

    public function consultarCep($cep) {
        $comando = $this->banco->prepare("SELECT * from tcc_cep"
                . " where cep = $cep");
        $comando->execute();
        $lista = $comando->fetch(\PDO::FETCH_ASSOC);
        
        return $lista;
    }
    
    public function editar($id) {
        
    }

    public function inserir() {
        
    }

    public function mostrarInformacoes() {
        
    }
}
