<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class C_cekpesanonline extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session'));
        $this->load->model('m_cekpesanonline');
        $this->load->model('m_penukaranbarang');
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
	      	$hakakses=$session_data['hakakses'];
	      	if($hakakses=="pegawai" || $hakakses=="direktur")
	      	{
	      		$datapesanonline['hasil'] = $this->m_cekpesanonline->cekPesan();

	      //print_r($datapesanonline['hasil']);
	      		$datapesanonline['success']='';
	      		$this->load->view('header');
		  		$this->load->view('header_pegawai', $data);
		  		$this->load->view('pegawai/form_cekpesanonline',$datapesanonline);
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

	public function update()
	{
		$jumlahGas = $this->input->post('jumlahGas');
		$idTransaksi_Online = $this->input->post('idTransaksi_Online');
	//	print_r($idTransaksi_Online);
		$this->m_cekpesanonline->update($jumlahGas,$idTransaksi_Online);
		redirect('index.php/c_cekpesanonline', 'refresh');
		
	}

	public function delete($idTransaksi_Online)
	{
		$this->m_cekpesanonline->delete($idTransaksi_Online);
		redirect('index.php/c_cekpesanonline','refresh');
	}
	public function editbaru($idTransaksi_Online)
	{
		if($this->session->userdata('logged_in'))
		{
	     	$session_data = $this->session->userdata('logged_in');
	      	$data['username'] = $session_data['username'];
	      	$data['hakakses'] = $session_data['hakakses'];
	      	$data['idPegawai'] = $session_data['idPegawai'];
			$hakakses=$session_data['hakakses'];
	      	if($hakakses=="pegawai" || $hakakses=="direktur")
	      	{
		      	$datapesanonline['hasil']	= $this->m_cekpesanonline->getby($idTransaksi_Online);
		      	$datapesanonline['hasilstatus']	= $this->m_cekpesanonline->getall_status();
				$datapesanonline['success']='';
				$datapesanonline['stok_gudang'] = $this->m_penukaranbarang->ambilstokgudang();
				$this->load->view('header');
				$this->load->view('header_pegawai', $data);
				$this->load->view('pegawai/form_editpesanonline', $datapesanonline);
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

	public function updatebaru($idTransaksi_Online)
	{
		$data['jumlahGas'] 			= $this->input->post('jumlahGas');
		$data['idstatus_pemesanan'] = $this->input->post('idstatus_pemesanan');
		$data['idTransaksi_Online'] = $idTransaksi_Online;

		$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
					Data berhasil diubah <a href=".base_url('index.php/c_cekpesanonline')." class=\"alert-link\">Kembali?</a>
					</div>";

		$this->m_cekpesanonline->updatebaru($data);
		if($this->session->userdata('logged_in'))
		{
	     	$session_data = $this->session->userdata('logged_in');
	      	$data['username'] = $session_data['username'];
	      	$data['hakakses'] = $session_data['hakakses'];
	      	$data['idPegawai'] = $session_data['idPegawai'];
	      	$hakakses=$session_data['hakakses'];
	    	if( ($hakakses=="pegawai") || ($hakakses="direktur"))
	      	{

		      	$datapesanonline['hasil']	= $this->m_cekpesanonline->getby($idTransaksi_Online);
		      	$datapesanonline['hasilstatus']	= $this->m_cekpesanonline->getall_status();
				$datapesanonline['success']=$sukses;
				$datapesanonline['stok_gudang'] = $this->m_penukaranbarang->ambilstokgudang();
				$this->load->view('header');
				$this->load->view('header_pegawai', $data);
				$this->load->view('pegawai/form_editpesanonline', $datapesanonline);
			  	$this->load->view('footer');
			}
	 	}
	//	redirect('index.php/Kelola_pemasukangas');
	}

}


/* Location: ./application/controllers/welcome.php */