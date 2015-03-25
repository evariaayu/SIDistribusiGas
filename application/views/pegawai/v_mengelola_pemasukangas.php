<h1><center>Kelola Pemasukan Gas</center></h1>
<br>

<div class="col-md-2">
  </div>
  <div class="col-xs-1"></div>
    <button type="button" class="btn btn-default btn-md btn-link">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
  <?php echo anchor ('index.php/kelola_pemasukangas/form_tambahgas','Data Pemasukan Gas') ?>
</button>
<br>
<br>
<?php echo $success;?>


<br>
<div class="col-md-8 col-sm-offset-2">
  Data Gudang 
   <?php if(empty($stok_gudang)) {?>
  <div class="alert alert-warning" role="alert">Masih kosong, refresh untuk menambahkan data gudang</div>
 <?php }
  else { ?>
       <div class="well well-sm"><?php echo $stok_gudang ?></div>
      <?php } ?>

  <div class="col-md-6 col-sm-offset-2">
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th>ID Pemasukan</th>
        <th>Jumlah Gas</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Tanggal Pembelian</th>
        <th>Nama Pegawai</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php if(empty($hasil)) {
  echo "Data Pemasukan Gas masih kosong";
}
  else { ?>
      <?php foreach ($hasil as $datapemasukangas) {?>
      <tr>
        <td><?php echo $datapemasukangas->idPemasukan ?></td>
        <td><?php echo $datapemasukangas->jumlahgas ?></td>
        <td><?php echo $datapemasukangas->hargabeli ?></td>
       <td><?php echo $datapemasukangas->hargajual ?></td>
       <td><?php echo $datapemasukangas->tanggalpembelian ?></td>
       <td><?php echo $datapemasukangas->namapegawai ?></td>
        <td>
          <button type="button" class="btn btn-danger btn-link">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/Kelola_pemasukangas/delete/<?php echo $datapemasukangas->idPemasukan;?>">delete</a> 
        </button>
        </td>
        <td>
          <button type="button" class="btn btn-default btn-link">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/Kelola_pemasukangas/edit/<?php echo $datapemasukangas->idPemasukan;?>">edit</a>
          </button>
        </td>
       <?php } ?>
       <?php } ?>
      </tr>
    </tbody>
  </table>
    <?php echo $this->pagination->create_links(); ?>
  </div><!-- col-md-6 col-sm-offset-2-->


