 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_reporttransaksigas extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    public function getallonline()
    {
        $this->db->select('*');
        $this->db->from('pengeluaran_gas');
        $this->db->join('transaksi_online','pengeluaran_gas.idTransaksi=transaksi_online.idTransaksi_Online');
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
        //$this->db->where('metode = 0')
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $transaksigasoffline) 
            {
                $hasiloffline[]= $transaksigasoffline;
            }
            return $hasiloffline;
        }
        
    }

    /*public function sort_tahun_online()
    {
        $sql = "SELECT tanggalTransaksiOnline, idPangkalan, jumlahGas, totalhargabeli
                FROM pengeluaran_gas
                JOIN transaksi_online ON pengeluaran_gas.idTransaksi=transaksi_online.idTransaksi_Online
                WHERE tanggalTransaksiOnline like '%'"
        $get_data = $this->db->query($sql);
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $transaksigasoffline) 
            {
                $hasiloffline[]= $transaksigasoffline;
            }
            return $hasiloffline;
        }


        $this->db->select('*');
                FROM pengeluaran_gas
                JOIN transaksi_offline ON 
        $this->db->from('pengeluaran_gas');
        $this->db->join('transaksi_online','pengeluaran_gas.idTransaksi=transaksi_online.idTransaksi_Online');
        $get_data = $this->db->get();
    }*/

}