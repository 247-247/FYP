<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GlobalNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class GlobelNotificationController extends Controller
{
    public function allNotificationMessageItem(){   // return tha all Notification which was sended by Admin

   $Notifications = GlobalNotification::all();
   return response()->json(['AllNotification' => $Notifications,'name' => 'Abigail', 'state' => 'CA']);

    }
   

    public function newNotificationMessageItem(Request $request){

  $email = $request->input("email");
 $msg_body= $request->input("disc");
 $title= $request->input("title");
$image= $request->input("image");

    $GlobalNotification = new  GlobalNotification;
      $GlobalNotification->email =$email;
      $GlobalNotification->msg_body=$msg_body;
      $GlobalNotification->title= $title;
       $GlobalNotification->sendind_to="All";
        $GlobalNotification->status="Active";
       $GlobalNotification->image=$image;
      // $GlobalNotification->updated_at="2013-11-11 11:22:11";
      $GlobalNotification->save();
      app('App\Http\Controllers\DeviceControler')->sendToAllNotification($GlobalNotification->id);
      return 'true';
    }

}
