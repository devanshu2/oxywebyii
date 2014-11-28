<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Oxyadmin extends CFormModel
{
    public function tryAdminLogin($username, $userpassword) {
        $user = Yii::app()->db->createCommand()
        ->select('*')
        ->from('vd_admin_users')
        ->where('user_login=:ulog && user_pass=:upass', array(':ulog'=>$username, ':upass'=>md5($userpassword)))
        ->queryRow();
        return $user;
    }
}