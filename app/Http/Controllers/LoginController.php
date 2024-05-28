<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function User(){
        $url="user.login";
        $data=compact("url");
        return view("login")->with($data);
    }
    public function Admin(){
        $url="admin.login";
        $data=compact("url");
        return view("login")->with($data);
    }
    public function Userauthenticate(Request $request)
    {
       $validate=validator::make($request->all(),[
           "email"=> ["required","email"],
           "password"=> ["required",],

       ]);
       if ($validate->fails()){
        return redirect()->route("admin.loginpage")->withErrors($validate)->withInput();
       }
       elseif(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])){
        
            return redirect()->route('user.dashboard')->with('success','logged In');
       }
       else{
        return redirect()->route('user.loginpage')->with('error','login failed');
       }
    }

    public function Adminauthenticate(Request $request)
    {
       $validate=validator::make($request->all(),[
           "email"=> ["required","email"],
           "password"=> ["required",],

       ]);
       if ($validate->fails()){
        return redirect()->route("admin.loginpage")->withErrors($validate)->withInput();
       }
       elseif (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
       {
            return redirect()->route('admin.dashboard')->with('success','logged In');
       }
       else{
        return redirect()->route('admin.loginpage')->with('error','login failed');
       }
       
    }

    public function Userlogout(Request $request)
    {
     Auth::logout();
     return redirect()->route('user.loginpage');
    }

    public function Adminlogout(Request $request)
    {
     Auth::logout();
     return redirect()->route('admin.loginpage');
    }

}
