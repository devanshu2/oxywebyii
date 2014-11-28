$('#basic.typeon input').switchButton();
$("#labels.typeon input").switchButton({
    on_label: 'on',
    off_label: 'off'
});

var hash = window.location.hash;
var is_search = false;
var query_pool = new Array();
var filter_open = false;
var isVideoRecipe = false;
try{
    if(hash.length){
        hash = hash.substring(1);
        if(hash == 'videoRecipe'){
            prepAjax({videoRecipe:1});
            isVideoRecipe = true;
        }
        else{
            var t = hash.split('_');
            for(var i = 0; i < t.length; i++){
                x = t[i].split('=');
                if(x.length==2){
                    if(x[0]=='cat'){
                        var vals = x[1].split('-');
                        $('.food_cat').each(function(){
                            if(vals.indexOf($(this).val()) != -1){
                                $(this).attr('checked','checked');
                                filter_open = true;
                            }
                        });
                    }
                    else if(x[0]=='type'){
                        if(x[1]==0){
                            $('#type_all').attr('checked','checked');
                            filter_open = true;
                        }
                        else{
                            var y = parseInt(x[1]);
                            if(y == 1){
                                $('#type_value').attr('checked','checked');
                                filter_open = true;
                            }
                            else if(y == 2){
                                $('#type_value').removeAttr('checked');
                                filter_open = true;
                            }
                        }
                    }
                }
            }
        }
    }
    else{
        $('#type_all').attr('checked', 'checked');
    }
}
catch(err){
    window.console.log(err);
}

if(filter_open){
    //$('#filter-wrapper').slideDown(300);
}

if($('#type_all').is(':checked')){
    $('#basic').addClass('invisible');
}

if($('#cat_all').is(':checked')){
    $('input.food_cat').each(function(){
        $(this).siblings('label').addClass('gray-color');
        $(this).attr('checked','checked');
        $(this).attr('disabled','disabled');
    });
}

$('#cat_all').change(function(){
    if($(this).is(':checked')){
        $('input.food_cat').each(function(){
            $(this).siblings('label').addClass('gray-color');
            $(this).attr('checked','checked');
            $(this).attr('disabled','disabled');
        });
    }
    else{
        $('input.food_cat').each(function(){
            $(this).siblings('label').removeClass('gray-color');
            $(this).removeAttr('checked');
            $(this).removeAttr('disabled');
        });
    }
    is_search = false;
    prepAjax();
});

$('.cooking_time, .food_cat, #type_value').change(function(e){
    console.log(e);
    is_search = false;
    prepAjax();
});

$('#type_all').change(function(){
    is_search = false;
    $('#basic').toggleClass('invisible');
    prepAjax();
});

var ajaxhandler = false;

$('#searchtext').keyup(function(event){
    if ( event.which == 13 ) {
        var searchString = $.trim($(this).val());
        is_search = true;
        prepAjax({search:searchString, limit:[0,6]});
    }
});

var ajaxTimer = false;

function prepAjax(data){
    data = (typeof data !== "undefined") ? data : prepareAjaxParams();
    try{ 
        clearTimeout(ajaxTimer);
        ajaxTimer = setTimeout(function(){
            callAjax(data);
        }, 300);
    }
    catch(err){
        console.log(err);
    }
}

function prepareAjaxParams(limit){
    limit = (typeof limit !== "undefined") ? limit : [0,6];
    var cat = [];
    $('.food_cat').each(function(){
        if($(this).is(':checked')){
            cat.push($(this).val());
        }
    });
    
    var type;
    if(!$('#type_all').is(':checked')){
        type = $('#type_value').is(':checked') ? 1 : 2;
    }
    
    var cooking_time = [];
    $('.cooking_time').each(function(){
        if($(this).is(':checked')){
            cooking_time.push($(this).val());
        }
    });
    var data = {
        cat : cat,
        type : type,
        cooking_time : cooking_time,
        limit: limit
    };
    return data;
}

function callAjax(params){
    var requestData = {getRecipeListing:1, limit:[0,6]};
    if(typeof params.append != "undefined"){
        requestData.append = params.append;
    }
    if(typeof params.videoRecipe != "undefined"){
        requestData.videoRecipe = params.videoRecipe;
    }
    else if(typeof params.search != "undefined"){
        requestData.search = jQuery.trim(params.search);
    }
    else{
        if(typeof params.cat != "undefined"){
            requestData.cat = params.cat;
        }
        if(typeof params.type != "undefined"){
            requestData.type = params.type;
        }
        if(typeof params.cooking_time != "undefined"){
            requestData.cooking_time = params.cooking_time;
        }        
    }
    if(typeof params.limit != "undefined"){
        requestData.limit = params.limit;
    }
    try{ ajaxhandler.stop(); } catch(err){ }
    if(typeof requestData.append == "undefined"){
        loader.begin();
    }
    ajaxhandler = $.ajax({
        type : 'post',
        url : baseURL + '/index.php/recipe',
        data : requestData,
        error : function(jqXHR, textStatus, errorThrown){
            loader.stop();
            if(typeof params.append == "undefined"){
                window.alert('Network Unreachable.');
            }           
        },
        success : function(msg){
            if(typeof params.search != "undefined"){
                query_pool.push('search');
            }
            else if(typeof params.videoRecipe != "undefined"){
                query_pool.push('videoRecipe');
            }
            else{
                query_pool.push('normal');
            }            
            loader.stop();
            last_data = requestData;
            last_data.valid_limit = 0;
            var x = $('#recipe_ul').children('li').length;
            if(typeof params.append != "undefined"){
                $('#recipe_ul').append(msg);
                var y = $('#recipe_ul').children('li').length;
                var z = y - x;
                if(z==6){ 
                    last_data.valid_limit = 1;
                }
            }
            else{
                $('#recipe_ul').html(msg);
                last_data.valid_limit = 1;
            }
            test_screen();
        },
        complete:function(){
            is_ajax_busy = false;
        }
    });
}

var is_ajax_busy = false;

var last_data = {};

if(!isVideoRecipe){
    test_screen();
}
function test_screen(){
    var scrolled = $(window).scrollTop() + $(window).height() + 63;
    if(scrolled > $(document).height()){
    	if(typeof last_data.valid_limit !== "undefined"){
            if(last_data.valid_limit === 0){
            	return false;
            }
        }
        is_ajax_busy = true;
        var data = prepareAjaxParams();
        if(typeof last_data.limit == "undefined"){
            data.limit = [0,6];
        }
        else{
            var ar = [];
            ar.push(last_data.limit[0]+6);
            ar.push(last_data.limit[1]);
            data.limit = ar;
        }
        data.append = 1;
        if(query_pool.length){
            var last_query = query_pool[query_pool.length - 1];
            if(last_query == 'search'){
                if(typeof last_data.search != "undefined"){
                    data.search = last_data.search;
                }
            }
            else if(last_query == 'videoRecipe'){
                if(typeof last_data.videoRecipe != "undefined"){
                    data.videoRecipe = last_data.videoRecipe;
                }
            }
        }
        prepAjax(data);
    }
}

$(window).scroll($.debounce( 250, function(){
    test_screen();
}));
