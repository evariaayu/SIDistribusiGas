<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_operasional extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getall()
    {
        $this->db->select('*');
        $this->db->from('pengeluaran_tetap');
        $this->db->join('pegawai','pengeluaran_tetap.idPegawai=pegawai.idPegawai');
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $dataoperasional) 
            {
                $hasil[]= $dataoperasional;
            }
            return $hasil;
        }
    }

 
    function insert($dataoperasional) 
    {
        $this->db->insert('pengeluaran_tetap',$dataoperasional); 

    }
    function delete($idPengeluaran_Tetap)
    {
        $this->db->where('idPengeluaran_Tetap', $idPengeluaran_Tetap);
        $this->db->delete('pengeluaran_tetap');
    }
   /* function getall()
    {
        $get_data = $this->db->get('');
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $datapangkalan) 
            {
                $hasil[]= $datapangkalan;
            }
            return $hasil;
        }
        
    }*/
 /*   function delete($idPangkalan)
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
        $datapangkalan=array(
        
            'namapangkalan' => $this->input->post('namapangkalan'),
            'alamatpangkalan' => $this->input->post('alamatpangkalan'),
           
        );
        $this->db->where('idPangkalan', $idPangkalan);
        $this->db->update('pangkalan', $datapangkalan);
    }*/
}