<h3><center>Laporan Transaksi Gas</center></h3>
<div class="col-md-3">
</div>

<div class="col-md-6">
                <div class="jumbotron">
                <!--<form class="form-horizontal" method="POST" action="<?php echo base_url() ?>report_transaksigas/"> -->
                    <fieldset>
                        <legend><center>Laporan Transaksi Gas Offline</center></legend>
                    <!-- Button trigger modal -->

                    
                  <div class=" col-sm-8 col-sm-offset-8">
                        <a href="<?php echo base_url();?>index.php/report_transaksigas/">
                  <button class="btn btn-default">Back</button></a>
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

                                <?php $nomorOff = 1 ?>

                                <?php foreach ($hasil as $transaksigasoffline) {?>
                                 <?php if ($transaksigasoffline->metode == 2) { ?>
                                  <tr>
                                  <td><?php echo $nomorOff ?></td>
                                  <td><?php echo $transaksigasoffline->tanggalTransaksiOffline ?></td>
                                  <td><?php echo $transaksigasoffline->idPangkalan ?></td>
                                  <td><?php echo $transaksigasoffline->jumlahGas ?></td>
                                  <!--<td><?php echo $transaksigasonline->tanggalpembelian ?></td>-->
                                  <td><?php echo $transaksigasoffline->totalhargabelioff ?></td>
                                  
                             <?php $nomorOff++; } ?>
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
                                                    <td><?php echo $nomorOff-1?></td>
                                               
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
                  </div>
                <!-- </form> -->
            </div>
                    
                <!-- </form> -->
            </div>

 