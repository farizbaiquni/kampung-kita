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
    return view('welcome');
});

// Route untuk bagian index
Route::get('/index', 'KampungKitaController@index');

// Route untuk bagian index login pengelola
Route::get('/indexLoginPengelola', 'KampungKitaController@indexLoginPengelola');

// Route untuk bagian index login pengelola
Route::get('/indexLoginDinasPariwisata', 'KampungKitaController@indexLoginDinasPariwisata');

// Route untuk bagian edit Profil Kampung Wisata
Route::get('/editProfilKampungWisata', 'KampungKitaController@editProfilKampungWisata');

//Route untuk melakukan insert data ke table profil kampung wisata
Route::post('/insertProfilKampungWisata', 'KampungKitaController@insertProfilKampungWisata');

//Route untuk melakukan proses verifikasi
Route::get('/verifikasiKampungWisata', 'KampungKitaController@verifikasiKampungWisata');

//Route untuk melakukan insert hasil verifikasi
Route::post('/insertVerifikasiKampungWisata', 'KampungKitaController@insertVerifikasi');

// Route untuk melakukan logout
Route::get('/logout','KampungKitaController@logout');

// Route untuk bagian login
Route::get('/login', 'KampungKitaController@login');

// Route untuk bagian registrasi
Route::get('/registrasi', 'KampungKitaController@registrasi');

// Route untuk bagian dashboard pengelola
Route::get('/dashboardPengelola', 'KampungKitaController@dashboardPengelola');

// Route untuk bagian dashboard dinas pariwisata
Route::get('/dashboardDinasPariwisata', 'KampungKitaController@dashboardDinasPariwisata');

// Route untuk bagian formulir pengelola kampung wisata
Route::get('/formulirPengelola', 'KampungKitaController@formulirPengelola');

// Route untuk bagian formulir penilaian oleh dinas pariwisata
Route::get('/formulirPenilaian', 'KampungKitaController@formulirPenilaian');

//Route untuk melakukan edit formulir Pengelola
Route::get('/editFormulirPengelola', 'KampungKitaController@editFormulirPengelola');

//Route untuk memeasukan data formulir pengelola ke database
Route::post('/insertFormulirPengelola', 'kampungKitaController@insertFormulirPengelola');

// Route untuk memasukan data formulir penilaian ke database
Route::post('/insertFormulirPenilaian', 'kampungKitaController@insertFormulirPenilaian');

//Route untuk melakukan login
Route::post('/prosesLogin', 'kampungKitaController@prosesLogin');

//Route untuk melakukan registrasi pengguna baru
Route::post('/prosesRegistrasi', 'kampungKitaController@prosesRegistrasi');

//Route untuk mencetak hasil penilaian
Route::get('/cetakHasilPenilaian', 'kampungKitaController@cetakHasilPenilaian');

//Route untuk melihat Laporan
Route::get('/lihatLaporan', 'kampungKitaController@lihatLaporan');


//Route untuk downloadFile
Route::get('/downloadFilePembina', 'kampungKitaController@downloadFilePembina');

//Route untuk downloadFile
Route::get('/downloadFilePengelola', 'kampungKitaController@downloadFilePengelola');

//Route untuk downloadFile
Route::get('/downloadFileSOP', 'kampungKitaController@downloadFileSOP');

//Route menghapus formulir pengelola 
Route::get('/prosesHapusFormulir', 'kampungKitaController@prosesHapusFormulir');

//Route untuk melakukan update Formulir Pengelola
Route::post('prosesUpdateEdit', 'kampungKitaController@prosesUpdateEdit');

