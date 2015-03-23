<h1><center>Kelola Biaya Operasional</center></h1>
<br>

<div class="col-md-2">
  </div>
  <div class="col-xs-1"></div>
    <button type="button" class="btn btn-default btn-md btn-link">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
  <?php echo anchor ('index.php/kelola_operasional/form_tambahbiayaoperasional','Data Biaya Operasional') ?>
</button>
  <button type="button" class="btn btn-default btn-md btn-link">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
    <?php echo anchor ('index.php/kelola_operasional/form_tambahbiayalain','Data Biaya Lain - Lain') ?>
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
<div class="col-md-8 col-md-offset-2">
<table class="table table-striped table-hover table-bordered">
   
      <?php if(empty($hasil)) {
  echo "Data Biaya Operasional masih kosong";
}

  else { ?>
   <thead>
      <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Pengeluaran PLN</th>
        <th>File PLN</th>
        <th>Pengeluaran PAM</th>
        <th>File PAM</th>
        <th>Pengeluaran Internet</th>
        <th>File Internet</th>
        <th>Nama Pegawai</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($hasil as $datatukarbarang) {?>
      <tr>
        <td><?php echo $datatukarbarang->idPengeluaran_Tetap ?></td>
        <td><?php echo $datatukarbarang->tanggal ?></td>
        <td><?php echo $datatukarbarang->pengeluaranPLN?></td>
       <td><?php echo img('uploads/'.$datatukarbarang->namafolder.'/'.$datatukarbarang->filePLN)?></td>
        <td><?php echo $datatukarbarang->pengeluaranPAM ?></td>
       <td><?php echo img('uploads/'.$datatukarbarang->namafolder.'/'.$datatukarbarang->filePAM) ?></td>
        <td><?php echo $datatukarbarang->pengeluaranInternet?></td>
      <td><?php echo img('uploads/'.$datatukarbarang->namafolder.'/'.$datatukarbarang->fileInternet) ?></td>
        <td><?php echo $datatukarbarang->namapegawai ?></td>

      
        <td>
          <button type="button" class="btn btn-danger btn-link">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/kelola_operasional/delete/<?php echo $datatukarbarang->idPengeluaran_Tetap;?>">delete</a> 
        </button>
        </td>
        <td>
          <button type="button" class="btn btn-default btn-link">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/kelola_operasional/edit/<?php echo $datatukarbarang->idPengeluaran_Tetap;?>">edit</a>
          </button>
        </td>
       <?php } ?>
       <?php } ?>
      </tr>
    </tbody>
  </table>
 <!-- <?php echo img('uploads/2015-03-22 133704/S__14549003.jpg') ?>-->
  </div><!-- col-md-6 col-sm-offset-2-->