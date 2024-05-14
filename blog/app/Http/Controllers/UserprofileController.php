<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\Facades\Image;
use Nette\Utils\Random;

class UserprofileController extends Controller
{
    function user_profile(){
        return view('backend.user.user_profile');
    }

    function user_profile_profile(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
        ]);
        User::find(Auth::id())->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        return back()->with('success', 'Successfully Updated!');
    }

    function user_password_update(Request $request){
        $request->validate([
            'current_password'=>'required',
            'new_password'=>[
            'required',
            Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols(),
            ],
            'password_confirmation'=>'required',
        ]);
        $user = User::find(Auth::id());
        if(Hash::check($request->current_password, $user->password)){
            if($request->new_password == $request->password_confirmation){
                User::find(Auth::id())->update([
                    'password'=>$request->new_password,
                  ]);
            }
            else{
                return back()->with('err', 'Password Confirmation does not match!');
            }
            return back()->with('success', 'Successfully Updated!');
        }
        else{
            return back()->with('exist', 'Current password Does Not Match');
        }
    }

    function user_photo_update(Request $request){
      $request->validate([
        'photo'=>'required',
        'photo'=>'image',
        'photo'=>'mimes:jpg,png,JPG,PNG',
      ]);

      if(Auth::user()->photo == null){
        $photo = $request->photo;
        $extension = $photo->extension();
        $file_name = Auth::id().'.'.'user'.rand(0,9999).'.'.$extension;
        image::make($photo)->save('uploads/user/'.$file_name);

        User::find(Auth::id())->update([
           'photo'=>$file_name,
        ]);
        return back()->with('success', 'Successfully Updated!');
      }
      else{
        $delete_from = public_path('uploads/user/'. Auth::user()->photo);
        unlink($delete_from);

        $photo = $request->photo;
        $extension = $photo->extension();
        $file_name = Auth::id().'.'.'user'.rand(0,9999).'.'.$extension;
        image::make($photo)->save('uploads/user/'.$file_name);

        User::find(Auth::id())->update([
           'photo'=>$file_name,
        ]);
        return back()->with('success', 'Successfully Updated!');
      }
    }
}
