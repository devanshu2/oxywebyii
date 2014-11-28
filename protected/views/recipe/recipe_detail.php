<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* @var $this SiteController */

$this->pageTitle='Recipe Detail - '.Yii::app()->name ;
//echo '<pre>'; print_r($recipeDetail);
$recipeImage = $recipeDetail['rp_image_url'];
$recipeImageURL = Yii::app()->request->baseUrl.'/images/recipe/'.$recipeImage;
$recipeName = $recipeDetail['rp_name'];
$recipeMinCookTime = $recipeDetail['rp_min_cook_time'];
$recipeMaxCookTime = $recipeDetail['rp_max_cook_time'];
$recipeMaxPrepTime = $recipeDetail['rp_max_preparation_time'];
$recipeDesc = $recipeDetail['rp_description'];
$recipeIngredients = $recipeDetail['rp_ingredients'];
$recipeTemprature = $recipeDetail['rp_temprature'];
$recipeYoutubeUrl = $recipeDetail['rp_youtube_url'];
$fixWidth = 1600;
$fixHeight = 475;
$croppedImage = CommonFunctions::getCroppedRecipeImage($recipeImage, $fixWidth, $fixHeight);

//$recipeUrl = Yii::app()->createAbsoluteUrl(Yii::app()->request->url);
$recipeUrl = Yii::app()->getBaseUrl(true)."/recipe/".$recipeDetail['rp_id'];
$recipeTitle = 'Try this awesome recipe with Oxy Fryer - '.$recipeName.'';
$fbShareURL = 'http://www.facebook.com/share.php?u='.$recipeUrl.'&t='.$recipeTitle;
$gplusShareURL = 'https://plus.google.com/share?url='.$recipeUrl.'&t='.$recipeTitle;
$twitterShareURL = 'http://twitter.com/home?status='.$recipeTitle.' '.$recipeUrl.'&t='.$recipeTitle;

?>
<!--  Start content container -->
		<div id="contentCntr" class="contentbg">
				<div class="detailbanner">
                                    <?php if(strlen($recipeYoutubeUrl)): ?>
                                        <a href="<?php echo $recipeYoutubeUrl; ?>?autoplay=1&rel=0&fs=1" class="iframe recipe_play_icon"><img  src="<?php echo Yii::app()->request->baseUrl; ?>/images/play_icon.png" alt="" /></a>
				    <?php endif; ?>
                                        <img src="<?php echo $croppedImage; ?>" alt="banner" />
                <div class="bannertitle"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconleft.png" alt="" /><?php echo $recipeName; ?><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconright.png" alt="" /></div>
                <div class="detailbannercontent">
                <div class="inner-width">
                <div class="bannercontent-left">
                <h4><?php echo $recipeName; ?></h4>
                <p>Cooking Time : <?php echo $recipeMinCookTime;?> - <?php echo $recipeMaxCookTime; ?> min<br />Temperature : <?php echo $recipeTemprature; ?></p>
                </div>
                 <div class="bannercontent-right">
               <ul>
               <li><a href="javascript:void(0)" onclick="window.print()"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/print-icon.png" alt="print" /></a></li>
              <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>recipe"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon3.png" alt="print" /></a></li>
               </ul>
                </div>
                </div>
                </div>
                </div>
                <div class="inner-width" id="recipedetail">
                <div class="recipe-left">
					<h2>Ingredients</h2>
					<div class="custom_ingredients_container" style="line-height: 2.65em; color:#414042">
						<?php echo $recipeIngredients; ?>
					</div>
                </div>
                <div class="recipe-right">
                 	<h2>How to Cook</h2>
					<div class="custom_description_container" style="line-height: 2.65em; color:#414042">
						<?php echo $recipeDesc; ?>

					</div>
                </div>
                <div class="clear"></div>
                </div>
           
                <div class="inner-width">
 <div class="social-share">
                    <!--p class="upload-reci-link">Feel like yours is better than this? Share it with us</p>
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/recipe/upload"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/upload_recipe_button.png" alt="Upload your recipe" class="upload-recibtn" /></a-->

               
                <p>Tell your friends about this recipe</p>
                <ul>
                <li>
					<a href="<?php echo $fbShareURL; ?>" target="_blank">
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/fb.png" alt="facebook" />
					</a>
				</li>
                 <li><a href="<?php echo $twitterShareURL; ?>" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/twitter.png" alt="facebook" /></a></li>
                 <li><a href="<?php echo $gplusShareURL; ?>" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/gplus.png" alt="facebook" /></a></li>
                </ul>
                 <div class="clear"></div>
                </div>
                </div>
          

			
		</div>
		<!--  End content container -->
