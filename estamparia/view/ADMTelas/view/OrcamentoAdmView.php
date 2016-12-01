<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view\adm\view;

use estamparia\view\adm\view\TopoAdm;

/**
 * Description of OrcamentoAdmView
 *
 * @author Mateus
 */
class OrcamentoAdmView extends TopoAdm{
    //put your code here
    protected $orcamentos;
    
    public function __construct($orcamento) {
        parent::__construct();
        $this->orcamentos = $orcamento;
    }


    public function mostrarPagina() {
        echo "<article>
                            <h1 class='titlecad'>Orçamento da Venda</h1>

                            <form class='form' method='POST' action='cadastrar.php'>
                                <fieldset class='col-md-10 scheduler-border'>
                                    <fieldset>
                                        <legend>Orçamento:</legend>
                                        <div class='form-group'>
                                            <label for='idpromocao'>ID Venda </label>
                                            <input type='text' class='form-control focused' id='idvenda' name='idvenda' data-toggle='tooltip' title='Id Automático de Venda' data-placement='bottom' />
                                        </div>	
                                            <div class='form-group'>
                                                <label for='desconto'>Desconto: </label>
                                                <input type='text' class='form-control focused' id='desconto' name='desconto' data-toggle='tooltip' title='Informe o desconto' data-placement='bottom' />
                                            </div>		
                                            <div class='form-group'>
                                                <label for='idCliente'>Id Cliente: </label>
                                                <input type='text' class='form-control focused' id='cpfcliente' name='CPFcliente' data-toggle='tooltip' title='Informe o CPF do Cliente' data-placement='bottom' />
                                            </div>
                                            <div class='form-group'>
                                                <label for='precototal'>Preço Total: </label>
                                                <input type='text' class='form-control focused' id='precototal' name='precototal' data-toggle='tooltip' title='Preço Total' data-placement='bottom' />
                                            </div>	
                                    </fieldset>
                                </fieldset>					
                            </form>
                            <div class='form-group marginleft'>
                                <input class='col-lg-6 col-md-6 col-sm-6 col-xs-6 btn btn-primary' type='submit' value='Confirmar Orçamento' data-toggle='tooltip' title='Enviar Orçamento' data-placement='bottom' />
                            </div>
                        </article>";
        foreach ($this->orcamentos as $orcamento) {
                        echo "<aside class='backcinza'>
                            <h1 class='cadastro'>Promoções No Site</h1>
                            <p class='paragrafo'>	ID Venda: </a>
                            <p class='paragrafo'>	Preço Total: </a></p>
                            <p class='paragrafo'>	ID Cliente: </a></p>
                            <div class='form-group'>
                                <input class='col-md-0.2 btn btn-primary botaoedit marginleft2' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                            </div>
                        </aside>";
        }
    }
}
