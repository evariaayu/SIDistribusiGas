<h3><center>Form Tambah Data Pengguna</center></h1>
<br>
<div class="col-md-3">
</div>

<div class="col-md-6">
<form class="form-horizontal"  method="POST"  onSubmit="return validate()" action="<?php echo base_url() ?>index.php/kelola_user/insert">
  <div class="form-group">
    <label for="username" class="col-sm-3 control-label">Username</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-3 control-label">Password</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group">
    <label for="cpassword" class="col-sm-3 control-label">Confirm Password</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group">
    <label for="hakakses" class="col-sm-3 control-label">Hak Akses</label>
    <div class="col-sm-2">
      <input type="radio" name="hakakses" id="hakakses" value="pegawai" > Pegawai <br>
      <input type="radio" name="hakakses" id="hakakses" value="pangkalan" > Pangkalan <br>
    </div>
  </div>

  <div class="form-group">
    <label for="idPegawai" class="col-sm-3 control-label">Pegawai</label>
    <div class="col-sm-3">
      <select class="form-control" name="idPegawai" id="idPegawai">
        <option value="0">--- Pilih Pegawai ----</option>
     <?php foreach ($hasil2 as $row) {?>
        
         <option value="<?php echo $row->idPegawai ?>"> <?php echo $row->namapegawai ?> </option>
    
         <?php } ?>
        </select>
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

<script>

function validate()
  {
    if(document.getElementById("password").value!=document.getElementById("cpassword").value) 
      alert("Passwords do no match");
    return document.getElementById("password").value==document.getElementById("cpassword").value;
    else alert("Akun berhasil dibuat");
  }
</script>