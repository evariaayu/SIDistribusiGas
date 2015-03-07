<h3><center>Form Tambah Biaya Operasional</center></h1>
<br>
<div class="col-md-3">
</div>

<div class="col-md-6">
<form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_pemasukangas/insert">
  <div class="form-group">
    <label class="col-sm-2 control-label">Waktu</label>
    <div class="col-sm-10">
      <?php
echo (new \DateTime())->format('d-M-Y H:i:s');?>
  
    </div>
      
  </div>

  <div class="form-group">
    <!--jumlah gas-->
    <label for="jumlahgas" class="col-sm-2 control-label">Keterangan</label>
    <div class="col-sm-10">
      <select type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan" required>
        <option>PAM</option>
        <option>PLN</option>
        <option>Telkom</option>
        <option>Lainnya</option>
      </select>
    </div>
  </div>

  <!---Lampirkan File -->
  <div class="form-group">
    <label for="file" class="col-sm-2 control-label">Lampiran Nota</label>
    <div class="col-sm-10">
      <input type="file" id="file" name="file" required>
      <p class="help-block">file max. 2mb</p>
    </div>
  </div>

<!--  
<?php
$date = new DateTime();
echo $date->getTimestamp();
?>-->
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