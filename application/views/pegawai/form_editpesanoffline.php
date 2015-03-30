<div class="col-md-8 col-sm-offset-2">
  <div class="panel panel-primary">
<!-- Default panel contents -->
  <div class="panel-heading">
    <h1 class="panel-title"><b><center>Form Edit Pesan Gas Offline</center></b></h1>
  </div>
  <div class="panel-body">
    <form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/c_pesanoffline/update/<?php echo $hasil[0]->idTransaksi_Offline?>">
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
        <label for="pangkalan" class="col-sm-3 control-label">ID Pangkalan</label>
        <div class="col-sm-7">
          <div class="well well-sm">
            <?php echo $hasil[0]->namapangkalan ?>
          </div>
          <input type="hidden" id="idPangkalan" name="idPangkalan" class="form-control" value="<?php echo $hasil[0]->namapangkalan ?>" readonly>
        </div>
      </div>

      <div class="form-group">
        <!--jumlah barang rusak-->
        <label for="hargagas" class="col-sm-3 control-label">Harga/1 gas</label>
        <div class="col-sm-7">
          <div class="well well-sm">
            Rp<?php echo $harga[0]['hargajual'] ?>,00
          </div>
          <input type="hidden" id="harga" name="harga" class="form-control" value="<?php echo $harga[0]['hargajual'] ?>" readonly>
        </div>
      </div>

      <div class="form-group">
        <label for="jumlahGas" class="col-sm-3 control-label">Jumlah Order</label>
        <div class="col-sm-7">
          <input id="jumlahGas" name="jumlahGas" class="form-control" placeholder=" "></input>
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