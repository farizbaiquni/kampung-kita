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


      #judulKategori1{
        font-weight: bolder;
        font-size: 25px;
      }

      .judul-produk{
        font-size: 17px;
        font-weight: bold;
        margin-top: 17px;
      }

      .judul-upload{
        font-size: 17px;
        margin-left: 1px;
        margin-top: 15px;
        margin-bottom: 0.5px;
      }

      .btn{
        background-color: #38b031;
        color: white;
        border-color: #38b031;
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

  <h2 id="judulHalaman">Formulir Pengelola Kampung Wisata</h2> <br><br>

  <div class="container">

    <?php  
    $idFormulir = $_GET['id'];
    ?>
  
    <form action="/prosesUpdateEdit?id={{$idFormulir}}" method="post" enctype="multipart/form-data">

      {{csrf_field()}}

      <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#" id="judulKategori1">Aspek Produk dan Layanan
        </a>
      </nav>

      <h4 style="margin-top: 30px; margin-bottom: -7px;">Produk Potensi yang Menjadi Ciri Khas Kampung Wisata</h4> 
      <hr>


      <?php  
      $arrayProdukAlam = $daftarProdukAlam;
      ?>
      <p class="judul-produk">Produk Potensi Alam</p>
      @foreach($daftarProdukAlam as $produkAlam)
      <div class=" inputProdukAlam">
        <div class="input-group row">
          <input type="text" class="form-control ml-3 classProdukAlam" name="{{$produkAlam}}" value="{{$produkAlam}}">
        </div>
      </div>
      <?php  
      array_shift($arrayProdukAlam);
      ?>
      @endforeach

      <button type="button" class="btn btn-primary btn-sm mt-3 mr-3 mb-9 float-right" id="tambahProdukAlam">Tambah</button> <br>
      <input type="hidden" name="jumlahKlikTambahAlam" value="1" id="jumlahKlikTambahAlam">




      <?php  
      $arrayProdukBudaya = $daftarProdukBudaya;
      ?>
      <p class="judul-produk">Produk Potensi Budaya</p>
      @foreach($daftarProdukBudaya as $produkBudaya)
      <div class=" inputProdukBudaya">
        <div class="input-group row">
          <input type="text" class="form-control ml-3 classProdukBudaya" name="{{$produkBudaya -> nama_produk}}" value="{{$produkBudaya -> nama_produk}}">
        </div>
      </div>
      @endforeach
      <button type="button" class="btn btn-primary btn-sm mt-3 mr-3 mb-9 float-right" id="tambahProdukBudaya">Tambah</button> <br>
      <input type="hidden" name="jumlahKlikTambahBudaya" value="1" id="jumlahKlikTambahBudaya">
      



      <p class="judul-produk">Produk Potensi Buatan</p>
      @foreach($daftarProdukBuatan as $produkBuatan)
      <div class=" inputProdukBuatan">
        <div class="input-group row">
          <input type="text" class="form-control ml-3 classProdukBuatan" name="{{$produkBuatan -> nama_produk}}" value="{{$produkBuatan -> nama_produk}}">
        </div>
      </div>
      @endforeach
      <button type="button" class="btn btn-primary btn-sm mt-3 mr-3 mb-9 float-right" id="tambahProdukBuatan">Tambah</button> <br><br>
      <input type="hidden" name="jumlahKlikTambahBuatan" value="1" id="jumlahKlikTambahBuatan">





      <h4>Fasilitas</h4>

      <?php  
      $arrayFasilitas = $daftarFasilitas;
      ?>
      @if(in_array("Homestay", $daftarFasilitas))
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Homestay" id="Homestay" name="homestay" checked="checked">
        <label class="form-check-label" for="Homestay">Homestay</label>
      </div>
      <?php  
      array_shift($arrayFasilitas);
      ?>
      @else
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Homestay" id="Homestay" name="homestay">
        <label class="form-check-label" for="Homestay">Homestay</label>
      </div>
      @endif
      
      @if(in_array("Penunjuk Arah", $daftarFasilitas))
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Penunjuk Arah" id="penunjukArah" name="penunjukArah" checked="checked">
        <label class="form-check-label" for="penunjukArah">Penunjuk Arah</label>
      </div>
      <?php  
      array_shift($arrayFasilitas);
      ?>
      @else
       <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Penunjuk Arah" id="penunjukArah" name="penunjukArah">
        <label class="form-check-label" for="penunjukArah">Penunjuk Arah</label>
      </div>
      @endif

      @if(in_array("Tempat Sampah", $daftarFasilitas))
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Tempat Sampah" id="tempatSampah" name="tempatSampah" checked="checked">
        <label class="form-check-label" for="tempatSampah">Tempat Sampah</label>
      </div>
      <?php  
      array_shift($arrayFasilitas);
      ?>
      @else
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Tempat Sampah" id="tempatSampah" name="tempatSampah">
        <label class="form-check-label" for="tempatSampah">Tempat Sampah</label>
      </div>
      @endif

      @if(in_array("Toilet", $daftarFasilitas))
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Toilet" id="toilet" name="toilet" checked="checked">
        <label class="form-check-label" for="toilet">Toilet</label>
      </div>
      <?php  
      array_shift($arrayFasilitas);
      ?>
      @else
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Toilet" id="toilet" name="toilet" checked="checked">
        <label class="form-check-label" for="toilet">Toilet</label>
      </div>
      @endif

      @if(in_array("Tempat Parkir", $daftarFasilitas))
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Tempat Parkir" id="tempatParkir" name="tempatParkir" checked="checked">
        <label class="form-check-label" for="tempatParkir">Tempat Parkir</label>
      </div>
      <?php  
      array_shift($arrayFasilitas);
      ?>
      @else
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Tempat Parkir" id="tempatParkir" name="tempatParkir">
        <label class="form-check-label" for="tempatParkir">Tempat Parkir</label>
      </div>
      @endif

      @if(in_array("Warung Makan", $daftarFasilitas))
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Warung Makan" id="warungMakan" name="warungMakan" checked="checked">
        <label class="form-check-label" for="warungMakan">Warung Makan</label>
      </div>
      <?php  
      array_shift($arrayFasilitas);
      ?>
      @else
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Warung Makan" id="warungMakan" name="warungMakan">
        <label class="form-check-label" for="warungMakan">Warung Makan</label>
      </div>
      @endif

      @if(in_array("Toko Oleh-Oleh", $daftarFasilitas))
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Toko Oleh-Oleh" id="tokoOlehOleh" name="tokoOlehOleh" checked="checked">
        <label class="form-check-label" for="tokoOlehOleh">Toko Oleh-Oleh</label>
      </div>
      <?php  
      array_shift($arrayFasilitas);
      ?>
      @else
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Toko Oleh-Oleh" id="tokoOlehOleh" name="tokoOlehOleh">
        <label class="form-check-label" for="tokoOlehOleh">Toko Oleh-Oleh</label>
      </div>
      @endif

      @if(in_array("Warung Makan", $daftarFasilitas))
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Panggung Hiburan" id="panggungHiburan" name="panggungHiburan" checked="checked">
        <label class="form-check-label" for="panggungHiburan">Panggung Hiburan</label>
      </div>
      <?php  
      array_shift($arrayFasilitas);
      ?>
      @else
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Panggung Hiburan" id="panggungHiburan" name="panggungHiburan">
        <label class="form-check-label" for="panggungHiburan">Panggung Hiburan</label>
      </div>
      @endif


      
      <!-- BAGIAN TAMBAHAN FASILITAS -->
      <p style="margin-top: 15px; font-size: 19px; font-style: italic;">Fasilitas Lain....</p>
      @foreach($arrayFasilitas as $fasilitas)
      <div class=" inputFasilitas">
      <div class="input-group row">
        <label class="col-sm-2 col-form-label">Nama Fasilitas</label>
        <input type="text" class="form-control ml-3 classFasilitas" name="fasilitasLain_1" value="{{$fasilitas}}">
      </div>
      </div>
      @endforeach
      <button type="button" class="btn btn-primary btn-sm mt-3 mr-3 float-right" id="tambahFasilitas">Tambah</button> <br>
      <input type="hidden" name="jumlahKlikTambahFasilitas" value="1" id="jumlahKlikTambahFasilitas">
     


      

      <h4>Layanan</h4>

      <?php  
      $arrayLayanan = $daftarLayanan;
      ?>
      @if(in_array("Pemandu Wisata", $daftarLayanan))
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Pemandu Wisata" id="pemanduWisata" name="pemanduWisata" checked="checked">
        <label class="form-check-label" for="pemanduWisata">Pemandu Wisata</label>
      </div>
      <?php  
      array_shift($arrayLayanan);
      ?>
      @else
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Pemandu Wisata" id="pemanduWisata" name="pemanduWisata">
        <label class="form-check-label" for="pemanduWisata">Pemandu Wisata</label>
      </div>
      @endif

      
      @if(in_array("Atraksi Hiburan", $daftarLayanan))
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Atraksi Hiburan" id="atraksiHiburan" name="atraksiHiburan" checked="checked">
        <label class="form-check-label" for="atraksiHiburan">Atraksi Hiburan</label>
      </div>
      <?php  
      array_shift($arrayLayanan);
      ?>
      @else
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Atraksi Hiburan" id="atraksiHiburan" name="atraksiHiburan">
        <label class="form-check-label" for="atraksiHiburan">Atraksi Hiburan</label>
      </div>
      @endif


      <p style="margin-top: 15px; font-size: 19px; font-style: italic;">Layanan Lain....</p>
      @foreach($arrayLayanan as $layanan)
      @if($layanan != null)
      <div class=" inputLayanan">
      <div class="input-group row">
        <label class="col-sm-2 col-form-label">Nama Layanan</label>
        <input type="text" class="form-control ml-3 classLayanan" name="layananLain_1" value="{{$layanan}}" >
      </div>
      </div>
      @endif
      @endforeach
      <button type="button" class="btn btn-primary btn-sm mt-3 mr-3 float-right" id="tambahLayanan">Tambah</button> <br>
      <input type="hidden" name="jumlahKlikTambahLayanan" value="1" id="jumlahKlikTambahLayanan">











      <br><br>
      <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#" id="judulKategori1">Aspek Pengelolaan
        </a>
      </nav>


      <?php  
      $pembinaAda = 0;
      ?>
      @foreach($daftarPengelolaan as $jenisFile)
      @if($jenisFile -> jenis_file == 'Struktur Pembina')
      <p class="judul-upload">Upload Struktur Pembina</p>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="strukturPembina" name="strukturPembina">
        <label class="custom-file-label" for="strukturPembina" id="namaStrukturPembina">{{$jenisFile -> nama_asli}}</label>
      </div>
      <?php  
      $pembinaAda = 1;
      ?>
      @endif
      @endforeach
    

      @if($pembinaAda == 0)
      <p class="judul-upload">Upload Struktur Pembina</p>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="strukturPembina" name="strukturPembina">
        <label class="custom-file-label" for="strukturPembina" id="namaStrukturPembina">Pilih File</label>
      </div>
      @endif




      <?php  
      $pengelolaAda = 0;
      ?>
      @foreach($daftarPengelolaan as $jenisFile)
      @if($jenisFile -> jenis_file == 'Struktur Pengelola')
      <p class="judul-upload">Upload Struktur Pengelola</p>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="strukturPengelola" name="strukturPengelola">
        <label class="custom-file-label" for="strukturPengelola" id="namaStrukturPengelola">{{$jenisFile -> nama_asli}}</label>
      </div>
      <?php  
      $pengelolaAda = 1;
      ?>
      @endif
      @endforeach
    

      @if($pengelolaAda == 0)
      <p class="judul-upload">Upload Struktur Pengelola</p>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="strukturPengelola" name="strukturPengelola">
        <label class="custom-file-label" for="strukturPengelola" id="namaStrukturPengelola">Pilih File</label>
      </div>
      @endif





      <?php  
      $sopAda = 0;
      ?>
      @foreach($daftarPengelolaan as $jenisFile)
      @if($jenisFile -> jenis_file == 'Standar Operasional')
      <p class="judul-upload">Upload Berkas Standar Opersional (SOP)</p>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="standarOperasional" name="standarOperasional">
        <label class="custom-file-label" for="standarOperasional" id="namaStandarOperasional">{{$jenisFile -> nama_asli}}</label>
      </div>
      <?php  
      $sopAda = 1;
      ?>
      @endif
      @endforeach

      @if($sopAda == 0)
      <p class="judul-upload">Upload Berkas Standar Opersional (SOP)</p>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="standarOperasional" name="standarOperasional">
        <label class="custom-file-label" for="standarOperasional" id="namaStandarOperasional">Pilih File</label>
      </div>
      @endif



      <!-- Bagian Tombol Sumbit -->
      <div class="form-group row mt-3">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>





  <!-- ===================== JQUERY ===================== -->

  <script type="text/javascript">

    // MENGGANTI NAMA FILE SETELAH UPLOAD
    $('#strukturPembina').change(function(e){
      var fileName = e.target.files[0].name;
      $('#namaStrukturPembina').text(fileName);
    });

    $('#strukturPengelola').change(function(e){
      var fileName = e.target.files[0].name;
      $('#namaStrukturPengelola').text(fileName);
    });

    $('#standarOperasional').change(function(e){
      var fileName = e.target.files[0].name;
      $('#namaStandarOperasional').text(fileName);
    });




    var jumlahKlikTambahAlam = 1; //Berapaka kali tombol tambah produk alam di klik
    var uniqAlam = 2; //Sebagai index atribute name 

    // ================== BAGIAN TAMBAH PRODUK ALAM ==================
    $(document).ready(function(){
      $("#tambahProdukAlam").click(function(){
        var htmlProduk = `
              <div class="input-group row mt-3">
                <input type="text" class="form-control ml-3 classProdukAlam" placeholder="Nama produk alam" name="produkAlam_">
                <div class="input-group-append">
                  <button class="btn btn-danger" type="button" id="hapusProdukAlam">Hapus</button>
                </div>
              </div>`;

         var atributNameAlam = "produkAlam_" + uniqAlam;
         
         $(".inputProdukAlam").last().append(htmlProduk);
         $(".classProdukAlam").last().attr("name", atributNameAlam);

         jumlahKlikTambahAlam++;
         $("#jumlahKlikTambahAlam").val(jumlahKlikTambahAlam);
         uniqAlam++;
        
      })

      $("body").on("click","#hapusProdukAlam",function(){ 
        $(this).parents(".input-group").remove()
      });
    })




    var jumlahKlikTambahBudaya = 1; //Berapaka kali tombol tambah produk budaya di klik
    var uniqBudaya = 2; //Sebagai index atribute name 

    // ================== BAGIAN TAMBAH PRODUK BUDAYA ==================
    $(document).ready(function(){
      $("#tambahProdukBudaya").click(function(){
        var htmlProduk = `
              <div class="input-group row mt-3">
                <input type="text" class="form-control ml-3 classProdukBudaya" placeholder="Nama produk budaya">
                <div class="input-group-append">
                  <button class="btn btn-danger" type="button" id="hapusProdukBudaya">Hapus</button>
                </div>
              </div>`;

         var atributNameBudaya = "produkBudaya_" + uniqBudaya;

         $(".inputProdukBudaya").last().append(htmlProduk);
         $(".classProdukBudaya").last().attr("name", atributNameBudaya);

         jumlahKlikTambahBudaya++;
         $("#jumlahKlikTambahBudaya").val(jumlahKlikTambahBudaya);
         uniqBudaya++;
      })


      $("body").on("click","#hapusProdukBudaya",function(){ 
        $(this).parents(".input-group").remove();
      });
    })




    var jumlahKlikTambahBuatan = 1; //Berapaka kali tombol tambah produk buatan di klik
    var uniqBuatan = 2; //Sebagai index atribute name 

    // ================== BAGIAN TAMBAH PRODUK BUATAN ==================
    $(document).ready(function(){
      $("#tambahProdukBuatan").click(function(){
        var htmlProduk = `
              <div class="input-group row mt-3">
                <input type="text" class="form-control ml-3 classProdukBuatan" placeholder="Nama produk buatan">
                <div class="input-group-append">
                  <button class="btn btn-danger" type="button" id="hapusProdukBuatan">Hapus</button>
                </div>
              </div>`;

         var atributNameBuatan = "produkBuatan_" + uniqBuatan;

         $(".inputProdukBuatan").last().append(htmlProduk);
         $(".classProdukBuatan").last().attr("name", atributNameBuatan);

         jumlahKlikTambahBuatan++;
         $("#jumlahKlikTambahBuatan").val(jumlahKlikTambahBuatan);
         uniqBuatan++;
      })

      $("body").on("click","#hapusProdukBuatan",function(){ 
        $(this).parents(".input-group").remove();
      });
    })




    var jumlahKlikTambahFasilitas = 1; //Berapaka kali tombol tambah fasilitas di klik
    var uniqFasilitas = 2; //Sebagai index atribute name 

    // ================== BAGIAN TAMBAH FASILITAS ==================
    $(document).ready(function(){
      $("#tambahFasilitas").click(function(){
        var htmlProduk = `
              <div class="input-group row mt-2">
                <label class="col-sm-2 col-form-label">Nama Fasilitas</label>
                <input type="text" class="form-control ml-3 classFasilitas" name="fasilitasLain_">
                <div class="input-group-append">
                  <button class="btn btn-danger" type="button" id="hapusFasilitas">Hapus</button>
                </div>
              </div>`;

         var atributNameFasilitas = "fasilitasLain_" + uniqFasilitas;

         $(".inputFasilitas").last().append(htmlProduk);
         $(".classFasilitas").last().attr("name", atributNameFasilitas);

         jumlahKlikTambahFasilitas++;
         $("#jumlahKlikTambahFasilitas").val(jumlahKlikTambahFasilitas);
         uniqFasilitas++;
      })

      $("body").on("click","#hapusFasilitas",function(){ 
        $(this).parents(".input-group").remove();
      });
    })



    var jumlahKlikTambahLayanan = 1; //Berapaka kali tombol tambah Layanan di klik
    var uniqLayanan = 2; //Sebagai index atribute name 

    // ================== BAGIAN TAMBAH LAYANAN ==================
    $(document).ready(function(){
      $("#tambahLayanan").click(function(){
        var htmlProduk = `
              <div class="input-group row mt-2">
                <label class="col-sm-2 col-form-label">Nama Layanan</label>
                <input type="text" class="form-control ml-3 classLayanan" name="layananLain_">
                <div class="input-group-append">
                  <button class="btn btn-danger" type="button" id="hapusLayanan">Hapus</button>
                </div>
              </div>`;

         var atributNameLayanan = "layananLain_" + uniqLayanan;

         $(".inputLayanan").last().append(htmlProduk);
         $(".classLayanan").last().attr("name", atributNameLayanan);

         jumlahKlikTambahLayanan++;
         $("#jumlahKlikTambahLayanan").val(jumlahKlikTambahLayanan);
         uniqLayanan++;
      })

      $("body").on("click","#hapusLayanan",function(){ 
        $(this).parents(".input-group").remove();
      });
    })




  </script>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>