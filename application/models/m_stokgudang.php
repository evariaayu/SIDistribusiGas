<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_stokgudang extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function insert($datamasukgudang) 
    {
       
        $this->db->insert('stok_gudang', $datamasukgudang);
    }
    function updatekurangdatagudang($datatukar)
    {
        $query='update stok_gudang s
                inner join
                (
                    select id.idstok_gudang
                    from stok_gudang as id
                    where date(tanggal) ='2015-03-12'
                ) as id on s.idstok_gudang = id.idstok_gudang
                set jumlah_stok = jumlah_stok - 20
                where s.idstok_gudang = id.idstok_gudang';
    }

}