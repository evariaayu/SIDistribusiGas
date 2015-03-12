<h3><center>Form Edit Penukaran Barang</center></h1>
<br>
<div class="col-md-3">
</div>

<div class="col-md-6">
<form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_datagudang/update/<?php echo $hasil[0]->idTukar_Barang ?>">
 
  <!--jumlah barang rusak-->
  <div class="form-group">
    <label for="jumlahbarangrusak" class="col-sm-2 control-label">Jumlah Barang Rusak</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="jumlahbarangrusak" name="jumlahbarangrusak" value="<?php echo $hasil[0]->jumlahbarangrusak ?>">
    </div>
  </div>

  <!---jumlah barang kosong -->
  <div class="form-group">
    <label for="jumlahbarangkosong" class="col-sm-2 control-label">Jumlah Barang Kosong</label>
    <div class="col-sm-10">
      <input id="jumlahbarangkosong" name="jumlahbarangkosong" class="form-control" value="<?php echo $hasil[0]->jumlahbarangkosong ?>"></input>
    </div>
  </div>
  
  <!---Keterangan -->
  <div class="form-group">
    <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
    <div class="col-sm-10">
      <input id="keterangan" name="keterangan" class="form-control" value="<?php echo $hasil[0]->keterangan ?>"></input>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default" value="submit"></button>
    </div>
  </div>
</form>
</div>