<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    function store(StorePostRequest $request){
        $email = $request->email;
        $password = $request->password;

        $hash = Hash::make($password);

        Admin::create(['email'=>$email, 'password'=>$hash]);

        return redirect('home')->with('message','You are Sigupped');
    }

    function login(StorePostRequest $request){
        $email = $request->email;
        $password = $request->password;

        $admin = Admin::select('email','password')
                            ->where([
                            ['email', '=' ,$email]
                            ])->get();
        if(!empty($admin[0]->email) && Hash::check($password,$admin[0]->password) ){
            $_SESSION['admin'] = $email;

            return redirect('/home')->with('message','You are logined');
        }else{
            return redirect('/login')->with('err','Login failed');
        }
    }

    function logout(){
        unset($_SESSION['admin']);
        return back()->with('message','You are logouted');
    }
}
