$('#openmodalEdit').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var name_modal_edit = button.data('name')
    var description_modal_edit = button.data('description')
    var id_category = button.data('id_category')
    var modal = $(this)
    modal.find('.modal-body #name').val(name_modal_edit);
    modal.find('.modal-body #description').val(description_modal_edit);
    modal.find('.modal-body #id_category').val(id_category);
})

/*******************Change State *************************************/    
$('#openmodalState').on('show.bs.modal', function(event) {
    
    var button = $(event.relatedTarget) 
    var id_category = button.data('id_category')
    var modal = $(this)
    
    modal.find('.modal-body #id_category').val(id_category);
})