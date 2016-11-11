<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view;

use estamparia\view\EstruturaView;

require_once '../../vendor/autoload.php';

/**
 * Description of PedidosView
 *
 * @author Mateus
 */
class PedidosView extends EstruturaView{
    //put your code here
    public function mostrarConteudo() {
        echo "
        <section>
            <header class='textcenter'>
                <h1 class='whitecolor'>FAÇA SEU PEDIDO PERSONALIZADO!</h1></br>
            </header>
            <div id='pedido' class='container padding-bottom4'>
                <form class='form' method='POST' action='pedido.php'>
                    <fieldset class='col-md-4 scheduler-border'>
                        <fieldset>
                            <legend>Modelo de camiseta</legend>
                            <div class='form-group'>
                                <label for='modelo'>Modelo da camiseta: </label>
                                <select class='form-control focused' id='modelo' name='modelo' data-toggle='tooltip' title='Modelo da camiseta' data-placement='bottom' />
                                <option value=''></option>
                                <option value=''></option>
                                </select>
                            </div>
                            <div class='form-group'>
                                <label for='tipoCamiseta'>Tipo: </label>
                                <select class='form-control focused' id='tipoCamiseta' name='tipoCamiseta' data-toggle='tooltip' title='Escolha o tipo de Camiseta' data-placement='bottom' />
                                <option value=''></option>
                                <option value=''></option>
                                </select>
                            </div>
                            <div class='form-group'>
                                <label for='tecido'>Tecido: </label>
                                <select id='tecido' class='form-control' data-toggle='tooltip' title='Informe o tecido da camiseta' data-placement='bottom' />
                                <option value=''></option>
                                <option value=''></option>
                                </select>
                            </div>
                            <div class='form-group'>
                                <label for='cor'>Cor: </label>
                                <fieldset>
                                    <label>Selecione a cor da camiseta disponivel</label>
                                    <input type='color' name='cor' id='cor' data-toggle='tooltip' title='Informe a cor da camiseta' data-placement='bottom' />
                                </fieldset>
                            </div>
                            <div class='form-group'>
                                <label for='tamanho'>Tamanho: </label>
                                <select class='form-control focused' id='tamanho' name='tamanho' data-toggle='tooltip' title='Informe o tamanho da camiseta' data-placement='bottom' />
                                <option value=''></option>
                                <option value=''></option>
                                </select>
                            </div>
                            <fieldset>
                                <legend>Estampa </legend>
                                <div class='form-group'>
                                    <label for='tipoEstampa'>Descrição: </label>
                                    <select class='form-control focused' id='descricao' name='descricao' data-toggle='tooltip' title='Informe o tipo de estampa' data-placement='bottom' />
                                    <option value=''></option>
                                    <option value=''></option>
                                    </select>
                                </div>
                                <div class='form-group'>
                                    <label for='qualidade'>Qualidade da estampa: </label>
                                    <select class='form-control focused' id='qualidade' name='qualidade' data-toggle='tooltip' title='Informe a qualidade da estampa' data-placement='bottom' />
                                    <option value=''></option>
                                    <option value=''></option>
                                    </select>
                                </div>								
                                <fieldset>
                                    <legend>Imagem estampa </legend>
                                    <div class='form-group'>
                                        <label for='imagem'>Imagem da estampa: </label>
                                        <input type='file' id='imagem' name='imagem' data-toggle='tooltip' title='Clique aqui e escolha uma imagem ou modelo ja pronto para sua estampa' data-placement='bottom' />
                                    </div>
                                    <div class='form-group'>
                                        <label for='qualidade'>Local: </label>
                                        <select class='form-control focused' id='local' name='local' data-toggle='tooltip' title='Informe o local da estampa' data-placement='bottom' />
                                        <option value=''></option>
                                        <option value=''></option>
                                        </select>
                                    </div>
                                </fieldset>
                            </fieldset>
                        </fieldset>
                    </fieldset>

                    <div class='col-md-4'></div>
                    <fieldset class='col-md-4'>
                        <fieldset>
                            <legend>Orçamento da camiseta estampada</legend>
                            <div class='form-group form-inline'>
                                <div class='col-md-6'>
                                    <label for='opEstamIguais' data-toggle='tooltip' title='clique aqui se todas as estampas seram iguais/unicas' data-placement='bottom' >Apenas estampas iguais: </label>
                                    <input type='radio' value='opEstamIguais' class='form-control focused' id='opEstamIguais' name='Estampas' data-toggle='tooltip' title='clique aqui se todas as estampas seram iguais/unicas' data-placement='bottom' />
                                </div>
                                <div class='col-md-6'>
                                    <label for='opEstamDiferent' data-toggle='tooltip' title='clique aqui se algumas estampas seram diferentes (DUAS ou MAIS)' data-placement='bottom' >Algumas estampas diferentes: </label>
                                    <input type='radio' value='opEstamDiferent' class='form-control focused' id='opEstamDiferent' name='Estampas' data-toggle='tooltip' title='clique aqui se algumas estampas seram diferentes (DUAS ou MAIS)' data-placement='bottom' />
                                </div>
                            </div>
                            <div id='estampasDiferentes'>
                                <div class='form-group'>
                                    <label for='qtdIgual'>Quantidade de camisetas iguais: </label>
                                    <input type='text' class='form-control focused' id='qtdIgual' name='qtdIgual' data-toggle='tooltip' title='Informe a quantidade de camisetas estampadas que serão iguais; DUAS ou MAIS' data-placement='bottom' />
                                </div>
                                <div class='form-group'>
                                    <label for='qtdUnic'>Quantidade de camisetas unicas: </label>
                                    <input type='text' class='form-control focused' id='qtdUnic' name='qtdUnic' data-toggle='tooltip' title='Informe a quantidade de camisetas que seram unicas; APENAS UMA' data-placement='bottom' />
                                </div>
                                <div class='form-group'>
                                    <label for='qtdTotal'>Total de camisetas: </label>
                                    <input type='text' class='form-control focused' id='qtdTotal' name='qtdTotal' data-toggle='tooltip' title='Quantidade Total = Camisetas Unicas + Camisetas iguais (DUAS ou MAIS)' data-placement='bottom' />
                                </div>
                                <div class='form-group'>
                                    <label for='arqDesc'>Descrição das camisetas: </label>
                                    <input type='file' id='arqDesc' name='arqDesc' data-toggle='tooltip' title='Clique aqui para nos enviar um arquivo com as descrições das estampas diferentes. &#13; exemplo:nome, número...' data-placement='bottom' />
                                </div>
                            </div>
                            <div id='estampasIguais'>
                                <div class='form-group'>
                                    <label for='qtdTotal'>Total de camisetas: </label>
                                    <input type='text' class='form-control focused' id='qtdTotal' name='qtdTotal' data-toggle='tooltip' title='Quantidade Total = Camisetas Unicas + Camisetas iguais (DUAS ou MAIS)' data-placement='bottom' />
                                </div>
                            </div>

                            <div class='form-group'>
                                <label for='descricao'>Descrição: </label>
                                <textarea type='text' class='form-control focused' id='descricao' name='descricao' data-toggle='tooltip' title='Insira uma descrição ou um comentario' data-placement='bottom' ></textarea>
                            </div>
                        </fieldset>

                        <div class='form-group '>
                            <input class='col-md-6 btn btn-primary ' type='submit' value='Fazer Pedido' data-toggle='tooltip' title='Clique aqui para se cadastrar' data-placement='bottom' />
                        </div>
                    </fieldset>
                </form>
            </div>
        </section>";
    }
}
