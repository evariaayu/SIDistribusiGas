<div class="col-md-6 col-sm-offset-3">
    <div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">
     <h1 class="panel-title"><b><center>Kelola Pangkalan</center></b></h1>
    </div>
    <div class="panel-body">
      <?php echo $success;?>
      <button type="button" class="btn btn-default btn-md btn-link">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
        <?php echo anchor ('index.php/kelola_pangkalan/form_tambahdata','Data Pangkalan') ?>
      </button>
    </div>
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th>ID Pangkalan</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php if(empty($hasil)) {?>
      <div class="alert alert-warning" role="alert">Data pangkalan masih kosong</div>
      <?php } 
   else { ?>
      <?php foreach ($hasil as $datapangkalan) {?>
      <tr>
        <td><?php echo $datapangkalan->idPangkalan ?></td>
        <td><?php echo $datapangkalan->namapangkalan ?></td>
        <td><?php echo $datapangkalan->alamatpangkalan ?></td>
       
        <td>
          <button type="button" class="btn btn-danger btn-link">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/kelola_pangkalan/delete/<?php echo $datapangkalan->idPangkalan;?>">delete</a> 
        </button>
        <td>
          <button type="button" class="btn btn-danger btn-link">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/kelola_pangkalan/edit/<?php echo $datapangkalan->idPangkalan; ?>">edit</a>
          </button>
        </td>
       <?php } ?>
       <?php } ?>
      </tr>
    </tbody>
  </table>
  <?php echo $this->pagination->create_links(); ?>
  </div><!-- col-md-6 col-sm-offset-2-->
</div>
