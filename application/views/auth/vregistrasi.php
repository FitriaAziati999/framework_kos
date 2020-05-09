<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="col-lg">
                    <div class="p-4">
                        <div class="text-center">

                            <h1 class="h3 text-gray-900 mb-4">Daftar Penyewa</h1>

                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registrasi'); ?>">
                        <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="namapen" name="namapen" placeholder="Masukkan Nama Lengkap" value="<?= set_value('namapen'); ?>">
                                <?= form_error('namapen', '<small class="text-danger pl-2">', '</small>');  ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nopen" name="nopen" placeholder="Nomor HP atau WA" value="<?= set_value('nopen'); ?>">
                                <?= form_error('nopen', '<small class="text-danger pl-2">', '</small>');  ?>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="alamatpen" name="alamatpen" placeholder="Alamat Lengkap" value="<?= set_value('alamatpen'); ?>">
                                <?= form_error('alamatpen', '<small class="text-danger pl-2">', '</small>');  ?>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="emailpen" name="emailpen" placeholder="Email" value="<?= set_value('emailpen'); ?>">
                                <?= form_error('emailpen', '<small class="text-danger pl-2">', '</small>');  ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="userpen" name="userpen" placeholder="Username" value="<?= set_value('userpen'); ?>">
                                <?= form_error('userpen', '<small class="text-danger pl-2">', '</small>');  ?>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="passpen" name="passpen" placeholder="Password" value="<?= set_value('passpen'); ?>">
                                    <?= form_error('passpen', '<small class="text-danger pl-2">', '</small>');  ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="passpen2" name="passpen2" placeholder="konfirmasi Password" value="<?= set_value('passpen2'); ?>">
                                    <?= form_error('passpen2', '<small class="text-danger pl-2">', '</small>');  ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nikpen" name="nikpen" placeholder="NIK (Nomor Induk Keluarga) " value="<?= set_value('nikpen'); ?>">
                                <?= form_error('nikpen', '<small class="text-danger pl-2">', '</small>');  ?>
                            </div>

                            <div class="form-group">

                                <select id="pekerjaanpen" name="pekerjaanpen" class="custom-select form-control-user" size="-2" value="<?= set_value('pekerjaanpen'); ?>">
                                    <option value="Pelajar / Mahasiswa">Pelajar / Mahasiswa</option>
                                    <option value="Pekerja / wiraswasta">Pekerja / wiraswasta</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                    <option value="Belum Bekerja">Belum Bekerja</option>
                                    <?= form_error('pekerjaanpen', '<small class="text-danger pl-2">', '</small>'); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <select id="jkpen" name="jkpen" class="custom-select form-control-user" size="-2" value="<?= set_value('jkpen'); ?>">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <?= form_error('konfirmasipen', '<small class="text-danger pl-2">', '</small>');  ?>
                                </select>

                            </div>

                            
                            <hr>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Daftar
                            </button>

                    </div>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Lupa Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="<?= base_url('auth/login') ?>">Sudah Punya Akun? Login Sekarang!</a>
                    </div>
                    <br>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>