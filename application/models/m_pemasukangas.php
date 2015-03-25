<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_pemasukangas extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function insert($datapemasukangas) 
    {
        $this->db->insert('pemasukan',$datapemasukangas);

    }

    function insertstok($datamasukgudang)
    {
       $datamasukgudang=array(
        
            'jumlah_stok'     => $datamasukgudang['jumlah_stok']
        );
        $tambah=$datamasukgudang['jumlah_stok'];
       // print_r($tambah);
        $datetoday =date("Y-m-d");
        $sql="update stok_gudang s
                inner join
                (
                    select id.idstok_gudang
                    from stok_gudang as id
                    where date(tanggal) = '$datetoday'
                    order by tanggal desc limit 1
                ) as id on s.idstok_gudang = id.idstok_gudang
                set jumlah_stok = jumlah_stok + '$tambah' where s.idstok_gudang = id.idstok_gudang";
        $query = $this->db->query($sql);
        $this->db->insert('stok_gudang', $datamasukgudang);
    }

    function getall()
    {
        $this->db->select('*');
        $this->db->from('pemasukan');
        $this->db->join('pegawai','pemasukan.idPegawai=pegawai.idPegawai');
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $datapemasukangas) 
            {
                $hasil[]= $datapemasukangas;
            }
            return $hasil;
        }
        
    }

    function lihat($sampai,$dari){
        $this->db->select('*');
        $this->db->from('pemasukan');
        $this->db->join('pegawai','pemasukan.idPegawai=pegawai.idPegawai');
        $this->db->limit($sampai,$dari);
        return $query = $this->db->get()->result();
        
    }
    function jumlah()
    {
       $this->db->select('*');
        $this->db->from('pemasukan');
        $this->db->join('pegawai','pemasukan.idPegawai=pegawai.idPegawai');
        $get_data = $this->db->get();
        $jumlah = $get_data->num_rows();
        return $jumlah;
    }
    
    function delete($idPemasukan)
    {
        $this->db->select('jumlahgas');
        $this->db->from('pemasukan');
        $this->db->where('idPemasukan', $idPemasukan);
        $execute = $this->db->get();
        if($execute->num_rows()>0)
            {
                foreach ($execute->result() as $value) {
                    $jumlahgas= $value->jumlahgas;
                    $datetoday =date("Y-m-d");
                    $sql="update stok_gudang s
                        inner join
                        (
                        select id.idstok_gudang
                        from stok_gudang as id
                        where date(tanggal) = '$datetoday'
                        order by tanggal desc limit 1
                        ) as id on s.idstok_gudang = id.idstok_gudang
                        set jumlah_stok = jumlah_stok + '$jumlahgas'
                        where s.idstok_gudang = id.idstok_gudang";
                    $query = $this->db->query($sql);

                }
            }

        $this->db->where('idPemasukan', $idPemasukan);
        $this->db->delete('pemasukan');
    }

    function getby($idPemasukan)
    {
        $by['idPemasukan']  = $idPemasukan;
        $this->db->where($by);
        $get_data           = $this->db->get('pemasukan');
        if($get_data->num_rows() > 0)
        {

            foreach ($get_data->result() as $datapemasukangas) {
                $hasil[] = $datapemasukangas;
            }
         //   print_r($hasil);
            return $hasil;
        }
    }

    public function update($data)
    {

        $this->db->select('*');
        $this->db->from('pemasukan');
        $this->db->where('idPemasukan', $data['idPemasukan']);
        $execute = $this->db->get();
        if($execute->num_rows() > 0)
        {
            foreach ($execute->result() as $key) 
            {
                $jumlahgaslama = $key->jumlahgas;
            }
           
        }

        $jumlahgasbaru = $data['jumlahgas'];
        $jumlahbaru=$jumlahgasbaru-$jumlahgaslama;

        $datapemasukangas=array(
            'jumlahgas' => $data['jumlahgas'],
            'hargabeli' => $data['hargabeli'],
            'hargajual' => $data['hargajual']
        );
        $this->db->where('idPemasukan',$data['idpemasukan']);
        $this->db->update('pemasukan', $datapemasukangas);

        $datetoday =date("Y-m-d");
        $sql="update stok_gudang s 
                        inner join
                        (
                        select id.idstok_gudang
                        from stok_gudang as id
                        where date(tanggal) = '$datetoday'
                        order by tanggal desc limit 1
                        ) as id on s.idstok_gudang = id.idstok_gudang
            set jumlah_stok = jumlah_stok + '$jumlahbaru'
            where s.idstok_gudang = id.idstok_gudang";
        $query = $this->db->query($sql);
    }
}