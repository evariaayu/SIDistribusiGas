<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Kelola_user extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session'));
        $this->load->model('m_user');
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
			$hakakses=$session_data['hakakses'];
	    	if( ($hakakses=="pegawai") || ($hakakses="direktur"))
	     	{
			    $datauser['hasil'] = $this->m_user->getall();
			    $datauser['hasil2'] = $this->m_pegawai->getall();

			    $this->load->view('header');
				$this->load->view('header_pegawai', $data);
				$this->load->view('pegawai/v_user', $datauser);
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
		     //If no session, redirect to login page
		    redirect('index.php/c_login/logout', 'refresh');
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
		    $hakakses=$session_data['hakakses'];
	    	if( ($hakakses=="pegawai") || ($hakakses="direktur"))
	     	{
			    $datapegawai['hasil'] = $this->m_pegawai->getall();
			    $datapegawai['pangkalan'] = $this->m_pangkalan->getall();

				$this->load->view('header');
			 	$this->load->view('header_pegawai', $data);
			  	$this->load->view('pegawai/v_user', $datapegawai);
			  	$this->load->view('footer');
			}
			else
			{
				redirect('index.php/c_login/logout', 'refresh');
			}
	  	}
	  	else
	   	{
	     //If no session, redirect to login page
	    	redirect('index.php/c_login/logout', 'refresh');
	   	}
	}

	public function insert()
	{
		$datauser=array
		(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'hakakses' => $this->input->post('hakakses'),
			'idPegawai' => $this->input->post('idPegawai'),			
		);
		$this->m_user->insert($datauser);
		redirect('index.php/kelola_user','refresh');
	}


}


/* Location: ./application/controllers/welcome.php */