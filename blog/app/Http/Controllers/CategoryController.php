<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    function category(){
        $categories = Category::all();
        return view('backend.category.category', [
            'categories'=>$categories,
        ]);
    }

    function category_store(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories',
        ]);

        Category::insert([
            'category_name'=>$request->category_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success', 'Successfully Added!');
    }

    function category_delete($id){
      Category::find($id)->delete();
      return back()->with('success', 'Successfully Deleted!');
    }

    function category_edit($id){
       $category_info = Category::find($id);
       return view('backend.category.category_edit', [
        'category_info'=>$category_info,
       ]);
    }

    function category_update(Request $request, $id){
        $request->validate([
            'category_name'=>'required',
           ]);

        Category::find($id)->update([
            'category_name'=>$request->category_name,
           ]);
           return back()->with('success', 'Successfully Updated!');
    }

    function category_show($id){
      $cat_id = Blog::find($id);
      $blogs = Blog::where('category_id', $cat_id->category_id)->get();
      return view('frontend.category_through_view', [
        'blogs'=>$blogs,
      ]);
    }
}
