<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImgEstampaModel
 *
 * @author Mateus
 */

namespace estamparia\model;

use estamparia\libs\Crud;
use estamparia\ModeloEstampaModel;

class ImgEstampaModel extends Crud {

    //put your code here
    private $idImgEstampa; //Chave PRIMARIA PK
    private $descricaoImg;
    private $imagem;
    private $local;
    private $idModeloEstampa; // Chave ESTRANGEIRA FK
    protected $tabela = "img_estampa";

    public function getIdImgEstampa() {
        return $this->idImgEstampa;
    }

    public function getDescricaoImg() {
        return $this->descricaoImg;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function getLocal() {
        return $this->local;
    }

    public function getIdModeloEstampa() {
        return $this->idModeloEstampa;
    }

    public function setIdImgEstampa($idImgEstampa) {
        $this->idImgEstampa = $idImgEstampa;
    }

    public function setDescricaoImg($descricaoImg) {
        $this->descricaoImg = $descricaoImg;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function setLocal($local) {
        $this->local = $local;
    }

    public function setIdModeloEstampa($idModeloEstampa) {
        $this->idModeloEstampa = $idModeloEstampa;
    }

    public function editar($id) {
        
    }

    public function inserir() {
        
    }

    public function mostrarInformacoes() {
        
    }

}
