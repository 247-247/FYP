<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BrandController extends Controller
{
      public function inserNewBrandProfile(Request $request)
        {
       	      $id = $request->input("id");
              $name = $request->input("name");
              $contact = $request->input("contact");
              $image = $request->input("image_url");
              $address = $request->input("address");
           //   $v =  Brand::where('email',$email)->first();
             $Brand  = Brand::find($id);
             if(!empty($Brand))
              {
                 
                 $Brand->name	= $name;
                 $Brand->contact =$contact;
                 $Brand->address =  $address;
             //  $Brand->fcm_id = $fcm_id;
                 $Brand->image_url = $image;
                 $Brand->status = 'active';
                 $Brand->currentStatus ="ON";
                 $Brand->isAccountSetUp = 'yes';
                 $Brand->save();
                 return response()->json(['r'=>['response'=>'yes']]);
                 //return response()->json(['response' =>'true']);
              }
             else
              {
                 return response()->json(['r'=>['response'=>'no']]);
              }

        }
       public function registerNewBrand(Request $request) 
        {  

				 $email = $request->input("email");
				 $p = $request->input("password");

				 $v =  Brand::where('email',$email)->first();
				 if(empty($v))
				  {
					    $Brand = new  Brand;
				        $Brand->email =$email;
				         $Brand->password =$p;
				        
				        $Brand->status = 'active';
				         $Brand->currentStatus ="NO";
				       
				        $Brand->save();
 return response()->json(['r'=>['response'=>'yes','employeeId'=>$Brand->id]]);
                  }
				 else
				  {
        
                        return response()->json(['r'=>['response'=>'no','employeeId'=>'0']]);

                  }

        }

public function getBrandBaseOnId(Request $request)
{                                                 // return Employee base on id
    

  $id = $request->input("id");
  $brand =  Brand::find($id);
  
  //  $employ =  Employe::where('skill',$skill)->get();;
  if(!empty($brand)){
  return response()->json(['BrandBaseOnId' => $brand]);
     }
     else{
     return response()->json(['BrandBaseOnId' => "no"]);

     }

}
public function getEmployeeBaseOnEmail(Request $request)
{                                                 // return Employee base on email
    

  $email = $request->input("email");
  $password = $request->input("password");
  $matchThese = ['email' => $email, 'password' => $password];  // making claus for multiple value for where

  $brand =  Brand::where($matchThese)->first();
  
  //  $employ =  Employe::where('skill',$skill)->get();;
  if(!empty($brand)){
         if($brand->status == "active"){
          return response()->json(['BrandBaseOnEmail'=>['status'=>"yes",'id'=>$brand->id,'Account'=>$brand->isAccountSetUp]]);
        }else{
          return response()->json(['BrandBaseOnEmail'=>['status'=>"no",'id'=>0,'Account'=>'no']]);
        }
     }
     else{
     return response()->json(['BrandBaseOnEmail'=>['status'=>"no",'id'=>0,'Account'=>'no']]);

     }
  

}
public function getAllBrands(Request $request)
{                                                 // return Employee base on id
    

  
  $brands = Brand::All();  

  return response()->json(['Brands' => $brands]);
     

}


public function setBrandStatus(Request $request)
{                                                 // change status from active to deactive
    

  $id = $request->input("id");
  $b = Brand::find($id);
 if(!empty($b)){
    $b->status = 'deActive';
     $b->save();
  return response()->json(['result' =>'true']);
}
else
{
return response()->json(['result' =>'false']);

 }
}
 public function setBrandActive(Request $request)
{                                                 // change status from active to deactive
    

  $id = $request->input("id");
  $b = Brand::find($id);
 if(!empty($b)){
    $b->status = 'active';
     $b->save();
  return response()->json(['result' =>'true']);
}
else
{
return response()->json(['result' =>'false']);

 }
}





}
