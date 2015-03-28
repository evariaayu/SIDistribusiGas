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
    function getall_lain()
    {
        $get_data = $this->db->get('cost_lainlain');
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $datalainlain) 
            {
                $hasil[]= $datalainlain;
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
    function lihatlain($sampai,$dari)
    {
        return $query = $this->db->get('cost_lainlain',$sampai,$dari)->result();
        
    }
    function jumlahlain()
    {
        $get_data = $this->db->get('cost_lainlain');
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
    function deletelain($idCost_lainlain)
    {
        $this->db->select('namafolder');
        $this->db->from('cost_lainlain');
        $this->db->where('idCost_lainlain', $idCost_lainlain);
        $query=$this->db->get();
        if($query -> num_rows() > 0)
        {
            foreach ($query->result() as $datalainlain) 
            {
               $namafolder= $datalainlain->namafolder;
               delete_files('./uploads/lainlain/'.$namafolder, TRUE);
               rmdir('./uploads/lainlain/'.$namafolder);
            }
        }
        $this->db->select('idPengeluaran_Perbulan');
        $this->db->from('pengeluaran_perbulan');
        $this->db->where('idCost_lainlain', $idCost_lainlain);
        $query=$this->db->get()->result();
        $idPengeluaran_Perbulan = $query[0]->idPengeluaran_Perbulan;
        $this->db->where('idPengeluaran_Perbulan', $idPengeluaran_Perbulan);
        $this->db->delete('pengeluaran_perbulan');
        //print_r($idCost_lainlain);
        
    }
    function delete_costlain($idCost_lainlain)
    {
        $this->db->where('idCost_lainlain', $idCost_lainlain);
        $this->db->delete('cost_lainlain');
    }
}