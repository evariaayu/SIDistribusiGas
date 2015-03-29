<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class C_pesanonline extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session' , 'pagination'));
        $this->load->model('m_pesanonline');
        $this->load->model('m_pangkalan');
        $this->load->model('m_penukaranbarang');
        $this->load->helper('html');
        $this->load->helper('file');
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
	      $idPangkalan		= $session_data['idPangkalan'];
	      $username = $session_data['username'];
	      if($session_data['hakakses']=="pangkalan")
	      {
		 

		      	$jumlah = $this->m_pesanonline->jumlah($idPangkalan);
				$config['base_url'] = base_url().'index.php/c_pesanonline/index';
				$config['total_rows'] = $jumlah;
				$config['per_page']=5;

				$dari = $this->uri->segment('3');
				$datapangkalan['hasil'] = $this->m_pesanonline->lihat($config['per_page'],$dari,$idPangkalan);
				$datapangkalan['success'] = '';

				$this->pagination->initialize($config); 

		      $datapangkalan['success']='';
		      $this->load->view('header');
			  $this->load->view('header_pegawai', $data);
			  $this->load->view('pangkalan/v_mengelola_pesanonline',$datapangkalan );





			   
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



	public function insert()
	{
		if($this->session->userdata('logged_in'))
		{

	      $session_data = $this->session->userdata('logged_in');
	      $data['username'] = $session_data['username'];
	      $data['hakakses'] = $session_data['hakakses'];
	      $idPangkalan		= $session_data['idPangkalan'];
	      if($session_data['hakakses']=="pangkalan")
	      {

		      $datanamapangkalan ['hasil']= $this->m_pesanonline->getby($idPangkalan);	
		      $datanamapangkalan['harga']=$this->m_pesanonline->getharga();
		      $datanamapangkalan['stok_gudang'] = $this->m_penukaranbarang->ambilstokgudang();
		      $datanamapangkalan['success']='';
		      $this->load->view('header');
			  $this->load->view('header_pegawai', $data);
			  $this->load->view('pangkalan/form_pesanonline',$datanamapangkalan );
			   
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


	public function message()
	{
		echo "string";
	}

	public function pesan()
	{
		$pangkalan = $this->input->post('idPangkalan');
		$harga = $this->input->post('harga');
		$jumlahorder = $this->input->post('jumlahGas');

		$jumlahstok = $this->m_pesanonline->cekstok();

		if($jumlahorder<=$jumlahstok[0]['jumlah_stok'])
		{
			if($this->session->userdata('logged_in'))
			{	
				$session_data = $this->session->userdata('logged_in');
				$idPangkalan = $session_data['idPangkalan'];
				$totalhargabeli = $harga*$jumlahorder;
				//print_r($totalhargabeli);
				$data = array
					(
						
						'jumlahGas' => $this->input->post('jumlahGas'),
						'totalhargabeli' => $totalhargabeli,
						'idstatus_pemesanan' => '1',				
						'idPangkalan' => $idPangkalan,
						'namapangkalan' => $this->input->post('username')

					);
					$this->m_pesanonline->insert($data);
					$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
					Data Berhasil ditambahkan. Jumlah Pembayaran =Rp $totalhargabeli <a href=".base_url('index.php/c_pesanonline')." class=\"alert-link\">Kembali?</a>
					</div>";
					
					$session_data = $this->session->userdata('logged_in');
				    $data['username'] = $session_data['username'];
				    $data['hakakses'] = $session_data['hakakses'];
				    $idPangkalan		= $session_data['idPangkalan'];
				    if($session_data['hakakses']=="pangkalan")
				    {

					  $datanamapangkalan ['hasil']= $this->m_pesanonline->getby($idPangkalan);		
					  $datanamapangkalan['harga']=$this->m_pesanonline->getharga();
					  $datanamapangkalan['stok_gudang'] = $this->m_penukaranbarang->ambilstokgudang();
					  $datanamapangkalan['success']=$sukses;
					  $this->load->view('header');
					  $this->load->view('header_pegawai', $data);
					  $this->load->view('pangkalan/form_pesanonline',$datanamapangkalan);
						   
					  $this->load->view('footer');
					}
				}
				else
				{
				  	redirect('index.php/c_login', 'refresh');
				}
           
				
		}
		else
		{
			//echo "<script type='text/javascript'>alert('gagal ! order melebihi jumlah stock');</script>";
			$sukses = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
			Stok Gudang tidak mencukupi kebutuhan <a href=".base_url('index.php/c_pesanonline')." class=\"alert-link\">Kembali?</a>
			</div>";
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['hakakses'] = $session_data['hakakses'];
			$idPangkalan		= $session_data['idPangkalan'];
			if($session_data['hakakses']=="pangkalan")
			{

				$datanamapangkalan ['hasil']= $this->m_pesanonline->getby($idPangkalan);	
				$datanamapangkalan['harga']=$this->m_pesanonline->getharga();
				$datanamapangkalan['stok_gudang'] = $this->m_penukaranbarang->ambilstokgudang();
				$datanamapangkalan['success']=$sukses;
				$this->load->view('header');
				$this->load->view('header_pegawai', $data);
				$this->load->view('pangkalan/form_pesanonline',$datanamapangkalan );
						   
				$this->load->view('footer');
			}
		}
	}
	public function edit($idTransaksi_Online)
	{
		if($this->session->userdata('logged_in'))
		{
		    $session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['hakakses'] = $session_data['hakakses'];
			$hakakses=$session_data['hakakses'];
	    	if( $hakakses=="pangkalan")
			{
				$datapesanonline['stok_gudang'] = $this->m_penukaranbarang->ambilstokgudang();
		    	$datapesanonline['hasil'] = $this->m_pesanonline->getby_edit($idTransaksi_Online);
				$datapesanonline['success'] = '';
				$this->load->view('header');
				$this->load->view('header_pegawai', $data);
				$this->load->view('pangkalan/form_editpesanonlinepangkalan', $datapesanonline);
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
	    	 //If no session, redirect to login page
	    	redirect('index.php/c_login', 'refresh');
	   	}
		
	}

	public function update($idTransaksi_Online)
	{
		$data['jumlahGas'] = $this->input->post('jumlahGas');
		$data['idTransaksi_Online'] = $idTransaksi_Online;
		$jumlahGas = $this->input->post('jumlahGas');

		$this->db->select('*');
        $this->db->from('transaksi_online');
        $this->db->where('idTransaksi_Online', $idTransaksi_Online);
        $execute = $this->db->get();
        if($execute->num_rows() > 0)
        {
            foreach ($execute->result() as $key) 
            {
                $jumlahgaslama = $key->jumlahGas;
            }
           
        }

        $selisihjumlahgas=$jumlahGas-$jumlahgaslama;

		$stok_gudang = $this->m_penukaranbarang->ambilstokgudang();
		if($selisihjumlahgas<=$stok_gudang)
		{

			$this->m_pesanonline->update($data);

			$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
	  					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
						Data berhasil diubah <a href=".base_url('index.php/c_pesanonline')." class=\"alert-link\">Kembali?</a>
						</div>";
			if($this->session->userdata('logged_in'))
			{
		     	$session_data = $this->session->userdata('logged_in');
		      	$data['username'] = $session_data['username'];
		      	$data['hakakses'] = $session_data['hakakses'];
		      	if($session_data['hakakses']=="pangkalan" )
		      	{
		      		$datapesanonline['stok_gudang'] = $this->m_penukaranbarang->ambilstokgudang();
					$datapesanonline['hasil']	= $this->m_pesanonline->getby_edit($idTransaksi_Online);
					$datapesanonline['success'] = $sukses;
					$this->load->view('header');
					$this->load->view('header_pegawai', $data);
					$this->load->view('pangkalan/form_editpesanonlinepangkalan', $datapesanonline);
				  	$this->load->view('footer');
			  	}
				else
		   		{
		     //If no session, redirect to login page
		     		redirect('index.php/c_login', 'refresh');
		   		}
		   	}
	   	}
	   	else
		{
			$sukses = "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
			Stok Gudang tidak mencukupi kebutuhan <a href=".base_url('index.php/c_pesanonline')." class=\"alert-link\">Kembali?</a>
			</div>";
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['hakakses'] = $session_data['hakakses'];
		    if($session_data['hakakses']=="pangkalan" )
	      	{
	      		$datapesanonline['stok_gudang'] = $this->m_penukaranbarang->ambilstokgudang();
				$datapesanonline['hasil']	= $this->m_pesanonline->getby_edit($idTransaksi_Online);
				$datapesanonline['success'] = $sukses;
				$this->load->view('header');
				$this->load->view('header_pegawai', $data);
				$this->load->view('pangkalan/form_editpesanonlinepangkalan', $datapesanonline);
			  	$this->load->view('footer');
		  	}
			else
	   		{
	     	//If no session, redirect to login page
	     		redirect('index.php/c_login', 'refresh');
	   		}
		}
	}
	public function delete($idTransaksi_Online)
	{
		$this->m_pesanonline->delete($idTransaksi_Online);
		//redirect setelah 2 detik
		echo "<script type='text/javascript'>
				window.setTimeout(function(){window.location.href ='" . base_url() . "index.php/c_pesanonline';}, 2000);

				</script>";
		$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
					Data berhasil dihapus
					</div>";
		if($this->session->userdata('logged_in'))
		{
	     	$session_data = $this->session->userdata('logged_in');
	      	$data['username'] = $session_data['username'];
	      	$data['hakakses'] = $session_data['hakakses'];
	      	$datapesanonline['success'] = $sukses;
	      	$idPangkalan	= $session_data['idPangkalan'];
	      	$hakakses=$session_data['hakakses'];
	    	if( $hakakses=="pangkalan")
	      	{
	      		$datapesanonline['hasil'] = $this->m_pesanonline->getby($idPangkalan);
				$this->load->view('header');
		 		$this->load->view('header_pegawai', $data);
		  		$this->load->view('pangkalan/v_mengelola_pesanonline', $datapesanonline);
		  		$this->load->view('footer');
		  	}
			else
	   		{
	     //If no session, redirect to login page
	     		redirect('index.php/c_login/logout', 'refresh');
	   		}
	   	}
	   	else
	   	{

	   		redirect('index.php/c_login/logout', 'refresh');
	   	}
	//	redirect('index.php/kelola_pangkalan');
	}

}


/* Location: ./application/controllers/welcome.php */