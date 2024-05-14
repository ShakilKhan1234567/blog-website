<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagviewController extends Controller
{
    function tag_view($id){
        $tag_id = Tag::find($id);
        $blogs = Blog::where('category_id', $tag_id->category_id)->get();
        return view('frontend.tag_view', [
            'blogs'=>$blogs,
        ]);
    }
}
