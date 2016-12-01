<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view\adm\model;

use estamparia\view\adm\model\FuncionarioModel;

/**
 * Description of AdmNippesModel
 *
 * @author Mateus
 */
class AdmNippesModel extends FuncionarioModel{
    //put your code here
    protected $nivel = "3e6633670952bc42cc4ccc397f64b071"; // uadmnippes
    
    public function verificaLoginCookie() {
        $login = parent::verificaLoginCookie();
        if($login){
            $comando = $this->banco->prepare("SELECT * from $this->tabela where "
                    . "id_usuario = :idUsuario and nivel = :nivel");
            $comando->bindParam(":id_usuario", $this->idUsuario);
            $comando->bindParam(":login", $this->nivel);
            $comando->execute();
            $login = $comando->fetch(\PDO::FETCH_ASSOC);
            if(count($login)){
                return true;
            }
        }
        return false;
    }
    
    public function verificaLoginSessao() {
        $login = parent::verificaLoginSessao();
        if($login){
            $comando = $this->banco->prepare("SELECT * from $this->tabela where "
                    . "id_usuario = :idUsuario and nivel = :nivel");
            $comando->bindParam(":idUsuario", $this->idUsuario);
            $comando->bindParam(":nivel", $this->nivel);
            $comando->execute();
            $login = $comando->fetch(\PDO::FETCH_ASSOC);
            if(count($login)){
                return true;
            }
        }
        return false;
    }
}
