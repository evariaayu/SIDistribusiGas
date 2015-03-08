<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_reporttransaksigas extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 

    function getallonline()
    {
        $this->db->select('*');
        $this->db->from('pengeluaran_gas');
        $this->db->join('transaksi_online','pengeluaran_gas.idTransaksi=transaksi_online.idTransaksi_Online');
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $transaksigasonline) 
            {
                $hasil[]= $transaksigasonline;
            }
            return $hasil;
        }
        
    }
    function getby($idTransaksi)
    {
        $by['idTransaksi']  = $idTransaksi;
        $this->db->where($by);
        $get_data           = $this->db->get('pengeluaran_gas');
        if($get_data->num_rows() > 0)
        {

            foreach ($get_data->result() as $transaksigasonline) {
                $hasil[] = $transaksigasonline;
            }
         //   print_r($hasil);
            return $hasil;
        }
    }
    function getalloffline()
    {
        $this->db->select('*');
        $this->db->from('pengeluaran_gas');
        $this->db->join('transaksi_offline','pengeluaran_gas.idTransaksi=transaksi_online.idTransaksi_Offline');
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $transaksigasoffline) 
            {
                $hasil[]= $transaksigasoffline;
            }
            return $hasil;
        }
        
    }

}