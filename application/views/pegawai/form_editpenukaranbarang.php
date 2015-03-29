<div class="col-md-8 col-sm-offset-2">
  <div class="panel panel-primary">
<!-- Default panel contents -->
  <div class="panel-heading">
    <h1 class="panel-title"><b><center>Form Edit Penukaran Barang</center></b></h1>
  </div>
  <div class="panel-body">
    <form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_datagudang/update/<?php echo $hasil[0]->idTukar_Barang ?>">
    <?php echo $success;?>
       <div class="form-group">
          <label for="stokgudang" class="col-sm-3 control-label">Stok Gudang</label>
          <div class="col-sm-6">
         <?php if(empty($stok_gudang)) { 
          echo "Data Penukaran Gudang masih kosong";
        }
          else { ?>
             <div class="well well-sm"><?php echo $stok_gudang ?></div>
          <?php } ?>
        </div>
      </div>

      <div class="form-group">
        <label for="jumlahbarangrusak" class="col-sm-3 control-label">Jumlah Rusak</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="jumlahbarangrusak" name="jumlahbarangrusak" value="<?php echo $hasil[0]->jumlahbarangrusak ?>" >
        </div>
      </div>

      <div class="form-group">
        <label for="jumlahbarangkosong" class="col-sm-3 control-label">Jumlah Kosong</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="jumlahbarangkosong" name="jumlahbarangkosong" value="<?php echo $hasil[0]->jumlahbarangkosong ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $hasil[0]->keterangan ?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <input type="submit" class="btn btn-primary" value="Submit"></button>
          <input class="btn btn-danger" type="reset" value="Cancel"><br>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>