<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_cekpesanonline extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
   /* function insert($datapemasukangas) 
    {
        $this->db->insert('pemasukan',$datapemasukangas);

    }

    function insertstok($datamasukgudang)
    {
        $this->db->insert('stok_gudang', $datamasukgudang);
    }*/

    function cekPesan()
    {
        $this->db->select('*');
        $this->db->from('transaksi_online');
        $execute = $this->db->get();
        return $execute;
    }

    public function update($jumlahGas,$idTransaksi_Online)
    {
        //$data = array('idstatus_pemesanan' => '2');
        $this->db->set('idstatus_pemesanan', 2); 
        $this->db->where('idTransaksi_Online',$idTransaksi_Online);
        $this->db->update('transaksi_online');
        print_r($idTransaksi_Online);
        $query = $this->db->query("SELECT jumlah_stok FROM `stok_gudang` ORDER BY idstok_gudang DESC limit 1");
        $hasil = $query->row_array();
        $totalGas = $hasil['jumlah_stok']-$jumlahGas;
       // $data2 = array('jumlah_stok' => $totalGas);
     //   $this->db->insert('stok_gudang',$data2);

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

    function delete($idTransaksi_Online)
    {
        $this->db->where('idTransaksi_Online', $idTransaksi_Online);
        $this->db->delete('transaksi_online');
    }
    function getby($idTransaksi_Online)
    {
        $by['idTransaksi_Online'] = $idTransaksi_Online;
        $this->db->select('*');
        $this->db->from('transaksi_online');
        $this->db->join('status_pemesanan','transaksi_online.idstatus_pemesanan=status_pemesanan.idstatus_pemesanan');
        $this->db->where($by);
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $datapesanonline) 
            {
                $hasil[]= $datapesanonline;
            }
            return $hasil;
        }
    }
    function getall_status()
    {
        $get_data = $this->db->get('status_pemesanan');
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $datapesanonline) 
            {
                $hasilstatus[]= $datapesanonline;
            }
            return $hasilstatus;
        }
    }
    function updatebaru($data)
    {   
        $idstatus_pemesanan = $data['idstatus_pemesanan'];
        $jumlahGas          = $data['jumlahGas'];
        $idTransaksi_Online = $data['idTransaksi_Online'];
        $data = array(
                
            'idstatus_pemesanan' => $idstatus_pemesanan
        );
        $this->db->set('idstatus_pemesanan', $idstatus_pemesanan); 
        $this->db->where('idTransaksi_Online',$idTransaksi_Online);
        $this->db->update('transaksi_online');

        $query = $this->db->query("SELECT jumlah_stok FROM `stok_gudang` ORDER BY idstok_gudang DESC limit 1");
        $hasil = $query->row_array();
        $totalGas = $hasil['jumlah_stok']-$jumlahGas;

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
}