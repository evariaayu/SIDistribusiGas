<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Report_biayaoperasional extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session'));
        $this->load->model('m_reportbiayaoperasional');
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

	      //$transaksigasonline['hasil'] = $this->m_reporttransaksigas->getallonline();
	      //$transaksigasoffline['hasiloffline'] = $this->m_reporttransaksigas->getalloffline();
	      
	      $this->load->view('header');
		  $this->load->view('header_pegawai', $data);
		  $this->load->view('direktur/v_report_biayaoperasional',$data);
		  $this->load->view('footer');
		  /*
	      $this->load->view('header');
		  $this->load->view('header_pegawai', $data);
		  $this->load->view('direktur/v_report_transaksionline',$transaksigasonline);
		  //$this->load->view('direktur/v_report_transaksionline',$transaksigasoffline);
		  $this->load->view('footer');*/

		  //$this->load->model('m_reporttransaksigas');
		//$data['records']=$this->m_reporttrasaksigas->getallonline();
			//echo '<pre>';
			//var_dump($data);
			//echo '</pre>';
		//$this->load->view('pegawai/v_report_transaksigas',$data);
		}
	   else
	   {
	     //If no session, redirect to login page
	     redirect('index.php/c_login', 'refresh');
	   }
	}

	public function biaya_operasional()
	{
		if($this->session->userdata('logged_in'))
		{
	      $session_data = $this->session->userdata('logged_in');
	      $data['username'] = $session_data['username'];
	      $data['hakakses'] = $session_data['hakakses'];
	      $data['idPegawai'] = $session_data['idPegawai'];

	      $biayaoperasional['hasil'] = $this->m_reportbiayaoperasional->getbiayaoperasional();
	      
	      //$transaksigasoffline['hasiloffline'] = $this->m_reporttransaksigas->getalloffline();
	      
	      /*$this->load->view('header');
		  $this->load->view('header_pegawai', $data);
		  $this->load->view('direktur/v_report_biayaoperasional',$biayaoperasional);
		  //$this->load->view('direktur/v_report_transaksionline',$transaksigasoffline);
		  $this->load->view('footer');*/
		  print_r($biayaoperasional);
		 $this->load->model('m_reportbiayaoperasional');
		$biayaoperasional['data'] = $this->m_reportbiayaoperasional->getbiayaoperasional();
		
		$this->load->view('pegawai/v_report_biayaoperasional',$data);
		}
	   else
	   {
	     //If no session, redirect to login page
	     redirect('index.php/c_login', 'refresh');
	   }
	}

	/*public function transaksi_gas_offline()
	{
		if($this->session->userdata('logged_in'))
		{
	    	$session_data = $this->session->userdata('logged_in');
	    	$data['username'] = $session_data['username'];
	    	$data['hakakses'] = $session_data['hakakses'];
	    	$data['idPegawai'] = $session_data['idPegawai'];

			$transaksigasoffline['hasiloffline'] = $this->m_reporttransaksigas->getalloffline();

	      $this->load->view('header');
		  $this->load->view('header_pegawai', $data);
		  $this->load->view('direktur/v_report_transaksioffline',$transaksigasoffline);
		  $this->load->view('footer');
	  }
	   else
	   {
	     //If no session, redirect to login page
	     redirect('index.php/c_login', 'refresh');
	   }
	}*/



	


}