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
    private $listaProdutos;
    private $listaTamanhos;
    
    public function __construct($listaProdutos = null) {
        parent::__construct();
        
        $this->listaProdutos = $listaProdutos;       
    }
    public function mostrarConteudo() {
        echo "
        <section>
            <header class='textcenter'>
                <h1 class='whitecolor'>FAÇA SEU PEDIDO PERSONALIZADO!</h1>
            </header>
            <div id='pedido' class='container padding-bottom4'>
                <form class='form col-md-4' method='POST' action='?pagina=wp_pedidos&acao=fazer_pedido' enctype='multipart/form-data'>
                    <div id='pedido'>
                        <fieldset>
                            <fieldset>
                                <legend>Modelo de camiseta</legend>
                                <div class='form-group'>
                                    <label for='modelo'>Modelo da camiseta: </label>
                                    <select id='idModelo' class='form-control focused' id='modelo' name='modelo[]' data-toggle='tooltip' title='Modelo da camiseta' data-placement='bottom' >
                                        <option value=''></option>";
                                    foreach ($this->listaProdutos as $indice => $produtoMateriaPrima){
                                        echo "<option value='".$indice."' data-toggle='tooltip' title='".$produtoMateriaPrima."' data-placement='bottom'>"
                                                . $produtoMateriaPrima
                                                . "</option>";
                                    }
                               echo "</select>
                                </div>
                                <div class='form-group'>
                                    <fieldset>
                                        <label for='cor'>Selecione a cor da camiseta:</label>
                                        <select id='cor' name='cor[]' class='form-control focused' data-toggle='tooltip' title='Informe a cor da camiseta' data-placement='bottom' >
                                            <option value=''></option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div id='tamanhoNormal' class='form-group'>
                                    <label for='tamanho'>Tamanho: </label>
                                    <select class='form-control focused' id='tamanho' name='tamanho[]' data-toggle='tooltip' title='Informe o tamanho da camiseta' data-placement='bottom' >
                                        <option value=''></option>
                                    </select>
                                </div>
                                <div id='imgCamiseta'>
                                </div>
                                <fieldset>
                                    <legend>Estampa </legend>
                                    <div class='form-group'>
                                        <input type='checkbox' id='formandos' name='formandos' value='true' data-toggle='tooltip' title='Todas as estampas são semelhantes, porém com um detalhe diferente. ex: camiseta de formandos (Nome na camiseta), camiseta de times' data-placement='top' />
                                        <label for='formandos' data-toggle='tooltip' title='Todas as estampas são semelhantes, porém com um detalhe diferente. ex: camiseta de formandos (Nome na camiseta, camiseta de times)' data-placement='top'>Modelo de estampa estilo formandos: </label>
                                    </div>
                                    <div class='form-group'>
                                        <label for='imagem'>Imagem da estampa: </label>
                                        <input type='file' id='imagem' name='imagem' data-toggle='tooltip' title='Clique aqui e escolha uma imagem ou modelo ja pronto para sua estampa' data-placement='bottom' />
                                    </div>
                                   <div class='form-group'>
                                        <label for='qtdTotal'>Quantidade de camisetas: </label>
                                        <input type='text' class='form-control focused' id='qtdTotal' name='qtdTotal[]' data-toggle='tooltip' title='Quantidade Total de camisetas' data-placement='bottom' />
                                    </div>
                                    <div class='form-group'>
                                        <label for='descricao'>Descrição: </label>
                                        <textarea type='text' class='form-control focused' id='descricao' name='descricao[]' data-toggle='tooltip' title='Insira uma descrição ou um comentario' data-placement='bottom' ></textarea>
                                    </div>                                    
                                </fieldset>
                            </fieldset>
                        </fieldset>
                    </div>
                    
                    <div class='form-group row'>
                        <input id='addEstampa' class='col-md-6 btn btn-primary' type='button' value='Adicionar outra Estampa' data-toggle='tooltip' title='Clique aqui para se cadastrar' data-placement='bottom' />
                    </div>
                    <div class='form-group row'>
                        <input class='col-md-6 btn btn-primary ' type='submit' value='Fazer Pedido' data-toggle='tooltip' title='Clique aqui para se cadastrar' data-placement='bottom' />
                    </div>
                </form>
            </div>
        </section>";
    }
}
