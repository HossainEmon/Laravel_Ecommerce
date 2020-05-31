<?php

namespace App\Http\Controllers\Frontend\newsletter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class NewsletterController extends Controller
{
	  
    public function StoreNewsletter(Request $request){
    	$validatedData = $request->validate([
        'email' => 'required|unique:newsletters|max:55',
    ]); 
    	$data=array();
    	$data['email']=$request->email;
    	DB::table('newsletters')->insert($data);
    	 $notification=array(
                 'messege'=>'Thanks for Subscribring',
                     'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);

    }
      public function OrderTracking(Request $request)
      {
        $code=$request->code;

        $track=DB::table('orders')->where('status_code',$code)->first();
        if($track){
            return view('pages.track',compact('track'));
        }else{
            $notification=array(
                'messege'=>'Status Code Invalid',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
      }
  
}
