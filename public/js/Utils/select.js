$html = '<select name="items" id="items" multiple="multiple" size="1" class="chosenElement">';
    $html += '<option value="{{$searchText}}"><?php{{$category}}</option>';
    $html += '</select>';

$('.modal-body').html($html);
$('.chosenElement').chosen({ width: "210px" });

/*
$(".chosen-select").chosen({
    placeholder_text_single: "Selecciona una categoría (máximo 3)",
    max_selected_options: 3,
    search_contains: true,
    no_results_text: "Oops, no se encontro lo que buscabas.. intenta otra búsqueda!",
});
$select = '<select name="items" id="items" multiple="multiple" size="1" class="chosenElement">';
    $select += '<option value="{{$category->name}}">'
    $select += '</select>';
$('.modal-body').select($select);
$('.chosenElement').chosen({ width: "210px" });*/