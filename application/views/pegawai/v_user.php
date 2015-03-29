<div class="col-sm-offset-3 col-md-6 ">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h3 class="panel-title"><b><center>Form Tambah Data Pengguna</center></b></h3>
  </div>
  <div class="panel-body">
<form class="form-horizontal"  method="POST"  onSubmit="return validate()" action="<?php echo base_url() ?>index.php/kelola_user/insert">
  <div class="form-group">
    <label for="username" class="col-sm-3 control-label">Username</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-3 control-label">Password</label>
    <div class="col-sm-7">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group">
    <label for="cpassword" class="col-sm-3 control-label">Confirm Password</label>
    <div class="col-sm-7">
      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group">
    <label for="hakakses" class="col-sm-3 control-label">Hak Akses</label>
    <div class="col-sm-7">
      <input type="radio" name="hakakses" id="hakakses" value="pegawai" > Pegawai <br>
      <input type="radio" name="hakakses" id="hakakses" value="pangkalan" > Pangkalan <br>
    </div>
  </div>

  <div class="form-group">
    <label for="idPegawai" class="col-sm-3 control-label">Pegawai</label>
    <div class="col-sm-7">
      <select class="form-control" name="idPegawai" id="idPegawai">
        <option value=NULL>--- Pilih Pegawai ----</option>
     <?php foreach ($hasil2 as $row) {?>
        
         <option value="<?php echo $row->idPegawai ?>" required> <?php echo $row->namapegawai ?> </option>
    
         <?php } ?>
        </select>
    </div>
  </div>

  <div class="form-group">
    <label for="idPangkalan" class="col-sm-3 control-label">Pangkalan</label>
    <div class="col-sm-7">
      <select class="form-control" name="idPangkalan" id="idPangkalan">
        <option value=NULL>--- Pilih Pangkalan ----</option>
     <?php foreach ($hasil3 as $row) {?>
        
         <option value="<?php echo $row->idPangkalan ?>" required> <?php echo $row->namapangkalan ?> </option>
    
         <?php } ?>
        </select>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Simpan</button>
    </div>
  </div>
</form>
</div>
</div>
</div>
<script>

function validate()
  {
    if(document.getElementById("password").value!=document.getElementById("cpassword").value) 
    {
      alert("Passwords do no match");
      return document.getElementById("password").value==document.getElementById("cpassword").value;
      return false;
    }
    //else if(document.getElementById("password").value!=document.getElementById("cpassword").value) alert("Akun berhasil dibuat");
  }
</script>