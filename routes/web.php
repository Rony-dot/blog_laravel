<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/','PagesController@home');
//Route::get('/about','PagesController@about');

Route::get('/',[PagesController::class,'home'])->name('home.page');
Route::get('/about',[PagesController::class,'about'])->name('about.page');
Route::get('/services',[PagesController::class,'services'])->name('services.page');
Route::resource('posts',PostsController::class);
Route::get('/posts',[PostsController::class,'index'])->name('posts.page');
Route::put('/posts/delete/{id}',[PostsController::class,'delete'])->name('posts.delete');


