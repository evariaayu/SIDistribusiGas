<div class="col-md-offset-3 col-md-7 ">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h3 class="panel-title"><b><center>Pemesanan Online</center></b></h3>
  </div>
  <div class="panel-body">
    <button type="button" class="btn btn-default btn-md btn-link">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
  <?php echo anchor ('index.php/c_pesanonline/insert','Data Pesanan Gas') ?>
</button>
<?php echo $success;?>
</div>
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th>ID Transaksi</th>
        <th>Nama Pangkalan</th>
        <th>Tanggal Transaksi</th>
        <th>Jumlah Gas</th>
        <th>Total Harga</th>
        <th>Status</th>
       <th></th>
       <th></th>
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
       
        <?php if ($datapangkalan->namastatus =="waiting") {  ?>
        <td>
          <button type="button" class="btn btn-primary btn-link">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            <a href="<?php echo base_url();?>index.php/c_pesanonline/edit/<?php echo $datapangkalan->idTransaksi_Online;?>">Edit</a> 
          </button>
        </td>
        <td>
          <button type="button" class="btn btn-danger btn-link">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            <a href="<?php echo base_url();?>index.php/c_pesanonline/delete/<?php echo $datapangkalan->idTransaksi_Online;?>">Delete</a> 
          </button>
        </td>
        <?php } else { ?>
        <td></td>
        <td></td>
       <?php } ?>
       
      </tr>
      <?php } ?>
      <?php } ?>
     </tbody>
  </table>
    <?php echo $this->pagination->create_links(); ?>
  </div><!-- col-md-6 col-sm-offset-2-->


</div>