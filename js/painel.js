//CADASTRAR USUARIO
$(document).ready(function() {
    var janela = $('#janela');
    var conteudo = $('.modal-body');
    
    janela.click(function(){
        $.post('ajax/painel.php', {acao:'form_cad'}, function(retorno){
            $('#exampleModal').modal({backdrop:'static'});
            conteudo.html(retorno);   
        });
    });

    $("#exampleModal").on('submit', 'form[name="form_cad"]', function(){
        var form = $(this);
        var botao = form.find(':button');

        $.ajax({
            url:'ajax/controller.php',
            type: 'POST',
            data: 'acao=cadastro&'+form.serialize(),
            beforeSend: function(){
                $('.load').fadeIn('slow');
                botao.attr('disable', true);
            },
            success: function(retorno){
                if (retorno==='cadastrou') {
                    form.fadeOut('slow', function() {
                        msg('Usuario cadastrado com sucesso', 'sucesso');
                        listarAdmin('ajax/controller.php', 'listar_admin');
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
    $.post('ajax/controller.php', {acao:'form_edit', id: id}, function(retorno) {
        $('#exampleModal').modal({backdrop:'static'});
        conteudo.html(retorno);   
    });
    return false;
})

//BTN ATUALIZA
$('#exampleModal').on("submit", 'form[name="form_edit"]',function(){
    var dados = $(this);
    var botao = dados.find(':button');
    $.ajax({
        url: 'ajax/controller.php',
        type: 'POST',
        data: 'acao=edit&'+dados.serialize(),
        beforeSend: function(){
            botao.attr('disable', true);
            $('.load').fadeIn('slow');
        },
        success: function (retorno) {
            console.log(retorno)
            if (retorno==='atualizou') {
                dados.fadeOut('slow', function() {
                    msg('Atualizado com sucesso', 'sucesso');
                    listarAdmin('ajax/controller.php', 'listar_admin');
                    // window.location.reload();
                })
            } else {
                msg('Erro ao atualizar', 'erro');
            }
        }
    });
    return false;
});

//BTN EXCLUIR
$('.table').on('click', '#btn_excluir', function(){
    var id = $(this).attr('data-id');
    if (confirm('Voce deseja realmente excluir?')) {
        $.post('ajax/controller.php', {acao: "excluir", id:id}, function(retorno){
            if (retorno==='deletou') {
                alert('Usuário Excluido');
                listarAdmin('ajax/controller.php', 'listar_admin');
            } else {
                return false;
            }
        });
        //execute   
    } else {
        return false;
    }
});

//FUNÇÕES GERAL
function listarAdmin(url, acao){
    $.post(url, {acao: acao}, function(retorno){
        var tbody=$('.table').find('tbody');
        tbody.html(retorno);
    })
}

listarAdmin('ajax/controller.php', 'listar_admin');

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