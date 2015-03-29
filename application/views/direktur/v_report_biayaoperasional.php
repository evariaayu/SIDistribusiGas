<h3><center>Laporan Pengeluaran Biaya Operasional</center></h1>
<div class="col-md-1">
</div>

<div class="col-md-10">
            <div class="row">
                      <div class="col-md-2">
                        
                  <label>Bulan:</label> 
                 <select class="form-control form-inline" id="bulanOpt" name="bulan">
                    <option disabled selected>Bulan</option>
                      <option value="1" <?php if($bulan==1) echo "selected";?>>Januari</option>
                      <option value="2" <?php if($bulan==2) echo "selected";?>>Februari</option>
                      <option value="3" <?php if($bulan==3) echo "selected";?>>Maret</option>
                      <option value="4" <?php if($bulan==4) echo "selected";?>>April</option>
                      <option value="5" <?php if($bulan==5) echo "selected";?>>Mei</option>
                      <option value="6" <?php if($bulan==6) echo "selected";?>>Juni</option>
                      <option value="7" <?php if($bulan==7) echo "selected";?>>Juli</option>
                      <option value="8" <?php if($bulan==8) echo "selected";?>>Agustus</option>
                      <option value="9" <?php if($bulan==9) echo "selected";?>>September</option>
                      <option value="10" <?php if($bulan==10) echo "selected";?>>Oktober</option>
                      <option value="11" <?php if($bulan==11) echo "selected";?>>November</option>
                      <option value="12" <?php if($bulan==12) echo "selected";?>>Desember</option>

                  </select>
                  </div> 

                  <div class="col-md-2">

                  <label>Tahun:</label> 
                  <select class="form-control form-inline" id="tahunOpt" name="tahun">
                      <option disabled selected>Tahun</option>
                      <?php  for ($i=$tahun-3; $i <$tahun ; $i++) { ?> 
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php } ?>  
                      
                   <option value="<?php echo $tahun; ?>" selected><?php echo $tahun; ?></option>
                      <?php  for ($i=$tahun+1; $i <$tahun+3; $i++) { ?> 
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php } ?>
                  </select> 
                  </div> 
                   
                </div>
                <br/>

            <div class="jumbotron">
                <!-- <form class="form-horizontal" method="POST" action="<?php echo base_url() ?>kelolatempatkp/"> -->
                    <fieldset>
                        <!--<legend><center>Laporan Transaksi Gas Online</center></legend>-->
                    <!-- Button trigger modal -->
                    <legend><center>Laporan Pengeluaran Tetap</center></legend>
                    
                        <table class="table table-striped table-hover ">
                              <thead>
                                <tr>
                               
                                  <th style="min-width: 50px;">No</th>
                                  <th style="min-width: 50px;">Pegawai</th>
                                  <th>Tanggal</th>
                                  <th>Pengeluaran PLN</th>
                                  <th>Pengeluaran PAM</th>
                                  <th>Pengeluaran Internet</th>
                                  <th>Total</th>
                                </tr>
                              </thead>
                               <tbody>
                              <?php if(empty($hasil)) { ?>
                              <div class="alert alert-warning" role="alert">Data Laporan Tetap Perbulan masih kosong</div>
                              <?php } 
                               else { ?>

                                <?php $nomor = 1; ?>
                                
                                <?php foreach ($hasil as $biayaoperasional) {?>
                                
                                  <tr>
                                  <td><?php echo $nomor ?></td>
                                  <td><?php echo $biayaoperasional->namapegawai ?></td>
                                  <td><?php echo $biayaoperasional->tanggal ?></td>
                                  <td><?php echo $biayaoperasional->pengeluaranPLN ?></td>
                                  <td><?php echo $biayaoperasional->pengeluaranPAM ?></td>
                                  <td><?php echo $biayaoperasional->pengeluaranInternet ?></td>
                                  <td><?php echo $biayaoperasional->total ?></td>
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
            
                    
                <!-- </form> -->
    
            <div class="jumbotron">
                <!-- <form class="form-horizontal" method="POST" action="<?php echo base_url() ?>kelolatempatkp/"> -->
                    <fieldset>
                      <legend><center>Laporan Pengeluaran Lain-lain</center></legend>
                        <!--<legend><center>Laporan Transaksi Gas Online</center></legend>-->
                    <!-- Button trigger modal -->
                    
                

                        <table class="table table-striped table-hover ">
                              <thead>
                                <tr>
                               
                                  <th style="min-width: 50px;">No</th>
                                  <th>Tanggal</th>
                                  <th style="min-width: 150px;">Uraian</th>
                                  <th>Harga</th>
                                 
                                </tr>
                              </thead>
                               <tbody>
                              <?php if(empty($hasilbiaya)) { ?>
                              <div class="alert alert-warning" role="alert">Data Biaya Lain-lain masih kosong</div>
                              <?php } 
                              else { ?>

                                <?php $nomor = 1; ?>
                                
                                <?php foreach ($hasilbiaya as $biayaoperasional) {?>
                                
                                  <tr>
                                  <td><?php echo $nomor ?></td>
                                  <td><?php echo $biayaoperasional->tanggal ?></td>
                                  <td><?php echo $biayaoperasional->namabarang ?></td>
                                  <td><?php echo $biayaoperasional->harga ?></td>
                                  
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

  $('#excelPemDownload').click(function(){
    window.location="<?php echo site_url(); ?>index.php/report/printout_report_lahan_excel/"+$('#tahunOpt').val();
  })
  function changeDataPem()
  {
    
    window.location="<?php echo site_url() ?>index.php/report_biayaoperasional/biaya_operasional/"+$('#bulanOpt').val()+"/"+$('#tahunOpt').val();
    
    
  }
  $('#tahunOpt').change(function(){
    
    changeDataPem()
  });
  $('#bulanOpt').change(function(){
    
    changeDataPem()
  });
  




});
  
</script>

 