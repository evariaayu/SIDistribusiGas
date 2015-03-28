<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class C_pesanoffline extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session'));
        $this->load->model('m_pesanoffline');
        $this->load->helper('form');
        $this->load->helper('url');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/inderx.php/welcome/index
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
	      //$data['idPegawai'] = $session_data['idPegawai'];

	      //$data['idPangkalan'] = $session_data['idPangkalan'];
	      //$datanamapangkalan ['hasil']= $this->m_pesanoffline->getall($session_data['username']);
		  //$datanamapangkalan['hasil'] = $this->m_pesanoffline->getall();	
		      $datanamapangkalan['harga']= $this->m_pesanoffline->getharga();
		      $datanamapangkalan['hasil'] = $this->m_pesanoffline->getall();

		      $this->load->view('header');
			  $this->load->view('header_pegawai', $data);
			  $this->load->view('pegawai/form_pesanoffline',$datanamapangkalan );
			   
			  $this->load->view('footer');
		  }
		  else
		  {
		  	redirect('index.php/c_login', 'refresh');
		  }
		}
	   else
	   {
	     //If no session, redirect to login page
	       redirect('index.php/c_login', 'refresh');
	   }
		
	}

	/*public function form_pesanonline()
	{
		if($this->session->userdata('logged_in'))
		{
		    $session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['hakakses'] = $session_data['hakakses'];

		    $datanamapangkalan['hasil'] = $this->m_pesanonline->getall();

			$this->load->view('header');
		 	$this->load->view('header_pangkalan', $data);
		  	$this->load->view('pangkalan/form_pesanonline', $datanamapangkalan);
		  	$this->load->view('footer');
	  	}
	   	else
	   	{
	     //If no session, redirect to login page
	    	redirect('index.php/c_login', 'refresh');
	   	}
	}*/

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect(site_url()."index.php/c_login");
	}

	public function message()
	{
		echo "string";
	}

	public function pesan()
	{
		//$data['username'] = $session_data['username'];
		$waktu = $this->input->post('waktu');
		$pangkalan = $this->input->post('idPangkalan');
		$harga = $this->input->post('harga');
		$jumlahorder = $this->input->post('jumlahGas');

		$jumlahstok = $this->m_pesanoffline->cekstok();

		//echo $jumlahstok[0]['jumlah_stok']; 

		if($jumlahorder<=$jumlahstok[0]['jumlah_stok'])
		{
			if($this->session->userdata('logged_in'))
			{	
				$session_data = $this->session->userdata('logged_in');
				$datanamapangkalan['hasil'] = $this->m_pesanoffline->getall();
				$jumlahGas = $this->input->post('jumlahGas');

				//$idPangkalan = $session_data['idPangkalan'];
				$totalhargabelioff = $harga*$jumlahorder;
				$data = array
					(
						//'tanggalTransaksiOnline' => Time(),
						'jumlahGas' => $this->input->post('jumlahGas'),
						'totalhargabelioff' => $totalhargabelioff,
						//'idstatus_pemesanan' => '1',				
						'idPangkalan' => $this->input->post('idPangkalan')
						//'namapangkalan' => $this->input->post('username')

					);
	//			$this->m_pesanonline->insert();
				//$this->load->model('m_pesanonline/insert');
				$this->m_pesanoffline->kurangstok($jumlahGas);
				$this->m_pesanoffline->insert($data);

				$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
				Data Berhasil ditambahkan. Jumlah Pembayaran =Rp $totalhargabeli <a href=".base_url('index.php/c_pesanonline')." class=\"alert-link\">Klik Untuk Pesan Kembali</a>
				</div>";
				//$query = $this->db->query("SELECT jumlah_stok FROM `stok_gudang` ORDER BY idstok_gudang DESC limit 1");
		        //$hasil = $query->row_array();
				/*$message = "Berhasil! Hore total = $totalhargabelioff";
				
				echo "<script type='text/javascript'>alert('$message');
					window.location.href ='" . base_url() . "index.php/pegawai';</script>";*/
				$session_data = $this->session->userdata('logged_in');
			    $data['username'] = $session_data['username'];
			    $data['hakakses'] = $session_data['hakakses'];
			    if($session_data['hakakses']=="pegawai")
	      		{
	      //$data['idPegawai'] = $session_data['idPegawai'];

	      //$data['idPangkalan'] = $session_data['idPangkalan'];
	      //$datanamapangkalan ['hasil']= $this->m_pesanoffline->getall($session_data['username']);
		  //$datanamapangkalan['hasil'] = $this->m_pesanoffline->getall();	
		      		$datanamapangkalan['harga']= $this->m_pesanoffline->getharga();
		      		$datanamapangkalan['hasil'] = $this->m_pesanoffline->getall();


		      		$datanamapangkalan['success']=$sukses;
		      		$this->load->view('header');
			  		$this->load->view('header_pegawai', $data);
			  		$this->load->view('pegawai/form_pesanoffline',$datanamapangkalan );
			   
			  		$this->load->view('footer');
		  		}

			}
		}
		else
		{
			//echo "<script type='text/javascript'>alert('gagal ! order melebihi jumlah stock');</script>";
				$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
				Data Berhasil ditambahkan. Jumlah Pembayaran =Rp $totalhargabelioff <a href=".base_url('index.php/c_pesanonline')." class=\"alert-link\">Klik Untuk Pesan Kembali</a>
				</div>";
				//$query = $this->db->query("SELECT jumlah_stok FROM `stok_gudang` ORDER BY idstok_gudang DESC limit 1");
		        //$hasil = $query->row_array();
				/*$message = "Berhasil! Hore total = $totalhargabelioff";
				
				echo "<script type='text/javascript'>alert('$message');
					window.location.href ='" . base_url() . "index.php/pegawai';</script>";*/
				$session_data = $this->session->userdata('logged_in');
			    $data['username'] = $session_data['username'];
			    $data['hakakses'] = $session_data['hakakses'];
			    if($session_data['hakakses']=="pegawai")
	      		{
	      //$data['idPegawai'] = $session_data['idPegawai'];

	      //$data['idPangkalan'] = $session_data['idPangkalan'];
	      //$datanamapangkalan ['hasil']= $this->m_pesanoffline->getall($session_data['username']);
		  //$datanamapangkalan['hasil'] = $this->m_pesanoffline->getall();	
		      		$datanamapangkalan['harga']= $this->m_pesanoffline->getharga();
		      		$datanamapangkalan['hasil'] = $this->m_pesanoffline->getall();


		      		$datanamapangkalan['success']=$sukses;
		      		$this->load->view('header');
			  		$this->load->view('header_pegawai', $data);
			  		$this->load->view('pegawai/form_pesanoffline',$datanamapangkalan );
			   
			  		$this->load->view('footer');
		  		}
		}
	}
	

	/*public function insert()
	{
		$datapangkalan=array
		(
			'namapangkalan' => $this->input->post('namapangkalan'),
			'alamatpangkalan' => $this->input->post('alamatpangkalan'),
			'notelppangkalan' => $this->input->post('notelppangkalan'),
		);
		$this->m_pangkalan->insert($datapangkalan);
		redirect('index.php/kelola_pangkalan');
		
	   
	 //  print_r($datapangkalan);
	}

	public function delete($idPangkalan)
	{
		$this->m_pangkalan->delete($idPangkalan);
		redirect('index.php/kelola_pangkalan');
	}

	public function edit($idPangkalan)
	{
		$datapangkalan['hasil']	= $this->m_pangkalan->getby($idPangkalan);
		$this->load->view('pegawai/form_editpangkalan', $datapangkalan);
	}

	public function update($idPangkalan)
	{
		if($this->input->post('submit'))  
		{
			$this->m_pangkalan->update($idPangkalan);
			redirect('index.php/kelola_pangkalan');
		}
	}

	public function submit()	
	{
			$jumlahorder = $this->input-post('jumlahorder');
			$batas = $this->m_pesanonline->cekstok();
			if($jumlahorder <= $batas) 
			{
				echo'tersedia'; echo $jumlahorder;
			}
	        else
	        {
	        	echo'tidak tersedia';
	        }
	}*/

}


/* Location: ./application/controllers/welcome.php */