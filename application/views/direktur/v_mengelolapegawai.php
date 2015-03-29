<div class="col-md-offset-2 col-md-8 ">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h3 class="panel-title"><b><center>Kelola Data Pegawai</center></b></h3>
  </div>
  <div class="panel-body">
    <button type="button" class="btn btn-default btn-md btn-link">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
  <?php echo anchor ('index.php/kelola_pegawai/form_tambahdata','Data Pegawai') ?>
</button>
</body>
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>JK</th>
        <th>No. Telpon</th>
        <th>Jabatan</th>
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
        <td><?php if ($datapegawai->idKeterangan_jabatan == 1) {echo "Direktur";} 
                  elseif ($datapegawai->idKeterangan_jabatan == 2) { echo "Pegawai";} 
                  else echo "Supir"; ?>
        </td>


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
</div>
