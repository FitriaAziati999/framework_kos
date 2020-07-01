


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
                <span class="mr-4 d-none d-lg-inline text-black-100 "><?php echo $this->session->userdata('userpen')?> on  <?php echo $this->session->userdata('date_created')?></span>
                <img class="img-profile rounded-circle" width="35" height="35" src='<?=base_url()?>assets/img/profil/<?= $this->session->userdata('fotopen');?>'>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
    <h2 class="text-grey-900 mb-4">Ganti Password</h1>
      <div class="card mb-2" style="max-width: 900px;">
      <?= $this->session->flashdata('pesan');?><br></br>
          <div class="col-md-12">
          
          <form class="pwd" method="post" action="<?php echo base_url ('user/aksi_gantipwd'); ?> ">
                  <div class="form-group row">
                      <label for="inputPassword" class="col-sm-3 col-form-label">Password Baru</label>
                  <div class="col-sm-9">
                        <input type="password" class="form-control form-control-pwd" id="passpen" name="passpen" value="<?= set_value('passpen'); ?>" >
                        <?= form_error('passpen', '<small class="text-danger pl-2">', '</small>');  ?>
                  </div>
                  </div>

                  <div class="form-group row">
                      <label for="inputPassword" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                  <div class="col-sm-9">
                  <input type="password" class="form-control form-control-pwd" id="passpen2" name="passpen2" value="<?= set_value('passpen2'); ?>">
                  <?= form_error('passpen2', '<small class="text-danger pl-2">', '</small>');  ?>
                  </div></div>

                  <button type="submit" class="btn btn-success" ><i class="fas fa-edit"></i>
                Ganti Password
                  </button>
              </form>
            </div>
        </div>
     
      <div class="row no-gutters"> 
   
    
      </div>
  </div>
        <!-- /.container-fluid -->
    
</div>
      <!-- End of Main Content -->

   