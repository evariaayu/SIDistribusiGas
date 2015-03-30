<div class="col-md-10 col-md-offset-1">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h3 class="panel-title"><b><center>Pesan Offline Gas</center></b></h3>
  </div>
  <div class="panel-body">
    <?php echo $success;?>
      <button type="button" class="btn btn-default btn-md btn-link">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
        <?php echo anchor ('index.php/c_pesanoffline/insert','Pesan Gas') ?>
      </button>
      <div class="form-group">
        <label for="datagudang" class="col-sm-2 control-label">Jumlah Stok</label>
        <div class="col-sm-2">
          <?php if(empty($stok_gudang)) {?>
          <div class="alert alert-warning" role="alert">Masih kosong, refresh untuk menambahkan data gudang</div>
          <?php }
          else { ?>
          <div class="well well-sm"><?php echo $stok_gudang ?></div>
          <?php } ?>
        </div>
      </div>
    </div>
    <table class="table table-striped table-hover table-bordered">
     <thead>
      <tr>
        <th>ID Transaksi</th>
        <th>Tanggal</th>
        <th>Jumlah Gas</th>
        <th>Total</th>
        <th>Pangkalan</th>
        <th>Pegawai</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php if(empty($hasil)) {?>
    <div class="alert alert-warning" role="alert">Riwayat pemesanan gas masih kosong</div>
      <?php }
      else { ?>
        <?php foreach ($hasil as $datanamapangkalan) {?>
       <tr>
        <td><?php echo $datanamapangkalan->idTransaksi_Offline ?></td>
        <td><?php echo $datanamapangkalan->tanggalTransaksiOffline ?></td>
        <td><?php echo $datanamapangkalan->jumlahGas ?></td>
        <td><?php echo $datanamapangkalan->totalhargabelioff ?></td>
        <td><?php echo $datanamapangkalan->namapangkalan ?></td>
        <td><?php echo $datanamapangkalan->namapegawai ?></td>
        <td>
            <button type="button" class="btn btn-danger btn-link">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            <a href="<?php echo base_url();?>index.php/c_pesanoffline/delete/<?php echo $datanamapangkalan->idTransaksi_Offline;?>">delete</a> 
          </button>
          </td>
          <td>
            <button type="button" class="btn btn-default btn-link">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            <a href="<?php echo base_url();?>index.php/c_pesanoffline/edit/<?php echo $datanamapangkalan->idTransaksi_Offline;?>">edit</a>
            </button>
          </td>
      </tr>
         <?php } ?>
         <?php } ?>
        </tr>
    </tbody>
  </table>
  <?php echo $this->pagination->create_links(); ?>
  </div><!-- col-md-6 col-sm-offset-2-->
</div>
