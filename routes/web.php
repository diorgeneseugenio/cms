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

Route::get('/', 'BlogController@index')->name('blog');

Route::get('/noticia/{id}', 'BlogController@show')->name('noticia');

Route::prefix('admin')->group(function(){
    Auth::routes();

    Route::group([
        'namespace' => 'Admin\\',
        'as' => 'admin.',
        'middleware' => 'auth'
    ], function(){

        Route::get('/',function(){
            return redirect("/admin/login");
        });

        Route::name("dashboard")->get('/dashboard', function(){
            return view('admin.dashboard');
        });
        Route::resource('news', 'NewsController');
        Route::resource('users', 'UsersController');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
