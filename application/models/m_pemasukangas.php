<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_pemasukangas extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function insert($datapemasukangas) 
    {
        $this->db->insert('pemasukan',$datapemasukangas);
    }
    function getall()
    {
        $get_data = $this->db->get('pemasukan');
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
            return $hasil;
        }
    }

    function update($idPemasukan)
    {
        $datapemasukangas=array(
        
            'namapangkalan' => $this->input->post('namapangkalan'),
            'alamatpangkalan' => $this->input->post('alamatpangkalan'),
           
        );
        $this->db->where('idPemasukan', $idPemasukan);
        $this->db->update('pemasukan', $datapemasukangas);
    }
}