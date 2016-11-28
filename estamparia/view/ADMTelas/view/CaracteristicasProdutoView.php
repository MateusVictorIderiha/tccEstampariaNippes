<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace estamparia\view\adm\view;

use estamparia\view\ADM\view\EstruturaADM;

/**
 * Description of CaracteristicasProdutoView
 *
 * @author Mateus
 */
class CaracteristicasProdutoView extends EstruturaADM{
    //put your code here
    public function mostrarCaracteristicaModelo() {
        echo "<article class='itencadastro2'>
            <h1 class='titlecoisas'> Adicionar Modelo</h1>
            <form class='form' method='POST' action='editProduto.php'>
                <fieldset class='col-md-2 scheduler-border'>
                    <legend class='scheduler-border'>Editar Produto</legend>
                    <fieldset>
                        <legend>Modelo</legend>
                        <div class='form-group'>
                            <label for='idproduto'>ID Modelo:</label>
                            <input type='text' class='form-control focused' id='idmodelo' name='idmodelo' data-toggle='tooltip' title='Modelo' data-placement='bottom' />
                        </div>
                        <div class='form-group'>
                            <label for='idproduto'>Adicione um Modelo </label>
                            <input type='text' class='form-control focused' id='modelo' name='modelo' data-toggle='tooltip' title='Adicionar um Modelo' data-placement='bottom' />
                        </div>
                        <div class='form-group'>
                            <input class='col-md-10 btn btn-primary botaocadastro' type='submit' value='Cadastre o Modelo' data-toggle='tooltip' title='Cadastre' data-placement='bottom' />
                        </div>	
                    </fieldset>
                </fieldset>
            </form>		
            <section class='idcadastrados'>
                <p>	ID Modelo: </a>
                <p>	Nome do Modelo: </a></p>
                <div class='form-group'>
                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                </div>
                <p>	ID Modelo: </a>
                <p>	Nome do Modelo: </a></p>
                <div class='form-group'>
                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                </div>
            </section>
            <section class='idcadastrados'>
                <p>	ID Modelo: </a>
                <p>	Nome do Modelo: </a></p>
                <div class='form-group'>
                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                </div>
                <p>	ID Modelo: </a>
                <p>	Nome do Modelo: </a></p>
                <div class='form-group'>
                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                </div>
            </section>
        </article>";
    }
    
    public function mostrarCaracteristicaTamanho() {
        echo "<section class='idcadastrados'>
                <p>	ID Tamanho: </a>
                <p>	Nome do Tamanho: </a></p>
                <div class='form-group'>
                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                </div>
                <p>	ID Tamanho: </a>
                <p>	Nome do Tamanho: </a></p>
                <div class='form-group'>
                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                </div>
            </section>
            <section class='idcadastrados'>
                <p>	ID Tamanho: </a>
                <p>	Nome do Tamanho: </a></p>
                <div class='form-group'>
                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                </div>
                <p>	ID Tamanho: </a>
                <p>	Nome do Tamanho: </a></p>
                <div class='form-group'>
                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                </div>
            </section>
        </article>";
    }
    
    public function mostrarCaracteristicaCor() {
        echo "<article class='itencadastro2'>
                <h1 class='titlecoisas'> Adicionar Cor</h1>
                <form class='form' method='POST' action='editProduto.php'>
                    <fieldset class='col-md-2 scheduler-border'>
                        <legend class='scheduler-border'>Editar Produto</legend>
                        <fieldset>
                            <legend>Cor</legend>
                            <div class='form-group'>
                                <label for='idproduto'>ID Cor: </label>
                                <input type='text' class='form-control focused' id='idproduto' name='idcor' data-toggle='tooltip' title='Id Cor' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='idproduto'>Adicione uma Cor: </label>
                                <input type='text' class='form-control focused' id='idproduto' name='idcor' data-toggle='tooltip' title='Id Cor' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='idproduto'>Hexadecimal: </label>
                                <input type='text' class='form-control focused' id='codigohexadecimal' name='hexadecimalvalor' data-toggle='tooltip' title='Valor Hexadecimal da Cor' data-placement='bottom' />
                            </div>

                            <div class='form-group'>
                                <label for='idproduto'>CMYK:	<input class='col-md-0 btn-primary' type='submit' value='+' data-toggle='tooltip' title='Adicionar Outro Tipo' data-placement='bottom' /> </label> 
                                <input type='text' class='form-control focused' id='codigocmyk' name='cmykvalor' data-toggle='tooltip' title='Valor em CYMK' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <input class='col-md-10 btn btn-primary botaocadastro' type='submit' value='Cadastre a Cor' data-toggle='tooltip' title='Cadastre' data-placement='bottom' />
                            </div>	
                        </fieldset>
                    </fieldset>

                </form>		
                <section class='idcadastrados'>
                    <p>	ID Cor: </a>
                    <p>	Hexadecimal: </a></p>
                    <p>	CMYK: </a></p>
                    <p>	Outro: </a></p>
                    <div class='form-group'>
                        <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                        <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                    </div>
                    <p>	ID Cor: </a>
                    <p>	Hexadecimal: </a></p>
                    <p>	CMYK: </a></p>
                    <p>	Outro: </a></p>
                    <div class='form-group'>
                        <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                        <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                    </div>

                </section>
                <section class='idcadastrados'>
                    <p>	ID Cor: </a>
                    <p>	Hexadecimal: </a></p>
                    <p>	CMYK: </a></p>
                    <p>	Outro: </a></p>
                    <div class='form-group'>
                        <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                        <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                    </div>
                    <p>	ID Cor: </a>
                    <p>	Hexadecimal: </a></p>
                    <p>	CMYK: </a></p>
                    <p>	Outro: </a></p>
                    <div class='form-group'>
                        <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                        <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                    </div>

                </section>
            </article>";
    }
    
    
}
