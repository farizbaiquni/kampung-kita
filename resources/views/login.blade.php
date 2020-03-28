<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login Kampung Kita</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

  <style media="screen">
    body {
      /*background-image: url(/img/hitam.jpeg);*/
      background-repeat: no-repeat;
      background-size: cover;
    }
   
    #backlogin {
      background: black;
      width: 37%;
      height: 370px;
      border: 1px solid #d2d2d2;
      border-radius: 5px;
      margin-top: 190px;
    }
   
    @font-face {
      src: url('font/Product Sans Regular.ttf');
      font-family: Product Sans;
    }
   
    @font-face {
      src: url('font/OpenSans-Light.ttf');
      font-family: OpenSans-Light;
    }
   
    #backlogin form {
      margin-top: 15px;
      float: left;
      padding: 5px;
      color: red;
      font-size: 15px;
      font-style: italic;
      text-align: left;
      margin-left: 71px;
    }
   
    #backlogin .inputa {
      padding-left: 9px;
      color: white;
      width: 90%;
      margin-left: -9px;
      margin-top: 1px;
      margin-bottom: 3px;
      height: 50px;
      border: 0px;
      border-bottom: 1px solid #FED136;
      font-size: 16px;
      background: black;
    }
   
    #backlogin .wed {
      margin-top: 50px;
      width: 41%;
      height: 40px;
      background: #FED136;
      border: none;
      color: black;
      font-weight: bolder;
      font-size: 20px;
      border-radius: 5px;
      margin-right: 7px;
      margin-left: 1px;
    }
   
    #backlogin h1 {
      font-family: Sans-serif;
      text-align: center;
      padding: 5px;
      color: #FED136;
      margin-bottom: -15px;
      margin-top: 27px;
    }
   
    #backlogin hr {
      width: 50%;
      height: 4px;
      border: none;
      background: #FED136;
    }

    .navbar{
      background-image: url(/img/hitam.jpeg);
    }

    .kesalahan{
      text-align: left;
      margin-left: 30px;
      color: red;
      font-style: italic;
    }

  </style>
</head>



<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="/index">Kampung Kita</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      </div>
    </div>
  </nav>

  
  
  <center>
    <div id="backlogin">
      <h1>Login</h1>
      <hr>
      <form id="login" action="/prosesLogin" method="post">
        {{csrf_field()}}
        <input type="text" class="inputa" name="username" value="" autocomplete="off" placeholder="Username">
        @if(isset($usernameSalah)) {{$usernameSalah}} @endif

        <input type="password" class="inputa" name="password" value="" placeholder="Password">
        @if(isset($passwordSalah)) {{$passwordSalah}} @endif
        <br>

        <input type="submit" class="wed" name="" value="Masuk">
        <input type="reset" class="wed" name="" value="Reset">
      </form>
    </div>
  </center>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>
</body>
</html>




