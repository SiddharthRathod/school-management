<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Redirect to the appropriate dashboard based on the user's role
Route::get('/dashboard', function () {
    if (auth()->user()->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    } elseif (auth()->user()->hasRole('teacher')) {
        return redirect()->route('teacher.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes - Only accessible by users with the 'admin' role
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/add-user', [AdminController::class, 'addUser'])->name('user.add');
    Route::post('/create-user', [AdminController::class, 'createUser'])->name('user.create');
    Route::get('/edit-user/{id}', [AdminController::class, 'editUser'])->name('user.edit');
    Route::put('/update-user', [AdminController::class, 'updateUser'])->name('user.update');
    Route::get('/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('user.delete');

    Route::get('posts', [PostController::class, 'index'])->name('posts');
    Route::get('post-add', [PostController::class, 'addPost'])->name('post.add'); 
    Route::post('create-post', [PostController::class, 'createPost'])->name('post.create');
    Route::get('post/{id}/edit', [PostController::class, 'editPost'])->name('post.edit'); 
    Route::post('update-post', [PostController::class, 'updatePost'])->name('update.post');
    Route::get('post-delete/{id}',[PostController::class,'deletePost'])->name('post.delete');
});

// Teacher Routes - Only accessible by users with the 'teacher' role
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('dashboard');
    Route::get('/add-user', [TeacherController::class, 'addUser'])->name('user.add');
    Route::post('/create-user', [TeacherController::class, 'createUser'])->name('user.create');
    Route::get('/edit-user/{id}', [TeacherController::class, 'editUser'])->name('user.edit');
    Route::post('/update-user', [TeacherController::class, 'updateUser'])->name('user.update');
    Route::get('/delete-user/{id}', [TeacherController::class, 'deleteUser'])->name('user.delete');    

    Route::get('posts', [PostController::class, 'index'])->name('posts');
    Route::get('post-add', [PostController::class, 'addPost'])->name('post.add'); 
    Route::post('create-post', [PostController::class, 'createPost'])->name('post.create');
    Route::get('post/{id}/edit', [PostController::class, 'editPost'])->name('post.edit'); 
    Route::post('update-post', [PostController::class, 'updatePost'])->name('update.post');
    Route::get('post-delete/{id}',[PostController::class,'deletePost'])->name('post.delete');
});

require __DIR__.'/auth.php';
