<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    function comment(){
        $comments = Comment::all();
        return view('backend.comment', [
            'comments'=>$comments,
        ]);
    }

    function comment_store(Request $request, $id){
        $request->validate([
            'comment'=>'required',
            'email'=>'required',
            'name'=>'required',
        ]);

       $blog_id = Blog::find($id);
        Comment::insert([
            'blog_id'=>$blog_id->id,
            'comment'=>$request->comment,
            'email'=>$request->email,
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        return redirect(url()->previous().'#comment');

    }

    function delete_comment($id){
        Comment::find($id)->delete();
        return back()->with('success', 'Successfully Deleted!');
    }

    function comment_reply($id){
        $comment_id = Comment::find($id);
        return view('frontend.comment_reply', [
            'comment_id'=>$comment_id,
        ]);
    }

    function reply_store(Request $request){
        $request->validate([
            'reply'=>'required',
            'name'=>'required',
        ]);
        Reply::insert([
            'comment_id'=>$request->comment_id,
            'reply'=>$request->reply,
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success', 'Successfully Replied!');
    }
}
