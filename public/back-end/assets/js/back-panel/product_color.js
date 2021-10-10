/*Add edit Product Color model*/

$(document).on('click','.editColorModal', function(){
    var url             = $(this).data('url');
    var color_name      = $(this).data('color_name');
    var color_code      = $(this).data('color_code');
    var source_id       = $(this).data('source_id');
    var type            = $(this).data('type');
    var color_status    = $(this).data('color_status')

    $('#product-color-form').attr('action',url);
    $('#product-color-form .source_id').val(source_id);
    $('#product-color-form .color-name').val(color_name);
    $('#product-color-form .color-code').val(color_code);
    $('#color-status option[value='+color_status+']').attr('selected','selected');


    if (type == 'edit'){
        $('#ColorHead').text('Edit ' + color_name + 'Color');
        $('#product-color-form .submit-btn').val('Save change');
    }
});

$(document).on('click','#add-color', function(){

    var url    = $(this).data('url')

    $('#product-color-form').attr('action',url);
    $('#product-color-form .source_id').val("");
    $('#product-color-form .color-name').val("");
    $('#product-color-form .color-code').val("");
    $('#color-status option[value='+1+']').attr('selected','selected');

    $('#ColorHead').text('Add Physical Color');
});


