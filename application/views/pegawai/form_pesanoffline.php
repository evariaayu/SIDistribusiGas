<div class="col-md-8 col-sm-offset-2">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
    <div class="panel-heading">
      <h1 class="panel-title"><b><center>Form Pesan Gas</center></b></h1>
    </div>
    <div class="panel-body">
      <form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/c_pesanoffline/pesan">
      <?php echo $success;?>

      <div class="form-group">
        <label for="idPangkalan" class="col-sm-3 control-label">Pangkalan</label>
        <div class="col-sm-6">
          <select class="form-control" name="idPangkalan" id="idPangkalan">
            <option value="0">--- Pilih Pangkalan ----</option>
            <?php foreach ($hasil as $row) {?>

            <option value="<?php echo $row->idPangkalan ?>"> <?php echo $row->namapangkalan ?> </option>

            <?php } ?>
          </select>
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

        <!---jumlah barang kosong -->
        <div class="form-group">
          <label for="jumlahGas" class="col-sm-3 control-label">Jumlah Order</label>
          <div class="col-sm-7">
            <input id="jumlahGas" name="jumlahGas" class="form-control" placeholder=" "></input>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-7">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            <input class="btn btn-danger" type="reset" value="Cancel"><br>
            
          </div>
        </div>
      </form>
    </div>
  </div>
</div>