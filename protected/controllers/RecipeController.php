<?php

class RecipeController extends Controller
{
    public function actionIndex($param = null)
    {
        if(isset($_POST['getRecipeListing'])){
            return $this->getPostData();
        }
        elseif($param != null){
            return $this->getRecipeDetail($param);
        }
        else{
            $this->render('recipeListing');
        }
    }
    
    public function actionUpload($param = null) {
        $this->render('upload');
    }
    
    public function actionUploadPost($param = null) {
        if(isset($_POST['dishName'])){
            $image = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
            $postData = $_POST;
            $postData['image'] = $image;
            $ch = curl_init(); 
            #Set the url, number of POST vars, POST data
            $url = Yii::app()->getBaseUrl(true).'/webservice/uploadRecipe';
            curl_setopt($ch, CURLOPT_URL, $url); 
            curl_setopt($ch, CURLOPT_POST, true);
            $headers = array(
                'API_TOKEN: 442d3d2e505d4a643e4f6a772f',
                'Content-Type: application/json'
            );
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            #Disabling SSL Certificate support temporarly
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData)); 
            #Execute post
            $result = curl_exec($ch);
            if($result === FALSE) {
                die('Curl failed: ' . curl_error($ch));
            } 
            #Close connection
            curl_close($ch);
            echo $result;
        }
    }

    private function getPostData() {
        $append = isset($_POST['append']) ? 1 : 0;
        $recipe = new VdRecipies();
        $recipeData = $recipe->getFilteredData($_POST);
        $content = $this->tempCreateView($recipeData, $append);
        echo $content;
    }

    private function getRecipeDetail($param) {
		$recipeId = $param;
		$recipeModel = new VdRecipies();
		$recipeDetail = $recipeModel->getRecipeDetails($recipeId);
		if($recipeDetail) {
			$this->render('recipe_detail', array('recipeDetail' => $recipeDetail));
		} else {
			//$this->render('recipeListing');
			$this->redirect(Yii::app()->getHomeUrl().'recipe/');
		}
    }

    private function tempCreateView($recipeData, $append = 0) {
            //print_r($recipeData);
        $content = '';
        if($recipeData) {
                $fixWidth = 302;
                $fixHeight = 214;

                foreach($recipeData as $recipeDataSingle) {
                    //print_r($recipeDataSingle);
                    $name = $recipeDataSingle['rp_name'];
                    $id = $recipeDataSingle['rp_id'];
                    $maxCookTime = $recipeDataSingle['rp_max_cook_time'];
                    $minCookTime = $recipeDataSingle['rp_min_cook_time'];
                    $cooking_time_string = ($minCookTime == 0) ? $maxCookTime : ($minCookTime.'-'.$maxCookTime);
                    $recipeImage = $recipeDataSingle['rp_image_url'];
                    $recipeYoutubeUrl = trim($recipeDataSingle['rp_youtube_url']);
                    $croppedImage = CommonFunctions::getCroppedRecipeImage($recipeImage, $fixWidth, $fixHeight);
                    $youtubeAnchor = strlen($recipeYoutubeUrl) ? '<a href="'.$recipeYoutubeUrl.'?autoplay=1" class="listing-play-video"><img alt="play" src="'.Yii::app()->getHomeUrl().'images/listing_play_icon.png" /></a>' : '';
                    $content .= '<li>
                                    <div class="text">
                                        <a href="'.Yii::app()->getHomeUrl().'recipe/'.$id.'"><img src="'.$croppedImage.'" alt="" /></a>
                                        <div class="recipe-name">
                                            <span>'.$name.'</span>'.$youtubeAnchor.'                                                                                
                                            <p>Cooking Time : '.$cooking_time_string.' minutes</p>
                                        </div>
                                    </div>
                            </li>';
                }
        } else {
                if(!$append)
                        $content = '<li><p>No Data Found. Please search with different Criteria.</p></li>';
        }
        return $content;
    }
}

