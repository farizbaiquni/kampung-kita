<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- BAGIAN JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/navbar.css" rel="stylesheet">

    <!-- BAGIAN CSS -->
    <style type="text/css">
      #judulHalaman {
        text-align: center;
        margin-top: 90px;
      }

      #judul-kategori{
        text-align: left;
        font-size: 25px;
        font-weight: bolder;
        height: 61px;
        border-width: 1px;
        border-color: black;
        background-color: black;
        color: white;
      }

      .produkKampungWisata{
        color: white;
        font-size: black;
      }

      #sub-kategori{
        background: #E9E9E9;
        font-weight: bolder;
        text-align: left;
        margin-top: 25px;
        margin-bottom: 25px;
        border-color: black;
        height: 50px;
        background-color: #22a345;
        color: white;
      }

      #tombolSubmit{
        background-color: #22a345;
        color: white;
        border-color: black;
        font-weight: bolder;
      }

       #tombolLogout{
        font-family: sans-serif;
        background-color: #fec503;
        color: black;
        font-weight: bolder;
        border-color: black;
      }

      #judulPenilaian{
        background-color: #fec503;
      }

    </style>

    <title>Formulir Kampung Wisata</title>
  </head>








  <body>

  <nav class="navbar navbar-light bg-dark" id="mainNav">
    <span class="navbar-brand mb-0 h1 text-white">
    <div class="container">
      <a class="navbar-brand" href="/indexLoginPengelola">Kampung Kita</a>
      <a class="btn btn-dark" id="tombolLogout" href="/logout" role="button" style="margin-left: 1000px;">Logout</a>
    </span>
  </nav>

  <h2 id="judulHalaman">Formulir Penilaian Kampung Wisata</h2> <br> <br>

  <div class="container">
  
  <?php  
  $idFormulirDinilai = $idFormulir
  ?>


  <form action="/insertFormulirPenilaian?id={{$idFormulirDinilai}}" method="post">
    {{csrf_field()}}

    <button type="button" class="btn btn-primary btn-lg btn-block" id="judul-kategori">Aspek Produk dan Layanan</button> <br>





<!-- =============== PENILAIAN PRODUK ALAM =============== -->
    <button type="button" class="btn btn-primary btn-lg btn-block" id="sub-kategori"> Penilaian Produk Alam</button>
    
    <?php 
    $uniqAlam = 1; 
    $jumlahProdukAlam = 1;
    ?>
    @foreach($daftarProdukAlam as $produkAlam)
    <div class="group-produk">
      <div class="form-group">
        <label for="produk">Produk Kampung Wisata</label>
        <button type="button" class="btn btn-white btn-md btn-block" style="text-align: left; border-color: #d9d9d9;">{{$produkAlam}}</button>
        <input type="hidden" name="namaProdukAlam_<?= $uniqAlam ?>" value="{{$produkAlam}}">
      </div>
    
      <div class="form-group mb-3">
        <label for="inputPermasalahanAlam_<?= $uniqAlam ?>">Ditemukan Permasalahan</label>
        <select class="form-control classPermasalahan" id="inputPermasalahanAlam_<?= $uniqAlam ?>" name="permasalahanProdukAlam_<?= $uniqAlam?>">
          <option value="Tidak Ada">Tidak Ada</option>
          <option value="Masalah Major">Masalah Major</option>
          <option value="Minor">Minor</option>
          <option value="Observasi">Observasi</option>
        </select>
      </div>
      <div class="form-group">
        <label for="inputKeteranganAlam_<?= $uniqAlam ?>">Keterangan</label>
        <textarea class="form-control" id="inputKeteranganAlam_<?= $uniqAlam ?>" rows="3" name="keteranganProdukAlam_<?= $uniqAlam ?>"></textarea>
      </div>

      <div class="form-group batas-perbaikan" id="batas-perbaikan-alam_<?= $uniqAlam?>">
        <label for="inputTanggalPerbaikan_<?= $uniqAlam?>">Batas Perbaikan</label>
        <input type="date" class="form-control" id="inputTanggalPerbaikan_<?= $uniqAlam?>" placeholder="" name="tanggalPerbaikanProdukAlam_<?= $uniqAlam ?>">
      </div>
    </div>
    <br>
    <hr style="border-width: 3px; border-color: grey;">
    
    <?php 
    $uniqAlam++;
    $jumlahProdukAlam++;
    ?>
    @endforeach
    <input type="hidden" name="jumlahProdukAlam" value="{{$jumlahProdukAlam}}" id="jumlahProdukAlam">





<!-- =============== PENILAIAN PRODUK BUDAYA =============== -->
    <button type="button" class="btn btn-primary btn-lg btn-block" id="sub-kategori"> Penilaian Produk Budaya</button>
    

    <?php 
    $uniqBudaya = 1;
    $jumlahProdukBudaya = 1;
    ?>
    @foreach($daftarProdukBudaya as $produkBudaya)
    <div class="group-produk">
      <div class="form-group">
        <label for="produk">Produk Kampung Wisata</label>
        <button type="button" class="btn btn-white btn-md btn-block" style="text-align: left; border-color: #d9d9d9;">{{$produkBudaya}}</button>
        <input type="hidden" name="namaProdukBudaya_<?= $uniqBudaya ?>" value="{{$produkBudaya}}">
      </div>
    
      <div class="form-group mb-3">
        <label for="inputPermasalahanBudaya_<?=$uniqBudaya?>" id="">Ditemukan Permasalahan</label>
        <select class="form-control classPermasalahan" id="inputPermasalahanBudaya_<?=$uniqBudaya?>" name="permasalahanProdukBudaya_<?=$uniqBudaya?>">
          <option value="Tidak Ada">Tidak Ada</option>
          <option value="Masalah Major">Masalah Major</option>
          <option value="Minor">Minor</option>
          <option value="Observasi">Observasi</option>
        </select>
      </div>
      <div class="form-group">
        <label for="inputKeteranganBudaya_<?=$uniqBudaya?>">Keterangan</label>
        <textarea class="form-control" id="inputKeteranganBudaya_<?=$uniqBudaya?>" rows="3" name="keteranganProdukBudaya_<?=$uniqBudaya?>"></textarea>
      </div>

      <div class="form-group batas-perbaikan" id="batas-perbaikan-budaya_<?= $uniqBudaya?>">
        <label for="inputTanggalPerbaikanBudaya_<?=$uniqBudaya?>">Batas Perbaikan</label>
        <input type="date" class="form-control" id="inputTanggalPerbaikanBudaya_<?=$uniqBudaya?>" placeholder="" name="tanggalPerbaikanProdukBudaya_<?= $uniqBudaya?>">
      </div>
    </div>
    <br>
    <hr style="border-width: 3px; border-color: grey;">
    <?php 
    $uniqBudaya++;
    $jumlahProdukBudaya++;
    ?>
    @endforeach
    <input type="hidden" name="jumlahProdukBudaya" value="{{$jumlahProdukBudaya}}" id="jumlahProdukBudaya">





<!-- =============== PENILAIAN PRODUK BUATAN =============== -->
    <button type="button" class="btn btn-primary btn-lg btn-block" id="sub-kategori"> Penilaian Produk Buatan</button>
    
    <?php 
    $uniqBuatan = 1;
    $jumlahProdukBuatan = 1;
    ?>
    @foreach($daftarProdukBuatan as $produkBuatan)
    <div class="group-produk">
      <div class="form-group">
        <label for="produk">Produk Kampung Wisata</label>
        <button type="button" class="btn btn-white btn-md btn-block" style="text-align: left; border-color: #d9d9d9;">{{$produkBuatan}}</button>
        <input type="hidden" name="namaProdukBuatan_<?= $uniqBuatan ?>" value="{{$produkBuatan}}">
      </div>
    
      <div class="form-group mb-3">
        <label for="inputPermasalahanBuatan_<?=$uniqBuatan?>">Ditemukan Permasalahan</label>
        <select class="form-control classPermasalahan" id="inputPermasalahanBuatan_<?=$uniqBuatan?>" name="permasalahanProdukBuatan_<?=$uniqBuatan?>">
          <option value="Tidak Ada">Tidak Ada</option>
          <option value="Masalah Major">Masalah Major</option>
          <option value="Minor">Minor</option>
          <option value="Observasi">Observasi</option>
        </select>
      </div>
      <div class="form-group">
        <label for="inputKeteranganBuatan_<?=$uniqBuatan?>">Keterangan</label>
        <textarea class="form-control" id="inputKeteranganBuatan_<?=$uniqBuatan?>" rows="3" name="keteranganProdukBuatan_<?=$uniqBuatan?>"></textarea>
      </div>

      <div class="form-group batas-perbaikan" id="batas-perbaikan-buatan_<?=$uniqBuatan?>">
        <label for="inputTanggalPerbaikanBuatan__<?=$uniqBuatan?>">Batas Perbaikan</label>
        <input type="date" class="form-control" id="inputTanggalPerbaikanBuatan__<?=$uniqBuatan?>" placeholder="" name="tanggalPerbaikanProdukBuatan_<?=$uniqBuatan?>">
      </div>
    </div>
    <br>
    <hr style="border-width: 3px; border-color: grey;">

    <?php 
    $uniqBuatan++;
    $jumlahProdukBuatan++;
    ?>
    @endforeach
    <input type="hidden" name="jumlahProdukBuatan" value="{{$jumlahProdukBuatan}}" id="jumlahProdukBuatan">





<!-- =============== PENILAIAN FASILITAS =============== -->
    <button type="button" class="btn btn-primary btn-lg btn-block" id="sub-kategori"> Penilaian Fasilitas</button>


    <?php 
    $uniqFasilitas = 1;
    $jumlahFasilitas = 1;
    ?>
    @foreach($daftarFasilitas as $fasilitas)
    <div class="group-produk">
      <div class="form-group">
        <label for="produk">Produk Kampung Wisata</label>
        <button type="button" class="btn btn-white btn-md btn-block" style="text-align: left; border-color: #d9d9d9;">{{$fasilitas}}</button>
        <input type="hidden" name="namaFasilitas_<?= $uniqFasilitas ?>" value="{{$fasilitas}}">
      </div>
    
      <div class="form-group mb-3">
        <label for="inputPermasalahanFasilitas_<?= $uniqFasilitas ?>">Ditemukan Permasalahan</label>
        <select class="form-control classPermasalahan" id="inputPermasalahanFasilitas_<?= $uniqFasilitas ?>" name="permasalahanFasilitas_<?= $uniqFasilitas ?>">
          <option value="Tidak Ada">Tidak Ada</option>
          <option value="Masalah Major">Masalah Major</option>
          <option value="Minor">Minor</option>
          <option value="Observasi">Observasi</option>
        </select>
      </div>
      <div class="form-group">
        <label for="inputKeteranganFasilitas_<?= $uniqFasilitas ?>">Keterangan</label>
        <textarea class="form-control" id="inputKeteranganFasilitas_<?= $uniqFasilitas ?>" rows="3" name="keteranganFasilitas_<?= $uniqFasilitas ?>"></textarea>
      </div>

      <div class="form-group batas-perbaikan" id="batas-perbaikan-fasilitas_<?= $uniqFasilitas ?>">
        <label for="inputTanggalPerbaikanFasilitas_<?= $uniqFasilitas ?>">Batas Perbaikan</label>
        <input type="date" class="form-control" id="inputTanggalPerbaikanFasilitas_<?= $uniqFasilitas ?>" placeholder="" name="tanggalPerbaikanFasilitas_<?= $uniqFasilitas ?>">
      </div>
    </div>
    <br>
    <hr style="border-width: 3px; border-color: grey;">
    <?php 
    $uniqFasilitas++;
    $jumlahFasilitas++;
    ?>
    @endforeach
    <input type="hidden" name="jumlahFasilitas" value="{{$jumlahFasilitas}}" id="jumlahFasilitas">




<!-- =============== PENILAIAN LAYANAN =============== -->
    <button type="button" class="btn btn-primary btn-lg btn-block" id="sub-kategori"> Penilaian Layanan</button>

    <?php 
    $uniqLayanan = 1;
    $jumlahLayanan = 1;
    ?>
    @foreach($daftarLayanan as $layanan)
    <div class="group-produk">
      <div class="form-group">
        <label for="produk">Produk Kampung Wisata</label>
        <button type="button" class="btn btn-white btn-md btn-block" style="text-align: left; border-color: #d9d9d9;">{{$layanan}}</button>
        <input type="hidden" name="namaLayanan_<?= $uniqLayanan ?>" value="{{$layanan}}">
      </div>
    
      <div class="form-group mb-3">
        <label for="inputPermasalahanLayanan_<?= $uniqLayanan ?>">Ditemukan Permasalahan</label>
        <select class="form-control classPermasalahan" id="inputPermasalahanLayanan_<?= $uniqLayanan ?>" name="permasalahanLayanan_<?= $uniqLayanan ?>">
          <option value="Tidak Ada">Tidak Ada</option>
          <option value="Masalah Major">Masalah Major</option>
          <option value="Minor">Minor</option>
          <option value="Observasi">Observasi</option>
        </select>
      </div>
      <div class="form-group">
        <label for="inputKeteranganLayanan_<?= $uniqLayanan ?>">Keterangan</label>
        <textarea class="form-control" id="inputKeteranganLayanan_<?= $uniqLayanan ?>" rows="3" name="keteranganLayanan_<?= $uniqLayanan ?>"></textarea>
      </div>

      <div class="form-group batas-perbaikan" id="batas-perbaikan-layanan_<?= $uniqLayanan ?>">
        <label for="inputTanggalPerbaikanLayanan_<?= $uniqLayanan ?>">Batas Perbaikan</label>
        <input type="date" class="form-control" id="inputTanggalPerbaikanLayanan_<?= $uniqLayanan ?>" placeholder="" name="tanggalPerbaikanLayanan_<?= $uniqLayanan ?>">
      </div>
    </div>
    <br>
    <hr style="border-width: 3px; border-color: grey;">
    <?php 
    $uniqLayanan++;
    $jumlahLayanan++;
    ?>
    @endforeach
    <input type="hidden" name="jumlahLayanan" value="{{$jumlahLayanan}}" id="jumlahLayanan">





<!-- =============== PENILAIAN PENGELOLAAN =============== -->
    <button type="button" class="btn btn-primary btn-lg btn-block" style="margin-top: 75px;" id="judul-kategori">Aspek Pengelolaan</button> <br>




    <p style="font-size: 19px; font-weight: bolder;">Struktur Kampung Wisata</p>
    <input type="hidden" name="namaStrukturKampungWisata" value="Struktur Kampung Wisata">
    <div class="form-group mb-3">
      <label for="inputPermasalahan">Ditemukan Permasalahan</label>
      <select class="form-control" id="inputPermasalahan" name="permasalahanStrukturKampungWisata">
        <option value="Tidak Ada">Tidak Ada</option>
        <option value="Masalah Major">Masalah Major</option>
        <option value="Minor">Minor</option>
        <option value="Observasi">Observasi</option>
      </select>
    </div>
    <div class="form-group">
      <label for="inputKeterangan">Keterangan</label>
      <textarea class="form-control" id="inputKeterangan" rows="3" name="keteranganStrukturKampungWisata"></textarea>
    </div>

    <div class="form-group batas-perbaikan">
      <label for="inputTanggalPerbaikan">Batas Perbaikan</label>
      <input type="date" class="form-control" id="inputTanggalPerbaikan" placeholder="" name="tanggalPerbaikanStrukturKampungWisata">
    </div>




    <p style="font-size: 19px; margin-top: 40px; font-weight: bolder;">Dokumentasi Standar Operasional</p>
    <input type="hidden" name="namaStandarOperasional" value="Standar Operasional">
    <div class="form-group mb-3">
      <label for="inputPermasalahan">Ditemukan Permasalahan</label>
      <select class="form-control" id="inputPermasalahan" name="permasalahanStandarOperasional">
        <option value="Tidak Ada">Tidak Ada</option>
        <option value="Masalah Major">Masalah Major</option>
        <option value="Minor">Minor</option>
        <option value="Observasi">Observasi</option>
      </select>
    </div>
    <div class="form-group">
      <label for="inputKeterangan">Keterangan</label>
      <textarea class="form-control" id="inputKeterangan" rows="3" name="keteranganStandarOperasional"></textarea>
    </div>

    <div class="form-group batas-perbaikan">
      <label for="inputTanggalPerbaikan">Batas Perbaikan</label>
      <input type="date" class="form-control" id="inputTanggalPerbaikan" placeholder="" name="tanggalPerbaikanStandarOperasional">
    </div>




    <p style="font-size: 19px; margin-top: 40px; font-weight: bolder;">Kelembagaan Kampung Wisata</p>
    <input type="hidden" name="namaKelembagaanKampungWisata" value="Kelembagaan">

    <div class="form-group mb-3">
      <label>Ditemukan Permasalahan</label>
      <select class="form-control" name="permasalahanKelembagaanKampungWisata">
        <option value="Tidak Ada">Tidak Ada</option>
        <option value="Masalah Major">Masalah Major</option>
        <option value="Minor">Minor</option>
        <option value="Observasi">Observasi</option>
      </select>
    </div>

    <div class="form-group">
      <label>Keterangan</label>
      <textarea class="form-control" rows="3" name="keteranganKelembagaanKampungWisata"></textarea>
    </div>

    <div class="form-group batas-perbaikan">
      <label>Batas Perbaikan</label>
      <input type="date" class="form-control" placeholder="" name="tanggalPerbaikanKelembagaanKampungWisata">
    </div>
   

    

    <button type="button" class="btn btn-primary btn-lg btn-block" style="margin-top: 75px;" id="judul-kategori">Penilaian</button> <br>

    <div class="input-group row mt-1">
      <label class="col-sm-2 col-form-label">Nilai Produk</label>
      <input type="hidden" name="namaNilaiProduk" value="Nilai Produk">
      <input type="number" class="form-control ml-3" name="nilaiProduk">
    </div>

    <div class="input-group row mt-3">
      <label class="col-sm-2 col-form-label">Nilai Layanan</label>
      <input type="hidden" name="namaNilaiLayanan" value="Nilai Layanan">
      <input type="number" class="form-control ml-3" name="nilaiLayanan">
    </div>

    <div class="input-group row mt-3">
      <label class="col-sm-2 col-form-label">Nilai Pengelolaan</label>
      <input type="hidden" name="namaNilaiPengelolaan" value="Nilai Pengelolaan">
      <input type="number" class="form-control ml-3" name="nilaiPengelolaan">
    </div>

    <div class="input-group row mt-3">
      <input type="hidden" name="namaHasilPenilaian" value="Hasil Penilaian">
      <label class="col-sm-2 col-form-label">Hasil Penilaian</label>
      <select class="form-control ml-3" name="hasilPenilaian">
        <option value="Rintisan">Rintisan</option>
        <option value="Berkembang">Berkembang</option>
        <option value="Mandiri">Mandiri</option>
      </select>
    </div>



    <!-- Bagian Tombol Sumbit -->
    <br>
    <div class="form-group row mt-3">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary" id="tombolSubmit">Submit</button>
      </div>
    </div>
  </form>
</div>
















  <!-- ===================== JQUERY ===================== -->

  <script type="text/javascript">

    //Code untuk menyembunyikan tampilan tanggal perbaikan
    var jumlahProdukAlam = $('#jumlahProdukAlam').val();
    while(jumlahProdukAlam > 0) {
          $('#batas-perbaikan-alam_'+jumlahProdukAlam).hide();
          jumlahProdukAlam--; 
    } 

    var jumlahProdukBudaya = $('#jumlahProdukBudaya').val();
    while(jumlahProdukBudaya > 0) {
          $('#batas-perbaikan-budaya_'+jumlahProdukBudaya).hide();
          jumlahProdukBudaya--; 
    } 

    var jumlahProdukBuatan = $('#jumlahProdukBuatan').val();
    while(jumlahProdukBuatan > 0) {
          $('#batas-perbaikan-buatan_'+jumlahProdukBuatan).hide();
          jumlahProdukBuatan--; 
    } 

    var jumlahFasilitas = $('#jumlahFasilitas').val();
    while(jumlahFasilitas > 0) {
          $('#batas-perbaikan-fasilitas_'+jumlahFasilitas).hide();
          jumlahFasilitas--; 
    } 

    var jumlahLayanan = $('#jumlahLayanan').val();
    while(jumlahLayanan > 0) {
          $('#batas-perbaikan-layanan_'+jumlahLayanan).hide();
          jumlahLayanan--; 
    } 




    //Code untuk mengelola interaksi tampilan tanggal produk alam secara dinamis
    $(document).ready(function(){
      $('.classPermasalahan').on("click", function(){
        var jumlahProdukAlam = $('#jumlahProdukAlam').val();
        while(jumlahProdukAlam > 0) {
          var indexPermasalahanAlam = $('#inputPermasalahanAlam_'+jumlahProdukAlam).val();
          if(indexPermasalahanAlam != 'Tidak Ada') {
            $('#batas-perbaikan-alam_'+jumlahProdukAlam).show();
            jumlahProdukAlam--;
          } else {
            $('#batas-perbaikan-alam_'+jumlahProdukAlam).hide();
            jumlahProdukAlam--;
          }
        }   
      })      
    })

    //Code untuk mengelola interaksi tampilan tanggal produk budaya secara dinamis
    $(document).ready(function(){
      $('.classPermasalahan').on('click', function(){
        var jumlahProdukBudaya = $('#jumlahProdukBudaya').val();
        while(jumlahProdukBudaya > 0){
          var indexPermasalahanBudaya = $('#inputPermasalahanBudaya_'+ jumlahProdukBudaya).val();
          if(indexPermasalahanBudaya != 'Tidak Ada') {
            $('#batas-perbaikan-budaya_'+jumlahProdukBudaya).show();
            jumlahProdukBudaya--;
          } else {
            $('#batas-perbaikan-budaya_'+jumlahProdukBudaya).hide();
            jumlahProdukBudaya--;
          }
        }
      })
    })

    //Code untuk mengelola interaksi tampilan tanggal produk buatan secara dinamis
    $(document).ready(function(){
      $('.classPermasalahan').on('click', function(){
        var jumlahProdukBuatan = $('#jumlahProdukBuatan').val();
        while(jumlahProdukBuatan > 0){
          var indexPermasalahanBuatan = $('#inputPermasalahanBuatan_'+ jumlahProdukBuatan).val();
          if(indexPermasalahanBuatan != 'Tidak Ada') {
            $('#batas-perbaikan-buatan_'+jumlahProdukBuatan).show();
            jumlahProdukBuatan--;
          } else {
            $('#batas-perbaikan-buatan_'+jumlahProdukBuatan).hide();
            jumlahProdukBuatan--;
          }
        }
      })
    })

    //Code untuk mengelola interaksi tampilan tanggal fasilitas secara dinamis
    $(document).ready(function(){
      $('.classPermasalahan').on('click', function(){
        var jumlahFasilitas = $('#jumlahFasilitas').val();
        while(jumlahFasilitas > 0){
          var indexPermasalahanFasilitas = $('#inputPermasalahanFasilitas_'+ jumlahFasilitas).val();
          if(indexPermasalahanFasilitas != 'Tidak Ada') {
            $('#batas-perbaikan-fasilitas_'+jumlahFasilitas).show();
            jumlahFasilitas--;
          } else {
            $('#batas-perbaikan-fasilitas_'+jumlahFasilitas).hide();
            jumlahFasilitas--;
          }
        }
      })
    })

    //Code untuk mengelola interaksi tampilan tanggal layanan secara dinamis
    $(document).ready(function(){
      $('.classPermasalahan').on("click", function(){
        var jumlahLayanan = $('#jumlahLayanan').val();
        while(jumlahLayanan > 0) {
          var indexPermasalahanLayanan = $('#inputPermasalahanLayanan_'+jumlahLayanan).val();
          if(indexPermasalahanLayanan != 'Tidak Ada') {
            $('#batas-perbaikan-layanan_'+jumlahLayanan).show();
            jumlahLayanan--;
          } else {
            $('#batas-perbaikan-layanan_'+jumlahLayanan).hide();
            jumlahLayanan--;
          }
        }   
      })      
    })



  </script>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>