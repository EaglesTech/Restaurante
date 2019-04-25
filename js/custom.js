$(document).ready(function(){
    $('form[name=form_login]').submit(function(){
        var forma = $(this);
        var botao = $(this).find(':button');

        $.ajax({
            url:"ajax/controller.php",
            type:"POST",
            data:"acao=login&"+forma.serialize(),
            beforeSend: function(){
                $('.load').fadeIn('slow');
                botao.attr('disable', false);
            },
            success: function(retorno){
                $('.load').fadeOut('slow');
                botao.attr('disable', false).html('Logar');
                if (retorno=='erro') {
                    msg('Senha incorreta!', 'erro');
                }else if(retorno =='diferentesenha'){
                    msg('Senha incorreta!', 'erro');
                } else if(retorno == 'nivel'){
                    msg('Nivel de permissão inválido!', 'erro');
                }else if(retorno == 'vazio'){
                    msg('Campo não preenchido!', 'alerta');
                }else{
                    forma.fadeOut('slow', function() {
                        msg('Login efetuado com sucesso!', 'sucesso')
                        $('#load').fadeIn('fast');
                    });
                    setTimeout(function(){
                        $(location).attr('href', 'painel.php')
                    }, 3000);
                }
            }
        });

        return false;
    });

    //FUNÇÕES GERAL
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
