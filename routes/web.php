<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Users\Index;
use App\Livewire\Users\Create;
use App\Livewire\Users\Edit;
use App\Livewire\Posts\Posts;
use App\Livewire\Blogs\Index as Blogs;
use App\Livewire\Blogs\Form as BlogForm;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [Index::class,'__invoke'])->name('users.index');
Route::get('/users/create', [Create::class,'__invoke'])->name('users.create');
Route::get('/users/{user}/edit', [Edit::class,'__invoke'])->name('users.edit');
Route::get('/posts', [Posts::class,'__invoke'])->name('posts.index');
Route::get('/blogs', [Blogs::class,'__invoke'])->name('blogs.index');
Route::get('/blog/edit/{id?}', [BlogForm::class,'__invoke'])->name('blogs.edit');
