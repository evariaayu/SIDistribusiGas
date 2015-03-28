<div class="col-md-8 col-sm-offset-2">
  <div class="panel panel-primary">
<!-- Default panel contents -->
  <div class="panel-heading">
    <h1 class="panel-title"><b><center>Form Pangkalan</center></b></h1>
  </div>
  <div class="panel-body">
      <?php echo $success ?>
      <form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_pangkalan/insert">
        <div class="form-group">
          <label for="namapangkalan" class="col-sm-3 control-label">Nama Pangkalan</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="namapangkalan" name="namapangkalan" placeholder="Nama Pangkalan" required>
          </div>
        </div>
        <div class="form-group">
          <label for="alamatpangkalan" class="col-sm-3 control-label">Alamat</label>
          <div class="col-sm-8">
            <textarea id="alamatpangkalan" name="alamatpangkalan" class="form-control" rows="3" placeholder="Alamat Pangkalan"></textarea>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-8">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <input class="btn btn-danger" type="reset" value="Cancel"><br>
          </div>
        </div>
      </form>
    </div> <!--panel-->
</div><!--col-md-6-->