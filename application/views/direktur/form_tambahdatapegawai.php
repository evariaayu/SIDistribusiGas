<div class="col-md-8 col-sm-offset-2">
  <div class="panel panel-primary">
<!-- Default panel contents -->
  <div class="panel-heading">
    <h1 class="panel-title"><b><center>Form Pegawai</center></b></h1>
  </div>
  <div class="panel-body">
      <?php echo $success ?>
      <form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_pegawai/insert">
        <div class="form-group">
        <label for="namapegawai" class="col-sm-3 control-label">Nama Pegawai</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="namapegawai" name="namapegawai" placeholder="Nama Pegawai" required>
        </div>
      </div>
      <div class="form-group">
        <label for="alamatpegawai" class="col-sm-3 control-label">Alamat</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="alamatpegawai" name="alamatpegawai" placeholder="Alamat Pegawai" required>
        </div>
      </div>
      <div class="form-group">
        <label for="jk" class="col-sm-3 control-label">Jenis Kelamin</label>
        <div class="col-sm-2">
          <input type="text" id="jk" name="jk" class="form-control" placeholder="(L/P)" required>
        </div>
      </div>
      <div class="form-group">
        <label for="notelepon" class="col-sm-3 control-label">Nomor Telepon</label>
        <div class="col-sm-3">
          <input type="text" id="notelepon" name="notelepon" class="form-control" placeholder="Nomor Telepon" required>
        </div>
      </div>
      <div class="form-group">
        <label for="idKeterangan_jabatan" class="col-sm-3 control-label">Jabatan</label>
        <div class="col-sm-3">
          <input type="radio" name="idKeterangan_jabatan" id="idKeterangan_jabatan" value="2" > Pegawai <br>
          <input type="radio" name="idKeterangan_jabatan" id="idKeterangan_jabatan" value="3" > Supir <br>
        </div>
      </div>
        
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-8">
            <input type="submit" class="btn btn-primary"></button>
            <input class="btn btn-danger" type="reset" value="Cancel"><br>
          </div>
        </div>
      </form>
    </div> <!--panel-->
</div><!--col-md-6-->