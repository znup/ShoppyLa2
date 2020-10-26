$('#openmodalEdit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var category_id_modal_edit = button.data('category_id')
    var name_modal_edit = button.data('name')
    var sale_price_modal_edit = button.data('sale_price')
    var code_modal_edit = button.data('code')
    var stock_modal_edit = button.data('stock')
    var image_modal_edit = button.data('image')
    var id_product = button.data('id_product')
    var modal = $(this)

    modal.find('.modal-body #id').val(category_id_modal_edit);
    modal.find('.modal-body #name').val(name_modal_edit);
    modal.find('.modal-body #sale_price').val(sale_price_modal_edit);
    modal.find('.modal-body #code').val(code_modal_edit);
    modal.find('.modal-body #stock').val(stock_modal_edit);
    modal.find('.modal-body #image').val(image_modal_edit);
    modal.find('.modal-body #id_product').val(id_product);
})

$('#openmodalState').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id_product = button.data('id_product')
    var modal = $(this)
    
    modal.find('.modal-body #id_product').val(id_product);
})