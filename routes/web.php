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

// data master
Route::group(['middleware' => ['auth','checkRole:Admin']],function(){
    Route::get('/mahasiswa','MahasiswaController@index');
    Route::get('/mahasiswa/create','MahasiswaController@create');
    Route::post('/mahasiswa/store','MahasiswaController@store');
    Route::get('/mahasiswa/edit/{id}','MahasiswaController@edit');
    Route::post('/mahasiswa/update/{id}','MahasiswaController@update');
    Route::get('/mahasiswa/delete/{id}','MahasiswaController@delete');
});

// e-learning
Route::get('/login1','Auth1Controller@login')->name('login');
Route::post('/postlogin1','Auth1Controller@postlogin');
Route::get('/logout1','Auth1Controller@logout');