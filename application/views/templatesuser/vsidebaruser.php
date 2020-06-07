
<body id="page-top">

<!-- Page Wrapper -->

<div id="wrapper">


  <!-- Sidebar -->

  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon ">
      <i class="fas fa-home"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Kos KIta</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('home/index')?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Interface
    </div>
        
    <!-- Nav Item - profil saya -->
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('user/dashboard')?>">
      <i class="fas fa-user"></i>
      <span>Profil saya </span></a>
    </li>

    <!-- Nav Item - Riwayat Kos -->
    <li class="nav-item">
      <a class="nav-link" href="tables.html">
      <i class="fas fa-fw fa-table"></i>
      <span>Riwayat Kos</span></a>
    </li>

    <!-- Nav Item - Kos Favorit -->
    <li class="nav-item">
      <a class="nav-link" href="tables.html">
      <i class="fas fa-heart"></i>
      <span>Kos Favorit</span></a>
    </li>

    <!-- Nav Item - ganti pwd -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('user/gantipwd')?>">
      <i class="fas fa-lock"></i>
      <span>Ganti Password</span></a>
    </li>

    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

     <!-- Nav Item - Logout -->
     <li class="nav-item">
      <a class="nav-link" href="<?= base_url('auth/logout')?>">
      <i class="fas fa-sign-out-alt"></i>
      <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block"> 
  </ul>
  <!-- End of Sidebar -->
  