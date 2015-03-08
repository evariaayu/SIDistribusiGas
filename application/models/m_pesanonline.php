<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_pesanonline extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function get_dropdown() {
        $namapangkalan = $this->db->select('namapangkalan','pangkalan')
          
          ->get($this->database)
          ->result();
 
        $dropdown = array('' => 'Pilih Nama Pangkalan');
        if( !empty($namapangkalan) ) {
            foreach( $namapangkalan as $namapangkalan ) {
                $dropdown[$namapangkalan->idPangkalan] = $namapangkalan->namapangkalan;
            }
            return $dropdown;
        }
        return array('' => 'Tidak ada kategori');
    }

  /*  function insert($datapangkalan) 
    {
        $this->db->insert('pangkalan',$datapangkalan);
    }
    function getall()
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