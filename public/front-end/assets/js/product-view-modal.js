$(document).on('click','.ti-search', function(){
    var id      = $(this).data('id');
    var get_url = $('#base_url').val();

    $.ajax({
        type:'get',
        url:get_url+'/product_view/'+id,
        async :true,
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            $('#product-name').html(data['name']);
            $('#product-price').html('৳'+data['price']);
            $('#product-summary').html(data['summary']);
            $('#quick_view_detail').attr("href", get_url+'/shop/'+data['url_slug']);
            $('#product-view-pk').attr("data-pk", data['id']);
            $('#product-img').attr("src", get_url+"/images/product/"+data['img']);
            console.log(data);
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });

});
