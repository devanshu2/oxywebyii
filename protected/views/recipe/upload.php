<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* @var $this SiteController */
?>
<!--  Start content container -->
<div id="contentCntr" class="contentbg uploadbg">

    <div class="listingWrap uploadrecipe">
        <!--  Start Filter container -->
        <div class="filterwrap inner-width">
            <h2>Upload Your Recipe</h2>

            <div class="clear"></div>
        </div>
        <!--  End Filter container -->

    </div>

    <div class="inner-width uploadwrap">
        <div class="upload-steps clearfix">
            <ul>
                <li>
                    <div class="recipe-details active">
                        <a href="javascript:void(0)" rel="0">Recipe Details</a>
                    </div>
                </li> 
                <li>
                    <div class="cooking-steps">
                        <a href="javascript:void(0)" rel="1">Cooking Steps</a>
                    </div>
                </li>
                <li>
                    <div class="personal-details">
                        <a href="javascript:void(0)" rel="2">Personal Details</a>
                    </div>
                </li>
            </ul>

        </div>
        <form id="upload-recipe" enctype="multipart/form-data">

            <div class="recipe-detailswrap">
                <ul>
                    <li>
                        <label>Recipe Name</label>
                        <input type="text" name="dishName" />
                    </li>
                    <li>
                        <label>Category</label>
                        <select name="category-choose">
                            <option value="0">Category</option>
                            <option value="1">Non-Veg (Snacks & Starters)</option>
                            <option value="2">Veg (Snacks & Starters)</option>
                            <option value="3">Veg (Meal)</option>
                            <option value="4">Non-Veg (Meal)</option>
                            <option value="5">Dessert</option>
                        </select>
                        <input type="hidden" name="category" value="1" />
                        <input type="hidden" name="type" value="1" />
                    </li>
                    <li>
                        <label>Temperature</label>
                        <input type="text" name="temprature" />
                    </li>
                    <li class="clearfix">
                        <label>Cooking Time (In Minutes)</label>
                        <input type="number" class="min" name="minCookTime" placeholder="minimum" /> 
                        <input type="number" class="max" name="maxCookTime" placeholder="maximum" />
                    </li>
                    <li>
                        <label>Preparation Time (Time to get ready for cooking)</label>
                        <input type="hidden" class="min" name="minPrepTime" value="0" />
                        <input type="number" class="" name="maxPrepTime" />
                    </li>
                    <li>
                        <label>Quantity</label>
                        <input type="text" name="quantity"  />
                    </li>
                    <li>
                        <label>Image</label>
                        <input type="file" name="image" />
                    </li>
                    <li>
                        <label>Youtube Video URL(Optional)</label>
                        <input type="text" name="youtubeVideo" />
                    </li>
                </ul>
                <div class="uploadbtn clearfix"><input type="button" onclick="$('.cooking-steps a').trigger('click');" value="Continue"/></div>
            </div>
            <div class="cooking-step-wrap" style="display: none;">
                <ul>
                    <li>
                        <label>Ingredients</label>
                        <textarea rows="10" cols="5" name="ingredients"></textarea>
                    </li>
                    <li>
                        <label>How to Cook</label>
                        <textarea rows="10" cols="5" name="howToUse"></textarea>
                    </li>
                </ul>
                <div class="uploadbtn clearfix"><input type="button" onclick="$('.personal-details a').trigger('click');" value="Continue"/></div>
            </div>

            <div class="personal-step-wrap" style="display: none;">
                <ul>
                    <li>
                        <label>Full Name</label>
                        <input type="text" name="fullName" />
                    </li>
                    <li>
                        <label>Email Address</label>
                        <input type="email" name="email" />
                    </li>
                    <li>
                        <label>Mobile Number</label>
                        <input type="text" name="number" />
                    </li>
                </ul>
                <div class="uploadbtn clearfix"><input type="submit" value="Submit"/></div>
            </div>
        </form>
        <div class="clear"></div>
    </div>  



</div>
<!--  End content container -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form.min.js"></script>
<script type="text/javascript">
    $('.upload-steps a').click(function(e){
        e.preventDefault();
        var i = $(this).attr('rel');
        $('.upload-steps a').each(function(){ $(this).parent('div').removeClass('active'); });
        $(this).parent('div').addClass('active');        
        $('form#upload-recipe').children('div').each(function(index){
            if(index == i){
                $(this).css('z-index', 10).stop().show(200);
            }
            else{
                $(this).css('z-index', index).stop().hide(200);
            }
        });
    });
    
    $('select[name="category-choose"]').change(function(){
        var cval = parseInt($(this).val());
        var catval = 1;
        var typeval = 1;
        switch(cval){
            case 1:
                catval = 1;
                typeval = 2;
            break;
            case 1:
                catval = 1;
                typeval = 1;
            break;
            case 1:
                catval = 2;
                typeval = 1;
            break;
            case 1:
                catval = 2;
                typeval = 2;
            break;
            case 1:
                catval = 3;
                typeval = 1;
            break;
        }
        $('input[name="category"]', '#upload-recipe').val(catval);
        $('input[name="type"]', '#upload-recipe').val(typeval);
    });
    
    $(document).ready(function(){
        var options = { 
            beforeSubmit:  showRequest,
            success:       showResponse,
            url:       baseURL + '/webservice/uploadRecipe',
            type:      'post',
            beforeSend: function(xhr){xhr.setRequestHeader('API_TOKEN', '142d3a2e50fd9a643e0f8a7c2f');},
            dataType:  'json'
        }; 
        $('#upload-recipe').ajaxForm(options); 
    });
    
    function showRequest(formData, jqForm, options) {
        // formData is an array; here we use $.param to convert it to a string to display it 
        // but the form plugin does this for you automatically when it submits the data 
        var queryString = $.param(formData); 

        // jqForm is a jQuery object encapsulating the form element.  To access the 
        // DOM element for the form do this: 
        // var formElement = jqForm[0]; 

        //alert('About to submit: \n\n' + queryString); 

        // here we could return false to prevent the form from being submitted; 
        // returning anything other than false will allow the form submit to continue 
        if($('input[name="youtubeVideo"]').val().length && !validateYoutubeUrl($('input[name="youtubeVideo"]').val())){
            $('.recipe-details a').trigger('click');
            alert('Please provide youtube url in format of http://www.youtube.com/embed/videoid');
            return false;
        }
        if(!validateEmail($('input[name="email"]').val())){
            alert('Please provide your valid email id.');
            return false;
        }
        loader.begin();
        return true; 
    } 
 
    // post-submit callback 
    function showResponse(responseText, statusText, xhr, $form)  { 
        loader.stop();
        try{
            if(responseText.ErrorCode == 0){
                alert('Recipe Uploaded Successfully.');
                $('input[type="submit"]').attr('disabled','disabled');
                location.reload(true);
            }
            else{
                alert(responseText.ErrorMessage);
                if(typeof responseText.ErrorPage === 'undefined'){
                    $('.recipe-details a').trigger('click');
                }
                else{
                    if(responseText.ErrorPage == 2){
                        $('.cooking-steps a').trigger('click');
                    }
                    else if(responseText.ErrorPage == 3){
                        $('.personal-details a').trigger('click');
                    }
                }
                
            }
        }catch(err){ console.log(err); }
        //alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
           // '\n\nThe output div should have already been updated with the responseText.'); 
    } 
    
    function validateYoutubeUrl(url){
        var re = /http:\/\/www\.youtube\.com\/embed\/[a-zA-Z0-9_\-]{3,}$/i;
        return re.test(url);
    }
    
    function validateEmail(email) { 
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    } 
</script>