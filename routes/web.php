<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[
    'uses'=>'AuthController@login',
    'as'=>'/'
]);
Route::get('/login',[
    'uses'=>'AuthController@login',
    'as'=>'/login'
]);

Route::post('/login',[
    'uses'=>'AuthController@getLogin',
    'as'=>'login'
]);


Route::group(['middleware'=>'role:Admin'],function (){


    Route::get('/register',[
        'uses'=>'AuthController@register',
        'as'=>'register'
    ]);
    Route::post('/register',[
        'uses'=>'AuthController@getRegister',
        'as'=>'register'
    ]);

});

Route::group(['middleware'=>'auth'],function (){

    Route::get('/userImg/{user_image}',[
        'uses'=>'AuthController@userImg',
        'as'=>'userImg'
    ]);
    Route::post('/imgUpload',[
        'uses'=>'AuthController@imgUpload',
        'as'=>'imgUpload'
    ]);
    Route::get('/user_profile',[
        'uses'=>'AuthController@getUserProfile',
        'as'=>'user_profile'
    ]);
    Route::get('/dashboard',[
        'uses'=>'HomeController@dashboard',
        'as'=>'dashboard'
    ]);
    Route::get('/error',[
        'uses'=>'AuthController@getError',
        'as'=>'error'
    ]);
    Route::get('/logout',[
        'uses'=>'AuthController@getLogout',
        'as'=>'logout'
    ]);
});