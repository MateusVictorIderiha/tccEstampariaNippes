<!doctype html>
<html lang='pt-BR'>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1' />

        <link rel='stylesheet' type='text/css' media='all' href='../bootstrap/css/bootstrap.css' />
        <link rel='stylesheet' type='text/css' media='all' href='../bootstrap/jquery-ui/jquery-ui.css' />

        <script src='../bootstrap/js/jquery.js' ></script>
        <script src='../bootstrap/js/bootstrap.js' ></script> 
        <script src='../bootstrap/jquery-ui/jquery-ui.js' ></script>
        <script src='../javascript.js' ></script>

        <link href='css/estilo.css' rel='stylesheet' type='text/css' media='screen'>
        <link href='css/estiloadm.css' rel='stylesheet' type='text/css' media='screen'>

        <title>Nippes Estamparia</title>
    </head>
    <body>	
        <header>
            <figure>
                <img class='logotipo' src='img/logo.png' width='150px' height='50px' />
            </figure>
            <figure class='user'>
                <img src='img/user.png' width='50px' height='50px' />
            </figure>
            <h1 class='admin'><a href='#'>Admin<h1>
                        </header>
                        <nav class='espacoentre'>
                            <ul>
                                <br>
                                <li><a class='espacoentre' href='ADMprodutos.html'> PRODUTOS</a></li>
                                <li><a class='espacoentre' href='ADMcliente.html'> CLIENTE</a></li>
                                <li><a class='espacoentre' href='ADMcontato.html'> CONTATO</a></li>
                                <li><a class='espacoentre' href='ADMID.html'> ID INFORM</a></li>
                                <li><a class='espacoentre' href='ADMpromocao.html'> PROMOÇÕES</a></li>
                                <li><a class='espacoentre' href='ADMvenda.html'> ORCAMENTOS</a></li>
                            </ul>
                        </nav>

                        <article class='itencadastro2'>
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
                        </article>
                        <article class='itencadastro'>
                            <h1 class='titlecoisas'> Adicionar Tecido</h1>
                            <form class='form' method='POST' action='editProduto.php'>
                                <fieldset class='col-md-2 scheduler-border'>
                                    <legend class='scheduler-border'>Adicionar Tecido</legend>
                                    <fieldset>
                                        <legend>Cor</legend>
                                        <div class='form-group'>
                                            <label for='idproduto'>ID Tecido: </label>
                                            <input type='text' class='form-control focused' id='idtecido' name='idtecido' data-toggle='tooltip' title='Id automatico do tecido' data-placement='bottom' />
                                        </div>
                                        <div class='form-group'>
                                            <label for='idproduto'>Adicione um Tecido: </label>
                                            <input type='text' class='form-control focused' id='tecido' name='tecido' data-toggle='tooltip' title='Nome do Tecido' data-placement='bottom' />
                                        </div>
                                        <div class='form-group'>
                                            <input class='col-md-10 btn btn-primary botaocadastro' type='submit' value='Cadastre o Tecido' data-toggle='tooltip' title='Cadastre' data-placement='bottom' />
                                        </div>	
                                    </fieldset>
                                </fieldset>			
                            </form>		
                            <section class='idcadastrados'>
                                <p>	ID Tecido: </a>
                                <p>	Nome do Tecido: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                                <p>	ID Tecido: </a>
                                <p>	Nome do Modelo: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                            </section>			
                            <section class='idcadastrados'>
                                <p>	ID Tecido: </a>
                                <p>	Nome do Modelo: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                                <p>	ID Tecido: </a>
                                <p>	Nome: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                            </section>

                        </article>
                        <article class='itencadastro2'>
                            <h1 class='titlecoisas'> Adicionar Tipo</h1>
                            <form class='form' method='POST' action='editProduto.php'>
                                <fieldset class='col-md-2 scheduler-border'>
                                    <legend class='scheduler-border'>Editar Produto</legend>
                                    <fieldset>
                                        <legend>Tipo</legend>
                                        <div class='form-group'>
                                            <label for='idproduto'>ID tecido: </label>
                                            <input type='text' class='form-control focused' id='idproduto' name='idtecido' data-toggle='tooltip' title='Id tecido' data-placement='bottom' />
                                        </div>
                                        <div class='form-group'>
                                            <label for='idproduto'>Adicione uma tecido: </label>
                                            <input type='text' class='form-control focused' id='idproduto' name='idcor' data-toggle='tooltip' title='Id tipo' data-placement='bottom' />
                                        </div>
                                        <div class='form-group'>
                                            <input class='col-md-10 btn btn-primary botaocadastro' type='submit' value='Cadastre o Tipo' data-toggle='tooltip' title='Cadastre' data-placement='bottom' />
                                        </div>	
                                    </fieldset>
                                </fieldset>

                            </form>	
                            <section class='idcadastrados'>
                                <p>	ID Tipo: </a>
                                <p>	Nome do Tipo de Camisa: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                                <p>	ID Tipo: </a>
                                <p>	Nome do Tipo de Camisa: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                            </section>
                            <section class='idcadastrados'>
                                <p>	ID Tipo: </a>
                                <p>	Nome do Tipo de Camisa: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                                <p>	ID Tipo: </a>
                                <p>	Nome do Tipo de Camisa: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                            </section>
                        </article>
                        <article class='itencadastro'>
                            <h1 class='titlecoisas'> Tamanho</h1>
                            <form class='form' method='POST' action='editProduto.php'>
                                <fieldset class='col-md-2 scheduler-border'>
                                    <legend class='scheduler-border'>Tamanho</legend>
                                    <fieldset>
                                        <legend>Tipo</legend>
                                        <div class='form-group'>
                                            <label for='idproduto'>ID Tamanho: </label>
                                            <input type='text' class='form-control focused' id='idtamanho' name='idtamanho' data-toggle='tooltip' title='Id Tamanho' data-placement='bottom' />
                                        </div>
                                        <div class='form-group'>
                                            <label for='idtamanho'>Adicione um tamanho: </label>
                                            <input type='text' class='form-control focused' id='idtamanho' name='idtamanho' data-toggle='tooltip' title='Adicione um Tamanho' data-placement='bottom' />
                                        </div>
                                        <div class='form-group'>
                                            <input class='col-md-10 btn btn-primary botaocadastro' type='submit' value='Cadastre o Tamanho' data-toggle='tooltip' title='Cadastre' data-placement='bottom' />
                                        </div>	
                                    </fieldset>
                                </fieldset>

                            </form>	
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
                        </article>
                        <article class='itencadastro2'>
                            <h1 class='titlecoisas'> Local da Estampa</h1>
                            <form class='form' method='POST' action='editProduto.php'>
                                <fieldset class='col-md-2 scheduler-border'>
                                    <legend class='scheduler-border'>Local da Estampa</legend>
                                    <fieldset>
                                        <legend>Tipo</legend>
                                        <div class='form-group'>
                                            <label for='idproduto'>ID Estampa: </label>
                                            <input type='text' class='form-control focused' id='idestampa' name='idestampa' data-toggle='tooltip' title='Id Automático da Estampa' data-placement='bottom' />
                                        </div>
                                        <div class='form-group'>
                                            <label for='idtamanho'>Adicione um Local da Estampa </label>
                                            <input type='text' class='form-control focused' id='idestampa' name='idestampa' data-toggle='tooltip' title='Adicione um Local para Estampa' data-placement='bottom' />
                                        </div>
                                        <div class='form-group'>
                                            <input class='col-md-10 btn btn-primary botaocadastro' type='submit' value='Cadastre o Local' data-toggle='tooltip' title='Cadastre' data-placement='bottom' />
                                        </div>	
                                    </fieldset>
                                </fieldset>

                            </form>	
                            <section class='idcadastrados'>
                                <p>	ID Local da Estampa: </a>
                                <p>	Nome do Local da Estampa: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                                <p>	ID Local da Estampa: </a>
                                <p>	Nome do Local da Estampa: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                            </section>
                            <section class='idcadastrados'>
                                <p>	ID Local da Estampa: </a>
                                <p>	Nome do Local da Estampa: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                                <p>	ID Local da Estampa: </a>
                                <p>	Nome do Local da Estampa: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                            </section>


                        </article>
                        <article class='itencadastro'>
                            <h1 class='titlecoisas'> Tipo de Contato</h1>
                            <form class='form' method='POST' action='editProduto.php'>
                                <fieldset class='col-md-2 scheduler-border'>
                                    <legend class='scheduler-border'>Tipo de Contato</legend>
                                    <fieldset>
                                        <legend>Tipo</legend>
                                        <div class='form-group'>
                                            <label for='idproduto'>ID de Contato:</label>
                                            <input type='text' class='form-control focused' id='idtipocontatp' name='idcontato' data-toggle='tooltip' title='Id Automático do tipo de Contato' data-placement='bottom' />
                                        </div>
                                        <div class='form-group'>
                                            <label for='idtamanho'>Adicione um tipo de Contato diferenciado:</label>
                                            <input type='text' class='form-control focused' id='tipodecontato' name='tipodecontato' data-toggle='tooltip' title='Tipo de Contato' data-placement='bottom' />
                                        </div>
                                        <div class='form-group'>
                                            <input class='col-md-10 btn btn-primary botaocadastro' type='submit' value='Cadastre o Contato' data-toggle='tooltip' title='Cadastre' data-placement='bottom' />
                                        </div>	
                                    </fieldset>
                                </fieldset>			
                            </form>	
                            <section class='idcadastrados'>
                                <p>	ID Tipo de Contato: </a>
                                <p>	Nome Tipo Contato: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                                <p>	ID Tipo de Contato: </a>
                                <p>	Nome Tipo Contato: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                            </section>						<section class='idcadastrados'>
                                <p>	ID Tipo de Contato: </a>
                                <p>	Nome Tipo Contato: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                                <p>	ID Tipo de Contato: </a>
                                <p>	Nome Tipo Contato: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                            </section>

                        </article>
                        <article class='itencadastro2'>
                            <h1 class='titlecoisas'> Padrão da Cor</h1>
                            <form class='form' method='POST' action='editProduto.php'>
                                <fieldset class='col-md-2 scheduler-border'>
                                    <legend class='scheduler-border'>Padrão de Cor</legend>
                                    <fieldset>
                                        <legend>Tipo de Padrão de Cor</legend>
                                        <div class='form-group'>
                                            <label for='idproduto'>ID do Padrão</label>
                                            <input type='text' class='form-control focused' id='idpadrao' name='idpadrao' data-toggle='tooltip' title='Id Automático do tipo de Padrão' data-placement='bottom' />
                                        </div>
                                        <div class='form-group'>
                                            <label for='idtamanho'>Adicione um tipo de Padrão diferenciado:</label>
                                            <input type='text' class='form-control focused' id='tipodepadrao' name='tipodepadrao' data-toggle='tooltip' title='Tipo de Padrao' data-placement='bottom' />
                                        </div>
                                        <div class='form-group'>
                                            <input class='col-md-10 btn btn-primary botaocadastro' type='submit' value='Cadastre o Padrao' data-toggle='tooltip' title='Cadastre' data-placement='bottom' />
                                        </div>	
                                    </fieldset>
                                </fieldset>

                            </form>	
                            <section class='idcadastrados'>
                                <p>	ID Padrão de Cor: </a>
                                <p>	Nome Padrão de Cor: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                                <p>	ID Padrão de Cor: </a>
                                <p>	Nome Padrão de Cor: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                            </section>
                            <section class='idcadastrados'>
                                <p>	ID Padrão de Cor: </a>
                                <p>	Nome Padrão de Cor: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                                <p>	ID Padrão de Cor: </a>
                                <p>	Nome Padrão de Cor: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                            </section>
                        </article>
                        <article class='itencadastro'>
                            <h1 class='titlecoisas'> Categoria</h1>
                            <form class='form' method='POST' action='editProduto.php'>
                                <fieldset class='col-md-2 scheduler-border'>
                                    <legend class='scheduler-border'>Categoria</legend>
                                    <fieldset>
                                        <legend>Tipo de Categoria</legend>
                                        <div class='form-group'>
                                            <label for='idproduto'>ID da Categoria</label>
                                            <input type='text' class='form-control focused' id='idcategoria' name='idcategoria' data-toggle='tooltip' title='Id Automático da Categoria' data-placement='bottom' />
                                        </div>
                                        <div class='form-group'>
                                            <label for='idtamanho'>Adicione o Novo tipo de Categoria::</label>
                                            <input type='text' class='form-control focused' id='tipodecategoria' name='tipodecategoria' data-toggle='tooltip' title='Tipo de Categoria' data-placement='bottom' />
                                        </div>
                                        <div class='form-group'>
                                            <input class='col-md-10 btn btn-primary botaocadastro' type='submit' value='Cadastre a Categoria' data-toggle='tooltip' title='Cadastre' data-placement='bottom' />
                                        </div>	
                                    </fieldset>
                                </fieldset>

                            </form>	
                            <section class='idcadastrados'>
                                <p>	ID Categoria: </a>
                                <p>	Nome da Categoria: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                                <p>	ID Categoria: </a>
                                <p>	Nome da Categoria: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                            </section>
                            <section class='idcadastrados'>
                                <p>	ID Categoria: </a>
                                <p>	Nome da Categoria: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                                <p>	ID Categoria: </a>
                                <p>	Nome da Categoria: </a></p>
                                <div class='form-group'>
                                    <input class='col-md-0.2 btn btn-primary botaoedit positionitens' type='submit' value='Editar' data-toggle='tooltip' title='Edite alguma informação'' data-placement='bottom' />
                                    <input class='col-md-0.2 col-md-0.2 btn botaoedit btn-primary3' type='submit' value='Excluir' data-toggle='tooltip' title='Exclua a Camiseta' data-placement='bottom' />
                                </div>
                            </section>
                        </article>










                        <article class='itencadastro2'>
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
                        </article>







                        </body>
                        </html>
















                        <!--
                        <form class='form' method='POST' action='CadCamiseta.php'>
                        <fieldset class='col-md-2 scheduler-border'>
                        <legend class='scheduler-border'>Cadastrar camisetas</legend>
                        <fieldset>
                                <legend>Camiseta</legend>
                                <div class='form-group'>
                                        <label for='modelo'>Modelo camiseta: </label>
                                        <input type='text' class='form-control focused' id='modelo' name='modelo' data-toggle='tooltip' title='Preencha o modelo da camiseta' data-placement='bottom' />
                                </div>
                                <div class='form-group'>
                                        <label for='tipo'>Tipo: </label>
                                        <input type='text' class='form-control focused' id='tipo' name='tipo' data-toggle='tooltip' title='Preencha o tipo da camiseta' data-placement='bottom' />
                                </div>
                                <div class='form-group'>
                                        <label for='marca'>marca: </label>
                                        <input type='text' id='marca' class='form-control focused' name='marca' data-toggle='tooltip' title='Informe o marca da camiseta' data-placement='bottom' />
                                </div>
                                <div class='form-group'>
                                        <label for='cor'>Cor: </label>
                                        <input type='color' class='form-control focused' id='cor' name='cor' data-toggle='tooltip' title='Informe se quer uma cor especifica na gola ou na manga' data-placement='bottom' />
                                </div>
                                <div class='form-group'>
                                        <label for='tamanho'>Tamanho: </label>
                                        <input type='text' class='form-control focused' id='tamanho' name='tamanho' data-toggle='tooltip' title='Informe o tamanho da camiseta' data-placement='bottom' />
                                </div>
                        </fieldset> -->


                        </body>
                        </html>