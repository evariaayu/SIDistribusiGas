<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_cekpesanonline extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
   /* function insert($datapemasukangas) 
    {
        $this->db->insert('pemasukan',$datapemasukangas);

    }

    function insertstok($datamasukgudang)
    {
        $this->db->insert('stok_gudang', $datamasukgudang);
    }*/

    function cekPesan()
    {
        $this->db->select('*');
        $this->db->from('transaksi_online');
        $execute = $this->db->get();
        return $execute;
    }

    public function update($jumlahGas,$idTransaksi)
    {
        $data = array('idstatus_pemesanan' => '2');
        $this->db->where("idTransaksi_Online",$idTransaksi);
        $this->db->update("transaksi_online",$data);

        $query = $this->db->query("SELECT jumlah_stok FROM `stok_gudang` ORDER BY idstok_gudang DESC limit 1");
        $hasil = $query->row_array();
        $totalGas = $hasil['jumlah_stok']-$jumlahGas;
        $data2 = array('jumlah_stok' => $totalGas);
        $this->db->insert('stok_gudang',$data2);
    }
    
}