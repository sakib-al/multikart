/*Add edit Product Size model*/

$(document).on('click','.editSizeModal', function(){
    var url            = $(this).data('url');
    var size_name      = $(this).data('size_name');
    var size_code      = $(this).data('size_code');
    var source_id      = $(this).data('source_id');
    var type           = $(this).data('type');
    var size_status    = $(this).data('size_status')

    $('#product-size-form').attr('action',url);
    $('#product-size-form .source_id').val(source_id);
    $('#product-size-form .size-name').val(size_name);
    $('#product-size-form .size-code').val(size_code);
    $('#size-status option[value='+size_status+']').attr('selected','selected');


    if (type == 'edit'){
        $('#SizeHead').text('Edit ' +size_name + 'Size');
        $('#product-size-form .submit-btn').val('Save change');
    }
});
