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

      #tombolDownload{
        background-color: #38b031;
        color: white;
        border-color: #38b031;
        font-weight: bolder;
      }

      #tombolEdit{
        background-color: #38b031;
        color: white;
        border-color: #38b031;
        font-weight: bolder;
      }

      #tombolBuatLaporan{
        background-color: #fec503;
        color: black;
        border-color: black;
        font-weight: bolder;
      }

    }
    </style>

    <title>Dashboard Pengelola</title>
  </head>








  <body>

  <nav class="navbar navbar-light bg-dark" id="mainNav">
    <span class="navbar-brand mb-0 h1 text-white">
    <div class="container">
      <a class="navbar-brand" href="/index">Kampung Kita</a>
      <a class="btn btn-dark" id="tombolLogout" href="/logout" role="button" style="margin-left: 1000px;">Logout</a>
    </span>
  </nav>
    
  <!-- Start Sidebar -->
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading text-black mt-1 mb-1">Menu </div>
      <div class="list-group list-group-flush">

        <button class="list-group-item list-group-item-action bg-light" id="menuProfil">Data Kampung Wisata</button>

        <button class="list-group-item list-group-item-action bg-light" id="menuLaporan">Laporan</button>

        <button class="list-group-item list-group-item-action bg-light" id="menuHasil">Hasil Penilaian</button>
      
      </div>
    </div>
    <!-- /#sidebar-wrapper -->


    <!-- Page Content -->
    <div id="profilKampungWisata">
      <h3 align="center">Profil Kampung Wisata</h3> <br>
      <div class="container-fluid">
        <table class="table-responsive">
          <table class="table">
            <thead class="thead">
            </thead>
              <tbody>
                @if(count($dataProfil)==0)
                <tr>
                  <td width="30%">Nama Kampung Wisata</td>
                  <td>:</td>
                  <td>Kosong</td>    
                </tr>

                <tr>
                  <td>No Telepon</td>
                  <td>:</td>
                  <td>Kosong</td>
                </tr>
                  
                <tr>
                  <td>Provinsi</td>
                  <td>:</td>
                  <td>Kosong</td>
                <tr>
                  
                </tr>
                  <td>Kabupaten/Kota</td>
                  <td>:</td>
                  <td>Kosong</td>
                </tr>

                </tr>
                  <td>Kecamatan</td>
                  <td>:</td>
                  <td>Kosong</td>
                </tr>

                <tr>
                  <td>Kelurahan/Desa</td>
                  <td>:</td>
                  <td>Kosong</td>
                </tr>
                @else
                @foreach($dataProfil as $profil)
                <tr>
                  <td width="30%">Nama Kampung Wisata</td>
                  <td>:</td>
                  <td>{{$profil -> nama_kampung_wisata}}</td>    
                </tr>

                <tr>
                  <td>No Telepon</td>
                  <td>:</td>
                  <td>{{$profil -> no_telepon}}</td>
                </tr>
                  
                <tr>
                  <td>Provinsi</td>
                  <td>:</td>
                  <td>{{$profil -> provinsi}}</td>
                <tr>
                  
                </tr>
                  <td>Kabupaten/Kota</td>
                  <td>:</td>
                  <td>{{$profil -> kabupaten_kota}}</td>
                </tr>

                </tr>
                  <td>Kecamatan</td>
                  <td>:</td>
                  <td>{{$profil -> kecamatan}}</td>
                </tr>

                <tr>
                  <td>Kelurahan/Desa</td>
                  <td>:</td>
                  <td>{{$profil -> kelurahan_desa}}</td>
                </tr>
                @endforeach
                @endif

                <tr>
                  <td>
                    <a class="btn btn-primary btn-md tombol-dashboard" href="/editProfilKampungWisata" role="button" id="tombolEdit">Edit</a> 
                  </td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
          </table>
        </table>
      </div>
    </div>



    
    <div id="laporanKampungWisata"> <br>
      <h3 align="center">Laporan Kampung Wisata</h3> <br>

      <?php 
      $tanggalSekarang = date("Y/m/d");     
      ?>
      
      @if($statusBuatLaporan == null)
      <a class="btn btn-dark btn-md tombol-dashboard ml-3 mb-2 mt-1" href="/formulirPengelola" role="button" id="tombolBuatLaporan">Buat Laporan</a> <br> <br>
      @elseif($statusBuatLaporan -> status_formulir_pengelola == 'Telah Dinilai' && $statusBuatLaporan -> masa_berlaku > $tanggalSekarang)
      <a class="btn btn-dark btn-md tombol-dashboard ml-3 mb-2 mt-1" href="/formulirPengelola" role="button" id="tombolBuatLaporan">Buat Laporan</a> <br> <br>
      @else
      <a class="btn btn-dark btn-md tombol-dashboard ml-3 mb-2 mt-1 disabled" href="/formulirPengelola" role="button" id="tombolBuatLaporan">Buat Laporan</a> <br> <br>
      @endif

     
      <div class="container-fluid">
        <table class="table-responsive">
        <table class="table text-center" border="1">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col" style="width: 15%">Tanggal Submit</th>
              <th scope="col" style="width: 19%">Tanggal Kunjungan</th>
              <th scope="col">Status Laporan</th>
              <th scope="col" style="width: 25%">Keterangan Status Laporan</th>
              <th scope="col">Edit</th>
              <th scope="col">hapus</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $indexNo = 1;
            ?>
            @foreach($daftarFormulir as $formulir)
            <tr>
              <td scope="row">{{$indexNo}}</td>
              <td scope="row">{{$formulir -> tanggal_submit}}</td>

              @if($formulir -> tanggal_kunjungan == null)
                <td scope="row">Belum Terjadwal</td>
              @else
                <td scope="row">{{$formulir -> tanggal_kunjungan}}</td>
              @endif

              @if(isset($formulir -> status_formulir_pengelola))
              <td scope="row">{{$formulir -> status_formulir_pengelola}}</td>
              @else

              @endif

              <td scope="row">{{$formulir -> keterangan_verifikasi}}</td>

              @if($formulir -> status_formulir_pengelola == "Belum Terverifikasi" OR $formulir -> status_formulir_pengelola == "Tidak Lulus"  OR $formulir -> status_formulir_pengelola == "Tidak Lulus")
              <td scope="row"><a class="btn btn-primary btn-sm tombol-dashboard" href="/editFormulirPengelola?id={{$formulir -> id_formulir_pengelola}}" role="button" id="tombolEdit">Edit</a></td>
              @else
              <td scope="row"><a class="btn btn-primary btn-sm tombol-dashboard disabled" href="/editFormulirPengelola?id={{$formulir -> id_formulir_pengelola}}" role="button" id="tombolEdit">Edit</a></td>
              @endif

              @if($formulir -> status_formulir_pengelola == "Belum Terverifikasi" OR $formulir -> status_formulir_pengelola == "Tidak Lulus")
              <td scope="row"><a class="btn btn-primary btn-sm tombol-dashboard" href="/prosesHapusFormulir?id={{$formulir -> id_formulir_pengelola}}" role="button" id="tombolEdit">Hapus</a></td>
              @else
              <td scope="row"><a class="btn btn-primary btn-sm tombol-dashboard disabled" href="/prosesHapusFormulir?id={{$formulir -> id_formulir_pengelola}}" role="button" id="tombolEdit">Hapus</a></td>
              @endif
              
            </tr>
            <?php 
            $indexNo++;
            ?>
            @endForeach
          </tbody>
        </table>
        </table>
      </div>
    </div>
    




    <div id="hasilKampungWisata">
      <h3 align="center">Hasil Penilaian</h3> <br>
      <div class="container-fluid">
        <table class="table-responsive">
        <table class="table text-center" border="1">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Tanggal Kunjungan</th>
              <th scope="col">Hasil</th>
              <th scope="col">Masa Berlaku</th>
              <th scope="col">Download Hasil</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $indexNo = 1;
            ?>
            @foreach($daftarHasilPenilaian as $hasil)
            <tr>
              <td scope="row">{{$indexNo}}</td>
              <td scope="row">{{$hasil -> tanggal_kunjungan}}</td>
              <td scope="row">{{$hasil -> hasil_penilaian}}</td>
              <td scope="row">{{$hasil -> masa_berlaku}}</td>
              <td scope="row">
                <a class="btn btn-primary btn-sm tombol-dashboard" href="/cetakHasilPenilaian?id={{$hasil -> id_formulir_pengelola}}" role="button" id="tombolDownload">Download</a>
              </td>
            </tr>
            <?php 
            $indexNo++;
            ?>
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