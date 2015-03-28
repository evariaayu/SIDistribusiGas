
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">PT. Almas</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php $session_data = $this->session->userdata('logged_in');
        if($session_data['hakakses']=="pegawai"){?>
        <li><a href="<?php echo base_url("index.php/kelola_pangkalan") ?>">Data Pangkalan</a></li>
        <li><a href="<?php echo base_url("index.php/kelola_pemasukangas") ?>">Pemasukan Gas</a></li>
        <li><a href="<?php echo base_url("index.php/kelola_datagudang") ?>">Data Gudang</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Biaya Operasional <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url("index.php/kelola_operasional") ?>">Pengeluaran Tetap</a></li>
            <li><a href="<?php echo base_url('index.php/kelola_operasional/pengeluaranlain') ?>">Pengeluaran Lain-lain</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pemesanan Gas<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url("index.php/c_cekpesanonline") ?>">Cek Pesanan Online</a></li>
            <li><a href="<?php echo base_url("index.php/c_pesanoffline") ?>">Pesan Gas Offline</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url("index.php/kelola_user") ?>">Pengguna</a></li>
        
        <?php } ?>

        <?php  $session_data = $this->session->userdata('logged_in');
        if($session_data['hakakses']=="direktur") {?>
           <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pegawai<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?php echo base_url("index.php/kelola_pangkalan") ?>">Data Pangkalan</a></li>
              <li><a href="<?php echo base_url("index.php/kelola_pemasukangas") ?>">Pemasukan Gas</a></li>
              <li><a href="<?php echo base_url("index.php/kelola_datagudang") ?>">Data Gudang</a></li>
              <li><a href="<?php echo base_url("index.php/c_cekpesanonline") ?>">Cek Pesanan Online</a></li>
              <li><a href="<?php echo base_url("index.php/c_pesanoffline") ?>">Pesan Gas Offline</a></li>
            </ul>
          </li>
          
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Biaya Operasional <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?php echo base_url("index.php/kelola_operasional") ?>">Pengeluaran Tetap</a></li>
              <li><a href="<?php echo base_url('index.php/kelola_operasional/pengeluaranlain') ?>">Pengeluaran Lain-lain</a></li>
            </ul>
          </li>
          
         
          <li><a href="<?php echo base_url("index.php/report_transaksigas") ?>">Report Transaksi Gas</a></li>
          <li><a href="<?php echo base_url();?>index.php/report_biayaoperasional/biaya_operasional/<?php echo $session_data['bulan'] ?>/<?php echo $session_data['tahun'] ?>">Report Biaya Operasional</a></li>
          <li><a href="<?php echo base_url("index.php/kelola_pegawai") ?>">Kelola Pegawai</a></li>

           <?php } ?>

        <?php  $session_data = $this->session->userdata('logged_in');
        if($session_data['hakakses']=="pangkalan") {?>
        <li><a href="<?php echo base_url("index.php/c_pesanonline") ?>">Pemesanan Gas</a></li>

           <?php } ?>
        </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><div id="displayMoment"></div></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $username;?><span class="glyphicon glyphicon-user"><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url("index.php/c_login/logout") ?>">Logout</a><li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<script type="text/javascript">
(function()
{
  // instantiate a moment object
  var NowMoment = moment().format('MMMM Do YYYY, h:mm:ss a');
  
  // display value of moment object in #displayMoment div
  var eDisplayMoment = document.getElementById('displayMoment');
  eDisplayMoment.innerHTML = NowMoment;
})();</script>