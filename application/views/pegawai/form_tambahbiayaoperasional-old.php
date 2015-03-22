<h3><center>Form Tambah Biaya Operasional</center></h1>
<br>
<!--
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> <?php echo $error;?>
</div>-->

<div class="col-xs-offset-1 col-md-5">
<form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_operasional/do_upload" enctype="multipart/form-data" multiple="true">

  <div class="form-group">
    <!--pam-->
    <label for="pengeluaranPAM" class="col-sm-2 control-label">PAM</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pengeluaranPAM" name="pengeluaranPAM" placeholder="pam" required>
    </div>
  </div>
  <!-- input file pam-->
  <div class="form-group">
    <label for="filePAM" class="col-sm-2 control-label">File PAM</label>
    <div class="col-sm-10">
      <input type="file" name="filePAM">
      <p class="help-block">file max. 2mb</p>
    </div>
  </div>


  <!---pln-->
  <div class="form-group">
    <label for="pengeluaranPLN" class="col-sm-2 control-label">PLN</label>
    <div class="col-sm-10">
      <input id="pengeluaranPLN" name="pengeluaranPLN" class="form-control" placeholder="pln" required></input>
    </div>
  </div>
   <!-- input file pln-->
  <div class="form-group">
    <label for="filePLN" class="col-sm-2 control-label">File PLN</label>
    <div class="col-sm-10">
      <input type="file" name="filePLN">
      <p class="help-block">file max. 2mb</p>
    </div>
  </div>
  
  <!---internet-->
  <div class="form-group">
    <label for="pengeluaranInternet" class="col-sm-2 control-label">Internet</label>
    <div class="col-sm-10">
      <input id="pengeluaranInternet" name="pengeluaranInternet" class="form-control" placeholder="Internet" required></input>
    </div>
  </div>
   <!-- input file pln-->
  <div class="form-group">
    <label for="fileInternet" class="col-sm-2 control-label">File Internet</label>
    <div class="col-sm-10">
      <input type="file" name="fileInternet">
      <p class="help-block">file max. 2mb</p>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Simpan</button>
    </div>
  </div>
</form>
</div>