<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ServiceTypeControllers extends Controller
{
    //
 public function insertNewService(Request $request) {   //check first comming Service Exist or not in ServiceType Table

 $skill = $request->input("skill");                     // if not exist then insert it in ServiceType Table
 $img = $request->input("img_url");
 $v =  ServiceType::where('Skill', $skill)->first();
 if(empty($v)){

 		 $skill = $request->input("skill");
         $ServiceType = new  ServiceType;
         $ServiceType->Skill = $skill;
         $ServiceType->image_url=$img ;
         $ServiceType->save();
         return response()->json(['response' =>'true']);
}
else
{
         return response()->json(['response' =>'false']);
}

}


 public function allServicesType(){   // return tha all available services
    
  $services = ServiceType::all()->first();
  if(!empty($services)){
$services = ServiceType::all();
  return response()->json(['AllServieses' => $services]);
}
else
return response()->json(['AllServieses' => "empty"]);
    }



}





