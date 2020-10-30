<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('templatemain');
});

Route::resource('categories', 'CategoryController');

Route::resource('products', 'ProductController');
