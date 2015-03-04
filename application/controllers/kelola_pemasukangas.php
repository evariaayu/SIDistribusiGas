<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Kelola_pemasukangas extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session'));
        $this->load->model('m_pemasukangas');
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
	      $data['idPegawai'] = $session_data['idPegawai'];

	      $datapemasukangas['hasil'] = $this->m_pemasukangas->getall();

	      $this->load->view('header');
		  $this->load->view('header_pegawai', $data);
		  $this->load->view('pegawai/v_mengelola_pemasukangas',$datapemasukangas);
		  $this->load->view('footer');
		}
	   else
	   {
	     //If no session, redirect to login page
	     redirect('index.php/c_login', 'refresh');
	   }
		
	}

	public function form_tambahgas()
	{
		if($this->session->userdata('logged_in'))
		{
	    	$session_data = $this->session->userdata('logged_in');
	    	$data['username'] = $session_data['username'];
	    	$data['hakakses'] = $session_data['hakakses'];
	    	$data['idPegawai'] = $session_data['idPegawai'];

			$this->load->view('header');
			$this->load->view('header_pegawai', $data);
		  	$this->load->view('pegawai/form_tambahpemasukangas');
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
		if($this->session->userdata('logged_in'))
		{
	    	$session_data = $this->session->userdata('logged_in');
	    	$idPegawai = $session_data['idPegawai'];
		  	$datapemasukangas=array
			(
				'jumlahgas' => $this->input->post('jumlahgas'),
				'hargabeli' => $this->input->post('hargabeli'),
				'hargajual' => $this->input->post('hargajual'),
				'idPegawai' => $idPegawai,
			);

		  	$this->m_pemasukangas->insert($datapemasukangas);
			redirect('index.php/Kelola_pemasukangas');
	  	}
	}

	public function delete($idPangkalan)
	{
		$this->m_pangkalan->delete($idPangkalan);
		redirect('index.php/Kelola_pemasukangas');
	}

	public function edit($idPangkalan)
	{
		if($this->session->userdata('logged_in'))
		{
	      $session_data = $this->session->userdata('logged_in');
	      $data['username'] = $session_data['username'];
	      $data['hakakses'] = $session_data['hakakses'];
	      $datapangkalan['hasil']	= $this->m_pemasukangas->getby($idPangkalan);
		
			$this->load->view('header');
			$this->load->view('header_pegawai', $data);
			$this->load->view('pegawai/form_editpangkalan', $datapemasukangas);
		  	$this->load->view('footer');
	  }
		
	}

	public function update($idPangkalan)
	{
		if($this->input->post('submit'))
		{
			$this->m_pangkalan->update($idPangkalan);
			
		}
		redirect('index.php/Kelola_pemasukan');
	}

}


/* Location: ./application/controllers/welcome.php */