<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    public function nav_bar(){
        return view('admin.layouts.nav_bar');
    }
    public function changePassword(Request $request){
        $id=$request['id'];
        $password=$request['password'];
        $confirm_password=$request['confirm_password'];

        if($password){
            if($confirm_password){
                if($password==$confirm_password){
                    $user=User::where('id',$id)->first();
                    $user->password=bcrypt($password);
                   $ans=$user->update();
                   if($ans){
                       echo "<div class='alert alert-success'>The password change success.</div>";
                   }else{
                       echo "<div class='alert alert-danger'>don't change password,Please try again.</div>";
                   }
                }else{
                    echo "<div class='alert alert-danger'>The password and confirm password must match.</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>The confirm password field required.</div>";
            }
        }else{
            echo "<div class='alert alert-danger'>The password field required.</div>";
        }



    }
    public function deleteUserRole(Request $request){
        $id=$request['id'];
        $user=User::find($id);
        $user->delete();
        return redirect()->back();
    }
    public function updateUserRole(Request $request){
        $id=$request['id'];
        $user=User::where('id',$id)->first();
        $user->syncRoles($request['user_role']);
        $user->update();
        return redirect()->back();
    }
    public function employees(){
        $user=User::all();
        $roles=Role::all();
        return view('admin.employees')->with(['users'=>$user])->with(['roles'=>$roles]);
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
}
