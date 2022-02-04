<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/userlist','UserController@index')->name('userlist');
//INSERT
Route::get('/insert_user','UserController@create')->name('insertusr');
Route::post('/save_user','UserController@store')->name('saveusr');
//DELETE
Route::get('/User/{id}','UserController@delete')->name('deleteusr');
//UPDATE
Route::get('/Useru/{id}','UserController@edit')->name('updateusr');
Route::post('/Users/{id}','UserController@update')->name('saveupdt');