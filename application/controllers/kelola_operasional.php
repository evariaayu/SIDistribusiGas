<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Kelola_operasional extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session'));
        $this->load->model('m_operasional');
        $this->load->helper('html');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
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

	      $dataoperasional['hasil'] = $this->m_operasional->getall();

	      $this->load->view('header');
		  $this->load->view('header_pegawai', $data);
		  $this->load->view('pegawai/v_mengelola_biayaoperasional',$dataoperasional);
		  $this->load->view('footer');
		}
	   else
	   {
	     //If no session, redirect to login page
	     redirect('index.php/c_login', 'refresh');
	   }
		
	}


	public function form_tambahbiayaoperasional()
	{
		if($this->session->userdata('logged_in'))
		{
		    $session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['hakakses'] = $session_data['hakakses'];
			$this->load->view('header');
		 	$this->load->view('header_pegawai', $data);
		  	$this->load->view('pegawai/form_tambahbiayaoperasional-old');
		  	$this->load->view('footer');
	  	}
	   	else
	   	{
	     //If no session, redirect to login page
	    	redirect('index.php/c_login', 'refresh');
	   	}
	}

	public function form_tambahbiayalain()
	{
		if($this->session->userdata('logged_in'))
		{
		    $session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['hakakses'] = $session_data['hakakses'];
			$this->load->view('header');
		 	$this->load->view('header_pegawai', $data);
		  	$this->load->view('pegawai/form_tambahbiayaoperasional');
		  	$this->load->view('footer');
	  	}
	   	else
	   	{
	     //If no session, redirect to login page
	    	redirect('index.php/c_login', 'refresh');
	   	}
	}

/*
	public function form_coba()
	{
		if($this->session->userdata('logged_in'))
		{
		    $session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['hakakses'] = $session_data['hakakses'];
			$this->load->view('header');
		 	$this->load->view('header_pegawai', $data);
		  	$this->load->view('pegawai/cobarow');
		  	$this->load->view('footer');
	  	}
	   	else
	   	{
	     //If no session, redirect to login page
	    	redirect('index.php/c_login', 'refresh');
	   	}
	}*/

	function do_upload()
	{
		if($this->session->userdata('logged_in'))
		{
		    $session_data = $this->session->userdata('logged_in');
		    $idPegawai= $session_data['idPegawai'];
		    $datebaru = date('Y-m-d H:i:s');
		    $datebaru = str_replace( ':', '', $datebaru);
			$config['upload_path'] = './uploads/'.$datebaru;
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['remove_spaces'] = 'TRUE';
			$config['overwrite'] ='FALSE';
			
			
			$this->load->library('upload', $config);
			
			if (!is_dir('uploads/'.$datebaru)) 
			{
    			mkdir('./uploads/' . $datebaru, 0777, TRUE);
    			$uploadpam=$this->upload->do_upload('filePAM');
				if($uploadpam == TRUE)
				{
					 $datapam = $this->upload->data('filePAM');
					 $pathpam=$datapam['file_name'];
				}
				elseif($uploadpam== FALSE)
				{
					echo "error file pam";
				}
				$uploadpln=$this->upload->do_upload('filePLN');
				if($uploadpln == TRUE)
				{
					 $datapln = $this->upload->data('filePLN');
					 $pathpln=$datapln['file_name'];
				}
				elseif($uploadpln== FALSE)
				{
					echo "error file pln";
				}
				$uploadinternet=$this->upload->do_upload('fileInternet');
				if($uploadinternet == TRUE)
				{
					 $datainternet = $this->upload->data('fileInternet');
					 $pathinternet=$datainternet['file_name'];
				}
				elseif($uploadinternet== FALSE)
				{
					echo "error fileInternet";
				}
				$pengeluaranPAM = $this->input->post('pengeluaranPAM');
				$pengeluaranPLN = $this->input->post('pengeluaranPLN');
				$pengeluaranInternet = $this->input->post('pengeluaranInternet');
				$total = $pengeluaranInternet + $pengeluaranPAM + $pengeluaranPLN;
			//	print_r($total);
				$dataoperasional=array
				(
					'pengeluaranPAM' => $this->input->post('pengeluaranPAM'),
					'filePAM' => $pathpam,
					'pengeluaranPLN' => $this->input->post('pengeluaranPLN'),
					'filePLN' => $pathpln,
					'pengeluaranInternet' => $this->input->post('pengeluaranInternet'),
					'fileInternet' => $pathinternet,
					'idPegawai' => $idPegawai,
					'namafolder' => $datebaru,
					'total' => $total
					
				);
				//print_r($dataoperasional);
				$this->m_operasional->insert($dataoperasional);
				redirect('index.php/kelola_operasional','refresh');
			    
	    	}
			
	  	}
	}

	function delete($idPengeluaran_Tetap)
	{
		$this->m_operasional->delete($idPengeluaran_Tetap);
		redirect('index.php/Kelola_operasional');
	}

	function do_uploadlain()
	{
		if($this->session->userdata('logged_in'))
		{
		    $session_data = $this->session->userdata('logged_in');
		    $idPegawai= $session_data['idPegawai'];
		    $datebaru = date('Y-m-d H:i:s');
		    $datebaru = str_replace( ':', '', $datebaru);
			$config['upload_path'] = './uploads/'.$datebaru;
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['remove_spaces'] = 'TRUE';
			$config['overwrite'] ='FALSE';
			
			
			$this->load->library('upload', $config);
			
			if (!is_dir('uploads/'.$datebaru)) 
			{
    			mkdir('./uploads/' . $datebaru, 0777, TRUE);
    			$uploadpam=$this->upload->do_upload('filePAM');
				if($uploadpam == TRUE)
				{
					 $datapam = $this->upload->data('filePAM');
					 $pathpam=$datapam['file_name'];
				}
				elseif($uploadpam== FALSE)
				{
					echo "error file pam";
				}
				$uploadpln=$this->upload->do_upload('filePLN');
				if($uploadpln == TRUE)
				{
					 $datapln = $this->upload->data('filePLN');
					 $pathpln=$datapln['file_name'];
				}
				elseif($uploadpln== FALSE)
				{
					echo "error file pln";
				}
				$uploadinternet=$this->upload->do_upload('fileInternet');
				if($uploadinternet == TRUE)
				{
					 $datainternet = $this->upload->data('fileInternet');
					 $pathinternet=$datainternet['file_name'];
				}
				elseif($uploadinternet== FALSE)
				{
					echo "error fileInternet";
				}

				$dataoperasional=array
				(
					'pengeluaranPAM' => $this->input->post('pengeluaranPAM'),
					'filePAM' => $pathpam,
					'pengeluaranPLN' => $this->input->post('pengeluaranPLN'),
					'filePLN' => $pathpln,
					'pengeluaranInternet' => $this->input->post('pengeluaranInternet'),
					'fileInternet' => $pathinternet,
					'idPegawai' => $idPegawai,
					'namafolder' => $datebaru
					
				);
				//print_r($dataoperasional);
				$this->m_operasional->insert($dataoperasional);
				redirect('index.php/kelola_operasional','refresh');
			    
	    	}
			
	  	}
	}


}