<?php

/* 
 * Admin Push Notification Page
 */
require_once dirname(__FILE__).'/layout/header.php';
?>
<body> 
    <!-- Start: page-top-outer -->
    <div id="page-top-outer">    

        <!-- Start: page-top -->
        <div id="page-top">

            <!-- start logo -->
            <div id="logo">
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/oxyadmin/">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" width="130" alt="" />
                </a>
            </div>
            <!-- end logo -->
            <div class="clear"></div>

        </div>
        <!-- End: page-top -->

    </div>
    <!-- End: page-top-outer -->

    <div class="clear">&nbsp;</div>

    <?php require_once dirname(__FILE__).'/layout/topmenu.php'; ?>
    
    <div class="clear"></div>

    <!-- start content-outer -->
    <div id="content-outer">
        <!-- start content -->
        <div id="content">
            <div id="page-heading"><h1>Moderate Recipe</h1></div>
            <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
                <tr>
                    <th rowspan="3" class="sized"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
                    <th class="topleft"></th>
                    <td id="tbl-border-top">&nbsp;</td>
                    <th class="topright"></th>
                    <th rowspan="3" class="sized"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
                </tr>
                <tr>
                    <td id="tbl-border-left"></td>
                    <td>
                        <!--  start content-table-inner -->
                        <div id="content-table-inner">
                            <form id="recipe-add-update" enctype="multipart/form-data">
                                <input type="hidden" name="manage_recipe" value="1" />
                                <input type="hidden" name="recipe_type" value="moderate" />
                                <input type="hidden" name="rp_id" value="<?php echo $recipe['rp_id']; ?>" />
                                <table id="id-form" border="0" width="100%" cellpadding="5" cellspacing="0">
                                    <tr>
                                        <th valign="top">Recipe name:</th>
                                        <td><input type="text" name="rp_name" value="<?php echo htmlspecialchars($recipe['rp_name']); ?>" /></td>
                                    </tr>
                                    <tr>
                                        <th valign="top">Category:</th>
                                        <td>
                                            <?php $catVal = CommonFunctions::getCategoryValue($recipe['rp_type'],$recipe['rp_category']); ?>
                                            <select name="category-choose">
                                                <option <?php if($catVal==0) { echo "selected='selected'"; } ?> value="0">Category</option>
                                                <option <?php if($catVal==1) { echo "selected='selected'"; } ?> value="1">Non-Veg (Snacks & Starters)</option>
                                                <option <?php if($catVal==2) { echo "selected='selected'"; } ?> value="2">Veg (Snacks & Starters)</option>
                                                <option <?php if($catVal==3) { echo "selected='selected'"; } ?> value="3">Veg (Meal)</option>
                                                <option <?php if($catVal==4) { echo "selected='selected'"; } ?> value="4">Non-Veg (Meal)</option>
                                                <option <?php if($catVal==5) { echo "selected='selected'"; } ?> value="5">Dessert</option>
                                            </select>
                                            <input type="hidden" name="rp_category" value="<?php echo $recipe['rp_category']; ?>" />
                                            <input type="hidden" name="rp_type" value="<?php echo $recipe['rp_type']; ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th valign="top">Temperature:</th>
                                        <td>
                                            <input type="text" name="rp_temprature" value="<?php echo html_entity_decode($recipe['rp_temprature']); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th valign="top">Cooking Time (In Minutes):</th>
                                        <td>
                                            <input type="number" class="min" name="rp_min_cook_time" value="<?php echo intval($recipe['rp_min_cook_time']); ?>" /> 
                                            <input type="number" class="max" name="rp_max_cook_time" value="<?php echo intval($recipe['rp_max_cook_time']); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th valign="top">Preparation Time (In Minutes):</th>
                                        <td>
                                            <input type="hidden" class="min" name="rp_min_preparation_time" value="<?php echo intval($recipe['rp_min_preparation_time']); ?>" />
                                            <input type="number" class="max" name="rp_max_preparation_time" value="<?php echo intval($recipe['rp_max_preparation_time']); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th valign="top">Quantity:</th>
                                        <td>
                                            <input type="text" name="rp_quantity" value="<?php echo htmlentities($recipe['rp_quantity']); ?>"  />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th valign="top">Image:</th>
                                        <td>
                                            <input type="file" class="file_1" name="rp_image_url" />
                                            <br/>
                                            <img src="<?php echo CommonFunctions::getCroppedRecipeImage('uploaded/'.$recipe['rp_image_url'], 100, 100, 1) ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th valign="top">Youtube Video URL(Optional):</th>
                                        <td>
                                            <input type="text" name="rp_youtube_url" value="<?php echo $recipe['rp_youtube_url']; ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th valign="top">Ingredients:</th>
                                        <td>
                                            <textarea rows="10" id="rp_ingredients" name="rp_ingredients"><?php echo $recipe['rp_ingredients']; ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th valign="top">How to Cook:</th>
                                        <td>
                                            <textarea rows="10" id="rp_description" name="rp_description"><?php echo $recipe['rp_description']; ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <td>
                                            <input class="form-submit" type="submit" name="action_type" value="Update" />
                                            <input class="form-submit" type="submit" name="action_type" value="Approve" />
                                            <input class="form-submit" type="submit" name="action_type" value="Reject" />
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <div class="clear"></div>


                        </div>
                        <!--  end content-table-inner  -->
                    </td>
                    <td id="tbl-border-right"></td>
                </tr>
                <tr>
                    <th class="sized bottomleft"></th>
                    <td id="tbl-border-bottom">&nbsp;</td>
                    <th class="sized bottomright"></th>
                </tr>
            </table>
            <div class="clear">&nbsp;</div>

        </div>
        <!--  end content -->
        <div class="clear">&nbsp;</div>
    </div>
    <!--  end content-outer -->
    <div class="clear">&nbsp;</div>

    <!-- start footer -->         
    <div id="footer">
        <div class="clear">&nbsp;</div>
    </div>
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "#rp_description"
        });
        tinymce.init({
            selector: "#rp_ingredients"
        });
    </script>

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form.min.js"></script>
    <script type="text/javascript">
        $('select[name="category-choose"]').change(function(){
            var cval = parseInt($(this).val());
            var catval = 1;
            var typeval = 1;
            switch(cval){
                case 1:
                    catval = 1;
                    typeval = 2;
                break;
                case 2:
                    catval = 1;
                    typeval = 1;
                break;
                case 3:
                    catval = 2;
                    typeval = 1;
                break;
                case 4:
                    catval = 2;
                    typeval = 2;
                break;
                case 5:
                    catval = 3;
                    typeval = 1;
                break;
            }
            $('input[name="rp_category"]').val(catval);
            $('input[name="rp_type"]').val(typeval);
        });

        $(document).ready(function(){
            var options = { 
                beforeSubmit:  showRequest,
                success:       showResponse,
                beforeSerialize: function($form, options) { 
                    tinyMCE.triggerSave();
                    return true;
                },
                url:       baseURL + '/oxyadmin/ajax',
                type:      'post',
                dataType:  'json'
            }; 
            $('#recipe-add-update').ajaxForm(options); 
        });

        function showRequest(formData, jqForm, options) {
            
            if(typeof formData.action_type == 'reject'){
                loader.begin();
                return true;
            }
            var queryString = $.param(formData); 
            if($('input[name="rp_youtube_url"]').val().length && !validateYoutubeUrl($('input[name="rp_youtube_url"]').val())){
                $('.recipe-details a').trigger('click');
                alert('Please provide youtube url in format of http://www.youtube.com/embed/videoid');
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
                    alert(responseText.ErrorMessage);
                    $('input[type="submit"]').attr('disabled','disabled');
                    location.reload(true);
                }
                else{
                    alert(responseText.ErrorMessage);
                }
            }catch(err){ console.log(err); }
        } 

        function validateYoutubeUrl(url){
            var re = /http:\/\/www\.youtube\.com\/embed\/[a-zA-Z0-9_\-]{3,}$/i;
            return re.test(url);
        }
    </script>
</body>
<?php require_once dirname(__FILE__).'/layout/footer.php'; ?>