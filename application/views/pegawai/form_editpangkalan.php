<h3><center>Form Edit Data Pangkalan</center></h1>
  <br>
  <div class="col-md-3">
  </div>

  <div class="col-md-6">
    <form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_pangkalan/edit/<?php echo $hasil[0]->idPangkalan; ?>">
      
      <div class="form-group">
        <!--Nama Pangkalan-->
        <label for="namapangkalan" class="col-sm-2 control-label">Nama Pangkalan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="namapangkalan" name="namapangkalan" value="<?php echo $hasil[0]->namapangkalan ?>" required>
        </div>
      </div>

      <!---alamat pangkalan -->
      <div class="form-group">
        <label for="alamatpangkalan" class="col-sm-2 control-label">Alamat Pangkalan</label>
        <div class="col-sm-10">
          <input id="alamatpangkalan" name="alamatpangkalan" class="form-control" value="<?php echo $hasil[0]->alamatpangkalan ?>" required></input>
        </div>
      </div>
      

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" class="btn btn-default" value="submit"></button>
        </div>
      </div>
    </form>
  </div>