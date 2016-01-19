<?php

Route::group(['namespace' => 'Facilinfo\Blog\App\Http\Controllers', 'prefix'=>'blog', 'middleware' => 'web'], function() {

    //CATEGORIES
    Route::resource('categories', 'BlogCategoryController');

});