<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    function store(CreatePostRequest $request){
        $request->validate(['image'=>'|required']);
        
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
        $posts = DB::table('posts')->select('text','image','id')
                     ->get();
        return view('home',[
            'posts' => $posts
        ]);
    }

    function viewUpdate(Request $request){
        if(empty($request->id)) return view('home');
        $post = DB::table('posts')
                   ->select('text','image','id')
                   ->where([
                       ['id','=',$request->id]
                   ])
                   ->get();
        return view('layouts/edit',[
            'post' => $post[0]
        ]);
    }

    function update(CreatePostRequest $request){
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $file->move(public_path().'/images/',$file->getClientOriginalName());

            $image = $file->getClientOriginalName();
            $text = $request->text;
            $post = DB::table('posts')
                        ->where('id','=',$request->id)
                        ->update([
                            'text' => $text,
                            'image'=> $image
                        ]);
            return redirect('home')->with('message', 'updated');
        }else{
            $text = $request->text;
            $post = DB::table('posts')
                        ->where('id','=',$request->id)
                        ->update([
                            'text' => $text
                        ]);
            return redirect('home')->with('message', 'updated');
        }
        
    }

    function delete(Request $request){
        $post = DB::table('posts')
                   ->where([
                       ['id','=',$request->id]
                   ])->delete();
        return back()->with('message','This post is deleted');
    }
}
