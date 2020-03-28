<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>


  <h2 style="margin-top: 70px; margin-bottom: 0px; font-size: 30px;" align="center">Hasil Penilaian Kampung Wisata</h2>
   <h2 style="margin-top: px; margin-bottom: 70px; font-size: 30px;" align="center">{{$identitas -> nama_kampung_wisata}}</h2>
 
  <h1 style="text-align: left; font-size: 21px;">Profil Kampung Wisata</h1>
  <table style="text-align: left; font-size: 19px;" >
    <tr>
      <td width="20%" style="vertical-align: top;">Nama Kampung Wisata</td>
      <td width="2%" style="vertical-align: top;">:</td>
      <td width="88%" style="vertical-align: top;">{{$identitas -> nama_kampung_wisata}}</td>
    </tr>

     <tr>
      <td style="vertical-align: top;">Provinsi</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">{{$identitas -> provinsi}}</td>
    </tr>

    <tr>
      <td style="vertical-align: top;">Kabupaten / Kota</td>
      <td style="vertical-align: top;">:</td>
      <td align="justify">{{$identitas -> kabupaten_kota}}</td>
    </tr>

    <tr>
      <td style="vertical-align: top;">Kecamatan</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">{{$identitas -> kecamatan}}</td>
    </tr> 

    <tr>
      <td style="vertical-align: top;">Kelurahan / Desa</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">{{$identitas -> kelurahan_desa}}</td>
    </tr> 

    <tr>
      <td height="50px"></td>
    </tr>
  </table>
  <br>
  

  <h1 style="text-align: left; font-size: 25px; margin-bottom: -20px;">Penilaian Produk dan Layanan</h1> <br>

  <h1 style="text-align: left; font-size: 21px;">Produk Alam</h1>
  <table style="text-align: left; font-size: 19px;" >
  @foreach ($daftarPenilaianAlam as $alam)
    <tr>
      <td width="20%" style="vertical-align: top;">Nama Produk Alam</td>
      <td width="2%" style="vertical-align: top;">:</td>
      <td width="88%" style="vertical-align: top;">{{$alam -> nama_aspek}}</td>
    </tr>

     <tr>
      <td style="vertical-align: top;">Permasalahan</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">{{$alam -> permasalahan}}</td>
    </tr>

    <tr>
      <td style="vertical-align: top;">Keterangan</td>
      <td style="vertical-align: top;">:</td>
      <td align="justify">{{$alam -> keterangan}}</td>
    </tr>

    <tr>
      <td style="vertical-align: top;">Tanggal Perbaikan</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">{{$alam -> tanggal_perbaikan}}</td>
    </tr> 

    <tr>
      <td height="50px"></td>
    </tr>
  @endforeach
  </table>
  <br>


  <h1 style="text-align: left; font-size: 21px;">Produk Budaya</h1>
  <table style="text-align: left; font-size: 19px;" >
  @foreach ($daftarPenilaianBudaya as $alam)
    <tr>
      <td width="20%" style="vertical-align: top;">Nama Produk Alam</td>
      <td width="2%" style="vertical-align: top;">:</td>
      <td width="88%" style="vertical-align: top;">{{$alam -> nama_aspek}}</td>
    </tr>

     <tr>
      <td style="vertical-align: top;">Permasalahan</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">{{$alam -> permasalahan}}</td>
    </tr>

    <tr>
      <td style="vertical-align: top;">Keterangan</td>
      <td style="vertical-align: top;">:</td>
      <td align="justify">{{$alam -> keterangan}}</td>
    </tr>

    <tr>
      <td style="vertical-align: top;">Tanggal Perbaikan</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">{{$alam -> tanggal_perbaikan}}</td>
    </tr> 

    <tr>
      <td height="50px"></td>
    </tr>
  @endforeach
  </table>
  <br>



  <h1 style="text-align: left; font-size: 21px;">Produk Buatan</h1>
  <table style="text-align: left; font-size: 19px;" >
  @foreach ($daftarPenilaianBuatan as $alam)
    <tr>
      <td width="20%" style="vertical-align: top;">Nama Produk Alam</td>
      <td width="2%" style="vertical-align: top;">:</td>
      <td width="88%" style="vertical-align: top;">{{$alam -> nama_aspek}}</td>
    </tr>

     <tr>
      <td style="vertical-align: top;">Permasalahan</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">{{$alam -> permasalahan}}</td>
    </tr>

    <tr>
      <td style="vertical-align: top;">Keterangan</td>
      <td style="vertical-align: top;">:</td>
      <td align="justify">{{$alam -> keterangan}}</td>
    </tr>

    <tr>
      <td style="vertical-align: top;">Tanggal Perbaikan</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">{{$alam -> tanggal_perbaikan}}</td>
    </tr> 

    <tr>
      <td height="50px"></td>
    </tr>
  @endforeach
  </table>
  <br>


  <h1 style="text-align: left; font-size: 21px;">Fasilitas</h1>
  <table style="text-align: left; font-size: 19px;" >
  @foreach ($daftarPenilaianFasilitas as $alam)
    <tr>
      <td width="20%" style="vertical-align: top;">Nama Produk Alam</td>
      <td width="2%" style="vertical-align: top;">:</td>
      <td width="88%" style="vertical-align: top;">{{$alam -> nama_aspek}}</td>
    </tr>

     <tr>
      <td style="vertical-align: top;">Permasalahan</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">{{$alam -> permasalahan}}</td>
    </tr>

    <tr>
      <td style="vertical-align: top;">Keterangan</td>
      <td style="vertical-align: top;">:</td>
      <td align="justify">{{$alam -> keterangan}}</td>
    </tr>

    <tr>
      <td style="vertical-align: top;">Tanggal Perbaikan</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">{{$alam -> tanggal_perbaikan}}</td>
    </tr> 

    <tr>
      <td height="50px"></td>
    </tr>
  @endforeach
  </table>
  <br>




  <h1 style="text-align: left; font-size: 21px;">Layanan</h1>
  <table style="text-align: left; font-size: 19px;" >
  @foreach ($daftarPenilaianLayanan as $alam)
    <tr>
      <td width="20%" style="vertical-align: top;">Nama Produk Alam</td>
      <td width="2%" style="vertical-align: top;">:</td>
      <td width="88%" style="vertical-align: top;">{{$alam -> nama_aspek}}</td>
    </tr>

     <tr>
      <td style="vertical-align: top;">Permasalahan</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">{{$alam -> permasalahan}}</td>
    </tr>

    <tr>
      <td style="vertical-align: top;">Keterangan</td>
      <td style="vertical-align: top;">:</td>
      <td align="justify">{{$alam -> keterangan}}</td>
    </tr>

    <tr>
      <td style="vertical-align: top;">Tanggal Perbaikan</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">{{$alam -> tanggal_perbaikan}}</td>
    </tr> 

    <tr>
      <td height="50px"></td>
    </tr>
  @endforeach
  </table>
  <br>




  <h1 style="text-align: left; font-size: 25px;">Penilaian Pengelolaan</h1>
  <table style="text-align: left; font-size: 19px;" >
  @foreach ($daftarPenilaianPengelolaan as $alam)
    <tr>
      <td width="20%" style="vertical-align: top;">Nama Produk Alam</td>
      <td width="2%" style="vertical-align: top;">:</td>
      <td width="88%" style="vertical-align: top;">{{$alam -> nama_aspek}}</td>
    </tr>

     <tr>
      <td style="vertical-align: top;">Permasalahan</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">{{$alam -> permasalahan}}</td>
    </tr>

    <tr>
      <td style="vertical-align: top;">Keterangan</td>
      <td style="vertical-align: top;">:</td>
      <td align="justify">{{$alam -> keterangan}}</td>
    </tr>

    <tr>
      <td style="vertical-align: top;">Tanggal Perbaikan</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">{{$alam -> tanggal_perbaikan}}</td>
    </tr> 

    <tr>
      <td height="50px"></td>
    </tr>
  @endforeach
  </table>
  <br>



  <h1 style="text-align: left; font-size: 21px;">Hasil Penilaian</h1>
  <table style="text-align: left; font-size: 19px;" >
    <tr>
      <td width="20%" style="vertical-align: top;">Nilai Produk</td>
      <td width="2%" style="vertical-align: top;">:</td>
      <td width="88%" style="vertical-align: top;">{{$alam -> nilai_produk}}</td>
    </tr>

     <tr>
      <td style="vertical-align: top;">Nilai Layanan</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">{{$alam -> nilai_layanan}}</td>
    </tr>

    <tr>
      <td style="vertical-align: top;">Nilai Pengelolaan</td>
      <td style="vertical-align: top;">:</td>
      <td align="justify">{{$alam -> nilai_pengelolaan}}</td>
    </tr>

    <tr>
      <td style="vertical-align: top;">Hasil Penilaian</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">{{$alam -> hasil_penilaian}}</td>
    </tr> 

    <tr>
      <td height="50px"></td>
    </tr>
  </table>
  <br>




 

</body>
</html>