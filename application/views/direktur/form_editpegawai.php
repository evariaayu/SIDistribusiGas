<div class="col-md-8 col-sm-offset-2">
  <div class="panel panel-primary">
<!-- Default panel contents -->
  <div class="panel-heading">
    <h1 class="panel-title"><b><center>Form Edit Pegawai</center></b></h1>
  </div>
  <div class="panel-body">
  <?php echo $success; ?>
    <form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_pegawai/update/<?php echo $hasil[0]->idPegawai; ?>">
      
      <div class="form-group">
        <label for="namapegawai" class="col-sm-3 control-label">Nama Pegawai</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="namapegawai" name="namapegawai" value="<?php echo $hasil[0]->namapegawai ?>" required>
        </div>
      </div>
      <div class="form-group">
        <label for="alamatpegawai" class="col-sm-3 control-label">Alamat</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="alamatpegawai" name="alamatpegawai" value="<?php echo $hasil[0]->alamatpegawai ?>" required>
        </div>
      </div>
      <div class="form-group">
        <label for="jk" class="col-sm-3 control-label">Jenis Kelamin</label>
        <div class="col-sm-2">
          <input type="text" id="jk" name="jk" class="form-control" value="<?php echo $hasil[0]->jk ?>" required>
        </div>
      </div>
      <div class="form-group">
        <label for="notelepon" class="col-sm-3 control-label">Nomor Telepon</label>
        <div class="col-sm-3">
          <input type="text" id="notelepon" name="notelepon" class="form-control" value="<?php echo $hasil[0]->notelepon ?>" required>
        </div>
      </div>
      <div class="form-group">
        <label for="idKeterangan_jabatan" class="col-sm-3 control-label">Jabatan</label>
        <div class="col-sm-3">
          <input type="radio" name="idKeterangan_jabatan" id="idKeterangan_jabatan" value="2" checked> Pegawai <br>
          <input type="radio" name="idKeterangan_jabatan" id="idKeterangan_jabatan" value="3" > Supir <br>
        </div>
      </div>
      

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" class="btn btn-primary" value="Submit"></button>
          <input class="btn btn-danger" type="reset" value="Cancel"><br>
        </div>
      </div>
    </form>
  </div>
</div>
</div>