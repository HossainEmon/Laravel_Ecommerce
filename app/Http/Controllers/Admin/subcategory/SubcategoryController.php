<?php

namespace App\Http\Controllers\Admin\subcategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Subcategory;
use DB;






class SubcategoryController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function SubCategory(){
    	$category=DB::table('categories')->get();
    	$subcategory=DB::table('subcategories')
    		->join('categories','subcategories.category_id','categories.id')
    		->select('subcategories.*','categories.category_name')
    		->get();
    	return view('admin.subcategory.subcategory',compact('category','subcategory'));
    }


    public function StoreSubcategory(Request $request){
    	 $validatedData = $request->validate([
        'category_id' => 'required',
        'subcategory_name' => 'required',
    ]);
    	 $data=array();
    	 $data['category_id']=$request->category_id;
    	 $data['subcategory_name']=$request->subcategory_name;
    	 DB::table('subcategories')->insert($data);
    	  $notification=array(
                 'messege'=>'Successfully Subcategory Inserted',
                     'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);

    }

    public function DeleteSubcategory($id){

        DB::table('subcategories')->where('id',$id)->delete();
          $notification=array(
                 'messege'=>'Successfully Subcategory Deleted',
                     'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);
    }

    public function EditSubcategory($id){
        $subcategory=DB::table('subcategories')->where('id',$id)->first();
        $category=DB::table('categories')->get();
        return view('admin.subcategory.edit_subcategory',compact('subcategory','category'));
    }

    public function UpdateSubcategory(Request $request,$id){
      $data=array();
         $data['category_id']=$request->category_id;
         $data['subcategory_name']=$request->subcategory_name;
         DB::table('subcategories')->where('id',$id)->update($data);
          $notification=array(
                 'messege'=>'Successfully Subcategory Updated',
                     'alert-type'=>'success'
                         );
        return Redirect()->route('subcategory')->with($notification);
     }
    
}
