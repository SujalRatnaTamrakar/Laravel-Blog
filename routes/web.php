<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Post;


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
//MAILCHIMP
Route::post('/subscribe', [NewsletterController::class,'subscribe']);
Route::get('/', [PostController::class,'index'])->name('home');
Route::get('/admin/posts/create', [PostController::class,'create'])->middleware('admin');
Route::post('/admin/posts', [PostController::class,'store'])->middleware('admin');

Route::get('/posts/{post:slug}', [PostController::class,'show'] );

Route::post('/posts/{post:slug}/comments', [PostCommentsController::class,'store'] );

Route::get('/categories/{category:slug}',function (Category $category){
    return view('home',[
        'posts' => $category->posts
    ]);
});

Route::get('/authors/{author:username}',function (User $author){
    return view('home',[
        'posts' => $author->posts
    ]);
});

//Register
Route::get('/register', [RegisterController::class,'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class,'create']);
//Login
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);
//Logout
Route::post('/logout',[LogoutController::class,'destroy'])->name('logout');

