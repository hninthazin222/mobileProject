<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function userImg($user_image){
        $img=Storage::disk('user_image')->get($user_image);
        return response($img,200);
    }
    public function imgUpload(Request $request){
        $this->validate($request,[
            'user_image'=>'required | mimes:jpeg,jpg,png'
        ]);

        $user_name=Auth::user()->name;
        $user_file=$request->file('user_image');

        Storage::disk('user_image')->put($user_name,file::get($user_file));
        return redirect()->back();
    }
    public function getUserProfile(){
        $pu=Auth::User();
        return view('admin.user_profile')->with(['userName'=>$pu]);
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('/');
    }
    public function getError(){
        return view('admin.layouts.error');
    }
    public function getLogin(Request $request){
        $this->validate($request,[
            'name'=>'required|exists:users',
            'password'=>'required'
        ]);
        $name=$request['name'];
        $password=$request['password'];
        if(Auth::attempt(['name'=>$name,'password'=>$password])){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('err','Please,try again Login.');
        }
    }
    public function getRegister(Request $request){
        $this->validate($request,[
           'name'=>'required|unique:users',
            'password'=>'required|min:6',
            'password_again'=>'required|same:password'
        ]);

        $user=new User();
        $user->name=$request['name'];
        $user->password=bcrypt($request['password']);
        $user->save();
        $user->syncRoles($request['user_role']);
        return redirect()->back()->with('info',"The register created success.");
    }
    public function register(){
        $roles=Role::all();
        return view('admin.auth.register')->with(['roles'=>$roles]);
    }
    public function login(){
        return view('admin.auth.login');
    }
}
