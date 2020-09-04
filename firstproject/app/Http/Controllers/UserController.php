<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\User;
use Laravel\Ui\Presets\React;

class UserController extends Controller
{
    public function profile() {
        return view('profile', array('user' => Auth::user()));
    }
    public function update_avatar(Request $request){

        if($request->hasfile('avatar')){
            $user = Auth::user();
            $avatar = $request->file('avatar');
            $request->file('avatar')->move(public_path().'/uploads/avatars', $filename);

            $name       = $_FILES['avatar']['name'];
            $temp_name  = $_FILES['avatar']['tmp_name'];

        if (move_uploaded_file($temp_name, public_path().'/uploads/avatars'.$name)) {


            $user->avatar = $name;
            $user->save();


        }

        }
        return view('profile', array('user' => Auth::user()));


    }
    public function edit() {
        if (Auth::user()){
            $user = User::find(Auth::user()->id);
            if ($user){
            return view('profile')->withUser($user);

            }else{

                return redirect()->back();

            }
        } else {

                return redirect()->back();

            }
    }
    public function update(Request $request){
        $user = User::find(Auth::user()->id);
        if ($user){

            $validate = null;

            if(Auth::user()->email === $request['email']){

                $validate = $request->validate([

                    'name' => 'required|min:2',
                    'email' => 'required|email'
                ]);

            }else{
                $validate = $request->validate([

                    'name' => 'required|min:2',
                    'email' => 'required|email|unique:users'
                ]);
            }
            if ($validate){

                   $user->name = $request['name'];
                   $user->email = $request['email'];

                   if ($request->hasfile('avatar')) {
                        $filename = $user->id . '-avatar.' . 'png';
                        $request->file('avatar')->move(public_path().'/uploads/avatars', $filename);
                        $user->avatar = $filename;
                   }

                    $user->save();

                   return redirect()->back();
            }



            }else{

                return redirect()->back();

            }


    }
}