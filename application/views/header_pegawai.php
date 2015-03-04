
<nav class="navbar navbar-default">
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
        if($session_data['hakakses']=="pegawai"){


         ?>
        <li><a href="<?php echo base_url("index.php/kelola_pangkalan") ?>">Mengelola Data Pangkalan</a></li>
        <li><a href="<?php echo base_url("index.php/kelola_pemasukangas") ?>">Mengelola Biaya Operasional</a></li>
        <?php } ?>
        </ul>
      
      <ul class="nav navbar-nav navbar-right">
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $username;?><span class="glyphicon glyphicon-user"><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="../index.php/c_login/logout">Logout</a><li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>