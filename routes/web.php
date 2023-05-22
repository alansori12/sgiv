<?php

use Illuminate\Support\Facades\Route;

// e-learning
use App\Http\Controllers\E_learning\UserController;
use App\Http\Controllers\E_learning\MahasiswaController;
use App\Http\Controllers\E_learning\DosenController;
use App\Http\Controllers\E_learning\MatkulController;
use App\Http\Controllers\E_learning\KelasController;

// e-jurnal
use App\Http\Controllers\E_Jurnal\UserController1;
use App\Http\Controllers\E_Jurnal\DosenController1;
use App\Http\Controllers\E_Jurnal\MahasiswaController1;
use App\Http\Controllers\E_Jurnal\ArtikelController;
use App\Http\Controllers\E_Jurnal\SkripsiController;

Route::get('/', function () {
    return view('welcome');
});

// // e-learning

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login','e_learning.admin.auths.login')->name('login');
        Route::post('/postlogin',[UserController::class,'postlogin'])->name('postlogin');
    });
    Route::middleware(['auth:web'])->group(function(){
        Route::group(['middleware' => 'checkRole:Super Admin'],function(){
            Route::get('/user',[UserController::class,'index'])->name('user');
            Route::view('/user/create','e_learning.admin.users.create')->name('user.create');
            Route::post('/user/store',[UserController::class,'store'])->name('user.store');
            Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
            Route::post('/user/update/{id}',[UserController::class,'update'])->name('user.update');
            Route::get('/user/delete/{id}',[UserController::class,'delete'])->name('user.delete');
        });
        Route::group(['middleware' => 'checkRole:Super Admin,Admin'],function(){    
            Route::view('/home','e_learning.admin.home')->name('home');
            Route::get('/logout',[UserController::class,'logout'])->name('logout');

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

            Route::get('/matkul',[MatkulController::class,'index'])->name('matkul');
            Route::view('/matkul/create','e_learning.admin.matkul.create')->name('matkul.create');
            Route::post('/matkul/store',[MatkulController::class,'store'])->name('matkul.store');
            Route::get('/matkul/edit/{id}',[MatkulController::class,'edit'])->name('matkul.edit');
            Route::post('/matkul/update/{id}',[MatkulController::class,'update'])->name('matkul.update');
            Route::get('/matkul/delete/{id}',[MatkulController::class,'delete'])->name('matkul.delete');

            Route::get('/kelas',[KelasController::class,'index'])->name('kelas');
            Route::get('/kelas/create',[KelasController::class,'create'])->name('kelas.create');
            Route::post('/kelas/store',[KelasController::class,'store'])->name('kelas.store');
            Route::get('/kelas/edit/{id}',[KelasController::class,'edit'])->name('kelas.edit');
            Route::post('/kelas/update/{id}',[KelasController::class,'update'])->name('kelas.update');
            Route::get('/kelas/delete/{id}',[KelasController::class,'delete'])->name('kelas.delete');
            Route::get('/kelas/member/{id}',[KelasController::class,'member'])->name('kelas.member');
            Route::post('/kelas/member/add/{id}',[KelasController::class,'add'])->name('kelas.member.add');
            Route::get('/kelas/member/remove/{id}',[KelasController::class,'remove'])->name('kelas.member.remove');
        });    
    });
});

Route::prefix('dosen')->name('dosen.')->group(function(){
    Route::middleware(['guest:dosen'])->group(function(){
        Route::view('/login','e_learning.dosen.auths.login')->name('login');
        Route::post('/postlogin',[DosenController::class,'postlogin'])->name('postlogin');
    });
    Route::middleware(['auth:dosen'])->group(function(){
        Route::get('/home',[DosenController::class,'home'])->name('home');
        Route::get('/kelas/{id}',[DosenController::class,'kelas'])->name('kelas');
        Route::get('/logout',[DosenController::class,'logout'])->name('logout');
    });
});

Route::prefix('mahasiswa')->name('mahasiswa.')->group(function(){
    Route::middleware(['guest:mahasiswa'])->group(function(){
        Route::view('/login','e_learning.mahasiswa.auths.login')->name('login');
        Route::post('/postlogin',[MahasiswaController::class,'postlogin'])->name('postlogin');
    });
    Route::middleware(['auth:mahasiswa'])->group(function(){
        Route::get('/home',[MahasiswaController::class,'home'])->name('home');
        Route::get('/logout',[MahasiswaController::class,'logout'])->name('logout');
    });
});

// E-Jurnal
Route::get('/index',[ArtikelController::class,'halamanawal'])->name('index');
Route::get('/about',[ArtikelController::class,'tentang'])->name('about');
Route::get('/jurnal',[ArtikelController::class,'jurnal'])->name('jurnal');
Route::get('/jurnal/cari',[ArtikelController::class,'jurnalcari'])->name('jurnalcari');
Route::get('/skripsi',[SkripsiController::class,'skripsi'])->name('skripsi');
Route::get('/skripsi/cari',[SkripsiController::class,'skripsicari'])->name('skripsicari');

Route::prefix('admin1')->name('admin1.')->group(function(){
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login','e_jurnal.admin.auths.login')->name('login');
        Route::post('/postlogin',[UserController1::class,'postlogin'])->name('postlogin');
    });
    Route::middleware(['auth:web'])->group(function(){
        Route::get('/dashboard',[UserController1::class,'dashboard'])->name('dashboard');
        Route::view('/password/edit','e_jurnal.admin.editpw')->name('password.edit');
        Route::post('/password/update',[UserController1::class,'updateps'])->name('password.update');
        Route::get('/user',[UserController1::class,'index'])->name('user');
        Route::view('/user/create','e_jurnal.admin.users.create')->name('user.create');
        Route::post('/user/store',[UserController1::class,'store'])->name('user.store');
        Route::get('/user/edit/{id}',[UserController1::class,'edit'])->name('user.edit');
        Route::post('/user/update/{id}',[UserController1::class,'update'])->name('user.update');
        Route::get('/user/delete/{id}',[UserController1::class,'delete'])->name('user.delete');
        Route::view('/home','e_jurnal.admin.home')->name('home');
        Route::get('/logout',[UserController1::class,'logout'])->name('logout');

        Route::get('/dosen',[DosenController1::class,'index'])->name('dosen');
        Route::view('/dosen/create','e_jurnal.admin.dosen.create')->name('dosen.create');
        Route::post('/dosen/store',[DosenController1::class,'store'])->name('dosen.store');
        Route::get('/dosen/edit/{id}',[DosenController1::class,'edit'])->name('dosen.edit');
        Route::post('/dosen/update/{id}',[DosenController1::class,'update'])->name('dosen.update');
        Route::get('/dosen/delete/{id}',[DosenController1::class,'delete'])->name('dosen.delete');

        Route::get('/mahasiswa',[MahasiswaController1::class,'index'])->name('mahasiswa');
        Route::view('/mahasiswa/create','e_jurnal.admin.mahasiswa.create')->name('mahasiswa.create');
        Route::post('/mahasiswa/store',[MahasiswaController1::class,'store'])->name('mahasiswa.store');
        Route::get('/mahasiswa/edit/{id}',[MahasiswaController1::class,'edit'])->name('mahasiswa.edit');
        Route::post('/mahasiswa/update/{id}',[MahasiswaController1::class,'update'])->name('mahasiswa.update');
        Route::get('/mahasiswa/delete/{id}',[MahasiswaController1::class,'delete'])->name('mahasiswa.delete');

        Route::get('/jurnal',[ArtikelController::class,'index'])->name('artikel');
        Route::get('/jurnal/masuk',[ArtikelController::class,'indexmasuk'])->name('artikel.masuk');
        Route::get('/jurnal/abstrak/{id}',[ArtikelController::class,'showabstrak'])->name('showabstrak');
        Route::get('/jurnal/artikel/{id}',[ArtikelController::class,'showartikel'])->name('showartikel');
        Route::get('/jurnal/edit/{id}',[ArtikelController::class,'edit'])->name('artikel.edit');
        Route::post('/jurnal/update/{id}',[ArtikelController::class,'update'])->name('artikel.update');
        Route::get('/jurnal/delete/{id}',[ArtikelController::class,'destroy'])->name('artikel.delete');

        Route::get('/skripsi',[SkripsiController::class,'index'])->name('skripsi');
        Route::get('/skripsi/masuk',[SkripsiController::class,'indexmasuk'])->name('skripsi.masuk');
        Route::get('/skripsi/pendahuluan/{id}',[SkripsiController::class,'showpendahuluan'])->name('showpendahuluan');
        Route::get('/skripsi/lengkap/{id}',[SkripsiController::class,'showskripsi'])->name('showskripsi');
        Route::get('/skripsi/edit/{id}',[SkripsiController::class,'edit'])->name('skripsi.edit');
        Route::post('/skripsi/update/{id}',[SkripsiController::class,'update'])->name('skripsi.update');
        Route::get('/skripsi/delete/{id}',[SkripsiController::class,'destroy'])->name('skripsi.delete');
    });
});

Route::prefix('dosen1')->name('dosen1.')->group(function(){
    Route::middleware(['guest:dosen'])->group(function(){
        Route::view('/login','e_jurnal.dosen.auths.login')->name('login');
        Route::post('/postlogin',[DosenController1::class,'postlogin'])->name('postlogin');
    });
    Route::middleware(['auth:dosen'])->group(function(){
        Route::get('/home',[DosenController1::class,'home'])->name('home');
        Route::view('/password/edit','e_jurnal.dosen.editpw')->name('password.edit');
        Route::post('/password/update',[DosenController1::class,'updateps'])->name('password.update');
        Route::get('/logout',[DosenController1::class,'logout'])->name('logout');
        Route::get('/dosen/tentang',[DosenController1::class,'tentang'])->name('about');
        Route::get('/jurnaldosen',[ArtikelController::class,'indexdosen'])->name('artikeldosen');
        Route::get('/jurnaldosen/cari',[ArtikelController::class,'indexdosencari'])->name('indexdosencari');
        Route::get('/jurnalsaya',[ArtikelController::class,'artikeldosen'])->name('artikeldsn');
        Route::get('/jurnaldosen/create',[ArtikelController::class,'penulisdsn'])->name('artikeldosen.create');
        Route::post('/jurnaldosen/store',[ArtikelController::class,'tambahartikeldsn'])->name('artikeldosen.store');
        Route::get('/skripsidosen',[SkripsiController::class,'indexskripsidsn'])->name('skripsidosen');
        Route::get('/skripsidosen/cari',[SkripsiController::class,'skripsicaridsn'])->name('skripsidosencari');
    });
});
 
Route::prefix('mahasiswa1')->name('mahasiswa1.')->group(function(){
    Route::middleware(['guest:mahasiswa'])->group(function(){
        Route::view('/login','e_jurnal.mahasiswa.auths.login')->name('login');
        Route::post('/postlogin',[MahasiswaController1::class,'postlogin'])->name('postlogin');
    });
    Route::middleware(['auth:mahasiswa'])->group(function(){
        Route::get('/home',[MahasiswaController1::class,'home'])->name('home');
        Route::view('/password/edit','e_jurnal.mahasiswa.edit')->name('password.edit');
        Route::post('/password/update',[MahasiswaController1::class,'updateps'])->name('password.update');
        Route::get('/logout',[MahasiswaController1::class,'logout'])->name('logout');
        Route::get('/mahasiswa/tentang',[MahasiswaController1::class,'tentang'])->name('about');
        Route::get('/jurnalmahasiswa',[ArtikelController::class,'indexmahasiswa'])->name('artikelmahasiswa');
        Route::get('/jurnalmahasiswa/cari',[ArtikelController::class,'indexmahasiswacari'])->name('indexmahasiswacari');
        Route::get('/jurnalsaya',[ArtikelController::class,'artikelsaya'])->name('artikelsaya');
        Route::get('/jurnalmahasiswa/create',[ArtikelController::class,'penulismhs'])->name('artikelmahasiswa.create');
        Route::post('/jurnalmahasiswa/store',[ArtikelController::class,'tambahartikel'])->name('artikelmahasiswa.store');
        Route::get('/skripsimahasiswa',[SkripsiController::class,'indexskripsi'])->name('skripsimahasiswa');
        Route::get('/skripsimahasiswa/cari',[SkripsiController::class,'indexskripsicari'])->name('skripsimahasiswacari');
        Route::get('/skripsiku',[SkripsiController::class,'skripsiku'])->name('skripsiku');
        Route::get('/skripsiku/create',[SkripsiController::class,'tambahskripsi'])->name('skripsiku.create');
        Route::post('/skripsiku/store',[SkripsiController::class,'uploadskripsi'])->name('skripsiku.store');
    });
}); 