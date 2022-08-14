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

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;
use App\Http\Controllers\Admin\SecondController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Route::get('/', function () {
//     $data=[];
//     $data['id']=4;
//     $data['name']='Basel Ahmed';
//     return view('welcome',$data);
// });


Route::get('/', function(){

    $obj = new stdClass();
     $obj-> name="basel";
     $obj-> id=2;
     $obj-> grand="male";

   return view('welcome', compact('obj'));
});

Route::get('/landing', function(){

    return view(view:'landing');
});


Route::get('/about', function(){

    return view(view:'about');
});

// Route Parmater

Route::get('/test2{id}', function($id){

    return $id;
});



Route::get('/test3{id?}', function(){

    return "Wlcome";
});


Route::get('/show-number/{id}', function($id){

    return"wlcometo ". $id;
})-> name('a');

Route::get('/show-number/{id?}', function($id){

    return "wlcome".$id;
})-> name('b');


// Route name 

Route::namespace('Front')->group(function(){

   // all route  only  access controaller or methods in folder in Front
    Route ::get ('users','UserController@ShowUserName');

}); 

// Route::prefix('users')->group(function(){
//     Route ::get ('show','UserController@ShowUserName');
//     Route ::delete ('delete','UserController@ShowUserName');
//     Route ::get ('edit','UserController@ShowUserName');
//     Route ::put ('update','UserController@ShowUserName');
// });



Route::group(['prefix'=>'users','middleware'=>'auth'],function(){

    // Set Of Routes

    Route::get('/',function(){
        return 'work';
    });
    // Route::get('show','UserController@ShowUserName');
    // Route::delete('delete','UserController@ShowUserName');
    // Route::get('edit','UserController@ShowUserName');
    // Route::put('update','UserController@ShowUserName');  

});
Route::get('check',function(){
    return 'middleware';
})-> middleware('auth');


Route::group(['namespace'=>'Admin'],function(){
    Route::get('second','SecondController@showString0')->middleware('auth');
    Route::get('second1','SecondController@showString1');
    Route::get('second2','SecondController@showString2');
    Route::get('second3','SecondController@showString3')->middleware('auth');
});
Route::get('First','Front\FirstController@showString');
//Route::get('second','Admin\SecondController@showString0'); 
//Route::get('user','Front\UserController@ShowUserName');
 
 Route::get('login', function(){
     return "Must be login To Access This Route";
 })-> name('login');
// Route::group(['middleware'=>'auth'],function(){
//     Route::get('users','UserController@index')
// });


Route::resource('news','NewController2');


// Route::get('news','NewController2@index');
// Route::post('news','NewController2@store');
// Route::get('news/create','NewController2@create');
// Route::get('news/{id}/edit','NewController2@edit');
// Route::post('news/{id}','NewController2@updute');
// Route::post('news/{id}','NewController2@delete');




Route::get('index','Front\UserController@getIndex');

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');




Route::get('/home', 'HomeController@index')->name('home');


Route:: get('fillable','CrudController@getOffers');


    Route::group([
        'prefix' => LaravelLocalization::setLocale(),
	    'middleware' =>['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
     ],function(){
   Route:: group(['prefix'=>'offers'],function(){
   Route::get('store','CrudController@store');
   Route::get('create','CrudController@create'); 
   Route::get('all','CrudController@getalloffers');
   Route::get('edit/{offer_id}','CrudController@editOffer');
   Route::post('update/{offer_id}','CrudController@updateOffer')->name('offers.update'); 
   Route::post('store','CrudController@store')->name('offers.store'); 
  
   
  });

});
