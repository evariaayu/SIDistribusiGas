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

    function lihat($sampai,$dari){
        $this->db->select('*');
        $this->db->from('pengeluaran_tetap');
        $this->db->join('pegawai','pengeluaran_tetap.idPegawai=pegawai.idPegawai');
        $this->db->limit($sampai,$dari);
        return $query = $this->db->get()->result();
        
    }
    function jumlah()
    {
        $this->db->select('*');
        $this->db->from('pengeluaran_tetap');
        $this->db->join('pegawai','pengeluaran_tetap.idPegawai=pegawai.idPegawai');
        $get_data = $this->db->get();
        $jumlah = $get_data->num_rows();
        return $jumlah;
    }
 
    function insert($dataoperasional) 
    {
        $this->db->insert('pengeluaran_tetap',$dataoperasional); 

    }
    function delete($idPengeluaran_Tetap)
    {
        $this->db->select('namafolder');
        $this->db->from('pengeluaran_tetap');
        $this->db->where('idPengeluaran_Tetap', $idPengeluaran_Tetap);
        $query=$this->db->get();
        if($query -> num_rows() > 0)
        {
            foreach ($query->result() as $dataoperasional) 
            {
                $namafolder= $dataoperasional->namafolder;
                delete_files('./uploads/'.$namafolder, TRUE);
                rmdir('./uploads/'.$namafolder);
            }
        }
       
        $this->db->where('idPengeluaran_Tetap', $idPengeluaran_Tetap);
        $this->db->delete('pengeluaran_tetap');
    }

    function insertlainlain($datalainlain)
    {
        $this->db->insert('cost_lainlain',$datalainlain);

        $this->db->select('idCost_lainlain');
        $this->db->from('cost_lainlain');
        $this->db->order_by('tanggal','desc');
        $this->db->limit(1);
        $sql=$this->db->get();
        if($sql -> num_rows() > 0)
        {
            foreach ($sql->result() as $cost_lainlain) 
            {
                $idCost_lainlain= $cost_lainlain->idCost_lainlain;
            }
        }

        $month =date("m");
        $this->db->select('idPengeluaran_Tetap');
        $this->db->from('pengeluaran_tetap');
        $this->db->where('month(tanggal)', $month);
        $this->db->order_by('tanggal','desc');
        $this->db->limit(1);
        $query=$this->db->get();
        if($query -> num_rows() > 0)
        {
            foreach ($query->result() as $pengeluaran_tetap) 
            {
                $idPengeluaran_Tetap= $pengeluaran_tetap->idPengeluaran_Tetap;
            }
        }

        $perbulan=array(
            'idPengeluaran_Tetap' => $idPengeluaran_Tetap,
            'idCost_lainlain' => $idCost_lainlain

        );
        $this->db->insert('pengeluaran_perbulan',$perbulan);
        
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