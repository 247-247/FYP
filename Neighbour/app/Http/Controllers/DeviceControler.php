<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeviceRegistration;
use App\GlobalNotification;
use App\NoficationForRequest;

class DeviceControler extends Controller
{
    //


public function insertDevice(Request $request) {   //$id,$name 

$email = $request->input("email");
$token = $request->input("device_token");
$createdAt = $request->input("created_at");
$updatedAt = $request->input("updated_at"); 
$DeviceRegistration = new  DeviceRegistration;
$DeviceRegistration->email = $email;
$DeviceRegistration->device_token = $token  ;
$DeviceRegistration->created_at	 = $createdAt;
$DeviceRegistration->updated_at =$updatedAt;
$DeviceRegistration->save();
return true;

	
    } 

public function send_notification($tokens,$messages,$title,$id) {  //$arrayTokens,$message,$title,$id
 
  $url = 'https://android.googleapis.com/gcm/send';
  $fields = array(
  'registration_ids' => $tokens ,
  'data' => $messages,
  'title' =>$title,
  'id' =>$id
 
  );
  $headers = array(
        'Authorization: key = AAAAbbsSDaU:APA91bE6FFe94fu4HferXRSjlur33SIzV-ZKXrRp9SHad5kyaz5zu4k7N0wxsva_lY4uMbr6jF18RbWNp5XXmAMDJ5aGlC8eeQsfhLw9tH8csJQTVpbzVBOMSVArM0LFd2mTdfDLcUfF' ,
 
        'Content-Type: application/json'
    );
 
	$ch = curl_init();
 
	curl_setopt( $ch, CURLOPT_URL, $url);
    curl_setopt( $ch, CURLOPT_POST, true);
    curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // curl_setopt($ch, CURLOPT_POST, true);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $fields));
 
    // Execute post
    $result = curl_exec($ch);
 
	if($result === FALSE)
	{
	  echo "Faild";
	die('CURL faild '. curl_error($ch));
	curl_close($ch);
 
	}
  	curl_close($ch);
 
   echo $result;	
 
}


public function sendToAllNotification($id)
{
 $arrayTokens = array();

$Devices = DeviceRegistration::all();
$Notification = GlobalNotification::find($id);   //lastly created Notification id which i need to send now
foreach ($Devices as $Device) {
  $arrayTokens[] =  $Device->device_token;
}

$title= array("title" => $Notification->title);
$message= array("message" => $Notification->msg_body);
  return $this->send_notification($arrayTokens,$message,$title,$id);

}


// public function sendNotificationtoSingleDevice($id)
// {
//  $arrayTokens = array();  
// //$Devices = DeviceRegistration::f;
// foreach ($Devices as $Device) {
//   $arrayTokens[] =  $Device->device_token;
// }
// //return  $arrayTokens;
// $title= array("message" => $GlobalNotification->title);
// //$message= array("message" => $GlobalNotification->title);
//   return $this->send_notification($arrayTokens,$title);

// }


public function sendRequestNotification($id) send notification to corresponding employee whome made request
{
 $arrayTokens = array();

$Devices = DeviceRegistration::all;
$Notification = NoficationForRequest::find($id);   //lastly created Notification id which i need to send now

 $Devices =   DeviceRegistration::where('email',$Notification->sende_to_email)->first();
        


foreach ($Devices as $Device) {
  $arrayTokens[] =  $Device->device_token;
}

$title= array("title" => $Notification->sender_name);
$message= array("message" => $Notification->home_no);
  return $this->send_notification($arrayTokens,$message,$title,$id);

}




}
