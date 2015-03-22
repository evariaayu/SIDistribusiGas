 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_reportbiayaoperasional extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    public function getbiayaoperasional()
    {
        $sql="SELECT p.namapegawai, cl.tanggal, pt.tanggal, cl.namabarang, pt.pengeluaranPLN, pt.pengeluaranPAM, pt.pengeluaranInternet, cl.harga
                FROM pengeluaran_perbulan pp, pengeluaran_tetap pt, cost_lainlain cl, pegawai p
                WHERE pp.idPengeluaran_Tetap=pt.idPengeluaran_Tetap
                AND pp.idCost_lainlain=cl.idCost_lainlain
                AND pt.idPegawai=p.idPegawai
                GROUP BY pt.tanggal, cl.tanggal";
                $query = $this->db->query($sql);
                $data=$query->result_array();
                return $data;



        /*$this->db->select('*');
        $this->db->from('pengeluaran_perbulan');
        $this->db->join('pengeluaran_tetap','pengeluaran_perbulan.idPengeluaran_Tetap=pengeluaran_tetap.idPengeluaran_Tetap');
        $this->db->join('cost_lainlain','pengeluaran_perbulan.idCost_lainlain=cost_lainlain.idCost_lainlain');
        //$this->db->join('pegawai','pengeluaran_tetap.idPegawai=pegawai.idPegawai');
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $biayaoperasional) 
            {
                $hasil[]= $biayaoperasional;
            }

            return $hasil;  
        }*/
    }
    
    /*public function getalloffline()
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
        
    }*/

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