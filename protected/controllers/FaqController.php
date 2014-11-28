<?php

class FaqController extends Controller
{
	
	
	public function actionLoadData() {
		//echo 'er';die('23');
		if(isset($_REQUEST['data'])){
			$type = $_REQUEST['data'];
		}
		//$type = 2;	
		//$type = ($type==1) ? 1 : 2; 
		$model = new VdFaq();
		$fetchData = $model->fetchFaqData($type);
		//echo $type;
		//print_r($fetchData);
		$this->renderPartial('_faqajax', array(
            'data' => $fetchData,
            'model'  => $model
        ));
		
	}
	
	public function actionIndex(){
		$model = new VdFaq();
		//$faqData = $model->fetchFaqAllData();
		$type = 2;
		$faqData = $model->fetchFaqData($type);
		//$this->renderPartial('_faqajax', array('data'=>$faqData));
		$this->render('faq', array('data'=>$faqData));
		
	}
	
	public function actionLoadsearchData() {
		if(isset($_REQUEST['data']) && isset($_REQUEST['category'])){
			$data = trim($_REQUEST['data']);
			$category = trim($_REQUEST['category']);
		} 
		$model = new VdFaq();
		$fetchData = $model->fetchFaqSearchData($data, $category);
		$this->renderPartial('_faqajax', array(
            'data' => $fetchData,
            'model'  => $model
        ));
		
	}
}