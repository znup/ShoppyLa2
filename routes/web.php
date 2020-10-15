<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('templatemain');
});
Route::resource('category', 'CategoryController');
Route::get('category/searcher', 'CategoryController@searcher');

Route::resource('product', 'ProductController');
