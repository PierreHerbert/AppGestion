<?php

use Illuminate\Support\Facades\Route;

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




Route::group(['namespace' => 'App\Http\Controllers'], function()
{ 

    //Route Login
    Route::group(['middleware' => ['guest']], function() {

        Route::get('/adminconnexion265', 'LoginController@show')->name('login.show');
        Route::post('/adminconnexion265', 'LoginController@login')->name('login.perform');

        // Route::get('/register', 'RegisterController@show')->name('register.show');
        // Route::post('/register', 'RegisterController@register')->name('register.perform');

    });
    //Route Home
    Route::get('/', 'BuilderController@home')->name('index');

    Route::group(['middleware' => ['auth']], function() {
        //Routes Dashboard
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        //Routes des Operations
        Route::group(['prefix' => 'operations'], function() {
            Route::get('/', 'OperationController@index')->name('operation.index');
            Route::get('/create', 'OperationController@create')->name('operation.create');
            Route::post('/create', 'OperationController@store')->name('operation.store');
            Route::get('/{operation}/show', 'OperationController@show')->name('operation.show');
            Route::get('/{operation}/edit', 'OperationController@edit')->name('operation.edit');
            Route::post('/{operation}/update', 'OperationController@update')->name('operation.update');
            Route::delete('/{operation}/delete', 'OperationController@destroy')->name('operation.destroy');
        });

        //Routes des Categorie Opération
        Route::group(['prefix' => 'categorie_operations'], function() {
            Route::get('/', 'CategorieOperationController@index')->name('categorie_operation.index');
            Route::get('/create', 'CategorieOperationController@create')->name('categorie_operation.create');
            Route::post('/create', 'CategorieOperationController@store')->name('categorie_operation.store');
            Route::get('/{categorie_operation}/show', 'CategorieOperationController@show')->name('categorie_operation.show');
            Route::get('/{categorie_operation}/edit', 'CategorieOperationController@edit')->name('categorie_operation.edit');
            Route::post('/{categorie_operation}/update', 'CategorieOperationController@update')->name('categorie_operation.update');
            Route::delete('/{categorie_operation}/delete', 'CategorieOperationController@destroy')->name('categorie_operation.destroy');
        });

        //Routes des Clients
        Route::group(['prefix' => 'clients'], function() {
            Route::get('/', 'ClientsController@index')->name('client.index');
            Route::get('/create', 'ClientsController@create')->name('client.create');
            Route::post('/create', 'ClientsController@store')->name('client.store');
            Route::get('/{client}/show', 'ClientsController@show')->name('client.show');
            Route::get('/{client}/edit', 'ClientsController@edit')->name('client.edit');
            Route::post('/{client}/update', 'ClientsController@update')->name('client.update');
            Route::delete('/{client}/delete', 'ClientsController@destroy')->name('client.destroy');
        });

        //Routes des Builder
        Route::group(['prefix' => 'builder'], function() {
            Route::get('/', 'BuilderController@index')->name('builder.index');
            Route::get('/create', 'BuilderController@create')->name('builder.create');
            Route::post('/create', 'BuilderController@store')->name('builder.store');
            Route::get('/{builder}/edit', 'BuilderController@edit')->name('builder.edit');
            Route::post('/{builder}/update', 'BuilderController@update')->name('builder.update');
            Route::post('/upload_image', 'BuilderController@upload_image')->name('builder.upload');
        });

        //Route Logout
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });

});
