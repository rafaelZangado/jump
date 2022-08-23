$('#largeModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var category_name = button.data('category_name') // Extract info from data-* attributes
    var category_code = button.data('category_code')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Editar Categoria ' + id)
    modal.find('#id').val(id)
    modal.find('#category_name').val(category_name)
    modal.find('#category_code').val(category_code)


})