<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FirstController extends Controller
{
    function  first(){
        // $abc = "abc";
        // return view('newView', ['abc' => $abc])->with('message','IT WORKS!');

        $table = DB::table('interns')
                    ->select('name')
                    ->get();
        return view('newView',['datas' => $table]);
    }

    function store(Request $request){
        $name = $request->name;

        $table = DB::table('interns')
                    ->insert(['name' => $name]);

        return $this->first();
    }
}
