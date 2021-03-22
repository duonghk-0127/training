<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use Illuminate\Http\Request;

class InternController extends Controller
{
    //
    function store(Request $request){
        $name = $request->name;
        // $intern = new Intern;
        // $intern->name = $name;
        // $intern->save();


        Intern::create(['name' => $name]);
        
        //$table = Intern::paginate(5);
        //return view('newView',['datas' => $table]);
        return redirect('newView');
    }
}
