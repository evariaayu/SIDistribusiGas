<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_pesanoffline extends CI_Model 
{
 
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }


    function getall()
    {
        /*$this->db->select();
        $this->db->from('login');
        $this->db->where('username', $data);
        $execute = $this->db->get();
        return $execute->result_array();*/
        $get_data = $this->db->get('pangkalan');
        {
            foreach ($get_data->result() as $datanamapangkalan) 
            {
                $hasil[]= $datanamapangkalan;
            }
            return $hasil;
        }
        
    }


    function getharga()
    {
        $query="select * from   pemasukan ORDER BY tanggalpembelian DESC";
        $query=$this->db->query($query);
        return $query->result_array();
    }

    function kurangstok($jumlahGas)
    {
        $query = $this->db->query("SELECT jumlah_stok FROM `stok_gudang` ORDER BY idstok_gudang DESC limit 1");
        $hasil = $query->row_array();
        $totalGas = $hasil['jumlah_stok']-$jumlahGas;
        $data2 = array('jumlah_stok' => $totalGas);
        $this->db->insert('stok_gudang',$data2);
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

        
        $this->db->insert('transaksi_offline', $data);
        

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