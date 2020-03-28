<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;

class KampungKitaController extends Controller
{
    


function index(Request $request){
	if($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role') =='pengelola') {
		return redirect('/indexLoginPengelola');
	} else if ($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role') =='admin') {
		return redirect('/indexLoginDinasPariwisata');
	}
	return view('index');
}



function logout(Request $request){
	$request->session()->flush();
	return redirect('/login');
}



function verifikasiKampungWisata(Request $request){

	if($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role') =='admin'){

		$idFormulir = $_GET['id'];
		$dataVerifikasi = DB::table('formulir_pengelola') 
						-> where('id_formulir_pengelola', $idFormulir)
						-> get();

		return view('verifikasi',['dataVerifikasi' => $dataVerifikasi, 'idFormulir'=> $idFormulir ]);
	}

	return redirect('/login');

	
}



function insertVerifikasi(Request $request){
	$hasilVerifikasi = $request -> hasilVerifikasi;
	$keteranganVerifikasi = $request -> keteranganVerifikasi;
	$tanggalKunjungan = $request -> tanggalKunjungan;

	$idFormulir = $request -> idFormulir;

	if($hasilVerifikasi == 'Tidak Lulus'){
		DB::table('formulir_pengelola') 
		-> where('id_formulir_pengelola', $idFormulir)
		-> update([
		'tanggal_kunjungan' => null,
		'status_formulir_pengelola' => $hasilVerifikasi,
		'keterangan_verifikasi' => $keteranganVerifikasi,
		]);

		DB::table('formulir_penilaian') 
		-> where ('id_formulir_penilaian', $idFormulir)
		-> update([
		   'tanggal_kunjungan' => null,
		   ]);

		return redirect('/dashboardDinasPariwisata');

	}

	DB::table('formulir_pengelola') 
		-> where('id_formulir_pengelola', $idFormulir)
		-> update([
		'tanggal_kunjungan' => $tanggalKunjungan,
		'status_formulir_pengelola' => $hasilVerifikasi,
		'keterangan_verifikasi' => null,
		]);

	DB::table('formulir_penilaian') 
		-> where ('id_formulir_penilaian', $idFormulir)
		-> update([
		   'tanggal_kunjungan' => $tanggalKunjungan,
		   ]);

	return redirect('/dashboardDinasPariwisata');
}


function prosesHapusFormulir(Request $request){
	if($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role') =='pengelola') {

		$idFormulir = $_GET['id'];

		DB::table('formulir_pengelola') 
			-> where('id_formulir_pengelola', $idFormulir)
			-> delete();

		DB::table('produk_kampung_wisata') 
			-> where('id_formulir_pengelola', $idFormulir)
			-> delete();

		DB::table('fasilitas_kampung_wisata')
			-> where('id_formulir_pengelola', $idFormulir)
			-> delete();

		DB::table('layanan_kampung_wisata')
			-> where('id_formulir_pengelola', $idFormulir)
			-> delete();

		DB::table('pengelolaan_kampung_wisata')
			-> where('id_formulir_pengelola', $idFormulir)
			-> delete();

		return redirect('/dashboardPengelola');
	}

	return redirect ('/login');
}




function indexLoginPengelola(Request $request){
	if($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role') =='pengelola') {
		return view('indexLoginPengelola');
	} else if ($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role') =='admin') {
		return view('indexLoginDinasPariwisata');
	}
	return redirect('/login');
}



function indexLoginDinasPariwisata(Request $request){
	if($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role') =='admin') {
		return view('indexLoginDinasPariwisata');
	}
	return redirect('/login');
}




function registrasi(){
	return view('registrasi');
}


function prosesRegistrasi(Request $request){

	if($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role') =='pengelola') {
		return redirect('/login');
	}

	$messages = [
		    'username.required' => 'Username Tidak Boleh Kosong',
	        'email.required'  => 'Email Tidak Boleh Kosong',
	        'password.required'  => 'Password Tidak Boleh Kosong',
	        'password.confirmed' => 'Password Tidak Sama',
	        'password.min' => 'Password harus lebih dari 8 digit'
	];

	$validateData = $request->validate([
		'username'	=> 'required',
		'email'		=> 'required|email',
		'password'	=> 'required|confirmed|min:8',
	], $messages);


	//Query untuk menambahkan data baru pengguna ke tabel 
	$username = strtolower(stripcslashes($request->input('username')));
	$password = $request->input('password');
	$email = $request->input('email');
	$passwordHashed = Hash::make($request -> password);


	$idMaxPengguna = DB::table('pengguna')->max('id_pengguna');
	$idMaxPengguna++;
	DB::table('pengguna')->insert([
		'id_pengguna' => $idMaxPengguna,
		'username_pengguna' => $username,
		'email_pengguna' => $email,
		'password_pengguna' => $passwordHashed,
		'role' => 'pengelola'
	]);


	//Query untuk membuat slot baru kampung wisata
	$maxIdKampungWisata = DB::table('kampung_wisata') -> max('id_kampung_wisata');
	$maxIdKampungWisata++;

	DB::table('kampung_wisata') -> insert([
		'id_kampung_wisata' => $maxIdKampungWisata,
		'id_pengguna' => $idMaxPengguna,
	// 	'nama_kampung_wisata' => 'kosong',
	// 	'no_telepon' => 0,
	// 	'provinsi' => 'kosong',
	// 	'kabupaten_kota' => 'kosong',
	// 	'kecamatan' => 'kosong',
	// 	'kelurahan_desa' => 'kosong',
	]);


	return redirect('/login');
}



function login(Request $request){
	if($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role')=='pengelola') 
	{
		return redirect ('/dashboardPengelola');
	} 
	else if($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role')=='admin')
	{
		return redirect ('/dashboardDinasPariwisata');
	} 
	
	return view('login');
}



function prosesLogin(Request $request){


	$username = strtolower(stripcslashes($request->input('username')));
	$password = $request->input('password');

	$dataPengguna = DB::table('pengguna') 
					-> where ('username_pengguna', $username)
					-> first();

	if($dataPengguna != null) {
		$idPengguna = $dataPengguna -> id_pengguna;
		$usernamePengguna = $dataPengguna -> username_pengguna;
		$passwordPengguna = $dataPengguna -> password_pengguna;
		$rolePengguna = $dataPengguna -> role;

		if ($username == $usernamePengguna){
			if (Hash::check($password, $passwordPengguna)){
				if($rolePengguna == 'pengelola'){
					$request->session()->put('id', $idPengguna);
					$request->session()->put('nama', $usernamePengguna);
					$request->session()->put('role', $rolePengguna);
					return redirect('/dashboardPengelola');

				} else if($rolePengguna == 'admin') {
					$request->session()->put('id', $idPengguna);
					$request->session()->put('nama', $usernamePengguna);
					$request->session()->put('role', $rolePengguna);
					return redirect('/dashboardDinasPariwisata');
				}
			}

			$passwordSalah = "Password Salah";
			return view('login', ['passwordSalah'=>$passwordSalah]);
		}
	} 

	$usernameSalah = "Username Tidak Ditemukan";
	return view('login', ['usernameSalah'=> $usernameSalah]);
	
}





function editProfilKampungWisata(Request $request){
	if($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role') =='pengelola'){

		$idPengguna = $request->session()->get('id');

		$dataProfil = DB::table('kampung_wisata')
					-> where('id_pengguna', $idPengguna)
					-> get();

	return view('editProfilKampungWisata', ['dataProfil' => $dataProfil]);

	}

	return redirect ('/login');
}





function insertProfilKampungWisata(Request $request){
	if($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role') =='pengelola'){

		$namaKampungWisata = $request -> namaKampungWisata;
		$noTelpKampungWisata = $request -> noTelpKampungWisata;
		$provinsi = $request -> provinsi;
		$kabupatenKota = $request -> kabupatenKota;
		$kecamatan = $request -> kecamatan;
		$kelurahanDesa = $request -> kelurahanDesa;

		$idPengguna = $request->session()->get('id');

		DB::table('kampung_wisata') 
			-> where('id_pengguna', $idPengguna)
			-> update([
				'nama_kampung_wisata' => $namaKampungWisata,
				'no_telepon' => $noTelpKampungWisata,
				'provinsi' => $provinsi,
				'kabupaten_kota' => $kabupatenKota,
				'kecamatan' => $kecamatan,
				'kelurahan_desa' => $kelurahanDesa,
			]);
		return redirect ('/dashboardPengelola');
	}


	return redirect ('/login');

}





function dashboardPengelola(Request $request){
	if($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role') =='pengelola') 
	{
		$idPengguna =  $request->session()->get('id');

		$daftarFormulir = DB::table('formulir_pengelola')
			-> join('pengguna', 'formulir_pengelola.id_pengguna', '=', 
				'pengguna.id_pengguna')
			-> join('kampung_wisata', 'formulir_pengelola.id_pengguna', '=', 'kampung_wisata.id_pengguna')
			-> where('formulir_pengelola.id_pengguna', '=', $idPengguna)
			-> get();

		$statusBuatLaporan = DB::table('formulir_pengelola')
				-> where('formulir_pengelola.id_pengguna', '=', $idPengguna)
				-> orderBy('tanggal_submit', 'desc')
				-> select('masa_berlaku', 'status_formulir_pengelola')
				-> first();

		$daftarHasilPenilaian = DB::table('formulir_penilaian')
			-> where('id_pengguna', '=', $idPengguna)
			-> get();

		$dataProfil = DB::table('kampung_wisata')
					-> where('id_pengguna', $idPengguna)
					-> get();

		// var_dump($idPengguna);
		// die();

		return view ('/dashboardPengelola', ['daftarFormulir' => $daftarFormulir, 'daftarHasilPenilaian' => $daftarHasilPenilaian, 'dataProfil' => $dataProfil, 'statusBuatLaporan'=>$statusBuatLaporan]);
	}

	return redirect('/login');
}




function dashboardDinasPariwisata(Request $request){


	if($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role') == 'admin') 
	{
		//Mengambil data untuk ditampilkan
		$daftarLaporan = DB::table('formulir_pengelola') 
			-> join('pengguna', 'formulir_pengelola.id_pengguna', '=', 
				'pengguna.id_pengguna')
			-> join('kampung_wisata', 'formulir_pengelola.id_pengguna', '=', 'kampung_wisata.id_pengguna')
			-> paginate(20);

		$daftarHasilPenilaian = DB::table('formulir_penilaian')
			-> join ('kampung_wisata', 'formulir_penilaian.id_pengguna', 'kampung_wisata.id_pengguna')
			-> orderBy('formulir_penilaian.tanggal_kunjungan', 'asc')
			-> paginate(20);

		$daftarStatus = DB::table('kampung_wisata')
			-> leftjoin ('formulir_penilaian', 'kampung_wisata.id_pengguna', 'formulir_penilaian.id_pengguna' )
			-> orderBy('formulir_penilaian.tanggal_kunjungan', 'asc')
			-> select('formulir_penilaian.id_pengguna', 'kampung_wisata.nama_kampung_wisata', 'formulir_penilaian.masa_berlaku')
			-> distinct()
			-> get();


		// var_dump($daftarStatus);
		// die();

		return view('dashboardDinasPariwisata', ['daftarLaporan' => $daftarLaporan, 'daftarHasilPenilaian' => $daftarHasilPenilaian, 'daftarStatus'=> $daftarStatus]);
	}

	return redirect('/login');


}



function cetakHasilPenilaian(){

	$idFormulir = $_GET["id"];


	$daftarPenilaianAlam = DB::table('formulir_penilaian')
				-> join('penilaian', 'formulir_penilaian.id_formulir_penilaian', 'penilaian.id_formulir_penilaian')
				-> where('formulir_penilaian.id_formulir_pengelola', $idFormulir)
				-> where('penilaian.jenis_penilaian', 'Produk Alam')
				-> get();

	$daftarPenilaianBudaya = DB::table('formulir_penilaian')
				-> join('penilaian', 'formulir_penilaian.id_formulir_penilaian', 'penilaian.id_formulir_penilaian')
				-> where('formulir_penilaian.id_formulir_pengelola', $idFormulir)
				-> where('penilaian.jenis_penilaian', 'Produk Budaya')
				-> get();

	$daftarPenilaianBuatan = DB::table('formulir_penilaian')
				-> join('penilaian', 'formulir_penilaian.id_formulir_penilaian', 'penilaian.id_formulir_penilaian')
				-> where('formulir_penilaian.id_formulir_pengelola', $idFormulir)
				-> where('penilaian.jenis_penilaian', 'Produk Buatan')
				-> get();

	$daftarPenilaianFasilitas = DB::table('formulir_penilaian')
				-> join('penilaian', 'formulir_penilaian.id_formulir_penilaian', 'penilaian.id_formulir_penilaian')
				-> where('formulir_penilaian.id_formulir_pengelola', $idFormulir)
				-> where('penilaian.jenis_penilaian', 'Fasilitas')
				-> get();

	$daftarPenilaianLayanan = DB::table('formulir_penilaian')
				-> join('penilaian', 'formulir_penilaian.id_formulir_penilaian', 'penilaian.id_formulir_penilaian')
				-> where('formulir_penilaian.id_formulir_pengelola', $idFormulir)
				-> where('penilaian.jenis_penilaian', 'Layanan')
				-> get();

	$daftarPenilaianPengelolaan = DB::table('formulir_penilaian')
				-> join('penilaian', 'formulir_penilaian.id_formulir_penilaian', 'penilaian.id_formulir_penilaian')
				-> where('formulir_penilaian.id_formulir_pengelola', $idFormulir)
				-> where('penilaian.jenis_penilaian', 'Pengelolaan')
				-> get();

	$daftarNilai = DB::table('formulir_penilaian')
				-> where('id_formulir_pengelola', $idFormulir)
				-> first();


	$identitas = DB::table('formulir_pengelola')
				-> join('kampung_wisata', 'formulir_pengelola.id_pengguna', 'kampung_wisata.id_pengguna')
				-> where('formulir_pengelola.id_formulir_pengelola', $idFormulir)
				-> first();
	
	// var_dump($identitas);
	// die();

	$pdf = PDF::loadview ('cetakHasilPenilaian', ['daftarPenilaianAlam'=>$daftarPenilaianAlam, 'daftarPenilaianBudaya'=>$daftarPenilaianBudaya, 'daftarPenilaianBuatan'=>$daftarPenilaianBuatan, 'daftarPenilaianFasilitas'=>$daftarPenilaianFasilitas, 'daftarPenilaianLayanan'=>$daftarPenilaianLayanan, 'daftarPenilaianPengelolaan'=>$daftarPenilaianPengelolaan, 'daftarNilai'=> $daftarNilai, 'identitas'=>$identitas]);
	
  	return $pdf->download($identitas -> nama_kampung_wisata.$identitas -> masa_berlaku.".pdf");

}





function formulirPengelola(Request $request){
	if($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role') =='pengelola') 
	{
		return view ('/formulirPengelola');
	}

	return redirect ('/login');
}




function lihatLaporan(Request $request){

	if($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role') =='admin') 
	{

		$idFormulir = $_GET['id'];

		$daftarProdukAlam = DB::table('produk_kampung_wisata')
						    -> WHERE('id_formulir_pengelola', $idFormulir)
						    -> WHERE('jenis_produk','Produk Alam')
						    -> PLUCK('nama_produk');

		$daftarProdukBudaya = DB::table('produk_kampung_wisata')
						    -> WHERE('id_formulir_pengelola', $idFormulir)
						    -> WHERE('jenis_produk', 'Produk Budaya')
						    -> PLUCK('nama_produk');

		$daftarProdukBuatan = DB::table('produk_kampung_wisata')
						    -> WHERE('id_formulir_pengelola', $idFormulir)
						    -> WHERE('jenis_produk', 'Produk Buatan')
						    -> PLUCK('nama_produk');

		$daftarFasilitas 	= DB::table('fasilitas_kampung_wisata')
						    -> WHERE('id_formulir_pengelola', $idFormulir)
						    -> PLUCK('nama_fasilitas');

		$daftarLayanan 		= DB::table('layanan_kampung_wisata')
						    -> WHERE('id_formulir_pengelola', $idFormulir)
						    -> PLUCK('nama_layanan');

		$daftarFile 		= DB::table('pengelolaan_kampung_wisata')
						    -> WHERE('id_formulir_pengelola', $idFormulir)
						    -> get();


		return view('lihatLaporan', ['daftarProdukAlam'=>$daftarProdukAlam,'daftarProdukBudaya'=>$daftarProdukBudaya, 'daftarProdukBuatan'=>$daftarProdukBuatan, 'daftarFasilitas'=>$daftarFasilitas, 'daftarLayanan'=>$daftarLayanan, 'idFormulir'=>$idFormulir, 'daftarFile'=>$daftarFile]);
		}

		return redirect ('/login');
}


function downloadFilePembina(){
	$nama = $_GET['nama'];
	$pathToFile = 'File Struktur Pembina/'.$nama;
	return response()->download($pathToFile);
}



function downloadFilePengelola(){
	$nama = $_GET['nama'];
	$pathToFile = 'File Struktur Pengelola/'.$nama;
	return response()->download($pathToFile);
}


function downloadFileSOP(){
	$nama = $_GET['nama'];
	$pathToFile = 'File Standar Operasional/'.$nama;
	return response()->download($pathToFile);
}




function formulirPenilaian(Request $request){

	if($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role') =='admin') 
	{

		$idFormulir = $_GET['id'];

		$daftarProdukAlam = DB::table('produk_kampung_wisata')
						    -> WHERE('id_formulir_pengelola', $idFormulir)
						    -> WHERE('jenis_produk','Produk Alam')
						    -> PLUCK('nama_produk');

		$daftarProdukBudaya = DB::table('produk_kampung_wisata')
						    -> WHERE('id_formulir_pengelola', $idFormulir)
						    -> WHERE('jenis_produk', 'Produk Budaya')
						    -> PLUCK('nama_produk');

		$daftarProdukBuatan = DB::table('produk_kampung_wisata')
						    -> WHERE('id_formulir_pengelola', $idFormulir)
						    -> WHERE('jenis_produk', 'Produk Buatan')
						    -> PLUCK('nama_produk');

		$daftarFasilitas 	= DB::table('fasilitas_kampung_wisata')
						    -> WHERE('id_formulir_pengelola', $idFormulir)
						    -> PLUCK('nama_fasilitas');

		$daftarLayanan 		= DB::table('layanan_kampung_wisata')
						    -> WHERE('id_formulir_pengelola', $idFormulir)
						    -> PLUCK('nama_layanan');


		return view('formulirPenilaian', ['daftarProdukAlam'=>$daftarProdukAlam, 'daftarProdukBudaya'=>$daftarProdukBudaya, 'daftarProdukBuatan'=>$daftarProdukBuatan, 'daftarFasilitas'=>$daftarFasilitas, 'daftarLayanan'=>$daftarLayanan, 'idFormulir'=>$idFormulir]);
		}

		return redirect ('/login');
}






// +++++++++++++++++ FUNGSI UNTUK QUERY FORMULIR PENGELOLA +++++++++++++++++

function insertFormulirPengelola(Request $request){

	$waktuSekarang = date("Y/m/d");

	// Varibel untuk menentukan Auto Increment ID Formulir
	$maxIdFormulir = DB::table('formulir_pengelola')->max('id_formulir_pengelola');
	$maxIdFormulir++;

	$idPengguna = $request->session()->get('id');

	DB::table("formulir_pengelola") -> insert([
		'id_formulir_pengelola' => $maxIdFormulir,
		'id_pengguna' => $idPengguna,
		'tanggal_submit' => $waktuSekarang,
		'status_formulir_pengelola' => 'Belum Terverifikasi',
	]);





 // >>>>>>>>>>>>>>>>>>>>  QUERY PRODUK ALAM <<<<<<<<<<<<<<<<<<<<
	$daftarProdukAlam = [];
	$jumlahKlikTambahAlam = $request -> jumlahKlikTambahAlam;
	for($i=1; $i<=$jumlahKlikTambahAlam; $i++){
		$atributName = "produkAlam_".$i;
		if($request -> $atributName != null) {
			$daftarProdukAlam[] = $request -> $atributName;
		}
	}

	foreach($daftarProdukAlam as $produkAlam){
		$maxIdProduk = DB::table('produk_kampung_wisata')->max('id');
		$maxIdProduk++;
		DB::table('produk_kampung_wisata')->insert([
			'id' => $maxIdProduk,
			'id_formulir_pengelola' => $maxIdFormulir,
			'nama_produk' => $produkAlam,
			'jenis_produk' => "Produk Alam"
			]);
	}





// >>>>>>>>>>>>>>>>>>>>  QUERY PRODUK BUDAYA <<<<<<<<<<<<<<<<<<<<
	$daftarProdukBudaya = [];
	$jumlahKlikTambahBudaya = $request -> jumlahKlikTambahBudaya;
	for($i=1; $i<=$jumlahKlikTambahBudaya; $i++){
		$atributName = "produkBudaya_".$i;
		if($request -> $atributName != null) {
			$daftarProdukBudaya[] = $request -> $atributName;
		}
	}

	foreach($daftarProdukBudaya as $produkBudaya){	
		$maxIdProduk = DB::table('produk_kampung_wisata')->max('id');
		$maxIdProduk++;
		DB::table('produk_kampung_wisata')->insert([
			'id' => $maxIdProduk,
			'id_formulir_pengelola' => $maxIdFormulir,
			'nama_produk' => $produkBudaya,
			'jenis_produk' => "Produk Budaya"
			]);
	}





// >>>>>>>>>>>>>>>>>>>>  QUERY PRODUK BUATAN <<<<<<<<<<<<<<<<<<<<
	$daftarProdukBuatan = [];
	$jumlahKlikTambahBuatan = $request -> jumlahKlikTambahBuatan;
	for($i=1; $i<=$jumlahKlikTambahBuatan; $i++){
		$atributName = "produkBuatan_".$i;
		// echo $atributName;
		if($request -> $atributName != null) {
			$daftarProdukBuatan[] = $request -> $atributName;
		}
	}

	foreach($daftarProdukBuatan as $produkBuatan){	
		$maxIdProduk = DB::table('produk_kampung_wisata')->max('id');
		$maxIdProduk++;
		DB::table('produk_kampung_wisata')->insert([
			'id' => $maxIdProduk,
			'id_formulir_pengelola' => $maxIdFormulir,
			'nama_produk' => $produkBuatan,
			'jenis_produk' => "Produk Buatan"
			]);
	}




// >>>>>>>>>>>>>>>>>>>>  QUERY FASILITAS <<<<<<<<<<<<<<<<<<<<
	$daftarFasilitasFix = ["homestay", "penunjukArah", "tempatSampah", "toilet", 
						  "tempatParkir", "warungMakan", "tokoOlehOleh", "panggungHiburan"];

	foreach($daftarFasilitasFix as $fasilitas) {
		$maxIdFasilitas = DB::table('fasilitas_kampung_wisata') -> max('id');
		$maxIdFasilitas++;

		if($request -> $fasilitas != null) {
			DB::table('fasilitas_kampung_wisata')->insert([
				'id' => $maxIdFasilitas,
				'id_formulir_pengelola' => $maxIdFormulir,
				'nama_fasilitas' => $request -> $fasilitas
			]);
		}
	}

	$daftarFasilitasLain = [];
	$jumlahKlikTambahFasilitas = $request -> jumlahKlikTambahFasilitas;
	for($i=1; $i<=$jumlahKlikTambahFasilitas; $i++){
		$atributName = "fasilitasLain_".$i;
		if($request -> $atributName != null) {
			$daftarFasilitasLain[] = $request -> $atributName;
		}
	}


	foreach($daftarFasilitasLain as $fasilitasLain){	
		$maxIdProduk = DB::table('fasilitas_kampung_wisata')->max('id');
		$maxIdProduk++;
		DB::table('fasilitas_kampung_wisata')->insert([
			'id' => $maxIdProduk,
			'id_formulir_pengelola' => $maxIdFormulir,
			'nama_fasilitas' => $fasilitasLain,
			]);
	}





// >>>>>>>>>>>>>>>>>>>>  QUERY LAYANAN <<<<<<<<<<<<<<<<<<<<
	$daftarLayananFix = ["pemanduWisata", "atraksiHiburan"];

	foreach ($daftarLayananFix as $layanan){
		$maxIdLayanan = DB::table('layanan_kampung_wisata')->max('id');
		$maxIdLayanan++;
		if($request -> $layanan != null){
			DB::table('layanan_kampung_wisata') -> insert([
				'id' => $maxIdLayanan,
				'id_formulir_pengelola' => $maxIdFormulir,
				'nama_layanan' => $request -> $layanan,
			]);
		}
	}


	$daftarLayananLain = [];
	$jumlahKlikTambahLayanan = $request -> jumlahKlikTambahLayanan;
	for($i=1; $i<=$jumlahKlikTambahLayanan; $i++){
		$atributName = "layananLain_".$i;
		if($request -> $atributName != null) {
			$daftarLayananLain[] = $request -> $atributName;
		}
	}

	foreach($daftarLayananLain as $layananLain){	
		$maxIdProduk = DB::table('layanan_kampung_wisata')->max('id');
		$maxIdProduk++;
		DB::table('layanan_kampung_wisata')->insert([
			'id' => $maxIdProduk,
			'id_formulir_pengelola' => $maxIdFormulir,
			'nama_layanan' => $layananLain,
			]);
	}





// >>>>>>>>>>>>>>>>>>>>  QUERY PENGELOLAAN <<<<<<<<<<<<<<<<<<<<

	// =============== STRUKTUR PEMBINA ===============

	if($request -> file('strukturPembina') != null){
		//Menyimpan file ke dalam sebuah variabel
		$fileStukturPembina = $request -> file('strukturPembina');

		//Mengambil Ekstensi File
		$ekstensiFileStrukturPembina = $fileStukturPembina->getClientOriginalExtension();

		$namaAsli = $fileStukturPembina->getClientOriginalName();

		//Membuat Nama Baru untuk file
		$namaBaruFileStrukturPembina = uniqid();
		$namaBaruFileStrukturPembina .= '.';
		$namaBaruFileStrukturPembina .= $ekstensiFileStrukturPembina;

		//Memindahkan File 
		$fileStukturPembina->move('File Struktur Pembina', $namaBaruFileStrukturPembina);

		$maxIdPengalolaan = DB::table('pengelolaan_kampung_wisata')->max('id');
		$maxIdPengalolaan++;

		DB::table('pengelolaan_kampung_wisata') -> insert([
			'id' => $maxIdPengalolaan,
			'id_formulir_pengelola' => $maxIdFormulir,
			'nama_file' => $namaBaruFileStrukturPembina,
			'jenis_file' => 'Struktur Pembina',
			'nama_asli' => $namaAsli
		]);


	}

	

	// =============== STRUKTUR PENGELOLA ===============

	if($request -> file('strukturPengelola') != null){
		//Menyimpan file ke dalam sebuah variabel
		$filestrukturPengelola = $request -> file('strukturPengelola');

		//Mengambil Ekstensi File
		$ekstensiFileStrukturPengelola = $filestrukturPengelola->getClientOriginalExtension();

		$namaAsli = $filestrukturPengelola->getClientOriginalName();

		//Membuat Nama Baru untuk file
		$namaBaruFileStrukturPengelola = uniqid();
		$namaBaruFileStrukturPengelola .= '.';
		$namaBaruFileStrukturPengelola .= $ekstensiFileStrukturPengelola;

		//Memindahkan File 
		$filestrukturPengelola->move('File Struktur Pengelola', $namaBaruFileStrukturPengelola);

		$maxIdPengalolaan = DB::table('pengelolaan_kampung_wisata')->max('id');
		$maxIdPengalolaan++;

		DB::table('pengelolaan_kampung_wisata') -> insert([
			'id' => $maxIdPengalolaan,
			'id_formulir_pengelola' => $maxIdFormulir,
			'nama_file' => $namaBaruFileStrukturPengelola,
			'jenis_file' => 'Struktur Pengelola',
			'nama_asli' => $namaAsli
		]);

	}



	// =============== BERKAS STANDAR OPERASIONAL  ===============

	if($request -> file('standarOperasional') != null){
		//Menyimpan file ke dalam sebuah variabel
		$filesStandarOperasional = $request -> file('standarOperasional');

		//Mengambil Ekstensi File
		$ekstensiFileStandarOperasional = $filesStandarOperasional->getClientOriginalExtension();

		$namaAsli = $filesStandarOperasional->getClientOriginalName();

		//Membuat Nama Baru untuk file
		$namaBaruFileStandarOperasional = uniqid();
		$namaBaruFileStandarOperasional .= '.';
		$namaBaruFileStandarOperasional .= $ekstensiFileStandarOperasional;

		//Memindahkan File 
		$filesStandarOperasional->move('File Standar Operasional', $namaBaruFileStandarOperasional);

		$maxIdPengalolaan = DB::table('pengelolaan_kampung_wisata')->max('id');
		$maxIdPengalolaan++;

		DB::table('pengelolaan_kampung_wisata') -> insert([
			'id' => $maxIdPengalolaan,
			'id_formulir_pengelola' => $maxIdFormulir,
			'nama_file' => $namaBaruFileStandarOperasional,
			'jenis_file' => 'Standar Operasional',
			'nama_asli' => $namaAsli
		]);

	}

	return redirect ("/dashboardPengelola");
}





// +++++++++++++++++ FUNGSI UNTUK MENGEDIT FORMULIR PENGELOLA +++++++++++++++++

function editFormulirPengelola(Request $request){

	$idFormulir = $_GET['id'];

	$daftarProdukAlam = DB::table('produk_kampung_wisata')
			-> where('id_formulir_pengelola', $idFormulir)
			-> where('jenis_produk', 'Produk Alam')
			-> get ();
	
	$daftarProdukBudaya = DB::table('produk_kampung_wisata')
			-> where('id_formulir_pengelola', $idFormulir)
			-> where('jenis_produk', 'Produk Budaya')
			-> get();

	$daftarProdukBuatan = DB::table('produk_kampung_wisata')
			-> where('id_formulir_pengelola', $idFormulir)
			-> where('jenis_produk', 'Produk Buatan')
			-> get();

	$daftarFasilitas = DB::table('fasilitas_kampung_wisata')
			-> where('id_formulir_pengelola', $idFormulir)
			-> get();

	$daftarLayanan = DB::table('layanan_kampung_wisata')
			-> where('id_formulir_pengelola', $idFormulir)
			-> get();

	$daftarPengelolaan = DB::table('pengelolaan_kampung_wisata')
			-> where('id_formulir_pengelola', $idFormulir)
			-> get();

	$daftarAlamFix = [];
	foreach($daftarProdukAlam as $produkAlam){
		$daftarAlamFix [] = $produkAlam -> nama_produk;
	}

	
	$daftarFasilitasFix = [];
	foreach($daftarFasilitas as $fasilitas){
		$daftarFasilitasFix [] = $fasilitas -> nama_fasilitas;
	}

	$daftarLayananFix = [];
	foreach($daftarLayanan as $layanan){
		$daftarLayananFix [] = $layanan -> nama_layanan;
	}


	return view('editFormulirPengelola', ['daftarProdukAlam'=>$daftarAlamFix, 'daftarProdukBudaya'=>$daftarProdukBudaya, 'daftarProdukBuatan'=>$daftarProdukBuatan, 'daftarFasilitas'=>$daftarFasilitasFix, 'daftarLayanan'=>$daftarLayananFix, 'daftarPengelolaan'=>$daftarPengelolaan, 'idFormulir'=>$idFormulir]);
}





function prosesUpdateEdit(Request $request){
	if($request->session()->has('id') && $request->session()->has('nama') && $request->session()->has('role') =='pengelola') {

		$maxIdFormulir = DB::table('pengelolaan_kampung_wisata')->max('id');
		$maxIdFormulir++;
		
		$idFormulir = $_GET['id'];
		
		if($request -> file('strukturPembina') != null){
		//Menyimpan file ke dalam sebuah variabel
		$fileStukturPembina = $request -> file('strukturPembina');

		//Mengambil Ekstensi File
		$ekstensiFileStrukturPembina = $fileStukturPembina->getClientOriginalExtension();

		$namaAsli = $fileStukturPembina->getClientOriginalName();

		//Membuat Nama Baru untuk file
		$namaBaruFileStrukturPembina = uniqid();
		$namaBaruFileStrukturPembina .= '.';
		$namaBaruFileStrukturPembina .= $ekstensiFileStrukturPembina;

		//Memindahkan File 
		$fileStukturPembina->move('File Struktur Pembina', $namaBaruFileStrukturPembina);

		$maxIdPengalolaan = DB::table('pengelolaan_kampung_wisata')->max('id');
		$maxIdPengalolaan++;

		if($request -> strukturPembina != null){
			DB::table('pengelolaan_kampung_wisata')
					-> where ('id_formulir_pengelola', $idFormulir)
					-> where ('jenis_file', 'Struktur Pembina')
					-> delete();

			DB::table('pengelolaan_kampung_wisata') -> insert([
			'id' => $maxIdFormulir,
			'id_formulir_pengelola' => $idFormulir,
			'nama_file' => $namaBaruFileStrukturPembina,
			'jenis_file' => 'Struktur Pembina',
			'nama_asli' => $namaAsli
		]);
		}
	}

	

	// =============== STRUKTUR PENGELOLA ===============

	if($request -> file('strukturPengelola') != null){
		//Menyimpan file ke dalam sebuah variabel
		$filestrukturPengelola = $request -> file('strukturPengelola');

		//Mengambil Ekstensi File
		$ekstensiFileStrukturPengelola = $filestrukturPengelola->getClientOriginalExtension();

		$namaAsli = $filestrukturPengelola->getClientOriginalName();

		//Membuat Nama Baru untuk file
		$namaBaruFileStrukturPengelola = uniqid();
		$namaBaruFileStrukturPengelola .= '.';
		$namaBaruFileStrukturPengelola .= $ekstensiFileStrukturPengelola;

		//Memindahkan File 
		$filestrukturPengelola->move('File Struktur Pengelola', $namaBaruFileStrukturPengelola);

		$maxIdPengalolaan = DB::table('pengelolaan_kampung_wisata')->max('id');
		$maxIdPengalolaan++;

		if($request -> strukturPengelola != null){
			DB::table('pengelolaan_kampung_wisata')
					-> where ('id_formulir_pengelola', $idFormulir)
					-> where ('jenis_file', 'Struktur Pengelola')
					-> delete();

			DB::table('pengelolaan_kampung_wisata') -> insert([
			'id' => $maxIdFormulir,
			'id_formulir_pengelola' => $idFormulir,
			'nama_file' => $namaBaruFileStrukturPengelola,
			'jenis_file' => 'Struktur Pengelola',
			'nama_asli' => $namaAsli
		]);
		}
		
	}



	// =============== BERKAS STANDAR OPERASIONAL  ===============

	if($request -> file('standarOperasional') != null){
		//Menyimpan file ke dalam sebuah variabel
		$filesStandarOperasional = $request -> file('standarOperasional');

		//Mengambil Ekstensi File
		$ekstensiFileStandarOperasional = $filesStandarOperasional->getClientOriginalExtension();

		$namaAsli = $filesStandarOperasional->getClientOriginalName();

		//Membuat Nama Baru untuk file
		$namaBaruFileStandarOperasional = uniqid();
		$namaBaruFileStandarOperasional .= '.';
		$namaBaruFileStandarOperasional .= $ekstensiFileStandarOperasional;

		//Memindahkan File 
		$filesStandarOperasional->move('File Standar Operasional', $namaBaruFileStandarOperasional);

		$maxIdPengalolaan = DB::table('pengelolaan_kampung_wisata')->max('id');
		$maxIdPengalolaan++;

		if($request -> standarOperasional != null){
			DB::table('pengelolaan_kampung_wisata')
					-> where ('id_formulir_pengelola', $idFormulir)
					-> where ('jenis_file', 'Standar Operasional')
					-> delete();

			DB::table('pengelolaan_kampung_wisata') -> insert([
			'id' => $maxIdFormulir,
			'id_formulir_pengelola' => $idFormulir,
			'nama_file' => $namaBaruFileStandarOperasional,
			'jenis_file' => 'Standar Operasional',
			'nama_asli' => $namaAsli
		]);
		}
	}
	}

	return redirect('/login');
}







// +++++++++++++++++ FUNGSI UNTUK QUERY FORMULIR PENILAIAN +++++++++++++++++

function insertFormulirPenilaian(Request $request){	

	$idFormulirDinilai = $_GET["id"];
	$objIdPengelolaDinilai = DB::table('formulir_pengelola') 
						-> where('id_formulir_pengelola', '=', $idFormulirDinilai)
						-> select('id_pengguna')
						-> first();
	$idPengelolaDinilai = $objIdPengelolaDinilai -> id_pengguna;


	$maxId = DB::table('penilaian')->max('id');
	$maxId++;

	$maxIdFormulirPenilaian = DB::table('formulir_penilaian')->max('id_formulir_penilaian');
	$maxIdFormulirPenilaian++;






	// =========== Code Query Tabel Formulir Penilaian ===========
	$nilaiProduk = $request -> nilaiProduk;
	$nilaiLayanan = $request -> nilaiLayanan;
	$nilaiPengelolaan = $request -> nilaiPengelolaan;
	$hasilPenilaian = $request -> hasilPenilaian;

	$tanggalKunjungan = DB::table('formulir_pengelola')
					 -> where('id_formulir_pengelola', $idFormulirDinilai)
					 -> first('tanggal_kunjungan');

	$tanggalKunjungan = $tanggalKunjungan -> tanggal_kunjungan;			 

	$masaBerlaku = date('Y-m-d', strtotime('+3 years', strtotime($tanggalKunjungan)));

	DB::table('formulir_penilaian')->insert([
		'id_formulir_penilaian' => $maxIdFormulirPenilaian,
		'id_pengguna' => $idPengelolaDinilai,
		'id_formulir_pengelola' => $idFormulirDinilai,
		'nilai_produk' => $nilaiProduk,
		'nilai_layanan' => $nilaiLayanan,
		'nilai_pengelolaan' => $nilaiPengelolaan,
		'hasil_penilaian' => $hasilPenilaian,
		'masa_berlaku' => $masaBerlaku,
		'tanggal_kunjungan' => $tanggalKunjungan,
		]);

	DB::table('formulir_pengelola') 
		-> where('id_formulir_pengelola', $idFormulirDinilai)
		-> update([
			'status_formulir_pengelola' => 'Telah Dinilai',
			'keterangan_verifikasi' => 'Lulus Verikasi dan Telah Dinilai',
			'masa_berlaku' => $masaBerlaku
			]);


	


	// =========== Code bagian mengambil data penilaian produk alam ===========
	$jumlahProdukAlam = $request->input('jumlahProdukAlam');

	$daftarNamaProdukAlam = [];
	for($i=1; $i<=$jumlahProdukAlam; $i++){
		$atributName = "namaProdukAlam_".$i;
		$daftarNamaProdukAlam [] = $request->input($atributName);
	}

	$daftarPermasalahanAlam = [];
	for($i=1; $i<=$jumlahProdukAlam; $i++){
		$atributName = "permasalahanProdukAlam_".$i;
		$daftarPermasalahanAlam [] = $request->input($atributName);
	}

	$daftarKeteranganAlam = [];
	for($i=1; $i<=$jumlahProdukAlam; $i++){
		$atributName = "keteranganProdukAlam_".$i;
		$daftarKeteranganAlam [] = $request->input($atributName);
	}

	$daftarTanggalPerbaikanAlam = [];
	for($i=1; $i<=$jumlahProdukAlam; $i++){
		$atributName = "tanggalPerbaikanProdukAlam_".$i;
		$daftarTanggalPerbaikanAlam [] = $request->input($atributName);
	}	


	$jumlahProdukAlamFix = 0;
	foreach($daftarNamaProdukAlam as $produkAlam){
		if($produkAlam != null){
			$jumlahProdukAlamFix++;
		}
	}

	for($i=0; $i<$jumlahProdukAlamFix; $i++){

		DB::table('penilaian')->insert([
				'id' => $maxId,
				'id_formulir_penilaian' => $maxIdFormulirPenilaian,
				'nama_aspek' => $daftarNamaProdukAlam[$i],
				'permasalahan' => $daftarPermasalahanAlam[$i],
				'keterangan' => $daftarKeteranganAlam[$i],
				'tanggal_perbaikan'	=> $daftarTanggalPerbaikanAlam[$i],
				'jenis_penilaian' => 'Produk Alam'
				]);;
			$maxId++;
	}







	// =========== Code bagian mengambil data penilaian produk budaya ===========
	$jumlahProdukBudaya = $request->input('jumlahProdukBudaya');

	$daftarNamaProdukBudaya = [];
	for($i=1; $i<=$jumlahProdukBudaya; $i++){
		$atributName = "namaProdukBudaya_".$i;
		$daftarNamaProdukBudaya [] = $request->input($atributName);
	}

	$daftarPermasalahanBudaya = [];
	for($i=1; $i<=$jumlahProdukBudaya; $i++){
		$atributName = "permasalahanProdukBudaya_".$i;
		$daftarPermasalahanBudaya [] = $request->input($atributName);
	}

	$daftarKeteranganBudaya = [];
	for($i=1; $i<=$jumlahProdukBudaya; $i++){
		$atributName = "keteranganProdukBudaya_".$i;
		$daftarKeteranganBudaya [] = $request->input($atributName);
	}

	$daftarTanggalPerbaikanBudaya = [];
	for($i=1; $i<=$jumlahProdukBudaya; $i++){
		$atributName = "tanggalPerbaikanProdukBudaya_".$i;
		$daftarTanggalPerbaikanBudaya [] = $request->input($atributName);
	}


	$jumlahProdukBudayaFix = 0;
	foreach($daftarNamaProdukBudaya as $produkBudaya){
		if($produkBudaya != null){
			$jumlahProdukBudayaFix++;
		}
	}

	for($i=0; $i<$jumlahProdukBudayaFix; $i++){
		DB::table('penilaian')->insert([
				'id' => $maxId,
				'id_formulir_penilaian' => $maxIdFormulirPenilaian,
				'nama_aspek' => $daftarNamaProdukBudaya[$i],
				'permasalahan' => $daftarPermasalahanBudaya[$i],
				'keterangan' => $daftarKeteranganBudaya[$i],
				'tanggal_perbaikan'	=> $daftarTanggalPerbaikanBudaya[$i],
				'jenis_penilaian' => 'Produk Budaya'
				]);;
			$maxId++;
	}







	// =========== Code bagian mengambil data penilaian produk buatan ===========
	$jumlahProdukBuatan = $request->input('jumlahProdukBuatan');

	$daftarNamaProdukBuatan = [];
	for($i=1; $i<=$jumlahProdukBuatan; $i++){
		$atributName = "namaProdukBuatan_".$i;
		$daftarNamaProdukBuatan [] = $request->input($atributName);
	}

	$daftarPermasalahanBuatan = [];
	for($i=1; $i<=$jumlahProdukBuatan; $i++){
		$atributName = "permasalahanProdukBuatan_".$i;
		$daftarPermasalahanBuatan [] = $request->input($atributName);
	}

	$daftarKeteranganBuatan = [];
	for($i=1; $i<=$jumlahProdukBuatan; $i++){
		$atributName = "keteranganProdukBuatan_".$i;
		$daftarKeteranganBuatan [] = $request->input($atributName);
	}

	$daftarTanggalPerbaikanBuatan = [];
	for($i=1; $i<=$jumlahProdukBuatan; $i++){
		$atributName = "tanggalPerbaikanProdukBuatan_".$i;
		$daftarTanggalPerbaikanBuatan [] = $request->input($atributName);
	}

	$jumlahProdukBuatanFix = 0;
	foreach($daftarNamaProdukBuatan as $produkBuatan){
		if($produkBuatan != null){
			$jumlahProdukBuatanFix++;
		}
	}

	for($i=0; $i<$jumlahProdukBuatanFix; $i++){
		DB::table('penilaian')->insert([
				'id' => $maxId,
				'id_formulir_penilaian' => $maxIdFormulirPenilaian,
				'nama_aspek' => $daftarNamaProdukBuatan[$i],
				'permasalahan' => $daftarPermasalahanBuatan[$i],
				'keterangan' => $daftarKeteranganBuatan[$i],
				'tanggal_perbaikan'	=> $daftarTanggalPerbaikanBuatan[$i],
				'jenis_penilaian' => 'Produk Buatan'
				]);;
			$maxId++;
	}






	// =========== Code bagian mengambil data penilaian fasilitas ===========
	$jumlahFasilitas = $request->input('jumlahFasilitas');

	$daftarNamaFasilitas = [];
	for($i=1; $i<=$jumlahFasilitas; $i++){
		$atributName = "namaFasilitas_".$i;
		$daftarNamaFasilitas [] = $request->input($atributName);
	}

	$daftarPermasalahanFasilitas = [];
	for($i=1; $i<=$jumlahFasilitas; $i++){
		$atributName = "permasalahanFasilitas_".$i;
		$daftarPermasalahanFasilitas [] = $request->input($atributName);
	}

	$daftarKeteranganFasilitas = [];
	for($i=1; $i<=$jumlahFasilitas; $i++){
		$atributName = "keteranganFasilitas_".$i;
		$daftarKeteranganFasilitas [] = $request->input($atributName);
	}

	$daftarTanggalPerbaikanFasilitas = [];
	for($i=1; $i<=$jumlahFasilitas; $i++){
		$atributName = "tanggalPerbaikanFasilitas_".$i;
		$daftarTanggalPerbaikanFasilitas [] = $request->input($atributName);
	}


	$jumlahFasilitasFix = 0;
	foreach($daftarNamaFasilitas as $fasilitas){
		if($fasilitas != null){
			$jumlahFasilitasFix++;
		}
	}

	for($i=0; $i<$jumlahFasilitasFix; $i++){
		DB::table('penilaian')->insert([
				'id' => $maxId,
				'id_formulir_penilaian' => $maxIdFormulirPenilaian,
				'nama_aspek' => $daftarNamaFasilitas[$i],
				'permasalahan' => $daftarPermasalahanFasilitas[$i],
				'keterangan' => $daftarKeteranganFasilitas[$i],
				'tanggal_perbaikan'	=> $daftarTanggalPerbaikanFasilitas[$i],
				'jenis_penilaian' => 'Fasilitas'
				]);;
			$maxId++;
	}






	// =========== Code bagian mengambil data penilaian layanan ===========
	$jumlahLayanan = $request->input('jumlahLayanan');

	$daftarNamaLayanan = [];
	for($i=1; $i<=$jumlahLayanan; $i++){
		$atributName = "namaLayanan_".$i;
		$daftarNamaLayanan [] = $request->input($atributName);
	}

	$daftarPermasalahanLayanan = [];
	for($i=1; $i<=$jumlahLayanan; $i++){
		$atributName = "permasalahanLayanan_".$i;
		$daftarPermasalahanLayanan [] = $request->input($atributName);
	}

	$daftarKeteranganLayanan = [];
	for($i=1; $i<=$jumlahLayanan; $i++){
		$atributName = "keteranganLayanan_".$i;
		$daftarKeteranganLayanan [] = $request->input($atributName);
	}

	$daftarTanggalPerbaikanLayanan = [];
	for($i=1; $i<=$jumlahLayanan; $i++){
		$atributName = "tanggalPerbaikanLayanan_".$i;
		$daftarTanggalPerbaikanLayanan [] = $request->input($atributName);
	}

	
	$jumlahLayanan = 0;
	foreach($daftarNamaLayanan as $layanan){
		if($layanan != null){
			$jumlahLayanan++;
		}
	}

	for($i=0; $i<$jumlahLayanan; $i++){
		DB::table('penilaian')->insert([
				'id' => $maxId,
				'id_formulir_penilaian' => $maxIdFormulirPenilaian,
				'nama_aspek' => $daftarNamaLayanan[$i],
				'permasalahan' => $daftarPermasalahanLayanan[$i],
				'keterangan' => $daftarKeteranganLayanan[$i],
				'tanggal_perbaikan'	=> $daftarTanggalPerbaikanLayanan[$i],
				'jenis_penilaian' => 'Layanan'
				]);;
			$maxId++;
	}





	// =========== Code bagian mengambil data penilaian Pengelolaan ===========
	$namaStrukturKampungWisata = $request -> namaStrukturKampungWisata;
	$permasalahanStrukturKampungWisata = $request -> permasalahanStrukturKampungWisata;
	$keteranganStrukturKampungWisata = $request -> keteranganStrukturKampungWisata;
	$tanggalPerbaikanStrukturKampungWisata = $request -> tanggalPerbaikanStrukturKampungWisata;
	
	DB::table('penilaian') -> insert([
			'id' => $maxId,
			'id_formulir_penilaian' => $maxIdFormulirPenilaian,
			'nama_aspek' => $namaStrukturKampungWisata,
			'permasalahan' => $permasalahanStrukturKampungWisata,
			'keterangan' => $keteranganStrukturKampungWisata,
			'tanggal_perbaikan'	=> $tanggalPerbaikanStrukturKampungWisata,
			'jenis_penilaian' => 'Pengelolaan'
		]);
	




	$maxId++;
	$namaStandarOperasional = $request -> namaStandarOperasional;
	$permasalahanStandarOperasional = $request -> permasalahanStandarOperasional;
	$keteranganStandarOperasional = $request -> keteranganStandarOperasional;
	$tanggalPerbaikanStandarOperasional = $request -> tanggalPerbaikanStandarOperasional;

	DB::table('penilaian') -> insert([
			'id' => $maxId,
			'id_formulir_penilaian' => $maxIdFormulirPenilaian,
			'nama_aspek' => $namaStandarOperasional,
			'permasalahan' => $permasalahanStandarOperasional,
			'keterangan' => $keteranganStandarOperasional,
			'tanggal_perbaikan'	=> $tanggalPerbaikanStandarOperasional,
			'jenis_penilaian' => 'Pengelolaan'
		]);




	$maxId++;
	$namaKelembagaanKampungWisata = $request -> namaKelembagaanKampungWisata;
	$permasalahanKelembagaanKampungWisata = $request -> permasalahanKelembagaanKampungWisata;
	$keteranganKelembagaanKampungWisata = $request -> keteranganKelembagaanKampungWisata;
	$tanggalPerbaikanKelembagaanKampungWisata = $request -> tanggalPerbaikanKelembagaanKampungWisata;

	DB::table('penilaian') -> insert([
			'id' => $maxId,
			'id_formulir_penilaian' => $maxIdFormulirPenilaian,
			'nama_aspek' => $namaKelembagaanKampungWisata,
			'permasalahan' => $permasalahanKelembagaanKampungWisata,
			'keterangan' => $keteranganKelembagaanKampungWisata,
			'tanggal_perbaikan'	=> $tanggalPerbaikanKelembagaanKampungWisata,
			'jenis_penilaian' => 'Pengelolaan'
		]);

	return redirect('/dashboardDinasPariwisata');

	
}













}
