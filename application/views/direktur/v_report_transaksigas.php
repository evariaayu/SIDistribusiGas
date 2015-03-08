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
                                  <td><?php echo $transaksigasonline->idTransaksi ?></td>
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
                    <div class="form-group">
                      
            
                        <div class="col-lg-4 form-group">
                        <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                        Create New
                         </a>
                        
                        </div>

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
                              echo "Data Pemasukan Gas masih kosong";
                              }
                              else { ?>
                                <?php foreach ($hasil as $datapemasukangas) {?>
                                  <tr>
                                  <td><?php echo $datapemasukangas->idPemasukan ?></td>
                                  <td><?php echo $datapemasukangas->jumlahgas ?></td>
                                  <td><?php echo $datapemasukangas->hargabeli ?></td>
                                  <td><?php echo $datapemasukangas->hargajual ?></td>
                          <td><?php echo $datapemasukangas->tanggalpembelian ?></td>
                          <td><?php echo $datapemasukangas->namapegawai ?></td>
                          
       <?php } ?>
       <?php } ?>
      </tr>
    </tbody>
  </table>
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

 