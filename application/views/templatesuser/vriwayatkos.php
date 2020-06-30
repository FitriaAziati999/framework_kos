

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
              </li>
            </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <b><h2 class="text-grey-900 mb-4">Riwayat Kos</h2></b>
          <?= $this->session->flashdata('pesan');?>
          <div>
          <div>
                <div class="row no-gutters">
                    <div class="section">
                    
                        <table class="table-reponsive table table-bordered table-striped">
                          <tr>
                        
                            <th>No.</th>
                            <th>Nama kos</th>
                            <th>Alamat kos</th>
                            <th>Harga</th>
                            <th style="center">Masuk Kos pada bulan</th>
                            <th>Foto Bukti Transfer</th>
                            <th>Rekening Tujuan</th>
                            <th>Rekening Anda</th>
                            <th>Tanggal Bayar</th>
                            <th>Status</th>
                            
                          </tr>
                       
                        
                        <?php $no=1;
                        foreach ($sewa as $sw): ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $sewa['namakos'];?></td>
                            <td><?php echo $sewa['alamatkos'];?></td>
                            <td><?php echo $sewa['harga'];?></td>
                            <td><?php echo $sewa['masuk_kos'];?></td>
                            <td><?=base_url('assets/img/bukti_transaksi/')?>.<?php echo $sewa['bukti']?></td>
                            <td><?php echo $sewa['rek_tujuan'];?>.</td>
                            <td><?php echo $sewa['rek_penyewa'];?></td>
                            <td><?php echo $sewa['tgl_bayar'];?></td>
                            <td><?php echo $sewa['status'];?></td>
                            
                            
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
        
        