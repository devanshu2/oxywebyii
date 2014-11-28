
		<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo '<pre>';
//print_r($data);
//$data = array();
		$con = 0;
foreach($data as $faq) {
	$con = 1;
	$faqQuestion = $faq['faq_question'];
$faqAnswer = $faq['faq_answer'];
$faqId = $faq['faq_id'];
$faqCat = $faq['faq_category'];
//die();
	echo '<div class="faqcontent" >
                <h4>'.$faqQuestion.'</h4>
                <p>'.$faqAnswer.'</p>
                </div>';
}
if($con == '0') {
	echo '<div class="faqcontent" >No Matching FAQ found.<br /> Please Search with different criteria.</div>';
}
		?>