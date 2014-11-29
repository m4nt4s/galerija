<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', array('as' => 'home', 'uses' => 'HomeController@home'));


App::missing(function ($exception) {
    return Redirect::route('home');
});

// route to show the login form
Route::get('log', array('as' => 'log', 'uses' => 'UsersController@showLogin'));
// route to show the login form
Route::get('reg', array('as' => 'reg', 'uses' => 'UsersController@showReg'));

// route to process the form
Route::post('log', array('as' => 'log', 'uses' => 'UsersController@doLogin'));
// route to process the form
Route::post('reg', array('as' => 'reg', 'uses' => 'UsersController@doReg'));

Route::get('logout', array('uses' => 'UsersController@logout'));
Route::get('activate/{code}', array('as' => 'acc-activate', 'uses' => 'UsersController@activate'));


//Route::get('admin', array('before' => 'auth|role', 'as' => 'admin', 'uses' => 'AdminController@show'));


// admin group controller
Route::group(array('prefix' => 'admin', 'before' => 'auth|role'), function () {
        Route::get('/', array('as' => 'admin', 'uses' => 'AdminController@show'));
        Route::resource('photos', 'PhotosController');
        Route::get('photos/delete/{id}', array('as' => 'admin.photos.delete', 'uses' => 'PhotosController@delete'));

        Route::resource('category', 'CategoryController');
        Route::get('category/delete/{id}', array('as' => 'admin.category.delete', 'uses' => 'CategoryController@delete'));

        Route::resource('category.photos', 'CategoryphotosController');
        Route::get('category/photos/delete/{id}', array('as' => 'admin.category.photos.delete', 'uses' => 'CategoryphotosController@delete'));

});

// users group account controller
Route::group(array('prefix' => 'user', 'before' => 'auth'), function () {
        Route::get('account', array('as' => 'account', 'uses' => 'AccountController@showDash'));

        Route::get('change-password', array('as' => 'change-pass', 'uses' => 'AccountController@changePassIndex'));
        Route::post('change-password', array('as' => 'change-pass', 'uses' => 'AccountController@changePassPost'));

        Route::get('change-email', array('as' => 'change-email', 'uses' => 'AccountController@changeEmailIndex'));
        Route::post('change-email', array('as' => 'change-email', 'uses' => 'AccountController@changeEmailPost'));

        Route::get('change-information', array('as' => 'change-info', 'uses' => 'AccountController@changeInfoIndex'));
        Route::post('change-information', array('as' => 'change-info', 'uses' => 'AccountController@changeInfoPost'));
});


Route::get('test', function(){
         $photo = Photo::findOrFail(18);
         $photo->comments()->create(['user_id' => Auth::user()->id, 'text' => 'makrarena']);
       return 'Done';
});

/*Event::listen('illuminate.query', function($sql){
        var_dump($sql);
});*/

Route::get('odesk', function(){
       return Hash::make('laravel4');
});