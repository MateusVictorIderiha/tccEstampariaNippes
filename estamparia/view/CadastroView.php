<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view;

use estamparia\view\EstruturaView;

/**
 * Description of CadastroView
 *
 * @author Mateus
 */
class CadastroView  extends EstruturaView{
    //put your code here
    
    public function __construct() {
        $javasriptValor3["caminho"] = "bootstrap/jquery-ui/jquery-ui.js";
        
        $javascripts[] = $javasriptValor3;
        $configuracoes["javascript"] = $javascripts;
        
        $stylevalor3["caminho"] = "bootstrap/jquery-ui/jquery-ui.css";
        $stylevalor3["media"] = "All";
        
        $styles[] = $stylevalor3;
        $configuracoes["style"] = $styles;
        
        parent::__construct($configuracoes);
    }
    
    public function mostrarConteudo() {
        echo "
        <section>
            <div id='cadastrar' class='container'>
                <form class='form' method='POST' action='index.php'>
                    <fieldset class='col-md-4 scheduler-border padding-bottom4'>
                        <h1 class='century font33px'>CADASTRE-SE</h1><br>
                        <fieldset>
                            <legend>Informações Pessoais</legend>
                            <div class='form-group'>
                                <label for='nome'>Nome completo: </label>
                                <input type='text' class='form-control focused' id='nome' name='nome' data-toggle='tooltip' title='Preencha seu nome completo' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='cpf'>CPF: </label>
                                <input type='text' class='form-control focused' id='cpf' name='cpf' data-toggle='tooltip' title='Preencha seu CPF' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='sexo'>Sexo: </label>
                                <select class='form-control focused' id='sexo' name='sexo' data-toggle='tooltip' title='Informe seu sexo masculino/feminino' data-placement='bottom' >
                                    <option value='0'>Selecione uma opição...</option>
                                    <option value='fem'>Feminino</option>
                                    <option value='mas'>Masculino</option>
                                </select>
                            </div>
                            <div class='form-group'>
                                <label for='datepicker1'>Data de nascimento </label>
                                <div class='input-group date'>
                                    <input type='text' id='datepicker1' class='form-control' data-toggle='tooltip' title='Informe sua data de nascimento' data-placement='bottom' />
                                    <span class='input-group-addon'>
                                        <span class='glyphicon glyphicon-calendar'></span>
                                    </span>
                                </div>
                            </div>	
                            <div class='form-group'>
                                <label for='telefone'>Telefone: </label>
                                <input type='text' class='form-control focused' id='telefone' name='tel' data-toggle='tooltip' title='Informe seu telefone' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='telefone'>Telefone 2: </label>
                                <input type='text' class='form-control focused' id='telefone2' name='tel2' data-toggle='tooltip' title='Informe outro telefone(opicional)' data-placement='bottom' />
                            </div>
                            <fieldset>
                                <legend>Endereço </legend>
                                <div class='form-group'>
                                    <label for='cep'>CEP: </label>
                                    <input type='text' class='form-control focused' id='cep' name='cep' data-toggle='tooltip' title='Informe o CEP da sua Rua/Cidade' data-placement='bottom' />
                                </div>
                                <div class='form-group'>
                                    <label for='cep'>Rua: </label>
                                    <input type='text' class='form-control focused' id='rua' name='rua' data-toggle='tooltip' title='Informe sua Rua' data-placement='bottom' />
                                </div>
                                <div class='form-group'>
                                    <label for='cep'>Número: </label>
                                    <input type='text' class='form-control focused' id='numero' name='numero' data-toggle='tooltip' title='Informe o número da sua moradia' data-placement='bottom' />
                                </div>
                                <div class='form-group'>
                                    <label for='cep'>Cidade: </label>
                                    <input type='text' class='form-control focused' id='cidade' name='cidade' data-toggle='tooltip' title='Informe a Cidade' data-placement='bottom' />
                                </div>
                                <div class='form-group'>
                                    <label for='cep'>Estado: </label>
                                    <input type='text' class='form-control focused' id='estado' name='estado' data-toggle='tooltip' title='Informe o estado' data-placement='bottom' />
                                </div>
                            </fieldset>
                        </fieldset>
                        <fieldset>
                            <legend>Informações da conta</legend>
                            <div class='form-group'>
                                <label for='email'>E-mail: </label>
                                <input type='text' class='form-control focused' id='email' name='email' data-toggle='tooltip' title='Preencha seu e-mail/LOGIN' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='RepetirEmail'>Confirme seu e-mail: </label>
                                <input type='text' class='form-control focused' id='RepetirEmail' name='ReEmail' data-toggle='tooltip' title='Confirme seu e-mail/LOGIN' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='senha'>Senha: </label>
                                <input type='password' class='form-control focused' id='senha' name='senha' data-toggle='tooltip' title='Preencha sua senha' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='RepetirSenha'>Confirme sua senha: </label>
                                <input type='password' class='form-control focused' id='RepetirSenha' name='ReSenha' data-toggle='tooltip' title='Confirme sua senha' data-placement='bottom' />
                            </div>
                        </fieldset>
                        <div class='form-group'>
                            <input class='col-md-6 btn btn-primary' type='submit' value='Cadastrar' name='Cadastrar' data-toggle='tooltip' title='Clique aqui para se cadastrar' data-placement='bottom' />
                        </div>
                    </fieldset>
                </form>
            </div>	

            <div class='col-md-4 absolute'></div>
            <fieldset class='col-md-3 logindireita'>
                <h1 class='whitecolor'>Faça Login!</h1><br>
                <form>
                    <legend class='scheduler-border'>Login</legend>
                    <div class='form-group'> 
                        <label for='usuario'>Login: </label>
                        <input type='text' class='form-control focused' id='usuario' name='usuario' data-toggle='tooltip' title='Preencha seu e-mail/LOGIN para entrar' data-placement='bottom' />
                    </div>
                    <div class='form-group'>
                        <label for='senha'>Senha: </label>
                        <input type='password' class='form-control focused' id='senha' name='senha' data-toggle='tooltip' title='Preencha sua senha para entrar' data-placement='bottom' />
                    </div>
                    <div class='form-group'>
                        <input class='col-lg-6 col-md-6 col-sm-6 col-xs-6 btn btn-primary' type='submit' value='Entrar' data-toggle='tooltip' title='Clique aqui para ENTRAR' data-placement='bottom' />
                    </div>
            </fieldset>
        </form>	
    </div>
</section>";
    }
}
