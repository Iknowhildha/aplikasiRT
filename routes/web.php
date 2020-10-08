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

Route::get('/', function () {
    return redirect('login');
});

//Route Login
Route::get('/beranda', 'UserController@index');
Route::get('/login', 'UserController@login');
Route::post('/loginPost', 'UserController@loginPost');
Route::get('/register', 'UserController@register');
Route::post('/registerPost', 'UserController@registerPost');
Route::get('/logout', 'UserController@logout');

// Route Data Warga
Route::get('/warga', 'UserController@show');
Route::get('/editProfile/{id}', 'UserController@editProfil');
Route::get('/detail/{id}', 'UserController@detail');
Route::patch('/updateProfil/{id}', 'UserController@updateProfil');
Route::get('/deleteWarga/{id}', 'UserController@deleteWarga');

Route::get('/detailprofil/{id}', 'UserController@detailProfil');

//Route validasi status
Route::get('/validasi/{id}', 'UserController@validasi');


Route::get('/detailwarga', function () {
    return view('admin.warga.detail');
});

Route::get('/agenda', function () {
    return view('warga.agenda');
});

Route::get('/keuangan', function () {
    return view('warga.keuangan');
});

Route::get('/warga1', function () {
    return view('admin.warga.warga');
});