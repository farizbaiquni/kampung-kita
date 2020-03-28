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

    #tombolLogout{
      font-weight: bolder;
    }


    }
    </style>

    <title>Verifikasi Kampung Wisata</title>
  </head>





  <body>

  <nav class="navbar navbar-light bg-dark" id="mainNav">
    <span class="navbar-brand mb-0 h1 text-white">
    <div class="container">
      <a class="navbar-brand" href="/index">Kampung Kita</a>
      <a class="btn btn-dark" id="tombolLogout" href="/logout" role="button" style="margin-left: 1000px;">Logout</a>
    </span>
  </nav>
    
  
  <form action="/insertVerifikasiKampungWisata" method="post">
  {{csrf_field()}}
  <div class="container">
  <table class="table-responsive">
    <table class="table">

      <button type="button" class="btn btn-lg btn-block" id="judul"> Verifikasi Kampung Wisata</button>

      <thead class="thead">
      </thead>

      <tbody>

      <input type="hidden" name="idFormulir" value="{{$idFormulir}}">

      @foreach($dataVerifikasi as $verifikasi)
        <div class="form-group" id="formHasilVerifikasi">
          <label for="hasilVerifikasi">Hasil Verifikasi</label>
          <select class="form-control" id="hasilVerifikasi" name="hasilVerifikasi">
            <option value="Lulus Verifikasi">Lulus Verifikasi</option>
            <option value="Tidak Lulus">Tidak Lulus</option>
            
            
          </select>
        </div>

        <div class="form-group" id="formKeteranganVerifikasi">
          <label for="keteranganVerifikasi">Alasan Tidak Lulus Verifkasi</label>
          <textarea class="form-control" id="keteranganVerifikasi" rows="3" name="keteranganVerifikasi">{{$verifikasi -> keterangan_verifikasi}}</textarea>
        </div>

        <div class="form-group" id="formTanggalKunjungan">
          <label for="tanggalKunjungan">Tanggal Kunjungan</label>
          <input type="date" class="form-control" id="tanggalKunjungan" name="tanggalKunjungan" value="{{$verifikasi -> tanggal_kunjungan}}">
        </div>  
        @endforeach


        

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
  
        
      
    


  <script type="text/javascript">

    $('#formKeteranganVerifikasi').hide();

    $(document).ready(function(){
      $('#hasilVerifikasi').on('click', function(){
        var hasilVerifikasi = $('#hasilVerifikasi').val();
        if(hasilVerifikasi == "Lulus Verifikasi"){
          $('#formKeteranganVerifikasi').hide()
          $('#formTanggalKunjungan').show();
        } else if(hasilVerifikasi == "Tidak Lulus") {
          $('#formKeteranganVerifikasi').show();
          $('#formTanggalKunjungan').hide();
          $("#formTanggalKunjungan").val(null);
        } 

      });
    });

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