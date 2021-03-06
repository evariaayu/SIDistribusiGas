<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Report_transaksigas extends CI_Controller {
	public $sesi;
    public function __construct() {
        parent::__construct();

        //load session and connect to database
        $this->load->library(array('form_validation','session'));
        $this->load->model('m_reporttransaksigas');
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
	      $data['idPegawai'] = $session_data['idPegawai'];

	      //$transaksigasonline['hasil'] = $this->m_reporttransaksigas->getallonline();
	      //$transaksigasoffline['hasiloffline'] = $this->m_reporttransaksigas->getalloffline();
	     


	      $this->load->view('header');
		  $this->load->view('header_pegawai', $data);
		  $this->load->view('direktur/v_report_transaksigas',$data);
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

	public function transaksi_gas_online($tahun)
	{
		
		if($this->session->userdata('logged_in'))
		{
	      $session_data = $this->session->userdata('logged_in');
	      $data['username'] = $session_data['username'];
	      $data['hakakses'] = $session_data['hakakses'];
	      $data['idPegawai'] = $session_data['idPegawai'];

	      if ($tahun == 'all'){
	      		$this->sesi['all']=$tahun;
	    		$transaksigasonline['hasil'] = $this->m_reporttransaksigas->getalldataonline();

			      $this->load->view('header', $this->sesi);
				  $this->load->view('header_pegawai', $data);
				  $this->load->view('direktur/v_report_transaksionline',$transaksigasonline);
				  $this->load->view('footer');

			}
			else {
				$this->sesi['tahun']=$tahun;
			      $transaksigasonline['hasil'] = $this->m_reporttransaksigas->getallonline($tahun);
			      //$transaksigasoffline['hasiloffline'] = $this->m_reporttransaksigas->getalloffline();
			      
			      $this->load->view('header', $this->sesi);
				  $this->load->view('header_pegawai', $data);
				  $this->load->view('direktur/v_report_transaksionline',$transaksigasonline);
				  //$this->load->view('direktur/v_report_transaksionline',$transaksigasoffline);
				  $this->load->view('footer');
			}
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

	/*public function transaksi_gas_online_all()
	{
		
		if($this->session->userdata('logged_in'))
		{
	      $session_data = $this->session->userdata('logged_in');
	      $data['username'] = $session_data['username'];
	      $data['hakakses'] = $session_data['hakakses'];
	      $data['idPegawai'] = $session_data['idPegawai'];

	      
	      $transaksigasonline['hasil'] = $this->m_reporttransaksigas->getallonline();
	      //$transaksigasoffline['hasiloffline'] = $this->m_reporttransaksigas->getalloffline();
	      
	      $this->load->view('header', $this->sesi);
		  $this->load->view('header_pegawai', $data);
		  $this->load->view('direktur/v_report_transaksionline',$transaksigasonline);
		  //$this->load->view('direktur/v_report_transaksionline',$transaksigasoffline);
		  $this->load->view('footer');

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

*/
	public function transaksi_gas_offline($tahun)
	{
		
		
		if($this->session->userdata('logged_in'))
		{
	    	$session_data = $this->session->userdata('logged_in');
	    	$data['username'] = $session_data['username'];
	    	$data['hakakses'] = $session_data['hakakses'];
	    	$data['idPegawai'] = $session_data['idPegawai'];

	    	if ($tahun == 'all'){
	    		$this->sesi['all']=$tahun;
	    		$transaksigasoffline['hasil'] = $this->m_reporttransaksigas->getalldataoffline();

			      $this->load->view('header', $this->sesi);
				  $this->load->view('header_pegawai', $data);
				  $this->load->view('direktur/v_report_transaksioffline',$transaksigasoffline);
				  $this->load->view('footer');

			}
			else {
					$this->sesi['tahun']=$tahun;
					$transaksigasoffline['hasil'] = $this->m_reporttransaksigas->getalloffline($tahun);

			      $this->load->view('header', $this->sesi);
				  $this->load->view('header_pegawai', $data);
				  $this->load->view('direktur/v_report_transaksioffline',$transaksigasoffline);
				  $this->load->view('footer');
			}
	  	}
	   else
	   {
	     //If no session, redirect to login page
	     redirect('index.php/c_login', 'refresh');
	   }
	}

	/*public function transaksi_gas_offline()
	{
		//$this->sesi['tahun']=$tahun;
		if($this->session->userdata('logged_in'))
		{
	    	$session_data = $this->session->userdata('logged_in');
	    	$data['username'] = $session_data['username'];
	    	$data['hakakses'] = $session_data['hakakses'];
	    	$data['idPegawai'] = $session_data['idPegawai'];

			$transaksigasoffline['hasil'] = $this->m_reporttransaksigas->getalloffline();

	      $this->load->view('header', $this->sesi);
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



	/*public function report_online_tahun($tahun)
	{

		if($this->session->userdata('logged_in'))
		{
	    	$session_data = $this->session->userdata('logged_in');
	    	$data['username'] = $session_data['username'];
	    	$data['hakakses'] = $session_data['hakakses'];
	    	$data['idPegawai'] = $session_data['idPegawai'];

			$this->sesi['tahun']=$tahun;

	      $this->load->view('header', $this->sesi);
	       $this->load->view('header_pegawai', $data);
	      $transaksigasonline['hasil'] = $this->m_reporttransaksigas->getallonline($tahun);
		  $this->load->view('direktur/v_report_transaksionline',$transaksigasonline);
		  $this->load->view('footer');
	  }
	   else
	   {
	     //If no session, redirect to login page
	     redirect('index.php/c_login', 'refresh');
	   }

	}*/
}