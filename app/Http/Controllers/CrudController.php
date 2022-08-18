<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
//use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
//use LaravelLocalization;
use stdClass;

class CrudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

     }

     public function getOffers(){

       return Offer::select('id','name')->get();
     }

    //  public function  store(){

    //   Offer::create([
    //     'name'  => 'offer1',
    //     'price' => '4000',
    //     'detals'=> 'dtails offer',
    //   ]);
    //  }
 
    public function create(){
        return view(view:'offers.create');
           

    }

     public function store(OfferRequest $request){
      //return $request;
      // valiate data before insert to database

       
      //  $rules= $this->getRules(); 
      //  $messages= $this->getMessages();
      //  $validator = Validator :: make($request->all(),$rules,$messages);
      //  if($validator -> fails()){

      //   //return $validator -> errors();
 
      //    return redirect()->back()->withErrors($validator)->withInputs($request->all());

      //  }
    
      
      //insert

      Offer::create([
        "name_ar"=> $request-> name_ar,
        "name_en"=> $request-> name_en,
        "price"=> $request-> price,
        "details_ar"=> $request-> detals_ar,
        "details_en"=> $request-> detals_en,
      ]);
      
      return redirect()->back()->with(['success'=>'تم ا ضافة بنجاح']);
    }

    // protected function getRules(){

    //   return $rules=[
    //     'name'  => 'required|max:100|unique:offers',
    //     'price' => 'required|numeric',
    //     'detals'=> 'required',
    //    ];
    // }

    // protected function getMessages(){

    //   return $Messages=[
    //     'name.required'  => __(key:'messages.offer name required'),
    //     'name.unique'  => __(key:'messages.offer name must be unique'),
    //     'price.numeric'  => __(key:'messages.offer price must be Number'),
    //     'price.required'  => __(key:'messages.price is required'),
    //     'detals.required'  => __(key:'messages.detals is required'),
    //    ];
    // }

    
    public function getalloffers(){
     
      $offers= Offer::select('id',
      'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
      'details_'. LaravelLocalization::getCurrentLocale() . ' as details',
      // 'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
      // 'details_' . LaravelLocalization::getCurrentLocale() . ' as details',
       'price',
       'created_at',
       'updated_at')->get();//retran collection
   
      return view('offers.all',compact('offers'));

    }


    public function editOffer($offer_id){

      //Offer::findOrFail($offer_id);

       $offer=Offer::find($offer_id); //Sreach in given table id only 

       if(!$offer)
        return redirect() -> back() ;
        
        $offer = Offer::select('id','name_ar','name_en','price','details_ar','details_en')-> find($offer_id) ;
        
        return view('offers.edit',compact('offer'));
       
 
       //return $offer_id;

    }

    public function updateOffer(OfferRequest $request,$offer_id){
         
         //valudation 

         // check if offer exists

         $offer =Offer::find($offer_id) ;
        
       if(!$offer)
         return redirect() -> back() ;

        //update data

       $offer ->update($request->all());

        return redirect() -> back()-> with(['success'=>'تم التحديث بنجاح']);

         //return $offer_id;
        // $offer ->update([
        //   'name_ar' => $request->name_ar ,
        //   'name_en' => $request->name_en ,
        //   'price' => $request->price,
        // ]);
        
    }

}
