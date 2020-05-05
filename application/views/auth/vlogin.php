<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-lg-5">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">

            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login</h1>
                </div>
                <form class="user" method="post" action="<?= base_url('auth/login'); ?>">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="emailpen" name="emailpen" placeholder="Enter you username." value="<?= set_value('emailpen') ?>">
                    <?= form_error('emailpen', '<small class="text-danger pl-2">', '</small>');  ?>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="passpen" name="passpen" placeholder="Password" value="<?= set_value('passpen') ?>">
                    <?= form_error('passpen', '<small class="text-danger pl-2">', '</small>');  ?>
                  </div>
                  <div class="form-group">
                    <div class="text-left">
                      <a class="small" href="forgot-password.html">Lupa Password?</a>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>

                  <hr>

                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/registrasi'); ?>">Belum Punya Akun? Daftar</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>