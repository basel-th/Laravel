<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class UserController extends Controller
{
    
public function ShowUserName(){

    return ' Basel Ahmed ';
}  
public function getIndex(){

    // $data=[];
    // $data['id']=4;
    // $data['name']='Basel Ahmed';

    // $obj = new \stdClass();

    // $obj -> name = 'Basel';
    // $obj -> id  = 5;
    // $obj -> gender ='male';
    ////compact(varname:'obj')

    $data=['basel','ahmed ','ali'];


    
    return view(view:'welcome',compact('data'));
    

}

}
