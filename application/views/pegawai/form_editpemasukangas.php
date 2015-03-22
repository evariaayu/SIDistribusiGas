<h3><center>Form Edit Pemasukan Gas</center></h1>
<br>
<div class="col-md-3">
</div>

<div class="col-md-6">
<form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_pemasukangas/update/<?php echo $hasil[0]->idPemasukan; ?>">
  
  <div class="form-group">
    <!--jumlah gas-->
    <label for="jumlahgas" class="col-sm-2 control-label">Jumlah Gas</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="jumlahgas" name="jumlahgas" value="<?php echo $hasil[0]->jumlahgas ?>" required>
    </div>
  </div>

  <!---harga beli -->
  <div class="form-group">
    <label for="hargabeli" class="col-sm-2 control-label">Harga Beli</label>
    <div class="col-sm-10">
      <input id="hargabeli" name="hargabeli" class="form-control" value="<?php echo $hasil[0]->hargabeli ?>" required></input>
    </div>
  </div>
  
  <!---harga jual -->
  <div class="form-group">
    <label for="hargajual" class="col-sm-2 control-label">Harga Jual</label>
    <div class="col-sm-10">
      <input id="hargajual" name="hargajual" class="form-control" value="<?php echo $hasil[0]->hargajual ?>" required></input>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default" value="submit"></button>
    </div>
  </div>
</form>
</div>