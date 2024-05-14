<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Popularpost;
use App\Models\Reply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SingleblogController extends Controller
{
    function banner_blog($id){
        $banner = Banner::find($id);
        return view('frontend.single_banner_blog', [
            'banner'=>$banner,
        ]);
    }

    function single_blog_page($id){
        $blogs = Blog::find($id);
        $comments = Comment::where('blog_id',$blogs->id)->get();
        Popularpost::insert([
            'category_id'=>$blogs->category_id,
            'user_id'=>Auth::id(),
            'popular_photo'=>$blogs->blog_image,
            'popular_title'=>$blogs->blog_title,
            'popular_desp'=>$blogs->long_desp,
            'created_at'=>Carbon::now(),
        ]);

        return view('frontend.single_blog', [
            'blogs'=>$blogs,
            'comments'=>$comments,
        ]);
    }


    function single_trending_page($id){
        $populars = Popularpost::find($id);
        return view('frontend.single_trending_page', [
            'populars'=>$populars,
        ]);
    }
}
