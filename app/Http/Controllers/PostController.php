<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    function store(Request $request){
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $file->move(public_path().'/images/',$file->getClientOriginalName());

            $image = $file->getClientOriginalName();
            $text = $request->text;

            $post = DB::table('posts')->insert([
                'text' => $text,
                'image' => $image
            ]);

            return redirect('home');
        }
    }

    function showAll(Request $request){
        $posts = DB::table('posts')->select('text','image')
                     ->get();
        return view('home',[
            'posts' => $posts
        ]);
    }
}
