<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view\adm\controller;

use estamparia\controller\PadraoController;
use estamparia\view\adm\view\TopoAdm;
use estamparia\view\adm\model\AdmNippesModel;
/**
 * Description of LogarAdmController
 *
 * @author Mateus
 */
class LogarAdmController extends TopoAdm implements PadraoController{
    //put your code here
    public function mostrarPagina() {
        $this->head();
        echo " <fieldset class='loginAdm'>
                <form id='loginAdm' action='?acao=logar' method='POST'>
                    <h1 class='whitecolor textcenter'>Login</h1>
                     <div id='errouLogin'>Usúario ou senha incorretos</div>
                    <div class='form-group'> 
                        <label for='usuarioAdm'>Login: </label>
                        <input type='text' class='form-control focused' id='usuarioAdm' name='usuarioAdm' data-toggle='tooltip' title='Login' data-placement='bottom' />
                    </div>
                    <div class='form-group'>
                        <label for='senhaAdm'>Senha: </label>
                        <input type='password' class='form-control focused' id='senhaAdm' name='senhaAdm' data-toggle='tooltip' title='Senha' data-placement='bottom' />
                    </div>
                    <div class='form-group'>
                        <input type='checkbox' id='loginCookie' class='focused' name='loginCookie' value='1' data-toggle='tooltip' title='Clique para se manter logado' data-placement='bottom' />
                        <label for='loginCookie'>Matenha-se conectado </label>
                    </div>
                    <div class='form-group cadastrar'>
                        <input id='logar' class='col-lg-6 col-md-6 col-sm-6 col-xs-6 btn btn-primary logar' type='submit' value='Entrar' data-toggle='tooltip' title='Clique aqui para ENTRAR' data-placement='bottom' />
                    </div>
                </form>
            </fieldset>";
        $this->fecharPagina();
    }
    
    public function logar() {
        $usuario = $_POST["usuarioAdm"];
        $senha = $_POST["senhaAdm"];

        $cookie = isset($_POST["loginCookie"]) ? ($_POST["loginCookie"]) : (false);
        
        $objAdm = new AdmNippesModel();
        if($cookie == 1){
            $verifica = $objAdm->loginCookie($usuario, $senha);
            if($verifica){
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $verifica = $objAdm->loginSessao($usuario, $senha);
            if($verifica){
                echo 1;
            } else {
                echo 0;
            }
        }
    }
    
    public function paginaInicial(){
        
    }
}
