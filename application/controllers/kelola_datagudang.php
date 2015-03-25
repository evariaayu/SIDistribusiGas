<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Kelola_datagudang extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session'));
        $this->load->model('m_penukaranbarang');
        $this->load->model('m_pangkalan');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('m_operasional');
        $this->load->library("pagination");
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
			if($session_data['hakakses']=="pegawai")
			{

				$jumlah = $this->m_penukaranbarang->jumlah();
				$config['base_url'] = base_url().'index.php/kelola_datagudang/index';
				$config['total_rows'] = $jumlah;
				$config['per_page']=5;

				$dari = $this->uri->segment('3');
				$datatukarbarang['hasil'] = $this->m_penukaranbarang->lihat($config['per_page'],$dari);
				$this->pagination->initialize($config); 



			//	$datatukarbarang['hasil'] = $this->m_penukaranbarang->getall();
		    	$datatukarbarang['stok_gudang'] = $this->m_penukaranbarang->ambilstokgudang();
		    	$datatukarbarang['success'] = '';
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
			if($session_data['hakakses']=="pegawai")
			{
		    	$datatukarbarang['hasil'] = $this->m_pangkalan->getall();
		    	$datatukarbarang['stok_gudang'] = $this->m_penukaranbarang->ambilstokgudang();
		    	$datatukarbarang['success'] ='';

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
			$stok_gudang = $this->m_penukaranbarang->ambilstokgudang();
			$jumlah_stok = $stok_gudang[0]->jumlah_stok;

	    	$session_data = $this->session->userdata('logged_in');
	    	$idPegawai = $session_data['idPegawai'];
			
			$jumlahbarangrusak = $this->input->post('jumlahbarangrusak');
			$jumlahbarangkosong = $this->input->post('jumlahbarangkosong');
			$totaltukar = $jumlahbarangrusak + $jumlahbarangkosong;
			if($totaltukar<=$jumlah_stok)
			{
				$tukarbarang=array
				(
					'jumlahbarangrusak' => $jumlahbarangrusak,
					'jumlahbarangkosong' => $jumlahbarangkosong,
					'idPegawai' => $idPegawai,
					'idPangkalan' => $this->input->post('idPangkalan')
				);

				$datetoday =date("Y-m-d");
				$pengurangan=array(
					'jumlahbarangrusak' => $this->input->post('jumlahbarangrusak'),
					'jumlahbarangkosong' => $this->input->post('jumlahbarangkosong'),
					'tanggal' =>$datetoday
				);
				$query= $this->m_penukaranbarang->updatekurangdatagudang($pengurangan);
				$query2=$this->m_penukaranbarang->insert($tukarbarang);
				
					$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
					Data Berhasil ditambahkan <a href=".base_url('index.php/kelola_datagudang')." class=\"alert-link\">Kembali?</a>
					</div>";
					$session_data = $this->session->userdata('logged_in');
				    $data['username'] = $session_data['username'];
				    $data['hakakses'] = $session_data['hakakses'];
				    $datatukarbarang['hasil'] = $this->m_pangkalan->getall();
				    $datatukarbarang['stok_gudang'] = $this->m_penukaranbarang->ambilstokgudang();
				    $datatukarbarang['success'] = $sukses;
					$this->load->view('header');
				 	$this->load->view('header_pegawai', $data);
				  	$this->load->view('pegawai/form_tambahpenukaranbarang', $datatukarbarang);
				  	$this->load->view('footer');
				
			}
			else
			{
				$sukses = "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
				Stok Gudang tidak mencukupi kebutuhan <a href=".base_url('index.php/kelola_datagudang')." class=\"alert-link\">Kembali?</a>
				</div>";
				$session_data = $this->session->userdata('logged_in');
			    $data['username'] = $session_data['username'];
			    $data['hakakses'] = $session_data['hakakses'];
			    $datatukarbarang['hasil'] = $this->m_pangkalan->getall();
			    $datatukarbarang['stok_gudang'] = $this->m_penukaranbarang->ambilstokgudang();
			    $datatukarbarang['success'] = $sukses;
				$this->load->view('header');
			 	$this->load->view('header_pegawai', $data);
			  	$this->load->view('pegawai/form_tambahpenukaranbarang', $datatukarbarang);
			  	$this->load->view('footer');
			}
		}
		
	}

	public function delete($idTukar_Barang)
	{
		$this->m_penukaranbarang->delete($idTukar_Barang);
		if($this->session->userdata('logged_in'))
		{
	      $session_data = $this->session->userdata('logged_in');
	      $data['username'] = $session_data['username'];
	      $data['hakakses'] = $session_data['hakakses'];
			if($session_data['hakakses']=="pegawai")
			{
		      $datatukarbarang['hasil'] = $this->m_penukaranbarang->getall();
		      $datatukarbarang['stok_gudang'] = $this->m_penukaranbarang->ambilstokgudang();
		      $sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  						<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
						Data Berhasil dihapus
						</div>";
		      $datatukarbarang['success'] = $sukses;
		      $this->load->view('header');
			  $this->load->view('header_pegawai', $data);
			  $this->load->view('pegawai/v_mengelola_datagudang', $datatukarbarang);
			  $this->load->view('footer');
			echo "<script type='text/javascript'>
				window.setTimeout(function(){window.location.href ='" . base_url() . "index.php/kelola_datagudang';}, 2000);

				</script>";
			}
			else
		   	{
		     //If no session, redirect to login page
		     redirect('index.php/c_login', 'refresh');
		 	}
		}
		//redirect('index.php/Kelola_datagudang/success');
	}

	public function edit($idTukar_Barang)
	{
		if($this->session->userdata('logged_in'))
		{
		    $session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['hakakses'] = $session_data['hakakses'];
			if($session_data['hakakses']=="pegawai")
			{
		    	$datatukarbarang['hasil'] = $this->m_penukaranbarang->getby($idTukar_Barang);
		
				$this->load->view('header');
				$this->load->view('header_pegawai', $data);
				$this->load->view('pegawai/form_editpenukaranbarang', $datatukarbarang);
		  		$this->load->view('footer');
		  	}
				else
	  		 {
	    	 //If no session, redirect to login page
	    	 redirect('index.php/c_login', 'refresh');
	   		}
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