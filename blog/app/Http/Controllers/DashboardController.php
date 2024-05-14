<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Popularpost;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function dashboard(){
        $blog = Blog::count();
        $popular = Popularpost::count();
        $user = User::count();
        $subscriber = Subscriber::count();
        return view('dashboard',[
            'blog'=>$blog,
            'popular'=>$popular,
            'user'=>$user,
            'subscriber'=>$subscriber,
        ]);
    }

    function user_list(){
        $users = User::where('id', '!=', Auth::id())->get();
        return view('backend.user.user_list',[
            'users'=>$users,
        ]);
    }
}
