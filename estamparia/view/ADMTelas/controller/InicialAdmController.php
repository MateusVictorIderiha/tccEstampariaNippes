<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace estamparia\view\adm\controller;

use estamparia\controller\InicialController;
/**
 * Description of InicialAdmController
 *
 * @author Mateus
 */
class InicialAdmController extends InicialController{
    //put your code here
    protected $caminho = '\\estamparia\\view\\adm\\controller\\';
    
    
    
    public function pegaController() {
        parent::pegaController();
        $pagina = "\\estamparia\\view\\adm\\controller\\";
        $pref = "Controller"; //prefixo
        $objAdm = new \estamparia\view\adm\model\AdmNippesModel();
        if($objAdm->verificaLoginCookie() || $objAdm->verificaLoginSessao()){
            if($this->controller == $pagina."Home".$pref /*|| $this->controller == $pagina."Cliente".$pref
                    || $this->controller == $pagina."Contato".$pref || $this->controller == $pagina."Pedidos".$pref 
                    || $this->controller == $pagina."Produto".$pref || $this->controller == $pagina."Venda".$pref 
                    || $this->controller == $pagina."Sobre".$pref*/){
                $this->controller = $this->caminho."Logar"."AdmController";
            }
        } else {
            $this->controller = $this->caminho."Logar"."AdmController";
        }

    }
}
