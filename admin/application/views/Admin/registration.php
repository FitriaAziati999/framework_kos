<div class="register-box">
    <div class="register-logo">
        <a><b>Admin</b> KOS</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new admin</p>
            <form action="<?= base_url('admin/registration') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" id="user" name="user" value="<?= set_value('user') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('user', '<small class="text-danger pl-3">', '</small>') ?>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" id="pass" name="pass">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" id="pass2" name="pass2">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="<?= set_value('email') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="No. Telp" id="telp" name="telp" value="<?= set_value('telp') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class=" fas fa-mobile-alt"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('telp', '<small class="text-danger pl-3">', '</small>') ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Alamat" id="alamat" name="alamat" value="<?= set_value('alamat') ?>">
                    <div class=" input-group-text">
                        <span < class="fas fa-map-signs"> </span>
                    </div>
                </div>
                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>

                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
        </div>
        <a href="<?= base_url('Admin') ?>" class="text-center"> I already have a accont</a>
        </form>



    </div>
    <!-- /.form-box -->
</div><!-- /.card -->
</div>