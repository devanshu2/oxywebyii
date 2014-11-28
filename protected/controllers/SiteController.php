<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		Yii::app()->clientScript->registerMetaTag('The revolutionary, new Kenstar Oxy Fryer uses only hot air for cooking. As a result food stays tasty and crispy. Just the way you always like it.', 'description');
		$this->render('index');
		/*
		if($param=='oxyfryer-benefits') {
			$param = 'benefits';
		}
		if($param=='how-to-use-oxyfryer') {
			$param = 'howtouse';
		}
		if($param=='oxyfryer-recipes') {
			$param = 'recipes';
		}
		if($param=='about-us') {
			$param = 'about';
		}
		$this->render('index',array('divId'=>$param)); 
		*/
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout = '//layouts/column2_admin';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				//$this->redirect(Yii::app()->user->returnUrl);
				//echo Yii::app()->basePath;die();
				$this->redirect(array('admin/admin'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		//$this->redirect(Yii::app()->homeUrl);
		$this->redirect(array('admin/index'));
	}
	
	public function actionFaq(){
		$model = new VdFaq();
		$faqData = $model->fetchFaqAllData();
		//$this->renderPartial('/faq/_faqajax', array('data'=>$faqData));
		$this->render('faq');
	}
	
	public function actionQuery(){
		$this->render('query');
	}
	
	public function actionRecipeDetail(){
		$this->render('recipe_detail');
	}
	
	public function actionRecipes(){
		$this->render('recipes');
	}
	
	public function actionfeatures(){
		$this->render('features');
	}
	
	public function actionspecifications(){
		$this->render('specifications');
	}
	
	public function actionterms(){
		$this->render('terms');
	}
	
	public function actionapp(){
		$this->render('app');
	}
	public function actionapps(){
		$this->render('app');
	}
}
