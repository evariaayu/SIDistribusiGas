<h3><center>Laporan Transaksi Gas</center></h3>
<div class="col-md-3">
</div>

<div class="col-md-6">
                <div class="jumbotron">
                <!--<form class="form-horizontal" method="POST" action="<?php echo base_url() ?>report_transaksigas/"> -->
                    <fieldset>
                        <legend><center>Laporan Transaksi Gas Offline</center></legend>
                    <!-- Button trigger modal -->

                   <div class="row">

                    <div class="col-sm-1">
                      <h5><label>Tahun:</label></h5>
                    </div>
                    <div class="col-sm-3">
                    
                  
                  <select class="form-control form-inline" id="tahunOpt" name="tahun">
                      <option disabled selected>Tahun</option>
                      <?php  for ($i=$tahun-3; $i <$tahun ; $i++) { ?> 
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php } ?>  
                      
                   <option value="<?php echo $tahun; ?>" selected><?php echo $tahun; ?></option>
                      <?php  for ($i=$tahun+1; $i <$tahun+2; $i++) { ?> 
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php } ?>
                      <option value="all" <?php if (isset($all)) echo 'selected'?> >All</option>
                  </select>

                </div>

                     <div class=" col-sm-offset-10">
                        <a href="<?php echo base_url();?>index.php/report_transaksigas/">
                  <button class="btn btn-default">Back</button></a>
                </div>
              </div>
                        <table class="table table-striped table-hover ">
                              <thead>
                                <tr>
                                
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>Pangkalan</th>
                                  <th>Jumlah Tabung</th>
                                  <th>Total</th>
                                </tr>
                              </thead>
                               <tbody>
                              <?php if(empty($hasil)) {
                              echo "";
                              }
                              else { ?>

                                <?php $nomorOff = 1 ?>

                                <?php foreach ($hasil as $transaksigasoffline) {?>
                                 
                                  <tr>
                                  <td><?php echo $nomorOff ?></td>
                                  <td><?php echo $transaksigasoffline->tanggalTransaksiOffline ?></td>
                                  <td><?php echo $transaksigasoffline->namapangkalan ?></td>
                                  <td><?php echo $transaksigasoffline->jumlahGas ?></td>
                                  <!--<td><?php echo $transaksigasonline->tanggalpembelian ?></td>-->
                                  <td><?php echo $transaksigasoffline->totalhargabelioff ?></td>
                                  
                             <?php $nomorOff++;  ?>
                             <?php } ?>
                             <?php } ?>
                            </tr>
                          </tbody>
                            </table> 
                              <label>Total :</label>
                                                 
                                                    <?php if(empty($hasil)) {
                                                  echo "";
                                                  }
                                                  else { ?>
                                                      
                                                      <?php echo $nomorOff-1?>
                                                 
                                                 <?php } ?>


                       <!-- <div class="form-group">
                              <div class="col-lg-10 col-lg-offset-1">
                                 <ul class="pager">
                                 <li><a href="#">Previous</a></li>
                                 <li><a href="#">Next</a></li>
                              </ul>
                            </div> -->
                        
                    </fieldset>
                    </div>
                  </div>
                <!-- </form> -->
            </div>
                    
                <!-- </form> -->
            </div>
<script type="text/javascript">

$(document).ready(function(){
  $('#lahanAll').DataTable( {
      "scrollX": true,
      "scrollY": "400px"
  });     

  $('#excelPemDownload').click(function(){
    window.location="<?php echo site_url(); ?>index.php/report/printout_report_lahan_excel/"+$('#tahunOpt').val();
  })
  function changeDataPem()
  {
    
    window.location="<?php echo site_url() ?>index.php/report_transaksigas/transaksi_gas_offline/"+$('#tahunOpt').val();
    
  }
  $('#tahunOpt').change(function(){
    
    changeDataPem()
  });
  




});
  
</script>
 