<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/contact", function(){
    return view('contact');
});

Route::get("/post", function(){
    return view('post');
});

Route::get("/about", function(){
    return view('about');
});

Route::group([
    'prefix'=>'dashboard'
], function(){

    
    Route::get("/post/actions/add", [PostController::class, "showAdd"])->name('admin.posts.add');

    Route::resource("/post", PostController::class)->except(['create']);
    

    Route::resource("/", DashboardController::class)->only(['index']);

    Route::get("/users", [UsersController::class, "getUsers"]);
    Route::post("/users", [UsersController::class, "createUsers"]);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
