<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace estamparia\view\adm\view;

use estamparia\view\adm\view;
/**
 * Description of ProdutoAdmView
 *
 * @author Mateus
 */
class ProdutoAdmView extends TopoAdm{
    //put your code here
    protected $produtos;
    protected $caminhoImg = "../../../imagens/";


    public function __construct($produtos) {
        parent::__construct();
        $this->produtos = $produtos;
    }

    public function mostrarPagina() {
        echo "<article id='produtosPagAdm'>
                <h1 class='titlecad'>Produtos</h1>
                <form enctype='multipart/form-data' class='form' name='validate' id='formProdutoAdm' method='POST' action='?pagina=wp_Produto_Adm&acao=salvar'>
                    <fieldset class='col-md-4 scheduler-border'>
                        <legend class='scheduler-border'>Editar Produto</legend>
                        <fieldset>
                            <div class='form-group'>
                                <input type='checkbox' id='existente' name='produtoExistente' value='true' data-toggle='tooltip' title='Produto já existente mas com cor e foto diferentes' data-placement='top' />
                                <label for='existente' data-toggle='tooltip' title='Produto já existente mas com cor e foto diferentes' data-placement='top'>Produto já existente</label>
                            </div>
                            <div class='form-group'>
                            <fieldset>
        			<input class='personalizavel' id='personalizavelN' type='radio' name='personalizavel' checked='checked' value='N' title='Produto a ser comercializado no site, uma camiseta já estampada'><label for='personalizavelN'<label for='personalizavelN'>Camiseta da Loja</label></input><br />
				<input class='personalizavel' id='personalizavelS' type='radio' name='personalizavel' value='S' title='Produto a ser personalizado pelo cliente'><label for='personalizavelS'> Camiseta para ser estampada</label></input>
                            </div>
                            
                            <div class='form-group'>
                                <label for='idproduto'>ID Produto: </label>
                                <input type='text' readonly class='form-control focused' id='idproduto' name='idProduto' data-toggle='tooltip' title='Id do Produto' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='nomedacamisa'>Nome: </label>
                                <input placeholder='Adicione o Nome da Camiseta' type='text' class='form-control focused' id='nome' name='nome' data-toggle='tooltip' title='Nome da Camisa' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='modelo'>Modelo da camiseta: </label>
                                <input placeholder='Adicione o Modelo Da Camiseta' type='text' class='form-control focused' id='modelo' name='modelo' data-toggle='tooltip' title='Modelo da camiseta' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='tecido'>Tecido: </label>
                                <input placeholder='Adicione o Tecido Da Camiseta' type='text' id='tecido' class='form-control' name='tecido' data-toggle='tooltip' title='Informe o tecido da camiseta' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label>Selecione a cor da camiseta disponivel</label>
                                <select class='form-control focused' id='corAdm' name='cor' data-toggle='tooltip' title='Informe a cor da camiseta' data-placement='bottom' >
                                    <option value=''>Selecione uma cor</option>";
                                $objCor = new \estamparia\model\CorModel();
                                $cores = $objCor->consultarTudo();
                            foreach ($cores as $cor) {
                                echo "<option value='".$cor["id_cor"]."'>".$cor["cor"]."</option>";
                            }

                        echo "  </select>
                            </div>
                            <div class='form-group'>
                                <label for='tamanho'>Tamanho: </label>
                                <select class='form-control focused' id='tamanhoAdm' name='tamanho' data-toggle='tooltip' title='Informe o tamanho da camiseta' data-placement='bottom' >
                                    <option value=''>Selecione um tamanho</option>";
                                $objTamanho = new \estamparia\model\TamanhoModel();
                                $tamanhos = $objTamanho->consultarTudo();
                            foreach ($tamanhos as $tamanho) {
                                echo "<option value='".$tamanho["id_tamanho"]."'>".$tamanho["tamanho"]."</option>";
                            }
                        echo "</select>
                            </div>
                            <div class='form-group'>
                                <label for='preco'>Adicione produtos no Estoque: </label>
                                <input placeholder='Adicione mais no estoque' type='number' class='form-control focused' id='qtddeestoque' name='quantidadeestoque' data-toggle='tooltip' title='Adicione Produtos no Estoque' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='imagem'>Imagem da estampa: </label>
                                <input type='file' id='imagem' name='imagem' data-toggle='tooltip' title='Clique aqui e escolha uma imagem ou modelo ja pronto para sua estampa' data-placement='bottom' />
                                <input type='hidden' id='imagemAtual' name='imagemAtual' data-toggle='tooltip' title='Clique aqui e escolha uma imagem ou modelo ja pronto para sua estampa' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='preco'>Preço: </label>
                                <input placeholder='Adicione o Preço Da Camiseta' type='text' class='form-control focused' id='preco' name='preco' data-toggle='tooltip' title='Informe o preço do produto' data-placement='bottom' />
                            </div>
                            <div class='form-group'>
                                <label for='descricao'>Descrição: </label>
                                <textarea placeholder='Adione uma decrição da camiseta' type='text' class='form-control focused descricaoProduto' id='descricao' name='descricao' data-toggle='tooltip' title='Insira uma descrição ou um comentario' data-placement='bottom' ></textarea>
                            </div>
                        </fieldset>
                    </fieldset>
                    <div class='form-group'>
                        <input class='col-md-6 btn btn-primary botaocadastro' id='SalvarProduto' type='submit' value='Salvar' data-toggle='tooltip' title='Salve ou edite a camiseta' data-placement='bottom' ></input>
                    </div>
                </form>
            </article>
            <aside>
                <h1 class='cadastro'>Camisas Cadastradas</h1>";
        foreach ($this->produtos as $idProduto){
                $produto = new \estamparia\model\ProdLojaModel($idProduto["id_produto"]);
                echo "
             <div class='CamisetaAdm'> 
                 <figure>
                    <img class='camisascadastradas' src='". $this->caminhoImg.$produto->getFotoProduto()."' title='Camisa'/>
                    <figcaption>
                        <p>Id Produto:  <span class='idProduto'>".$produto->getIdProduto()."</span></p>
                        <p>	Nome:  <span class='nomeProduto'>".$produto->getNome()."</span></p>
                        <p>	Modelo:  <span class='modeloProduto'>".$produto->getModelo()."</span></p>
                        <p>	Tecido: <span class='materialProduto'>".$produto->getMaterial()."</span></p>
                        <p>	Cor: ".$produto->Cor."</p>
                        <p>	Tamanho: ".$produto->Tamanho."</p>
                        <p>	Preço: R$<span class='precoProduto'>".$produto->getPreco()."</span></p>
                        <p>     Quantidade: ".$produto->getQuantidadeTotal()."</p>
                        <p>     Descricao: <span class='descricaoProduto'>".$produto->getDescricao()."</span></p>
                        <p>     <input type='hidden' class='imagemAtual' value='".'produtos/17-11-2016 0108/img7.png'."' /></p>
                    </figcaption>
                </figure>		
                <div class='form-group'>
                    <input class='col-md-0.2 btn btn-primary marginleft botaoedit btnEditar' type='button' value='Editar' data-toggle='tooltip' title='Edite alguma informação' data-placement='bottom' />
                    <input class='col-md-0.2 btn botaoedit btn-primary3 btnExcluir' type='button' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                </div>
            </div>";
                        }
            echo "</aside>";
    }
}
