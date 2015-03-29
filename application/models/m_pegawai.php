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

    function lihat($sampai,$dari){
        
        return $query = $this->db->get('pegawai',$sampai,$dari)->result();
        
    }
    function jumlah()
    {
        $get_data = $this->db->get('pegawai');
        $jumlah = $get_data->num_rows();
        return $jumlah;
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

    function update($data)
    {
        $datapegawai = array(
        
            'namapegawai' => $data ['namapegawai'],
            'alamatpegawai' => $data ['alamatpegawai'],
            'jk' => $data ['jk'],
            'notelepon' => $data ['notelepon'],
            'idKeterangan_jabatan' => $data ['idKeterangan_jabatan']
        );
        $this->db->where('idPegawai', $data['idPegawai']);
        $this->db->update('pegawai', $datapegawai);

     //   print_r($datatukarbarang);
    }
}