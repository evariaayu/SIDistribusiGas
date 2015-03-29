<div class="col-md-10 col-sm-offset-1">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h3 class="panel-title"><b><center>Pemesanan Gas Online</center></b></h3>
  </div>
  <div class="panel-body">
  <!--  <?php echo $success; ?>-->
  </div>
    <form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/c_cekpesanonline">
       <?php echo $success;?>
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
        <!--
        <form method="POST" action="<?php echo base_url();?>index.php/c_cekpesanonline/update">
          <input type="hidden" name="idTransaksi_Online" value="<?php echo $row->idTransaksi_Online; ?>">
          <input type="hidden" name="jumlahGas" value="<?php echo $row->jumlahGas; ?>">
          <input type="submit" value="konfirmasi" name="konfirmasi">
        </form>-->
        <button type="button" class="btn btn-danger btn-link">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/c_cekpesanonline/editbaru/<?php echo $row->idTransaksi_Online;?>">Konfirmasi</a> 
        </button>
          <?php } else { ?>
          CONFIRMED
          <?php } ?>
        </td>

         <td>
          <button type="button" class="btn btn-danger btn-link">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/c_cekpesanonline/delete/<?php echo $row->idTransaksi_Online;?>">delete</a> 
        </button>
        </td>
       <!--
        <td>
          <button type="button" class="btn btn-danger btn-link">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/c_cekpesanonline/editbaru/<?php echo $row->idTransaksi_Online;?>">Konfirmasi</a> 
        </button>
        </td>-->

      </tr>
      <?php } ?>
    </tbody>
  </table>
  </div><!-- col-md-6 col-sm-offset-2-->
</div> <!-- div class row-->
</div>
</div>