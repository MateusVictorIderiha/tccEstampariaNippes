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
use estamparia\model\LocalEstampaModel;
use estamparia\model\ModeloEstampaModel;

class ImgEstampaModel extends Crud {

    //put your code here
    private $idImgEstampa; //Chave PRIMARIA PK
    private $descricaoImg;
    private $imagem;
    private $idLocal;
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

    public function getIdLocal() {
        return $this->idLocal;
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

    public function setImagem($Imagem) {
        $this->imagem = $Imagem;
    }

    public function setIdLocal(LocalEstampaModel $idLocal) {
        $this->idLocal = $idLocal;
    }

    public function setIdModeloEstampa(ModeloEstampaModel $idModeloEstampa) {
        $this->idModeloEstampa = $idModeloEstampa;
    }

    public function editar($id) {
        
    }

    public function inserir() {
        
    }

}