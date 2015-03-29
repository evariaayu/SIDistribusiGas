<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class C_pesanonline extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session' , 'pagination'));
        $this->load->model('m_pesanonline');
        $this->load->model('m_pangkalan');
        
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
			//	$datapangkalan ['hasil']= $this->m_pesanonline->getby($session_data['username']);	
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
	      if($session_data['hakakses']=="pangkalan")
	      {
		      //$data['idPangkalan'] = $session_data['idPangkalan'];

		      //$data['idPangkalan'] = $session_data['idPangkalan'];
		      $datanamapangkalan ['hasil']= $this->m_pesanonline->getall($session_data['username']);	
		      $datanamapangkalan['harga']=$this->m_pesanonline->getharga();

		      //print_r($session_data);
		      //print_r($datanamapangkalan['hasil']);
		      //print_r($datanamapangkalan);
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

		$jumlahstok = $this->m_pesanonline->cekstok();

		//echo $jumlahstok[0]['jumlah_stok']; 

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
						'idPangkalan' => $this->input->post('idPangkalan'),
						'namapangkalan' => $this->input->post('username')

					);
					$this->m_pesanonline->insert($data);
					$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
					Data Berhasil ditambahkan. Jumlah Pembayaran =Rp $totalhargabeli <a href=".base_url('index.php/c_pesanonline/pesan')." class=\"alert-link\">Klik Untuk Pesan Kembali</a>
					</div>";
					
					$session_data = $this->session->userdata('logged_in');
				    $data['username'] = $session_data['username'];
				    $data['hakakses'] = $session_data['hakakses'];
				    if($session_data['hakakses']=="pangkalan")
				    {
					     //$data['idPangkalan'] = $session_data['idPangkalan'];

					      //$data['idPangkalan'] = $session_data['idPangkalan'];
					  $datanamapangkalan ['hasil']= $this->m_pesanonline->getall($session_data['username']);	
					  $datanamapangkalan['harga']=$this->m_pesanonline->getharga();

					      //print_r($session_data);
					      //print_r($datanamapangkalan['hasil']);
					      //print_r($datanamapangkalan);
					  $datanamapangkalan['success']=$sukses;
					  $this->load->view('header');
					  $this->load->view('header_pegawai', $data);
					  $this->load->view('pangkalan/form_pesanonline',$datanamapangkalan );
						   
					  $this->load->view('footer');
					}
					
            }
           
	//			$this->m_pesanonline->insert();
				//$this->load->model('m_pesanonline/insert');
				// print_r($data);
			
				/*$message = "Berhasil! Hore total = $totalhargabeli";

					echo "<script type='text/javascript'> alert('$message'); 
						window.location.href ='" . base_url() . "index.php/pangkalan';</script>";*/

				
		}
		else
		{
			//echo "<script type='text/javascript'>alert('gagal ! order melebihi jumlah stock');</script>";
			$sukses = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
			Stok Gudang tidak mencukupi kebutuhan <a href=".base_url('index.php/c_pesanonline/pesan')." class=\"alert-link\">Pesan Lagi</a>
			</div>";
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['hakakses'] = $session_data['hakakses'];
			if($session_data['hakakses']=="pangkalan")
			{
					     //$data['idPangkalan'] = $session_data['idPangkalan'];

					      //$data['idPangkalan'] = $session_data['idPangkalan'];
				$datanamapangkalan ['hasil']= $this->m_pesanonline->getall($session_data['username']);	
				$datanamapangkalan['harga']=$this->m_pesanonline->getharga();

					      //print_r($session_data);
					      //print_r($datanamapangkalan['hasil']);
					      //print_r($datanamapangkalan);
				$datanamapangkalan['success']=$sukses;
				$this->load->view('header');
				$this->load->view('pangkalan/header_pangkalan', $data);
				$this->load->view('pangkalan/form_pesanonline',$datanamapangkalan );
						   
				$this->load->view('footer');
			}
		}
	}

}


/* Location: ./application/controllers/welcome.php */