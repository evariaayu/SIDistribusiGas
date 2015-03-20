<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Kelola_pegawai extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session'));
        $this->load->model('m_pegawai');
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

	      $datapegawai['hasil'] = $this->m_pegawai->getall();

	      $this->load->view('header');
		  $this->load->view('header_pegawai', $data);
		  $this->load->view('direktur/v_mengelolapegawai',$datapegawai);
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
	public function form_tambahdata()
	{
		if($this->session->userdata('logged_in'))
		{
	      $session_data = $this->session->userdata('logged_in');
	      $data['username'] = $session_data['username'];
	      $data['hakakses'] = $session_data['hakakses'];
		$this->load->view('header');
	 	$this->load->view('header_pegawai', $data);
	  	$this->load->view('direktur/form_tambahdatapegawai');
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
		$datapegawai=array
		(
			'namapegawai' => $this->input->post('namapegawai'),
			'alamatpegawai' => $this->input->post('alamatpegawai'),
			
		);
		$this->m_pegawai->insert($datapegawai);
		redirect('index.php/kelola_pegawai');
		
	   
	 //  print_r($datapangkalan);
	}

	public function delete($idPegawai)
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

		$data['namapangkalan'] = $this->input->post('namapangkalan');
		$data['alamatpangkalan'] = $this->input->post('alamatpangkalan');
		$data['idPangkalan'] = $idPangkalan;
		$this->m_pangkalan->update($data);

		redirect('index.php/kelola_pangkalan');

	}

}


/* Location: ./application/controllers/welcome.php */