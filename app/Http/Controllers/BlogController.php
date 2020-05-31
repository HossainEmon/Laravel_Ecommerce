<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class BlogController extends Controller
{
    public function blog()
    {
    	$post=DB::table('posts')
    	->join('post_category','posts.category_id','post_category.id')
    	->select('posts.*','post_category.category_name_en','post_category.category_name_bn')
    	->get();


    	//return response()->json($post);
    	return view('pages.blog',compact('post'));
    }

    public function Bangla()
    {
    	Session::get('lang');
    	session()->forget('lang');
    	Session::put('lang','bangla');
    	return redirect()->back();
    }

    public function English()
    {
    	Session::get('lang');
    	session()->forget('lang');
    	Session::put('lang','english');
    	return redirect()->back();
    }

    public function ProductSearch(Request $request)
    {
        $brands=DB::table('brands')->get();
        $item=$request->search;
        $products=DB::table('products')
                /*->join('brands','products.brand_id','brands.id')
                ->select('products.*','brands.brand_name')*/
                ->where('product_name','LIKE',"%{$item}%")
                /*->orWhere('brand_name','LIKE',"%{$item}%")*/
                ->paginate(20);
            return view('pages.search',compact('brands','products'));
    }
}
