$(document).ready(function() {

    $("#cadastrar_produto").on('click', function() {
        $.ajax({
            url: 'view/cadastrar_produtos.php', // envia para pagina
            beforeSend: function() {
                $('#print').html(' <div class="d-flex justify-content-center">Carregando...<div class="spinner-border" role="status"> <span class="visually-hidden"> Loading...</span></div></div>');
            },

            success: function(data) {
                $('#print').html(data);
            },

            error: function(data) {
                $('#print').html('ERRO AO ENCONTRAR PAGINA...');
            },

        });
    }); // quando eu clicar no botao com o id='pagar'

    $("#listar_produto").on('click', function() {
        $.ajax({
            url: 'view/listar_produtos.php', // envia para pagina
            beforeSend: function() {
                $('#print').html(' <div class="d-flex justify-content-center">Carregando...<div class="spinner-border" role="status"> <span class="visually-hidden"> Loading...</span></div></div>');
            },

            success: function(data) {
                $('#print').html(data);
            },

            error: function(data) {
                $('#print').html('ERRO AO ENCONTRAR PAGINA...');
            },

        });
    });
    
});