<h1><center>Pemesanan Online</center></h1>
<br>

<div class="col-md-2">
  </div>
  <div class="col-xs-1"></div>
    <button type="button" class="btn btn-default btn-md btn-link">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
  <?php echo anchor ('index.php/c_pesanonline/insert','Data Pesanan Gas') ?>
</button>
<br>
<br>
<?php echo $success;?>


<br>
<div class="col-md-1">
  </div>

  <div class="col-md-6 col-sm-offset-2">
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th>ID Transaksi</th>
        <th>Nama Pangkalan</th>
        <th>Tanggal Transaksi</th>
        <th>Jumlah Gas</th>
        <th>Total Harga</th>
        <th>Status</th>
       
      </tr>
    </thead>
    <tbody>
       <?php if(empty($hasil)) {?>
   <div class="alert alert-warning" role="alert">Riwayat pemesanan gas masih kosong</div>
<?php } 
else { ?>
      <?php foreach ($hasil as $datapangkalan)
        { ?>
      <tr>
        <td><?php echo $datapangkalan->idTransaksi_Online ?></td>
        <td><?php echo $datapangkalan->namapangkalan ?></td>
        <td><?php echo $datapangkalan->tanggalTransaksiOnline ?></td>
        <td><?php echo $datapangkalan->jumlahGas ?></td>
       <td><?php echo $datapangkalan->totalhargabeli ?></td>
       <td><?php echo $datapangkalan->namastatus ?></td>
      </tr>
      <?php } ?>
      <?php } ?>
      
    </tbody>
  </table>
    <?php echo $this->pagination->create_links(); ?>
  </div><!-- col-md-6 col-sm-offset-2-->


