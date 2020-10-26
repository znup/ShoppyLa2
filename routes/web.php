<?php

use Illuminate\Support\Facades\Route;
use App\Category;

Route::get('/', function () {
    return view('templatemain');
});

Route::resource('categories', 'CategoryController');
Route::get('categories-autocomplete', 'CategoryController@index');
Route::get('categories-autocomplete-ajax', 'CategoryController@searcher');

Route::resource('products', 'ProductController');

/*//Route::get('categories/searcher', 'CategoryController@searcher');
//Route::get('categories-search', 'CategoryController');
Route::get('categories-search-ajax', 'CategoryController@searcher');

*/
/*
Route::get('/','CategoryController@index');
Route::post('/categories/searcher', 'CategoryController@searcher')->name('categories.searcher');
*/