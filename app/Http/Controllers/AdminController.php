<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function AdminReg(){
        $url="admin.add";
        $data=compact("url");
        return view("user_registration")->with($data);
    }
    public function AdminDash(){
        return view("admin_dashboard");
    }
    public function Register(Request $request){
        $validate=validator::make($request->all(),[
            "name"=> "required",
            "email"=> "required|email|unique:users",
            "password"=>"required|confirmed",
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
       else{
        $admin=Admin::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> Hash::make($request->password),
        ]);
        
        return redirect()->route("admin.loginpage")->with("success","Registration Successful");
       }
    }
}
