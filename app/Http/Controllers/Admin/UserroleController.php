<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class UserroleController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function UserRole()
    {
    	$user=DB::table('admins')->where('type',2)->get();
    	return view('admin.role.all_role',compact('user'));
    }

    public function CreateAdmin()
    {
    	return view('admin.role.create');
    }

    public function UserStore(Request $request)
    {
    	$data=array();
    	$data['name']=$request->name;
    	$data['phone']=$request->phone;
    	$data['email']=$request->email;
    	$data['password']=Hash::make($request->password);
    	$data['category']=$request->category;
    	$data['blog']=$request->blog;
    	$data['report']=$request->report;
    	$data['message']=$request->message;
    	$data['coupon']=$request->coupon;
    	$data['order']=$request->order;
    	$data['role']=$request->role;
    	$data['comment']=$request->comment;
    	$data['product']=$request->product;
    	$data['other']=$request->other;
    	$data['return']=$request->return;
    	$data['setting']=$request->setting;
        $data['stock']=$request->stock;
    	$data['type']=2;

    	DB::table('admins')->insert($data);
    	$notification=array(
    		'message'=>'Child Admin Create Successfully',
    		'alert-type'=>'success'
    	);
    	return Redirect()->back()->with($notification);
    }

    public function UserDelete($id)
    {
    	DB::table('admins')->where('id',$id)->delete();
    	  	$notification=array(
    		'message'=>'Admin Delete Successfully',
    		'alert-type'=>'success'
    	);
    	return Redirect()->back()->with($notification);
    }

    public function UserEdit($id)
    {
    	$user=DB::table('admins')->where('id',$id)->first();
    	return view('admin.role.edit_role',compact('user'));
    }

    public function UserUpdate(Request $request)
    {
    	$id=$request->id;
    		$data=array();
    	$data['name']=$request->name;
    	$data['phone']=$request->phone;
    	$data['email']=$request->email;
    	$data['category']=$request->category;
    	$data['blog']=$request->blog;
    	$data['report']=$request->report;
    	$data['message']=$request->message;
    	$data['coupon']=$request->coupon;
    	$data['order']=$request->order;
    	$data['role']=$request->role;
    	$data['comment']=$request->comment;
    	$data['product']=$request->product;
    	$data['other']=$request->other;
    	$data['return']=$request->return;
    	$data['setting']=$request->setting;
        $data['stock']=$request->stock;

    	DB::table('admins')->where('id',$id)->update($data);
    	$notification=array(
    		'message'=>'Child Admin Update Successfully',
    		'alert-type'=>'success'
    	);
    	return Redirect()->route('create.user.role')->with($notification);
    }
}
