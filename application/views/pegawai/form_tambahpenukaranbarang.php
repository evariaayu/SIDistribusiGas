<div class="col-md-8 col-sm-offset-2">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
    <div class="panel-heading">
      <h1 class="panel-title"><b><center>Form Penukaran Barang</center></b></h1>
    </div>
    <div class="panel-body">
      <form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_datagudang/insert">
      <?php echo $success;?>
           <div class="form-group">
              <label for="stokgudang" class="col-sm-3 control-label">Stok Gudang</label>
              <div class="col-sm-6">
             <?php if(empty($stok_gudang)) { echo "Data Penukaran Gudang masih kosong";}
              else { ?>
                 <div class="well well-sm"><?php echo $stok_gudang ?></div>
              <?php } ?>
            </div>
          </div>

        <div class="form-group">
          <label for="idPangkalan" class="col-sm-3 control-label">Pangkalan</label>
          <div class="col-sm-6">
            <select class="form-control" name="idPangkalan" id="idPpangkalan">
              <option value="0">--- Pilih Pangkalan ----</option>
           <?php foreach ($hasil as $row) {?>
              
               <option value="<?php echo $row->idPangkalan ?>"> <?php echo $row->namapangkalan ?> </option>
          
               <?php } ?>
              </select>
          </div>
        </div>

        <div class="form-group">
          <!--jumlah barang rusak-->
          <label for="jumlahbarangrusak" class="col-sm-3 control-label">Jumlah Barang Rusak</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="jumlahbarangrusak" name="jumlahbarangrusak" placeholder="Jumlah barang rusak">
          </div>
        </div>

        <!---jumlah barang kosong -->
        <div class="form-group">
          <label for="jumlahbarangkosong" class="col-sm-3 control-label">Jumlah Barang Kosong</label>
          <div class="col-sm-6">
            <input id="jumlahbarangkosong" name="jumlahbarangkosong" class="form-control" placeholder="Jumlah barang kosong"></input>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-primary">Submit</button>
            <input class="btn btn-danger" type="reset" value="Cancel"><br>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>