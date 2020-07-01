

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
                <span class="mr-4 d-none d-lg-inline text-black-100 ">Welcome  <?php echo $this->session->userdata('userpen')?> on  <?php echo $this->session->userdata('date_created')?> </span>
                <img class="img-profile rounded-circle" width="35" height="35" src="<?= base_url('assets/img/profil/'). $this->session->userdata('fotopen')?>">
              </a>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <b><h2 class="text-grey-900 mb-4">Kos Favorit</h1></b>
          <?= $this->session->flashdata('pesan');?>
          
        <div>
                <div class="row no-gutters">
                    <div class="section">
                    <div class="table-responsive ">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>No</th>
                            <th>ID KOS</th>
                            <th>ID KAMAR</th>
                            
                            <th>Aksi</th>
                          
                        </tr>
                        <?php $no=1;
                        foreach ($kosfav as $k): ?>
                        <tr>
                        
                            <td><?php echo $no++?></td>
                            <td><?php echo $kosfav['id_kos'];?></td>
                            <td><?php echo $kosfav['id_kamar'];?></td>
                           
                            <td >
                            <div class="col-md-6">
                            <i class="fa fa-eye" aria-hidden="true"></i>

                            </div>
                            <div class="col-md-6">
                            <i class="fa fa-trash" aria-hidden="true"></i>

                            </div>
                            </td>
                            
                            
                        </tr>
                        <?php endforeach;?>  
                        
                    </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
        
   