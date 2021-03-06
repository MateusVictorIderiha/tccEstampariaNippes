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

    public function getImagemEstampa() {
        return $this->imagemEstampa;
    }

    public function getDataCriada() {
        return $this->dataCriada;
    }

    public function getDescricaoModelo() {
        return $this->descricaoModelo;
    }

    public function getCaminhoImagem() {
        return $this->caminhoImagem;
    }

    public function setIdModeloEstampa($idModeloEstampa) {
        $this->idModeloEstampa = $idModeloEstampa;
    }

    public function setImagemEstampa($imagemEstampa) {
        $this->imagemEstampa = $imagemEstampa;
    }

    public function setDataCriada($dataCriada) {
        $this->dataCriada = $dataCriada;
    }

    public function setDescricaoModelo($descricaoModelo) {
        $this->descricaoModelo = $descricaoModelo;
    }

    public function setCaminhoImagem($caminhoImagem) {
        $this->caminhoImagem = $caminhoImagem;
    }

    public function editar($id) {
        $comando = $this->banco->prepare("UPDATE tcc_modeloestampa SET descricao=:descricao,"
                . " imagemEstampa=:imagemEstampa,dataCriada=:dataCriada");
        $comando->bindParam(":descricao", $this->descricaoModelo);
        $comando->bindParam(":imagemEstampa", $this->imagemEstampa);
        $comando->bindParam(":dataCriada", $this->dataCriada);
        $comando->execute();
    }

    public function inserir() {
        $comando = $this->banco->prepare("INSERT INTO $this->tabela(descricao, "
                . "imagemEstampa, dataCriada) VALUES (:descricao, :imagemEstampa, :dataCriada)");
        $comando->bindParam(":descricao", $this->descricaoModelo);
        $comando->bindParam(":imagemEstampa", $this->imagemEstampa);
        date_default_timezone_set("Brazil/East");
        $this->dataCriada = date('Y:m:d H:i:s');
        $comando->bindParam(":dataCriada", $this->dataCriada);
        $comando->execute();
        return $this->banco->lastInsertId(); 
    }

    public function mostrarInformacoes() {
        $informacoes[] = $this->idModeloEstampa;
        $informacoes[] = $this->dataCriada;
        $informacoes[] = $this->descricaoModelo;
        $informacoes[] = $this->imagemEstampa;
        
        return $informacoes;
    }

}
