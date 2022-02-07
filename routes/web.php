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

// e-learning
Route::get('/login1','Auth1Controller@login')->name('login');
Route::post('/postlogin1','Auth1Controller@postlogin');
Route::get('/logout1','Auth1Controller@logout');

Route::group(['middleware' => ['auth','checkRole:Admin','checkCode:1']],function(){

    Route::get('/user','UserController@index');
    Route::get('/user/create','UserController@create');
    Route::post('/user/store','UserController@store');
    
    Route::get('/mahasiswa','MahasiswaController@index');
    Route::get('/mahasiswa/create','MahasiswaController@create');
    Route::post('/mahasiswa/store','MahasiswaController@store');
    Route::get('/mahasiswa/edit/{id}','MahasiswaController@edit');
    Route::post('/mahasiswa/update/{id}','MahasiswaController@update');
    Route::get('/mahasiswa/delete/{id}','MahasiswaController@delete');

    Route::get('/dosen','DosenController@index');
    Route::get('/dosen/create','DosenController@create');
    Route::post('/dosen/store','DosenController@store');
    Route::get('/dosen/edit/{id}','DosenController@edit');
    Route::post('/dosen/update/{id}','DosenController@update');
    Route::get('/dosen/delete/{id}','DosenController@delete');

});