<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function tag(){
        $tags = Tag::all();
        $categories = Category::all();
        return view('backend.tag', [
            'tags'=>$tags,
            'categories'=>$categories,
        ]);
    }

    function tag_store(Request $request){
        $request->validate([
            'tag'=>'required',
        ]);

        Tag::insert([
            'tag'=>$request->tag,
            'category_id'=>$request->category_id,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success', "Successfully Added!");
    }

    function delete_tag($id){
        Tag::find($id)->delete();
        return back()->with('success', "Successfully Deleted!");
    }
}
