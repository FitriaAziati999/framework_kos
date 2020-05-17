<?php
foreach ($detail as $p) :
    $id = $p['id_kos'];
    $id_k = $p['id_kamar'];
    $nama = $p['namakos'];
    $foto = $p['fotokamar'];
    $khusus = $p['khususkos'];
    $alamat = $p['alamatkos'];
    $fasilitas = $p['fasilitaskos'];
    $fasilitaskamar = $p['fasilitaskamar'];
    $lingkungan = $p['lingkungankos'];
    $peraturan = $p['peraturankos'];
    $ukuran = $p['ukuran'];
    $tampung = $p['penghuni'];
    $harga = $p['harga'];
    $stok = $p['stok'];
    $nopemilik = $p['nopem'];
?>
<!-- Page Content -->
<div class="container mt-5 mb-5">

  <!-- Portfolio Item Heading -->
  <!-- <h1 class="my-4">Page Heading
    <small>Secondary Text</small>
  </h1> -->
  <div class="card">
    <div class="card-body">
    <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
            <img class="img-fluid" src="<?= base_url(); ?>assets/img/foto_kos/<?= $foto; ?>" alt="">
            </div>

            <div class="col-md-4">
            <h3 class="my-3"><?= $nama;?></h3>
            <h2 class="my-3"><i>RP.</i> <?= $harga;?></h2>
            <p>Aturan: <?= $peraturan; ?></p>
            <p>Kawasan: <?= $lingkungan; ?></p>
            <p>Alamat: <?= $alamat; ?></p>
            <p>Fasilitas Kos: <?= $fasilitas; ?></p>
            <p>Khusus Kos<?= $khusus; ?></p>
            <h3 class="my-3">Fasilitas Kamar</h3>
            <ul>
                <li>Ukuran Kamar: <?= $ukuran;?></li>
                <li>Daya Tampung: <?= $tampung;?></li>
                <li>Kamar: <?= $fasilitaskamar;?></li>
                <li>Stok: <?= $stok;?></li>
                <!-- <li>Adipiscing Elit</li> -->
            </ul>
            </div>

        </div>
        <!-- /.row -->
    </div>

    <div class="card-body">
        <!-- Related Projects Row -->

        <div class="row">

            <div class="col-md-3 col-sm-6 mb-4">
            <a class="btn btn-primary" href="<?= base_url('home/index');?>">Kembali</a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
            <a class="btn btn-primary" href="https://api.WhatsApp.com/send?phone=<?= $nopemilik;?>">Tanya Pemilik</a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
            <a class="btn btn-primary" href="#">Sewa Kos</a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
            <a class="btn btn-primary" href="#"><i class="fas fa-heart"></i> Whistlist</a>
            </div>

        </div>
        <!-- /.row -->
    </div>
  </div>

</div>
<!-- /.container -->
<?php endforeach;?>