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
Route::get('/login', 'UserController@login');
Route::post('/loginPost', 'UserController@loginPost');
Route::get('/register', 'UserController@register');
Route::post('/registerPost', 'UserController@registerPost');
Route::get('/logout', 'UserController@logout');

Route::group(['prefix'=>'admin'], function() {
//beranda admin
Route::get('/beranda', 'UserController@beranda');
// Route Data Warga Sisi Admin
Route::get('/warga', 'UserController@warga');
Route::get('/editProfile/{id}', 'UserController@editProfil');
Route::get('/detail/{id}', 'UserController@detail');
Route::patch('/updateProfil/{id}', 'UserController@updateProfil');
Route::get('/deleteWarga/{id}', 'UserController@deleteWarga');
// Route Data User Sisi Admin
Route::get('/user', 'UserController@user');
Route::get('/tambahuser', 'UserController@tambahuser');
Route::post('/simpanuser', 'UserController@simpanuser');
Route::get('/edituser/{id}', 'UserController@edituser');
Route::get('/detailuser/{id}', 'UserController@detailuser');
Route::post('/updateuser/{id}', 'UserController@updateuser');
Route::get('/deleteuser/{id}', 'UserController@deleteuser');
//Route validasi status
Route::get('/validasi/{id}', 'UserController@validasi');
//Route Crud Agenda
Route::resource('/agenda', 'AgendaController');
//Route Crud Inventaris
Route::resource('/inventaris', 'InventarisController');
//Route Crud Keuangan
Route::resource('/keuangan', 'KeuanganController');
//Route Crud surat Pengantar
Route::resource('/suratpengantar', 'SuratpengantarController');
//Route Crud Berita
Route::resource('/berita', 'BeritaController');
});

//beranda warga
Route::get('/beranda', 'WargaController@beranda');

//Route Data Warga
Route::get('/warga', 'WargaController@warga');
Route::get('/editProfile/{id}', 'WargaController@editProfil');
Route::get('/detail/{id}', 'WargaController@detail');
Route::patch('/updateProfil/{id}', 'WargaController@updateProfil');
Route::get('/deleteWarga/{id}', 'WargaController@deleteWarga');

//Route Detail Profil
Route::get('/detailprofil/{id}', 'UserController@detailProfil');

//Detail Warga
Route::get('/detailwarga', function () {
    return view('admin.warga.detail');
});

//Route Crud Agenda
Route::resource('/agenda', 'AgendaController');
//Route Crud Inventaris
Route::resource('/inventaris', 'InventarisController');
//Route Crud surat Pengantar
Route::resource('/suratpengantar', 'SuratpengantarController');
//Route Crud Keuangan
Route::resource('/keuangan', 'KeuanganController');
//Route Crud Berita
Route::resource('/berita', 'BeritaController');
Route::get('beritalist/{id}', 'BeritaController@listberitaku');
Route::get('komentaredit/{id}', 'BeritaController@komentaredit');
Route::get('komentarhapus/{id}', 'BeritaController@komentarhapus');

Route::post('/komentaradmin/{id}', 'KomentarController@komenadmin');

Route::get('formttd','TtdController@formttd');
Route::post('simpanttd/{id}','TtdController@simpanttd');

Route::get('cetak/{id}', 'SuratpengantarController@cetak');

Route::get('/warga1', function () {
    return view('admin.warga.warga');
});