<h3><center>Form Tambah Biaya Operasional</center></h1>
<br>

<div class="col-xs-offset-1 col-md-5">
<form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_pemasukangas/insert">
  <div class="form-group">
    <label class="col-sm-2 control-label">Waktu</label>
    <div class="col-sm-10">
      <?php
        echo (new \DateTime())->format('d-M-Y H:i:s');?>
  
    </div>
      
  </div>

  <div class="form-group">
    <!--pam-->
    <label for="pam" class="col-sm-2 control-label">PAM</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pam" name="pam" placeholder="pam" required>
    </div>
  </div>
  <!-- input file pam-->
  <div class="form-group">
    <label for="filepam" class="col-sm-2 control-label">File PAM</label>
    <div class="col-sm-10">
      <input type="file" id="filepam">
      <p class="help-block">file max. 2mb</p>
    </div>
  </div>


  <!---pln-->
  <div class="form-group">
    <label for="pln" class="col-sm-2 control-label">PLN</label>
    <div class="col-sm-10">
      <input id="pln" name="pln" class="form-control" placeholder="pln" required></input>
    </div>
  </div>
   <!-- input file pln-->
  <div class="form-group">
    <label for="filepln" class="col-sm-2 control-label">File PLN</label>
    <div class="col-sm-10">
      <input type="file" id="filepln">
      <p class="help-block">file max. 2mb</p>
    </div>
  </div>
  
  <!---internet-->
  <div class="form-group">
    <label for="internet" class="col-sm-2 control-label">Internet</label>
    <div class="col-sm-10">
      <input id="internet" name="internet" class="form-control" placeholder="Internet" required></input>
    </div>
  </div>
   <!-- input file pln-->
  <div class="form-group">
    <label for="fileinternet" class="col-sm-2 control-label">File Internet</label>
    <div class="col-sm-10">
      <input type="file" id="fileinternet">
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