<?php

Route::group(['namespace' => 'Facilinfo\Blog\App\Http\Controllers', 'prefix'=>'blog', 'middleware' => ['web', 'role:admin']], function() {

    //CATEGORIES
    Route::resource('categories', 'BlogCategoryController');

});

Route::group(['namespace' => 'Facilinfo\Blog\App\Http\Controllers', 'prefix'=>'blog', 'middleware' => ['web', 'role:admin']], function() {

    //POSTS
    Route::resource('posts', 'BlogPostController');

});