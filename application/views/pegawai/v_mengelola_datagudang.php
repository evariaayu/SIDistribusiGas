<div class="col-md-10 col-md-offset-1">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h3 class="panel-title"><b><center>Data Gudang</center></b></h3>
  </div>
  <div class="panel-body">
    <?php echo $success;?>
      <button type="button" class="btn btn-default btn-md btn-link">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
        <?php echo anchor ('index.php/kelola_datagudang/form_tambahpenukaranbarang','Penukaran Barang') ?>
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
        <th>ID Tukar Barang</th>
        <th>Nama Pangkalan</th>
        <th>Tanggal Tukar Barang</th>
        <th>Jumlah Barang Rusak</th>
        <th>Jumlah Barang Kosong</th>
        <th>Keterangan</th>
        <th>Nama Pegawai</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php if(empty($hasil)) {?>
        <div class="alert alert-warning" role="alert">Data Penukaran Gudang masih kosong</div>
        <?php }
      else { ?>
        <?php foreach ($hasil as $datatukarbarang) {?>
         
        <tr>
          <td><?php echo $datatukarbarang->idTukar_Barang ?></td>
          <td><?php echo $datatukarbarang->namapangkalan ?></td>
          <td><?php echo $datatukarbarang->tanggalTukarBarang ?></td>
          <td><?php echo $datatukarbarang->jumlahbarangrusak ?></td>
          <td><?php echo $datatukarbarang->jumlahbarangkosong ?></td>
          <td><?php echo $datatukarbarang->keterangan ?></td>
          <td><?php echo $datatukarbarang->namapegawai ?></td>
          <td>
            <button type="button" class="btn btn-danger btn-link">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            <a href="<?php echo base_url();?>index.php/kelola_datagudang/delete/<?php echo $datatukarbarang->idTukar_Barang;?>">delete</a> 
          </button>
          </td>
          <td>
            <button type="button" class="btn btn-default btn-link">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            <a href="<?php echo base_url();?>index.php/kelola_datagudang/edit/<?php echo $datatukarbarang->idTukar_Barang;?>">edit</a>
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
