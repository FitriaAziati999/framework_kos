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
                  <h2 class="h6 text-grey-900 mb-4">Lupa password ? </h2>
                </div>
                <?= $this->session->flashdata('message');?>
                <form class="user" method="post" action="<?= base_url('auth/lupapwd'); ?>">
                  <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="emailpen" name="emailpen" placeholder="Masukkan Email anda yang telah terdaftar" value="<?= set_value('emailpen'); ?>">
                    <?= form_error('emailpen', '<small class="text-danger pl-2">', '</small>');  ?>
                  </div>
                  <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nopen" name="nopen" placeholder="Masukkan Nomor Handphone anda yang telah terdaftar " value="<?= set_value('nopen'); ?>">
                    <?= form_error('nopen', '<small class="text-danger pl-2">', '</small>');  ?>
                  </div>
                 
                  <button type="submit" class="btn btn-primary btn-user btn-block" >
                   Kirim
                  </button>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/login'); ?>"> Kembali ke Login</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>