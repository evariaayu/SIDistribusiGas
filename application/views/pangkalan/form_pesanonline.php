
<h3><center>Form Pemesanan Gas</center></h1>
<br>
<div class="col-md-3">
</div>

<div class="col-md-6">
  <?php echo $success;?>
<form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/c_pesanonline/pesan">
  

<!--  <?php echo form_dropdown('pangkalan',$hasil,''); ?> -->
<div class="form-group">
    <label for="pangkalan" class="col-sm-2 control-label">Nama Pangkalan</label>
    <div class="col-sm-5">
        <input id="username" name="username" class="form-control" value="<?php echo $hasil[0]['username'] ?>" readonly>
    </div>
  </div>
<div class="form-group">
    <label for="pangkalan" class="col-sm-2 control-label">ID Pangkalan</label>
    <div class="col-sm-3">
        <input id="idPangkalan" name="idPangkalan" class="form-control" value="<?php echo $hasil[0]['idPangkalan'] ?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <!--jumlah barang rusak-->
    <label for="hargagas" class="col-sm-2 control-label">Harga/1 gas</label>
    <div class="col-sm-5">
      <input id="harga" name="harga" class="form-control" value="<?php echo $harga[0]['hargajual'] ?>" readonly>
    </div>
  </div>

  <!---jumlah barang kosong -->
  <div class="form-group">
    <label for="jumlahGas" class="col-sm-2 control-label">Jumlah Order</label>
    <div class="col-sm-10">
      <input id="jumlahGas" name="jumlahGas" class="form-control" placeholder=" "></input>
    </div>
  </div>

 
<!--<script>DateInput('orderdate', true, 'DD-MON-YYYY')</script>
<input type="button" onClick="alert(this.form.orderdate.value)" value="Show date value passed">-->


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="submit" value="Submit">
      
     
    </div>
  </div>

</form>
</div>