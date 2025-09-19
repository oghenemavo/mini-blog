<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MVC\PostViewController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/new', 'posts.create');
Route::view('/posts', 'posts.index');
Route::view('/posts/{id}', 'posts.show');
