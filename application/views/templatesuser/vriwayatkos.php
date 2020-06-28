<?php $no;
foreach ($penyewa as $p) :
    $id = $p['id_kos'];
    $id_k = $p['id_kamar'];
    $nama = $p['namakos'];
    $alamatkos= $p['alamatkos'];
    $namapen = $p['namapen'];
    $alamatpen = $p['alamatpen'];
    $nopen = $p['nopen'];
    
    $harga = $p['harga'];
    $status = $p['status'];
    
?>

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
          <b><h2 class="text-grey-900 mb-4">Riwayat Kos</h1></b>
          <?= $this->session->flashdata('pesan');?>
          <div class="card mb-2" style="max-width: 1400px;">
                <div class="row no-gutters">
                    <div class="section">
                    <div class="table-responsive ">
                    <table class="table table-bordered table-striped">
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
                        <tr>
                       
                            <th><?= $no++?></th>
                            <th><?= $nama?></th>
                            <th>No.</th>
                            <th>No.</th>
                            <th>No.</th>
                            <th>No.</th>
                            <th>No.</th>
                       
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
      
   