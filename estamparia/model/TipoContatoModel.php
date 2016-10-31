<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoContato
 *
 * @author Mateus
 */

namespace estamparia\model;

use estamparia\libs\CrudEstamparia;

class TipoContatoModel extends CrudEstamparia {

    //put your code here
    private $idTipo;
    private $tipo;
    protected $tabela = "tcc_tipoContato";
    protected $consultaColunaId = "id_tipo";
    
    public function __construct($idTipoContato = null) {
        parent::__construct();
        
        if(!empty($idTipoContato)){
            $lista = $this->consultar($idTipoContato);
            if($lista){
                $this->idTipo = $lista["id_tipo"];
                $this->tipo = $lista["tipo"];
            } else {
                return "registro não existente";
            }
        }
    }
    
    public function retornaIdTipoContato() {
        $tiposContatos = array();
        $comando = $this->banco->prepare("SELECT $this->consultaColunaId FROM "
                . "$this->tabela WHERE id_tipo not in (3, 4, 5)");
        $comando->execute();
        $lista = $comando->fetch(\PDO::FETCH_ASSOC);
        
        foreach ($lista as $tipoContato) {
            $tiposContatos = $tipoContato;
        }
        return $tiposContatos;
    }
    
    public function retornaIdEmails() {
        $tiposContatos = array();
        $comando = $this->banco->prepare("SELECT $this->consultaColunaId FROM "
                . "$this->tabela WHERE id_tipo in (3, 4, 5)");
        $comando->execute();
        $lista = $comando->fetch(\PDO::FETCH_ASSOC);
        
        foreach ($lista as $tipoContato) {
            $tiposContatos = $tipoContato;
        }
        return $tiposContatos;
    }
    
    public function getIdTipo() {
        return $this->idTipo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setIdTipo($idTipo) {
        $this->idTipo = $idTipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function editar($id) {
        
    }

    public function inserir() {
        
    }

}
