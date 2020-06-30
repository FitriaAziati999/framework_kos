
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <span class="mr-4 d-none d-lg-inline text-black-100 ">Welcome <?php echo $penyewa['userpen'];?> on  <?php echo $penyewa['date_created'];?> </span>
                <img class="img-profile rounded-circle" width="35" height="35" src="<?= base_url('assets/img/profil/').$penyewa['fotopen'];?>">
              </a>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <b><h2 class="text-grey-900 mb-4">Data Penyewa</h1></b>
          <?= $this->session->flashdata('pesan');?>
        
          
  <div class="row no-gutters">
  
  </div> </div> </div> </div>