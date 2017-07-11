<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class Employees extends Controller
{
    //

public function insertNewEmployeeProfile(Request $request) {   //check first comming Employee Exist or not in Employee Table
$id = $request->input("id");
$Employe =  Employe::find($id);
 if(!empty($Employe)){
   $name = $request->input("name");
 
 $contact = $request->input("contact");
 $skill = $request->input("skill");
//$status = $request->input("status");                     // if not exist then insert it in Employee Table
 $img = $request->input("img_url");

        
        $Employe->name	= $name;
        $Employe->contact =$contact;
        $Employe->skill =  $skill ;
        $Employe->status = 'active';
        $Employe->image_url = $img;
        $Employe->isAccountSetUp = 'yes';
       

        $Employe->save();
         return response()->json(['r'=>['response' =>'yes']]);
}
else
{
         return response()->json(['r'=>['response' =>'no']]);
}

}

public function registerNewEmployee(Request $request) {   //check first comming Employee Exist or not in Employee Table

 $email = $request->input("email");
 $p = $request->input("password");

 $v =  Employe::where('email',$email)->first();
 if(empty($v)){
 

    $Employe = new  Employe;
        $Employe->email =$email;
         $Employe->password =$p;
        
        $Employe->status = 'deActive';
       
        $Employe->save();
         return response()->json(['r'=>['response'=>'yes','employeeId'=>$Employe->id]]);
}
else
{
         //return response()->json(['response' =>'no','employeeId' =>'0']);
        return response()->json(['r'=>['response'=>'no','employeeId'=>'0']]);

}

}










public function allEmployee(){   // return tha all available Employee
    
  $employee = Employe::all();
  return response()->json(['AllEmployee' => $employee]);

    }

public function getEmployeeBaseOnSkill(Request $request)
{                                                 // return tha all available Employee
    

  $skill = $request->input("skill");
  $employee =  Employe::where('skill',$skill)->get();
  if(!empty($employee)){
  //	$employ =  Employe::where('skill',$skill)->get();;
  return response()->json(['EmployeeBaseOnSkill' => $employee]);
}
else
{
return response()->json(['EmployeeBaseOnSkill' => 'false']);

 }
}

public function getEmployeeBaseOnId(Request $request)
{                                                 // return Employee base on id
    

  $id = $request->input("id");
  $employee =  Employe::find($id);
  
  //  $employ =  Employe::where('skill',$skill)->get();;
  if(!empty($employee))
  {
  return response()->json(['EmployeeBaseOnId' => $employee]);
     }
     else{
     return response()->json(['EmployeeBaseOnId' => "no"]);

     }

}

public function getEmployeeBaseOnEmail(Request $request)
{                                                 // return Employee base on email
    

  $email = $request->input("email");
  $password = $request->input("password");
  $matchThese = ['email' => $email, 'password' => $password];  // making claus for multiple value for where

  $employee =  Employe::where($matchThese)->first();
  
  //  $employ =  Employe::where('skill',$skill)->get();;
  if(!empty($employee)){
  return response()->json(['EmployeeBaseOnEmail'=>['status'=>"yes",'id'=>$employee->id,
    'Account'=>$employee->isAccountSetUp]]);
     }
     else{
     return response()->json(['EmployeeBaseOnEmail'=>['status'=>"no",'id'=>0,
      'Account'=>'no']]);

     }

}


public function setEmployeStatus(Request $request)
{                                                 // change status from active to deactive
    

  $id = $request->input("id");
  $employee = Employe::find($id);
 if(!empty($employee)){
    $employee->status = 'deActive';
     $employee->save();
  return response()->json(['result' =>'true']);
}
else
{
return response()->json(['result' =>'false']);

 }
}
public function setEmployeStatusActive(Request $request)
{                                                 // change status from De_active to active
    

  $id = $request->input("id");
  $employee = Employe::find($id);
 if(!empty($employee)){
    $employee->status = 'active';
     $employee->save();
  return response()->json(['result' =>'true']);
}
else
{
return response()->json(['result' =>'false']);

 }


}
public function allActiveEmployee(){   // return tha all active status Employee
    

$employee =  Employe::where('status','active')->first();
  if(!empty($employee)){

  $employee = Employe::where('status','active')->get();
  return response()->json(['AllActiveEmployee' => $employee]);
}
else
return response()->json(['AllActiveEmployee' => 'empty']);
    


    }

public function allDeActiveEmployee(){   // return tha all active status Employee
    
    $employee =  Employe::where('status','deActive')->first();
  if(!empty($employee)){

  $employee = Employe::where('status','deActive')->get();
  return response()->json(['AllDeActiveEmployee' => $employee]);
}else
return response()->json(['AllDeActiveEmployee' => 'empty']);

    }





}
