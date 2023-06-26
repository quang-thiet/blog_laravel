<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController as ClientPostController;
use App\Mail\SendMail;
use Illuminate\Routing\RouteAction;

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

Route::prefix('/admin')->middleware('checkLogin')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    # Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.list');
    Route::get('/categories/add', [CategoryController::class, 'add'])->name('category.add');
    Route::post('/categories/add', [CategoryController::class, 'store'])->name('category.process.add');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/categories/{id}/edit', [CategoryController::class, 'update'])->name('category.process.edit');
    Route::get('/category/{id}/delete', [CategoryController::class, 'destroy'])->name('category.delete');

    # Posts
    Route::get('/posts', [PostController::class, 'index'])->name('post.list');
    Route::get('/posts/add', [PostController::class, 'add'])->name('post.add');
    Route::post('/posts/add', [PostController::class, 'store'])->name('post.process.add');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/posts/{id}/edit', [PostController::class, 'update'])->name('post.process.edit');
    Route::get('/posts/{id}/delete', [PostController::class, 'destroy'])->name('post.delete');


    # User
    Route::get('/users',[UserController::class,'index'])->name('user.list');
    Route::get('/users/add', [UserController::class, 'add'])->name('users.add');
    Route::post('/users/store',[UserController::class,'store'])->name('user.process.add');
    Route::get('/user/{id}/edit',[UserController::class,'edit'])->name('user.edit');
    Route::post('/users/{id}/update',[UserController::class,'update'])->name('user.process.update');
    Route::get('/users/{id}/delete',[UserController::class, 'destroy'])->name('user.delete');
    Route::get('/users/{id}/profile',[UserController::class,'user_profile'])->name('user.profile');


});
  #comment
  Route::get('/comment',[CommentController::class,'index'])->name('comment.list');
  Route::post('/comment/store',[CommentController::class,'store'])->name('comment.process.add');

 #login
Route::get('/login{id?}', [AuthController::class, 'index'])->name('login');

Route::post('/auth/login', [AuthController::class, 'processLogin'])->name('processLogin');

#register
Route::get('/auth/form-register',[AuthController::class,'formRegister'])->name('register');

Route::post('/auth/register', [AuthController::class, 'processRegister'])->name('processRegister');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('blog.home');

Route::get('/{slug}-{id}', [ClientPostController::class, 'show'])->name('single-post')->where(['slug' => '.*', 'id' => '\d+']);

Route::post('/{slug}-{id}-.html', [ClientPostController::class, 'comment'])->name('send.comment')->where(['slug' => '.*', 'id' => '\d+']);

// route::get('get-mail',[SendMail::class,''])
