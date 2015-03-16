<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class C_pesanonline extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session'));
        $this->load->model('m_pesanonline');
        $this->load->helper('form');
        $this->load->helper('url');
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
	      //$data['idPangkalan'] = $session_data['idPangkalan'];

	      $datanamapangkalan ['hasil']= $this->m_pesanonline->getall();	
	      $datanamapangkalan['harga']=$this->m_pesanonline->getharga();


	      print_r($datanamapangkalan);
	      $this->load->view('header');
		  $this->load->view('pangkalan/header_pangkalan', $data);
		  $this->load->view('pangkalan/form_pesanonline',$datanamapangkalan);
		   
		  $this->load->view('footer');
		}
	   else
	   {
	     //If no session, redirect to login page
	     redirect('index.php/c_login', 'refresh');
	   }
		
	}

	public function form_pesanonline()
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
		$waktu = $this->input->post('waktu');
		$pangkalan = $this->input->post('idPangkalan');
		$harga = $this->input->post('harga');
		$jumlahorder = $this->input->post('jumlahorder');

		$jumlahstok = $this->m_pesanonline->cekstok();

		//echo $jumlahstok[0]['jumlah_stok'];

		if($jumlahorder<=$jumlahstok[0]['jumlah_stok'])
		{
			
			$totalhargabeli = $harga*$jumlahorder;
			$this->load->model('m_pesanonline/insert');
			$message = "Berhasil! Hore total = $totalhargabeli";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else
		{
			alert("gagal!");
		}
	}
	

	/*public function insert()
	{
		$datapangkalan=array
		(
			'namapangkalan' => $this->input->post('namapangkalan'),
			'alamatpangkalan' => $this->input->post('alamatpangkalan'),
			'notelppangkalan' => $this->input->post('notelppangkalan'),
		);
		$this->m_pangkalan->insert($datapangkalan);
		redirect('index.php/kelola_pangkalan');
		
	   
	 //  print_r($datapangkalan);
	}

	public function delete($idPangkalan)
	{
		$this->m_pangkalan->delete($idPangkalan);
		redirect('index.php/kelola_pangkalan');
	}

	public function edit($idPangkalan)
	{
		$datapangkalan['hasil']	= $this->m_pangkalan->getby($idPangkalan);
		$this->load->view('pegawai/form_editpangkalan', $datapangkalan);
	}

	public function update($idPangkalan)
	{
		if($this->input->post('submit'))  
		{
			$this->m_pangkalan->update($idPangkalan);
			redirect('index.php/kelola_pangkalan');
		}
	}

	public function submit()	
	{
			$jumlahorder = $this->input-post('jumlahorder');
			$batas = $this->m_pesanonline->cekstok();
			if($jumlahorder <= $batas) 
			{
				echo'tersedia'; echo $jumlahorder;
			}
	        else
	        {
	        	echo'tidak tersedia';
	        }
	}*/

}


/* Location: ./application/controllers/welcome.php */