$('#largeModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name') // Extract info from data-* attributes
    var sku = button.data('sku')
    var price = button.data('price')
    var quantity = button.data('quantity')
    var category = button.data('category')
    var description = button.data('description')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Editar Categoria ' + id)
    modal.find('#id').val(id)
    modal.find('#name').val(name)
    modal.find('#sku').val(sku)
    modal.find('#price').val(price)
    modal.find('#quantity').val(quantity)
    modal.find('#category').val(category)
    modal.find('#description').val(description)


})