<h3><center>Form Pemesan Gas Online</center></h1>
<br>
<div class="col-md-3">
</div>

<div class="col-md-6">
<form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/kelola_pangkalan/insert">
  <div class="form-group">
    <label for="tanggalpesan" class="col-sm-2 control-label">Tanggal Pesan</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" placeholder="<?php echo (new \DateTime())->format('d-M-Y H:i:s');?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="namapangkalan" class="col-sm-2 control-label">Nama Pangkalan</label>
    <select class="form-control">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="hargajualgas" class="col-sm-2 control-label">Harga/1 Gas</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="hargajualgas" name="hargajualgas" required>
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