<div class="col-md-6 col-sm-offset-3">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h3 class="panel-title"><b><center>Form Tambah Biaya Lain-lain</center></b></h3>
  </div>
  <div class="panel-body">
<form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_operasional/do_uploadlain" enctype="multipart/form-data">
<?php echo $success;?>
<!--- lainnya -->
  <div class="form-group">
    <label for="namabarang" class="col-sm-2 control-label">Nama Barang</label>
    <div class="col-sm-6">
      <input id="namabarang" name="namabarang" class="form-control" placeholder="Nama Barang" ></input>
    </div>
  </div>

<!--- harga -->
  <div class="form-group">
    <label for="harga" class="col-sm-2 control-label">Harga</label>
    <div class="col-sm-6">
      <input id="harga" name="harga" class="form-control" placeholder="Harga" required></input>
    </div>
  </div>

  <!---Lampirkan File -->
 <div class="form-group">
    <label for="filebarang" class="col-sm-2 control-label">File Barang</label>
    <div class="col-sm-6">
      <input type="file" name="filebarang">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Simpan</button>
      <input class="btn btn-danger" type="reset" value="Cancel"><br>
    </div>
  </div>
    </div>


  
</form>

</div>
</div>
</div>