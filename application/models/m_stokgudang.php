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


}