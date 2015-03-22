<h3><center>Laporan Pengeluaran Biaya Operasional</center></h1>
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
                               
                                  <th style="min-width: 50px;">No</th>
                                  <th style="min-width: 50px;">Pegawai</th>
                                  <th>Tanggal</th>
                                  <th style="min-width: 150px;">Uraian</th>
                                  <th>Harga</th>
                                  <th>Total</th>
                                </tr>
                              </thead>
                               <tbody>
                              <?php if(empty($hasil)) {
                              echo "";
                              }
                              else { ?>

                                <?php $nomor = 1; ?>
                                
                                <?php foreach ($data as $biayaoperasional) {?>
                                print_r($data)
                                  <tr>
                                  <td><?php echo $nomor ?></td>
                                  <td><?php echo $biayaoperasional['namapegawai'] ?></td>
                                  <td><?php echo $biayaoperasional['tanggal'] ?></td>
                                  <td><?php echo "Pengeluaran Biaya PLN"."<br/>".
                                  "Pengeluaran Biaya PAM"."<br/>".
                                  "Pengeluaran Biaya Internet"."<br/>".
                                  "Pengeluaran lain-lain"."<br/>".
                                  $biayaoperasional['namabarang'] ?></td>
                                  <td><?php echo $biayaoperasional['pengeluaranPLN']."<br/>".
                                  $biayaoperasional['pengeluaranPAM']."<br/>".
                                  $biayaoperasional['pengeluaranInternet']."<br/>".
                                  "<br/>". $biayaoperasional['harga'] ?></td>
                                  <td><?php echo "..." ?></td>
                                  </tr>
                             <?php $nomor++; } ?>
                            
                             <?php } ?>
                            
                          </tbody>
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

 