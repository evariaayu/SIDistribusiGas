 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_reportbiayaoperasional extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function getbiayaoperasional($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pengeluaran_tetap');
        //$this->db->join('pengeluaran_tetap','pengeluaran_perbulan.idPengeluaran_Tetap=pengeluaran_tetap.idPengeluaran_Tetap');
        //$this->db->join('cost_lainlain','pengeluaran_perbulan.idCost_lainlain=cost_lainlain.idCost_lainlain');
        $this->db->join('pegawai','pengeluaran_tetap.idPegawai=pegawai.idPegawai');
        $this->db->where('EXTRACT(MONTH FROM pengeluaran_tetap.tanggal)=', $bulan);
        $this->db->where('EXTRACT(YEAR FROM pengeluaran_tetap.tanggal)=', $tahun);
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $biayaoperasional) 
            {
                $hasil[]= $biayaoperasional;
            }

            return $hasil;  
        }

    }

    public function totalpengeluaranlainlain($bulan,$tahun)
    {
        $this->db->select_sum('harga','totalpengeluaranlainlain');
        $this->db->from('cost_lainlain');
        $this->db->where('EXTRACT(MONTH FROM cost_lainlain.tanggal)=', $bulan);
        $this->db->where('EXTRACT(YEAR FROM cost_lainlain.tanggal)=', $tahun);
        $totalpengeluaranlainlain = $this->db->get();
        if($totalpengeluaranlainlain->num_rows()>0)
        {
            $totalpengeluaranlainlain= $totalpengeluaranlainlain->result();
            return $totalpengeluaranlainlain[0]->totalpengeluaranlainlain;
        }
    }
    public function totalpengeluarantetap($bulan,$tahun)
    {
        $this->db->select_sum('total','totalpengeluarantetap');
        $this->db->from('pengeluaran_tetap');
        $this->db->where('EXTRACT(MONTH FROM pengeluaran_tetap.tanggal)=', $bulan);
        $this->db->where('EXTRACT(YEAR FROM pengeluaran_tetap.tanggal)=', $tahun);
        $totalpengeluarantetap = $this->db->get();

        if($totalpengeluarantetap->num_rows()>0)
        {
            $totalpengeluarantetap= $totalpengeluarantetap->result();
            return $totalpengeluarantetap[0]->totalpengeluarantetap;
        }
    }
    public function totalhargabelionline($bulan,$tahun)
    {
        $this->db->select_sum('totalhargabeli','totalhargabelionline');
        $this->db->from('transaksi_online');
        $this->db->where('EXTRACT(MONTH FROM transaksi_online.tanggalTransaksiOnline)=', $bulan);
        $this->db->where('EXTRACT(YEAR FROM transaksi_online.tanggalTransaksiOnline)=', $tahun);
        $totalhargabelionline = $this->db->get();
        if($totalhargabelionline->num_rows()>0)
        {
            $totalhargabelionline= $totalhargabelionline->result();
            return $totalhargabelionline[0]->totalhargabelionline;
        }
    }
    
    public function totalhargabelioffline($bulan,$tahun)
    {
        $this->db->select_sum('totalhargabelioff','totalhargabelioffline');
        $this->db->from('transaksi_offline');
        $this->db->where('EXTRACT(MONTH FROM transaksi_offline.tanggalTransaksiOffline)=', $bulan);
        $this->db->where('EXTRACT(YEAR FROM transaksi_offline.tanggalTransaksiOffline)=', $tahun);
        $totalhargabelioffline = $this->db->get();
        if($totalhargabelioffline->num_rows()>0)
        {
            $totalhargabelioffline= $totalhargabelioffline->result();
            return $totalhargabelioffline[0]->totalhargabelioffline;
        }
    }
    /*public function getbiayatotal($bulan, $tahun, $total)
    {

       $total = array(
            'pengeluaranPLN'     => $total['pengeluaranPLN'],
            'pengeluaranPAM'    => $total['pengeluaranPAM'],
            'pengeluaranInternet' => $total['pengeluaranInternet']
            )
        $jumlah= $total['pengeluaranPLN']+$total['pengeluaranPAM'] +$total['pengeluaranInternet'];
        return $jumlah;
        /*$this->db->select('pengeluaranPLN + pengeluaranPAM + pengeluaranInternet');
        $this->db->from('pengeluaran_perbulan');
        $this->db->join('pengeluaran_tetap','pengeluaran_perbulan.idPengeluaran_Tetap=pengeluaran_tetap.idPengeluaran_Tetap');
        $this->db->where('EXTRACT(MONTH FROM pengeluaran_tetap.tanggal)=', $bulan);
        $this->db->where('EXTRACT(YEAR FROM pengeluaran_tetap.tanggal)=', $tahun);
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $biayaoperasional) 
            {
                $hasiltotal[]= $biayaoperasional;
            }

            return $hasiltotal;  
        }

    }*/

    public function getbiayalain($bulan, $tahun)
    {
         $this->db->select('*');
        $this->db->from('cost_lainlain');
        //$this->db->join('pengeluaran_tetap','pengeluaran_perbulan.idPengeluaran_Tetap=pengeluaran_tetap.idPengeluaran_Tetap');
        //$this->db->join('cost_lainlain','pengeluaran_perbulan.idCost_lainlain=cost_lainlain.idCost_lainlain');
        //$this->db->join('pegawai','pengeluaran_tetap.idPegawai=pegawai.idPegawai');
        $this->db->where('EXTRACT(MONTH FROM cost_lainlain.tanggal)=', $bulan);
        $this->db->where('EXTRACT(YEAR FROM cost_lainlain.tanggal)=', $tahun);
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $biayaoperasional) 
            {
                $hasilbiaya[]= $biayaoperasional;
            }

            return $hasilbiaya;  
        }
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