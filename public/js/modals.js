$('#openmodalEdit').on('show.bs.modal', function(event) {

    let button = $(event.relatedTarget);
    let name_modal_edit = button.data('name');
    let description_modal_edit = button.data('description');
    let id_category = button.data('id_category');
    let modal = $(this);
    modal.find('.modal-body #name').val(name_modal_edit);
    modal.find('.modal-body #description').val(description_modal_edit);
    modal.find('.modal-body #id_category').val(id_category);
});
   
$('#openmodalState').on('show.bs.modal', function(event) {
    
    let button = $(event.relatedTarget); 
    let id_category = button.data('id_category');
    let modal = $(this);
    
    modal.find('.modal-body #id_category').val(id_category);
});