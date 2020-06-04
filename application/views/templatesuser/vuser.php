


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
                <span class="mr-4 d-none d-lg-inline text-black-100 ">Welcome <?php echo $this->session->userdata('userpen')?></span>
                <img class="img-profile rounded-circle" width="35" height="35" src='<?=base_url()?>assets/img/profil/<?= $this->session->userdata('fotopen');?>'>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <b><h2 class="text-grey-900 mb-4">Profil Saya</h1></b>
          <div class="card mb-2" style="max-width: 600px;">
  <div class="row no-gutters">
    <div class="col-md-5"></br></br>
      <img class="card-img" width="180" height="250" src='<?=base_url()?>assets/img/profil/<?= $this->session->userdata('fotopen');?>'>
    </div>
    <div class="col-md-7">
      <div class="card-body">
        <h4 class="card-title"><?php echo $this->session->userdata('userpen');?></h4>
        <p class="card-text"><?php echo $this->session->userdata('emailpen');?></p><hr>
        <p class="card-text"><?php echo $this->session->userdata('namapen');?></p>
        <p class="card-text"><?php echo $this->session->userdata('jkpen');?></p>
        <p class="card-text"><?php echo $this->session->userdata('nopen');?></p>
        <p class="card-text"><?php echo $this->session->userdata('alamatpen');?></p>
        <p class="card-text"><?php echo $this->session->userdata('pekerjaanpen');?></p>
        <p class="card-text">NIK : <?php echo $this->session->userdata('nikpen');?></p>
        <p class="card-text"></small></p>
        <div>
            <a class="btn btn-primary" href="<?php echo base_url('user/editprofil')?>"><i class="fas fa-edit"></i> Edit </a>
          </div>
      </div>
    </div>
  </div>
</div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

   