<?php

/**
 * This is the model class for table "vd_recipies".
 *
 * The followings are the available columns in table 'vd_recipies':
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
class VdRecipies extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vd_recipies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rp_name, rp_description, rp_ingredients, rp_min_cook_time, rp_max_cook_time, rp_max_preparation_time, rp_temprature, rp_type, rp_category, rp_created_on, rp_created_by, rp_modified_on, rp_modified_by', 'required'),
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
			'rp_name' => 'Name',
			'rp_pretty_name' => 'Pretty Name',
			'rp_description' => 'Description',
			'rp_ingredients' => 'Ingredients',
			'rp_youtube_url' => 'Youtube Url',
			'rp_min_cook_time' => 'Min Cook Time',
			'rp_max_cook_time' => 'Max Cook Time',
			'rp_min_preparation_time' => 'Min Preparation Time',
			'rp_max_preparation_time' => 'Max Preparation Time',
			'rp_temprature' => 'Temprature',
			'rp_quantity' => 'Quantity',
			'rp_type' => 'Type',
			'rp_category' => 'Category',
			'rp_image_url' => 'Image Url',
			'rp_created_on' => 'Created On',
			'rp_created_by' => 'Created By',
			'rp_modified_on' => 'Modified On',
			'rp_modified_by' => 'Modified By',
			'rp_deleted' => 'Deleted',
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
	 * @return VdRecipies the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getRecipeDetails($recipeId, $all = false) {
		$criteria = new CDbCriteria();
		$criteria->condition = "rp_id=:rpId";
		$criteria->params = array(':rpId' => $recipeId);
		if(!$all){
                    $criteria->select = "rp_id, rp_name, rp_description, rp_ingredients, "
				. "rp_min_cook_time, rp_max_cook_time, rp_max_preparation_time, rp_temprature, rp_image_url, rp_youtube_url";
                }
		$data = $this->find($criteria);
		return $data;
	}
	
	public function getFilteredData($postData) {
		$start = 0;
		$offset = 6;
		$searchCond = '';
		$isWhere = 0;
		if(isset($postData['limit'])) {
			$start = $postData['limit'][0];
			$offset = $postData['limit'][1];
		}
                if(isset($postData['videoRecipe'])) {
                    $isWhere = '1';
                    $searchCond = "LENGTH(rp_youtube_url) > 10 && ";
                }
		else if(isset($postData['search'])) {
			$search = $postData['search'];
			$isWhere = '1';
			$searchCond = "rp_name like '%".$search."%' && ";
		}
                else{
                    if(isset($postData['cat'])) {
                            $isWhere = '1';
                            $catList = implode(",", $postData['cat']);
                            //echo $catList;
                            $catList = str_replace(",","','",$catList);
                            //die();
                            //$criteria->addInCondition("rp_max_cook_time", $postData['rp_category']);
                            $searchCond .= "rp_category in ('".$catList."') && ";
                    }
                    if(isset($postData['type'])) {
                            $type = $postData['type'];
                            $isWhere = '1';
                            //$criteria->addCondition("rp_type", $type);
                            $searchCond .= "rp_type = ".$type." && ";
                    }
                    if(isset($postData['cooking_time'])) {
                            $isWhere = '2';
                            $cookCond = '';
    //			print_r($postData['cooking_time']);die();
    //			$cookList = implode(",", $postData['cooking_time']);
                            for($i=0;$i<count($postData['cooking_time']); $i++) {
                                    //echo $postData['cooking_time'][$i];die();
                                    if($postData['cooking_time'][$i] == '1') {
                                            $cookCond .= 'rp_max_cook_time <= 10 || ';
                                    }
                                    if($postData['cooking_time'][$i] == '2') {
                                            $cookCond .= 'rp_max_cook_time <= 20 || ';
                                    }
                                    if($postData['cooking_time'][$i] == '3') {
                                            $cookCond .= 'rp_max_cook_time >= 30 || ';
                                    }

                            }

                            $cookCond = " (".substr_replace($cookCond, "", -3).")";

                            $searchCond .= $cookCond;
                            //echo $cookCond."|".$searchCond; die();
                    }
                }
		//$searchCondFinal = '';
		$searchCondFinal = 'where rp_deleted = "0"';
		if($isWhere == '1' || $isWhere == '2') {
			if($isWhere == '1') {
				$searchCond = substr_replace($searchCond,"", -3);
			}
			//$searchCondFinal = 'where '.$searchCond;
			$searchCondFinal .= ' && '.$searchCond;
		}
		
		$q = "select rp_id, rp_name,rp_min_preparation_time,rp_min_cook_time, rp_max_cook_time, rp_max_preparation_time, rp_temprature, rp_image_url, rp_youtube_url from vd_recipies ".$searchCondFinal. " order by rp_modified_on desc limit ".$start.",".$offset;
		//echo $q;
		$connection=Yii::app()->db;  
		$command=$connection->createCommand($q);
		$rows=$command->queryAll(); 
		//print_r($rows);
		return $rows;
	}
}
