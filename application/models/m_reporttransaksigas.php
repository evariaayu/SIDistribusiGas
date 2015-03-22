 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_reporttransaksigas extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    public function getallonline($tahun)
    {
        $this->db->select('*');
        $this->db->from('pengeluaran_gas');
        $this->db->join('transaksi_online','pengeluaran_gas.idTransaksi=transaksi_online.idTransaksi_Online');
        $this->db->where('metode', 1);
        $this->db->where('EXTRACT(YEAR FROM transaksi_online.tanggalTransaksiOnline)=', $tahun);
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $transaksigasonline) 
            {
                $hasil[]= $transaksigasonline;
            }

            return $hasil;  
        }
    }
    
    public function getalloffline()
    {
        $this->db->select('*');
        $this->db->from('pengeluaran_gas');
        $this->db->join('transaksi_offline','pengeluaran_gas.idTransaksi=transaksi_offline.idTransaksi_Offline');
        $this->db->where('metode', 2);
        $this->db->where('tahun', $tahun);
         $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $transaksigasoffline) 
            {
                $hasil[]= $transaksigasoffline;
            }
            return $hasil;
        }
        
    }

    

}