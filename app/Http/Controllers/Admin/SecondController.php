<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SecondController extends Controller
{
    public function __construct()
    {
       $this -> middleware(middleware:'auth')->except(methods:'showString1');
    }

    public function showString0(){

        return "stistc string0";
    }

    public function showString1(){

        return "stistc string1";
    }

    public function showString2(){

        return "stistc string2";
    }

    public function showString3(){

        return "stistc string3";
    }
}
