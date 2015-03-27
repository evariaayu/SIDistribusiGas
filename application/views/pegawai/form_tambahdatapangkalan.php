<h3><center>Form Tambah Data Pangkalan</center></h1>
<br>
<?php echo $success ?>
<div class="col-md-3">
</div>

<div class="col-md-6">
<form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_pangkalan/insert">
  <div class="form-group">
    <label for="namapangkalan" class="col-sm-2 control-label">Nama Pangkalan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namapangkalan" name="namapangkalan" placeholder="Nama Pangkalan" required>
    </div>
  </div>
  <div class="form-group">
    <label for="alamatpangkalan" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-10">
      <textarea id="alamatpangkalan" name="alamatpangkalan" class="form-control" rows="3" placeholder="Alamat Pangkalan"></textarea>
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