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

        Admin::created(['email'=>$email, 'password'=>$hash]);
        $_SESSION['admin'] = $email;

        return redirect('home')->with('message','You are logined');
    }

    function login(StorePostRequest $request){
        $email = $request->email;
        $password = $request->password;

        $admin = Admin::select('username','password')
                            ->where([
                            ['email', '=' ,$email]
                            ])->get();

            if(!empty($admin[0]->username) && Hash::check($password,$admin[0]->password) ){
                $_SESSION['admin'] = $email;

                return redirect('/home')->with('message','You are logined');
            }else{
                return redirect('/login')->with('err','Login failed');
            }
    }
}
