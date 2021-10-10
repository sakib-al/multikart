/*Add edit Category name model*/
$(document).on('click','.editCategoryModal', function(){
    var url            = $(this).data('url');
    var category_name  = $(this).data('category_name');
    var source_id      = $(this).data('source_id');
    var type           = $(this).data('type');
    var category_status = $(this).data('cat_status')

    $('#category-form').attr('action',url);
    $('#category-form .source_id').val(source_id);
    $('#category-form .cat-name').val(category_name);
    $('#cat-status option[value='+category_status+']').attr('selected','selected');


    if (type == 'edit'){
        $('#categoryHead').text('Edit ' +category_name + ' Category');
        $('#category-form .submit-btn').val('Save change');
    }
});


// Add edit SubCategory model

$(document).on('click','.editsubCategoryModal', function(){
    var url               = $(this).data('url');
    var subcategory_name  = $(this).data('subcategory_name');
    var category_name     = $(this).data('category')
    var source_id         = $(this).data('source_id');
    var type              = $(this).data('type');
    var subcategory_status   = $(this).data('subcat_status')

    $('#subcategory-form').attr('action',url);
    $('#subcategory-form .source_id').val(source_id);
    $('#subcategory-form .subcat-name').val(subcategory_name);
    $('#cat-status option[value='+subcategory_status+']').attr('selected','selected');
    $('#category option[value='+category_name+']').attr('selected','selected');

    if (type == 'edit'){
        $('#categoryHead').text('Edit ' +subcategory_name + ' Category');
        $('#subcategory-form .submit-btn').val('Save change');
    }
});

// Get Subcategory by Category

function getSubcategory(category) {
    var get_url = $('#base_url').val();
    $.ajax({
        type:'get',
        url:get_url+'/sub_cat_by_category/'+category,
        async :true,
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            $('#subcategory').html(data);
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
}

$(document).on('change','#category', function(){
    var category_id     = $(this).val();
    getSubcategory(category_id);
});
