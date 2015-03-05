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
  </div><!-- col-md-6 col-sm-offset-2-->
</div> <!-- div class row-->
