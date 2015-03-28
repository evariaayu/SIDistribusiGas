<h3><center>Form Edit Penukaran Barang</center></h1>
<br>

<div class="col-md-3">
</div>

<div class="col-md-6">
<form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_datagudang/update/<?php echo $hasil[0]->idTransaksi_Online ?>">
  <?php echo $success;?>
 <div class="form-group">
    <!--jumlah barang rusak-->
    <label for="stokgudang" class="col-sm-2 control-label">Stok Gudang</label>
    <div class="col-sm-10">
      <div class="col-md-8 col-sm-offset-2">
   <?php if(empty($stok_gudang)) {
  echo "Data Penukaran Gudang masih kosong";
}
  else { ?>
    
       
       <div class="well well-sm"><?php echo $stok_gudang ?></div>
      <?php } ?>
    </div>
  </div>
  <!--jumlah barang rusak-->
  <div class="form-group">
    <label for="jumlahGas" class="col-sm-2 control-label">Jumlah Gas</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="jumlahGas" name="jumlahGas" value="<?php echo $hasil[0]->jumlahGas ?>" disabled>
    </div>
  </div>
  
  <div class="form-group">
    <label for="idstatus_pemesanan" class="col-sm-2 control-label">Status Pemesanan</label>
    <div class="col-sm-10">
      <select class="form-control" name="idstatus_pemesanan" id="idstatus_pemesanan">
        <option value="0">--- Pilih Status Pemesanan ----</option>
     <?php foreach ($hasil as $row) {?>
        
         <option value="<?php echo $row->idstatus_pemesanan ?>"> <?php echo $row->namastatus ?> </option>
    
         <?php } ?>
        </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default" value="submit"></button>
    </div>
  </div>
</form>
</div>