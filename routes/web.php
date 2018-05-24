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
Route::get('tes', 'tes@tes');





//musjab
Route::get('musjab','musjabController@home');
Route::get('musjab/peta_jabatan', 'musjabController@peta_jabatan');
Route::get('musjab/jabatan_kosong','musjabController@jabatan_kosong');
Route::get('musjab/rancangan', 'musjabController@rancangan');

Route::get('musjab/tambah_usulan','musjabController@tambah_usulan');
Route::post('musjab/tambah_usulan/add','musjabController@add_usulan');
Route::get('musjab/tambah_usulan/destroy/{usul_id}','musjabController@destroy');
Route::get('musjab/tambah_usulan/fill','musjabController@draft');
Route::post('musjab/tambah_usulan/fill','musjabController@fill');


Route::get('musjab/tambah_usulan/isipns/{id}','musjabController@isipns');
Route::get('musjab/tambah_usulan/isiajax/{nip}','musjabController@isiajax');
Route::post('musjab/tambah_usulan/isi','musjabController@isi');

Route::get('musjab/tambah_usulan/batal/{id}','musjabController@batal');

//peremajaan
Route::get('musjab/peremajaan', 'peremajaanController@home');
Route::post('musjab/peremajaan/cari','peremajaanController@cari');


//diklat
Route::get('diklat','diklatController@home');
Route::get('diklat/cari_data','diklatController@cari_data');
Route::get('diklat/manajerial','diklatController@manajerial');
Route::get('diklat/teknis','diklatController@teknis');
Route::get('diklat/fungsional','diklatController@fungsional');
Route::get('diklat/prajabatan','diklatController@prajabatan');


Route::get('diklat/addDiklat/{nama}','diklatController@addDiklat');
Route::post('diklat/isiDiklat','diklatController@isiDiklat');

Route::get('diklat/jenis','diklatController@jenis');
Route::post('diklat/addJenis','diklatController@addJenis');

Route::get('diklat/peserta','diklatController@peserta');
Route::post('diklat/peserta','diklatController@postpeserta');

Route::get('diklat/formPeserta','diklatController@formPeserta');




//pangkat
Route::get('pangkat','pangkatController@home');
Route::post('pangkat/periode','pangkatController@periode');

//reguler
Route::get('pangkat/reguler','pangkatController@reguler');
//jft
Route::get('pangkat/jft','pangkatController@jft');
//Struktural
Route::get('pangkat/struk','pangkatController@struk');
//pi_jfu
Route::get('pangkat/pi_jfu','pangkatController@pi_jfu');
//pi_jft
Route::get('pangkat/pi_jft','pangkatController@pi_jft');

//add pns
Route::get('pangkat/cek_berkasreg/{id}','pangkatController@cek_berkasreg');
Route::get('pangkat/uploadreg/{id}','pangkatController@uploadreg');
Route::post('pangkat/cekpnsreg','pangkatController@cekpnsreg');
Route::post('pangkat/addpnsreg','pangkatController@addpnsreg');
Route::post('pangkat/naikreg','pangkatController@naikreg');

//OPD

Route::get('pangkat/daftar_usulan','pangkatController@daftar_usulan');
Route::get('pangkat/isi_catatan/{id}','pangkatController@isi_catatan');
Route::post('pangkat/catat','pangkatController@catat');



//cpns
Route::get('pangkat/berkas_cpns/add/{id}','pangkatController@berkas_cpns_add');
Route::get('pangkat/berkas_cpns/edit/{id}','pangkatController@berkas_cpns_edit');
Route::post('pangkat/upload_cpns','pangkatController@upload_cpns');
Route::post('pangkat/upload_update_cpns','pangkatController@upload_update_cpns');
//pns
Route::get('pangkat/berkas_pns/add/{id}','pangkatController@berkas_pns_add');
Route::get('pangkat/berkas_pns/edit/{id}','pangkatController@berkas_pns_edit');
Route::post('pangkat/upload_pns','pangkatController@upload_pns');
Route::post('pangkat/upload_update_pns','pangkatController@upload_update_pns');
//skp1
Route::get('pangkat/berkas_skp1/add/{id}','pangkatController@berkas_skp1_add');
Route::get('pangkat/berkas_skp1/edit/{id}','pangkatController@berkas_skp1_edit');
Route::post('pangkat/upload_skp1','pangkatController@upload_skp1');
Route::post('pangkat/upload_update_skp1','pangkatController@upload_update_skp1');
//skp2
Route::get('pangkat/berkas_skp2/add/{id}','pangkatController@berkas_skp2_add');
Route::get('pangkat/berkas_skp2/edit/{id}','pangkatController@berkas_skp2_edit');
Route::post('pangkat/upload_skp2','pangkatController@upload_skp2');
Route::post('pangkat/upload_update_skp2','pangkatController@upload_update_skp2');
//KP
Route::get('pangkat/list_kp/{id}','pangkatController@list_kp');
Route::get('pangkat/list_kp/addKP/{id}','pangkatController@addKP');
Route::post('pangkat/list_kp/addKP','pangkatController@addKP_upload');
Route::get('pangkat/list_kp/editKP/{id}','pangkatController@editKP');
Route::post('pangkat/list_kp/editKP','pangkatController@editKP_upload');
Route::get('pangkat/list_kp/delKP/{id}','pangkatController@delKP');
//Ijazah
Route::get('pangkat/list_ijazah/{id}','pangkatController@list_ijazah');
Route::get('pangkat/list_ijazah/addIjazah/{id}','pangkatController@addIjazah');
Route::post('pangkat/list_ijazah/addIjazah','pangkatController@addIjazah_upload');
Route::get('pangkat/list_ijazah/editIjazah/{id}','pangkatController@editIjazah');
Route::post('pangkat/list_ijazah/editIjazah','pangkatController@editIjazah_upload');
Route::get('pangkat/list_ijazah/delIjazah/{id}','pangkatController@delIjazah');
//Transkrip
Route::get('pangkat/list_transkrip/{id}','pangkatController@list_transkrip');
Route::get('pangkat/list_transkrip/addTranskrip/{id}','pangkatController@addTranskrip');
Route::post('pangkat/list_transkrip/addTranskrip','pangkatController@addTranskrip_upload');
Route::get('pangkat/list_transkrip/editTranskrip/{id}','pangkatController@editTranskrip');
Route::post('pangkat/list_transkrip/editTranskrip','pangkatController@editTranskrip_upload');
Route::get('pangkat/list_transkrip/delTranskrip/{id}','pangkatController@delTranskrip');
//PAK
Route::get('pangkat/list_pak/{id}','pangkatController@list_pak');
Route::get('pangkat/list_pak/addPak/{id}','pangkatController@addPak');
Route::post('pangkat/list_pak/addPak','pangkatController@addPak_upload');
Route::get('pangkat/list_pak/editPak/{id}','pangkatController@editPak');
Route::post('pangkat/list_pak/editPak','pangkatController@editPak_upload');
Route::get('pangkat/list_pak/delPak/{id}','pangkatController@delPak');

//Jabfung
Route::get('pangkat/uploadreg/add_jabfung/{id}','pangkatController@add_jabfung');
Route::post('pangkat/uploadreg/add_jabfung/','pangkatController@add_dok_upload');
Route::get('pangkat/uploadreg/edit_jabfung/{id}','pangkatController@edit_jabfung');
Route::post('pangkat/uploadreg/edit_jabfung/','pangkatController@edit_dok_upload');

//JabStruk
Route::get('pangkat/uploadreg/add_jabstruk/{id}','pangkatController@add_jabstruk');
Route::post('pangkat/uploadreg/add_jabstruk/','pangkatController@add_dok_upload');
Route::get('pangkat/uploadreg/edit_jabstruk/{id}','pangkatController@edit_jabstruk');
Route::post('pangkat/uploadreg/edit_jabstruk/','pangkatController@edit_dok_upload');

//DRJ
Route::get('pangkat/uploadreg/add_drj/{id}','pangkatController@add_drj');
Route::post('pangkat/uploadreg/add_drj/','pangkatController@add_dok_upload');
Route::get('pangkat/uploadreg/edit_drj/{id}','pangkatController@edit_drj');
Route::post('pangkat/uploadreg/edit_drj/','pangkatController@edit_dok_upload');

//Uraian Tugas
Route::get('pangkat/uploadreg/add_uraian/{id}','pangkatController@add_uraian');
Route::post('pangkat/uploadreg/add_uraian/','pangkatController@add_dok_upload');
Route::get('pangkat/uploadreg/edit_uraian/{id}','pangkatController@edit_uraian');
Route::post('pangkat/uploadreg/edit_uraian/','pangkatController@edit_dok_upload');

//dok lainnya
Route::get('pangkat/uploadreg/add_dok_lain/{id}','pangkatController@add_dok_lain');
Route::post('pangkat/uploadreg/add_dok_lain/','pangkatController@add_dok_upload');
Route::get('pangkat/uploadreg/edit_dok_lain/{id}','pangkatController@edit_dok_lain');
Route::post('pangkat/uploadreg/edit_dok_lain/','pangkatController@edit_dok_upload');
Route::get('pangkat/uploadreg/del_dok_lain/{id}','pangkatController@del_dok_lain');

//admin pangkat
Route::get('pangkat/admin','adminpangkatController@admin');
Route::get('pangkat/admin/manajemen_user','adminpangkatController@manajemen_user');
Route::post('pangkat/admin/adduser','adminpangkatController@adduser');
Route::get('pangkat/admin/verifikasi','adminpangkatController@verifikasi');
Route::get('pangkat/admin/verifikasi/{id}','adminpangkatController@verifikasi_opd');
Route::get('pangkat/admin/verifpns/{id}','adminpangkatController@verifpns');

//cetak Lampiran
Route::get('pangkat/cetak_lampiran','pangkatController@cetak_lampiran');


//sweet alert
Route::get('my-notification/{type}', 'HomeController@myNotification');

//ajax

Route::post('rancangan/','musjabController@store');
Route::get('rancangan/{usul_id?}','musjabController@edit');
Route::put('rancangan/{usul_id?}','musjabController@update');
Route::delete('rancangan/{usul_id?}','musjabController@destroy');


//latihan
Route::get('ajax', function () {
    return view('latihan.beranda');
});
Route::get('LaravelAjaxCRUD/','TagController@index');
Route::post('LaravelAjaxCRUD/','TagController@store');
Route::get('LaravelAjaxCRUD/{tag_id?}','TagController@edit');
Route::put('LaravelAjaxCRUD/{tag_id?}','TagController@update');
Route::delete('LaravelAjaxCRUD/{tag_id?}','TagController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
