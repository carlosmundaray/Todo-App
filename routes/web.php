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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
        Route::get('/', function () {
            return view('welcome');
        });
         // Start Of Routs Todo
        Route::namespace('Front')->group(function () {
          Route::get('/todo', 'TodosController@index')->name('todo');
          Route::get('todo/{todo}', 'TodosController@show')->name('todo.show');
          Route::get('/create', 'TodosController@create')->name('todo.create');
          Route::post('/create','TodosController@store')->name('todo.store');
          Route::get('/todo/{todo}/edit','TodosController@edit')->name('todo.edit');
          Route::post('/todo/{todo}','TodosController@update')->name('todo.update');
          Route::get('/todo/{todo}/delete','TodosController@destroy')->name('todo.delete');
          Route::get('todo/{todo}/complete', 'TodosController@complete')->name('todo.complete');


    });//  Of Routs Todo






});


