<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_pangkalan extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function insert($datapangkalan) 
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
        
    }
    function lihat($sampai,$dari){
        
        return $query = $this->db->get('pangkalan',$sampai,$dari)->result();
        
    }
    function jumlah()
    {
        $get_data = $this->db->get('pangkalan');
        $jumlah = $get_data->num_rows();
        return $jumlah;
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

    function update($data)
    {

        $datapangkalan = array(
        
            'namapangkalan' => $data ['namapangkalan'],
            'alamatpangkalan' => $data ['alamatpangkalan']
        );

        $this->db->where('idPangkalan', $data['idPangkalan']);
        $this->db->update('pangkalan', $datapangkalan);
    }
    public function get_id($idPangkalan)
    {
        /*$by['idPangkalan']=$id;
        $this->db->where($by);*/
        $this->db->where('idPangkalan', $idPangkalan);
        $query = $this->db->get('pangkalan');
        return $query;
    }
    public function deletedata($idPangkalan)
    {
      //  echo "model";
       // print_r($data);
        $by['idPangkalan']=$idPangkalan;
        $this->db->where($by);
        $this->db->delete('pangkalan');
    }
}