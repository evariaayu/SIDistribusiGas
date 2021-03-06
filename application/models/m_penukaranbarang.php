<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_penukaranbarang extends CI_Model 
{
 
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
 
    function insert($tukarbarang) 
    {
        $this->db->insert('tukar_barang',$tukarbarang);
    }
   
    function updatekurangdatagudang($pengurangan)
    {
        $pengurangan=array(
        
            'jumlahbarangrusak'     => $pengurangan['jumlahbarangrusak'],
            'jumlahbarangkosong'    => $pengurangan['jumlahbarangkosong'],
            'tanggal'               => $pengurangan['tanggal']
        );
        $jumlahkurang= $pengurangan['jumlahbarangrusak']+$pengurangan['jumlahbarangkosong'];
        //print_r($jumlahkurang);
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
                set jumlah_stok = jumlah_stok - '$jumlahkurang'
                where s.idstok_gudang = id.idstok_gudang";
        $query = $this->db->query($sql);
    }

    function getall()
    {
        $this->db->select('*');
        $this->db->from('tukar_barang');
        $this->db->join('pegawai','tukar_barang.idPegawai=pegawai.idPegawai');
        $this->db->join('pangkalan','pangkalan.idPangkalan=tukar_barang.idPangkalan');
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $datatukarbarang) 
            {
                $hasil[]= $datatukarbarang;
            }
            return $hasil;
        }

        
    }
    function lihat($sampai,$dari){
        $this->db->select('*');
        $this->db->from('tukar_barang');
        $this->db->join('pegawai','tukar_barang.idPegawai=pegawai.idPegawai');
        $this->db->join('pangkalan','pangkalan.idPangkalan=tukar_barang.idPangkalan');
        $this->db->limit($sampai,$dari);
        return $query = $this->db->get()->result();
        
    }
    function jumlah()
    {
        $this->db->select('*');
        $this->db->from('tukar_barang');
        $this->db->join('pegawai','tukar_barang.idPegawai=pegawai.idPegawai');
        $this->db->join('pangkalan','pangkalan.idPangkalan=tukar_barang.idPangkalan');
        $get_data = $this->db->get();
        $jumlah = $get_data->num_rows();
        return $jumlah;
    }

    public function ambilstokgudang()
    {
     // echo date_default_timezone_get();
        date_default_timezone_set("Asia/Jakarta");
     //   echo date_default_timezone_get();
    //   $datecoba= date("Y/m/d H:i:s");
        $datetoday =date("Y-m-d");
     //   print_r($datetoday);
        $this->db->select('jumlah_stok');
        $this->db->from('stok_gudang');
        $this->db->where('date(tanggal)',$datetoday);
        $this->db->order_by('tanggal','desc');
        $this->db->limit(1);
        $get_data = $this->db->get();
        //print_r($get_data);
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $datatukarbarang) 
            {
                $stok_gudang= $datatukarbarang->jumlah_stok;
            }
            return $stok_gudang;
        }
        elseif($get_data->num_rows()==0)
        {
            //echo "kosong";
            $this->db->select('jumlah_stok');
            $this->db->from('stok_gudang');
            $this->db->order_by('tanggal','desc');
            $this->db->limit(1);
            $execute = $this->db->get();
            //$sql="select jumlah_stok from stok_gudang order by tanggal desc limit 1";
            //$execute = $this->db->query($sql);
            //print_r($execute);
            if($execute->num_rows()>0)
            {
                foreach ($execute->result() as $value) 
                {
                    $stok_gudang=$value->jumlah_stok;
                    $this->db->set('jumlah_stok', $stok_gudang); 
                    $insert=$this->db->insert('stok_gudang');
                    return $stok_gudang;

                }
            }
            
            
        }
        
    }

   
    function delete($idTukar_barang)
    {
        $this->db->select('jumlahbarangrusak,jumlahbarangkosong');
        $this->db->from('tukar_barang');
        $this->db->where('idTukar_barang', $idTukar_barang);
        $execute = $this->db->get();
        if($execute->num_rows()>0)
        {
            foreach ($execute->result() as $value) {
                $jumlahbarangkosong= $value->jumlahbarangkosong;
                $jumlahbarangrusak= $value->jumlahbarangrusak;
                $jumlahtambah=$jumlahbarangrusak+$jumlahbarangkosong;
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
                     set jumlah_stok = jumlah_stok + '$jumlahtambah'
                     where s.idstok_gudang = id.idstok_gudang";
                    $query = $this->db->query($sql);

                }
            }

        $this->db->where('idTukar_barang', $idTukar_barang);

        $this->db->delete('tukar_barang');
    }

    function getby($idTukar_barang)
    {
        $by['idTukar_barang'] = $idTukar_barang;
        $this->db->where($by);
        $this->db->select('*');
        $this->db->from('tukar_barang');
        $this->db->join('pegawai','tukar_barang.idPegawai=pegawai.idPegawai');
        $this->db->join('pangkalan','pangkalan.idPangkalan=tukar_barang.idPangkalan');
        $get_data = $this->db->get();
        if($get_data->num_rows()>0)
        {
            foreach ($get_data->result() as $datatukarbarang) 
            {
                $hasil[]= $datatukarbarang;
            }
            return $hasil;
        }
    }

    function update($data)
    {
        $this->db->select('*');
        $this->db->from('tukar_barang');
        $this->db->where('idTukar_barang', $data['idTukar_Barang']);
        $execute = $this->db->get();
        if($execute->num_rows() > 0)
        {
            foreach ($execute->result() as $key) 
            {
                $bandingrusak = $key->jumlahbarangrusak;
                $bandingkosong = $key->jumlahbarangkosong;
            }
           
        }

        $rusak = $data['jumlahbarangrusak'];
        $kosong = $data['jumlahbarangkosong'];
        $hasilrusak=$rusak-$bandingrusak;
        $hasilkosong=$kosong-$bandingkosong;
        $hasiltotal=$hasilrusak+$hasilkosong;
        $datatukarbarang=array(
        
            'jumlahbarangrusak'     => $data['jumlahbarangrusak'],
            'jumlahbarangkosong'    => $data['jumlahbarangkosong'],
            'keterangan'            => $data['keterangan']
        );

        $this->db->where('idTukar_Barang', $data['idTukar_Barang']);
        $this->db->update('tukar_barang', $datatukarbarang);
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
            set jumlah_stok = jumlah_stok - '$hasiltotal'
            where s.idstok_gudang = id.idstok_gudang";
        $query = $this->db->query($sql);

     //   print_r($datatukarbarang);
    }
}