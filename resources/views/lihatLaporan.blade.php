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
        background: #c7c3c3;
        font-weight: bolder;
        text-align: left;
        margin-top: 25px;
        margin-bottom: 25px;
        border-color: black;
        height: 50px;
        background-color: #c7c3c3;
        color: black;
      }

      #tombolDownload{
        background-color: #fec503;
        color: black;
        border-color: black;
        font-weight: bolder;
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
      <a class="navbar-brand" href="/indexLoginDinasPariwisata">Kampung Kita</a>
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
    <button type="button" class="btn btn-primary btn-lg btn-block" id="sub-kategori"> Produk Alam</button>
    
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

    
    <?php 
    $uniqAlam++;
    $jumlahProdukAlam++;
    ?>
    @endforeach
    <input type="hidden" name="jumlahProdukAlam" value="{{$jumlahProdukAlam}}" id="jumlahProdukAlam">





<!-- =============== PENILAIAN PRODUK BUDAYA =============== -->
    <button type="button" class="btn btn-primary btn-lg btn-block" id="sub-kategori"> Produk Budaya</button>
    

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
    
    <?php 
    $uniqBudaya++;
    $jumlahProdukBudaya++;
    ?>
    @endforeach
    <input type="hidden" name="jumlahProdukBudaya" value="{{$jumlahProdukBudaya}}" id="jumlahProdukBudaya">





<!-- =============== PENILAIAN PRODUK BUATAN =============== -->
    <button type="button" class="btn btn-primary btn-lg btn-block" id="sub-kategori"> Produk Buatan</button>
    
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
    

    <?php 
    $uniqBuatan++;
    $jumlahProdukBuatan++;
    ?>
    @endforeach
    <input type="hidden" name="jumlahProdukBuatan" value="{{$jumlahProdukBuatan}}" id="jumlahProdukBuatan">





<!-- =============== PENILAIAN FASILITAS =============== -->
    <button type="button" class="btn btn-primary btn-lg btn-block" id="sub-kategori"> Fasilitas</button>


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
    
    <?php 
    $uniqFasilitas++;
    $jumlahFasilitas++;
    ?>
    @endforeach
    <input type="hidden" name="jumlahFasilitas" value="{{$jumlahFasilitas}}" id="jumlahFasilitas">




<!-- =============== PENILAIAN LAYANAN =============== -->
    <button type="button" class="btn btn-primary btn-lg btn-block" id="sub-kategori"> Layanan</button>

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
    
    <?php 
    $uniqLayanan++;
    $jumlahLayanan++;
    ?>
    @endforeach
    <input type="hidden" name="jumlahLayanan" value="{{$jumlahLayanan}}" id="jumlahLayanan">





<!-- =============== PENILAIAN PENGELOLAAN =============== -->
    <button type="button" class="btn btn-primary btn-lg btn-block" style="margin-top: 75px;" id="judul-kategori">Pengelolaan</button> <br>

    @foreach($daftarFile as $file)
    @if($file -> jenis_file == 'Struktur Pembina')
    <p style="font-size: 19px; font-weight: bolder;">Stuktur Pembina</p>
      <div class="form-group row mt-3">
        <a class="btn btn-primary btn-md tombol-dashboard ml-3 mb-2 mt-1" href="/downloadFilePembina?nama={{$file -> nama_file}}" role="button" id="tombolDownload" >Download</a> 
      </div>
    @else
    @endif
    @endforeach



    @foreach($daftarFile as $file)
    @if($file -> jenis_file == 'Struktur Pengelola')
      <p style="font-size: 19px; font-weight: bolder;">Stuktur Pengelola</p>
      <div class="form-group row mt-3">
        <a class="btn btn-primary btn-md tombol-dashboard ml-3 mb-2 mt-1" href="/downloadFilePengelola?nama={{$file -> nama_file}}" role="button" id="tombolDownload" >Download</a> 
      </div>
    @else
    @endif
    @endforeach


    @foreach($daftarFile as $file)
    @if($file -> jenis_file == 'Standar Operasional')
      <p style="font-size: 19px; font-weight: bolder;">Berkas Standar Opersional (SOP)</p>
      <div class="form-group row mt-3">
        <a class="btn btn-primary btn-md tombol-dashboard ml-3 mb-2 mt-1" href="/downloadFileSOP?nama={{$file -> nama_file}}" role="button" id="tombolDownload" >Download</a> 
      </div>
    @else
    @endif
    @endforeach
   



    <!-- Bagian Tombol Sumbit -->
    <br>
    <div class="form-group row mt-3">
      <a class="btn btn-primary btn-md tombol-dashboard ml-3 mb-2 mt-1" href="/dashboardDinasPariwisata" role="button" id="tombolSubmit" >Kembali</a> 
    </div>
  </form>
</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>