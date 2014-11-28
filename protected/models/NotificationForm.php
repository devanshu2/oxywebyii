<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NotificationForm extends CFormModel
{
	public $notificationType;
	public $message;
	public $targetRecipe;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('notificationType, message', 'required'),
		);
	}
	public function attributeLabels()
	{
		return array(
			'notificationType'=> "Select the notification type",
			'message'=>"Message",
			'targetRecipe'=>"Select Target Recipe",
		);
	}
}
?>