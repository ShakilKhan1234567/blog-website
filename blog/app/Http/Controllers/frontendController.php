<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Menu;
use App\Models\Popularpost;
use App\Models\Subscriber;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    function index(){
        $subscribers = Subscriber::count();
        $categories = Category::all();
        $blogs = Blog::all();
        $blog_recents = Blog::latest()->take(4)->get();
        $id = $blogs->first()->id;
        $editor_list = Blog::where('id', '!=', $id)->get();
        $tags = Tag::all();
        $latest_populars = Popularpost::latest()->get();
        $populars = Popularpost::latest()->get();
        $popular_id = $populars->first()->id;
        $popular_two = Popularpost::where('id', '!=', $popular_id)->get();
        $popular_two_id = $popular_two->first()->id;
        $popular_three = Popularpost::where('id', '!=', $popular_id)->where('id', '!=', $popular_two_id)->get();
        $popular_three_id = $popular_three->first()->id;
        $popular_four = Popularpost::where('id', '!=', $popular_id)->where('id', '!=', $popular_two_id)->where('id', '!=', $popular_three_id)->get();

        $banners = Banner::where('status', 1)->get();
        return view('frontend.index', [
            'subscribers'=>$subscribers,
            'categories'=>$categories,
            'blogs'=>$blogs,
            'editor_list'=>$editor_list,
            'tags'=>$tags,
            'banners'=>$banners,
            'blog_recents'=>$blog_recents,

            'latest_populars'=>$latest_populars,
            'populars'=>$populars,
            // 'popular_post'=>$popular_post,
            'popular_two'=>$popular_two,
            'popular_three'=>$popular_three,
            'popular_four'=>$popular_four,
        ]);
    }
    function lifestyle(){
        return view('frontend.lifestyle');
    }

    function menu(){
        $categories = Category::all();
        $menus = Menu::all();
        return view('backend.menu', [
            'categories'=>$categories,
            'menus'=>$menus,
        ]);
    }

    function menu_store(Request $request){
        $request->validate([
            'menu_name'=>'required',
        ]);

        Menu::insert([
            'menu_link'=>$request->menu_link,
            'menu_name'=>$request->menu_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success', 'Successfully Added!');
    }

    function delete_menu($id){
        Menu::find($id)->delete();
        return back()->with('success', 'Successfully Added!');
    }

    function search_page(Request $request){
        $data = $request->all();
        $blogs = Blog::where(function ($q) use ($data){
            if(!empty($data['search_input']) && $data['search_input'] !='' && $data['search_input'] !='undefined'){
              $q->where(function ($q) use ($data){
                $q->where('blog_title', 'like', '%'.$data['search_input'].'%');
              });
            };
        })->get();
        return view('frontend.search_page', [
            'blogs'=>$blogs,
        ]);
    }

    function single_comment($id){
        $comments = Comment::find($id);
        $comments->update([
            'status'=>1,
        ]);
        return view('backend.single_comment',[
            'comments'=>$comments,
        ]);
        return back()->with('success', 'Successfully Added!');
    }

    function status_update($id){
     Comment::find($id)->update([
        'status'=>1,
     ]);
     return back();
    }
}
