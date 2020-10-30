$('#openmodalEdit').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget);
    let category_id_modal_edit = button.data('category_id');
    let name_modal_edit = button.data('name');
    let sale_price_modal_edit = button.data('sale_price');
    let code_modal_edit = button.data('code');
    let stock_modal_edit = button.data('stock');
    let image_modal_edit = button.data('image');
    let id_product = button.data('id_product');
    let modal = $(this);

    modal.find('.modal-body #id').val(category_id_modal_edit);
    modal.find('.modal-body #name').val(name_modal_edit);
    modal.find('.modal-body #sale_price').val(sale_price_modal_edit);
    modal.find('.modal-body #code').val(code_modal_edit);
    modal.find('.modal-body #stock').val(stock_modal_edit);
    modal.find('.modal-body #image').val(image_modal_edit);
    modal.find('.modal-body #id_product').val(id_product);
});

$('#openmodalState').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget);
    let id_product = button.data('id_product');
    let modal = $(this);
    
    modal.find('.modal-body #id_product').val(id_product);
});