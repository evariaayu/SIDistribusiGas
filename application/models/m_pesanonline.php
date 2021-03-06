<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_pesanonline extends CI_Model 
{
 
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }


    function getall($data)
    {
        $this->db->select();
        $this->db->from('login');
        $this->db->where('username', $data);
        $execute = $this->db->get();
        return $execute->result_array();
        
    }

    function lihat($sampai,$dari,$idPangkalan){
        $this->db->select('*');
        $this->db->from('transaksi_online');
        $this->db->join('pangkalan','transaksi_online.idPangkalan=pangkalan.idPangkalan');
        $this->db->join('status_pemesanan','transaksi_online.idstatus_pemesanan=status_pemesanan.idstatus_pemesanan');
        $this->db->join('login','transaksi_online.idPangkalan=login.idPangkalan');
        $this->db->where('transaksi_online.idPangkalan', $idPangkalan);
        $this->db->limit($sampai,$dari);
        return $query = $this->db->get()->result();
        
    }

    function jumlah($idPangkalan)
    {
        $this->db->select('*');
        $this->db->from('transaksi_online');
        $this->db->join('pangkalan','transaksi_online.idPangkalan=pangkalan.idPangkalan');
        $this->db->join('status_pemesanan','transaksi_online.idstatus_pemesanan=status_pemesanan.idstatus_pemesanan');
        $this->db->join('login','transaksi_online.idPangkalan=login.idPangkalan');
        $this->db->where('transaksi_online.idPangkalan', $idPangkalan);
        $get_data = $this->db->get();
        $jumlah = $get_data->num_rows();
        return $jumlah;
    }


    function getharga()
    {
        $query="select * from   pemasukan ORDER BY tanggalpembelian DESC";
        $query=$this->db->query($query);
        return $query->result_array();
    }

    function cekstok()
    {
        $query = $this->db->query("SELECT jumlah_stok FROM `stok_gudang` ORDER BY tanggal DESC limit 1");
        $batas = $query->result_array();
        return $batas;
    }
        

    function insert($data) 
    {
        $this->db->insert('transaksi_online', $data);
    }

    function getby($idPangkalan)
    {

        $this->db->select('*');
        $this->db->from('transaksi_online');
        $this->db->join('pangkalan','transaksi_online.idPangkalan=pangkalan.idPangkalan');
        $this->db->join('status_pemesanan','transaksi_online.idstatus_pemesanan=status_pemesanan.idstatus_pemesanan');
        $this->db->join('login','transaksi_online.idPangkalan=login.idPangkalan');
        $this->db->where('transaksi_online.idPangkalan', $idPangkalan);
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $datapangkalan) 
            {
                $hasil[]= $datapangkalan;
            }
            return $hasil;
        }
    }
    function getby_edit($idTransaksi_Online)
    {
        $this->db->select('*');
        $this->db->from('transaksi_online');
        $this->db->join('pangkalan','transaksi_online.idPangkalan=pangkalan.idPangkalan');
        $this->db->join('status_pemesanan','transaksi_online.idstatus_pemesanan=status_pemesanan.idstatus_pemesanan');
        $this->db->where('transaksi_online.idTransaksi_Online', $idTransaksi_Online);
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $datapesanonline) 
            {
                $hasil[]= $datapesanonline;
            }
            return $hasil;
        }
    }

    function update($data)
    {
        $this->db->set('jumlahGas', $data['jumlahGas']); 
        $this->db->where('idTransaksi_Online', $data['idTransaksi_Online']);
        $this->db->update('transaksi_online');
    }

    function delete($idTransaksi_Online)
    {
        $this->db->where('idTransaksi_Online', $idTransaksi_Online);
        $this->db->delete('transaksi_online');
    }

}