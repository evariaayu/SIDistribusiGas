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
    function getall_view()
    {
        
        $this->db->select('*');
        $this->db->from('transaksi_offline');
        $this->db->join('pangkalan','pangkalan.idPangkalan = transaksi_offline.idPangkalan');
        $this->db->join('pegawai', 'pegawai.idPegawai=transaksi_offline.idPegawai');
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $datanamapangkalan) 
            {
                $hasil[]= $datanamapangkalan;
            }
            return $hasil;
        }

        
    }
    function lihat($sampai,$dari){
        $this->db->select('*');
        $this->db->from('transaksi_offline');
        $this->db->join('pangkalan','pangkalan.idPangkalan = transaksi_offline.idPangkalan');
        $this->db->join('pegawai', 'pegawai.idPegawai=transaksi_offline.idPegawai');
        $this->db->limit($sampai,$dari);
        return $query = $this->db->get()->result();
        
    }
    function jumlah()
    {
        $this->db->select('*');
        $this->db->from('transaksi_offline');
        $this->db->join('pangkalan','pangkalan.idPangkalan = transaksi_offline.idPangkalan');
        $this->db->join('pegawai', 'pegawai.idPegawai=transaksi_offline.idPegawai');
        $get_data = $this->db->get();
        $jumlah = $get_data->num_rows();
        return $jumlah;
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

     function delete($idTransaksi_Offline)
    {
        //untuk update stokngudang
        $this->db->select('jumlahGas');
        $this->db->from('transaksi_offline');
        $this->db->where('idTransaksi_Offline', $idTransaksi_Offline);
        $execute = $this->db->get();
        if($execute->num_rows()>0)
        {
            foreach ($execute->result() as $value) {
                $jumlahGas= $value->jumlahGas;
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
                    set jumlah_stok = jumlah_stok +'$jumlahGas'
                    where s.idstok_gudang = id.idstok_gudang";
                    $query = $this->db->query($sql);

                }
            }
//untuk hapus
        $this->db->where('idTransaksi_Offline', $idTransaksi_Offline);

        $this->db->delete('transaksi_offline');
    }

    function getby($idTransaksi_Offline)
    {
        $by['idTransaksi_Offline'] = $idTransaksi_Offline;
        $this->db->where($by);
        $this->db->select('*');
        $this->db->from('transaksi_offline');
        $this->db->join('pangkalan','pangkalan.idPangkalan = transaksi_offline.idPangkalan');
        $this->db->join('pegawai', 'pegawai.idPegawai=transaksi_offline.idPegawai');
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $datanamapangkalan) 
            {
                $hasil[]= $datanamapangkalan;
            }
            return $hasil;
        }
    }

    function update($data)
    {
        $this->db->select('jumlahGas');
        $this->db->from('transaksi_offline');
        $this->db->where('idTransaksi_Offline', $data['idTransaksi_Offline']);
        $execute = $this->db->get();
        if($execute->num_rows() > 0)
        {
            foreach ($execute->result() as $key) 
            {
                $jumlahGas_lama = $key->jumlahGas;
            }
           
        }

        $jumlahGas_baru = $data['jumlahGas'];
       
        $selisihgas=$jumlahGas_baru-$jumlahGas_lama;
        $datanamapangkalan=array(
        
            'jumlahGas'     => $data['jumlahGas']
        );

        $this->db->where('idTransaksi_Offline', $data['idTransaksi_Offline']);
        $this->db->update('transaksi_offline', $datanamapangkalan);
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
            set jumlah_stok = jumlah_stok - '$selisihgas'
            where s.idstok_gudang = id.idstok_gudang";
        $query = $this->db->query($sql);

     //   print_r($datatukarbarang);
    }

    function insert($data) 
    {
        
     //   $idPangkalan = $session_data['idPangkalan'];
    //    $totalhargabeli = $this->input->post('totalhargabeli');

        
        $this->db->insert('transaksi_offline', $data);
        

    }
}