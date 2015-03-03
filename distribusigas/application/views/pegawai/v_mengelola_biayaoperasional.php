<h1><center>Kelola Biaya Operasional</center></h1>
<br>

<div class="col-md-2">
  </div>
  <div class="col-xs-1"></div>
    <button type="button" class="btn btn-default btn-md btn-link">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
  <?php echo anchor ('index.php/kelola_pangkalan/form_tambahdata','Data Pangkalan') ?>
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
        <th>ID Pangkalan</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php if(empty($hasil)) {
  echo "Data Pangkalan masih kosong";
}
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
        </td>
        <td>
          <button type="button" class="btn btn-default btn-link">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/kelola_pangkalan/edit/<?php echo $datapangkalan->idPangkalan;?>">edit</a>
          </button>
        </td>
       <?php } ?>
       <?php } ?>
      </tr>
    </tbody>
  </table>
  </div><!-- col-md-6 col-sm-offset-2-->
</div> <!-- div class row-->
