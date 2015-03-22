<h3><center>Laporan Transaksi Gas</center></h3>
<div class="col-md-3">
</div>

<div class="col-md-6">
            <div class="jumbotron">
              <div class="col-sm-6">
            <span class="input-group-btn">
              <?php 
              $session_data=$this->session->userdata('logged_in'); 
              ?>

                    <a href="<?php echo base_url();?>index.php/report_transaksigas/transaksi_gas_online/<?php echo $session_data['tahun'] ?>">
                    <button class="btn btn-default btn-lg btn-block" type="button">
                        Report Transaksi Online</button></a>
                  </span>
                </div>
          <div class="col-sm-6">
            <span class="input-group-btn">
              <a href="<?php echo base_url();?>index.php/report_transaksigas/transaksi_gas_offline/">
                    <button class="btn btn-default btn-lg btn-block" type="button">
                      Report Transaksi Offline</button></a>
                  </span>
                </div>
                <br>
              </div>
              </div>
