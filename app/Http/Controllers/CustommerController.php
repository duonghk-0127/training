<?php
namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\Custommer;
use Illuminate\Support\Facades\Hash;

class CustommerController extends Controller
{
    //
    function login(StorePostRequest $request){

            // $validatedData = $request->validate([
            //     'name' => 'required|unique:posts|max:255',
            //     'password' => 'required',
            // ]);
            $name = $request->name;
            $password = $request->password;

            // $hash = Hash::make($password);

            $cus = Custommer::select('username','password')
                            ->where([
                            ['username', '=' ,$name]
                            ])->get();

            if(!empty($cus[0]->username) && Hash::check($password,$cus[0]->password) ){
                $_SESSION['custommer'] = $name;

                return redirect('/welcome')->with('message','You are logined');
            }else{
                return redirect('/')->with('err','Login failed');
            }
        
    }
}
