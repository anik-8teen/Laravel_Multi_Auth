<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function UserReg(){
        $url="user.add";
        $data=compact("url");
        return view("user_registration")->with($data);
    }
    public function UserDash(){
       
        return view("user_dashboard");
    }
    public function Register(Request $request){
        $validate=validator::make($request->all(),[
            "email"=> "required|email|unique:users",
            "password"=>"required|confirmed",
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
       else{
        $User=User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> Hash::make($request->password),
        ]);
        return redirect()->route("user.loginpage")->with("success","Registration Successful");
       }
    }
}
