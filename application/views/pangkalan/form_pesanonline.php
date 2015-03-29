<div class="col-md-offset-3 col-md-7 ">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h3 class="panel-title"><b><center>Form Pemesanan Gas</center></b></h3>
  </div>
  <div class="panel-body">

<form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/c_pesanonline/pesan">
  
  <?php echo $success;?>
<!--  <?php echo form_dropdown('pangkalan',$hasil,''); ?> -->
<div class="form-group">
    <label for="pangkalan" class="col-sm-3 control-label">Nama Pangkalan</label>
    <div class="col-sm-7">
        <div class="well well-sm">
        <?php echo $hasil[0]['username'] ?>
      </div>
        <input type="hidden" id="username" name="username" class="form-control" value="<?php echo $hasil[0]['username'] ?>" readonly>
    </div>
  </div>
<div class="form-group">
    <label for="pangkalan" class="col-sm-3 control-label">ID Pangkalan</label>
    <div class="col-sm-7">
      <div class="well well-sm">
        <?php echo $hasil[0]['idPangkalan'] ?>
      </div>
        <input type="hidden" id="idPangkalan" name="idPangkalan" class="form-control" value="<?php echo $hasil[0]['idPangkalan'] ?>" readonly>
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