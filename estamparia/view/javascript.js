$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function () {
    $("#datepicker1").ready(function () {
        $("#datepicker1").datepicker();
    });
    $("#datepicker2").ready(function () {
        $("#datepicker2").datepicker();
    });
});

$(document).ready(function () {
    $("#pedido").on("mousedown", function () {
        $(this).css({color: "#ff0000"});
    });
});

$(document).ready(function () {
    $(".dropdown-toggle").dropdown();
});

$(document).ready(function() {
   var nTelefones = 2;
   $("#addTelefone") .on("click", function() {
        if(nTelefones <= 3){
        $("#telefones").append(
            "<div class='form-group'>\n\
                <label for='telefone'>Telefone"+ nTelefones +": </label>\n\
                <input type='tel' class='form-control focused' class='telefoneInput' \n\
                    name='telefone[]' data-toggle='tooltip' title='Informe seu telefone' \n\
                    data-placement='bottom' /> \n\
            </div>");
            nTelefones++;
        } else {
            alert('Cadastre no máximo três telefones');
        }
   });
   
   var nCelulares = 2;
   $("#addCelular") .on("click", function() {
        if(nCelulares <= 3){
            $("#celulares").append(
                "<div class='form-group'>\n\
                    <label for='telefone'>Celular"+ nCelulares +": </label>\n\
                    <input type='text' class='form-control focused' class='celularInput'\n\
                     name='celular[]' data-toggle='tooltip' title='Informe seu celular' \n\
                    data-placement='bottom' /> \n\
                </div>"
            );
            nCelulares++;
        } else {
            alert('Cadastre no máximo três telefones');
        }
   });
   /*
    $("#logarCli").click(function () {
        $.post("?pagina=wp_login&acao=logar_cliente",{"usuario": $("#usuarioLogin2").val(), "senha":$("#senhaLogin2").val()},
            function(texto){
                if(texto !== ""){
                    $("#msgLogin").html("Usuário ou senha incorretos").addClass("errou");
                } else {
                    $("#frmLogar").submit();
                }
            }
        );
    });*/
    
    $("#errouLogin").hide();
    $("#formLogar").submit(function () {
        var login = $("#usuarioLogin").val();
        var senha = $("#senhaLogin").val();
        $.ajax({
            url: "?pagina=wp_login&acao=logarCliente",
            type: "post",
            data: "usuario="+login+"&senha="+senha,
            success: function (resultado) {
                if(resultado == 1){
                    location.href='?pagina=wp_bem_vindo&acao=mostrar_bem_vindo';
                } else {
                    $("#errouLogin").show();
                }
            }
        })
        return false;
    });
    
});

$(document).ready(function() {    
    $("#idModelo").change(function() {  
        if($("#cor").val() !== ""){
            $("#cor").html("<option value=''></option>");
        }
        
        idProduto = $("#idModelo").val();
        if(idProduto !== ""){
            $.post("?pagina=wp_pedidos&acao=pegar_cores",{"idProduto": idProduto},
                function(texto){
                    $("#cor").html(texto);
                }
            );
        }
    });
    
    tamanhosAtuais = 0;
    imgAtual = 0;
    
    $("#cor").change(function() {
        idProduto = $("#idModelo").val();
        if($("#cor").val() !== ""){
            $.post("?pagina=wp_pedidos&acao=pegar_tamanhos",{"idProduto": idProduto, "cor":$("#cor").val()},
                function(texto){
                    if(tamanhosAtuais !== texto){
                        if($("#tamanho").val() !== "" || $("#tamanhoFormandos").val() !== "" ){
                            $("#tamanho").html("<option value=''></option>");
                            $("#tamanhoFormandos").html("<option value=''></option>");
                        }
                        $("#tamanho").html(texto);
                        $("#tabelaPedidos tr td .tamanhoFormandos").html(texto);
                        tamanhosAtuais = texto;
                    }
                }
            );
            $.post("?pagina=wp_pedidos&acao=pegar_img",{"idProduto": idProduto, "cor":$("#cor").val()},
                function(texto){
                    if(imgAtual !== texto){
                        $("#imgCamiseta").html(texto);
                        imgAtual = texto;
                    }
                }
            );
        }
    });
    
    function atualizarTamanhosPedidos($idTamanhoNovo){
        idProduto = $("#idModelo").val();
        if($("#cor").val() !== ""){
            $.post("?pagina=wp_pedidos&acao=pegar_tamanhos",{"idProduto": idProduto, "cor":$("#cor").val()},
                function(texto){
                    if(tamanhosAtuais !== texto){
                        if($("#tamanho").val() !== "" || $("#tamanhoFormandos").val() !== "" ){
                            $("#tamanho").html("<option value=''></option>");
                            $("#tamanhoFormandos").html("<option value=''></option>");
                        }
                        $idTamanhoNovo.html(texto);
                        tamanhosAtuais = texto;
                    } else {
                        $idTamanhoNovo.html(texto);
                    }
                }
            );
        }
    }
    
    $("#cor").click(function () {
        if($("#idModelo").val() === ""){
            alert("Preencha o modelo antes");
        }
    });
    
    $("#tamanho").click(function () {
        if($("#cor").val() === ""){
            alert("Preencha a cor antes");
        }
    });
    
    $("#tabelaPedidos tr td .tamanhoFormandos").click(function () {
        if($("#cor").val() === ""){
            alert("Preencha a cor antes");
        }
    });
    
    $("#tamanho, #tabelaPedidos tr td .tamanhoFormandos").change(function () {
        if($("#cor").val() !== "" && $("#idModelo").val() !== ""){
            pegarIdProduto($(this));
        }
    });
    
    function pegarIdProduto(elementoTamanho) {
        if($("#cor").val() !== "" && $("#idModelo").val() !== ""){
            if(formandos === 1){
                $.post("?pagina=wp_pedidos&acao=pegar_id_produto", {"cor":$("#cor").val(),
                    "modelo":$("#idModelo").val(), "nameArray" : "false",
                    "tamanho":$(elementoTamanho).val()}, function (texto) {
                    $("#idProduto").html(texto);
                });
            } else 
                if(formandos === 0){
                    $.post("?pagina=wp_pedidos&acao=pegar_id_produto", {"cor":$("#cor").val(),
                        "modelo":$("#idModelo").val(), "nameArray" : "true",
                        "tamanho":$(elementoTamanho).val()}, function (texto) {
                        Tr = $(elementoTamanho).parents("tr");
                        idTr = $(Tr).find(".idsProdutos");
                        $(idTr).html(texto);
                    });
                }
        }
    };


    if($("#formandos").val() === 1){
        $("#tabelaPedidos .idsProdutos input").val(null);
        $("#tabelaPedidos tr td input, #tabelaPedidos tr td select, #tabelaPedidos tr td .tamanhoFormandos, #tabelaPedidos tr .idsProdutos .txtIdProdutoFormandos").val(null);
        $(".txtIdProduto").val(null);

        $("#tamanhoNormal").toggleClass("oculta");
        $("#qtdNormal").toggleClass("oculta");
        $("#imgCamiseta").toggleClass("oculta");
        $("#tamanhoNormal *").prop("disabled", true);
        $("#qtdNormal *").prop("disabled", true);
        $("#imgCamiseta *").prop("disabled", true);
        $("#idProduto *").prop("disabled", true);

        $("#pedidosFormandos *").prop("disabled",false);
        $("#pedidosFormandos").toggleClass("oculta");
        formandos = 0;
    } else {            
        $("#tamanhoNormal *").prop("disabled", false);
        $("#qtdNormal *").prop("disabled", false);
        $("#imgCamiseta *").prop("disabled", false);
        $("#idProduto *").prop("disabled", false);

        $("#pedidosFormandos *").prop("disabled",true);
        formandos = 1;
    }


    function verificaFormandos() {
        if(formandos === 0){
            $("#tamanho").val(null);
            $(".txtIdProduto").val(null);
            $("#qtdTotal").val(null);
            $("#idProduto").html(null);
            $("#tabelaPedidos input, #tabelaPedidos select").val(null);
            $("#tabelaPedidos .idsProdutos").html(null);
            
            $("#tamanhoNormal").toggleClass("oculta");
            $("#qtdNormal").toggleClass("oculta");
            $("#imgCamiseta").toggleClass("oculta");
            $("#tamanhoNormal *").prop("disabled", false);
            $("#qtdNormal *").prop("disabled", false);
            $("#idProduto *").prop("disabled", false);
            
            $("#pedidosFormandos *").prop("disabled",true);
            
            $("#pedidosFormandos").toggleClass("oculta");
            linha = 1;
            formandos = 1;
        } else 
        if(formandos === 1) {
            $("#idProduto").html(null);
            $("#tabelaPedidos input, #tabelaPedidos select").val(null);

            $("#tamanhoNormal").toggleClass("oculta");
            $("#qtdNormal").toggleClass("oculta");
            $("#tamanhoNormal *").prop("disabled", true);
            $("#qtdNormal *").prop("disabled", true);
            $("#imgCamiseta *").prop("disabled", true);
            $("#idProduto *").prop("disabled", true);
            
            $("#pedidosFormandos *").prop("disabled",false);
            $("#pedidosFormandos").toggleClass("oculta");
            formandos = 0;
        }
    }
    
    $("#formandos").change(function () {
        verificaFormandos();
    });    
        
    $("#tabelaPedidos").on("change", ".qtdTotal", function () {
        calcularQtdTotal($(this));
    });
    
    function calcularQtdTotal(idSeletor) {
        var resultado = 0;
        $(".qtdTotal").each(function (indice, element) {
            (resultado) = parseInt($(element).val()) + parseInt(resultado);
            $("#SomaQtdTotal b").html(resultado);
        });
    }
    
    $("#tabelaPedidos").on("change", "tr td .tamanhoFormandos", function () {
        addLinha($(this));
        alert();
    });
    linha = 1;
    function addLinha (elemntoTamanho) {
        pegarIdProduto($(elemntoTamanho));
        table = $(elemntoTamanho).parents("table");
        QtdIdsProdutosFormandos = $(table).find(".txtIdProdutoFormandos").length;
        if($(elemntoTamanho).val() !== "" && (linha - QtdIdsProdutosFormandos) === 1) { 
            linha++;
            $("#tabelaPedidos tbody").append("\
                        <tr> \n\
                            <td> \n\
                                <select class='form-control focused tamanhoFormandos' id=tamanhoFormandos"+ linha +"' name='tamanho[]' data-toggle='tooltip' title='Informe o tamanho da camiseta' data-placement='bottom' > \n\
                                    <option value=''></option> \n\
                                </select> \n\
                            </td> \n\
                            <td> \n\
                                <input type='text' class='form-control focused descricaoPedido' name='descricoesPedidos[]' data-toggle='tooltip' title='Detalhe ou descrição que vai na estampa da camiseta, por exemplo: Nome diferente atrás como em uma camiseta de formandos, um número em uma camiseta de time e entre outros...' data-placement='bottom' /> \n\
                            </td> \n\
                            <td> \n\
                                <input type='text' class='form-control focused qtdTotal textcenter' name='qtdTotal[]' data-toggle='tooltip' title='Quantidade Total de camisetas' data-placement='bottom' /> \n\
                            </td>  \n\
                            <td class='oculta idsProdutos' id=idsProdutosFormandos"+ linha +"'> \n\
                            </td> \n\
                        </tr> \n\
                        ");
            idTamanhoNovo = $("#tabelaPedidos tr td .tamanhoFormandos:last");
            atualizarTamanhosPedidos($(idTamanhoNovo));
        }
    }
    
    $("#tabelaPedidos").on("focus", "tr td input, tr td select",function () {
        tr = $(this).closest("tr");
        if(!tr.hasClass("pedidoSelecionado")){
            tr.siblings().removeClass("pedidoSelecionado");
            tr.toggleClass("pedidoSelecionado");
        }
    });
});

$(document).ready(function () {

});

$(document).ready(function() {
    $("#cep").blur( function () {
        str = $("#cep").val();
        if(str.length !== 0){
            $.post("?pagina=wp_cep&acao=pesquisar_cep",{"cep": str},function(texto){
                texto; // Terminar
            });
        }
    });
    
    $("#corProduto").change(function() {
        idProduto = $("#idModeloProduto").val();
        if($("#cor").val() !== ""){
            $.post("?pagina=wp_pedidos&acao=pegar_tamanhos",{"idProduto": idProduto, "cor":$("#corProduto").val()},
                function(texto){
                    if(tamanhosAtuais !== texto){
                            alert(texto);
                        if($("#tamanhoProduto").val() !== ""){
                            $("#tamanhoProduto").html("<option value=''></option>");
                            
                        }
                        $("#tamanhoProduto").html(texto);
                        tamanhosAtuais = texto;
                    }
                }
            );
            $.post("?pagina=wp_pedidos&acao=pegar_img",{"idProduto": idProduto, "cor":$("#cor").val()},
                function(texto){
                    if(imgAtual !== texto){
                        $("#imgCamiseta").html(texto);
                        imgAtual = texto;
                    }
                }
            );
        }
    });    
});

$(document).ready(function() {
   /* $("#logar").click(function () {
        $.post("?acao=logar",{"usuarioAdm": $("#usuarioAdm").val(), "senhaAdm":$("#senhaAdm").val()},
            function(texto){
                if(texto !== ""){
                    $("#msgLogin").html("Usuário ou senha incorretos").addClass("errou");
                } else {
                    $("#login").submit();
                }
            }
        );
    });
    */
    function pegarIdProdutoAdm(idProdutoAdm, nomeAdm, modeloAdm, materialAdm, precoAdm, imgAdm, descricaoAdm){
        $("#idproduto").val($(idProdutoAdm).text());
        $("#nome").val($(nomeAdm).text());
        $("#modelo").val($(modeloAdm).text());
        $("#tecido").val($(materialAdm).text());
        $("#preco").val($(precoAdm).text());
        $("#imagemAtual").val($(imgAdm).text());
        $("#descricao").val($(descricaoAdm).text());
    }
    
    $('.CamisetaAdm').on("click", "figure", function() {
         idProdutoAdm = $(this).find($('.idProduto'));
         nomeAdm = $(this).find($('.nomeProduto'));
         modeloAdm = $(this).find($('.modeloProduto'));
         materialAdm = $(this).find($('.materialProduto'));
         precoAdm = $(this).find($('.precoProduto'));
         imgAdm = $(this).find($('.imagemAtual'));
         descricaoAdm = $(this).find($('.descricaoProduto'));
         pegarIdProdutoAdm(idProdutoAdm, nomeAdm, modeloAdm, materialAdm, precoAdm, imgAdm, descricaoAdm);
    });
    
    $('.CamisetaAdm').on("click", ".btnEditar", function() {
         div = $(this).parent($('div'));
         CamisetaAdm = $(div).parent($('.camisetaAdm'));
         idProdutoAdm = $(CamisetaAdm).find($('.idProduto'));
         nomeAdm = $(CamisetaAdm).find($('.nomeProduto'));
         modeloAdm = $(CamisetaAdm).find($('.modeloProduto'));
         materialAdm = $(CamisetaAdm).find($('.materialProduto'));
         precoAdm = $(CamisetaAdm).find($('.precoProduto'));
         imgAdm = $(CamisetaAdm).find($('.imagemAtual'));
         descricaoAdm = $(CamisetaAdm).find($('.descricaoProduto'));
         pegarIdProdutoAdm(idProdutoAdm, nomeAdm, modeloAdm, materialAdm, precoAdm, imgAdm, descricaoAdm);
    });
    
    $('#existente').change(function () {
        $('#idproduto').val(null);
    });
    
    
    $('.CamisetaAdm').on("click", ".btnExcluir", function() {
         div = $(this).parent($('div'));
         CamisetaAdm = $(div).parent($('.camisetaAdm'));
         idProdutoAdm = $(CamisetaAdm).find($('.idProduto'));
         
        $.post("?pagina=wp_Produto_Adm&acao=excluir",{"idProduto": $(idProdutoAdm).text()},
            function(texto){
                alert(texto);
                if(texto==='excluido'){
                    $(CamisetaAdm).html("");
                }
            }
        );
    });
    
});
    


/*
$(document).ready(function() {
        erro = 1;
        $("#cadastrar").click(function() {
               if($("#cadastrarCliente").cpf.value === "" || $("#cadastrarCliente").nome.value === "" 
                || $("#cadastrarCliente").email.value === "" || $("#cadastrarCliente").senha.value === "" 
                || $("#cadastrarCliente").reSenha.value === "" || $("#cadastrarCliente").endereco.value === "" 
                || $("#cadastrarCliente").cidade.value === "" || $("#cadastrarCliente").estado.value === "" 
                || $("#cadastrarCliente").cep.value === ""){
                alert("Digite todos os campos obrigatorios*");
                erro = 0;
                return false;
        }

        if($("#cadastrarCliente").senha.value !== $("#cadastrarCliente").reSenha.value){
                alert("As senhas não correspondem");
                erro = 0;
                return false;
        }

        if($("#cadastrarCliente").email.value.indexOf('@',0) == -1){
                alert("E-mail invalido");		
                erro = 0;
                return false;
        }
        if($("#cadastrarCliente").senha.value.length < 6){
                alert ("A senha deve conter no minimo 6 digitos");
                erro = 0;
                return false;
        }
        if($("#cadastrarCliente").cep.value.length < 8 || $("#cadastrarCliente").cep.value.length > 8){
                alert("O CEP deve conter 8 digitos");
                erro = 0;
                return false;
        }
        if($("#cadastrarCliente").CPF.value.length < 11){
                alert("O CPF deve conter 11 digitos");
                erro = 0;
                return false;
        }
        if(erro){
            $("#cadastrarCliente").submit();
        }
    });
});
*/