<h3><center>Form Tambah Pemasukan Gas</center></h1>
<br>
<div class="col-md-3">
</div>

<div class="col-md-6">
<form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_pemasukangas/insert">
  

  <div class="form-group">
    <!--jumlah gas-->
    <label for="jumlahgas" class="col-sm-2 control-label">Jumlah Gas</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="jumlahgas" name="jumlahgas" placeholder="Jumlah gas" required>
    </div>
  </div>

  <!---harga beli -->
  <div class="form-group">
    <label for="hargabeli" class="col-sm-2 control-label">Harga Beli</label>
    <div class="col-sm-10">
      <input id="hargabeli" name="hargabeli" class="form-control" placeholder="Harga Beli" required></input>
    </div>
  </div>
  
  <!---harga jual -->
  <div class="form-group">
    <label for="hargajual" class="col-sm-2 control-label">Harga Jual</label>
    <div class="col-sm-10">
      <input id="hargajual" name="hargajual" class="form-control" placeholder="Harga Jual" required></input>
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