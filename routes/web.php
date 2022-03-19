<?php

use Illuminate\Support\Facades\Route;

// e-learning
use App\Http\Controllers\E_learning\UserController;
use App\Http\Controllers\E_learning\MahasiswaController;
use App\Http\Controllers\E_learning\DosenController;

Route::get('/', function () {
    return view('welcome');
});

// e-learning

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login','e_learning.admin.auths.login')->name('login');
        Route::post('/postlogin',[UserController::class,'postlogin'])->name('postlogin');
    });
    Route::middleware(['auth:web'])->group(function(){
        Route::view('/home','e_learning.admin.home')->name('home');
        Route::get('/logout',[UserController::class,'logout'])->name('logout');
        
        Route::get('/user',[UserController::class,'index'])->name('user');
        Route::view('/user/create','e_learning.admin.users.create')->name('user.create');
        Route::post('/user/store',[UserController::class,'store'])->name('user.store');

        Route::get('/mahasiswa',[MahasiswaController::class,'index'])->name('mahasiswa');
        Route::view('/mahasiswa/create','e_learning.admin.mahasiswa.create')->name('mahasiswa.create');
        Route::post('/mahasiswa/store',[MahasiswaController::class,'store'])->name('mahasiswa.store');
        Route::get('/mahasiswa/edit/{id}',[MahasiswaController::class,'edit'])->name('mahasiswa.edit');
        Route::post('/mahasiswa/update/{id}',[MahasiswaController::class,'update'])->name('mahasiswa.update');
        Route::get('/mahasiswa/delete/{id}',[MahasiswaController::class,'delete'])->name('mahasiswa.delete');

        Route::get('/dosen',[DosenController::class,'index'])->name('dosen');
        Route::view('/dosen/create','e_learning.admin.dosen.create')->name('dosen.create');
        Route::post('/dosen/store',[DosenController::class,'store'])->name('dosen.store');
        Route::get('/dosen/edit/{id}',[DosenController::class,'edit'])->name('dosen.edit');
        Route::post('/dosen/update/{id}',[DosenController::class,'update'])->name('dosen.update');
        Route::get('/dosen/delete/{id}',[DosenController::class,'delete'])->name('dosen.delete');
    });
});

Route::prefix('mahasiswa')->name('mahasiswa.')->group(function(){
    Route::middleware(['guest:mahasiswa'])->group(function(){
        Route::view('/login','e_learning.mahasiswa.auths.login')->name('login');
        Route::post('/postlogin',[MahasiswaController::class,'postlogin'])->name('postlogin');
    });
    Route::middleware(['auth:mahasiswa'])->group(function(){
        Route::view('/home','e_learning.mahasiswa.home')->name('home');
        Route::get('/logout',[MahasiswaController::class,'logout'])->name('logout');
    });
});

Route::prefix('dosen')->name('dosen.')->group(function(){
    Route::middleware(['guest:dosen'])->group(function(){
        Route::view('/login','e_learning.dosen.auths.login')->name('login');
        Route::post('/postlogin',[DosenController::class,'postlogin'])->name('postlogin');
    });
    Route::middleware(['auth:dosen'])->group(function(){
        Route::view('/home','e_learning.dosen.home')->name('home');
        Route::get('/logout',[DosenController::class,'logout'])->name('logout');
    });
});

Route::group(['middleware' => ['auth','checkRole:Admin','checkCode:1']],function(){

});