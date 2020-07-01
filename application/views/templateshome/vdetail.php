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
            <a class="btn btn-outline-primary" href="https://api.WhatsApp.com/send?phone=<?= $nopemilik;?>"> Tanya Pemilik</a>
            </div>
            <!-- Pengecekan apakah ada user yang masuk jika iya maka tombol dtampilkan -->
            <?php if ($this->session->userdata('id_penyewa')){ ?>
            <div class="col-md-3 col-sm-4 mb-3">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#kosfav" ><i class="fas fa-heart"></i> Kos favorit </button>
            </div><?php } ?>
            <!-- Modal -->
            <div class="modal fade" id="kosfav" role="dialog" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h7 class="modal-title" id="exampleModalLabel">Apakah anda ingin menjadikan kos ini favorit? </h7>
                    <button type="button" class="close" data-dismiss="modal" >
            <!--<span aria-hidden="true">&times;</span>-->
                    </button>
            <!-- BodyModal untuk pendifinisian ke database -->       
            <form method="post" enctype="multipart/form-data" action="<?= base_url('home/aksi_favoritkos')?>"> 
                  <div class="modal-body">
                    <div class="form-group">
                    <input type="hidden" id="id_kos" name="id_kos" value="<?=$id?>">
                    <input type="hidden" id="id_kamar" name="id_kamar" value="<?=$id_k?>">
                    <input type="hidden" id="id_penyewa" name="id_penyewa" value="<?php echo $this->session->userdata('id_penyewa');?>">
                    </div>
                    </div>
                    <a class="btn btn-danger" href="<?= base_url('detail/detail/'. $id ."/". $id_k);?>">Batal</a>
                    <button type="submit" class="btn btn-primary">iya</button>
                    </form>
                  <!-- Button trigger modal -->
                  </div>
                  
                </div>
              </div>
            </div> <!-- end Modal -->
            </div>

        </div>
        <!-- /.row -->
    </div>
  </div>

</div>
<!-- /.container -->
<?php endforeach;?>