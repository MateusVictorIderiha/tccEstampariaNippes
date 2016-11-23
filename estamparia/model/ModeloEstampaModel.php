<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModeloEstampaModel
 *
 * @author Mateus
 */

namespace estamparia\model;

use estamparia\libs\Crud;

class ModeloEstampaModel extends Crud{

    //put your code here
    private $idModeloEstampa;
    private $imagemEstampa;
    private $dataCriada;
    private $descricaoModelo;
    private $caminhoImagem = "../imagens/";
    protected $tabela = "tcc_modeloEstampa";
    protected $consultaColunaId = "id_modEstampa";
    
    public function __construct($idEstampa = null) {
        parent::__construct();
        
        if(isset($idEstampa)){
            $lista = $this->consultar($idEstampa);
            if($lista){
                $this->idModeloEstampa = $lista["id_ModEstampa"];
                $this->imagemEstampa = $lista["imagemEstampa"];
                $this->dataCriada = $lista["dataCriada"];
                $this->descricaoModelo = $lista["descricaoModelo"];
            }
        }
    }
    
    public function getIdModeloEstampa() {
        return $this->idModeloEstampa;
    }

    public function getDescricaoModelo() {
        return $this->descricaoModelo;
    }

    public function setIdModeloEstampa($idModeloEstampa) {
        $this->idModeloEstampa = $idModeloEstampa;
    }

    public function setDescricaoModelo($descricaoModelo) {
        $this->descricaoModelo = $descricaoModelo;
    }

    public function editar($id) {
        $comando = $this->banco->prepare("INSERT INTO $this->tabela(descricao, "
                . "imagemEstampa, dataCriada) VALUES (:descricao, imagemEstampa, dataCriada)");
        $comando->bindParam(":descricao", $this->descricaoModelo);
        $comando->bindParam(":imagemEstampa", $this->imagemEstampa);
        $comando->bindParam(":dataCriada", $this->dataCriada);
        $comando->execute();
        return $this->banco->lastInsertId(); 
    }

    public function inserir() {
        $comando = $this->banco->prepare("UPDATE tcc_modeloestampa SET descricao=:descricao,"
                . " imagemEstampa=:imagemEstampa,dataCriada=:dataCriada");
        $comando->bindParam(":descricao", $this->descricaoModelo);
        $comando->bindParam(":imagemEstampa", $this->imagemEstampa);
        $comando->bindParam(":dataCriada", $this->dataCriada);
        $comando->execute();     
    }

    public function mostrarInformacoes() {
        $informacoes[] = $this->idModeloEstampa;
        $informacoes[] = $this->dataCriada;
        $informacoes[] = $this->descricaoModelo;
        $informacoes[] = $this->imagemEstampa;
        
        return $informacoes;
    }

}
