<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class C_cekpesanonline extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session'));
        $this->load->model('m_cekpesanonline');
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
	      $datapesanonline['hasil'] = $this->m_cekpesanonline->cekPesan();

	      //print_r($datapesanonline['hasil']);

	      $this->load->view('header');
		  $this->load->view('header_pegawai', $data);
		  $this->load->view('pegawai/form_cekpesanonline',$datapesanonline);
		  $this->load->view('footer');
		}
	   else
	   {
	     //If no session, redirect to login page
	     redirect('index.php/c_login', 'refresh');
	   }
		
	}

	public function update()
	{
		$jumlahGas = $this->input->post('jumlahGas');
		$idTransaksi_Online = $this->input->post('idTransaksi_Online');
		print_r($idTransaksi_Online);
		//$this->m_cekpesanonline->update($jumlahGas,$idTransaksi);
		//redirect('index.php/c_cekpesanonline', 'refresh');
	}

	public function delete($idTransaksi_Online)
	{
		$this->m_cekpesanonline->delete($idTransaksi_Online);
		redirect('index.php/c_cekpesanonline','refresh');
	}

}


/* Location: ./application/controllers/welcome.php */