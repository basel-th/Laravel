<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FirstController extends Controller
{
    public  function showString(){
        return " the stiac is frist string "; 
    }
}     
