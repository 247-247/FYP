<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::match(array('GET','POST'),'/DeviceRegistration','DeviceControler@insertDevice');
Route::match(array('GET','POST'),'/DeviceAllTokens','DeviceControler@sendToAllNotification');
Route::match(array('GET','POST'),'/AllNotificationList','GlobelNotificationController@allNotificationMessageItem');
Route::match(array('GET','POST'),'/InserNewNotificatationItem','GlobelNotificationController@newNotificationMessageItem'); 
Route::match(array('GET','POST'),'/InserNewService','ServiceTypeControllers@insertNewService'); //check first comming Service Exist or not in ServiceType Table , if not exist then insert it in ServiceType Table
Route::match(array('GET','POST'),'/AllService','ServiceTypeControllers@allServicesType'); // return all services exists in Database
Route::match(array('GET','POST'),'/InserNewEmployee','Employees@insertNewEmployeeProfile'); // insert New Employee
Route::match(array('GET','POST'),'/RegisterNewEmployee','Employees@registerNewEmployee'); // insert New Employee

Route::match(array('GET','POST'),'/AllEmployee','Employees@allEmployee');  // return all employee
Route::match(array('GET','POST'),'/getEmployeeBasesOnSkill','Employees@getEmployeeBaseOnSkill');  // return all employee on the basis for Skill 
Route::match(array('GET','POST'),'/getEmployeeBasesOnId','Employees@getEmployeeBaseOnId');  // return  employee on the basis of  id 
Route::match(array('GET','POST'),'/getEmployeeBasesOnEmail','Employees@getEmployeeBaseOnEmail');  // return  employee on the basis of  email
Route::match(array('GET','POST'),'/setEmployeeStausDeActive','Employees@setEmployeStatus');
Route::match(array('GET','POST'),'/setEmployeeStausActive','Employees@setEmployeStatusActive');
Route::get('/getActiveStausEmployeeStaus','Employees@allActiveEmployee');
Route::get('/getDeActiveStausEmployeeStaus','Employees@allDeActiveEmployee');  ///

Route::match(array('GET','POST'),'/newRequestInsert','RequestHandeler@inserNewRequest'); // insert New Request
Route::match(array('GET','POST'),'/setRequestStatusDeActive','RequestHandeler@deActiveRequestStatus');//set status de Active
Route::match(array('GET','POST'),'/setRequestStatusActive','RequestHandeler@ActiveRequestStatus'); // set status active
Route::get('/getActiveStausRequests','RequestHandeler@allActiveRequests');  // return all active requests
Route::get('/getDeActiveStausRequests','RequestHandeler@allDeActiveRequests');   // return all De active requests
Route::match(array('GET','POST'),'/getRequestBaseOnId','RequestHandeler@getRequestBasesOnId');   // getRequest Bases on Id
Route::match(array('GET','POST'),'/getServiceManRequestBaseOnIdwhichNeedtoDo','RequestHandeler@getRequestBasesOnServiceManIdWhichActiveAndAccepted');

Route::match(array('GET','POST'),'/getRequestBaseOnFirebaseId','RequestHandeler@getRequestBasesOnUserFirebaseId');   // getRequest Bases on Id
Route::match(array('GET','POST'),'/setAcceptRequest','RequestHandeler@acceptRequest');   // getRequest Bases on service man Id, get request made to that service man
Route::match(array('GET','POST'),'/setRejectRequest','RequestHandeler@DeAcceptRequest'); 
Route::get('/getAllRequests','RequestHandeler@getAllRequest'); 

Route::match(array('GET','POST'),'/getRequestBaseOnServiceManId','RequestHandeler@getRequestBasesOnServiceManId'); 

///////////////////////////////////////////////
Route::match(array('GET','POST'),'/newBrandInsertProfile','BrandController@inserNewBrandProfile'); // insert New Brand profile
Route::match(array('GET','POST'),'/newBrandRegister','BrandController@registerNewBrand'); // insert New Brand profile
Route::match(array('GET','POST'),'/getBrandBasesOnId','BrandController@getBrandBaseOnId');
Route::match(array('GET','POST'),'/getBrandBasesOnEmail','BrandController@getEmployeeBaseOnEmail');
