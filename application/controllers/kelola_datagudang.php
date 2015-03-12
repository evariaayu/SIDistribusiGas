<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Kelola_datagudang extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session'));
        $this->load->model('m_penukaranbarang');
        $this->load->helper('form');
        $this->load->helper('url');
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

	      $datatukarbarang['hasil'] = $this->m_penukaranbarang->getall();

	      $this->load->view('header');
		  $this->load->view('header_pegawai', $data);
		  $this->load->view('pegawai/v_mengelola_datagudang', $datatukarbarang);
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

		    $datatukarbarang['hasil'] = $this->m_penukaranbarang->getall();

			$this->load->view('header');
		 	$this->load->view('header_pegawai', $data);
		  	$this->load->view('pegawai/form_tambahpenukaranbarang', $datatukarbarang);
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
		  	$tukarbarang=array
			(
			'jumlahbarangrusak' => $this->input->post('jumlahbarangrusak'),
			'jumlahbarangkosong' => $this->input->post('jumlahbarangkosong'),
			'idPegawai' => $idPegawai,
			'idPangkalan' => $this->input->post('idPangkalan')
			);
			$this->m_penukaranbarang->insert($tukarbarang);
			redirect('index.php/Kelola_datagudang');
	  	}
		
	}

	public function delete($idTukar_Barang)
	{
		$this->m_penukaranbarang->delete($idTukar_Barang);
		redirect('index.php/Kelola_datagudang');
	}

	public function edit($idTukar_Barang)
	{
		if($this->session->userdata('logged_in'))
		{
		    $session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['hakakses'] = $session_data['hakakses'];

		    $datatukarbarang['hasil'] = $this->m_penukaranbarang->getby($idTukar_Barang);
		
			$this->load->view('header');
			$this->load->view('header_pegawai', $data);
			$this->load->view('pegawai/form_editpenukaranbarang', $datatukarbarang);
		  	$this->load->view('footer');
	  }
		
	}

	public function update($idTukar_Barang)
	{
		$data['jumlahbarangkosong'] = $this->input->post('jumlahbarangkosong');
		$data['jumlahbarangrusak'] = $this->input->post('jumlahbarangrusak');
		$data['keterangan'] = $this->input->post('keterangan');
		$data['idTukar_Barang'] = $idTukar_Barang;
		
		$this->m_penukaranbarang->update($data);
		redirect('index.php/kelola_datagudang');
	}

}


/* Location: ./application/controllers/welcome.php */