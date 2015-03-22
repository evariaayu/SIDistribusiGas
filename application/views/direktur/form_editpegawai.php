<h3><center>Form Edit Data Pegawai</center></h1>
  <br>
  <div class="col-md-3">
  </div>

  <div class="col-md-6">
    <form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_pegawai/update/<?php echo $hasil[0]->idPegawai; ?>">
      
      <div class="form-group">
        <!--Nama Pegawai-->
        <label for="namapegawai" class="col-sm-3 control-label">Nama Pegawai</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="namapegawai" name="namapegawai" value="<?php echo $hasil[0]->namapegawai ?>" required>
        </div>
      </div>

      <!---alamat pegawai -->
      <div class="form-group">
        <label for="alamatpegawai" class="col-sm-3 control-label">Alamat</label>
        <div class="col-sm-10">
          <input id="alamatpegawai" name="alamatpegawai" class="form-control" value="<?php echo $hasil[0]->alamatpegawai ?>" required></input>
        </div>
      </div>

      <!---jeniskelamin pegawai -->
      <div class="form-group">
        <label for="jk" class="col-sm-3 control-label">Jenis Kelamin</label>
        <div class="col-sm-10">
          <input id="jk" name="jk" class="form-control" value="<?php echo $hasil[0]->jk ?>" required></input>
        </div>
      </div>

      <!---nomer telepon pegawai -->
      <div class="form-group">
        <label for="notelepon" class="col-sm-3 control-label">Nomer Telepon</label>
        <div class="col-sm-10">
          <input id="notelepon" name="notelepon" class="form-control" value="<?php echo $hasil[0]->notelepon ?>" required></input>
        </div>
      </div>
      

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" class="btn btn-default" value="submit"></button>
        </div>
      </div>
    </form>
  </div>