<div class="col-md-8 col-sm-offset-2">
  <div class="panel panel-primary">
<!-- Default panel contents -->
  <div class="panel-heading">
    <h1 class="panel-title"><b><center>Form Edit Pemasukan Gas</center></b></h1>
  </div>
  <div class="panel-body">
  <?php echo $success; ?>
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
      <input type="submit" class="btn btn-primary" value="Submit"></button>
      <input class="btn btn-danger" type="reset" value="Cancel"><br>
    </div>
  </div>
</form>
</div>
</div>
</div>