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
        $javasriptValor4["caminho"] = "bootstrap/js/validate/dist/jquery.validate.js";
        $javascripts[] = $javasriptValor3;
        $javascripts[] = $javasriptValor4;
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
                <form name='cadastrarCliente' id='cadastrarCliente' class='form' method='POST' action='?pagina=wp_cadastrar&acao=cadastrar_cliente' >
                    <fieldset class='col-md-4 formulario padding-bottom4'>
                        <h1 class='century font33px'>CADASTRE-SE</h1>
                        <fieldset>
                            <legend>Informações Pessoais</legend>
                            <div class='form-group'>
                                <label for='nome'>Nome completo: </label>
                                <input type='text' class='form-control focused' id='nome' name='nome' data-toggle='tooltip' title='Preencha seu nome completo' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='cpf'>CPF: </label>
                                <input type='text' class='form-control focused' id='cpf' name='cpf' maxlength='11' data-toggle='tooltip' title='Preencha seu CPF' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='rg'>RG: </label>
                                <input type='text' class='form-control focused' id='rg' name='rg' data-toggle='tooltip' title='Preencha seu RG' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='datepicker1'>Data de nascimento </label>
                                <div class='input-group date'>
                                    <input type='text' id='datepicker1' name='dataNascimento' class='form-control' data-toggle='tooltip' title='Informe sua data de nascimento' data-placement='bottom' />
                                    <span class='input-group-addon' focused>
                                        <span class='glyphicon glyphicon-calendar'></span>
                                    </span>
                                </div>
                            </div>	
                            <div id='telefones'>
                                <div class='form-group'>
                                    <label for='telefone'>Telefone: </label>
                                    <input type='tel' class='form-control focused' class='telefoneInput' name='telefone[]' data-toggle='tooltip' title='Informe seu telefone' data-placement='bottom' />
                                </div>
                            </div>
                            <button type='button' id='addTelefone' class='add btn' title='Clique aqui para adicionar mais telefones'>+ Adicionar mais um Telefones</button>
                            <div id='celulares'>
                                <div class='form-group'>
                                    <label for='celular'>Celular: </label>
                                    <input type='text' class='form-control focused' class='celularInput' id='celular' name='celular[]' data-toggle='tooltip' title='Informe seu celular' data-placement='bottom' />
                                </div>
                            </div>
                            <button type='button' id='addCelular' class='add btn'  title='Clique aqui para adicionar mais celulares'>+ Adicionar mais um celular</button>
                            <fieldset>
                                <legend>Endereço </legend>
                                <div class='form-group'>
                                    <label for='cep'>CEP: </label>
                                    <input type='text' class='form-control focused' id='cep' name='cep' maxlength='8' data-toggle='tooltip' title='Informe o CEP da sua Rua/Cidade' data-placement='bottom' />
                                </div>
                                <span id='test' class='font33px'></span>
                                <div class='form-group'>
                                    <label for='rua'>Rua: </label>
                                    <input type='text' class='form-control focused' id='rua' name='rua' data-toggle='tooltip' title='Informe sua Rua' data-placement='bottom' />
                                </div>
                                <div class='form-group'>
                                    <label for='cidade'>Cidade: </label>
                                    <input type='text' class='form-control focused' id='cidade' name='cidade' data-toggle='tooltip' title='Informe a Cidade' data-placement='bottom' />
                                </div>
                                <div class='form-group'>
                                    <label for='estado'>Estado: </label>
                                    <input type='text' class='form-control focused' id='estado' name='estado' data-toggle='tooltip' title='Informe o estado' data-placement='bottom' />
                                </div>
                                <div class='form-group'>
                                    <label for='numero'>Número: </label>
                                    <input type='text' class='form-control focused' id='numero' name='numero' data-toggle='tooltip' title='Informe o número da sua moradia' data-placement='bottom' />
                                </div>
                                <div class='form-group'>
                                    <label for='complemento'>Complemento: </label>
                                    <input type='text' class='form-control focused' id='complemento' name='complemento' data-toggle='tooltip' title='Informe o complemento' data-placement='bottom' />
                                </div>
                            </fieldset>
                        </fieldset>
                        <fieldset>
                            <legend>Informações da conta (Login)</legend>
                            <div class='form-group'>
                                <label for='email'>E-mail: </label>
                                <input type='email' class='form-control focused' id='email' name='email' data-toggle='tooltip' title='Preencha seu e-mail/LOGIN' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='RepetirEmail'>Confirme seu e-mail: </label>
                                <input type='email' class='form-control focused' id='RepetirEmail' name='ReEmail' data-toggle='tooltip' title='Confirme seu e-mail/LOGIN' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='senha'>Senha: </label>
                                <input type='password' class='form-control focused' id='senha' name='cadSenha' data-toggle='tooltip' title='Preencha sua senha' data-placement='bottom' />
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


            <fieldset class='col-md-3 logindireita'>
                <h1 class='whitecolor'>Faça seu Login!</h1>
                <form method='Post' action='?pagina=wp_login&acao=logar_cliente'>
                    <div class='form-group'> 
                        <label for='usuario'>Login: </label>
                        <input type='text' class='form-control focused' id='usuarioLogin' name='usuario' data-toggle='tooltip' title='Preencha seu e-mail/LOGIN para entrar' data-placement='bottom' />
                    </div>
                    <div class='form-group'>
                        <label for='senha'>Senha: </label>
                        <input type='password' class='form-control focused' id='senhaLogin' name='senha' data-toggle='tooltip' title='Preencha sua senha para entrar' data-placement='bottom' />
                    </div>
                    <div class='form-group'>
                        <input type='checkbox' id='loginCookie' class='focused' name='loginCookie' value='1' data-toggle='tooltip' title='Clique para se manter logado' data-placement='bottom' />
                        <label for='loginCookie'>Matenha-se conectado </label>
                    </div>
                    <a href=''>Esqueceu sua senha</a>
                    <div class='form-group'>
                        <input id='cadastrar' class='col-lg-6 col-md-6 col-sm-6 col-xs-6 btn btn-primary' type='submit' value='Entrar' data-toggle='tooltip' title='Clique aqui para ENTRAR' data-placement='bottom' />
                    </div>
                </form>	
            </fieldset>
        </section>";
    }
}
