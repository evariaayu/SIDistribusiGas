<h3><center>Form Tambah Biaya Operasional</center></h1>
<br>
<div class="col-md-3">
</div>

<div class="col-md-6">
<form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_operasional/do_uploadlain">

<!--- lainnya -->
  <div class="form-group">
    <label for="namabarang" class="col-sm-2 control-label">Nama Barang</label>
    <div class="col-sm-10">
      <input id="namabarang" name="namabarang" class="form-control" placeholder="Nama Barang" ></input>
    </div>
  </div>

<!--- harga -->
  <div class="form-group">
    <label for="harga" class="col-sm-2 control-label">Harga</label>
    <div class="col-sm-10">
      <input id="harga" name="harga" class="form-control" placeholder="Harga" required></input>
    </div>
  </div>

  <!---Lampirkan File -->
  <div class="form-group">
    <label for="file" class="col-sm-2 control-label">Lampiran Nota</label>
    <div class="col-sm-10">
      <input type="file" id="file" name="file" >
      <p class="help-block">file max. 2mb</p>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Simpan</button>
    </div>
  </div>
  
</form>
</div>