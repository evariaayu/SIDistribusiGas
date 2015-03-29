<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class C_pesanoffline extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session'));
        $this->load->model('m_penukaranbarang');
        $this->load->model('m_pangkalan');
        $this->load->helper('form','html');
        $this->load->model('m_pesanoffline');
        $this->load->helper('url');
        $this->load->model('m_operasional');
        $this->load->library("pagination");
        $this->load->model('m_penukaranbarang');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/inderx.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{

	      $session_data = $this->session->userdata('logged_in');
		  $data['username'] = $session_data['username'];
		  $data['hakakses'] = $session_data['hakakses'];
		  $idPegawai = $session_data['idPegawai'];
		  $hakakses= $session_data['hakakses'];
	      if( ($hakakses=="pegawai") || ($hakakses="direktur"))
	      {
		     	//$datapangkalan ['hasil']= $this->m_pesanonline->getby($session_data['username']);	
		      //$datanamapangkalan['harga']=$this->m_pesanonline->getharga();

		      	$jumlah = $this->m_pesanoffline->jumlah();
				$config['base_url'] = base_url().'index.php/c_pesanoffline/index';
				$config['total_rows'] = $jumlah;
				$config['per_page']=5;

				$dari = $this->uri->segment('3');
			//	$datapangkalan ['hasil']= $this->m_pesanonline->getby($session_data['username']);	
				//$datanamapangkalan['stok_gudang'] = $this->m_penukaranbarang->ambilstokgudang();
				$datanamapangkalan['hasil'] = $this->m_pesanoffline->lihat($config['per_page'],$dari);
				$datanamapangkalan['success'] = '';

				$this->pagination->initialize($config); 

		      
		      $this->load->view('header');
			  $this->load->view('header_pegawai', $data);
			  $this->load->view('pegawai/v_mengelola_pesanoffline',$datanamapangkalan );
			  $this->load->view('footer');
		  }
		  else
		  {
		  	redirect('index.php/c_login', 'refresh');
		  }
		}

	   else
	   {
	     redirect('index.php/c_login', 'refresh');
	   }
		
	}



	/*public function form_pesanonline()
	{
		if($this->session->userdata('logged_in'))
		{
		    $session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['hakakses'] = $session_data['hakakses'];

		    $datanamapangkalan['hasil'] = $this->m_pesanonline->getall();

			$this->load->view('header');
		 	$this->load->view('header_pangkalan', $data);
		  	$this->load->view('pangkalan/form_pesanonline', $datanamapangkalan);
		  	$this->load->view('footer');
	  	}
	   	else
	   	{
	     //If no session, redirect to login page
	    	redirect('index.php/c_login', 'refresh');
	   	}
	}*/


	public function insert()
	{
		if($this->session->userdata('logged_in'))
		{

	      $session_data = $this->session->userdata('logged_in');
	      $data['username'] = $session_data['username'];
	      $data['hakakses'] = $session_data['hakakses'];
	      $hakakses = $session_data['hakakses'];
	      if( ($hakakses=="pegawai") || ($hakakses="direktur"))
	      {
		      //$data['idPangkalan'] = $session_data['idPangkalan'];

		      //$data['idPangkalan'] = $session_data['idPangkalan'];
		      $datanamapangkalan ['hasil']= $this->m_pesanoffline->getall();	
		      $datanamapangkalan['harga']=$this->m_pesanoffline->getharga();
		     

		      //print_r($session_data);
		      //print_r($datanamapangkalan['hasil']);
		      //print_r($datanamapangkalan);
		      $datanamapangkalan['success']='';
		      $this->load->view('header');
			  $this->load->view('header_pegawai', $data);
			  $this->load->view('pegawai/form_pesanoffline',$datanamapangkalan );
			  $this->load->view('footer');
		  }
		  else
		  {
		  	redirect('index.php/c_login', 'refresh');
		  }
		}

	   else
	   {
	     redirect('index.php/c_login', 'refresh');
	   }
		
	}



	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect(site_url()."index.php/c_login");
	}

	public function message()
	{
		echo "string";
	}

	public function pesan()
	{
		//$data['username'] = $session_data['username'];
		$waktu = $this->input->post('waktu');
		$pangkalan = $this->input->post('idPangkalan');
		$harga = $this->input->post('harga');
		$jumlahorder = $this->input->post('jumlahGas');

		$jumlahstok = $this->m_pesanoffline->cekstok();

		//echo $jumlahstok[0]['jumlah_stok']; 

		if($jumlahorder<=$jumlahstok[0]['jumlah_stok'])
		{
			if($this->session->userdata('logged_in'))
			{	
				$session_data = $this->session->userdata('logged_in');
				$idPegawai = $session_data['idPegawai'];
				$totalhargabelioff = $harga*$jumlahorder;
				//print_r($totalhargabeli);
				$data = array
					(
						
						'jumlahGas' => $this->input->post('jumlahGas'),
						'totalhargabelioff' => $totalhargabelioff,
						//'idstatus_pemesanan' => '1',
						'idPegawai' => $idPegawai,
						'idPangkalan' => $this->input->post('idPangkalan'),
						//'namapangkalan' => $this->input->post('username')

					);
					$this->m_pesanoffline->insert($data);
					$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
					Data Berhasil ditambahkan. Jumlah Pembayaran =Rp $totalhargabelioff <a href=".base_url('index.php/c_pesanoffline')." class=\"alert-link\">Kembali?</a>
					</div>";
					
					$session_data = $this->session->userdata('logged_in');
				    $data['username'] = $session_data['username'];
				    $data['hakakses'] = $session_data['hakakses'];
				    $hakakses = $session_data['hakakses'];
				    if( ($hakakses=="pegawai") || ($hakakses="direktur"))
				    {
					      //$data['idPangkalan'] = $session_data['idPangkalan'];

					      //$data['idPangkalan'] = $session_data['idPangkalan'];
						$datanamapangkalan ['hasil']= $this->m_pesanoffline->getall();	
					    $datanamapangkalan['harga']=$this->m_pesanoffline->getharga();

					      //print_r($session_data);
					      //print_r($datanamapangkalan['hasil']);
					      //print_r($datanamapangkalan);
					    $datanamapangkalan['success']=$sukses;
					    $this->load->view('header');
						$this->load->view('header_pegawai', $data);
						$this->load->view('pegawai/form_pesanoffline',$datanamapangkalan );
						$this->load->view('footer');
					 }
			}	
		}
		else
		{
			//echo "<script type='text/javascript'>alert('gagal ! order melebihi jumlah stock');</script>";
			$sukses = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
			Stok Gudang tidak mencukupi kebutuhan <a href=".base_url('index.php/c_pesanoffline/')." class=\"alert-link\">Kembali</a>
			</div>";
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['hakakses'] = $session_data['hakakses'];
			$hakakses = $session_data['hakakses'];
			if( ($hakakses=="pegawai") || ($hakakses="direktur"))
			{
					      //$data['idPangkalan'] = $session_data['idPangkalan'];

					      //$data['idPangkalan'] = $session_data['idPangkalan'];
				$datanamapangkalan ['hasil']= $this->m_pesanoffline->getall();	
				$datanamapangkalan['harga']=$this->m_pesanoffline->getharga();
			

					      //print_r($session_data);
					      //print_r($datanamapangkalan['hasil']);
					      //print_r($datanamapangkalan);
				$datanamapangkalan['success']=$sukses;
				$this->load->view('header');
				$this->load->view('header_pegawai', $data);
				$this->load->view('pegawai/form_pesanoffline',$datanamapangkalan );
				$this->load->view('footer');
			}
		}
	}

	public function delete($idTransaksi_Offline)
	{
		$this->m_pesanoffline->delete($idTransaksi_Offline);
		echo "<script type='text/javascript'>
				window.setTimeout(function(){window.location.href ='" . base_url() . "index.php/c_pesanoffline';}, 2000);

				</script>";
		if($this->session->userdata('logged_in'))
		{
	      $session_data = $this->session->userdata('logged_in');
	      $data['username'] = $session_data['username'];
	      $data['hakakses'] = $session_data['hakakses'];
	      $hakakses = $session_data['hakakses'];
		  if( ($hakakses=="pegawai") || ($hakakses="direktur"))
		  {
		    	$datanamapangkalan ['hasil']= $this->m_pesanoffline->getall();	
				$datanamapangkalan['harga']=$this->m_pesanoffline->getharga();
				$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  						<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
						Data Berhasil dihapus
						</div>";

					      //print_r($session_data);
					      //print_r($datanamapangkalan['hasil']);
					      //print_r($datanamapangkalan);
				$datanamapangkalan['success']= $sukses;
				$this->load->view('header');
				$this->load->view('header_pegawai', $data);
				$this->load->view('pegawai/form_pesanoffline',$datanamapangkalan );
				$this->load->view('footer');
			
			}
			else
		   	{
		     //If no session, redirect to login page
		     redirect('index.php/c_login', 'refresh');
		 	}
		}
		//redirect('index.php/Kelola_datagudang/success');
	}

	public function edit($idTukar_Barang)
	{
		if($this->session->userdata('logged_in'))
		{
		    $session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['hakakses'] = $session_data['hakakses'];
		    $hakakses = $session_data['hakakses'];
			if( ($hakakses=="pegawai") || ($hakakses="direktur"))
		  	{
		    	$datanamapangkalan ['hasil']= $this->m_pesanoffline->getall();	
				$datanamapangkalan['harga']=$this->m_pesanoffline->getharga();
				$datatukarbarang['success'] ='';

					      //print_r($session_data);
					      //print_r($datanamapangkalan['hasil']);
					      //print_r($datanamapangkalan);
				$datanamapangkalan['success']='';
				$this->load->view('header');
				$this->load->view('header_pegawai', $data);
				$this->load->view('pegawai/form_editpesanoffline',$datanamapangkalan );
				$this->load->view('footer');
			
			}
			else
		   	{
		     //If no session, redirect to login page
		     redirect('index.php/c_login', 'refresh');
		 	}
	 	}
		
	}

	public function update($idTransaksi_Offline)
	{
		$data['jumlahGas'] = $this->input->post('jumlahGas');
		$data['idTransaksi_Offline'] = $idTransaksi_Offline;
		
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

        $jumlahGas_baru = $this->input->post('jumlahGas');
       
        $selisihgas=$jumlahGas_baru-$jumlahGas_lama;
		$stok_gudang = $this->m_penukaranbarang->ambilstokgudang();
		if($selisihgas<=$stok_gudang)
		{

			$this->m_pesanoffline->update($data);

			$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
	  					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
						Data berhasil diubah <a href=".base_url('index.php/c_pesanoffline')." class=\"alert-link\">Kembali?</a>
						</div>";
			if($this->session->userdata('logged_in'))
			{
		     	$session_data = $this->session->userdata('logged_in');
		      	$data['username'] = $session_data['username'];
		      	$data['hakakses'] = $session_data['hakakses'];
		      	$datapangkalan['success'] = $sukses;
		      	$hakakses = $session_data['hakakses'];
				if( ($hakakses=="pegawai") || ($hakakses="direktur"))
		  		{
			    	$datanamapangkalan ['hasil']= $this->m_pesanoffline->getall();	
					$datanamapangkalan['harga']=$this->m_pesanonline->getharga();

			      //print_r($session_data);
						      //print_r($datanamapangkalan['hasil']);
						      //print_r($datanamapangkalan);
					$datanamapangkalan['success']= $sukses;
					$this->load->view('header');
					$this->load->view('header_pegawai', $data);
					$this->load->view('pegawai/form_editpesanoffline',$datanamapangkalan );
					$this->load->view('footer');
			
				}
				else
		   		{
		     //If no session, redirect to login page
		     		redirect('index.php/c_login', 'refresh');
		 		}
		   	
	   		}
	   		else
			{
				$sukses = "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
				Stok Gudang tidak mencukupi kebutuhan <a href=".base_url('index.php/c_pesanoffline')." class=\"alert-link\">Kembali?</a>
				</div>";
				$session_data = $this->session->userdata('logged_in');
		      	$data['username'] = $session_data['username'];
		      	$data['hakakses'] = $session_data['hakakses'];
		      	$datapangkalan['success'] = $sukses;
		      	$hakakses = $session_data['hakakses'];
				if( ($hakakses=="pegawai") || ($hakakses="direktur"))
		  		{
			    	$datanamapangkalan ['hasil']= $this->m_pesanoffline->getall();	
					$datanamapangkalan['harga']=$this->m_pesanonline->getharga();

			      //print_r($session_data);
						      //print_r($datanamapangkalan['hasil']);
						      //print_r($datanamapangkalan);
					$datanamapangkalan['success']= $sukses;
					$this->load->view('header');
					$this->load->view('header_pegawai', $data);
					$this->load->view('pegawai/form_editpesanoffline',$datanamapangkalan );
					$this->load->view('footer');
			
				}
				else
		   		{
		     //If no session, redirect to login page
		     		redirect('index.php/c_login', 'refresh');
		 		}
			}
	}

}
}

/* Location: ./application/controllers/welcome.php */