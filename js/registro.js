
    
$(document).ready(function() {
    $("#submit").click(function() {
        var produto = $('#produto').val();
        var sku = $('#sku').val();
        var preco = $('#preco').val();
        var desc = $('#desc').val();
        var qat = $('#qat').val();
        var categoria = $('#categoria').val();
        
        $('#alert').html('');
        if(produto == '') {
            $('#alert').html('o Campo esta [Produto] vazio');
            $('#alert').addClass('alert-danger');
            return false;
        }
        $('#alert').html('');
        if(sku == '') {
            $('#alert').html('o Campo esta [sku] vazio');
            $('#alert').addClass('alert-danger');
            return false;
        }
        $('#alert').html('');
        if(preco == '') {
            $('#alert').html('o Campo do [$0,00] esta vazio');
            $('#alert').addClass('alert-danger');
            return false;
        }
        $('#alert').html('');
        if(desc == '') {
            $('#alert').html('o Campo da [Descrição] esta vazio');
            $('#alert').addClass('alert-danger');
            return false;
        }
        $('#alert').html('');
        if(qat == '') {
            $('#alert').html('o Campo [Quantidade] esta vazio');
            $('#alert').addClass('alert-danger');
            return false;
        }
        $('#alert').html('');
        if(categoria == '') {
            $('#alert').html('o Campo da [Categoria] esta vazio');
            $('#alert').addClass('alert-danger');
            return false;
        }
       
        $.ajax({
            url:'controller/produtosController.php',
            method: 'POST',
            data: {
                produto: produto,
                sku:sku,
                preco:preco,
                desc: desc,
                qat:qat,
                categoria:categoria,
            },
            success: function(result){
                $('form').trigger('reset');
                $('#alert').addClass('alert-success');
                $('form').fadeIn().html(result);
                setTimeout(function(){
                    $('#alert').fadeOut('Slow');
                },3000);
            }
        });
       
    }); // quando eu clicar no botao com o id='pagar'
});