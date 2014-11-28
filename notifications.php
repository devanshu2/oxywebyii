<?php
	define('GOOGLE_API_KEY', 'AIzaSyCapbE6QamuoB6WG0L1ovKko6Wq1GBn_SQ'); 
  $message['message'] = str_replace("##", " ", $argv[1]);;
  $message['rp_id'] = $argv[2];
  if(!$message){
      $message = array("message" => "Sample Message.","rp_id"=>101);
  }
  $link = mysql_connect('oxyfry.caofmdu9njqm.ap-southeast-1.rds.amazonaws.com','oxyfryer','oxy92379er') or die('Cannot connect to the DB');
  mysql_select_db('oxyfryer',$link) or die('Cannot select the DB');
  $query = sprintf("SELECT * from vd_devices");
  $deviceData = mysql_query($query); 
  $responseArr = array();
  if(mysql_num_rows($deviceData)) {
      $iosUsers = $androidUsers = array();
      while($post = mysql_fetch_assoc($deviceData)) {
        if($post['device_platform']=='ios') {
            $iosUsers[] = $post['device_push_token'];
        }
        if($post['device_platform']=='android') {
            $androidUsers[] = $post['device_push_token'];
        }
      }
      if(!empty($androidUsers)) {
          $androidUsers = array_chunk($androidUsers, 1000);
          foreach($androidUsers as $users) {
              sendPushNotifications($users,$message,'android');
          }
      }
      if(!empty($iosUsers)) {
          sendPushNotifications($iosUsers,$message,'ios');
      }
      $query = sprintf("INSERT into vd_notification_logs(notification_message,notification_created_by,notification_created_on) VALUES ('".json_encode($message)."',1,NOW())");
      if(!mysql_query($query)){
          $error = 'Please try after a while.';
          return false;
      }
      return true;
  }
  else {
      $error = 'No device found';
      return false;
  }

  function sendPushNotifications($deviceToken,$message,$os) {
      if($os=='ios'){
        $passphrase = '123456'; 
        $file_path = dirname(__FILE__).'/certificates/OxyFryerFinalProd.pem';
        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', $file_path);
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
        $body["aps"] = array(
          "alert"=>$message['message'],
          "apnsType"=>2
        );
        if(isset($message['rp_id']) && !empty($message['rp_id']) && ($message['rp_id']!=-1)) {
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
               echo 1;   
            } else {
               echo 0;
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
      }
  }
?>