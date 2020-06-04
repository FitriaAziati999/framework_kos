
  <!-- Page Content -->
  <div class="container">

    <div class="row">
      
      <!-- /.col-lg-3 -->

      <div class="col-lg-14">

        <div id="carouselExampleIndicators" class="carousel slide my-3 mx-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="<?= base_url();?>assets/img/slide2.jpg" alt="<?= base_url();?>assets/img/slide.jpg">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="<?= base_url();?>assets/img/slide2.jpg" alt="<?= base_url();?>assets/img/slide.jpg">
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
        </div><br><br>

        <div class="row">
          <?php foreach ($kos as $p) :?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="<?= base_url(); ?>assets/img/foto_kos/<?php echo $p->fotokamar ?>" alt=""></a>
              <div class="card-body">
              <div class="text-center">
               <h4 class="card-title">
                <a href="#"><?php echo $p->namakos ?></a>
                </h4>
                <h5>Rp. <?php echo $p->harga?></h5>
                <h5><?php echo $p->khususkos?></h5>
                <p class="card-text"><?php echo $p->alamatkos?></p>
                <a href="<?= base_url('detail/detail/') . $p->id_kos ?>" type="button" class="btn btn-outline-primary">Detail selengkapnya</a>
                </div>
              </div>
              <div class="card-footer">
                <small class="text-yellow">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          <?php endforeach; ?> 
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->

  