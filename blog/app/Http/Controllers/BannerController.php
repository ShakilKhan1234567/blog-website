<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    function banner(){
        $categories = Category::all();
        $banners = Banner::all();
        return view('backend.banner', [
            'categories'=>$categories,
            'banners'=>$banners,
        ]);
    }

    function banner_store(Request $request){
        $request->validate([
            'category_id'=>'required',
            'banner_photo'=>'required',
            'banner_title'=>'required',
            'banner_desp'=>'required',
        ]);

        $photo = $request->banner_photo;
        $extension = $photo->extension();
        $file_name = 'banner'.'.'.rand(0,9999).'.'.$extension;
        image::make($photo)->save('uploads/banner/'.$file_name);

        Banner::insert([
            'user_id'=>Auth::id(),
            'category_id'=>$request->category_id,
            'banner_photo'=>$file_name,
            'banner_title'=>$request->banner_title,
            'banner_desp'=>$request->banner_desp,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success', 'Successfully Added!');
    }

    function banner_status($id){
       $banner = Banner::find($id);
        if($banner->status == 0){
            Banner::find($id)->update([
                'status'=>1,
            ]);
        }
        else{
            Banner::find($id)->update([
                'status'=>0,
            ]);
        }
        return back()->with('success', 'Successfully Updated!');
    }

    function delete_banner($id){
        Banner::find($id)->delete();
        return back()->with('success', 'Successfully Deleted!');
    }
}
