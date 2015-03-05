<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_pemasukangas extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function insert($datapemasukangas) 
    {
        $this->db->insert('pemasukan',$datapemasukangas);
        $this->db->insert('stokgudang', $dat)
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