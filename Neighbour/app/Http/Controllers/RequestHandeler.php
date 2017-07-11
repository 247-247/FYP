<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ServiceRequestNotificationController;
use App\ServiceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class RequestHandeler extends Controller
{
    public function inserNewRequest(Request $request)
    {

	 $type = $request->input("type");
   $cause = $request->input("cause");
   $sender_id = $request->input("sender_id");
	 $Owner_house_address= $request->input("owner_house_address");
	 $Owner_contact= $request->input("owner_contact");
	 $Owner_name= $request->input("owner_name");
	 $status= $request->input("status");
	 $Owner_image_url= $request->input("owner_image_url");
	 $PowerMan_name= $request->input("powerMan_name");
	 $PowerMan_image_url= $request->input("powerMan_image_url");
	 $PowerMan_id= $request->input("powerMan_id");
   $Requestt = new  ServiceRequest;
	 $Requestt->cause=$cause; 
   $Requestt->sender_id =$sender_id; 
   $Requestt->type =$type; 
	 $Requestt->owner_house_address = $Owner_house_address;
	 $Requestt->owner_contact = $Owner_contact;
	 $Requestt->owner_name =  $Owner_name;
	 $Requestt->status ="active";
	 $Requestt->owner_image_url = $Owner_image_url;
	        $Requestt->powerMan_name=$PowerMan_name;       // for now i will save value of cause
	       $Requestt->powerMan_image_url = $PowerMan_image_url;
	       $Requestt->powerMan_id = $PowerMan_id;
           $Requestt->s = 'pending';
               

	          $Requestt->save();

    app('App\Http\Controllers\ServiceRequestNotificationController')->newNotificationMessageItem($Requestt->id);
	     return response()->json(['response' =>'true']);

    }
public function acceptRequest(Request $request){
  $id = $request->input("id");
    $Requestt = ServiceRequest::find($id);
     if(!empty($Requestt))
    {
    $Requestt->s = 'Accept';
    $Requestt->status ="active";
    $Requestt->save();
     return response()->json(['result' =>'yes']);
   }
 else
  {
    return response()->json(['result' =>'no']);
  }

}
public function DeAcceptRequest(Request $request){
  $id = $request->input("id");
    $Requestt = ServiceRequest::find($id);
     if(!empty($Requestt))
    {
    $Requestt->s = 'Reject';
    $Requestt->status ="DeActive";
    $Requestt->save();
     return response()->json(['result' =>'yes']);
   }
 else
  {
    return response()->json(['result' =>'no']);
  }

}


public function deActiveRequestStatus(Request $request)    // set request de Active
{
	 $id = $request->input("id");
    $Requestt = ServiceRequest::find($id);
     if(!empty($Requestt))
    {
    $Requestt->status = 'DeActive';
    $Requestt->save();
     return response()->json(['result' =>'true']);
   }
 else
  {
    return response()->json(['result' =>'false']);
  }

}

public function ActiveRequestStatus(Request $request)   // set request Active
{
	 $id = $request->input("id");
  $Requestt = ServiceRequest::find($id);
 if(!empty($Requestt)){
    $Requestt->status = 'active';
    $Requestt->save();
     return response()->json(['result' =>'true']);
 }
 else
  {
    return response()->json(['result' =>'false']);
  }

}


public function allActiveRequests()
{   // return tha all active status Request
    

      $r =  ServiceRequest::where('status','active')->first();
     if(!empty($r))
     {

       $results = ServiceRequest::where('status','active')->get();
        return response()->json(['AllActiveRequest' =>$results]);
     }
    else
           return response()->json(['AllActiveRequest' => 'empty']);
    

 }


    public function allDeActiveRequests()
    {   // return tha all De active status Request
    

          $r =  ServiceRequest::where('status','deActive')->first();
         if(!empty($r))
         {

            $results = ServiceRequest::where('status','deActive')->get();
            return response()->json(['AllActiveRequest' =>$results]);
         }
        else
        {
             return response()->json(['AllActiveRequest' => 'empty']);
        }
   }


public function getRequestBasesOnId(Request $request)   // get Request base on user Requested's Id
{
	 $id = $request->input("id");
    $Requestt = ServiceRequest::find($id);
    if(!empty($Requestt))
    {
  
     return response()->json(['result' =>$Requestt]);
    }
   else
   {
    return response()->json(['result' =>'empty']);
   }

}

public function getRequestBasesOnUserFirebaseId(Request $request)   // get Request base on user Firebase Id
{
   $id = $request->input("id");
   $results = ServiceRequest::where('sender_id',$id)->get();
   return response()->json(['request' =>$results]);

}
public function getRequestBasesOnServiceManId(Request $request)  

{
   $id = $request->input("id");
   $results = ServiceRequest::where('powerMan_id',$id)->get();
   return response()->json(['request' =>$results]);

}


public function getRequestBasesOnServiceManIdWhichActiveAndAccepted(Request $request)   

{
   $id = $request->input("id");
   
   $i = 'Accept';
   $s = 'active';
   $matchThese = ['powerMan_id' => $id, 's' => $i,'status' => $s];
   
   $results = ServiceRequest::where($matchThese)->get();
   return response()->json(['request' =>$results]);

}
public function getAllRequest(Request $request)  

{
   
   $results = ServiceRequest::all();
   return response()->json(['request' =>$results]);

}










}
