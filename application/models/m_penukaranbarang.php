<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_penukaranbarang extends CI_Model 
{
 
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
 
/*    public function populate()
    {
        $this->db->select('idPangkalan,namapangkalan');
        $this->db->from('pangkalan');
        $query = $this->db->get();
        if( $query -> num_rows() > 0 )
        {
            foreach ($query->result_array() as $row) 
            {
                $hasil[$row['idPangkalan']] = $row['namapangkalan'];
            }
            return $hasil;
        }
    }
    */
    function insert($tukarbarang) 
    {
        $this->db->insert('tukar_barang',$tukarbarang);
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

    function updatekurangdatagudang($datatukar)
    {
        $datetoday =date("Y-m-d");
        $query='update stok_gudang s
                inner join
                (
                    select id.idstok_gudang
                    from stok_gudang as id
                    where date(tanggal) = $datetoday
                ) as id on s.idstok_gudang = id.idstok_gudang
                set jumlah_stok = jumlah_stok - 20
                where s.idstok_gudang = id.idstok_gudang';
    }
    function delete($idTukar_barang)
    {
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
        $datatukarbarang=array(
        
            'jumlahbarangrusak'     => $data['jumlahbarangrusak'],
            'jumlahbarangkosong'    => $data['jumlahbarangkosong'],
            'keterangan'            => $data['keterangan']
        );
        $this->db->where('idTukar_Barang', $data['idTukar_Barang']);
        $this->db->update('tukar_barang', $datatukarbarang);

     //   print_r($datatukarbarang);
    }
}