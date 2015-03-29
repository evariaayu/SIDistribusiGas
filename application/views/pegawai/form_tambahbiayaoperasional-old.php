<div class="col-sm-offset-3 col-md-7 ">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h3 class="panel-title"><b><center>Form Tambah Biaya Operasional</center></b></h3>
  </div>
  <div class="panel-body">
<form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_operasional/do_upload" enctype="multipart/form-data" multiple="true">
<?php echo $success;?>
  <div class="form-group">
    <!--pam-->
    <label for="pengeluaranPAM" class="col-sm-3 control-label">PAM</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="pengeluaranPAM" name="pengeluaranPAM" placeholder="pam" required>
    </div>
  </div>
  <!-- input file pam-->
  <div class="form-group">
    <label for="filePAM" class="col-sm-3 control-label">File PAM</label>
    <div class="col-sm-6">
      <input type="file" name="filePAM">
      
    </div>
  </div>


  <!---pln-->
  <div class="form-group">
    <label for="pengeluaranPLN" class="col-sm-3 control-label">PLN</label>
    <div class="col-sm-6">
      <input id="pengeluaranPLN" name="pengeluaranPLN" class="form-control" placeholder="pln" required></input>
    </div>
  </div>
   <!-- input file pln-->
  <div class="form-group">
    <label for="filePLN" class="col-sm-3 control-label">File PLN</label>
    <div class="col-sm-6">
      <input type="file" name="filePLN">
      
    </div>
  </div>
  
  <!---internet-->
  <div class="form-group">
    <label for="pengeluaranInternet" class="col-sm-3 control-label">Internet</label>
    <div class="col-sm-6">
      <input id="pengeluaranInternet" name="pengeluaranInternet" class="form-control" placeholder="Internet" required></input>
    </div>
  </div>
   <!-- input file pln-->
  <div class="form-group">
    <label for="fileInternet" class="col-sm-3 control-label">File Internet</label>
    <div class="col-sm-6">
      <input type="file" name="fileInternet">
     
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
      <button type="submit" class="btn btn-default">Simpan</button>
      <input class="btn btn-danger" type="reset" value="Cancel"><br>
    </div>
  </div>
  
</form>

</div>
</div>
</div>
