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
});

$(document).ready(function() {
    var estampa = 2;

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
    
    $("#cor").change(function() {
        if($("#tamanho").val() !== ""){
            $("#tamanho").html("<option value=''></option>");
        }
        idProduto = $("#idModelo").val();
        if($("#cor").val() !== ""){
            $.post("?pagina=wp_pedidos&acao=pegar_tamanhos",{"idProduto": idProduto, "cor":$("#cor").val()},
                function(texto){
                    $("#tamanho").html(texto);
                }
            );
        }
    });
        
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
    
    $("#tamanho").change(function () {
        if($("#cor").val() !== "" && $("#idModelo").val() !== "" && $("#tamanho").val() !== ""){
            $.post("?pagina=wp_pedidos&acao=pegar_id_produto", {"cor":$("#cor").val(),
                "modelo":$("#idModelo").val(), "tamanho":$("#tamanho").val()}, function (texto) {
                $("#imgCamiseta").html(texto);
            });
        }
    });
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