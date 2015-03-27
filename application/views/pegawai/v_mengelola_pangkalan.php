<h1><center>Kelola Data Pangkalan</center></h1>
<br>

<script>
  editdata= function(idPangkalan){
    $.ajax({
                url: "<?php base_url(); ?>kelola_pangkalan/editdata/"+idPangkalan,
                dataType: "json",
                success: function(results) {
                    $('#hapusmodal').modal('show');
                    $('#namapangkalan').val(results.namapangkalan);
                    $('#alamatpangkalan').val(results.alamatpangkalan);

                    $('#idPangkalan').val(results.idPangkalan);
                }
            });
  }
  $(document).ready(function(){
    $("#hapus").click(function(e){
        $.ajax({
          url: '<?php  echo site_url() ?>index.php/kelola_pangkalan/deletedata',
          type: 'GET',
          data: {
            "idPangkalan": $("#idPangkalan").val()
          },
          dataType: 'html',
          success:function(results){
            console.log(results)
          }
        })
    })
  })

 </script>


<div class="col-md-2">
  </div>
  <div class="col-xs-1"></div>
    <button type="button" class="btn btn-default btn-md btn-link">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
  <?php echo anchor ('index.php/kelola_pangkalan/form_tambahdata','Data Pangkalan') ?>
</button>
<br>
<br>
<?php echo $success;?>

  <div class="col-md-6 col-sm-offset-3">
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th>ID Pangkalan</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php if(empty($hasil)) {
  echo "Data Pangkalan masih kosong";
}
  else { ?>
      <?php foreach ($hasil as $datapangkalan) {?>
      <tr>
        <td><?php echo $datapangkalan->idPangkalan ?></td>
        <td><?php echo $datapangkalan->namapangkalan ?></td>
        <td><?php echo $datapangkalan->alamatpangkalan ?></td>
       
        <td>
          <button type="button" class="btn btn-danger btn-link">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/kelola_pangkalan/delete/<?php echo $datapangkalan->idPangkalan;?>">delete</a> 
        </button>
        </td>
  <!--      <td>
   <button id="" class="btn btn-primary btn-xs" onClick="editdata(<?php echo $datapangkalan->idPangkalan; ?>)" data-toggle="modal" data-target="hapusmodal">Hapus</button>
        </td>-->




        <td>
          <button type="button" class="btn btn-default btn-link">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          <a href="<?php echo base_url();?>index.php/kelola_pangkalan/edit/<?php echo $datapangkalan->idPangkalan; ?>">edit</a>
          </button>
        </td>
       <?php } ?>
       <?php } ?>
      </tr>
    </tbody>
  </table>
  <?php echo $this->pagination->create_links(); ?>
  </div><!-- col-md-6 col-sm-offset-2-->

<!-- form edit -->


      <div class="modal fade " id="hapusmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Data Pangkalan</h4>
          </div>
          
          <div class="modal-body">
            Apakah anda yakin menghapus data ini?
             <br>
            
           </div>
           <!-- <form class="form-horizontal" method="POST" action="#" > -->
           <div class="form-group">
              <label for="idPangkalan" class="col-sm-2 control-label">ID Pangkalan</label>
              <div class="col-sm-6">
                <input class="form-control" id="idPangkalan" name="idPangkalan"  disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="namapangkalan" class="col-sm-2 control-label">Nama Pangkalan</label>
              <div class="col-sm-6">
                <input class="form-control" id="namapangkalan" name="namapangkalan"  disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="alamatpangkalan" class="col-sm-2 control-label">Alamat Pangkalan</label>
                <div class="col-sm-6">
                  <input class="form-control" id="alamatpangkalan" name="alamatpangkalan"  disabled>
              </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <input type="submit" id="hapus"class="btn btn-primary" value="Hapus"></input>
            </div>
          <!-- </form> -->
          </div>
        </div>
      </div>

