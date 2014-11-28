<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* @var $this SiteController */

$this->pageTitle='FAQ - '.Yii::app()->name ;
?>
<script type="text/javascript" src="js/jquery.localscroll-1.2.7-min.js"></script>
<!--  Start content container -->
		<div id="contentCntr" class="contentbg">
				
                <div class="listingWrap">
                <!--  Start Filter container -->
              <div class="filterwrap inner-width queryhead">
				<div class="faqsearch"> 
                <input type="text" />
                <input type="submit" value="" />
                </div>
                
                <div class="clear"></div>
                </div>
                <!--  End Filter container -->
                
                
                
                
                
                     
                
                </div>
           
                <div class="inner-width">
                <div class="faq-wrap" id="faqcontent">
					<?php //$this->renderPartial('/faq/_faqajax', array('data'=>123)); ?>
<!--               	<div class="faqcontent" >
                <h4>What happens if the recipes rejects?</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
                  	<div class="faqcontent">
                <h4>Will my email address stored permanently?</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
                  	<div class="faqcontent">
                <h4>Is my email keep confidential?</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
                  	<div class="faqcontent">
                <h4>Do i need to update my information?</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>-->
                </div>
                <div class="sidebar">
                <div class="productbtn"><a href="#">Product</a></div>
                 <div class="foodbtn"><a href="#">Food</a></div>
				 <?php
//				 echo CHtml::ajaxSubmitButton('Food',Yii::app()->createUrl('faq/loadData'),
//                    array(
//                        'type'=>'POST',
//                        'data'=> 'js:{"data": 2}',                        
//                        'success'=>'js:function(string){ alert(string); $("#faqcontent").html(string); }'           
//                    ),array('class'=>'productbtn',));
				echo CHtml::ajaxButton ("Food",
                              CController::createUrl('faq/loadData'), 
                              array('update' => '#faqcontent'));
				 ?>
                 <p>Explore Oxy Fryer</p>
                 <div class="usermanual">Download User Manual</div>
                 <p>Can’t find the solution for
your Query</p>
                <div class="foodbtn"><a href="<?php echo Yii::app()->getHomeUrl(); ?>query">Submit it now</a></div>
                <p>Feel free to call us<br/>
				0120 – 3832901</p>
                
                </div>
                 <div class="clear"></div>
                </div>  
          

			
		</div>
      
		<!--  End content container -->