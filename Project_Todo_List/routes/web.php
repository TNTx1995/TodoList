<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
    Route::get('/todos','TodoController@index');
    Route::get('/todos/create','TodoController@create');
    Route::get('/todos/edit/{todo}','TodoController@edit');
    Route::post('/todos/create','TodoController@store');
    Route::get('/todos/{todo}/update','TodoController@update')->name('todo.update');
    Route::post('/todos/{todo}/complete','TodoController@complete')->name('todo.complete');
    Route::post('/todos/{todo}/undo','TodoController@undo')->name('todo.undo');
    Route::post('/todos/{todo}/delete','TodoController@delete')->name('todo.delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
