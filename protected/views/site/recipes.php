<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->pageTitle='Recipe - '.Yii::app()->name ;

?>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.switchButton.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
		$('#basic.typeon input').switchButton();
		$("#labels.typeon input").switchButton({
          on_label: 'on',
          off_label: 'off'
        });
	});
	</script>
<!--  Start content container -->
		<div id="contentCntr" class="contentbg">
				
                <div class="listingWrap">
                <!--  Start Filter container -->
                <div class="filterwrap inner-width">
                <h2>Discover the recipes of mouth watering dishes</h2>
                <div class="filter-right">
                <ul>
                <li> <div class="filter clearfix">
               <span>Filter</span>
               <a href="#" id="fliterjs"><img src="images/filter-icon.png" alt="" /></a>
               </div></li>
               <li>
               <div class="search"><input type="submit" id="searchbtn" value="">
               <input type="text" class="searchbox" />
               
               </div></li>
                </ul>
                        
                
              
                </div>
                <div class="clear"></div>
                </div>
                <!--  End Filter container -->
                
                <div id="filter-wrapper">
                   <div class="inner-width">
                   <div class="filterbox">
                   <div class="filtertype type">
                   <h3>Type</h3>
                    <ul><li><input type="checkbox" /><label>All</label></li></ul>
      				 <div class="typeon" id="basic">
       				 <input type="checkbox" value="1" checked>
     				 </div>
                   </div>
                   <div class="filtertype categories">
                   <h3>Categories</h3>
                   <ul class="clearfix"><li><input type="checkbox" /><label>All</label></li><li><input type="checkbox" /><label>Snacks & Starters</label></li></ul>
                   <ul><li><input type="checkbox" /><label>Deserts</label></li><li><input type="checkbox" /><label>Meal / High Tea</label></li></ul>
                   </div>
                   <div class="filtertype cookingtime">
                   <h3>Cooking Time</h3>
                   <ul class="clearfix"><li><input type="checkbox" /><label>&lt; 10</label></li><li><input type="checkbox" /><label>10-20 min</label></li></ul>
                   <ul><li><input type="checkbox" /><label>&gt; 30 min</label></li></ul>
                   </div>
                   <div class="clear"></div>
                   </div>
                   </div>
                </div>
     
                
                <div class="recipeList inner-width">
                <ul>
                    <li>
                        <div class="text">
                            <a href="#"><img src="images/smosam.jpg" alt="" /></a>
                            <div class="recipe-name">
                                <span>Samosa</span>
                                <p>Preparation Time : 10-12 minutes</p>
                            </div>
                        </div>
                    
                    </li>
                    <li>
                        <div class="text">
                            <a href="#"><img src="images/chicken-lolipopo.jpg" alt="" /></a>
                            <div class="recipe-name">
                                <span>Samosa</span>
                                <p>Preparation Time : 10-12 minutes</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="text">
                            <a href="#"><img src="images/chicken2.jpg" alt="" /></a>
                            <div class="recipe-name">
                                <span>Samosa</span>
                                <p>Preparation Time : 10-12 minutes</p>
                            </div>
                        </div>
                    
                    </li>
                    <li>
                        <div class="text">
                            <a href="#"><img src="images/smosam.jpg" alt="" /></a>
                            <div class="recipe-name">
                                <span>Samosa</span>
                                <p>Preparation Time : 10-12 minutes</p>
                            </div>
                        </div>
                    
                    </li>
                    <li>
                        <div class="text">
                            <a href="#"><img src="images/chicken-lolipopo.jpg" alt="" /></a>
                            <div class="recipe-name">
                                <span>Samosa</span>
                                <p>Preparation Time : 10-12 minutes</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="text">
                            <a href="#"><img src="images/chicken2.jpg" alt="" /></a>
                            <div class="recipe-name">
                                <span>Samosa</span>
                                <p>Preparation Time : 10-12 minutes</p>
                            </div>
                        </div>
                    
                    </li>
                </ul>
                 <div class="clear"></div>
                 
                 
                 
                 
  
                </div>
                     
                
                </div>
           
                
          

			
		</div>
		<!--  End content container -->