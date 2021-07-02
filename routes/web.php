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


// public route
Route::get('/',[PagesController::class,'login'])->name('login.page');
Route::get('/register',[PagesController::class,'register'])->name('register.page');
Route::post('/login/User',[PagesController::class,'loginUser'])->name('login.user');
Route::post('/register/User',[PagesController::class,'registerUser'])->name('register.user');
Route::post('/logout/User',[PagesController::class,'logoutUser'])->name('logout.user');
// private route
Route::middleware(['user.auth'])->group(function (){

    Route::middleware(['user.role:ROLE_ADMIN,ROLE_EDITOR'])->group(function (){
        Route::resource('posts',PostsController::class);
    });

    
    Route::get('/users',[PagesController::class,'users'])->name('users');

    Route::get('/home',[PagesController::class,'home'])->name('home.page');
    Route::get('/about',[PagesController::class,'about'])->name('about.page');
    Route::get('/services',[PagesController::class,'services'])->name('services.page');
    Route::get('/edit/profile',[PagesController::class,'editProfile'])->name('edit.profile');
    Route::put('/update/profile',[PagesController::class,'updateProfile'])->name('update.profile');
    Route::get('/posts',[PostsController::class,'index'])->name('posts.page');
    Route::put('/posts/delete/{id}',[PostsController::class,'delete'])->name('posts.delete');

});



