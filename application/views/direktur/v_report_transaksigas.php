<h3><center>Laporan Transaksi Gas</center></h1>
<div class="col-md-3">
</div>

<div class="col-md-6">
            <div class="jumbotron">
                <!-- <form class="form-horizontal" method="POST" action="<?php echo base_url() ?>kelolatempatkp/"> -->
                    <fieldset>
                        <legend><center>Laporan Transaksi Gas Online</center></legend>
                    <!-- Button trigger modal -->
                    <div class="form-group">
                      
              <!-- Modal -->

                      </div>

                        <table class="table table-striped table-hover ">
                              <thead>
                                <tr>
                                
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>Pangkalan</th>
                                  <th>Jumlah Tabung</th>
                                  <th>Harga</th>
                                  <th>Total</th>
                                 
                                </tr>
                              </thead>
                               <tbody>
                              <?php if(empty($hasil)) {
                              echo "Data transaksi gas masih kosong";
                              }
                              else { ?>
                                <?php foreach ($hasil as $transaksigasonline) {?>
                                  <tr>
                                  <td><?php echo $transaksigasonline->idTransaksi_Online ?></td>
                                  <td><?php echo $transaksigasonline->tanggalTransaksiOnline ?></td>
                                  <td><?php echo $transaksigasonline->idPangkalan ?></td>
                                  <td><?php echo $transaksigasonline->jumlahGas ?></td>
                                  <td><?php echo $transaksigasonline->tanggalpembelian ?></td>
                                  <td><?php echo $transaksigasonline->totalhargabeli ?></td>
                                  
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
                                                  <?php foreach ($hasil as $transaksigasonline) {?>
                                                    <tr>
                                                    <td><?php echo $transaksigasonline->idTransaksi_Online ?></td>
                                               <?php } ?>
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


                         <div class="jumbotron">
                <!--<form class="form-horizontal" method="POST" action="<?php echo base_url() ?>report_transaksigas/"> -->
                    <fieldset>
                        <legend><center>Laporan Transaksi Gas Offline</center></legend>
                    <!-- Button trigger modal -->

                        <table class="table table-striped table-hover ">
                              <thead>
                                <tr>
                                
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>Pangkalan</th>
                                  <th>Jumlah Tabung</th>
                                  <th>Harga</th>
                                  <th>Total</th>
                                 
                                </tr>
                              </thead>
                              <tbody>
                              <?php if(empty($hasil)) {
                              echo "Data transaksi gas masih kosong";
                              }
                              else { ?>
                                <?php foreach ($hasil as $transaksigasonline) {?>
                                  <tr>
                                  <td><?php echo $transaksigasonline->idTransaksi_Offline ?></td>
                                  <td><?php echo $transaksigasonline->tanggalTransaksiOffline ?></td>
                                  <td><?php echo $transaksigasonline->idPangkalan ?></td>
                                  <td><?php echo $transaksigasonline->jumlahGas ?></td>
                                  <td><?php echo $transaksigasonline->tanggalpembelian ?></td>
                                  <td><?php echo $transaksigasonline->totalhargabeli ?></td>
                                  
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
                                                  <?php foreach ($hasil as $transaksigasoffline) {?>
                                                    <tr>
                                                    <td><?php echo $transaksigasoffline->idTransaksi_Offline ?></td>
                                               <?php } ?>
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
                        </div>
                    </fieldset>
                <!-- </form> -->
            </div>
                    
                <!-- </form> -->
            </div>

 