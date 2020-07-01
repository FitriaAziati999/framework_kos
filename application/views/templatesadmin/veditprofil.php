
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
                <span class="mr-4 d-none d-lg-inline text-black-100 ">Welcome <?php echo $this->session->userdata('userpen')?> on  <?php echo $penyewa['date_created'];?></span>
                <img class="img-profile rounded-circle" width="35" height="35" src="<?= base_url('assets/img/profil/').$penyewa['fotopen'];?>">
              </a>
            </li>
        </ul>
    </nav>
<!-- End of Topbar -->

<!-- Begin Page Content -->
        <div class="container-fluid">

<!-- Page Heading -->
<h2 class="text-grey-900 mb-4"> Edit Profil Saya</h1>
    <div class="card" style="max-width: 1200px;">
    
  
       <?php echo form_open_multipart('admin/aksi_editprofil');?>
      <!-- <form class="useredit" method="post" action="<?= base_url('admin/aksi_editprofil'); ?>">-->

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control form-control-useredit" id="namapen" name="namapen" placeholder="Masukkan Nama Lengkap" value="<?php echo $penyewa['namapen'];?>">
                    <?= form_error('namapen', '<small class="text-danger pl-2">', '</small>');  ?>
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control form-control-useredit" id="nopen" name="nopen" placeholder="Nomor HP atau WA" value="<?php echo $penyewa['nopen'];?>">
                    <?= form_error('nopen', '<small class="text-danger pl-2">', '</small>');  ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-useredit" id="alamatpen" name="alamatpen" placeholder="Alamat Lengkap" value="<?php echo $penyewa['alamatpen'];?>">
                    <?= form_error('alamatpen', '<small class="text-danger pl-2">', '</small>');  ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-useredit" id="nikpen" name="nikpen" placeholder="NIK (Nomor Induk Keluarga) " value="<?php echo $penyewa['nikpen'];?>"readonly>
                    <?= form_error('nikpen', '<small class="text-danger pl-2">', '</small>');  ?>
                </div>    
            </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control form-control-useredit" id="userpen" name="userpen" placeholder="username" value="<?php echo $penyewa['userpen'];?>">
                <?= form_error('userpen', '<small class="text-danger pl-2">', '</small>');  ?>
            </div>

            <div class="form-group">
                <input type="text" class="form-control form-control-useredit" id="emailpen" name="emailpen" placeholder="Email" value="<?php echo $penyewa['emailpen'];?>"readonly>
                <?= form_error('emailpen', '<small class="text-danger pl-2">', '</small>');  ?>
            </div>

            <div class="form-group">
                <select id="pekerjaanpen" name="pekerjaanpen" class="custom-select form-control-useredit" size="-2" value="<?php echo $penyewa['pekerjaanpen'];?>">
                    <option value="Pelajar / Mahasiswa">Pelajar / Mahasiswa</option>
                    <option value="Pekerja / wiraswasta">Pekerja / wiraswasta</option>
                    <option value="PNS">PNS</option>
                    <option value="Wirausaha">Wirausaha</option>
                    <option value="Belum Bekerja">Belum Bekerja</option>
                    <?= form_error('pekerjaanpen', '<small class="text-danger pl-2">', '</small>'); ?>
                </select>
            </div>

            <div class="form-group">
                <select id="jkpen" name="jkpen" class="custom-select form-control-useredit" size="-2" value="<?php echo $penyewa['jkpen'];?>">
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                    <?= form_error('konfirmasipen', '<small class="text-danger pl-2">', '</small>');  ?>
                </select>
            </div>
        </div>
    </div>
   <div class="row">
        <div class="col-sm-3 mb-2 pl-4">
            <img src="<?= base_url('assets/img/profil/').$penyewa['fotopen'];?>" width="130" height="90" mb-6>
        </div> 
        <div class="col-sm-9">
            <div class="custom-file">
            <input type="file" class="custom-file-input form-control-useredit" id="fotopen" name="fotopen">
            <label class="custom-file-label" for="fotopen">Choose file</label>
            </div>
        </div>
        <!--<input type="file" id="fotopen" name="fotopen">-->
    </div>
    
    <div > 
        <button type="submit" class="btn btn-success btn-control-useredit"> <i class="fas fa-edit"></i> Kirim </button>
    </div> 
</form> 
<!-- /.button -->    
<div class="row no-gutters">     
 
  </div>
</div>
<!-- /.container-fluid -->

</div>

 <!-- End of Main Content -->
</div>