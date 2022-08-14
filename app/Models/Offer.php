<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = "offers";
    protected $fillable=['id','name_ar','name_en','details_ar','details_en','price','created_at','updated_at']; 
    protected $hidden =['created_at','updated_at'];
    public $timestamps = false;
}
