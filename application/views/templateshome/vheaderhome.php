<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kos kita </title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url()?>/assets/assetshome/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url()?>/assets/assetshome/css/shop-homepage.css" rel="stylesheet">
  <link href="<?php echo base_url()?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  </head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
    <a class="navbar-brand js-scroll-trigger d-flex" href="#page-top">
    <i class="fas fa-home fa-2x"> Kos kita </i>
    
    <img src="" width="">
    </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('home/index')?>">Home
              <span class="sr-only">(current)</span>
            </a>
</li>
          <a class="navbar-brand"></a> <form class ="form-inline" action= <?= base_url('home/search')?> method= "post" > <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Search" aria-label="Search"> <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button> </form>
        </li>
    <!-- Example filtering dropdowns -->
    <li class="nav-item"> 
    <div class="btn-group" color="white">
    <button type="button"  class="btn text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
  <i class="fas fa-filter"></i>
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Harga Tertinggi</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Harga Terjangkau</a>
        </div>
        </div>
        
      </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url('auth/registrasi')?>"> Daftar</a>
           </li> 
          
          <li class="nav-item">
            <?php if ($this->session->userdata('userpen')){ ?>
              <a class="nav-link text-white" href="<?php echo base_url('user/dashboard')?>">Welcome  <?php echo $this->session->userdata('userpen')?></a>
              <?php } else { ?>
              <a  class="nav-link text-white" href="<?php echo base_url('auth/login')?>">Login</a>
              <?php } ?></li>
              <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo base_url('home/info')?>">  Info <i class="fas fa-question" color="white"></i> </a>
         
          </li>

        </ul>
      </div>
    </div>
  </nav>
  