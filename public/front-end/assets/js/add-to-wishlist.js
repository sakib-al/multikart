$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $('.add-to-cart').click(function (e) {
        e.preventDefault();

        // alert('TEST');

        // var product_id = $(this).closest('.product_data').find('product_pk').val();
        var product_id = $('.product_pk').val();
        var product_qty = $('#quantity').val();
        var get_url = $('#base_url').val();

        $.ajax({
            url: "/add-to-cart",
            method: "POST",
            data: {
                'quantity' : product_qty,
                'product_id' : product_id,
            },
            success: function(data){
                if (data.return==1) {
                    toastr.success(data.status);
                    $('#subtotal').prepend('<li><div class="media"><a href="#"><img class="me-3" id="prd-img" src="'+get_url+'/images/product/'+data['data']['item_img']+'" alt="'+data['data']['item_name']+'"></a><div class="media-body"><a href="#"><h5 id="prd-name">'+data['data']['item_name']+'</h5></a><h4 id="prd-quantity"><span>'+data['data']['item_quantity']+'*'+data['data']['item_price']+'</span></h4></div></div><div class="close-circle"><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></div></li>')
                }else
                toastr.success(data.status);
            }
        })

    })
})
