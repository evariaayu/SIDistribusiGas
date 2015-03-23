 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_reporttransaksigas extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    public function getallonline($tahun)
    {
        $this->db->select('*');
        $this->db->from('transaksi_online');
        $this->db->join('pangkalan','transaksi_online.idPangkalan=pangkalan.idPangkalan');
        $this->db->join('status_pemesanan','transaksi_online.idstatus_pemesanan=status_pemesanan.idstatus_pemesanan');
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

    public function getalldataonline()
    {
        $this->db->select('*');
        $this->db->from('transaksi_online');
        $this->db->join('pangkalan','transaksi_online.idPangkalan=pangkalan.idPangkalan');
        $this->db->join('status_pemesanan','transaksi_online.idstatus_pemesanan=status_pemesanan.idstatus_pemesanan');
        //$this->db->where('EXTRACT(YEAR FROM transaksi_online.tanggalTransaksiOnline)=', $tahun);
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



    public function getalloffline($tahun)
    {
        $this->db->select('*');
        $this->db->from('transaksi_offline');
        $this->db->join('pangkalan','transaksi_offline.idPangkalan=pangkalan.idPangkalan');
        $this->db->where('EXTRACT(YEAR FROM transaksi_offline.tanggalTransaksiOffline)=', $tahun);
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

    public function getalldataoffline()
    {
        $this->db->select('*');
        $this->db->from('transaksi_offline');
        $this->db->join('pangkalan','transaksi_offline.idPangkalan=pangkalan.idPangkalan');
        //$this->db->where('metode', 0);
        //$this->db->where('EXTRACT(YEAR FROM transaksi_offline.tanggalTransaksiOffline)=', $tahun);
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