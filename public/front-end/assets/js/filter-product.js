// Filter Product By Sub Category

function makeUrl(old_url,param,val,type) {

    var url = new URL(old_url);
    var search_params = url.searchParams;

    if(type === 'checked'){
        search_params.append(param, val);
    }else if (type === 'selected') {
        search_params.append(param, val);
    }else if (type === 'active') {
        search_params.append(param,val)
    }
    else if(type === 'unchecked'){

    search_params.forEach((value, key) => {
       search_params.delete(param, val);
    });

    }
    else if(type === 'inactive'){

        search_params.forEach((value, key) => {
           search_params.delete(param, val);
        });

    }

    url.search = search_params.toString();
    return url.toString();
}
$(document).on('click','.category-filter',function(e){
    var new_url     = old_url = $(location).attr("href");
    var val         = $(this).val();
    var param       = $(this).attr('name');
    if($(this).is(":checked")){
        var type = 'checked';
        var new_url = makeUrl(old_url, param, val,type);
    } else{
        var type = 'unchecked'
        var new_url = makeUrl(old_url, param, val,type);
    }
    window.location.href = new_url;
})

// End

// Filter by Size

$(document).on('click','.size-filter',function(e) {
    var new_url   = old_url = $(location).attr("href");
    var val       = $(this).val();
    var param     = $(this).attr('name');
    if($(this).is(":checked")){
        var type = 'checked';
        var new_url = makeUrl(old_url, param, val,type);
    } else{
        var type = 'unchecked'
        var new_url = makeUrl(old_url, param, val,type);
    }
    window.location.href = new_url;
})

// Filter by Color
$(document).on('click','#color_check',function(e) {
    var new_url   = old_url = $(location).attr("href");
    var val       = $(this).val();
    var param     = $(this).attr('name');
    if($(this).hasClass("active")){
        var type = 'active';
        var new_url = makeUrl(old_url, param, val,type);
    } else{
        var type = 'inactive'
        var new_url = makeUrl(old_url, param, val,type);
    }
    window.location.href = new_url;
})
