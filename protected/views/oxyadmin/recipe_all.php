<?php

/* 
 * Admin Recipe Listing
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
            <div id="page-heading"><h1>Recipe Listing</h1></div>
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

                            <table border="0" width="100%" cellpadding="5" cellspacing="0"  id="product-table">
                                <tbody>
                                    <tr>
                                        <th class="table-header-repeat line-left">S.no.</th>
                                        <th class="table-header-repeat line-left">Name</th>
                                        <th class="table-header-repeat line-left">Date</th>
                                        <th class="table-header-repeat line-left">Action</th>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <?php $i=1;
                                    foreach($recipes as $recipe):    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $recipe['rp_name'] ?></td>
                                        <td><?php echo $recipe['rp_modified_on'] ?></td>
                                        <td>
                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/oxyadmin/recipe/<?php echo $recipe['rp_id'] ?>">Edit</a> 
                                        </td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                                </tbody>
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
    <script type="text/javascript">
        function deleteRecipe(id){
            if(!confirm('Are you sure to delete?')){
                return false;
            }
            var data = {rp_id : parseInt(id), };
            loader.begin();
            ajaxhandler = $.ajax({
                type : 'post',
                url : baseURL + '/oxyadmin/ajax',
                data : data,
                dataType : 'json',
                error : function(jqXHR, textStatus, errorThrown){
                    loader.stop();
                    window.alert('Network Unreachable.');
                },
                success : function(msg){
                    loader.stop();
                }
            });
        }
    </script>
</body>
<?php require_once dirname(__FILE__).'/layout/footer.php'; ?>