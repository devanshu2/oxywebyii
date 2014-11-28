<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* @var $this SiteController  */

$this->pageTitle='Apps - '.Yii::app()->name ;
?>
<!--  Start content container -->
		<div id="contentCntr" class="contentspec">
				
                
           
<!--                <div class="inner-width" style="padding:50px 0">
					
					<div style="text-align:center; margin: auto; width:50%">
						<p style="padding-right: 30%; font-weight:bold">Apps for iOS & Android Devices</p><br />
						<a style="float: left" href="https://itunes.apple.com/en/app/apple-store/id375380948?mt=8" target="_blank">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/appStore.png" />
						</a>
						<a style="float: left; margin: 0 0 0 50px" href="https://play.google.com/store/apps/details?id=com.videocon" target="_blank">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/google_plus.png" />
						</a>
						
					</div> 

                <div class="clear"></div>
                </div>
                 <div class="clear"></div>
                </div>  -->

				<div class="appBox">
                
                	<div class="inner-width">
                    
                        <div class="text">
    
                            <p>Get the power of 100 recipes in your hand with fast and powerful Oxy Fryer mobile App.</p>
                            
                            <a href="https://itunes.apple.com/in/app/oxy-fryer/id927368813?ls=1&mt=8" class="app" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/appStore.png" alt="" /></a>
                            
                            <a href="https://play.google.com/store/apps/details?id=com.videocon" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/google_plus.png" alt="" /></a>
                        
                        </div>
                    
                    </div>

				</div>
          

			
		</div>
      
		<!--  End content container -->
	
		<script type="text/javascript">
		
		function getMobileOperatingSystem() {
			var userAgent = navigator.userAgent || navigator.vendor || window.opera;

			if( userAgent.match( /iPad/i ) || userAgent.match( /iPhone/i ) || userAgent.match( /iPod/i ) )
			{
			  return 'iOS';

			}
			else if( userAgent.match( /Android/i ) )
			{

			  return 'Android';
			}
			else
			{
			  return 'unknown';
			}
	   }
		var device = getMobileOperatingSystem();
		if(device == 'iOS') {
			window.location = 'https://itunes.apple.com/in/app/oxy-fryer/id927368813?ls=1&mt=8';
		}
		else if(device == 'Android') {
			window.location = 'https://play.google.com/store/apps/details?id=com.videocon';
		} else {
			//window.location = 'https://play.google.com/store/apps/details?id=com.videocon';
		}
		</script>