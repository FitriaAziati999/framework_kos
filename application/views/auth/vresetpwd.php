<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-lg-6">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
          
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                <i class="fas fa-home fa-3x"></i>
                  <h1 class="h4 text-grey-900 mb-4">Kos Kita</h1>
                  <h2 class="h6 text-grey-900 mb-4">Ganti Password baru</h2>
                </div>
                <?= $this->session->flashdata('message');?>
                <form class="user" method="post" action="<?php echo base_url ('auth/resetpwd'); ?> ">
                  <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="passpen" name="passpen" placeholder="Masukkan Password baru anda " value="<?= set_value('passpen'); ?>">
                    <?= form_error('passpen', '<small class="text-danger pl-2">', '</small>');  ?>
                  </div>
                  <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="passpen2" name="passpen2" placeholder="Ulang Password baru anda" value="<?= set_value('passpen2'); ?>">
                    <?= form_error('passpen2', '<small class="text-danger pl-2">', '</small>');  ?>
                  </div>
                 
                  <button type="submit" class="btn btn-primary btn-user btn-block" >
                Ganti Password
                  </button>

                 

                  
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>