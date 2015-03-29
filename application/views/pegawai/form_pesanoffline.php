<div class="col-sm-offset-3 col-md-6 ">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h3 class="panel-title"><b><center>Form Pemesanan Gas</center></b></h3>
  </div>
<<<<<<< HEAD

  <div class="col-md-6">
    <?php echo $success;?>
=======
  <div class="panel-body">
>>>>>>> 94f9a4290fbb4a1892c925f6feaf61289f402c89
    <form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/c_pesanoffline/pesan">
      <?php echo $success;?>
        <div class="form-group">
          <label for="idPangkalan" class="col-sm-3 control-label">Pangkalan</label>
          <div class="col-sm-7">
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
          <div class="well well-sm"><?php echo $harga[0]['hargajual'] ?></div>
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


<!--<script>DateInput('orderdate', true, 'DD-MON-YYYY')</script>
  <input type="button" onClick="alert(this.form.orderdate.value)" value="Show date value passed">-->


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