<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* @var $this SiteController */

$this->pageTitle='FAQ - '.Yii::app()->name ;
?>

<!--<script type="text/javascript" src="js/jquery.localscroll-1.2.7-min.js"></script>-->
<!--  Start content container -->
		<div id="contentCntr" class="contentbg contentfaq">
				
                <div class="listingWrap">
                <!--  Start Filter container -->
				<input type="hidden" id="selected_category" name="selected_tab" value="2" />
              <div class="filterwrap inner-width queryhead">
				<div class="faqsearch"> 
					<input type="text" id="search_text" placeholder="Search FAQ" />
<!--					<input type="submit" value="" />-->
					<?php
					echo CHtml::ajaxSubmitButton('',Yii::app()->createUrl('index.php/faq/loadsearchData'),
                    array(
                        'type'=>'POST',
						'beforeSend'=>'function(){loader.begin();
						}',
                        'data'=> 'js:{"data": document.getElementById("search_text").value'
						. ', "category" : document.getElementById("selected_category").value}',  
						'update' => '#faqcontent',
						'complete' => 'function() {makefirst_open();loader.stop();}'
                    ),array('class'=>'','id'=>'search_sbt_btn'));
					?>
                </div>
         <div class="faq-info"><img src="<?php echo Yii::app()->getBaseUrl(); ?>/images/information_icon_faq.png" /> </div> 
                <div class="clear"></div>
                </div>
                <!--  End Filter container -->
                     
                
                </div>
           
                <div class="inner-width">
                <div class="faq-wrap" id="faqcontent">
					
					<?php $this->renderPartial('_faqajax', array('data'=>$data)); ?>
                </div>
                <div class="sidebar">
				 <?php
				 echo CHtml::ajaxSubmitButton('Product FAQs',Yii::app()->createUrl('faq/loadData'),
                    array(
                        'type'=>'POST',
						'beforeSend'=>'function(){loader.begin();
						}',
                        'data'=> 'js:{"data": 2}',  
						'update' => '#faqcontent',
						
						'complete' => 'function() {
							$("#prod_id").removeClass("foodbtn");'
						. '$("#prod_id").addClass("productbtn"); '
						//. '$("#food_btn_id").removeClass("foodbtn");'
						.'$("#food_btn_id").removeClass("productbtn");'
						. '$("#food_btn_id").addClass("foodbtn");
						   $("#selected_category").val("2");
						    $("#search_text").val("");
							makefirst_open();
							loader.stop();
							
							}'
                    ),array('class'=>'productbtn','id'=>'prod_id'));
				 
				 echo CHtml::ajaxSubmitButton('Food FAQs',Yii::app()->createUrl('faq/loadData'),
                    array(
                        'type'=>'POST',
						'beforeSend'=>'function(){loader.begin();
						}',
                        'data'=> 'js:{"data": 3}',  
						'update' => '#faqcontent',
						'complete' => 'function() {
							$("#food_btn_id").removeClass("foodbtn");'
						. '$("#food_btn_id").addClass("productbtn"); '
						. '$("#prod_id").removeClass("productbtn");'
						. '$("#prod_id").addClass("foodbtn");
							 $("#selected_category").val("3");
							  $("#search_text").val("");
							  makefirst_open();
							  loader.stop();
							}'
                    ),array('class'=>'foodbtn','id'=>'food_btn_id'));
				 
				 
				 
//				echo CHtml::ajaxButton ("Food",
//                              CController::createUrl('faq/loadData'), 
//                              array('update' => '#faqcontent'));
				 ?>
                 <p>Explore Oxy Fryer</p>
                 <a style="text-decoration:none" target="_blank" href="<?php echo Yii::app()->getBaseUrl().'/manual.pdf'; ?>"><div class="usermanual">Download User Manual</div></a>
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
		<script type="text/javascript">
		$('#search_text').keyup(function(event){
		if ( event.which == 13 ) {
			var category = document.getElementById("selected_category").value;
			var data = document.getElementById("search_text").value;
			loader.begin();
			dataString = '&category=' + category + '&data=' + data;
			$.ajax({
				type: "POST",
				url: "faq/loadsearchData",
				data: dataString,
				datatype: 'html',
				success: function(data)
				{
					$('#faqcontent').html(data);
					makefirst_open();
					loader.stop();
				}
			});

    }
});


/* faq accordian function */
makefirst_open();

function makefirst_open(){
	$('.faqcontent p').stop().slideUp(300);
	$('.faqcontent h4').removeClass('active');
	$('.faqcontent:first p').stop().slideDown(300);
	$('.faqcontent:first h4').addClass('active');
}

$('.faqcontent h4').live('click', function(){
	$('.faqcontent p').stop().slideUp(300);
	$('.faqcontent h4').removeClass('active');
	$(this).siblings('p').stop().slideDown(300);
	$(this).addClass('active');
});
</script>