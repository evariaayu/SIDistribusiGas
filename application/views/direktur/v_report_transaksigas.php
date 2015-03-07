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
                               
                             <?php foreach ($records as $row) {?>
                             <?php echo '<tr>'?>

                            <?php echo'<td>', $row->IDOrganisasi, '</td>'?>
                            <?php echo '<td>',$row->NamaOrganisasi, '</td>' ?>
                            <?php echo '<td>',$row->LamaKP, '</td>' ?>
                            <?php echo '<td>',$row->DeskripsiOrganisasi, '</td>' ?>
                             <?php echo '<td>',$row->IsBlacklist, '</td>' ?>


                            <!-- tombol edit -->
                          
                           <!--<td><button id="" class="btn btn-primary btn-xs" onClick="edit(<?php echo $row->IDOrganisasi; ?>)" data-toggle="modal" data-target="editmodal">Edit</button></td>

                              <div> -->

                                <!-- tombol delete -->
                            <!-- <td><a class="btn btn-primary btn-xs" href="<?php echo base_url();?>kelolatempatkp/delete/<?php echo $row->IDOrganisasi; ?>" id="<?php $row->IDOrganisasi ?>">Delete</a></td> -->
                            <?php } ?>
                            <?php echo '<tr>'?>
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
                               
                             <?php foreach ($records as $row) {?>
                             <?php echo '<tr>'?>

                            <?php echo'<td>', $row->IDOrganisasi, '</td>'?>
                            <?php echo '<td>',$row->NamaOrganisasi, '</td>' ?>
                            <?php echo '<td>',$row->LamaKP, '</td>' ?>
                            <?php echo '<td>',$row->DeskripsiOrganisasi, '</td>' ?>
                             <?php echo '<td>',$row->IsBlacklist, '</td>' ?>


                            <!-- tombol edit -->
                          
                           <!--<td><button id="" class="btn btn-primary btn-xs" onClick="edit(<?php echo $row->IDOrganisasi; ?>)" data-toggle="modal" data-target="editmodal">Edit</button></td>

                              <div> -->

                                <!-- tombol delete -->
                            <!-- <td><a class="btn btn-primary btn-xs" href="<?php echo base_url();?>kelolatempatkp/delete/<?php echo $row->IDOrganisasi; ?>" id="<?php $row->IDOrganisasi ?>">Delete</a></td> -->
                            <?php } ?>
                            <?php echo '<tr>'?>
                              </tbody>
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

 