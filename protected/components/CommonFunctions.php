<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define('GOOGLE_API_KEY', 'AIzaSyCapbE6QamuoB6WG0L1ovKko6Wq1GBn_SQ');
class CommonFunctions {           


    public static function sendFaqEmail($userName, $userEmail, $userMessage, $userPhone = ""){
        $subject = 'Oxy Fryer - User Query';
        /* please set it to admin email */
        $to = "priyankarathore@vgmail.in";
        $message = '
        <html>
        <head>
          <title>FAQ email from Oxy Fryer.</title>
        </head>
        <body>
          <p>Hello Admin<br/>We have got FAQ request with following details:</p>
          <table>
            <tr>
              <td><b>Name</b></td><td>'.$userName.'</td>
            </tr>
            <tr>
              <td><b>Email</b></td><td>'.$userEmail.'</td>
            </tr>
            <tr>
              <td><b>Phone</b></td><td>'.$userPhone.'</td>
            </tr>
            <tr>
              <td><b>Message</b></td><td>'.$userMessage.'</td>
            </tr>
          </table>
        </body>
        </html>
        ';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        /* please change this upon rel installation */
        $headers .= 'From: Oxy_Fryer_Mail_Server <info@oxyfryer.com>' . "\r\n";
        $headers .= 'Reply-To: '.$userName.' <'.$userEmail.'>'. "\r\n";
        return @mail($to, $subject, $message, $headers);
    }
	
	public static function getCroppedRecipeImage($image_name, $width, $height, $old = false){
		$website_base_url = Yii::app()->request->baseUrl;
                if($old){
                    return $website_base_url.'/timthumb.php?src=/images/recipe/'.$image_name.'&w='.intval($width).'&h='.intval($height);
                }
                else{
                    return $website_base_url.'/timthumb.php?src=http://d31mnxm13m6gic.cloudfront.net/images/recipe/'.$image_name.'&w='.intval($width).'&h='.intval($height);
                }
	}

        public static function sendPushNotifications($deviceToken,$message,$os){
              if($os=='ios'){
                  $passphrase = '123456'; 
                  $file_path = MAIN_BASE_PATH.'/certificates/OxyFryerFinalProd.pem';
                  $ctx = stream_context_create();
                  stream_context_set_option($ctx, 'ssl', 'local_cert', $file_path);
                  stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
                  $body["aps"] = array(
                      "alert"=>$message['message'],
                      "apnsType"=>2
                  );
                  if(isset($message['rp_id']) && !empty($message['rp_id'])) {
                      $body["aps"] = array(  
                          "alert"=>$message['message'],
                          "apnsType"=>1,
                          "result" => array("rp_id"=>$message['rp_id'])
                      );
                  }
                  foreach($deviceToken as $token){
                      $fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err, $errstr, 120, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
                      if(!$fp){
                          print "Failed to connect $err $errstr\n";
                          return;
                      } 
                      $payload = json_encode($body);
                      $msg = chr(0) . chr(0) . chr(32) . pack('H*', str_replace(' ', '', $token)) . chr(0) . chr(strlen($payload)) . $payload;
                      $res = fwrite($fp, $msg);
                      if($res != 0 && $res != FALSE){
                         // echo 1;   
                      } else {
                         // echo 0;
                      }
                      fclose($fp);
                  }
              }elseif($os=='android'){ 
                  $registatoin_ids = $deviceToken;
                  $url = 'https://android.googleapis.com/gcm/send'; 
                  $fields = array(
                      'registration_ids' => $registatoin_ids,
                      'data' => $message,
                  ); 
                  $headers = array(
                      'Authorization: key='.GOOGLE_API_KEY,   //need to change(android team)
                      'Content-Type: application/json'
                  );
                  #Open connection
                  $ch = curl_init(); 
                  #Set the url, number of POST vars, POST data
                  curl_setopt($ch, CURLOPT_URL, $url); 
                  curl_setopt($ch, CURLOPT_POST, true);
                  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
                  #Disabling SSL Certificate support temporarly
                  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
                  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields)); 
                  #Execute post
                  $result = curl_exec($ch);
                  if($result === FALSE) {
                      die('Curl failed: ' . curl_error($ch));
                  } 
                  #Close connection
                  curl_close($ch);
                  //echo $result;
              }
          }
	
          
        public static function sendNotification($message = false, &$error = false) {
            if(!$message){
                $message = array("title"=>"Sample title.", "message" => "Sample Message.","rp_id"=>101);
            }
            $model = new VdDevices(); 
            $deviceData = $model->findAll();
            $responseArr = array();
            if(!empty($deviceData)) {
                $iosUsers = $androidUsers = array();
                foreach ($deviceData as $device) {
                    if($device['device_platform']=='ios') {
                        $iosUsers[] = $device['device_push_token'];
                    }
                    if($device['device_platform']=='android') {
                        $androidUsers[] = $device['device_push_token'];
                    }
                }
                if(!empty($androidUsers)) {
                    CommonFunctions::sendPushNotifications($androidUsers,$message,'android');
                }
                if(!empty($iosUsers)) {
                    CommonFunctions::sendPushNotifications($iosUsers,$message,'ios');
                }
                $saveData = array();
                $saveData['notification_title'] = $message['title'];
                $saveData['notification_message'] = json_encode($message);
                $saveData['notification_created_by'] = 3; //need to change (admin id or user id who is sending push notifications)
                $model = new VdNotificationLogs();
                $return = $model->saveNotificationData($saveData);
                if(!$return){
                    $error = 'Please try after a while.';
                    return false;
                }
                return true;
            }
            else {
                $error = 'No device found';
                return false;
            }
	}
          
	public static function getErrors($getErrors) {
		$errString = '';
		foreach($getErrors as $errors) {
			foreach($errors as $error) {
				$errString .= $error."\n";
			}
		}
		$errString = substr_replace($errString, "", -1);
		if($errString == '') {
			$errString = 'There has been some error.';
		}
		return $errString;
	}
	
	public static function createImageFromString($imageString, $imgName, $tempDir=null) {
		$maxUploadSize = '8097152'; //Max File Upload Size = 2MB
		$responseArr = array();
		$responseArr['ErrorCode'] = '0';
		$fileTmpDir = YiiBase::getPathOfAlias('webroot').'/images/recipe/temp';;
//		if (!file_exists($fileTmpDir)) {
//			mkdir($fileTmpDir, 0777, true);
//			chmod($fileTmpDir, 0777);
//		}
		$fileTmpPath = $fileTmpDir ."/". $imgName;
		//$fileTmpPath = '../../images/recipe/temp/'.$imgName;
		$image = base64_decode($imageString);
		file_put_contents($fileTmpPath, $image);
		//die('3');
		$data = @getimagesize($fileTmpPath);
		$sourceWidth = $data[0];
		$sourceHeight = $data[1];
		$extension = image_type_to_extension($data[2]);
		$validateImage = CommonFunctions::validateImage($fileTmpPath, $maxUploadSize, $data);
		if ($validateImage['ErrorCode'] != '0') {
			unlink($fileTmpPath);
			$responseArr['ErrorCode'] = $validateImage['ErrorCode'];
			$responseArr['ErrorMessage'] = $validateImage['ErrorMessage'];
			return $responseArr;
		}
    $filePath = YiiBase::getPathOfAlias('webroot').'/images/recipe';
    if(!empty($tempDir)) {
        $filePath = YiiBase::getPathOfAlias('webroot').'/images/recipe/uploaded';
    }		
		$filePath = $filePath ."/". $imgName.$extension;
		file_put_contents($filePath, $image);
		if (!file_exists($filePath)) {
			$responseArr['ErrorCode'] = '1';
			$responseArr['ErrorMessage'] = "Error Saving File.";
			return $responseArr;
		}	
		unlink($fileTmpPath);
		$responseArr['Extension'] = $extension;
		return $responseArr;
	}

	/**
	 * @method validateImage
	 * @description Method to validate Image Type and Max allowed size
	 * @author 3224 (Kellton)
	 * @access private
	 * @return Result array (Success Or Failure)
	 */
	public static function validateImage($fileTmpPath, $maxUploadSize, $data) {
		$responseArr = array();
		$responseArr['ErrorCode'] = '0';
		$fileSize = filesize($fileTmpPath);
		if ($fileSize >= $maxUploadSize) {
			$responseArr['ErrorCode'] = '1';
			$responseArr['ErrorMessage'] = "Max Upload Size Exceeded.";
			return $responseArr;
		}
		if (!in_array($data['mime'], array(
					'image/jpeg',
					'image/pjpeg',
					'image/png',
					'image/x-png'))) {
			$responseArr['ErrorCode'] = '1';
			$responseArr['ErrorMessage'] = "Image Type Not supported.";
			return $responseArr;
		}
		return $responseArr;
	}
        
        public static function validateYoutubeUrl($url) {
            return preg_match('/http:\/\/www\.youtube\.com\/embed\/[a-zA-Z0-9_\-]{3,}$/i', $url);
        }

  public function getCategoryValue($type_id,$cat_id) {
      $catval = 0;
      if($type_id==2 && $cat_id==1) {
          $catval = 1;
      }
      if($type_id==1 && $cat_id==1) {
          $catval = 2;
      }
      if($type_id==1 && $cat_id==2) {
          $catval = 3;
      }
      if($type_id==2 && $cat_id==2) {
          $catval = 4;
      }
      if($type_id==1 && $cat_id==3) {
          $catval = 5;
      }
      return $catval;
  }

  public static function moveUploadedImage($imageName) {
      $filePath = YiiBase::getPathOfAlias('webroot').'/images/recipe/uploaded';
      $filePath = $filePath ."/". $imageName;
      $newFilePath = YiiBase::getPathOfAlias('webroot').'/images/recipe';
      $newFilePath = $newFilePath ."/". $imageName;
      if (file_exists($filePath)) { 
          copy($filePath, $newFilePath);
      }
      unlink($filePath);
  }

/*
    @Created On : 2014-Oct-31
    @Puspose    : Upload Recipe Mail
*/
  public static function sendUploadRecipeMail($userName, $userEmail, $recipeName, $sendTo='admin'){
      
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
      /* please change this upon rel installation */
      $headers .= 'From: Oxy_Fryer_Mail_Server <info@oxyfryer.com>' . "\r\n";
      if($sendTo=='user') {
          $subject = 'Recipe Submitted - '.$recipeName;
          $to = $userEmail;
          $message = '<html><body>
                      <p>Dear '.$userName.'<br/><br/>
                        Your recipe "'.$recipeName.'" has been submitted, we will update you when it is Live.
                      </p></body></html>';
      } else {
          $subject = 'New Recipe Submitted - '.$recipeName;
          $to = "priyankarathore@vgmail.in";
          $message = '<html><head><title>Upload Recipe from Oxy Fryer.</title></head>
                      <body>
                      <p>
                        Hello Admin<br/><br/>
                        New recipe "'.$recipeName.'" has been submitted, please go to http://'.$_SERVER["HTTP_HOST"].'/oxyadmin/moderate to Approve it.
                      </p></body></html>';
          $headers .= 'Reply-To: '.$userName.' <'.$userEmail.'>'. "\r\n";
      }
      return @mail($to, $subject, $message, $headers);
  }

/*
    @Created On : 2014-Oct-31
    @Puspose    : Send mail to user on approval
*/
  public static function sendActionMail($userName, $userEmail, $recipe, $action='approve'){
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
      $headers .= 'From: Oxy_Fryer_Mail <info@oxyfryer.com>' . "\r\n";
      $to = $userEmail;
      $subject = 'Recipe ​Live - '.$recipe;
      $message = '<html><body>
                      <p>Dear '.$userName.'<br/><br/>
                      Your Recipe "'.$recipe.'" has been approved and listed on the Oxyfryer.com.
                      </p></body></html>';
      if($action=='reject') {
          $subject = 'Recipe Rejected - '.$recipe;
          $message = '<html><body>
                      <p>Dear '.$userName.'<br/><br/>
                      Your Recipe "'.$recipe.'" has been rejected by Oxyfryer Admin as it does not match with all criteria for listing.
                      </p></body></html>';
      }
      return @mail($to, $subject, $message, $headers);
  }
}