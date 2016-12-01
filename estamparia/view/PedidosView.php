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
        $javasriptValor3["caminho"] = "bootstrap/js/validate/dist/jquery.validate.js";
        $javascripts[] = $javasriptValor3;
        $configuracoes["javascript"] = $javascripts;
        parent::__construct($configuracoes);
        
        $this->listaProdutos = $listaProdutos;       
    }
    public function mostrarConteudo() {
        echo "
        <section>
            <header class='textcenter'>
                <h1 class='whitecolor'>FAÇA SEU PEDIDO PERSONALIZADO!</h1>
            </header>
            <div id='pedido' class='container padding-bottom4'>
                <form class='form col-md-5' method='POST' action='?pagina=wp_pedidos&acao=fazer_pedido' enctype='multipart/form-data'>
                    <div id='pedido'>
                        <fieldset>
                            <fieldset>
                                <legend>Modelo de camiseta</legend>
                                <div class='form-group'>
                                    <label for='modelo'>Modelo da camiseta: </label>
                                    <select id='idModelo' class='form-control focused' id='modelo' name='modelo' data-toggle='tooltip' title='Modelo da camiseta' data-placement='bottom' >
                                        <option value=''></option>";
                                    foreach ($this->listaProdutos as $indice => $produtoMateriaPrima){
                                        echo "<option value='".$indice."' data-toggle='tooltip' title='".$produtoMateriaPrima."' data-placement='bottom'>"
                                                . $produtoMateriaPrima
                                                . "</option>";
                                    }
                               echo "</select>
                                </div>
                                <div class='form-group' id='corNormal'>
                                    <fieldset>
                                        <label for='cor'>Selecione a cor da camiseta:</label>
                                        <select id='cor' name='cor' class='form-control focused' data-toggle='tooltip' title='Informe a cor da camiseta' data-placement='bottom' >
                                            <option value=''></option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div id='tamanhoNormal' class='form-group'>
                                    <label for='tamanhoProduto'>Tamanho: </label>
                                    <select class='form-control focused' id='tamanho' name='tamanho' data-toggle='tooltip' title='Informe o tamanho da camiseta' data-placement='bottom' >
                                        <option value=''></option>
                                    </select>
                                </div>
                                <div id='idProduto'>
                                </div>
                                <fieldset>
                                    <legend>Estampa </legend>
                                    <div class='form-group'>
                                        <input type='checkbox' id='formandos' name='formandos' value='true' data-toggle='tooltip' title='Todas as estampas são semelhantes, porém com um detalhe diferente. ex: camiseta de formandos (Nome na camiseta), camiseta de times' data-placement='top' />
                                        <label for='formandos' data-toggle='tooltip' title='Todas as estampas são semelhantes, porém com um detalhe diferente. ex: camiseta de formandos (Nome na camiseta, camiseta de times)' data-placement='top'>Um modelo de estampa para várias camisetas semelhantes.</label>
                                    </div>
                                    <div class='form-group'>
                                        <label for='imagem'>Imagem da estampa: </label>
                                        <input type='file' id='imagem' name='imagem' data-toggle='tooltip' title='Clique aqui e escolha uma imagem ou modelo ja pronto para sua estampa' data-placement='bottom' />
                                    </div>
                                    <div class='form-group'>
                                        <label for='descricao'>Descrição ou Comentario sobre a imagem da estampa: </label>
                                        <textarea type='text' class='form-control focused' id='descricao' name='descricao' data-toggle='tooltip' title='Insira uma descrição ou um comentario sobre a IMAGEM DA ESTAMPA' data-placement='bottom' ></textarea>
                                    </div>
                                   <div class='form-group' id='qtdNormal'>
                                        <label for='qtdTotal'>Quantidade de camisetas: </label>
                                        <input type='text' class='form-control focused' id='qtdTotal' name='qtdTotal' data-toggle='tooltip' title='Quantidade Total de camisetas' data-placement='bottom' />
                                    </div>
                                    <div class='form-group'>
                                        <label for='descricaoPedidosNormal'>Detalhe ou uma descrição da camiseta: </label>
                                        <textarea type='text' class='form-control focused' id='descricaoPedidosNormal' name='descricaoPedidos' data-toggle='tooltip' title='Detalhe ou descrição que vai na estampa da camiseta, por exemplo: o TAMANHO, um Nome, número ou uma frase que desejaria ná camiseta...' data-placement='bottom' ></textarea>
                                    </div>
                                    <div id='pedidosFormandos' class='oculta'>
                                        <fieldset> 
                                            <legend>Pedido de várias camisetas semelhantes</legend> 
                                            <table id='tabelaPedidos'> 
                                                <tr> 
                                                    <th title='Informe o tamanho da camiseta'>Tamanho</th> 
                                                    <th title='Detalhe ou descrição que vai na estampa da camiseta, por exemplo: Nome diferente atrás como em uma camiseta de formandos, um número em uma camiseta de time e entre outros...'>Detalhe ou descrição</th> 
                                                    <th title='Informe a quantidade de camisetas referente ao detalhe e tamanho'>QTD. </th> 
                                                </tr> 
                                                <tr>
                                                    <td>
                                                        <select class='form-control focused tamanhoFormandos' id='tamanhoFormandos1' name='tamanho[]' data-toggle='tooltip' title='Informe o tamanho da camiseta' data-placement='bottom' > 
                                                            <option value=''></option> 
                                                        </select> 
                                                    </td> 

                                                    <td> 
                                                        <input type='text' class='form-control focused descricaoPedido' name='descricoesPedidos[]' data-toggle='tooltip' title='Detalhe ou descrição que vai na estampa da camiseta como um Nome, número ou uma frase que desejaria ná camiseta, por exemplo: Nome diferente atrás como em uma camiseta de formandos, um número em uma camiseta de time e entre outros...' data-placement='bottom' /> 
                                                    </td>
                                                    <td> 
                                                        <input type='text' class='form-control focused qtdTotal textcenter' name='qtdTotal[]' data-toggle='tooltip' title='Quantidade Total de camisetas' data-placement='bottom' />
                                                    </td> 
                                                    <td class='oculta idsProdutos' id='idsProdutosFormandos1'> 
                                                    </td> 
                                                </tr>
                                            </table> 
                                            <div id=SomaQtdTotal>Total de Camisetas: <b></b></div>
                                        </fieldset>
                                    </div>
                                </fieldset>
                            </fieldset>
                        </fieldset>
                    </div>

                    <div class='form-group row'>
                        <button id='addEstampa' class='col-md-6 btn btn-primary' type='submit' value='true' name='continuar' data-toggle='tooltip' title='Clique aqui para continuar efetuando pedidos numa mesma compra' data-placement='bottom' >Pedir Mais</button>
                    </div>
                    <div class='form-group row'>
                        <input class='col-md-6 btn btn-primary ' type='submit' value='Fazer Pedido' data-toggle='tooltip' title='Clique aqui para finalizar e fazer seu pedido' data-placement='bottom' />
                    </div>
                </form>
                <div id='imgCamiseta' class='col-md-2'>
                </div>
            </div>
        </section>";
    }
}
