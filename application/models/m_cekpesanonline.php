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

    function getall()
    {
        $this->db->select('*');
        $this->db->from('pemasukan');
        $this->db->join('pegawai','pemasukan.idPegawai=pegawai.idPegawai');
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $datapemasukangas) 
            {
                $hasil[]= $datapemasukangas;
            }
            return $hasil;
        }
        
    }
    function delete($idPemasukan)
    {
        $this->db->where('idPemasukan', $idPemasukan);
        $this->db->delete('pemasukan');
    }

    function getby($idPemasukan)
    {
        $by['idPemasukan']  = $idPemasukan;
        $this->db->where($by);
        $get_data           = $this->db->get('pemasukan');
        if($get_data->num_rows() > 0)
        {

            foreach ($get_data->result() as $datapemasukangas) {
                $hasil[] = $datapemasukangas;
            }
         //   print_r($hasil);
            return $hasil;
        }
    }

    public function update($data)
    {
        $datapemasukangas=array(
            'jumlahgas' => $data['jumlahgas'],
            'hargabeli' => $data['hargabeli'],
            'hargajual' => $data['hargajual']
        );
        $this->db->where('idPemasukan',$data['idpemasukan']);
        $this->db->update('pemasukan', $datapemasukangas);
    }
}