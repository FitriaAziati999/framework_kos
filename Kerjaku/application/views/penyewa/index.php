<!-- Masthead-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item bg bg1 active">
            <!-- <div class="container">
                <div class="carousel-caption">
                    <h1>Example headline.</h1>
                    <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                </div>
            </div> -->
        </div>
        <div class="carousel-item bg bg2">
            <!-- <div class="container">
                <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div> -->
        </div>
        <div class="carousel-item bg bg3">
            <!-- <div class="container">
                <div class="carousel-caption">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div> -->
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- Services-->

<!-- Portfolio Grid-->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="form-group">
            <div class="container">
                <label for="labelKost">Cari Tempat Kost</label>
                <br />
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <form method="post" action="">
                            <div class="card-body row no-gutters align-items-center">
                                <div class="col-auto mr-2 ">
                                    <i class="fas fa-search h4 text-body"></i>
                                </div>
                                <!--end of col-->
                                <div class="col">
                                    <input class="form-control form-control-lg" type="search" placeholder="Cari kos berdasarkan Jenis / Harga / Nama Kos">
                                </div>
                                <!--end of col-->
                                <div class="col-auto ml-2">
                                    <button class="btn btn-lg btn-primary" type="submit">Search</button>
                                </div>
                                <!--end of col-->
                            </div>
                        </form>
                    </div>
                    <!--end of col-->
                </div>
            </div>
        </div>
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Rekomendasi Kost</h2>
            <h3 class="section-subheading text-muted">Berikut adalah beberapa rekomendasi tempat kost</h3>
        </div>
        <div class="row">
            <?php
            foreach ($kos as $tb) { ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="#detailKos_<?= $tb['id_kos'] ?>">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="<?= base_url(); ?>assets/img/foto_kos/<?= $tb['fotokamar']; ?>" alt="" />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading"><?= $tb['namakos'] ?></div>
                            <div class="portfolio-caption-heading">
                                <h6 class="text-uppercase">RP. <strong><?= $tb['harga'] ?></strong> / bulan</h6>
                            </div>
                            <div class="portfolio text-uppercase"><?php if ($tb['khususkos'] == 'putra') {
                                                                        echo '<span class="badge badge-success">Putra</span>';
                                                                    } else {
                                                                        echo '<span class="badge badge-info">Putri</span>';
                                                                    }  ?></div>
                            <div class="portfolio-caption-subheading text-muted"><?= $tb['alamatkos'] ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Tentang Kami</h2>
            <h3 class="section-subheading text-white">Aplikasi ini adalah aplikasi yang membantu mahasiswa untuk mencari tempat tinggal sementara khususnya mahasiswa jember</h3>
        </div>
        <div class="row align-items-stretch mb-5 text-center">
            <div class="col-md-12 text-center">
                <div class="form-group">
                    <h5 class="section-subheading text-white">ALamat : Jember, Jawa Timur</h5>
                </div>
                <div class="form-group">
                    <h5 class="section-subheading text-white">Cp : 085236844218</h5>
                </div>
                <div class="form-group">
                    <h5 class="section-subheading text-white">Email : koskita@gmail.com</h5>
                </div>
                <div class="form-group">
                    <h5 class="section-subheading text-white">Ikuti Akun Social Media Kami</h5>
                </div>
                <div class="form-group text-center">
                    <a class="btn btn-dark btn-social" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social" href="#!"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<?php
foreach ($kos as $p) :
    $id = $p['id_kos'];
    $id_k = $p['id_kamar'];
    $nama = $p['namakos'];
    $foto = $p['fotokamar'];
    $khusus = $p['khususkos'];
    $alamat = $p['alamatkos'];
    $fasilitas = $p['fasilitaskos'];
    $lingkungan = $p['lingkungankos'];
    $peraturan = $p['peraturankos'];
    $ukuran = $p['ukuran'];
    $tampung = $p['penghuni'];
    $harga = $p['harga'];

    $query_user = "SELECT * FROM tipekamar, datakos WHERE datakos.id_kos = tipekamar.id_kos";
    $data_user = $this->db->query($query_user)->result_array();
?>
    <div class="portfolio-modal modal fade" id="detailKos_<?= $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project Details Go Here-->
                                <h2 class="text-uppercase"><?= $nama; ?></h2>
                                <p class="item-intro text-muted">Deskripsi tempat kos</p>
                                <img class="img-fluid d-block mx-auto" src="<?= base_url(); ?>assets/img/foto_kos/<?= $foto; ?>" alt="" />
                                <p class="item-intro text-uppercase">RP. <strong><?= $harga; ?></strong> / bulan</p>
                                <div class="item-intro text-uppercase">
                                    <?php if ($khusus == 'putra') {
                                        echo '<span class="badge badge-success">Putra</span>';
                                    } else {
                                        echo '<span class="badge badge-info">Putri</span>';
                                    }  ?>
                                </div>
                                <p>Peraturan Kos: <?= $peraturan; ?></p>
                                <ul class="list-inline">
                                    <li>Fasilitas Kos: <?= $fasilitas; ?></li>
                                    <li>Alamat: <?= $alamat; ?></li>
                                    <li>Lingkungan: <?= $lingkungan; ?></li>
                                    <li>Ukuran kamar: <?= $ukuran; ?></li>
                                    <li>Daya tampung: <?= $tampung; ?></li>
                                </ul>
                                <button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fas fa-times mr-1"></i>Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>