<h3><center>Form Tambah Biaya Operasional</center></h1>
<br>
<div class="col-md-3">
</div>

<div class="col-md-6">
<form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_pemasukangas/insert">


  <div class="form-group">
    <label class="col-sm-2 control-label">Waktu</label>
    <div class="col-sm-10">
      <?php
echo (new \DateTime())->format('d-M-Y H:i:s');?>
  
    </div>
      
  </div>

<!--
  <div class="form-group">
    <!--jumlah gas
    <label for="jumlahgas" class="col-sm-2 control-label">Keperluan</label>
    <div class="col-sm-10">
      <select type="text" class="form-control" id="keperluan" name="keperluan" >
        <option>PAM</option>
        <option>PLN</option>
        <option>Telkom</option>
        <option>Lainnya</option>
      </select>
    </div>
  </div>
-->

<!--- lainnya -->
  <div class="form-group">
    <label for="namabarang" class="col-sm-2 control-label">Nama Barang</label>
    <div class="col-sm-10">
      <input id="namabarang" name="namabarang" class="form-control" placeholder="Nama Barang" ></input>
    </div>
  </div>

<!--- harga -->
  <div class="form-group">
    <label for="harga" class="col-sm-2 control-label">Harga</label>
    <div class="col-sm-10">
      <input id="harga" name="harga" class="form-control" placeholder="Harga" required></input>
    </div>
  </div>

  <!---Lampirkan File -->
  <div class="form-group">
    <label for="file" class="col-sm-2 control-label">Lampiran Nota</label>
    <div class="col-sm-10">
      <input type="file" id="file" name="file" >
      <p class="help-block">file max. 2mb</p>
    </div>
  </div>

<!--  
<?php
$date = new DateTime();
echo $date->getTimestamp();
?>-->
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Simpan</button>
    </div>
  </div>
  
</form>
</div>