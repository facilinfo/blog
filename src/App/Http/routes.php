<?php

Route::group(['namespace' => 'Facilinfo\Blog\App\Http\Controllers', 'prefix'=>'blog', 'middleware' => ['web', 'role:admin']], function() {

    //CATEGORIES
    Route::resource('categories', 'BlogCategoryController');

});

Route::group(['namespace' => 'Facilinfo\Blog\App\Http\Controllers', 'prefix'=>'blog', 'middleware' => ['web']], function() {

    //POSTS
    Route::resource('posts', 'BlogPostController');
    //PERMISSIONS
    Route::resource('permissions', 'BlogPermissionController');
    Route::get('permissions/create', ['uses' => 'BlogPermissionController@createPermissions']);

    //ROLES
    Route::resource('roles', 'BlogRoleController');

    //USERS
    Route::resource('users', 'BlogUserController');

});


Route::group(['namespace' => 'Facilinfo\Blog\App\Http\Controllers\Auth', 'middleware' => 'web'], function () {


    Route::get('login', ['uses'=>'AuthController@getLogin']);
    Route::post('login', ['uses'=>'AuthController@postLogin']);
    Route::get('logout', ['uses'=>'AuthController@logout']);
    Route::get('register', ['uses'=>'AuthController@getRegister']);
    Route::post('register', ['uses'=>'AuthController@postRegister']);
    Route::get('confirm/{id}/{token}', ['uses'=>'AuthController@getConfirm']);
   // Route::get('password/reset', ['uses'=>'AuthController@getLogin']);

    Route::controllers([
        'password' => 'PasswordController'
    ]);

});

Route::group(['namespace' => 'Facilinfo\Blog\App\Http\Controllers', 'middleware' => 'web'], function () {

    Route::get('/home', 'BlogHomeController@index');


});


