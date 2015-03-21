<h3><center>Laporan Biaya Operasional</center></h1>
<div class="col-md-1">
</div>

<div class="col-md-10">
            <div class="jumbotron">
                <!-- <form class="form-horizontal" method="POST" action="<?php echo base_url() ?>kelolatempatkp/"> -->
                    <fieldset>
                        <!--<legend><center>Laporan Transaksi Gas Online</center></legend>-->
                    <!-- Button trigger modal -->

                      
                    
                    <div class="row">
                  <div class="col-md-2">

                  <!--<label>Tahun:</label> 
                  <select class="form-control form-inline" id="tahunOpt" name="tahun">
                      <option disabled selected>Tahun</option>
                      <?php  for ($i=$tahun-3; $i <$tahun ; $i++) { ?> 
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php } ?>  
                      
                   <option value="<?php echo $tahun; ?>" selected><?php echo $tahun; ?></option>
                      <?php  for ($i=$tahun+1; $i <$tahun+3; $i++) { ?> 
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php } ?>
                  </select> -->
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
                              echo "Data transaksi gas masih kosong";
                              }
                              else { ?>

                                <?php $nomor = 1; ?>
                                
                                <?php foreach ($hasil as $transaksigasonline) {?>
                                <?php if ($transaksigasonline->metode == 1) { ?>
                                  <tr>
                                  <td><?php echo $nomor ?></td>
                                  <td><?php echo $transaksigasonline->tanggalTransaksiOnline ?></td>
                                  <td><?php echo $transaksigasonline->idPangkalan ?></td>
                                  <td><?php echo $transaksigasonline->jumlahGas ?></td>
                                  <!--<td><?php echo $transaksigasonline->tanggalpembelian ?></td>-->
                                  <td><?php echo $transaksigasonline->totalhargabeli ?></td>
                                  
                             <?php $nomor++; } ?>
                             <?php } ?>
                             <?php } ?>
                            </tr>
                          </tbody>
                          </table> 

                          <table class="table table-striped ">
                                        <thead>
                                            <tr>
                                                <th>Total :</th>
                                                <td><?php if(empty($hasil)) {
                                                echo "Data transaksi gas masih kosong";
                                                }
                                                else { ?>
                                                    <tr>
                                                    <td><?php echo $nomor-1?></td>
                                               
                                               <?php } ?></td>
                                                              </tr>
                                                          </thead>
                          </table>

                              
                       <!-- <div class="form-group">
                              <div class="col-lg-10 col-lg-offset-1">
                                 <ul class="pager">
                                 <li><a href="#">Previous</a></li>
                                 <li><a href="#">Next</a></li>
                              </ul>
                            </div> -->
                       </fieldset>

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

  
  function changeDataPem()
  {
    
    window.location="<?php echo site_url() ?>report/report_lahan/"+$('#tahunOpt').val();
    
  }
  $('#tahunOpt').change(function(){
    
    changeDataPem()
  });
  



});
  
</script>

 