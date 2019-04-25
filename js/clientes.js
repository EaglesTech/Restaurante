//CADASTRAR clientes
$(document).ready(function() {
    var janela = $('#cadclientes');
    var conteudo = $('.modal-body');
    
    janela.click(function(){
        $.post('ajax/clientes_controller.php', {acao:'form_client'}, function(retorno){
            $('#clienteModal').modal({backdrop:'static'});
            conteudo.html(retorno);   
        });
    });

    $("#clienteModal").on('submit', 'form[name="form_client"]', function(){
        var form = $(this);
        var botao = form.find(':button');

        $.ajax({
            url:'ajax/clientes_controller.php',
            type: 'POST',
            data: 'acao=cadastro&'+form.serialize(),
            beforeSend: function(){
                $('.load').fadeIn('slow');
                botao.attr('disable', true);

            },
            success: function(retorno){
                console.log(retorno)
                if (retorno==='cadastrou') {
                    form.fadeOut('slow', function() {
                        msg('Cliente cadastrado com sucesso', 'sucesso');
                        listaCliente('ajax/clientes_controller.php', 'listar_clientes');
                    })
                } else {
                    msg('Erro ao Cadastrar', 'erro');
                }
                $('.load').fadeOut('slow');
                botao.attr('disable', false);
            }
        });

        return false;
    });

//BTN EDIT
$('.table').on("click", '#btn_edit', function () {
    var id = $(this).attr('data-id');
    $.post('ajax/clientes_controller.php', {acao:'form_edit', id: id}, function(retorno) {
        $('#clienteModal').modal({backdrop:'static'});
        conteudo.html(retorno);   
    });
    return false;
})

//BTN ATUALIZA
$('#clienteModal').on("submit", 'form[name="form_edit"]',function(){
    var dados = $(this);
    var botao = dados.find(':button');
    $.ajax({
        url: 'ajax/clientes_controller.php',
        type: 'POST',
        data: 'acao=edit&'+dados.serialize(),
        beforeSend: function(){
            botao.attr('disable', true);
            $('.load').fadeIn('slow');
        },
        success: function (retorno) {
            console.log(retorno)
            if (retorno==='atualizou'){
                dados.fadeOut('slow', function() {
                    msg('Atualizado com sucesso', 'sucesso');
                    listaCliente('ajax/clientes_controller.php', 'listar_clientes');
                })
            } else {
                msg('Erro ao atualizar', 'erro');
                listaCliente('ajax/clientes_controller.php', 'listar_clientes');
            }
        }
    });
    return false;
});

//BTN EXCLUIR
$('.table').on('click', '#btn_excluir', function(){
    var id = $(this).attr('data-id');
    if (confirm('Voce deseja realmente excluir?')) {
        $.post('ajax/clientes_controller.php', {acao: "excluir", id:id}, function(retorno){

            if (retorno==='deletou') {
                alert('Produto Excluido');
                listaCliente('ajax/clientes_controller.php', 'listar_clientes');
            } else {
                listaCliente('ajax/clientes_controller.php', 'listar_clientes');
                return false;
            }
        });
        //execute   
    } else {
        return false;
    }
});

//FUNÇÕES GERAL
function listaCliente(url, acao){
    $.post(url, {acao: acao}, function(retorno){
        var tbody=$('.table').find('tbody');
        tbody.html(retorno);
    })
}

listaCliente('ajax/clientes_controller.php', 'listar_clientes');

function msg(msg, tipo){
        var retorno = $('.retorno');
        var tipo = (tipo== 'sucesso') ? 'success' : (tipo=='alerta') ? 'warning' : (tipo=='erro') ? 'danger' : (tipo=='info') ? 'info' : alert('INFORME MENSAGENS DE SUCESSO, ALERTA, ERRO e INFO');

        retorno.empty().fadeOut('fast', function(){
            return $(this).html('<div class="alert alert-'+tipo+'" role="alert">'+msg+'</div>').fadeIn('slow');
        });

        setTimeout(function(){
            retorno.fadeOut('slow').empty();
        }, 5000);
    }
});