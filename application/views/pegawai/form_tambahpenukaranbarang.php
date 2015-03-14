
<h3><center>Form Penukarang Barang</center></h1>
<br>
<div class="col-md-3">
</div>

<div class="col-md-6">
<form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_datagudang/insert">

  <div class="form-group">
    <label for="idPangkalan" class="col-sm-2 control-label">Pangkalan</label>
    <div class="col-sm-10">
      <select class="form-control" name="idPangkalan" id="idPangkalan">
        <option value="0">--- Pilih Pangkalan ----</option>
     <?php foreach ($hasil as $row) {?>
        
         <option value="<?php echo $row->idPangkalan ?>"> <?php echo $row->namapangkalan ?> </option>
    
         <?php } ?>
        </select>
    </div>
  </div>

<!--  <?php echo form_dropdown('pangkalan',$hasil,''); ?> -->

  <div class="form-group">
    <!--jumlah barang rusak-->
    <label for="jumlahbarangrusak" class="col-sm-2 control-label">Jumlah Barang Rusak</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="jumlahbarangrusak" name="jumlahbarangrusak" placeholder="Jumlah barang rusak">
    </div>
  </div>

  <!---jumlah barang kosong -->
  <div class="form-group">
    <label for="jumlahbarangkosong" class="col-sm-2 control-label">Jumlah Barang Kosong</label>
    <div class="col-sm-10">
      <input id="jumlahbarangkosong" name="jumlahbarangkosong" class="form-control" placeholder="Jumlah barang kosong"></input>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Simpan</button>
    </div>
  </div>
</form>
</div>