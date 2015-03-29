<div class="col-md-8 col-sm-offset-2">
  <div class="panel panel-primary">
<!-- Default panel contents -->
  <div class="panel-heading">
    <h1 class="panel-title"><b><center>Form Edit Pangkalan</center></b></h1>
  </div>
  <div class="panel-body">
  <?php echo $success; ?>
    <form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_pangkalan/update/<?php echo $hasil[0]->idPangkalan; ?>">
      
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
          <input type="submit" class="btn btn-primary" value="Submit"></button>
          <input class="btn btn-danger" type="reset" value="Cancel"><br>
        </div>
      </div>
    </form>
  </div>
</div>
</div>