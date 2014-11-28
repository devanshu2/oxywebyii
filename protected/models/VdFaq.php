<?php

/**
 * This is the model class for table "vd_faq".
 *
 * The followings are the available columns in table 'vd_faq':
 * @property string $faq_id
 * @property string $faq_question
 * @property string $faq_answer
 * @property string $faq_category
 * @property string $faq_created_on
 * @property string $faq_modified_on
 * @property string $faq_created_by
 * @property string $faq_modified_by
 * @property integer $faq_deleted
 */
class VdFaq extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vd_faq';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('faq_question, faq_answer, faq_category, faq_created_on, faq_modified_on, faq_created_by, faq_modified_by', 'required'),
			array('faq_deleted', 'numerical', 'integerOnly'=>true),
			array('faq_category', 'length', 'max'=>2),
			array('faq_created_by, faq_modified_by', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('faq_id, faq_question, faq_answer, faq_category, faq_created_on, faq_modified_on, faq_created_by, faq_modified_by, faq_deleted', 'safe', 'on'=>'search'),
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
			'faq_id' => 'Faq',
			'faq_question' => 'Faq Question',
			'faq_answer' => 'Faq Answer',
			'faq_category' => 'Faq Category',
			'faq_created_on' => 'Faq Created On',
			'faq_modified_on' => 'Faq Modified On',
			'faq_created_by' => 'Faq Created By',
			'faq_modified_by' => 'Faq Modified By',
			'faq_deleted' => 'Faq Deleted',
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

		$criteria->compare('faq_id',$this->faq_id,true);
		$criteria->compare('faq_question',$this->faq_question,true);
		$criteria->compare('faq_answer',$this->faq_answer,true);
		$criteria->compare('faq_category',$this->faq_category,true);
		$criteria->compare('faq_created_on',$this->faq_created_on,true);
		$criteria->compare('faq_modified_on',$this->faq_modified_on,true);
		$criteria->compare('faq_created_by',$this->faq_created_by,true);
		$criteria->compare('faq_modified_by',$this->faq_modified_by,true);
		$criteria->compare('faq_deleted',$this->faq_deleted);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VdFaq the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function fetchFaqData($type) {
		$criteria = new CDbCriteria();
		$criteria->condition = "faq_category=:category";
		$criteria->params = array(':category' => $type);
		$criteria->select = "faq_question, faq_answer, faq_id, faq_category";
		$data = $this->findAll($criteria);
		//print_r($data);
		return $data;
	}
	
	public function fetchFaqSearchData($data, $category) {
		$criteria = new CDbCriteria();
//		$criteria->condition = "faq_question LIKE :question";
//		$criteria->params = array(':question' => "%$data%");
		$criteria->condition = "faq_question LIKE :question AND faq_category = :category";
		$criteria->params = array(':question' => "%$data%", ':category' => $category);
		$criteria->select = "faq_question, faq_answer, faq_id, faq_category";
		$data = $this->findAll($criteria);
		//print_r($data);
		return $data;
	}
	
	public function fetchFaqAllData() {
		$criteria = new CDbCriteria();
		$criteria->select = "faq_question, faq_answer, faq_id, faq_category";
		$data = $this->findAll($criteria);
		//print_r($data);
		return $data;
	}
}
