<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_pesanoffline extends CI_Model 
{
 
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }


    function getall()
    {
        /*$this->db->select();
        $this->db->from('login');
        $this->db->where('username', $data);
        $execute = $this->db->get();
        return $execute->result_array();*/
        $get_data = $this->db->get('pangkalan');
        {
            foreach ($get_data->result() as $datanamapangkalan) 
            {
                $hasil[]= $datanamapangkalan;
            }
            return $hasil;
        }
        
    }


    function getharga()
    {
        $query="select * from   pemasukan ORDER BY tanggalpembelian DESC";
        $query=$this->db->query($query);
        return $query->result_array();
    }

    function kurangstok($jumlahGas)
    {
        
        date_default_timezone_set("Asia/Jakarta");
        $datetoday =date("Y-m-d");
        $sql="update stok_gudang s
                inner join
                (
                    select id.idstok_gudang
                    from stok_gudang as id
                    where date(tanggal) = '$datetoday'
                    order by tanggal desc limit 1
                ) as id on s.idstok_gudang = id.idstok_gudang
                set jumlah_stok = jumlah_stok - '$jumlahGas'
                where s.idstok_gudang = id.idstok_gudang";
        $query = $this->db->query($sql);
    }

    function cekstok()
    {
        $query = $this->db->query("SELECT jumlah_stok FROM `stok_gudang` ORDER BY tanggal DESC limit 1");
        $batas = $query->result_array();
        return $batas;
    }
        

    function insert($data) 
    {
        
     //   $idPangkalan = $session_data['idPangkalan'];
    //    $totalhargabeli = $this->input->post('totalhargabeli');

        
        $this->db->insert('transaksi_offline', $data);
        

    }
}