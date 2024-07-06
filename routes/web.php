<?php

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Student/Parent Urls
Route::group(['as'=>'user.', 'prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function() {
    
    Route::get('dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard');    
    
});

//Teachers Url
Route::group(['as'=>'teacher.', 'prefix'=>'teacher', 'middleware'=>['isTeacher','auth','PreventBackHistory']], function() {

    Route::get('dashboard', [App\Http\Controllers\TeacherController::class, 'dashboard'])->name('dashboard');  
    Route::get('user-add', [App\Http\Controllers\TeacherController::class, 'addUser'])->name('user.add'); 
    Route::post('create-user', [App\Http\Controllers\TeacherController::class, 'createUser'])->name('user.create'); 
    Route::get('user/{id}/edit', [App\Http\Controllers\TeacherController::class, 'editUser'])->name('user.edit'); 
    Route::post('update-user', [App\Http\Controllers\TeacherController::class, 'updateUser'])->name('update.user');
    Route::get('user-delete/{id}',[App\Http\Controllers\TeacherController::class,'deleteUser'])->name('user.delete');   
    
    Route::get('posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
    Route::get('post-add', [App\Http\Controllers\PostController::class, 'addPost'])->name('post.add'); 
    Route::post('create-post', [App\Http\Controllers\PostController::class, 'createPost'])->name('post.create');     
    Route::get('post/{id}/edit', [App\Http\Controllers\PostController::class, 'editPost'])->name('post.edit'); 
    Route::post('update-post', [App\Http\Controllers\PostController::class, 'updatePost'])->name('update.post');
    Route::get('post-delete/{id}',[App\Http\Controllers\PostController::class,'deletePost'])->name('post.delete');
    
});

//Admin Urls
Route::group(['as'=>'admin.', 'prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function() {

    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');    
    Route::get('user-add', [App\Http\Controllers\AdminController::class, 'addUser'])->name('user.add'); 
    Route::post('create-user', [App\Http\Controllers\AdminController::class, 'createUser'])->name('user.create'); 
    Route::get('user/{id}/edit', [App\Http\Controllers\AdminController::class, 'editUser'])->name('user.edit'); 
    Route::post('update-user', [App\Http\Controllers\AdminController::class, 'updateUser'])->name('update.user');
    Route::get('user-delete/{id}',[App\Http\Controllers\AdminController::class,'deleteUser'])->name('user.delete');    
    
    Route::get('posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
    Route::get('post-add', [App\Http\Controllers\PostController::class, 'addPost'])->name('post.add'); 
    Route::post('create-post', [App\Http\Controllers\PostController::class, 'createPost'])->name('post.create');     
    Route::get('post/{id}/edit', [App\Http\Controllers\PostController::class, 'editPost'])->name('post.edit'); 
    Route::post('update-post', [App\Http\Controllers\PostController::class, 'updatePost'])->name('update.post');
    Route::get('post-delete/{id}',[App\Http\Controllers\PostController::class,'deletePost'])->name('post.delete');
    
});