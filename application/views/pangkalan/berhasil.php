
<h3><center>Form Pembelian Gas</center></h1>
<br>
<div class="col-md-3">
</div>
<div class="col-md-6">
  <form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/c_pesanonline/cek_ketersediaan">
  <div class="form-group">
    <label class="col-sm-2 control-label">Waktu</label>
      <div class="col-sm-10">
        <input readonly id="waktu" name="waktu" class="form-control" value="<?php echo (new \DateTime())->format('d-M-Y H:i:s'); ?>">
      </div>
  </div>
  <div class="form-group">
    <label for="pangkalan" class="col-sm-2 control-label">Nama Pangkalan</label>
    <div class="col-sm-5">
      <select class="form-control" name="idPangkalan" id="idPangkalan">
        <option value="0">--- Pilih Pangkalan ----</option>
     <?php 
     foreach ($hasil as $row) {?>
        
         <option value="<?php echo $row->idPangkalan ?>"> <?php echo $row->namapangkalan ?> </option>
    
         <?php } ?>
        </select>
    </div>
  </div>
  <div class="form-group">
    <!--jumlah barang rusak-->
    <label for="hargagas" class="col-sm-2 control-label">Harga/1 gas</label>
    <div class="col-sm-10">
      <input id="harga" name="harga" class="form-control" value="<?php echo $harga[0]['hargajual'] ?>" readonly>
    </div>
  </div>

</div>
</form>
</div>