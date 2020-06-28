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
    $id_pemilik = $p['id_pemilik'];
?>

<div class="container">
    <div class="card" style="margin-top: 30px; margin-button:50px">
        <div class="card-header">
        <h5>Form Penyewaan Kos</h5>
        </div>
        <div class="card-body">
    
            <form method="post" action="<?= base_url('sewa/aksi_sewa')?>"> 
                <div class="form-group">
                <input type="hidden" id="id_kos" name="id_kos" value="<?=$id?>">
                <input type="hidden" id="id_kamar" name="id_kamar" value="<?=$id_k?>">
                <input type="hidden" id="id_pemilik" name="id_pemilik" value="<?=$id_pemilik?>">
                <input type="hidden" id="id_penyewa" name="id_penyewa" value="<?php echo $this->session->userdata('id_penyewa');?>">
                    <label>Nama kos :</label><br>
                    <input type="text" class="form-control" id="namakos" name="namakos" value="<?= $nama?>"readonly>
                </div>
                <div class="form-group">  
                    <label>Alamat kos : </label>
                    <input type="text" class="form-control" id="alamatkos" name="alamatkos" value="<?= $alamat?>"readonly>
                </div>
              
                <div class="form-group">
                <label>Harga kos yang harus dibayar : </label>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $harga?>"readonly>
                </div>
                
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Nama penyewa : </label>
                        <input type="text" class="form-control" id="namapen" name="namapen" value="<?php echo $this->session->userdata('namapen')?>"required>
                        </div>
                  
                        <div class="form-group">
                        <label>Alamat penyewa : </label>
                        <input type="text" class="form-control" id="alamatpen" name="alamatpen" value="<?php echo $this->session->userdata('alamatpen')?>"required>
                        </div>

                    <div class="form-group">
                        <label>No Hp Penyewa: </label>
                        <input type="text" class="form-control" id="nopen" name="nopen" value="<?php echo $this->session->userdata('nopen')?>"required>
                        </div>

                    </div>

                        
                    <div class="col-md-6">
                        
                        <div class="form-group">
                        <label>Sewa kos pada : </label>
                        <select id="masuk_kos" class="form-control" name="masuk_kos"  size="-1" >
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option></select></div>
                                    
                        <div class="form-group">
                        <label>Pilih Rekening Tujuan: </label>
                        <select id="rek_tujuan" class="form-control" name="rek_tujuan"  size="-1" >
                                    <option value="0021-05-027783-999 (BRI)">0021-05-027783-999 (BRI)</option>
                                    <option value="2001989999 (BCA)">2001989999 (BCA)</option>
                                    <option value="1430000801299 (Mandiri)">1430000801299 (Mandiri)</option></select></div>
                        
                        <div class="form-group">
                        <label> Nomor Rekening Anda: </label>
                        <input type="text" class="form-control" id="rek_penyewa" name="rek_penyewa" placeholder="Masukkan Nomor Rekening Anda contoh :1437800801299 (Mandiri) " value="<?= set_value('rek_penyewa'); ?>"required>
                    </div>
                </div>  </div>
                
                
                <div class="form-group">
                <label>Foto Bukti Transfer: </label>
                    <input type="file" class="form-control" id="bukti" name="bukti" value="<?= set_value('bukti'); ?>"required>
                </div>
                <p class="card-text" style="italic"><small>(Foto Bukti transfer anda akan di verifikasi oleh admin, jika telah sesuai maka pihak admin akan menginformasikan kepada pemilik kos agar memberikan kunci kamar dengan segera)</small></p>
                <a class="btn btn-danger" href="<?= base_url('detail/detail/'. $id ."/". $id_k);?>">Batal</a>
                <button type="submit" class="btn btn-success">sewa</button>
              
            </form>
        <?php endforeach;?>  
        </div></div>
    </div>
</div> 