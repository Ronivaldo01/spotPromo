<?php

Route::resource('admin/products', 'Admin\ProductController');

Route::get('admin', function () {
})->name('admin');


Route::resource('admin/categories', 'Admin\CategoryController');

Route::get('/', function () {
    return view('welcome');
});


