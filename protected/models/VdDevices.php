<?php

/**
 * This is the model class for table "vd_devices".
 *
 * The followings are the available columns in table 'vd_devices':
 * @property int $device_id
 * @property string $device_push_token
 * @property string $device_platform
 * @property string $device_os_version
 * @property string $device_model
 * @property string $device_created_on
 * @property string $device_modified_on
 */
class VdDevices extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vd_devices';
	}

	public function fetchDeviceData($token,$platform) {
		$criteria = new CDbCriteria();
		$criteria->condition = "device_push_token=:token and device_platform=:platform";
		$criteria->params = array(':token' => $token,':platform'=>$platform);
		$criteria->select = "device_id";
		$data = $this->findAll($criteria);
		return $data;
	}
        
	public function fetchDeviceDataByTagstrip($deviceTagStrip,$deviceToken,$platform) {
		$criteria = new CDbCriteria();
		$criteria->condition = "device_tag_strip=:tag and device_push_token=:token and device_platform=:platform";
		$criteria->params = array(':tag' => $deviceTagStrip,':token' => $deviceToken,':platform'=>$platform);
		$criteria->select = "device_id";
		$data = $this->findAll($criteria);
		return $data;
	}

	public function saveDeviceData($data) {
		$this->device_tag_strip=$data['deviceTagstrip'];
		$this->device_push_token=$data['deviceToken'];
		$this->device_platform=$data['platform'];
		$this->device_os_version=$data['osVersion'];
		$this->device_model=$data['deviceModel'];
		$this->device_created_on = date('Y-m-d H:i:s');
		$this->device_modified_on = date('Y-m-d H:i:s');
		if($this->save()) {
			return true;
		}
		return false;
	}

	public function updateDeviceData($deviceTagstrip, $token,$platform) {
		$this->updateAll(
			array('device_modified_on'=>date('Y-m-d H:i:s')),
			"device_tag_strip=:tag and device_platform=:platform",
    		array(':tag' => $deviceTagstrip,':platform'=>$platform)
		);
		return true;
	}

	public function fetchDeviceDataByTagAndToken($deviceTagStrip,$deviceToken) {
		$criteria = new CDbCriteria();
		$criteria->condition = "device_tag_strip=:tag or device_push_token=:token";
		$criteria->params = array(':tag' => $deviceTagStrip,':token' => $deviceToken);
		$criteria->select = "device_id";
		$data = $this->find($criteria);
		return $data;
	}
}