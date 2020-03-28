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



    <style type="text/css">
    body {
      overflow-x: hidden;
    }

    #sidebar-wrapper {
      min-height: 100vh;
      margin-left: -15rem;
      -webkit-transition: margin .25s ease-out;
      -moz-transition: margin .25s ease-out;
      -o-transition: margin .25s ease-out;
      transition: margin .25s ease-out;
    }

    #sidebar-wrapper .sidebar-heading {
      padding: 0.875rem 1.25rem;
      font-size: 1.2rem;
      font-weight: bolder;
    }

    #sidebar-wrapper .list-group {
      width: 15rem;
    }

    #profilKampungWisata {
      margin-top: 30px;
      min-width: 100vw;
    }

    #laporanKampungWisata{
      margin-top: 30px;
      min-width: 100vw;
    }

    #hasilKampungWisata{
      margin-top: 30px;
      min-width: 100vw;
    }

    .list-group-item{
      color: black;
    }

    @media (min-width: 768px) {
      #sidebar-wrapper {
        margin-left: 0;
      }

      #profilKampungWisata {
        min-width: 0;
        width: 100%;
      }

      #laporanKampungWisata {
        min-width: 0;
        width: 100%;
      }

      #hasilKampungWisata{
        min-width: 0;
        width: 100%;
      }

      #tombolLogout{
        font-family: sans-serif;
        background-color: #fec503;
        color: black;
        font-weight: bolder;
      }

      .btn{
        background-color: #fec503;
        color: black;
        border-color: #fec503;
      }

      #tombolLogout{
        background-color: #fec503;
        color: black;
        border-color: #fec503;
        font-weight: bolder;
      }


    }
    </style>

    <title>Dashboard Admin</title>
  </head>








  <body>

  <nav class="navbar navbar-light bg-dark" id="mainNav">
    <span class="navbar-brand mb-0 h1 text-white">
    <div class="container">
      <a class="navbar-brand" href="/indexLoginDinasPariwisata">Kampung Kita</a>
      <a class="btn btn-dark" id="tombolLogout" href="/logout" role="button" style="margin-left: 1000px;">Logout</a>
    </span>
  </nav>


    
  <!-- Start Sidebar -->
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading text-black mt-1 mb-1">Menu </div>
      <div class="list-group list-group-flush">

        <button class="list-group-item list-group-item-action bg-light" id="menuProfil">Laporan Masuk</button>

        <button class="list-group-item list-group-item-action bg-light" id="menuLaporan">Hasil Penilaian</button>

        <button class="list-group-item list-group-item-action bg-light" id="menuHasil">Statistik</button>
      
      </div>
    </div>
    <!-- /#sidebar-wrapper -->


    <!-- Page Content -->
    <div id="profilKampungWisata">
      <h3 align="center">Daftar Laporan Kampung Wisata yang Telah Masuk </h3> <br>
      <div class="container-fluid">
        <table class="table-responsive">
        <table class="table text-center" border="1">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Kampung Wisata</th>
              <th scope="col">Tanggal Submit</th>
              <th scope="col">Tanggal Kunjungan</th>
              <th scope="col">Status</th>
              <th scope="col">Lihat</th>
              <th scope="col">Verifikasi</th>
              <th scope="col">Nilai</th>
            </tr>
          </thead>
          <tbody>
            <?php $noUrut = 1 ?>
            @foreach($daftarLaporan as $laporan)
            <tr>
              <td scope="row">{{$noUrut}}</td>
              <td scope="row">{{$laporan -> nama_kampung_wisata}}</td>
              <td scope="row">{{$laporan -> tanggal_submit}}</td>

              @if($laporan -> tanggal_kunjungan == null)
                <td scope="row">Belum Terjadwal</td>
              @else 
                <td scope="row">{{$laporan -> tanggal_kunjungan}}</td>
              @endif
              <td scope="row">{{$laporan -> status_formulir_pengelola}}</td>
               <td scope="row">
                <a class="btn btn-dark btn-sm tombol-dashboard" href="/lihatLaporan?id={{$laporan -> id_formulir_pengelola}}" role="button">Lihat</a>
              </td>
              <td scope="row">
                <a class="btn btn-dark btn-sm tombol-dashboard" href="/verifikasiKampungWisata?id={{$laporan -> id_formulir_pengelola}}" role="button">Verifikasi</a>
              </td>

              @if($laporan -> status_formulir_pengelola == 'Belum Terverifikasi' OR $laporan -> status_formulir_pengelola == 'Tidak Lulus')
              <td scope="row">
                <a class="btn btn-dark btn-sm tombol-dashboard disabled" href="/formulirPenilaian?id={{$laporan -> id_formulir_pengelola}}" role="button">Nilai</a>
              </td>
              @else
              <td scope="row">
                <a class="btn btn-dark btn-sm tombol-dashboard " href="/formulirPenilaian?id={{$laporan -> id_formulir_pengelola}}" role="button">Nilai</a>
              </td>
              @endif
            </tr>
            <?php $noUrut++ ?>
            @endforeach
          </tbody> 
        </table>
        </table>
        <!-- Code untuk bagian pagination -->
        <!-- <div class="halaman" style="justify-content: center;">
          <ul class="pagination justify-content-center">
            <li>{{ $daftarLaporan->links() }}</li>
          </ul>
        </div> -->
      </div>
    </div>




    <div id="laporanKampungWisata">
      <h3 align="center">Daftar Hasil Penilaian Akreditasi yang Telah Dilakukan</h3> <br>
      <div class="container-fluid"> 
        <table class="table-responsive">
        <table class="table text-center" border="1">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Kampung Wisata</th>
              <th scope="col">Tanggal Kunjungan</th>
              <th scope="col">Hasil</th>
              <th scope="col">Masa Berlaku</th>
              <th scope="col">Download Hasil</th>
            </tr>
          </thead>
          <tbody>
            <?php $noUrut = 1 ?>
            @foreach($daftarHasilPenilaian as $hasilPenilian)
            <tr>
              <td scope="row">{{$noUrut}}</td>
              <td scope="row">{{$hasilPenilian -> nama_kampung_wisata }}</td>
              <td scope="row">{{$hasilPenilian -> tanggal_kunjungan}}</td>
              <td scope="row">{{$hasilPenilian -> hasil_penilaian}}</td>
              <td scope="row">{{$hasilPenilian -> masa_berlaku}}</td>
              <td scope="row">
                <a class="btn btn-dark btn-sm tombol-dashboard" href="/cetakHasilPenilaian?id={{$hasilPenilian -> id_formulir_pengelola}}" role="button">Download</a>
              </td>
            </tr>
            <?php $noUrut++ ?>
            @endforeach

          </tbody>

        </table>
        </table>
          <!-- Code untuk bagian pagination -->
          <!-- <div class="halaman" style="justify-content: center;">
            <ul class="pagination justify-content-center">
              <li>{{ $daftarHasilPenilaian->links() }}</li>
            </ul>
          </div> -->
      </div>
    </div>




    <div id="hasilKampungWisata">
      <h3 align="center">Daftar Statistik Masa Akreditasi Kampung Wisata</h3>
      <div class="container-fluid mt-3">
        <table class="table-responsive">
        <table class="table text-center" border="1">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Kampung Wisata</th>
              <th scope="col">Status Kampung Wisata</th>
              <th scope="col">Masa Berlaku Akreditasi</th>
            </tr>
          </thead>
          <tbody>
            <?php $noUrut = 1 ?>
            @foreach($daftarStatus as $status)
            <tr>
              <td scope="row">{{$noUrut}}</td>
              <td scope="row">{{$status -> nama_kampung_wisata}}</td>

              <?php  
              $tanggalSekarang = date("Y/m/d");
              ?>
              @if($tanggalSekarang < $status -> masa_berlaku)
              <td scope="row">Masa Akreditasi Masih Berlaku</td>
              @elseif($status -> masa_berlaku == null)
              <td scope="row">Belum Pernah Melakukan Akreditasi</td>
              @else
              <td scope="row">Masa Akreditasi Telah Habis</td>
              @endif

              @if($status -> masa_berlaku == null)
              <td scope="row">Tidak Ada</td>
              @else
              <td scope="row">{{$status -> masa_berlaku}}</td>
              @endif

            </tr>
            <?php $noUrut++ ?>
            @endforeach
          </tbody>
        </table>
        </table>
      </div>
    </div>


    <!-- /#page-content-wrapper -->

  </div>
  

    <script type="text/javascript">
      $("#laporanKampungWisata").hide();
      $("#hasilKampungWisata").hide();
  
      $(document).ready(function(){
        $("#menuProfil").on("click", function(){
          $("#profilKampungWisata").show();
          $("#laporanKampungWisata").hide();
          $("#hasilKampungWisata").hide();
        })
      })

      $(document).ready(function(){
        $("#menuLaporan").on("click", function(){
          $("#laporanKampungWisata").show();
          $("#profilKampungWisata").hide();
          $("#hasilKampungWisata").hide();
        })
      })


      $(document).ready(function(){
        $("#menuHasil").on("click", function(){
          $("#hasilKampungWisata").show();
          $("#profilKampungWisata").hide();
          $("#laporanKampungWisata").hide();
        })
      })

    </script>  


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>