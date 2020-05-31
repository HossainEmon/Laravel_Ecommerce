<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$setting=DB::table('settings')->get();
    	return view('admin.setting.index',compact('setting'));
    }
   public function create()
   {
   		$setting=DB::table('settings')->get();
   		return view('admin.setting.create',compact('setting'));
   }

   public function store(Request $request)
   {
   		$data=array();
   		$data['vat']=$request->vat;
   		$data['shipping_charge']=$request->shipping_charge;
   		$data['shopname']=$request->shopname;
   		$data['email']=$request->email;
   		$data['phone']=$request->phone;
   		$data['address']=$request->address;

   		$logo = $request->file('logo');

   	

   		$image_name= hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
        Image::make($logo)->resize(300,300)->save('public/media/logo/'.$image_name);
        $data['logo']='public/media/logo/'.$image_name;

          $setting=DB::table('settings')->insert($data);

                    $notification=array(
                     'messege'=>'Successfully Setting Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification); 

   }

   public function destroy($id)
   {
   $setting=DB::table('settings')->where('id',$id)->first();

   	$logo=$setting->logo;
   	 unlink($logo);
     DB::table('settings')->where('id',$id)->delete();
       $notification=array(
                  'messege'=>'Successfully setting Delete ',
                  'alert-type'=>'success'
                    );
         return Redirect()->back()->with($notification);
   }

   public function ViewSetting($id)
   {

   	$setting=DB::table('settings')->where('id',$id)->first();
   	return view('admin.setting.show',compact('setting'));
   }

}
 

    