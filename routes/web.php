<?php

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

Route::get('login', 'organisasiController@login');
Route::get('home', 'organisasiController@home');
Route::get('organisasi/unit_kerja', 'organisasiController@unit_kerja');
Route::get('organisasi/unit_kerja/tambah', 'organisasiController@tambah_unit_kerja');
Route::post('organisasi/unit_kerja/tambah', 'organisasiController@add_unit_kerja');
Route::get('organisasi/unit_kerja/edit/{id_unker}', 'organisasiController@edit_unit_kerja');
Route::post('organisasi/unit_kerja/edit', 'organisasiController@ubah_unit_kerja');

Route::get('organisasi/struktur/{id_unker}', 'organisasiController@struktur');
Route::post('organisasi/struktur/buat', 'organisasiController@buat_simpan_struktur');
Route::get('organisasi/struktur/buat/{id_unker}/{id_struktur}', 'organisasiController@buat_struktur');
Route::get('organisasi/struktur/buat2/{id_unker}/{id_struktur}', 'organisasiController@buat_struktur2');
Route::get('organisasi/struktur/jabfung/tambah/{id_unker}/{id_struktur}', 'organisasiController@tambah_jabfung');
Route::post('organisasi/struktur/jabfung/tambah', 'organisasiController@add_jabfung');

Route::get('organisasi/struktur/jabfung/{id_jabfung}', 'organisasiController@jabfung');
