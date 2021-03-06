<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function SiteSetting()
    {
    	$setting=DB::table('sitesetting')->first();
    	return view('admin.sitesetting.site_setting',compact('setting'));
    }

    public function UpdateSetting(Request $request)
    {
    	$id=$request->id;
    	$data=array();
    	$data['phone_one']=$request->phone_one;
    	$data['phone_two']=$request->phone_two;
    	$data['email']=$request->email;
    	$data['company_name']=$request->company_name;
    	$data['company_address']=$request->company_address;
    	$data['facebook']=$request->facebook;
    	$data['youtube']=$request->youtube;
    	$data['instragram']=$request->instragram;
    	$data['twitter']=$request->twitter;
    	DB::table('sitesetting')->where('id',$id)->update($data);
    	$notification=array(
    		'messege'=>'setting Update',
    		'alert-type'=> 'success'
    	);
    	return Redirect()->back()->with($notification);
    }
}
