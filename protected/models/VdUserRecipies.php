<?php

/**
 * This is the model class for table "vd_user_recipies".
 *
 * The followings are the available columns in table 'vd_user_recipies':
 * @property string $rp_id
 * @property string $rp_name
 * @property string $rp_pretty_name
 * @property string $rp_description
 * @property string $rp_ingredients
 * @property string $rp_youtube_url
 * @property string $rp_min_cook_time
 * @property string $rp_max_cook_time
 * @property string $rp_min_preparation_time
 * @property string $rp_max_preparation_time
 * @property string $rp_temprature
 * @property integer $rp_quantity
 * @property string $rp_type
 * @property string $rp_category
 * @property string $rp_image_url
 * @property string $rp_created_on
 * @property string $rp_created_by
 * @property string $rp_modified_on
 * @property string $rp_modified_by
 * @property integer $rp_deleted
 */
class VdUserRecipies extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'vd_user_recipies';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //array('rp_name, rp_pretty_name, rp_description, rp_ingredients, rp_youtube_url, rp_min_cook_time, rp_max_cook_time, rp_min_preparation_time, rp_max_preparation_time, rp_temprature, rp_quantity, rp_type, rp_category, rp_image_url, rp_created_on, rp_created_by, rp_modified_on, rp_modified_by, rp_deleted', 'required'),
			array('rp_name, rp_description, rp_ingredients, rp_min_cook_time, rp_max_cook_time, rp_min_preparation_time, rp_max_preparation_time, rp_type, rp_image_url, rp_created_on, rp_created_by, rp_modified_on, rp_modified_by, rp_deleted', 'required'),
            array('rp_quantity, rp_deleted', 'numerical', 'integerOnly'=>true),
            array('rp_name, rp_youtube_url', 'length', 'max'=>256),
            array('rp_pretty_name, rp_temprature', 'length', 'max'=>128),
            array('rp_min_cook_time, rp_max_cook_time, rp_min_preparation_time, rp_max_preparation_time', 'length', 'max'=>10),
            array('rp_type, rp_category', 'length', 'max'=>4),
            array('rp_image_url', 'length', 'max'=>255),
            array('rp_created_by, rp_modified_by', 'length', 'max'=>5),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('rp_id, rp_name, rp_pretty_name, rp_description, rp_ingredients, rp_youtube_url, rp_min_cook_time, rp_max_cook_time, rp_min_preparation_time, rp_max_preparation_time, rp_temprature, rp_quantity, rp_type, rp_category, rp_image_url, rp_created_on, rp_created_by, rp_modified_on, rp_modified_by, rp_deleted', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'rp_id' => 'Rp',
            'rp_name' => 'Rp Name',
            'rp_pretty_name' => 'Rp Pretty Name',
            'rp_description' => 'Rp Description',
            'rp_ingredients' => 'Rp Ingredients',
            'rp_youtube_url' => 'Rp Youtube Url',
            'rp_min_cook_time' => 'Rp Min Cook Time',
            'rp_max_cook_time' => 'Rp Max Cook Time',
            'rp_min_preparation_time' => 'Rp Min Preparation Time',
            'rp_max_preparation_time' => 'Rp Max Preparation Time',
            'rp_temprature' => 'Rp Temprature',
            'rp_quantity' => 'Rp Quantity',
            'rp_type' => 'Rp Type',
            'rp_category' => 'Rp Category',
            'rp_image_url' => 'Rp Image Url',
            'rp_created_on' => 'Rp Created On',
            'rp_created_by' => 'Rp Created By',
            'rp_modified_on' => 'Rp Modified On',
            'rp_modified_by' => 'Rp Modified By',
            'rp_deleted' => 'Rp Deleted',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('rp_id',$this->rp_id,true);
        $criteria->compare('rp_name',$this->rp_name,true);
        $criteria->compare('rp_pretty_name',$this->rp_pretty_name,true);
        $criteria->compare('rp_description',$this->rp_description,true);
        $criteria->compare('rp_ingredients',$this->rp_ingredients,true);
        $criteria->compare('rp_youtube_url',$this->rp_youtube_url,true);
        $criteria->compare('rp_min_cook_time',$this->rp_min_cook_time,true);
        $criteria->compare('rp_max_cook_time',$this->rp_max_cook_time,true);
        $criteria->compare('rp_min_preparation_time',$this->rp_min_preparation_time,true);
        $criteria->compare('rp_max_preparation_time',$this->rp_max_preparation_time,true);
        $criteria->compare('rp_temprature',$this->rp_temprature,true);
        $criteria->compare('rp_quantity',$this->rp_quantity);
        $criteria->compare('rp_type',$this->rp_type,true);
        $criteria->compare('rp_category',$this->rp_category,true);
        $criteria->compare('rp_image_url',$this->rp_image_url,true);
        $criteria->compare('rp_created_on',$this->rp_created_on,true);
        $criteria->compare('rp_created_by',$this->rp_created_by,true);
        $criteria->compare('rp_modified_on',$this->rp_modified_on,true);
        $criteria->compare('rp_modified_by',$this->rp_modified_by,true);
        $criteria->compare('rp_deleted',$this->rp_deleted);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VdUserRecipies the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
	
	public function saveUserRecipies($dishName, $minCookTime, $maxCookTime =0, $minPrepTime = 0
									,$maxPrepTime, $quantity=0, $ingredients, $howToUse, $userId, $recipeImageName
			, $category ,$type, $temprature, $youtubeVideo) {
            $responseArr = array();
            if(empty($dishName)){
                $responseArr['ErrorCode'] = 1;
                $responseArr['ErrorMessage'] = 'Invalid Dish Name';
                return $responseArr;
            }            
            if(empty($maxCookTime)){
                $responseArr['ErrorCode'] = 1;
                $responseArr['ErrorMessage'] = 'Invalid Max Cook TIme';
                return $responseArr;
            }
            if(empty($maxPrepTime)){
                $responseArr['ErrorCode'] = 1;
                $responseArr['ErrorMessage'] = 'Invalid Max Prep Time';
                return $responseArr;
            }
            if(empty($ingredients)){
                $responseArr['ErrorCode'] = 1;
                $responseArr['ErrorMessage'] = 'Invalid Ingredients';
                return $responseArr;
            }
            if(empty($howToUse)){
                $responseArr['ErrorCode'] = 1;
                $responseArr['ErrorMessage'] = 'Invalid How to use';
                return $responseArr;
            }            
            if(!$category){
                $responseArr['ErrorCode'] = 1;
                $responseArr['ErrorMessage'] = 'Invalid Category';
                return $responseArr;
            }
            if(!$type){
                $responseArr['ErrorCode'] = 1;
                $responseArr['ErrorMessage'] = 'Invalid Type';
                return $responseArr;
            }
            if(empty($temprature)){
                $responseArr['ErrorCode'] = 1;
                $responseArr['ErrorMessage'] = 'Invalid Temperature';
                return $responseArr;
            }
            if(empty($userId)){
                $responseArr['ErrorCode'] = 1;
                $responseArr['ErrorMessage'] = 'Invalid User';
                return $responseArr;
            }
            if(!(empty($youtubeVideo) || CommonFunctions::validateYoutubeUrl($youtubeVideo))){
                $responseArr['ErrorCode'] = 1;
                $responseArr['ErrorMessage'] = 'Invalid Youtube video';
                return $responseArr;
            }
            
            
		
		if(!empty($dishName) && !empty($maxCookTime) 
				&& !empty($maxPrepTime) && !empty($ingredients) && !empty($howToUse) && !empty($userId)
				&& !empty($category) && !empty($type) && !empty($temprature) && (empty($youtubeVideo) || CommonFunctions::validateYoutubeUrl($youtubeVideo))){ 
			$responseArr['ErrorCode'] = 0;
			switch($type) {
				case 1 :
				case 2 :
					$recipeType = $type;
					break;
				default :
					$recipeType = 1;
					break;
			}
			switch($category) {
				case 1 :	
				case 2 :	
				case 3 :
					$recipeCategory = $category;
					break;
				default :
					$recipeCategory = 1;
					break;
			}
			$this->rp_name = $dishName;
			$this->rp_min_cook_time = $minCookTime;
			$this->rp_max_cook_time = $maxCookTime;
			$this->rp_min_preparation_time = $minPrepTime;
			$this->rp_max_preparation_time = $maxPrepTime;
			$this->rp_quantity = $quantity;
			$this->rp_ingredients = $ingredients;
			$this->rp_description = $howToUse;
			$this->rp_created_by = $userId;
			$this->rp_modified_by = $userId;
			$this->rp_modified_on = date('Y-m-d h:i:s');
			$this->rp_created_on = date('Y-m-d h:i:s');
			$this->rp_deleted = 0;
			$this->rp_type = $recipeType;
			$this->rp_category = $recipeCategory;
			$this->rp_temprature = $temprature;
			$this->rp_image_url = $recipeImageName;
			$this->rp_youtube_url = $youtubeVideo;
			if($this->save()) {
				$responseArr['ErrorCode'] = 0;
			} else {
				$getErrors = $this->getErrors();
				$errors = CommonFunctions::getErrors($getErrors);
				$responseArr['ErrorCode'] = 1;
				$responseArr['ErrorMessage'] = $errors;
			}
		} else {
			$responseArr['ErrorCode'] = 1;
			$responseArr['ErrorMessage'] = 'Invalid Parameters.';
		}
		return $responseArr;
	}
        
        public function getRecipeDetails($recipeId, $all = false) {
		$criteria = new CDbCriteria();
		$criteria->condition = "rp_id=:rpId";
		$criteria->params = array(':rpId' => $recipeId);
                if(!$all){
                    $criteria->select = "rp_id, rp_name, rp_description, rp_ingredients, rp_created_by,"
				. "rp_max_cook_time, rp_max_preparation_time, rp_temprature, rp_image_url, rp_youtube_url";
                } 
		$data = $this->find($criteria);
		return $data;
	}
}