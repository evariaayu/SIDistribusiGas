<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_user extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

 
    function insert($datauser) 
    {
        $this->db->insert('login',$datauser);
    }
    function getall()
    {
        $get_data = $this->db->get('login');
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $datauser) 
            {
                $hasil[]= $datauser;
            }
            return $hasil;
        }
        
    }

/*    
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

    function update($data)
    {
        $datapangkalan = array(
        
            'namapangkalan' => $data ['namapangkalan'],
            'alamatpangkalan' => $data ['alamatpangkalan']
        );

        $this->db->where('idPangkalan', $data['idPangkalan']);
        $this->db->update('pangkalan', $datapangkalan);

     //   print_r($datatukarbarang);
    }
*/
}