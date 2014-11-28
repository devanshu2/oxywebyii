<?php

/* 
 * Top Menu
 */
?>
<div class="nav-outer-repeat"> 
    <!--  start nav-outer -->
    <div class="nav-outer"> 

        <!-- start nav-right -->
        <div id="nav-right">

            <div class="nav-divider">&nbsp;</div>
            <div class="showhide-account">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" />
            </div>
            <div class="nav-divider">&nbsp;</div>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/oxyadmin/logout" id="logout">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/shared/nav/nav_logout.gif" width="64" height="14" alt="" />
            </a>
            <div class="clear">&nbsp;</div>

            <!--  start account-content -->	
            <div class="account-content">
                <div class="account-drop-inner">
                    <a href="" id="acc-settings">Settings</a>
                    <div class="clear">&nbsp;</div>
                    <!--<div class="acc-line">&nbsp;</div>
                    <a href="" id="acc-details">Personal details </a>
                    <div class="clear">&nbsp;</div>
                    <div class="acc-line">&nbsp;</div>
                    <a href="" id="acc-project">Project details</a>
                    <div class="clear">&nbsp;</div>
                    <div class="acc-line">&nbsp;</div>
                    <a href="" id="acc-inbox">Inbox</a>
                    <div class="clear">&nbsp;</div>
                    <div class="acc-line">&nbsp;</div>
                    <a href="" id="acc-stats">Statistics</a> -->
                </div>
            </div>
            <!--  end account-content -->

        </div>
        <!-- end nav-right -->


        <!--  start nav -->
        <div class="nav">
            <div class="table">

                <ul class="select">
                    <li>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/oxyadmin/">
                            <b>Dashboard</b>
                        </a>
                    </li>
                </ul>
                
                <div class="nav-divider">&nbsp;</div>

                <ul class="select">
                    <li>
                        <a href="javascript:void(0);">
                            <b>Recipe</b>
                        </a>
                        <div class="select_sub show">
                            <ul class="sub">
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/oxyadmin/recipe/add">Add Recipe</a></li>
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/oxyadmin/recipe/">Active Recipes</a></li>
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/oxyadmin/moderate/">Moderate Recipes</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                
                <div class="nav-divider">&nbsp;</div>
                
                <ul class="select">
                    <li>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/oxyadmin/pushNotification">
                            <b>Push Notification</b>
                        </a>
                    </li>
                </ul>
                
                <div class="nav-divider">&nbsp;</div>
                
                <!--ul class="select">
                    <li>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/oxyadmin/faq">
                            <b>FAQ</b>
                        </a>
                    </li>
                </ul-->                

                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <!--  start nav -->

    </div>
    <div class="clear"></div>
    <!--  start nav-outer -->
</div>


