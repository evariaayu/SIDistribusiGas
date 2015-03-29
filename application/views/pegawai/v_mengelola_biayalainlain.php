<div class="col-sm-offset-3 col-md-7 ">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h3 class="panel-title"><b><center>Kelola Biaya Lain-lain</center></b></h3>
  </div>
  <div class="panel-body">
  <button type="button" class="btn btn-default btn-md btn-link">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
    <?php echo anchor ('index.php/kelola_operasional/form_tambahbiayalain','Data Biaya Lain - Lain') ?>
  </button>
    <?php echo $success;?>
</div>
<table class="table table-striped table-hover table-bordered">
   <?php $i=0; ?>
      <?php if(empty($hasil)) {?>
   <div class="alert alert-warning" role="alert">Data biaya lain-lain masih kosong</div>
<?php } 
   else { ?>
   <thead>
      <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>File Barang</th>
        <th></th>
      
      </tr>
    </thead>
    <tbody>
      <?php foreach ($hasil as $datalainlain) {?>
      
      <tr>
        <td><?php echo $datalainlain->idCost_lainlain ?></td>
        <td><?php echo $datalainlain->tanggal ?></td>
        <td><?php echo $datalainlain->namabarang ?></td>
        <td><?php echo $datalainlain->harga ?></td>

<td>
  <?php $i++ ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#<?php echo $i ?>">
Nota
</button>

<!-- Modal -->
<div class="modal fade" id="<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <?php $image_properties = array(
          'src' => 'uploads/lainlain/'.$datalainlain->namafolder.'/'.$datalainlain->filebarang,
          
          'class' => 'img-responsive'
          
);

    ?>
  <?php echo img($image_properties) ?>

      </div>
      <div class="modal-footer">
        <?php echo $datalainlain->filebarang ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>


</td>      
        <td>
          <button type="button" class="btn btn-danger btn-link">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/kelola_operasional/deletelain/<?php echo $datalainlain->idCost_lainlain;?>">delete</a> 
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
</div>