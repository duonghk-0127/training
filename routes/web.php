<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;

session_start();
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::post('/','App\Http\Controllers\CustommerController@login')->name('cus-log');

Route::get('/welcome',function(){
    return view('welcome');
    // else return view('login');
})->middleware('welcome');

Route::get('/newView', 'App\Http\Controllers\FirstController@first')->name('get-view');
//Route::post('/newView', 'App\Http\Controllers\FirstController@store')->name('store-itern');
Route::post('/newView', 'App\Http\Controllers\InternController@store')->name('store-itern');

Route::get('/home', 'App\Http\Controllers\PostController@showAll')->name('all-post');

Route::get('/new', function () {
    return view('layouts/newPost');
});

Route::post('/new', 'App\Http\Controllers\PostController@store')->name('new-post');
?>
