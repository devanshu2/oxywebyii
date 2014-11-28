<?php

/**
 * This is the model class for table "vd_recipies_users".
 *
 * The followings are the available columns in table 'vd_recipies_users':
 * @property string $id
 * @property string $full_name
 * @property string $email
 * @property string $contact
 */
class VdRecipiesUsers extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'vd_recipies_users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('full_name, email', 'required'),
            array('full_name, email', 'length', 'max'=>128),
			array('email','email'),
            array('contact', 'length', 'max'=>32),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, full_name, email, contact', 'safe', 'on'=>'search'),
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
            'id' => 'ID',
            'full_name' => 'Full Name',
            'email' => 'Email',
            'contact' => 'Contact',
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

        $criteria->compare('id',$this->id,true);
        $criteria->compare('full_name',$this->full_name,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('contact',$this->contact,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VdRecipiesUsers the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
	
	public function createRecipeUser($fullName, $email, $number='') {
		$responseArr = array();
		$this->full_name = $fullName;
		$this->email = $email;
		$this->contact = $number;
		$user = $this->checkEmail($email);
		if($user) {
			$responseArr['ErrorCode'] = 0;
			$responseArr['Id'] = $user;
		} else {
			if($this->save()) {
				$responseArr['ErrorCode'] = 0;
				$responseArr['Id'] = $this->id;
			} else {
				$getErrors = $this->getErrors();
				$errors = CommonFunctions::getErrors($getErrors);
				$responseArr['ErrorCode'] = 1;
				$responseArr['ErrorMessage'] = $errors;
			}
		}
		return $responseArr;
	}
	
	protected function checkEmail($email) {
		if(!$email) {
			return false;
		}
		$userDetails = Yii::app()->db->createCommand()
		->select('id, email')
		->from('vd_recipies_users')
		->where('email=:email', array(':email'=>$email))
		->queryRow();
		if($userDetails) {
			return $userDetails['id'];
		} else {
			return false;
		}
	}

    public function getUserDetails($user_id) {
        $criteria = new CDbCriteria();
        $criteria->condition = "id=:userID";
        $criteria->params = array(':userID' => $user_id);
        $data = $this->find($criteria);
        return $data;
    }	
}