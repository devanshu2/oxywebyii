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
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/oxyadmin/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" width="130" alt="" /></a>
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


            <div id="page-heading"><h1>Push Notification</h1></div>


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

                            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                <tr valign="top">
                                    <td>



                                        <!-- start id-form -->
                                        <table border="0" cellpadding="0" cellspacing="0"  id="id-form">                                            
                                            <tr>
                                                <th valign="top">Short Message:</th>
                                                <td><textarea rows="" cols="" class="form-textarea" id="push-message"></textarea></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th valign="top">Promote Recipe</th>
                                                <td>	
                                                    <select id="push-rp">
                                                        <option value="0">None</option>
                                                     <?php
                                                        $recipe = new VdRecipies();
                                                        $recipeData = $recipe->getFilteredData(array('limit'=>array(0,1000)));
                                                        foreach($recipeData as $recipeDataSingle) {
                                                            $name = $recipeDataSingle['rp_name'];
                                                            $id = $recipeDataSingle['rp_id'];
                                                     ?>
                                                        <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <td valign="top">
                                                    <input type="button" value="Submit" id="submit-push" class="form-submit active-state" onclick="call_push()" />
                                                </td>
                                                <td></td>
                                            </tr>
                                        </table>
                                        <!-- end id-form  -->
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
                                    <td></td>
                                </tr>
                            </table>

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
    <!-- end footer -->
    <script type="text/javascript">
        function call_push(){
            if(!$('#submit-push').hasClass('active-state')){
                return false;
            }
            var push_message = $.trim($('#push-message').val());
            var push_rp = parseInt($('#push-rp').val());
            if(!push_message.length){
                alert('Please provide message.');
                return false;
            }
            var data = { send_push_notification: 1, message : push_message };
            if(push_rp){
                data.rp_id = push_rp;
            }
            $('#submit-push').removeClass('active-state');            
            $.ajax({
                type : 'post',
                url : baseURL + '/oxyadmin/ajax',
                data : data,
                dataType: 'json',
                error : function(jqXHR, textStatus, errorThrown){
                    $('#submit-push').addClass('active-state');
                    window.alert('Network Unreachable.');     
                },
                success : function(msg){
                    $('#submit-push').addClass('active-state');
                    try{
                        if(msg.ErrorCode == '0'){
                            $('#push-message').val('');
                            $('#push-rp').val('0');
                            alert('Push notification sent');
                        }
                        else{
                            alert(msg.ErrorMessage);
                        }
                    } catch(err){ }
                }
            });
        }
    </script>
</body>
<?php require_once dirname(__FILE__).'/layout/footer.php'; ?>