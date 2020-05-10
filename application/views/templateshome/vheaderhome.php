<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Kos kita </title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url()?>/assets/assetshome/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url()?>/assets/assetshome/css/shop-homepage.css" rel="stylesheet">

  </head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
    <a class="navbar-brand js-scroll-trigger d-flex" href="#page-top">
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

            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url('auth/registrasi')?>">Daftar</a>
           </li> 
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo base_url('home/pusatbantuan')?>">Pusat Bantuan</a>
          </li>
          <li class="nav-item">
            <?php if ($this->session->userdata('userpen')){ ?>
              <a class="nav-link text-white" href="<?php echo base_url('user/dashboard')?>">Welcome  <?php echo $this->session->userdata('userpen')?></a>
              <?php } else { ?>
              <a  class="nav-link text-white" href="<?php echo base_url('auth/login')?>"><span class="btn btn-sm btn-light">Login</span></a>
              <?php } ?></li>
          

        </ul>
      </div>
    </div>
  </nav>
  