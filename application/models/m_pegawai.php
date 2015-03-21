<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_pegawai extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function insert($datapegawai) 
    {
        $this->db->insert('pegawai',$datapegawai);
    }
    function getall()
    {
        $get_data = $this->db->get('pegawai');
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $datapegawai) 
            {
                $hasil[]= $datapegawai;
            }
            return $hasil;
        }
        
    }
    function delete($idPegawai)
    {
        $this->db->where('idPegawai', $idPegawai);
        $this->db->delete('pegawai');
    }

    function getby($idPegawai)
    {
        $by['idPegawai'] = $idPegawai;
        $this->db->where($by);
        $get_data           = $this->db->get('pegawai');
        if($get_data->num_rows() > 0)
        {
            foreach ($get_data->result() as $datapegawai) {
                $hasil[] = $datapegawai;
            }
            return $hasil;
        }
    }

    function update($idPegawai)
    {

        $datapegawai=array(
        
            'namapegawai' => $this->input->post('namapegawai'),
            'alamatpegawai' => $this->input->post('alamatpegawai'),
            'jk' => $this->input->post('jk'),
            'notelepon' => $this->input->post('notelepon'),
            'idKeterangan_jabatan' => $this->input->post('idKeterangan_jabatan'),
           
        );
        $this->db->where('idPegawai',$data['idPegawai']);
        $this->db->update('pegawai', $datapegawai);
    }
}