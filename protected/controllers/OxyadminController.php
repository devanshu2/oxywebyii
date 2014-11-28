<?php

class OxyadminController extends Controller
{
    public $layout=false;
    
    protected function beforeAction($action){	
       if($this->action->id == 'login'){           
           if(isset(Yii::app()->session['adminuser'])){
               header('location:'.Yii::app()->request->baseUrl.'/oxyadmin/index');
               exit();
           }
       }
       else{
           if(!isset(Yii::app()->session['adminuser'])){
               header('location:'.Yii::app()->request->baseUrl.'/oxyadmin/login?call='.$this->action->id);
               exit();
           }
       }
       return true;
    }
    
    public function actionLogin($param = null){
        if(isset($_POST['loginuser']) && isset($_POST['loginpassword'])){
            $model = new Oxyadmin();
            if($user = $model->tryAdminLogin($_POST['loginuser'], $_POST['loginpassword'])){
                Yii::app()->session['adminuser'] = $user;
                $redirection = 'index';
                if(isset($_POST['redirect']) && strlen($_POST['redirect'])){
                    $redirection = htmlentities($_POST['redirect']);
                }
                $myUrl = Yii::app()->request->baseUrl.'/oxyadmin/'.$redirection;
                header('location:'.$myUrl);
                exit();
            }
        }
        $this->render('login');
    }
    
    public function actionLogout($param = null){
        unset(Yii::app()->session['adminuser']);
        header('location:'.Yii::app()->request->baseUrl.'/oxyadmin/login');
        exit();
    }
    
    public function actionIndex($param = null){
        $this->render('index');
    }
    
    public function actionModerate($id = null){
        if($id == ''){
            $recipieData = (array)  VdUserRecipies::model()->findAll();
            $this->render('recipe_moderate', array('recipes'=>$recipieData));            
            return true;
        }
        else if(intval($id)){
            $moderation_recipe = VdUserRecipies::model()->findByPk(intval($id));
            if($moderation_recipe){
                $this->render('recipe_moderate_edit', array('recipe'=>$moderation_recipe));
                return true;
            }
        }
        header('location:'.Yii::app()->request->baseUrl.'/oxyadmin/moderate');
        exit();      
    }
    
    public function actionRecipe($param = null){
        if($param == ''){
            $recipieData = (array)VdRecipies::model()->findAll();
            $this->render('recipe_all', array('recipes'=>$recipieData));            
            return true;
        }
        elseif($param == 'add'){
            $this->render('recipe_add');
            return true;
        }
        else if(intval($param)){
            $recipe = VdRecipies::model()->findByPk(intval($param));
            if($recipe){
                $this->render('recipe_edit', array('recipe'=>$recipe));
                return true;
            }
        }
        header('location:'.Yii::app()->request->baseUrl.'/oxyadmin/recipe');
        exit();        
    }
    
    public function actionAjax($param = null){
        $responseArr = array();
        if(isset($_POST['send_push_notification'])){
            $message = trim($_POST['message']);
            if(strlen($message)){
                $message = str_replace(" ", "##", $message);
                $data = array("message" => $message);
                $data["rp_id"] = -1;
                if(isset($_POST['rp_id']) && intval($_POST['rp_id'])){
                    $data["rp_id"] = intval($_POST['rp_id']);
                }
                $error = false;
                if(exec("php ".MAIN_BASE_PATH."/notifications.php ".$data["message"]." ".$data["rp_id"]." > test-out.txt & echo $!")){
                    $responseArr['ErrorCode'] = 0;
                    $responseArr['ErrorMessage'] = 'Success';
                } else {
                    $responseArr['ErrorCode'] = 1;
                    $responseArr['ErrorMessage'] = $error;
                }
                echo json_encode($responseArr);
                die();
            }
            $responseArr['ErrorCode'] = 1;
            $responseArr['ErrorMessage'] = 'Invalid Data';
            echo json_encode($responseArr);
            die();
        }
        elseif(isset($_POST["manage_recipe"]) && isset($_POST["recipe_type"]) && isset($_POST['action_type'])){
            $model;
            $image;
            $add_actions = array('add');
            $delete_actions = array('delete', 'reject');
            $edit_actions = array('update', 'edit', 'approve');
            $responseArr = array();
            $recipe_type = $_POST['recipe_type'];
            $action_type = strtolower($_POST['action_type']);
            if($recipe_type == 'normal'){
                if($action_type == 'add'){
                    $model = new VdRecipies();
                }
                else{
                    $model = VdRecipies::model()->findByPk($_POST['rp_id']);
                }
            }
            else {
                $model = VdUserRecipies::model()->findByPk($_POST['rp_id']);
            }
            
            if(!is_object($model)){
                $responseArr['ErrorCode'] = 1;
                $responseArr['ErrorMessage'] = 'Server error.';
                echo json_encode($responseArr);
                die();
            }

            if(in_array($action_type, $delete_actions)){
                $model->rp_id = intval($_POST['rp_id']);
                $old_recipe = $model->getRecipeDetails($model->rp_id);
                $old_image = $old_recipe['rp_image_url'];
                $createdBy = $old_recipe['rp_created_by'];
                $rpName = $old_recipe['rp_name'];
                if(file_exists(MAIN_BASE_PATH.'/images/recipe/'.$old_image)){
                    @unlink(MAIN_BASE_PATH.'/images/recipe/'.$old_image);
                }
                if(file_exists(MAIN_BASE_PATH.'/images/recipe/mobile/'.$old_image)){
                    @unlink(MAIN_BASE_PATH.'/images/recipe/mobile/'.$old_image);
                }
                $model->deleteByPk($model->rp_id);
                $responseArr['ErrorCode'] = 0;
                if($action_type == 'delete'){
                    $responseArr['ErrorMessage'] = 'Recipe deleted successfully.';
                } else {
                    if(!empty($createdBy) && !empty($rpName)) {
                        $VdRecipiesUsers = new VdRecipiesUsers();   
                        $userDetails = $VdRecipiesUsers->getUserDetails($createdBy);
                        $recipeUser = array();
                        foreach($userDetails as $key=>$value){
                            $recipeUser[$key] =  $value;                
                        }
                        CommonFunctions::sendActionMail($recipeUser['full_name'], $recipeUser['email'],$rpName, 'reject');
                    }
                    $responseArr['ErrorMessage'] = 'Recipe rejected successfully.';
                }                
                echo json_encode($responseArr);
                die();
            }
            
            if(!in_array($action_type, $add_actions) && !in_array($action_type, $edit_actions)){
                $responseArr['ErrorCode'] = 1;
                $responseArr['ErrorMessage'] = 'Invalid call.';
                echo json_encode($responseArr);
                die();
            }           
            
            
            $date_string = date('Y-m-d h:i:s');
            
            $model->rp_name = $_POST['rp_name'];
            $model->rp_min_cook_time = $_POST['rp_min_cook_time'];
            $model->rp_max_cook_time = $_POST['rp_max_cook_time'];
            $model->rp_min_preparation_time = $_POST['rp_min_preparation_time'];
            $model->rp_max_preparation_time = $_POST['rp_max_preparation_time'];
            $model->rp_quantity = $_POST['rp_quantity'];
            $model->rp_ingredients = $_POST['rp_ingredients'];
            $model->rp_description = $_POST['rp_description'];            
            $model->rp_modified_on = $date_string;            
            $model->rp_deleted = 0;
            $model->rp_type = $_POST['rp_type'];
            $model->rp_category = $_POST['rp_category'];
            $model->rp_temprature = htmlentities($_POST['rp_temprature']);            
            $model->rp_youtube_url = $_POST['rp_youtube_url'];
            $model->rp_modified_by = 0;
            if(in_array($action_type, $add_actions)){
                $model->rp_created_by = 0;                
                $model->rp_created_on = $date_string;                
            }
            else if(in_array($action_type, $edit_actions)){
                $model->rp_id = $_POST['rp_id'];
            }
            if(isset($_FILES['rp_image_url']['tmp_name'])){
                $image = base64_encode(file_get_contents($_FILES['rp_image_url']['tmp_name']));
                $imgName = 'recipe_'.time();
                $imageString = $image;
                if(($recipe_type == 'normal')) {
                    $uploadImage = CommonFunctions::createImageFromString($imageString, $imgName);
                } else {
                    $uploadImage = CommonFunctions::createImageFromString($imageString, $imgName, 'uploaded');
                }            
                if($uploadImage['ErrorCode'] == '0') {
                    // delete old image if exist
                    if(isset($model->rp_id)){
                        $old_recipe = $model->getRecipeDetails($model->rp_id);
                        $old_image = $old_recipe['rp_image_url'];
                        if(file_exists(MAIN_BASE_PATH.'/images/recipe/'.$old_image)){
                            @unlink(MAIN_BASE_PATH.'/images/recipe/'.$old_image);
                        }
                        if(file_exists(MAIN_BASE_PATH.'/images/recipe/mobile/'.$old_image)){
                            @unlink(MAIN_BASE_PATH.'/images/recipe/mobile/'.$old_image);
                        }
                    }
                    $ext = $uploadImage['Extension'];
                    $recipeImageName = $imgName.$ext;
                    $model->rp_image_url = $recipeImageName;
                }
                else{
                    $responseArr['ErrorCode'] = 1;
                    $responseArr['ErrorMessage'] = 'Error Uploading Image.';
                    echo json_encode($responseArr);
                    die();
                }
            }
            if(!isset($model->rp_image_url) || !isset($model->rp_created_on) || !isset($model->rp_created_by)){
                if(isset($model->rp_id)){
                    $old_recipe = $model->getRecipeDetails($model->rp_id, true);
                    $model->rp_image_url = $old_recipe['rp_image_url'];
                    $model->rp_created_on = $old_recipe['rp_created_on'];
                    $model->rp_created_by = $old_recipe['rp_created_by'];
                }
            }
            
            if(!$model->validate()){
                $getErrors = $model->getErrors();
                $errors = CommonFunctions::getErrors($getErrors);
                $responseArr['ErrorCode'] = 1;
                $responseArr['ErrorMessage'] = $errors;
                echo json_encode($responseArr);
                die();
            }
            else{
                if($addUpdate = $model->save()){
                    if($action_type == 'approve'){
                        $old_recipe = $model->getRecipeDetails($model->rp_id, true);
                        $model->deleteByPk($model->rp_id);
                        $recipe_model = $model = new VdRecipies();
                        foreach($old_recipe as $key=>$value){
                            if($key != 'rp_id'){
                                $recipe_model->$key = $value;
                            }
                            if($key == 'rp_image_url'){
                                $imageName = $value;
                            }   
                            if($key == 'rp_created_by'){
                                $createdBy = $value;
                            }       
                            if($key == 'rp_name'){
                                $rpName = $value;
                            }                      
                        }
                        if(!empty($imageName)) {
                            CommonFunctions::moveUploadedImage($imageName);
                        }
                        if(!$recipe_model->validate()){
                            $getErrors = $recipe_model->getErrors();
                            $errors = CommonFunctions::getErrors($getErrors);
                            $responseArr['ErrorCode'] = 1;
                            $responseArr['ErrorMessage'] = $errors;
                            echo json_encode($responseArr);
                            die();
                        }
                        else{
                            if($try_save = $recipe_model->save()){
                                if(!empty($createdBy) && !empty($rpName)) {
                                    $VdRecipiesUsers = new VdRecipiesUsers();   
                                    $userDetails = $VdRecipiesUsers->getUserDetails($createdBy);
                                    $recipeUser = array();
                                    foreach($userDetails as $key=>$value){
                                        $recipeUser[$key] =  $value;                
                                    }
                                    CommonFunctions::sendActionMail($recipeUser['full_name'], $recipeUser['email'],$rpName);
                                }
                                $responseArr['ErrorCode'] = 0;
                                $responseArr['ErrorMessage'] = 'Recipe approved successfully.';
                                echo json_encode($responseArr);
                                die();
                            }
                            else{
                                $responseArr['ErrorCode'] = 1;
                                $responseArr['ErrorMessage'] = 'unknown error';
                                echo json_encode($responseArr);
                                die();
                            }
                        }
                    }
                    else{
                        $responseArr['ErrorCode'] = 0;
                        $responseArr['ErrorMessage'] = 'Recipe updated successfully.';
                        echo json_encode($responseArr);
                        die();
                    }
                }
                else{
                    $responseArr['ErrorCode'] = 1;
                    $responseArr['ErrorMessage'] = 'unknown error';
                    echo json_encode($responseArr);
                    die();
                }
            }
        }else{
            $responseArr['ErrorCode'] = 1;
            $responseArr['ErrorMessage'] = 'unknown ajax call';
            $responseArr['ErrorRequest'] = $_POST;
            echo json_encode($responseArr);
            die();
        }
    }
    
    public function actionPushNotification($param = null){
        $this->render('pushNotification');
    } 
}

