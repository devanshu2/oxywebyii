<?php

/**
 * This is the model class for table "vd_notification_logs".
 *
 * The followings are the available columns in table 'vd_notification_logs':
 * @property int $notification_id
 * @property string $notification_title
 * @property string $notification_message
 * @property string $notification_created_by
 * @property string $notification_created_on
 */
class VdNotificationLogs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vd_notification_logs';
	}

	public function saveNotificationData($data) {
		//$this->notification_title=$data['notification_title'];
		$this->notification_message=$data['notification_message'];
		$this->notification_created_by=$data['notification_created_by'];
		$this->notification_created_on = date('Y-m-d H:i:s');
		if($this->save()) {
			return true;
		}
		return false;
	}

}