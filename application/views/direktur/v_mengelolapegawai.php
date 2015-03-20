<h1><center>Kelola Data Pegawai</center></h1>
<br>

<div class="col-md-2">
  </div>
  <div class="col-xs-1"></div>
    <button type="button" class="btn btn-default btn-md btn-link">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
  <?php echo anchor ('index.php/kelola_pegawai/form_tambahdata','Data Pegawai') ?>
</button>
<br>
<br>

<div class="row">

<div class="col-xs-2 col-md-offset-6">
    <div class="input-group">
      <input type="text" class="form-control">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Search</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
<br>
<br>
<br>


  <div class="col-md-6 col-sm-offset-3">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>JK</th>
        <th>No. Telpon</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php if(empty($hasil)) {
  echo "Data Pegawai masih kosong";
}
  else { ?>
      <?php foreach ($hasil as $datapegawai) {?>
      <tr>
        <td><?php echo $datapegawai->idPegawai ?></td>
        <td><?php echo $datapegawai->namapegawai ?></td>
        <td><?php echo $datapegawai->alamatpegawai ?></td>
        <td><?php echo $datapegawai->jk ?></td>
        <td><?php echo $datapegawai->notelepon ?></td>

        <td>
          <button type="button" class="btn btn-danger btn-link">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/kelola_pegawai/delete/<?php echo $datapegawai->idPegawai;?>">delete</a> 
        </button>
        </td>
        <td>
          <button type="button" class="btn btn-default btn-link">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/kelola_pegawai/edit/<?php echo $datapegawai->idPegawai;?>">edit</a>
          </button>
        </td>
       <?php } ?>
       <?php } ?>
      </tr>
    </tbody>
  </table>
  </div><!-- col-md-6 col-sm-offset-2-->
</div> <!-- div class row-->
