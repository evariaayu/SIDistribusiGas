<div class="col-md-8 col-sm-offset-2">
  <form class="form-horizontal"  method="POST" action="<?php echo base_url() ?>index.php/c_cekpesanonline/updatebaru/<?php echo $hasil[0]->idTransaksi_Online ?>">
    <?php echo $success;?>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><center>Form Edit Pesan Online</center></h3>
      </div>
      <div class="panel-body">

     <div class="form-group">
        <label for="stokgudang" class="col-sm-3 control-label">Stok Gudang</label>
        <div class="col-sm-6">
       <?php if(empty($stok_gudang)) { echo "Data Penukaran Gudang masih kosong";}
        else { ?>
           <div class="well well-sm"><?php echo $stok_gudang ?></div>
        <?php } ?>
      </div>
    </div>
     <!--Nama Pangkalan-->
      <div class="form-group">
        <label for="namapangkalan" class="col-sm-3 control-label">Pangkalan</label>
        <div class="col-sm-6">
          <div class="well well-sm">
            <?php echo $hasil[0]->namapangkalan ?>
            <input type="hidden" class="form-control" id="namapangkalan" name="namapangkalan" value="<?php echo $hasil[0]->namapangkalan ?>" readonly>
          </div>
        </div>
      </div>
    <!--Tanggal-->
     <div class="form-group">
        <label for="tanggalTransaksiOnline" class="col-sm-3 control-label">Tanggal Transaksi Online</label>
        <div class="col-sm-6">
          <div class="well well-sm">
            <?php echo $hasil[0]->tanggalTransaksiOnline ?>
            <input type="hidden" class="form-control" id="tanggalTransaksiOnline" name="tanggalTransaksiOnline" value="<?php echo $hasil[0]->tanggalTransaksiOnline ?>" readonly>
          </div>
          
        </div>
      </div>
      <!--jumlah gas-->
      <div class="form-group">
        <label for="jumlahGas" class="col-sm-3 control-label">Jumlah Gas</label>
        <div class="col-sm-6">
          <div class="well well-sm">
            <?php echo $hasil[0]->jumlahGas ?>
            <input type="hidden" class="form-control" id="jumlahGas" name="jumlahGas" value="<?php echo $hasil[0]->jumlahGas ?>"readonly>
          </div>
        </div>
      </div>

       <!--total harga pembelian-->
      <div class="form-group">
        <label for="totalhargabeli" class="col-sm-3 control-label">Total Harga Beli</label>
        <div class="col-sm-6">
            <div class="well well-sm">
              Rp<?php echo $hasil[0]->totalhargabeli ?>,00
              <input type="hidden" class="form-control" id="totalhargabeli" name="totalhargabeli" value="<?php echo $hasil[0]->totalhargabeli ?>"readonly>
          </div>
        </div>
      </div>

      <!--status pemesanan-->
      <div class="form-group">
        <label for="idstatus_pemesanan" class="col-sm-3 control-label">Status Pemesanan</label>
        <div class="col-sm-6">
          <select class="form-control" name="idstatus_pemesanan" id="idstatus_pemesanan">
            <option value="<?php echo $hasil[0]->idstatus_pemesanan ?>"><?php echo $hasil[0]->namastatus ?></option>
            <option value="2">confirmed</option>
       <!--  <?php foreach ($hasilstatus as $row) {?>
            
             <option value="<?php echo $row->idstatus_pemesanan ?>"> <?php echo $row->namastatus ?> </option>
        
             <?php } ?>-->
            </select>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <input type="submit" class="btn btn-default" value="submit"></button>
          <input class="btn btn-danger" type="reset" value="Cancel"><br>
        </div>
      </div>
      </div>
    </div>
  </form>
</div>
