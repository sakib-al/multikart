/*Add edit Country name model*/
$(document).on('click','.editCountryModal', function(){
    var url            = $(this).data('url');
    var country_name  = $(this).data('country_name');
    var source_id      = $(this).data('source_id');
    var type           = $(this).data('type');
    var country_status = $(this).data('country_status')

    $('#country-form').attr('action',url);
    $('#country-form .source_id').val(source_id);
    $('#country-form .country-name').val(country_name);
    $('#country-status option[value='+country_status+']').attr('selected','selected');


    if (type == 'edit'){
        $('#countryHead').text('Edit Country');
        $('#country-form .submit-btn').val('Save change');
    }
});

$(document).on('click','.addCountryModal', function(){
    var url            = $(this).data('url');
    var type           = $(this).data('type');
    var country_status = $(this).data('country_status')

    $('#country-form').attr('action',url);
    $('#country-form .country-name').val('');
    $('#country-status option[value= '+0+']').attr('selected','selected');


    if (type == 'add-country'){
        $('#countryHead').text('Add Country');
        $('#country-form .submit-btn').val('Save change');
    }
});

// Add edit City Modal

$(document).on('click','.editCityModal', function(){
    var url            = $(this).data('url');
    var city_name      = $(this).data('city_name');
    var source_id      = $(this).data('source_id');
    var type           = $(this).data('type');
    var city_status    = $(this).data('city_status');
    var country        = $(this).data('country_id');
    var del_cost       = $(this).data('del_cost')

    $('#city-form').attr('action',url);
    $('#city-form .source_id').val(source_id);
    $('#city-form .city-name').val(city_name);
    $('#city-form .delivery_cost').val(del_cost);
    $('#city-status option[value='+city_status+']').attr('selected','selected');
    $('#country_id option[value='+country+']').attr('selected','selected');


    if (type == 'edit'){
        $('#cityHead').text('Edit City');
        $('#city-form .submit-btn').val('Save change');
    }
});

$(document).on('click','.addCityModal', function(){
    var url            = $(this).data('url');
    var type           = $(this).data('type');
    var country_id     = $(this).data('country_id')

    $('#city-form').attr('action',url);
    $('#city-form .city-name').val('');
    $('#city-form .delivery_cost').val('');
    $('#country_id option[value='+country_id+']').attr('selected','selected');


    if (type == 'add-city'){
        $('#cityHead').text('Add City');
        $('#city-form .submit-btn').val('Save change');
    }
});

// Add Edit Area Model

$(document).on('click','.editAreaModal', function(){
    var url            = $(this).data('url');
    var city_id        = $(this).data('city_status');
    var country_id     = $(this).data('country_id');
    var type           = $(this).data('type');
    var status         = $(this).data('status');
    var area_name      = $(this).data('area_name');

    $('#area-form').attr('action',url);
    $('#area-form .area-name').val(area_name);
    $('#area-status option[value='+status+']').attr('selected','selected');
    $('#country_id option[value='+country_id+']').attr('selected','selected');
    $('#city_id option[value='+city_id+']').attr('selected','selected');


    if (type == 'edit'){
        $('#areaHead').text('Edit Area');
        $('#area-form .submit-btn').val('Save change');
    }
});

$(document).on('click','.addAreaModal', function(){
    var url            = $(this).data('url');
    var city_id        = $(this).data('city_status');
    var country_id     = $(this).data('country_id');
    var type           = $(this).data('type');
    var status         = $(this).data('status');


    $('#area-form').attr('action',url);
    $('#area-form .area-name').val('');
    $('#area-status option[value='+status+']').attr('selected','selected');
    $('#country_id option[value='+country_id+']').attr('selected','selected');
    $('#city_id option[value='+city_id+']').attr('selected','selected');


    if (type == 'add-area'){
        $('#areaHead').text('Add Area');
        $('#area-form .submit-btn').val('Save change');
    }
});

// Get Area Name by City

function getArea(city_id,address) {
    var get_url = $('#base_url').val();
    var address_type = address;
    $.ajax({
        type:'get',
        url:get_url+'/area_by_city/'+city_id,
        async :true,
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            if (address_type == 'billing_address') {
                $('#billing_area_id').html(data);
            }
            if (address_type == 'shipping_address') {
                $('#shipping_area_id').html(data);
            }

        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
}

$(document).on('change','#city_id', function(){
    var city_id     = $(this).val();
    var address     = $(this).data('type');
    getArea(city_id,address);
});
