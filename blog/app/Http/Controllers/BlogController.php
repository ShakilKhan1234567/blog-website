<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    function blog(){
        $categories = Category::all();
        return view('backend.blog.add_blog', [
            'categories'=>$categories,
        ]);
    }

    function blog_list(){
        $blogs = Blog::simplePaginate(2);
        return view('backend.blog.blog_list', [
            'blogs'=>$blogs,
        ]);
    }

    function blog_store(Request $request){
        $request->validate([
            'blog_title'=>'required',
            'blog_desp'=>'required',
            'long_desp'=>'required',
            'blog_image'=>'required',
        ]);

        $photo = $request->blog_image;
        $extension = $photo->extension();
        $file_name = 'blog'.'.'.rand(0,9999).'.'.$extension;
        image::make($photo)->save('uploads/blog/'.$file_name);

        Blog::insert([
            'category_id'=>$request->category_id,
            'user_id'=>Auth::id(),
            'blog_title'=>$request->blog_title,
            'blog_desp'=>$request->blog_desp,
            'long_desp'=>$request->long_desp,
            'blog_image'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success', 'Successfully Added!');
    }

    function delete_blog($id){
       Blog::find($id)->delete();
       return back()->with('success', 'Successfully Deleted!');
    }

    function edit_blog($id){
        $blog_id = Blog::find($id);
        $categories = Category::all();
        $blogs = Blog::all();
        return view('backend.blog.edit_blog', [
            'categories'=>$categories,
            'blog_id'=>$blog_id,
        ]);
        return back()->with('success', 'Successfully Updated!');
    }

    function blog_update(Request $request, $id){

        if($request->blog_image == null){

        Blog::find($id)->update([
            'category_id'=>$request->category_id,
            'blog_title'=>$request->blog_title,
            'blog_desp'=>$request->blog_desp,
        ]);
        }
        else{

            $photo = $request->blog_image;
            $extension = $photo->extension();
            $file_name = 'blog'.'.'.rand(0,9999).'.'.$extension;

            Image::make($photo)->save(public_path('uploads/blog/' . $file_name));

            Blog::find($id)->update([
                'category_id'=>$request->category_id,
                'blog_title'=>$request->blog_title,
                'blog_desp'=>$request->blog_desp,
                'blog_image'=>$file_name,
            ]);
        }
        return back()->with('update', 'Successfully Updated!');
    }

    function subscriber(Request $request){
        $request->validate([
           'subscriber'=>'required',
        ]);
        Subscriber::insert([
            'email'=>$request->subscriber,
            'created_at'=>Carbon::now(),
        ]);
        return redirect(url()->previous() .'#subscribe');
    }
}

