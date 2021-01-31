<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//admin/item
Route::group([
    'prefix' => 'admin/item',
    'namespace' => 'Admin',
    'as' => 'admin.item.',
], function () {
    Route::get('/', 'ItemController@index')->name('index');
    Route::get('create/', 'ItemController@create')->name('create');
    Route::post('add/', 'ItemController@add')->name('add');
    Route::get('edit/{id}', 'ItemController@edit')->name('edit');
    Route::post('update/{id}', 'ItemController@update')->name('update');
    Route::post('destroy/{id}', 'ItemController@destroy')->name('destroy');
});

Route::group([
    'prefix' => 'cart',
    'as' => 'cart.',
], function () {
    Route::get('/', 'CartController@index')->name('index');
    Route::get('add/{id}', 'CartController@add')->name('add');
    Route::get('remove/{id}', 'CartController@remove')->name('remove');
    Route::get('clear', 'CartController@clear')->name('clear');
});