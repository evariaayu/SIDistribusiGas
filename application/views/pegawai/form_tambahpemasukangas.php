<div class="col-md-8 col-sm-offset-2">
  <div class="panel panel-primary">
<!-- Default panel contents -->
  <div class="panel-heading">
    <h1 class="panel-title"><b><center>Form Edit Pemasukan Gas</center></b></h1>
  </div>
  <div class="panel-body">
  <form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_pemasukangas/insert">
  <?php echo $success;?>

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
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Submit</button>
      <input class="btn btn-danger" type="reset" value="Cancel"><br>
    </div>
  </div>
</form>
</div>
</div>
</div>