

  <h3><center>Form Tambah Data Pegawai</center></h1>
<br>
<div class="col-md-3">
</div>

<div class="col-md-6">
<form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_pegawai/update/<?php echo $hasil[0]->idPegawai ?>">
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
      
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Simpan</button>
    </div>
  </div>
</form>
</div>