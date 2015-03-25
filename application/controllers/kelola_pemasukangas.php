<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Kelola_pemasukangas extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session','pagination'));
        $this->load->model('m_pemasukangas');
        $this->load->model('m_penukaranbarang');
        $this->load->model('m_pangkalan');
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
	      	if($session_data['hakakses']=="pegawai")
			{
	      		$jumlah = $this->m_pemasukangas->jumlah();
				$config['base_url'] = base_url().'index.php/Kelola_pemasukangas/index';
				$config['total_rows'] = $jumlah;
				$config['per_page']=5;

				$dari = $this->uri->segment('3');
				$datapemasukangas['hasil'] = $this->m_pemasukangas->lihat($config['per_page'],$dari);
				$this->pagination->initialize($config); 
			   // $datapemasukangas['hasil'] = $this->m_pemasukangas->getall();
			    $datapemasukangas['stok_gudang'] = $this->m_penukaranbarang->ambilstokgudang();
			    $datapemasukangas['success'] = '';
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
			if($session_data['hakakses']=="pegawai")
			{
				$datapemasukangas['success']='';
				$this->load->view('header');
				$this->load->view('header_pegawai', $data);
			  	$this->load->view('pegawai/form_tambahpemasukangas',$datapemasukangas);
			  	$this->load->view('footer');
			}
			else
		   	{
		     //If no session, redirect to login page
		     redirect('index.php/c_login', 'refresh');
		 	}
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
				'idPegawai' => $idPegawai
			);
			$datetoday =date("Y-m-d");
			$datamasukgudang=array(
				'jumlah_stok' => $this->input->post('jumlahgas'),
				//'tanggal' => $datetoday
			);
		  	$this->m_pemasukangas->insert($datapemasukangas);
		  	$this->m_pemasukangas->insertstok($datamasukgudang);
		  	$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
					Data Berhasil ditambahkan <a href=".base_url('index.php/Kelola_pemasukangas')." class=\"alert-link\">Kembali?</a>
					</div>";
					$session_data = $this->session->userdata('logged_in');
		    		$data['username'] = $session_data['username'];
		    		$data['hakakses'] = $session_data['hakakses'];
		    		$data['idPegawai'] = $session_data['idPegawai'];
		    		$datapemasukangas['success'] = $sukses;
					$this->load->view('header');
					$this->load->view('header_pegawai', $data);
				  	$this->load->view('pegawai/form_tambahpemasukangas',$datapemasukangas);
				  	$this->load->view('footer');
		//	redirect('index.php/Kelola_pemasukangas');
	  	}
	}

	public function delete($idPemasukan)
	{
		$this->m_pemasukangas->delete($idPemasukan);
		//redirect('index.php/Kelola_pemasukangas');
		if($this->session->userdata('logged_in'))
		{
	      $session_data = $this->session->userdata('logged_in');
	      $data['username'] = $session_data['username'];
	      $data['hakakses'] = $session_data['hakakses'];
			if($session_data['hakakses']=="pegawai")
			{
			$jumlah = $this->m_pemasukangas->jumlah();
					    	 $datapemasukangas['hasil'] = $this->m_pemasukangas->getall();
		    	$datapemasukangas['stok_gudang'] = $this->m_penukaranbarang->ambilstokgudang();
		      	$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  						<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
						Data Berhasil dihapus
						</div>";
			    $datapemasukangas['success'] = $sukses;
			    $this->load->view('header');
				$this->load->view('header_pegawai', $data);
				$this->load->view('pegawai/v_mengelola_pemasukangas', $datapemasukangas);
				$this->load->view('footer');
				echo "<script type='text/javascript'>
				window.setTimeout(function(){window.location.href ='" . base_url() . "index.php/Kelola_pemasukangas';}, 2000);

				</script>";
			}
			else
		   	{
		     //If no session, redirect to login page
		     redirect('index.php/c_login', 'refresh');
		 	}
		}
	}

	public function edit($idPemasukan)
	{
		if($this->session->userdata('logged_in'))
		{
	     	$session_data = $this->session->userdata('logged_in');
	      	$data['username'] = $session_data['username'];
	      	$data['hakakses'] = $session_data['hakakses'];
	      	$data['idPegawai'] = $session_data['idPegawai'];

	      	$datapemasukangas['hasil']	= $this->m_pemasukangas->getby($idPemasukan);
			
			$this->load->view('header');
			$this->load->view('header_pegawai', $data);
			$this->load->view('pegawai/form_editpemasukangas', $datapemasukangas);
		  	$this->load->view('footer');
	  }
		
	}

	public function update($idPemasukan)
	{
		
		$data['jumlahgas'] = $this->input->post('jumlahgas');
		$data['hargabeli'] = $this->input->post('hargabeli');
		$data['hargajual'] = $this->input->post('hargajual');
		$data['idPemasukan'] = $idPemasukan;
		$this->m_pemasukangas->update($data);
		
		redirect('index.php/Kelola_pemasukangas');
	}

}


/* Location: ./application/controllers/welcome.php */