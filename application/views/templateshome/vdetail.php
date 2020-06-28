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
    $status = $p['status'];
    $nopemilik = $p['nopem'];
?>

<!-- Page Content -->
<div class="container mt-4 mb-5">

  <!-- Portfolio Item Heading -->
  <!-- <h1 class="my-4">Page Heading
    <small>Secondary Text</small>
  </h1> -->
  <div class="card">
    <div class="card-body">
    <!-- Portfolio Item Row -->
    <?= $this->session->flashdata('message');?>
        <div class="row">

            <div class="col-md-6">
            <img  src="<?= base_url(); ?>assets/img/foto_kos/<?= $foto; ?>"  alt ="" height="550" width="500">
            </div>

            <div class="col-md-6">
            <h1 class="my-3"><b><?= $nama?></b></h1>
            <h4 class="my-3"><i>RP.</i> <?= $harga;?></h4>
            <h5><?= $alamat; ?></h5></br>
            <p>Khusus Kos : <?= $khusus; ?></p>
            <p>Fasilitas Kos : <?= $fasilitas; ?></p>
            <p>Peraturan kos : <?= $peraturan; ?></p>
            <p>Lingkungan Sekitar : <?= $lingkungan; ?></p>
         <hr>
            <h4 class="my-3">Fasilitas Kamar</h4>
            <ul>
                <li>Ukuran Kamar : <?= $ukuran;?></li>
                <li>Daya Tampung : <?= $tampung;?></li>
                <li> Fasilitas yang ada dikamar : <?= $fasilitaskamar;?></li>
                <li>Stok : <?= $status;?></li></ul>
            </div>
        </div>
    </div>

        <!-- /.row -->
    <div class="card-body">
        <!-- Related Projects Row -->
        
        <div class="row">

            <div class="col-md-3 col-sm-4 mb-3">
            <a class="btn btn-outline-primary" href="<?= base_url('home/index');?>">Kembali</a>
            </div>

            <div class="col-md-3 col-sm-4 mb-3">
            
            <?php if($status == "Tersedia"){
              echo anchor('sewa/tampil_sewa/'. $id ."/". $id_k,'<span class="btn btn-outline-primary"> Sewa Kos </span>');
            }else{ 
              echo '<span class="btn btn-outline-primary">Tidak Tersedia</span>';
            }?>
         
            </div>

            <div class="col-md-3 col-sm-4 mb-3">
            <a class="btn btn-outline-primary" href="https://api.WhatsApp.com/send?phone=<?= $nopemilik;?>"><i class="fas fa-phone-alt"></i> Tanya Pemilik</a>
            </div>

            <div class="col-md-3 col-sm-4 mb-3">
            <a class="btn btn-outline-primary" href="<?= base_url('home/favoritkos/'. $id ."/". $id_k);?>"><i class="fas fa-heart"></i> Kos favorit </a>
            </div>

        </div>
        <!-- /.row -->
    </div>
  </div>

</div>
<!-- /.container -->
<?php endforeach;?>