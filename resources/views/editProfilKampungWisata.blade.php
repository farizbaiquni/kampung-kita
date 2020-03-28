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

    #judul{
      font-weight: bolder;
      text-align: left;
      margin-bottom: 30px;
      border-color: black;
    }

    .container .table-responsive{
      margin-top: 110px;
    } 

    .col-form-label {
      width: 30%;
    }

    .btn{
      background-color: #fec503;
      color: black;
      border-color: #fec503;
    }

    #tombolSubmit{
      background-color: black;
      color: white;
      font-weight: bolder;
      border-color: black;
    }


    }
    </style>

    <title>Edit Profil</title>
  </head>








  <body>

  <nav class="navbar navbar-light bg-dark" id="mainNav">
    <span class="navbar-brand mb-0 h1 text-white">
    <div class="container">
      <a class="navbar-brand" href="/index">Kampung Kita</a>
      <a class="btn btn-dark" id="tombolLogout" href="/logout" role="button" style="margin-left: 1000px;">Logout</a>
    </span>
  </nav>
    
  
  <form action="insertProfilKampungWisata" method="post">
  {{csrf_field()}}
  <div class="container">
  <table class="table-responsive">
    <table class="table">

      <button type="button" class="btn btn-lg btn-block" id="judul"> Profil Kampung Wisata</button>

      <thead class="thead">
      </thead>

      <tbody>

        @if(count($dataProfil) == 0)
        <div class="form-group row">
          <label for="namaKampungWisata" class="col-sm-3 col-form-label">Nama Kampung Wisata</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="namaKampungWisata" name="namaKampungWisata" value="" autocomplete="off">
          </div>
        </div>

        <div class="form-group row">
          <label for="noTelpKampungWisata" class="col-sm-3 col-form-label">No Telepon</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" id="noTelpKampungWisata" name="noTelpKampungWisata" value="" autocomplete="off">
          </div>
        </div>
          
        <div class="form-group row">
          <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="provinsi" name="provinsi" value="" autocomplete="off">
          </div>
        </div>
          
        <div class="form-group row">
          <label for="kabupatenKota" class="col-sm-3 col-form-label">kabupaten / Kota</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="kabupatenKota" name="kabupatenKota" value="" autocomplete="off">
          </div>
        </div>

         <div class="form-group row">
          <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="" autocomplete="off">
          </div>
        </div>

        <div class="form-group row">
          <label for="kelurahanDesa" class="col-sm-3 col-form-label">Kelurahan / Desa</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="kelurahanDesa" name="kelurahanDesa" value="" autocomplete="off">
          </div>
        </div>
        @else
        @foreach($dataProfil as $profil)
        <div class="form-group row">
          <label for="namaKampungWisata" class="col-sm-3 col-form-label">Nama Kampung Wisata</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="namaKampungWisata" name="namaKampungWisata" value="{{$profil -> nama_kampung_wisata}}" autocomplete="off">
          </div>
        </div>

        <div class="form-group row">
          <label for="noTelpKampungWisata" class="col-sm-3 col-form-label">No Telepon</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" id="noTelpKampungWisata" name="noTelpKampungWisata" value="{{$profil -> no_telepon}}" autocomplete="off">
          </div>
        </div>
          
        <div class="form-group row">
          <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{$profil -> provinsi}}" autocomplete="off">
          </div>
        </div>
          
        <div class="form-group row">
          <label for="kabupatenKota" class="col-sm-3 col-form-label">kabupaten / Kota</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="kabupatenKota" name="kabupatenKota" value="{{$profil -> kabupaten_kota}}" autocomplete="off">
          </div>
        </div>

         <div class="form-group row">
          <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{$profil -> kecamatan}}" autocomplete="off">
          </div>
        </div>

        <div class="form-group row">
          <label for="kelurahanDesa" class="col-sm-3 col-form-label">Kelurahan / Desa</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="kelurahanDesa" name="kelurahanDesa" value="{{$profil -> kelurahan_desa}}" autocomplete="off">
          </div>
        </div>
        @endforeach
        @endif
        

        <!-- Bagian Tombol Sumbit -->
      <div class="form-group row mt-3">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary" id="tombolSubmit">Submit</button>
        </div>
      </div>

      </tbody>
    </table>
  </table>
  </div>
    
  </form>
  
        
      
    





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