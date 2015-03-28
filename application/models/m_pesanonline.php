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
       $this->db->join('Pangkalan','transaksi_online.idPangkalan=pangkalan.idPangkalan');
        $this->db->join('status_pemesanan','transaksi_online.idstatus_pemesanan=status_pemesanan.idstatus_pemesanan');
        $this->db->join('login','transaksi_online.idPangkalan=login.idPangkalan');
        $this->db->where('username', $idPangkalan);
        $this->db->limit($sampai,$dari);
        return $query = $this->db->get()->result();
        
    }

    function jumlah($idPangkalan)
    {
        $this->db->select('*');
        $this->db->from('transaksi_online');
        $this->db->join('Pangkalan','transaksi_online.idPangkalan=pangkalan.idPangkalan');
        $this->db->join('status_pemesanan','transaksi_online.idstatus_pemesanan=status_pemesanan.idstatus_pemesanan');
        $this->db->join('login','transaksi_online.idPangkalan=login.idPangkalan');
        $this->db->where('username', $idPangkalan);
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
        
     //   $idPangkalan = $session_data['idPangkalan'];
    //    $totalhargabeli = $this->input->post('totalhargabeli');

        
        $this->db->insert('transaksi_online', $data);

        

    }

    function getby($idPangkalan)
    {

        $this->db->select('*');
        $this->db->from('transaksi_online');
        $this->db->join('Pangkalan','transaksi_online.idPangkalan=pangkalan.idPangkalan');
        $this->db->join('status_pemesanan','transaksi_online.idstatus_pemesanan=status_pemesanan.idstatus_pemesanan');
        $this->db->join('login','transaksi_online.idPangkalan=login.idPangkalan');
        $this->db->where('username', $idPangkalan);
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
    /*function getall()
    {
        $get_data = $this->db->get('pangkalan');
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $datapangkalan) 
            {
                $hasil[]= $datapangkalan;
            }
            return $hasil;
        }
        else
        {
            $this->load->view('v_mengelola_pangkalan');
        }
    }
    function delete($idPangkalan)
    {
        $this->db->where('idPangkalan', $idPangkalan);
        $this->db->delete('pangkalan');
    }

    function getby($idPangkalan)
    {
        $by['idPangkalan'] = $idPangkalan;
        $this->db->where($by);
        $get_data           = $this->db->get('pangkalan');
        if($get_data->num_rows() > 0)
        {
            foreach ($get_data->result() as $datapangkalan) {
                $hasil[] = $datapangkalan;
            }
            return $hasil;
        }
    }

    function update($idPangkalan)
    {
        $namapangkalan      = $this->input->post('namapangkalan');
        $alamatpangkalan    = $this->input->post('alamatpangkalan');
        $notelppangkalan    = $this->input->post('notelppangkalan');
        $datapangkalan= array
        (
            'namapangkalan' => $this->input->post('namapangkalan'),
            'alamatpangkalan' => $this->input->post('alamatpangkalan'),
            'notelppangkalan' => $this->input->post('notelppangkalan'),
        );
        $this->db->where('idPangkalan', $idPangkalan);
        $this->db->update('pangkalan', $datapangkalan);
    }*/
}