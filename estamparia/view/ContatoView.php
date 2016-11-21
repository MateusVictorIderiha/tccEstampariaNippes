<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view;

use estamparia\view\EstruturaView;
/**
 * Description of ContatoView
 *
 * @author Mateus
 */
class ContatoView extends EstruturaView{
    //put your code here
    
    public function mostrarConteudo() {
        echo "        
        <section class='faleconosco'>
            <h1>FALE CONOSCO!</h1>
            <article>				
                <form class='form' method='POST' action='pedido.php'>
                    <fieldset class='col-md-3 scheduler-border'>
                        <fieldset>
                            <div class='form-group'>
                                <label for='nome'>SEU NOME: </label>
                                <input type='text' class='form-control focused' id='nome' name='nome' data-toggle='tooltip' title='Nome do Usuário' data-placement='bottom' />
                            </div>				
                            <h3 class='font13px'>Campo Obrigatório</h3>
                            <option value=''></option>
                            <option value=''></option>

                            <div class='form-group'>
                                <label for='nome'>SEU E-MAIL: </label>
                                <input type='text' class='form-control focused' id='email' name='email' data-toggle='tooltip' title='Email do Usuário' data-placement='bottom' />
                            </div>				
                            <h3 class='font13px'>Campo Obrigatório</h3>
                            <option value=''></option>
                            <option value=''></option>
                            <div class='form-group'>
                                <label for='descricao'>SUA MENSAGEM: </label>

                                <textarea type='text' class='form-control focused' 
                                          id='mensagem' name='mensagem' data-toggle='tooltip' 
                                          title='Insira uma mensagem' data-placement='bottom' ></textarea>
                            </div>
                        </fieldset>
                        <div class='form-group padding-bottom10'>
                            <input class='col-md-4 btn btn-primary' type='submit' value='Enviar' data-toggle='tooltip' title='Clique aqui para enviar' data-placement='bottom' />
                        </div>
                    </fieldset>
                </form>
            </article>
        </section>

        <article class='positionleft font25px absolute padding22'>
            <h1>CONTATO</h1>
            <p>
                RUA MARIA GERMANI<br>
                18053-030-, Nº:883<br>
                JULIO DE MESQUITA<br>
                <br>
                TEL:(15)3202-5270<br>
                E-MAIL:<b>NIPPES@HOTMAIL.COM</b>
            </p>
        </article>";
    }
}
