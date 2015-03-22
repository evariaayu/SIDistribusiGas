<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Kelola_operasional extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session'));
        $this->load->model('m_operasional');
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

	      //$dataoperasional['hasil'] = $this->m_operasional->getall();

	      $this->load->view('header');
		  $this->load->view('header_pegawai', $data);
		  $data['hasil'] = $this->m_operasional->get_all()->result();
		  //$this->load->view('pegawai/v_mengelola_biayaoperasioanl',$dataoperasional);
		  $this->load->view('pegawai/v_mengelola_biayaoperasional');
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
	function do_upload()
	{
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '20480000';
		
		
		$this->load->library('upload', $config);
		for($i=1;$i<4;$i++)
		{
			$upload = $this->upload->do_upload('image'.$i);
			if($upload===FALSE) 
			{
				echo "error";
				continue;
			}
				
			$data = $this->upload->data();

			$uploadedFiles[$i] = $data;

		}
		//redirect('index.php/Kelola_operasional', 'refresh');
/*
		if ( ! $this->Kelola_operasional->do_upload())
		{
			echo "error";
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('form_tambahbiayaoperasional-old', $error);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			echo "sukses";
			//$this->load->view('upload_success', $data);
		}*/
	}


}