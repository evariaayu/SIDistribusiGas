<h1><center>Kelola Pemasukan Gas</center></h1>
<br>

<div class="col-md-2">
  </div>
  <div class="col-xs-1"></div>
    <form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/c_cekpesanonline">
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
<div class="col-md-8 col-sm-offset-2">

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
      <?php
      foreach ($hasil->result() as $row)
        { ?>
      <tr>
        <td><?php echo $row->idTransaksi_Online ?></td>
        <td><?php echo $row->namapangkalan ?></td>
        <td><?php echo $row->tanggalTransaksiOnline ?></td>
        <td><?php echo $row->jumlahGas ?></td>
       <td><?php echo $row->totalhargabeli ?></td>
       <td>
        <?php if($row->idstatus_pemesanan == 1) { ?>
        <form method="post" action="<?php echo base_url();?>index.php/c_cekpesanonline/update">
        <input type="hidden" name="idTransaksi" value="<?php echo htmlspecialchars($row->idTransaksi_Online); ?>">
        <input type="hidden" name="jumlahGas" value="<?php echo htmlspecialchars($row->jumlahGas); ?>">
        <input type="submit" value="konfirmasi" name="konfirmasi">
        </form>
          <?php } else { ?>
          CONFIRMED
          <?php } ?>
        </td>
       

      </tr>
      <?php } ?>
    </tbody>
  </table>
  </div><!-- col-md-6 col-sm-offset-2-->
</div> <!-- div class row-->
