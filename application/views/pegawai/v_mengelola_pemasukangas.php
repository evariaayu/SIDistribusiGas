<div class="col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h3 class="panel-title"><b><center>Kelola Pemasukan Gas</center></b></h3>
  </div>
  <div class="panel-body">
    <?php echo $success;?>
      <button type="button" class="btn btn-default btn-md btn-link">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
        <?php echo anchor ('index.php/kelola_pemasukangas/form_tambahgas','Data Pemasukan Gas') ?>
      </button>
      <div class="form-group">
          <label for="datagudang" class="col-sm-2 control-label">Jumlah Stok</label>
          <div class="col-sm-2">
            <?php if(empty($stok_gudang)) {?>
              <div class="alert alert-warning" role="alert">Masih kosong, refresh untuk menambahkan data gudang </div>
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
        <?php if(empty($hasil)) {?>
          <div class="alert alert-warning" role="alert">Data pemasukan gas masih kosong</div>
        <?php } 
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
            <a href="<?php echo base_url();?>index.php/kelola_pemasukangas/delete/<?php echo $datapemasukangas->idPemasukan;?>">delete</a> 
          </button>
          </td>
          <td>
            <button type="button" class="btn btn-default btn-link">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            <a href="<?php echo base_url();?>index.php/kelola_pemasukangas/edit/<?php echo $datapemasukangas->idPemasukan;?>">edit</a>
            </button>
          </td>
         <?php } ?>
         <?php } ?>
        </tr>
      </tbody>
    </table>
    <?php echo $this->pagination->create_links(); ?>
  </div>
    
  
  

 
</div><!-- col-md-6 col-sm-offset-2-->


