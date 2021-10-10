$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Cart Store Function

$(document).ready(function () {
    CartTotalPrice();

    $('.add-to-cart').click(function (e) {
        e.preventDefault();

        // alert('TEST');

        // var product_id = $(this).closest('.product_data').find('product_pk').val();
        var product_id = $(this).data('pk');
        // var product_id = $('.product_pk').val();
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
                    $('.short-cart-list').prepend('<li id="short-cart"><div class="media"><input type="hidden" id="p_quantity" value="'+data['data']['item_quantity']+'"><input type="hidden" id="p_price" value="'+data['data']['item_price']+'"><a href="#"><img class="me-3" id="prd-img" src="'+get_url+'/images/product/'+data['data']['item_img']+'" alt="'+data['data']['item_name']+'"></a><div class="media-body"><a href="#"><h5 id="prd-name">'+data['data']['item_name']+'</h5></a><h4 id="prd-quantity"><span>'+data['data']['item_quantity']+'x'+data['data']['item_price']+['৳']+'</span></h4></div></div>');
                    $('.cart-count').html(data.cart_count);
                    CartTotalPrice();
                }else{
                    toastr.success(data.status);
                }

            }
        })

    })
})

// Cart Update Function

$(document).ready(function () {
    CartTotalPrice();

    $('[id*=item_quantity]').change(function (e) {
        e.preventDefault();


        var product_id = $(this).data('pk');
        var product_qty = $(this).val();
        var get_url = $('#base_url').val();

        $.ajax({
            url: "/update-cart",
            method: "POST",
            data: {
                'quantity' : product_qty,
                'product_id' : product_id,
            },
            success: function(data){
                if (data.return==1) {
                    toastr.success(data.status);
                    CartTotalPrice();
                }else{
                    toastr.success(data.status);
                }

            }
        })

    })
})

// Cart unit Price function

$( "[id=item_quantity]" ).change(function(e) {
    e.preventDefault();

    var quantity = $(this).val();
    var price = $(this).closest(".cart_page").find("#price").val();
    var item_total_price = quantity * price;
    item_total_price = parseFloat(item_total_price).toFixed(2);
    $(this).closest(".cart_page").find(".unit_total_price").html(item_total_price);
    count();

});


function count(){
    var sub_total = 0;

    $('table > tbody  > tr').each(function(index, tr) {
        var quantity = $(tr).find('#item_quantity').val();
        var price    = $(tr).find('#price').val();
        var unit_total = quantity * price;
        sub_total += unit_total;
    });

    sub_total = parseFloat(sub_total).toFixed(2);
    $("#sub_total").html('৳' + sub_total);
}

// Popup Cart data total price

function CartTotalPrice(){
    var cart_total = 0;
    $('.short-cart-list > #short-cart').each(function(index, li) {
        var cart_quantity = $(li).find('#p_quantity').val();
        var cart_price    = $(li).find('#p_price').val();
        console.log(cart_price);
        var sub_cart_total = cart_quantity * cart_price;
        cart_total += sub_cart_total;
    });

    cart_total = parseFloat(cart_total).toFixed(2);
    $("#cart_sub_total").html('৳' + cart_total);
}

// Cart Delete Data Function

$(document).ready(function () {
    count();

    $("[id=delete_cart_data]").click(function (e) {
        e.preventDefault();

        var the = $(this).closest('.cart_page');
        var product_id = $(this).closest(".cart_page").find('.product_id').val();
        var data = {
            '_token': $('input[name=_token]').val(),
            "product_id": product_id,
        };

        $.ajax({
            url: '/delete-from-cart',
            method: "get",
            data: data,
            success: function (data) {
                the.remove();
                toastr.success(data.status);
                $('.cart-count').html(data.cart_count);
                if (data.cart_count==0) {
                    $('#cart_body').hide();
                    $('.cart-section').append('<div class="empty_cart mb-4"><div class="text-center"><div class="cart mb-4"><i class="ti-shopping-cart"></i></div><h3>OPPS! Your cart is empty</h3></div></div><div class="text-center"><a href="/" class="btn btn-solid">continue shopping</a></div>');
                    $('.cart-count').html(data.cart_count);
                }else{

                }
                count();
            }
        });

    });

});
