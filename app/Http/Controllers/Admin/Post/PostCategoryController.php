<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PostCategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function PostCategory(){

    	$post_category=DB::table('post_category')->get();
    	return view('admin.post.post_category',compact('post_category'));
    }
    public function StorePostCategory(Request $request)
    {
    	$data=array();
    	$data['category_name_en']=$request->category_name_en;
    	$data['category_name_bn']=$request->category_name_bn;
		DB::table('post_category')->insert($data);
		$notification=array(
                 'messege'=>'Successfully Post Category Inserted',
                     'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);

    }
    public function DeletePostCategory($id)
    {
    	DB::table('post_category')->where('id',$id)->delete();
    	$notification=array(
                 'messege'=>'Successfully Post Category Deleted',
                     'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);
    }

    public function EditPostCategory($id)
    {
    	$post_category=DB::table('post_category')->where('id',$id)->first();

    	return view('admin.post.edit_post_category',compact('post_category'));
    }

    public function UpdatePostCategory(Request $request,$id)
    {
    	$data=array();
    	$data['category_name_en']=$request->category_name_en;
    	$data['category_name_bn']=$request->category_name_bn;
    	DB::table('post_category')->where('id',$id)->update($data);
    	$notification=array(
                 'messege'=>'Successfully Post Category updated',
                     'alert-type'=>'success'
                         );
        return Redirect()->route('post.category')->with($notification);

    }
}

 // $data=array();
    // $data['category_name']=$request->category_name;
    // DB::table('categories')->insert($data);