
<div class="col-md-8 col-sm-offset-2">
    <div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">
     <h1 class="panel-title"><b><center>Kelola Pegawai</center></b></h1>
    </div>
    <div class="panel-body">
      <?php echo $success;?>
      <button type="button" class="btn btn-default btn-md btn-link">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
        <?php echo anchor ('index.php/kelola_pegawai/form_tambahdata','Data Pegawai') ?>
      </button>
    </div>
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th>ID Pegawai</th>
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
      <?php if(empty($hasil)) {?>
      <div class="alert alert-warning" role="alert">Data pegawai masih kosong</div>
      <?php } 
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
        <td>
          <button type="button" class="btn btn-danger btn-link">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/kelola_pegawai/edit/<?php echo $datapegawai->idPegawai; ?>">edit</a>
          </button>
        </td>
       <?php } ?>
       <?php } ?>
      </tr>
    </tbody>
  </table>
  <?php echo $this->pagination->create_links(); ?>
  </div><!-- col-md-6 col-sm-offset-2-->

</div> <!-- div class row-->