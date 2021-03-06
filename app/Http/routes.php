<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'user.signup'
]);

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'user.signin'
]);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'user.logout'
    ]);
    
    Route::get('/account', [
        'uses' => 'UserController@getAccount',
        'as' => 'user.account'
    ]);
    
    Route::post('/updateaccount', [
        'uses' => 'UserController@postUpdateAccount',
        'as' => 'account.update'
    ]);
    
    Route::get('/userimage/{filename}', [
        'uses' => 'UserController@getUserImage',
        'as' => 'account.image'
    ]);
    
    Route::get('/dashboard', [
        'uses' => 'PostController@getDashboard',
        'as' => 'dashboard'
    ]);
    
    Route::post('/createpost', [
        'uses' => 'PostController@postCreatePost',
        'as' => 'post.create'
    ]);
    
    Route::get('/deletepost/{post_id}', [
        'uses' => 'PostController@getDeletePost',
        'as' => 'post.delete'
    ]);
    
    Route::post('/editpost', [
        'uses' => 'PostController@postEditPost',
        'as' => 'post.edit'
    ]);
    
    Route::post('/likepost', [
        'uses' => 'PostController@postLikePost',
        'as' => 'post.like'
    ]);
});
