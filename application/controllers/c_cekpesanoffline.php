<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class C_cekpesanoffline extends CI_Controller {
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
	      $datapesanoffline['hasil'] = $this->m_cekpesanoffline->cekPesan();

	      //print_r($datapesanonline['hasil']);

	      $this->load->view('header');
		  $this->load->view('header_pegawai', $data);
		  $this->load->view('pegawai/form_cekpesanoffline',$datapesanoffline);
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
		$idTransaksi_Offline = $this->input->post('idTransaksi_Offline');
	//	print_r($idTransaksi_Online);
		$this->m_cekpesanoffline->update($jumlahGas,$idTransaksi_Offline);
		redirect('index.php/c_cekpesanoffline', 'refresh');
		
	}

	public function delete($idTransaksi_Onffline)
	{
		$this->m_cekpesanoffline->delete($idTransaksi_Onffline);
		redirect('index.php/c_cekpesanoffline','refresh');
	}

}


/* Location: ./application/controllers/welcome.php */