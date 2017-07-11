<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NoficationForRequest;
use App\ServiceRequest;
   use App\Employe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ServiceRequestNotificationController extends Controller
{
     public function newNotificationMessageItem($id){
      $Requestt = ServiceRequest::find($id);
      $Employe = Employe::find($Requestt->powerMan_id);
//  $senderId = $request->input("sender_id");
// $send_to_id= $request->input("sende_to_id");
// $send_to_email= $request->input("sende_to_email");
// $reqestId= $request->input("request_id");
// $cause= $request->input("reuest_cause");
// $home_no = $request->input("home_no");
// $sender_name = $request->input("sender_name"); 
//$status = $request->input("status"); 
       
      // echo $Requestt->sender_id;
      $Notification = new  NoficationForRequest;
      $Notification->sender_id = $Requestt->sender_id;
      $Notification->sende_to_id =$Requestt->powerMan_id; 
      $Notification->sende_to_email = $Employe->email;
      $Notification->request_id = $Requestt->id;
      $Notification->reuest_cause = $Requestt->cause;      
      $Notification->home_no = $Requestt->owner_house_address;
       $Notification->sender_name = $Requestt->owner_name;
       $Notification->msg_body = $Requestt->owner_house_address;
        $Notification->title = $Requestt->owner_name;
     $Notification->save();
     // 	 $Notification = new  NoficationForRequest;
     //  $Notification->sender_id = '2';
     //  $Notification->sende_to_id =$Requestt->powerMan_id 
     //  $Notification->sende_to_email = $Employe->email;
     //  $Notification->request_id = $Requestt->id;
     //  $Notification->reuest_cause = $Requestt->cause;      
     //  $Notification->home_no = $Requestt->owner_house_address;
     //   $Notification->sender_name = $Requestt->owner_name;
     //   $Notification->msg_body = $Requestt->owner_house_address;
     //    $Notification->title = $Requestt->owner_name;
     // $Notification->save();
    
     
     // app('App\Http\Controllers\DeviceControler')->sendRequestNotification($Notification->id);
      return 'true';
    }



}
