<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<!--  Start content container -->
		<div id="contentCntr">

			<!--  Start center container -->
			<div id="centerCntr">

				<!--  Start food box -->
				<div class="foodBox">
                
                	<div class="inner-width ">

<!--                        <h2>Say Goodbye To Fried Food Dripping With Oil</h2>-->
						<h2 style="color:#ff0000;font-weight:normal">Renew your love for fried food</h2>
                        
                        <div class="left float-left">
                        
                            <p>“I have always been a big foodie and fried food has always been my favorite. Avoiding it has never been easy for me. But, thanks to Kenstar Oxy Fryer’s revolutionary oil-free frying*, I can now enjoy my choicest dishes, without any guilt.</p>
                            <p>This indeed, is a boon for each one of us”</p>
                            
                            
                            <img src="<?php echo CLOUD_IMG_PATH;?>images/signature.png" alt="" />
                            <img src="<?php echo CLOUD_IMG_PATH;?>images/front.png" alt="" />

                        </div>
                        
                        <div class="right float-right">
                        

							<p style="width:80%; text-align: left;">"Introducing the Oxy Fryer a revolutionary product by Kenstar"</p>
                        
                        </div>
                        
<!--                        <a class="slide" href="#benefits">SlideBottom</a>-->
                        
                    </div>

				</div>
				<!--  End food box -->
                
				<!--  Start slider box -->
				<div class="sliderBox" id="benefits">
                
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                            	<img src="<?php echo CLOUD_IMG_PATH;?>images/banner_1.jpg" alt="" />
                                
                                <div class="slidercontent">
                                
                                    <div class="inner-width">
                                    <h2>Oil Free Frying</h2>
                                        
                                     <p>The Oxy Fryer, fries your favorite food evenly, without any oil, and retains most of the nutrients inside. The complete lack of oil, during frying, further ensures that your cholesterol levels are in check. In short, you get healthy and tasty food with the Kenstar Oxy Fryer.</p>
                                        
                                    </div>
                                
                                </div>
                            </li>
                            <li>
                            	<img src="<?php echo CLOUD_IMG_PATH;?>images/banner_2.jpg" alt="" />
                                
                                <div class="slidercontent">
                                
                                    <div class="inner-width">
                                    
                                        <h2>Health Benefits</h2>
                                        
                                        <p>The Oxy Fryer uses air to fry your favorite snacks instead of oil,thus making the food healthier. The Kenstar Oxy Fryer is recommended for better cooked food. Certified by reputed university.</p>
                                    <a class="pop_image" href="<?php echo CLOUD_IMG_PATH;?>images/amity.jpg">Know More</a>
									</div>
                                
                                </div>
                            </li>
                            <li>
                            	<img src="<?php echo CLOUD_IMG_PATH;?>images/banner_3.jpg" alt="" />
                                
                                <div class="slidercontent">
                                
                                    <div class="inner-width">
                                    
                                        <h2>LifeStyle</h2>
                                        
                                        <p>Do you spend too much time in the kitchen? Oxy Fryer brings a revolution in Indian cooking, prepare all delicacies in minutes with Kenstar Oxy Fryer.</p>
                                    </div>
                                
                                </div>
                            </li>
                        </ul>
                    </div>

				</div>
				<!--  End slider box -->
                
				<!--  Start how to use box -->
				<div class="howtouseBox" id="howtouse">
                
                	<div class="inner-width" id="howtousediv">
                    	<a href="javascript:void(0);" rel="http://www.youtube.com/embed/mbYYYiCza0c?disablekb=1&enablejsapi=1&fs=0&iv_load_policy=3&modestbranding=1&playsinline=1&autohide=0&autoplay=1&controls=0&rel=0&showinfo=0&theme=dark&color=white&html5=1" class="iframe" id="video_play_icon"><img  src="<?php echo CLOUD_IMG_PATH;?>images/play_icon.png" alt="" /> Watch How to Use</a>
                    	<div class="text table">
                        
                        	<div class="table-cell">

                                <h2>Get Started</h2>
                                
                                <p>The revolutionary, new Kenstar Oxy Fryer uses only hot air for cooking. As a result food stays tasty and crispy. Just the way you always like it.</p>
                                
                                <img src="<?php echo CLOUD_IMG_PATH;?>images/process_image.png" alt="" />
                            
                            </div>
                        
                        </div>
                    
                    </div>
                    <img id="pauseplayer" style="position:absolute; top:87%; left:1%; display:none;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/pause.png" alt="" />
                    <img id="playplayer" style="position:absolute; top:42%; left:45%; display:none;" src="<?php echo CLOUD_IMG_PATH;?>images/play_icon.png" alt="" />
                    <div id="player" style="display:none;"></div>
				</div>
				<!--  End how to use box -->
                
				<!--  Start delicious box -->
				<div class="deliciousBox" id="recipes">
                
                	<div class="inner-width">
    
                        <ul>
                            <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>recipe#type=1_cat=1"><img src="<?php echo CLOUD_IMG_PATH;?>images/img01.jpg" alt="" /></a></li>
                            <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>recipe#type=1_cat=2"><img src="<?php echo CLOUD_IMG_PATH;?>images/banner4_01.1.png" alt="" /></a></li>
                            <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>recipe#type=0_cat=3"><img src="<?php echo CLOUD_IMG_PATH;?>images/img03.jpg" alt="" /></a></li>
                        </ul>
                        
                        <h2><span>100 delicious recipes</span></h2>
    
                        <ul>
                            <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>recipe#type=2_cat=1"><img src="<?php echo CLOUD_IMG_PATH;?>images/img04.jpg" alt="" /></a></li>
                            <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>recipe#type=2_cat=2"><img src="<?php echo CLOUD_IMG_PATH;?>images/banner4_02.1.png" alt="" /></a></li>
                            <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>recipe#videoRecipe"><img src="<?php echo CLOUD_IMG_PATH;?>images/img06.png" alt="" /></a></li>
                        </ul>
                        
                    </div>

				</div>
				<!--  End delicious box -->
                
				<!--  Start temperature box -->
				<div class="temperatureBox">
                
                    <div class="flexslider1">
                        <ul class="slides">
                            <li>
                            	<img src="<?php echo CLOUD_IMG_PATH;?>images/bg4_1.jpg" alt="" />
                                            
                                <div class="inner-width">
                                
                                    <div class="text">
                
                                        <h2>Large Food Basket</h2>
                                        
                                        <p>A food basket with a large capacity of 3 liters helps you fry large portions of food with absolute ease.</p>
                                        
                                        <a href="<?php echo Yii::app()->getHomeUrl(); ?>features/" >Know More</a>
                                        
                                    </div>
                                
                                </div>

                            </li>
                            <li>
                            	<img src="<?php echo CLOUD_IMG_PATH;?>images/bg4_2.jpg" alt="" />
                                            
                                <div class="inner-width">
                                
                                    <div class="text">
                
                                        <h2>Smart Functions</h2>
										<p>Make your life smarter! The Dual Indicator in Oxy Fryer is the smart feature that keeps you alarmed when switched on as well as while on heating mode. In addition, the device features a smart sensor that stops working when Food basket is Open.</p>
                                        
                                        <a href="<?php echo Yii::app()->getHomeUrl(); ?>features/">Know More</a>
                                        
                                    </div>
                                
                                </div>
                            </li>
                            <li>
                            	<img src="<?php echo CLOUD_IMG_PATH;?>images/bg4_3.jpg" alt="" />
                                            
                                <div class="inner-width">
                                
                                    <div class="text">
										<h2>Wide Temperature Range</h2>
                                        <p>Cook your favorite delicacies at the right temperature. The new Oxy Fryer brings along a smart feature to play around with all possible temperatures.</p>
                                        
                                        <a href="<?php echo Yii::app()->getHomeUrl(); ?>features/" >Know More</a>
                                        
                                    </div>
                                
                                </div>
                            </li>
                        </ul>
                    </div>
                
				</div>
				<!--  End temperature box -->
                
				<!--  Start buy box -->
				<div class="buyBox">

					<p>Exclusively available on <span>flipcart</span><a href="http://www.flipkart.com/kenstar-of-koa15cj3-3-l-air-fryer/p/itmeyfsb7x3trgb3?pid=ECKEYFS8YQZHVBHG" target="_blank">BUY NOW</a></p>

				</div>
				<!--  End buy box -->
                
				<!--  Start app box -->
				<div class="appBox">
                
                	<div class="inner-width">
                    
                        <div class="text">
    
                            <p>Get the power of 100 recipes in your hand with fast and powerful Oxy Fryer mobile App.</p>
                            
                            <a href="https://itunes.apple.com/in/app/oxy-fryer/id927368813?ls=1&mt=8" class="app" target="_blank"><img src="<?php echo CLOUD_IMG_PATH;?>images/appStore.png" alt="" /></a>
                            
                            <a href="https://play.google.com/store/apps/details?id=com.videocon" target="_blank"><img src="<?php echo CLOUD_IMG_PATH;?>images/google_plus.png" alt="" /></a>
                        
                        </div>
                    
                    </div>

				</div>
				<!--  End app box -->
                
				<!--  Start about box -->
				<div class="aboutBox" id="about">
                
                	<div class="text inner-width">

                        <p>Our motto is to bring healthy and convenient lifestyle products that can add more happiness & joy in your lives. Because, 'We Love You'. <br/><a target="_blank" href="http://www.kenstar-appliances.com/">Know More</a> about Kenstar.</p>
  <?php
 $recipeUrl = Yii::app()->createAbsoluteUrl(Yii::app()->request->url);
$recipeTitle = 'Try this awesome Oxy Fryer for oil free frying. ';
$fbShareURL = 'https://www.facebook.com/kenstarindia';
$gplusShareURL = 'https://plus.google.com/u/0/107696443375900506990/posts';
$twitterShareURL = 'https://twitter.com/kenstarindia';
$youTubeUrl = 'http://www.youtube.com/user/kenstarindia';  
?>
                        <ul>
                            <li><a class="fb" href="<?php echo $fbShareURL; ?>" target="_blank">Facebook</a></li>
                            <li><a class="twitter" href="<?php echo $twitterShareURL; ?>" target="_blank">twitter</a></li>
                            <li><a class="youtube" href="<?php echo $youTubeUrl; ?>" target="_blank">youtube</a></li>
                            <li><a class="google" href="<?php echo $gplusShareURL; ?>" target="_blank">google</a></li>
                        </ul>
                    
                    </div>

				</div>
				<!--  End about box -->
                
			</div>
			<!--  End center container -->
			
		</div>
		<!--  End content container -->
<div class="scroll_bottom_btn">
 
 <a href="#"><img src="<?php echo CLOUD_IMG_PATH;?>images/arrow_bottom.png" alt="Scroll" title="Scroll"></a>
 <!--<img src="/images/scroll_bottom_btn.png" alt="Scroll" title="Scroll">-->
</div>

<div class="scroll_top_btn">
 
 <a href="#"><img src="<?php echo CLOUD_IMG_PATH;?>images/arrow_top.png" alt="Scroll" title="Scroll"></a>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){ $('a#float-promotion').show(400); }, 30000);
        setTimeout(function(){ $('#promotion-close').show(400); }, 30000);
    });
</script>