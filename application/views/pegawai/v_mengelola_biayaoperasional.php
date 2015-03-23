<h1><center>Kelola Biaya Operasional</center></h1>
<br>

<div class="col-md-2">
  </div>
  <div class="col-xs-1"></div>
    <button type="button" class="btn btn-default btn-md btn-link">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
  <?php echo anchor ('index.php/kelola_operasional/form_tambahbiayaoperasional','Data Biaya Operasional') ?>
</button>
  <button type="button" class="btn btn-default btn-md btn-link">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
    <?php echo anchor ('index.php/kelola_operasional/form_tambahbiayalain','Data Biaya Lain - Lain') ?>
  </button>
<br>
<br>


<br>
<br>
<div class="col-md-8 col-sm-offset-2">
<table class="table table-striped table-hover table-bordered">
   <?php $i=0; ?>
      <?php if(empty($hasil)) {
  echo "Data Biaya Operasional masih kosong";
}

  else { ?>
   <thead>
      <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Biaya PLN</th>
        <th>File PLN</th>
        <th>Biaya PAM</th>
        <th>File PAM</th>
        <th>Biaya Internet</th>
        <th>File Internet</th>
        <th>Nama Pegawai</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($hasil as $datatukarbarang) {?>
      
      <tr>
        <td><?php echo $datatukarbarang->idPengeluaran_Tetap ?></td>
        <td><?php echo $datatukarbarang->tanggal ?></td>
        <td><?php echo $datatukarbarang->pengeluaranPLN?></td>

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
          'src' => 'uploads/'.$datatukarbarang->namafolder.'/'.$datatukarbarang->filePLN,
          
          'class' => 'img-responsive'
          
);

    ?>
  <!-- <?php echo img('uploads/'.$datatukarbarang->namafolder.'/'.$datatukarbarang->filePLN)?>-->
  <?php echo img($image_properties) ?>

      </div>
      <div class="modal-footer">
        <?php echo $datatukarbarang->filePLN ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>


</td>






        <td><?php echo $datatukarbarang->pengeluaranPAM ?></td>
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
        <?php 
        $image_propertiespam = array(
          'src' => 'uploads/'.$datatukarbarang->namafolder.'/'.$datatukarbarang->filePAM,
          'class' => 'img-responsive'
);
         ?>
  <?php echo img($image_propertiespam) ?>

      </div>
      <div class="modal-footer">
        <?php echo $datatukarbarang->filePAM ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>






   </td>
        <td><?php echo $datatukarbarang->pengeluaranInternet?></td>

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
                <?php 
        $image_propertiesinternet = array(
          'src' => 'uploads/'.$datatukarbarang->namafolder.'/'.$datatukarbarang->fileInternet,
          'class' =>'img-responsive'
         );
         ?>
  <?php echo img($image_propertiesinternet) ?>

      </div>
      <div class="modal-footer">
        <?php echo $datatukarbarang->fileInternet ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>






   </td>
        <td><?php echo $datatukarbarang->namapegawai ?></td>

      
        <td>
          <button type="button" class="btn btn-danger btn-link">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/kelola_operasional/delete/<?php echo $datatukarbarang->idPengeluaran_Tetap;?>">delete</a> 
        </button>
        </td>
        <td>
          <button type="button" class="btn btn-default btn-link">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/kelola_operasional/edit/<?php echo $datatukarbarang->idPengeluaran_Tetap;?>">edit</a>
          </button>
        </td>
       <?php } ?>
       <?php } ?>
      </tr>
    </tbody>
  </table>



  </div><!-- col-md-6 col-sm-offset-2-->
