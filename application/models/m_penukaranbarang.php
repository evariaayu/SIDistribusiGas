<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_penukaranbarang extends CI_Model 
{
 
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
 
/*    public function populate()
    {
        $this->db->select('idPangkalan,namapangkalan');
        $this->db->from('pangkalan');
        $query = $this->db->get();
        if( $query -> num_rows() > 0 )
        {
            foreach ($query->result_array() as $row) 
            {
                $hasil[$row['idPangkalan']] = $row['namapangkalan'];
            }
            return $hasil;
        }
    }
    */
    function insert($tukarbarang) 
    {
        $this->db->insert('tukar_barang',$tukarbarang);
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
        
    }
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