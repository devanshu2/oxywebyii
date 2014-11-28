<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class WebserviceController extends Controller
{
	
	public function actionIndex() {
		die();
	}
	
	protected function beforeAction($action) {		
            $tokens = array('442d3d2e505d4a643e4f6a772f', '142d3a2e50fd9a643e0f8a7c2f');
		if(!isset($_SERVER['HTTP_API_TOKEN'])) {
			$responseArr = array();
			$responseArr['ErrorCode'] = 1;
			$responseArr['ErrorMessage'] = 'Invalid Access. Please provide token.';
			echo json_encode($responseArr);
			exit;
		}
                else if(!in_array($_SERVER['HTTP_API_TOKEN'], $tokens)) {
			$responseArr = array();
			$responseArr['ErrorCode'] = 1;
			$responseArr['ErrorMessage'] = 'Invalid Access tokens. '.$_SERVER['HTTP_API_TOKEN'];
			echo json_encode($responseArr);
			exit;
		}
                if($_SERVER['HTTP_API_TOKEN'] == '142d3a2e50fd9a643e0f8a7c2f'){
                    $calledAction = end(explode('/', $_SERVER['REQUEST_URI']));
                    if(($calledAction != 'sendFaqEmail') && ($calledAction != 'uploadRecipe')){
                        $responseArr = array();
                        $responseArr['ErrorCode'] = 1;
                        $responseArr['ErrorMessage'] = 'Invalid Access tokens. for '.$calledAction.' == '.$_SERVER['HTTP_API_TOKEN'];
                        echo json_encode($responseArr);
                        exit;
                    }
                }              
                
			return true;
		
	}
	
	public function actiongetFAQListing() {
		$faqData = VdFaq::model()->findAll(array("select"=>"faq_id, faq_question,faq_answer,faq_category", 
			'order'=>'faq_modified_on desc'));
		$responseArr = array();
		if($faqData) {
			$finalArray = array();
			$responseArr['ErrorCode'] = 0;
			$responseArr['ErrorMessage'] = 'Success';
			foreach ($faqData as $faq) {
				$tempArray = array();
				$question = isset($faq['faq_question']) ? trim($faq['faq_question']) : '';
				$answer = isset($faq['faq_answer']) ? trim($faq['faq_answer']) : '';
				$category = isset($faq['faq_category']) ? intval($faq['faq_category']) : '';
				$tempArray['faq_question'] = $question;
				$tempArray['faq_answer'] = $answer;
				$tempArray['faq_category'] = $category;
				array_push($finalArray, $tempArray);
			}
			$responseArr['Data'] = $finalArray;
		} else {
			$responseArr['ErrorCode'] = 1;
			$responseArr['ErrorMessage'] = 'No Data Found.';
		}
		echo json_encode($responseArr);
	}
	
	public function actiongetRecipeListing() {
		$criteria = new CDbCriteria();
		$criteria->addCondition("rp_deleted=:deleted");
		$criteria->params = array(':deleted' => '0');
		$recipieData = VdRecipies::model()->findAll($criteria);
		//$recipieData = VdRecipies::model()->findAll();
		$responseArr = array();
		if($recipieData) {
			$responseArr['ErrorCode'] = 0;
			$responseArr['ErrorMessage'] = 'Success';
			$finalArray = array();
			foreach ($recipieData as $recipie) {
				$tempArray = array();
				$id = isset($recipie['rp_id']) ? intval($recipie['rp_id']) : '';
				$name = isset($recipie['rp_name']) ? trim($recipie['rp_name']) : '';
				$modifiedOn = isset($recipie['rp_modified_on']) ? trim($recipie['rp_modified_on']) : '';
				$videoURL = isset($recipie['rp_youtube_url']) ? trim($recipie['rp_youtube_url']) : '';
				$imageURL = isset($recipie['rp_image_url']) ? trim($recipie['rp_image_url']) : '';
				$minCookingTime = isset($recipie['rp_min_cook_time']) ? intval($recipie['rp_min_cook_time']) : '';
				$maxCookingTime = isset($recipie['rp_max_cook_time']) ? intval($recipie['rp_max_cook_time']) : '';
				$minPreparationTime = isset($recipie['rp_min_preparation_time']) ? intval($recipie['rp_min_preparation_time']) : '';
				$maxPreparationTime = isset($recipie['rp_max_preparation_time']) ? intval($recipie['rp_max_preparation_time']) : '';
				$recipieQuantity = isset($recipie['rp_quantity']) ? intval($recipie['rp_quantity']) : '';
				$recipieType = isset($recipie['rp_type']) ? intval($recipie['rp_type']) : '';
				$recipieCat = isset($recipie['rp_category']) ? intval($recipie['rp_category']) : '';
				$recipieTemprature = isset($recipie['rp_temprature']) ? trim($recipie['rp_temprature']) : '';
				$tempArray['rp_id'] = $id;
				$tempArray['rp_name'] = $name;
				$tempArray['rp_modified_on'] = $modifiedOn;
				$tempArray['rp_youtube_url'] = $videoURL;
				//$tempArray['rp_image_url'] = Yii::app()->getBaseUrl(true).'/images/recipe/mobile/'.$imageURL;
                                $tempArray['rp_image_url'] = '';
                                if(file_exists(MAIN_BASE_PATH.'/images/recipe/mobile/'.$imageURL)){
                                    $tempArray['rp_image_url'] = Yii::app()->getBaseUrl(true).'/images/recipe/mobile/'.$imageURL;
                                }
                                else if(file_exists(MAIN_BASE_PATH.'/images/recipe/'.$imageURL)){
                                    $tempArray['rp_image_url'] = Yii::app()->getBaseUrl(true).'/images/recipe/'.$imageURL;
                                }
				$tempArray['rp_min_cook_time'] = $minCookingTime;
				$tempArray['rp_max_cook_time'] = $maxCookingTime;
				$tempArray['rp_min_preparation_time'] = $minPreparationTime;
				$tempArray['rp_max_preparation_time'] = $maxPreparationTime;
				$tempArray['rp_quantity'] = $recipieQuantity;
				$tempArray['rp_type'] = $recipieType;
				$tempArray['rp_category'] = $recipieCat;
				$tempArray['rp_temprature'] = $recipieTemprature;
				array_push($finalArray, $tempArray);
			}
			$responseArr['Data'] = $finalArray;
		} else {
			$responseArr['ErrorCode'] = 1;
			$responseArr['ErrorMessage'] = 'No Data Found.';
		}
		echo json_encode($responseArr);
	}
	
	public function actiongetRecipeDetail() {
		$responseArr = array();
		if(isset($_REQUEST['recipeID'])) {
			$id = intval($_REQUEST['recipeID']);
			$recipie = VdRecipies::model()->findByPk($id);
			
			if($recipie) {
				$responseArr['ErrorCode'] = 0;
				$responseArr['ErrorMessage'] = 'Success';
				$tempArray = array();
				$id = isset($recipie['rp_id']) ? intval($recipie['rp_id']) : '';
				$name = isset($recipie['rp_name']) ? trim($recipie['rp_name']) : '';
				$modifiedOn = isset($recipie['rp_modified_on']) ? trim($recipie['rp_modified_on']) : '';
				$videoURL = isset($recipie['rp_youtube_url']) ? trim($recipie['rp_youtube_url']) : '';
				$imageURL = isset($recipie['rp_image_url']) ? trim($recipie['rp_image_url']) : '';
				$minCookingTime = isset($recipie['rp_min_cook_time']) ? intval($recipie['rp_min_cook_time']) : '';
				$maxCookingTime = isset($recipie['rp_max_cook_time']) ? intval($recipie['rp_max_cook_time']) : '';
				$minPreparationTime = isset($recipie['rp_min_preparation_time']) ? intval($recipie['rp_min_preparation_time']) : '';
				$maxPreparationTime = isset($recipie['rp_max_preparation_time']) ? intval($recipie['rp_max_preparation_time']) : '';
				$recipieQuantity = isset($recipie['rp_quantity']) ? intval($recipie['rp_quantity']) : '';
				$recipieType = isset($recipie['rp_type']) ? intval($recipie['rp_type']) : '';
				$recipieCat = isset($recipie['rp_category']) ? intval($recipie['rp_category']) : '';
				$recipieIngredients = isset($recipie['rp_ingredients']) ? trim($recipie['rp_ingredients']) : '';
				$recipieDescription = isset($recipie['rp_description']) ? trim($recipie['rp_description']) : '';
				$recipieTemprature = isset($recipie['rp_temprature']) ? trim($recipie['rp_temprature']) : '';
				$tempArray['rp_id'] = $id;
				$tempArray['rp_name'] = $name;
				$tempArray['rp_modified_on'] = $modifiedOn;
				$tempArray['rp_youtube_url'] = $videoURL;
				$tempArray['rp_image_url'] = '';
                                if(file_exists(MAIN_BASE_PATH.'/images/recipe/mobile/'.$imageURL)){
                                    $tempArray['rp_image_url'] = Yii::app()->getBaseUrl(true).'/images/recipe/mobile/'.$imageURL;
                                }
                                else if(file_exists(MAIN_BASE_PATH.'/images/recipe/'.$imageURL)){
                                    $tempArray['rp_image_url'] = Yii::app()->getBaseUrl(true).'/images/recipe/'.$imageURL;
                                }
				$tempArray['rp_min_cook_time'] = $minCookingTime;
				$tempArray['rp_max_cook_time'] = $maxCookingTime;
				$tempArray['rp_min_preparation_time'] = $minPreparationTime;
				$tempArray['rp_max_preparation_time'] = $maxPreparationTime;
				$tempArray['rp_quantity'] = $recipieQuantity;
				$tempArray['rp_type'] = $recipieType;
				$tempArray['rp_category'] = $recipieCat;
				$tempArray['rp_ingredients'] = $recipieIngredients;
				$tempArray['rp_description'] = $recipieDescription;
				$tempArray['rp_temprature'] = $recipieTemprature;
				$responseArr['Data'] = $tempArray;
			} else {
				$responseArr['ErrorCode'] = 1;
				$responseArr['ErrorMessage'] = 'No Data Found.';
			}
		} else {
			$responseArr['ErrorCode'] = 1;
			$responseArr['ErrorMessage'] = 'Invalid Parameters.';
		}
		echo json_encode($responseArr);
	}
	
	public function actionsendFaqEmail() {
            $responseArr = array();
            $postData = $_POST;
            $data = file_get_contents("php://input");
            $otherData = json_decode($data,true);
            if(!empty($otherData) && $otherData['userEmail'] != ''){
                $postData = $otherData;
            }
		$responseArr['ErrorCode'] = 0;
		
		if(isset($postData['userEmail'])) {
			//$postData = CJSON::decode($postData);
			$userName = isset($postData['userName']) ? trim($postData['userName']) : '';
			$userEmail = isset($postData['userEmail']) ? trim($postData['userEmail']) : '';
			$userMessage = isset($postData['userMessage']) ? trim($postData['userMessage']) : '';
			$userPhone = isset($postData['userPhone']) ? trim($postData['userPhone']) : '';
			if($userName && $userEmail && $userMessage) {
				//$this->sendEmail($userName, $userEmail, $userMessage);
				$return = CommonFunctions::sendFaqEmail($userName, $userEmail, $userMessage, $userPhone);
                                $return = $return ? 0 : 1;
                                $responseArr['ErrorCode'] = $return;
				$responseArr['ErrorMessage'] = $return ? 'Please try after a while.' : 'Success.';
			} else {
				$responseArr['ErrorCode'] = 1;
				$responseArr['ErrorMessage'] = 'Invalid Parameters.';
			}
		} else {
			$responseArr['ErrorCode'] = 1;
			$responseArr['ErrorMessage'] = 'Invalid Request';
		}
		echo json_encode($responseArr);
	}
	
	//For Registration
	public function actionregistration() { 
		/*
		//////////////commented by harish (date 18th Oct 2014)//////////////////////
		$postData = $_REQUEST;
                if(!isset($postData['deviceToken'])) {
                    $postData = json_decode(file_get_contents("php://input"), true);
                }
		$responseArr = array();
		$responseArr['ErrorCode'] = 0;
		if(isset($postData['deviceToken'])) {
			$saveData = array();
			$saveData['deviceTagstrip'] = isset($postData['deviceTagstrip']) ? trim($postData['deviceTagstrip']) : '';
			$saveData['deviceToken'] = isset($postData['deviceToken']) ? trim($postData['deviceToken']) : '';
			$saveData['platform'] = isset($postData['platform']) ? trim($postData['platform']) : '';
			$saveData['osVersion'] = isset($postData['osVersion']) ? trim($postData['osVersion']) : '';
			$saveData['deviceModel'] = isset($postData['deviceModel']) ? trim($postData['deviceModel']) : '';
			$model = new VdDevices();
			//$ifExists = $model->fetchDeviceData($saveData['deviceToken'],$saveData['platform']);
			$ifExists = $model->fetchDeviceDataByTagstrip($saveData['deviceTagstrip'],$saveData['deviceToken'],$saveData['platform']);
			if(empty($ifExists)) {
				$return = $model->saveDeviceData($saveData);
				$responseArr['ErrorMessage'] = $return ? 'Success.' : 'Please try after a while.';
			} else {
				$return = $model->updateDeviceData($saveData['deviceTagstrip'], $saveData['deviceToken'],$saveData['platform']);
				$responseArr['ErrorMessage'] = $return ? 'Success.' : 'Please try after a while.';
			}
		} else {
			$responseArr['ErrorCode'] = 1;
			$responseArr['ErrorMessage'] = 'Invalid Request';
		}
		echo json_encode($responseArr);*/
		$postData = $_REQUEST;
                if(!isset($postData['deviceToken'])) {
                    $postData = json_decode(file_get_contents("php://input"), true);
                }
		$responseArr = array();
		$responseArr['ErrorCode'] = 0;
		if(isset($postData['deviceToken'])) {
			$saveData = array();
			$saveData['deviceTagstrip'] = isset($postData['deviceTagstrip']) ? trim($postData['deviceTagstrip']) : '';
			$saveData['deviceToken'] = isset($postData['deviceToken']) ? trim($postData['deviceToken']) : '';
			$saveData['platform'] = isset($postData['platform']) ? trim($postData['platform']) : '';
			$saveData['osVersion'] = isset($postData['osVersion']) ? trim($postData['osVersion']) : '';
			$saveData['deviceModel'] = isset($postData['deviceModel']) ? trim($postData['deviceModel']) : '';
			$model = new VdDevices();
			//$ifExists = $model->fetchDeviceData($saveData['deviceToken'],$saveData['platform']);
			$ifExists = $model->fetchDeviceDataByTagAndToken($saveData['deviceTagstrip'],$saveData['deviceToken']);
			if(empty($ifExists)) {
				$return = $model->saveDeviceData($saveData);
				$responseArr['ErrorMessage'] = $return ? 'Success.' : 'Please try after a while.';
			} else {
				$model->deleteByPk($ifExists->device_id);
				$return = $model->saveDeviceData($saveData);
				$responseArr['ErrorMessage'] = $return ? 'Success.' : 'Please try after a while.';
			}
		} else {
			$responseArr['ErrorCode'] = 1;
			$responseArr['ErrorMessage'] = 'Invalid Request';
		}
		echo json_encode($responseArr);

	}

	//For Push notifications
	/* public function actionsendNotification($message = false) {
            if(!$message){
                $message = array("title"=>"Sample title.", "message" => "Sample Message.","rp_id"=>101);
            }
            $model = new VdDevices(); 
            $deviceData = $model->findAll();
            $responseArr = array();
            $responseArr['ErrorCode'] = 0;
            if(!empty($deviceData)) {
                $iosUsers = $androidUsers = array();
                foreach ($deviceData as $device) {
                    if($device['device_platform']=='ios') {
                        $iosUsers[] = $device['device_push_token'];
                    }
                    if($device['device_platform']=='android') {
                        $androidUsers[] = $device['device_push_token'];
                    }
                }
                 //need to change (Notification title and body)
                if(!empty($androidUsers)) {
                    CommonFunctions::sendPushNotifications($androidUsers,$message,'android');
                }
                if(!empty($iosUsers)) {
                    CommonFunctions::sendPushNotifications($iosUsers,$message,'ios');
                }
                $saveData = array();
                $saveData['notification_title'] = $message['title'];
                $saveData['notification_message'] = json_encode($message);
                $saveData['notification_created_by'] = 3; //need to change (admin id or user id who is sending push notifications)
                $model = new VdNotificationLogs();
                $return = $model->saveNotificationData($saveData);
                $responseArr['ErrorMessage'] = $return ? 'Success.' : 'Please try after a while.';
            }
            else {
                $responseArr['ErrorCode'] = 1;
                $responseArr['ErrorMessage'] = 'No device found';
            }
            echo json_encode($responseArr);
	} */
	
	public function actionUploadRecipe() {
            $responseArr = array();
            $data = $_POST;
            $postData = $data;
            if(!isset($_POST['fullName'])){
                $data = file_get_contents("php://input");
                $postData = json_decode($data,true);
            } 
            //var_dump($_POST); exit;
		//$postData = json_decode($data,true);
            if($postData){
                    $fullName = isset($postData['fullName']) ? trim($postData['fullName']) : '';
                    $email = filter_var($postData['email'], FILTER_VALIDATE_EMAIL);
                    $number = isset($postData['number']) ? trim($postData['number']) : '';
                    $dishName = isset($postData['dishName']) ? trim($postData['dishName']) : '';
                    $minCookTime = intval($postData['minCookTime']);
                    $maxCookTime = intval($postData['maxCookTime']);
                    $minPrepTime = isset($postData['minPrepTime']) ? intval($postData['minPrepTime']) : 0;
                    $maxPrepTime = intval($postData['maxPrepTime']);
                    $quantity = isset($postData['quantity']) ? trim($postData['quantity']) : '';
                    $ingredients = isset($postData['ingredients']) ? nl2br(trim($postData['ingredients'])) : '';
                    $howToUse = isset($postData['howToUse']) ? nl2br(trim($postData['howToUse'])) : '';
                    $category = isset($postData['category']) ? trim($postData['category']) : '';
                    $type = isset($postData['type']) ? trim($postData['type']) : '';
                    $image = '';
                    if(isset($postData['image'])){
                        $image = trim($postData['image']);
                    }
                    else{
                        if(isset($_FILES['image']['tmp_name'])){
                            $image = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
                        }
                    }
                    
                    $temprature = isset($postData['temprature']) ? trim($postData['temprature']) : '';
                    $youtubeVideo = isset($postData['youtubeVideo']) ? trim($postData['youtubeVideo']) : '';
                    if(empty($dishName)){
                        $responseArr['ErrorCode'] = 1;
                        $responseArr['ErrorMessage'] = 'Invalid Dish Name';
                        echo json_encode($responseArr);
                        die();
                    }
                    if(empty($temprature)){
                        $responseArr['ErrorCode'] = 1;
                        $responseArr['ErrorMessage'] = 'Invalid Temperature';
                        echo json_encode($responseArr);
                        die();
                    }
                    if(!$category){
                        $responseArr['ErrorCode'] = 1;
                        $responseArr['ErrorMessage'] = 'Invalid Category';
                        echo json_encode($responseArr);
                        die();
                    }
                    if(!$type){
                        $responseArr['ErrorCode'] = 1;
                        $responseArr['ErrorMessage'] = 'Invalid Type';
                        echo json_encode($responseArr);
                        die();
                    }
                    if(!($maxCookTime)){
                        $responseArr['ErrorCode'] = 1;
                        $responseArr['ErrorMessage'] = 'Invalid Maximum Cooking Time';
                        echo json_encode($responseArr);
                        die();
                    }
                    if(!($maxPrepTime)){
                        $responseArr['ErrorCode'] = 1;
                        $responseArr['ErrorMessage'] = 'Invalid Maximum Preparation TIme';
                        echo json_encode($responseArr);
                        die();
                    }
                    
                    if(empty($image)){
                        $responseArr['ErrorCode'] = 1;
                        $responseArr['ErrorMessage'] = 'Invalid Image';
                        echo json_encode($responseArr);
                        die();
                    }
                    if(!empty($youtubeVideo) && !CommonFunctions::validateYoutubeUrl($youtubeVideo)){
                        $responseArr['ErrorCode'] = 1;
                        $responseArr['ErrorMessage'] = 'Invalid Youtube URL';
                        echo json_encode($responseArr);
                        die();
                    }
                    if(empty($ingredients)){
                        $responseArr['ErrorCode'] = 1;
                        $responseArr['ErrorPage'] = 2;
                        $responseArr['ErrorMessage'] = 'Invalid Ingredients';
                        echo json_encode($responseArr);
                        die();
                    }
                    if(empty($howToUse)){
                        $responseArr['ErrorCode'] = 1;
                        $responseArr['ErrorPage'] = 2;
                        $responseArr['ErrorMessage'] = 'Invalid How to Cook';
                        echo json_encode($responseArr);
                        die();
                    }
                    if(empty($fullName)){
                        $responseArr['ErrorCode'] = 1;
                        $responseArr['ErrorPage'] = 3;
                        $responseArr['ErrorMessage'] = 'Invalid Full Name';
                        echo json_encode($responseArr);
                        die();
                    }
                    if(!$email){
                        $responseArr['ErrorCode'] = 1;
                        $responseArr['ErrorPage'] = 3;
                        $responseArr['ErrorMessage'] = 'Invalid Email';
                        echo json_encode($responseArr);
                        die();
                    }
                    if(!empty($dishName) /*&& !empty($minCookTime) && !empty($maxCookTime) && !empty($minPrepTime) 
                            && !empty($maxPrepTime)*/ && !empty($ingredients) && !empty($howToUse)
                            && !empty($fullName) && ($email)  
                            && ($category) && ($type) && !empty($image) && !empty($temprature) && (empty($youtubeVideo) || CommonFunctions::validateYoutubeUrl($youtubeVideo))){
                            $imgName = 'recipe_'.time();
                            $imageString = $image;
                            $uploadImage = CommonFunctions::createImageFromString($imageString, $imgName, 'uploaded');
                            if($uploadImage['ErrorCode'] == '0') {
                                    $ext = $uploadImage['Extension'];
                                    $recipeImageName = $imgName.$ext;
                                    $transaction = Yii::app()->db->beginTransaction();
                                    $user = new VdRecipiesUsers();
                                    $userDetail = $user->createRecipeUser($fullName, $email, $number);
                                    $userId = isset($userDetail['Id']) ? $userDetail['Id'] : '';
                                    $userRecipies = new VdUserRecipies();
                                    $saveRecipe = $userRecipies->saveUserRecipies($dishName, $minCookTime, $maxCookTime, $minPrepTime
                                                    ,$maxPrepTime, $quantity, $ingredients, $howToUse, $userId, $recipeImageName, $category ,$type, htmlentities($temprature), $youtubeVideo);
                                    if($userDetail['ErrorCode'] == '0' && $saveRecipe['ErrorCode'] == '0') {
                                        $transaction->commit();
                                        $return = CommonFunctions::sendUploadRecipeMail($fullName, $email, $dishName);
                                        $return = CommonFunctions::sendUploadRecipeMail($fullName, $email, $dishName, 'user');
                                        $responseArr['ErrorCode'] = 0;
                                        $responseArr['ErrorMessage'] = 'Success.';
                                    } else {
                                        if($userDetail['ErrorCode'] != '0' && $saveRecipe['ErrorCode'] != '0') {                                                
                                            $responseArr['ErrorMessage'] = 'Error While Saving. user = '.$userDetail['ErrorMessage'].' || recipe = '.$saveRecipe['ErrorMessage'];
                                        }
                                        elseif($userDetail['ErrorCode'] != '0') {
                                            $responseArr['ErrorMessage'] = 'Error While Saving. user = '.$userDetail['ErrorMessage'];
                                        }
                                        elseif($saveRecipe['ErrorCode'] != '0') {
                                            $responseArr['ErrorMessage'] = 'Error While Saving. recipe = '.$saveRecipe['ErrorMessage'];
                                        }
                                        $responseArr['ErrorCode'] = 1;
                                        $transaction->rollback();						
                                    }
                            } else {
                                    $responseArr['ErrorCode'] = 1;
                                    $responseArr['ErrorMessage'] = 'Error Uploading Image.';
                            }
                    } else {
                            $responseArr['ErrorCode'] = 1;
                            $responseArr['ErrorMessage'] = 'Invalid Parameters. Some paramters missing.';
                    }
            } else {
                    $responseArr['ErrorCode'] = 1;
                    $responseArr['ErrorMessage'] = 'Invalid Request. Parameters missing.';
            }
            echo json_encode($responseArr);
	}
}

