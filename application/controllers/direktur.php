<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Direktur extends CI_Controller {
	public $sesi;
    public function __construct() 
    {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session'));
        if ($this->session->userdata('logged_in')) {
			$session_data=$this->session->userdata('logged_in');
			$this->sesi['tahun']=$session_data['tahun'];
			
			
		}
		else{
			$this->sesi['tahun']=getdate()['year'];
			

		}
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
	      
	     // $this->load->view('home_view', $data);
	      $this->load->view('header');
		  $this->load->view('header_pegawai', $data);
		  $this->load->view('pegawai/h_pegawai');
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */