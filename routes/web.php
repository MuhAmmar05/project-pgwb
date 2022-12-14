<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard_Controller;
use App\Http\Controllers\Contact_Controller;
use App\Http\Controllers\Project_Controller;
use App\Http\Controllers\Siswa_Controller;
use App\Http\Controllers\Login_Controller;

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


Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/project', function () {
    return view('project');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::middleware('guest')->group(function(){
    Route::get('login', [Login_Controller::class, 'index'])->name('login');
    Route::post('login', [Login_Controller::class, 'authenticate']);

});

Route::middleware('auth')->group(function () {
    Route::post('logout', [Login_Controller::class, 'logout']);
    Route::resource('dashboard', Dashboard_Controller::class);
    Route::get('mastersiswa/{id_siswa}/hapus', [Siswa_Controller::class, 'hapus'])->name('mastersiswa.hapus');
    Route::resource('mastersiswa', Siswa_Controller::class);
    Route::resource('masterproject', Project_Controller::class);
    Route::get('masterproject/{id_siswa}/hapus', [Project_Controller::class, 'hapus'])->name('masterproject.hapus');
    Route::get('masterproject/tambah/{id_siswa}', [Project_Controller::class, 'tambah'])->name('masterproject.tambah');
    Route::resource('mastercontact', Contact_Controller::class);

    Route::get('/mastercontact/create/{id_siswa}', [Contact_Controller::class, 'create'])->name('mastercontact.tambah');
    Route::get('/tambahjenis', [Contact_Controller::class, 'tambahjenisview']);
    Route::post('/tambahjenis/store', [Contact_Controller::class, 'tambahjenis']);
    Route::post('/mastercontact/store/{id_siswa}', [Contact_Controller::class, 'store']);
    Route::post('/mastercontact/hapus/{id_siswa}', [Contact_Controller::class, 'hapus'])->name('mastercontact.hapus');
    Route::post('/mastercontact/delete/{id_siswa}', [Contact_Controller::class, 'destroy']);
    
});

