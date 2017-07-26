<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
       '/DeviceRegistration' ,
       '/InserNewNotificatationItem',
       '/InserNewService',
       '/AllService',
       '/InserNewEmployee',
       '/RegisterNewEmployee',
       '/getEmployeeBasesOnEmail',
       '/getEmployeeBasesOnSkill',
       '/setEmployeeStausDeActive',
       '/setEmployeeStausActive',
       '/newRequestInsert',
       '/setRequestStatusDeActive',
       '/setRequestStatusActive',
       '/getRequestBaseOnId',
       '/setAcceptRequest',
       '/setRejectRequest',
       '/getRequestBaseOnFirebaseId',
       '/getRequestBaseOnServiceManId',
       '/getServiceManRequestBaseOnIdwhichNeedtoDo',
       '/getEmployeeBasesOnId',
       '/newBrandInsertProfile',
       '/newBrandRegister',
       '/getBrandBasesOnId',
       '/getBrandBasesOnEmail',
        '/setBrandStausDeActive',
        '/setBrandStausActive'


            
    ];
}
