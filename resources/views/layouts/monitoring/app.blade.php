<!doctype html>
<html class="no-js">
<head>
    <style type="text/css">
        .footer {
  
          left: 0;
          bottom: 0;
          width: 100%;
          background-color: black;
          color: white;
          text-align: center;
        }
        .navbar {
  min-height: 100px;
}

    </style>
    <meta charset="UTF-8">
    <title>@section('title')
    @show</title>
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('assets/img/logot.jpg')}}"/>
    <!-- Global styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
    @yield('header_styles')
    <!-- End of Global styles -->
</head>
<body>
<div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
    <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
        <img src="{{asset('assets/img/loader.gif')}}" style=" width: 40px;" alt="loading...">
    </div>
</div>
      <nav class="navbar navbar-expand-lg sticky-top" style="background-color: black;">
      <div class="container">
      <a class="navbar-brand" href="/">
                    <img src="{{asset('assets/img/logo.jpg')}}" width="350" height="100" alt="logo">
                </a>
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div classclass="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <b>
       <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('profile') ? "active" : '' }}" href="/profile">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('news') ? "active" : '' }}" href="/news">Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('company') ? "active" : '' }}" href="/company">Perusahaan</a>
        </li>
        

        <li class="nav-pills">
          <a  href="/login" style="width:100px" class="btn btn-success"><strong>LOGIN</strong></a>
        </li>
      </ul>
      </b>
     
      </div>
    </div>

    </nav>
      
    
     <div id="content" class="bg-container">
            <!-- Content -->
            @yield('content')
            <!-- Content end -->
        </div>
    <!--wrapper-->
    
    <!-- # right side -->
</div>

<!--Global scripts-->
<script type="text/javascript" src="{{asset('assets/js/components.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
<!--End of global scripts-->
</body>
<!-- Footer -->
<footer class="footer font-small blue pt-4 fixed bottom">
  <div class="container">
  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase text-white">Pokonama INFO</h5>
        <p></p>
      </div>

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase text-white">Hubungi Kami</h5>

        <ul class="list-unstyled">
          <li>
            <p>Puslitbang Tekmira</p>
          </li>
          <li>
           Alamat 
           <p> Jl. Jend. Sudirman No.623, Wr. Muncang, Kec. Bandung Kulon, Kota Bandung, Jawa Barat 40211</p>
          </li>
          <li>
            Email
            <p>blutekmira@gmail.com</p>
          </li>
          <li>
            Phone/Whatsapp
            <p> (022) 6030483
              <br>0878-8989-3863</p>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <center>
        <h5 class="text-uppercase text-white">Contact us</h5>
        </center>

        <ul class="list-unstyled ">
          <li>
            <center>
            <a href="https://wa.me/6281211439203?text=Nama%3A%0ANo.%20HP%3A%0AAlamat%3A%0APesanan%3A%0AJumlah%3A" class="text-white" target="_blank">  <img src="/assets/img/wa.png" width="35" height="35"></a>
            </center>
          </li>
          <li>
            <br>
            <center>
            <a href="https://www.facebook.com/vif.bdgbranch" target="_blank" class="text-white"><img src="/assets/img/fb.png" width="50" height="35"></a>
            </center>
          </li>
          <li>
            <br>
            <center>
            <a href="https://www.instagram.com/blu.tekmira/" target="_blank" class="text-white"><img src="/assets/img/ig.png" width="35" height="35"></a>
            </center>
          </li>
          <li>
            <br>
            <center>
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=novalsofian8@gmail.com&su=SUBJECT&body=BODY" class="text-white" target="_blank"><img src="/assets/img/email.png" width="35" height="35"></a>
            </center>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <p align="left">
    
  Pusat Penelitian dan Pengembangan Teknologi Mineral dan Batubara (Puslitbang tekMIRA) adalah satuan kerja yang berada di bawah dan bertanggung jawab kepada Kepala Badan Penelitian dan Pengembangan Energi dan Sumber Daya Mineral (ESDM) sebagaimana diatur dalam Peraturan Menteri ESDM  No. 13 Tahun 2016 Tentang Organisasi dan Tata Kerja Kementerian Energi Dan Sumber Daya Mineral. Puslitbang tekMIRA merupakan salah satu Puslitbang yang bergerak di bawah Badan Litbang Kementerian ESDM. tekMIRA menangani pengembangan, penelitian, pengkajian, perekayasaan dan penerapan teknologi, serta pelayanan jasa di bidang mineral dan batubara.
  </p>
  <p align="left">
    
 

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">2020 Copyright:
    <a href="https://github.com/bayufahmiaji" target="_blank" class="text-white">Bayu Fahmiaji Fadillah</a>
  </div>
</div>
  <!-- Copyright -->
@yield('footer_scripts')
</footer>
<!-- Footer -->
</html>