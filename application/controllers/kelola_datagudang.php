<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Kelola_datagudang extends CI_Controller {
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
		  //$this->load->view('pegawai/v_mengelola_biayaoperasioanl',$dataoperasional);
		  $this->load->view('pegawai/v_mengelola_datagudang');
		  $this->load->view('footer');
		}
	   else
	   {
	     //If no session, redirect to login page
	     redirect('index.php/c_login', 'refresh');
	   }
		
	}


	public function form_tambahpenukaranbarang()
	{
		if($this->session->userdata('logged_in'))
		{
		    $session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['hakakses'] = $session_data['hakakses'];
			$this->load->view('header');
		 	$this->load->view('header_pegawai', $data);
		  	$this->load->view('pegawai/form_tambahpenukaranbarang');
		  	$this->load->view('footer');
	  	}
	   	else
	   	{
	     //If no session, redirect to login page
	    	redirect('index.php/c_login', 'refresh');
	   	}
	}

	public function insert()
	{
		$datapangkalan=array
		(
			'namapangkalan' => $this->input->post('namapangkalan'),
			'alamatpangkalan' => $this->input->post('alamatpangkalan'),
			
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
		if($this->session->userdata('logged_in'))
		{
	      $session_data = $this->session->userdata('logged_in');
	      $data['username'] = $session_data['username'];
	      $data['hakakses'] = $session_data['hakakses'];
	      $datapangkalan['hasil']	= $this->m_pangkalan->getby($idPangkalan);
		
			$this->load->view('header');
			$this->load->view('header_pegawai', $data);
			$this->load->view('pegawai/form_editpangkalan', $datapangkalan);
		  	$this->load->view('footer');
	  }
		
	}

	public function update($idPangkalan)
	{
		if($this->input->post('submit'))
		{
			$this->m_pangkalan->update($idPangkalan);
			
		}
		redirect('index.php/kelola_pangkalan');
		print_r($datapangkalan);
	}

}


/* Location: ./application/controllers/welcome.php */