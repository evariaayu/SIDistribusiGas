<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Kelola_operasional extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session','pagination'));
        $this->load->model('m_operasional');
        $this->load->helper('html');
        $this->load->helper('file');
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

	     	//$dataoperasional['hasil'] = $this->m_operasional->getall();
	     	$hakakses=$session_data['hakakses'];
	    	if( ($hakakses=="pegawai") || ($hakakses="direktur"))
		    {
		    	$jumlah = $this->m_operasional->jumlah();
				$config['base_url'] = base_url().'index.php/kelola_operasional/index';
				$config['total_rows'] = $jumlah;
				$config['per_page']=5;

				$dari = $this->uri->segment('3');
				$dataoperasional['hasil'] = $this->m_operasional->lihat($config['per_page'],$dari);
				$dataoperasional['success'] = '';

				$this->pagination->initialize($config); 
	      		$this->load->view('header');
		  		$this->load->view('header_pegawai', $data);
		  		$this->load->view('pegawai/v_mengelola_biayaoperasional',$dataoperasional);
		  		$this->load->view('footer');
		    }
		  	else
		  	{
		    	redirect('index.php/c_login/logout', 'refresh');
		    }
		}
	   else
	   {
	     //If no session, redirect to login page
	     redirect('index.php/c_login/logout', 'refresh');
	   }
		
	}


	public function form_tambahbiayaoperasional()
	{
		if($this->session->userdata('logged_in'))
		{
		    $session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['hakakses'] = $session_data['hakakses'];
		    $hakakses=$session_data['hakakses'];
	    	if( ($hakakses=="pegawai") || ($hakakses="direktur"))
		    {
		    	$dataoperasional['success']='';

				$this->load->view('header');
		 		$this->load->view('header_pegawai', $data);
		  		$this->load->view('pegawai/form_tambahbiayaoperasional-old',$dataoperasional);
		  		$this->load->view('footer');
		  	}
		  	else
		  	{
		    	redirect('index.php/c_login/logout', 'refresh');
		  	}
	  	}
	   	else
	   	{
	     //If no session, redirect to login page
	    	redirect('index.php/c_login/logout', 'refresh');
	   	}
	}

	public function form_tambahbiayalain()
	{
		if($this->session->userdata('logged_in'))
		{
		    $session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['hakakses'] = $session_data['hakakses'];
		    $hakakses=$session_data['hakakses'];
	    	if( ($hakakses=="pegawai") || ($hakakses="direktur"))
		    {
		    	$datalainlain['success'] = '';
		    	$this->load->view('header');
			 	$this->load->view('header_pegawai', $data);
			  	$this->load->view('pegawai/form_tambahbiayaoperasional',$datalainlain);
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

	function do_upload()
	{
		if($this->session->userdata('logged_in'))
		{
		    $session_data = $this->session->userdata('logged_in');
		    $idPegawai= $session_data['idPegawai'];
         	date_default_timezone_set("Asia/Jakarta");
		    $datebaru = date('Y-m-d H:i:s');
		    $datebaru = str_replace( ':', '', $datebaru);
			$config['upload_path'] = './uploads/'.$datebaru;
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['remove_spaces'] = 'TRUE';
			$config['overwrite'] ='FALSE';
			
			
			$this->load->library('upload', $config);
			
			if (!is_dir('uploads/'.$datebaru)) 
			{
    			mkdir('./uploads/' . $datebaru, 0777, TRUE);
    			$uploadpam=$this->upload->do_upload('filePAM');
				if($uploadpam == TRUE)
				{
					 $datapam = $this->upload->data('filePAM');
					 $pathpam=$datapam['file_name'];
				}
				elseif($uploadpam== FALSE)
				{
					echo "error file pam";
				}
				$uploadpln=$this->upload->do_upload('filePLN');
				if($uploadpln == TRUE)
				{
					 $datapln = $this->upload->data('filePLN');
					 $pathpln=$datapln['file_name'];
				}
				elseif($uploadpln== FALSE)
				{
					echo "error file pln";
				}
				$uploadinternet=$this->upload->do_upload('fileInternet');
				if($uploadinternet == TRUE)
				{
					 $datainternet = $this->upload->data('fileInternet');
					 $pathinternet=$datainternet['file_name'];
				}
				elseif($uploadinternet== FALSE)
				{
					echo "error fileInternet";
				}
				$pengeluaranPAM = $this->input->post('pengeluaranPAM');
				$pengeluaranPLN = $this->input->post('pengeluaranPLN');
				$pengeluaranInternet = $this->input->post('pengeluaranInternet');
				$total = $pengeluaranInternet + $pengeluaranPAM + $pengeluaranPLN;
			//	print_r($total);
				$dataoperasional=array
				(
					'pengeluaranPAM' => $this->input->post('pengeluaranPAM'),
					'filePAM' => $pathpam,
					'pengeluaranPLN' => $this->input->post('pengeluaranPLN'),
					'filePLN' => $pathpln,
					'pengeluaranInternet' => $this->input->post('pengeluaranInternet'),
					'fileInternet' => $pathinternet,
					'idPegawai' => $idPegawai,
					'namafolder' => $datebaru,
					'total' => $total
					
				);
				//print_r($dataoperasional);
				$this->m_operasional->insert($dataoperasional);
				$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
					Data Berhasil ditambahkan <a href=".base_url('index.php/kelola_operasional')." class=\"alert-link\">Kembali?</a>
					</div>";
				$session_data = $this->session->userdata('logged_in');
    			$data['username'] = $session_data['username'];
    			$data['hakakses'] = $session_data['hakakses'];
    			$data['idPegawai'] = $session_data['idPegawai'];
		    	$hakakses=$session_data['hakakses'];
	    		if( ($hakakses=="pegawai") || ($hakakses="direktur"))
				{
		    		$dataoperasional['success'] = $sukses;
					$this->load->view('header');
					$this->load->view('header_pegawai', $data);
				  	$this->load->view('pegawai/form_tambahbiayaoperasional-old',$dataoperasional);
				  	$this->load->view('footer');
				}
				else
		   		{
		    		redirect('index.php/c_login', 'refresh');
		    	}
			//	redirect('index.php/kelola_operasional','refresh');
			    
	    	}
			
	  	}
	}

	function delete($idPengeluaran_Tetap)
	{

		$this->m_operasional->delete($idPengeluaran_Tetap);
		echo "<script type='text/javascript'>
				window.setTimeout(function(){window.location.href ='" . base_url() . "index.php/kelola_operasional';}, 2000);

				</script>";
		if($this->session->userdata('logged_in'))
		{
	      	$session_data = $this->session->userdata('logged_in');
	      	$data['username'] = $session_data['username'];
	      	$data['hakakses'] = $session_data['hakakses'];

	     	$dataoperasional['hasil'] = $this->m_operasional->getall();
	     	$hakakses = $session_data['hakakses'];
		 	$hakakses=$session_data['hakakses'];
	    	if( ($hakakses=="pegawai") || ($hakakses="direktur"))
		    {
		    	$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  						<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
						Data Berhasil dihapus
						</div>";
				$dataoperasional['success'] = $sukses;

	      		$this->load->view('header');
		  		$this->load->view('header_pegawai', $data);
		  		$this->load->view('pegawai/v_mengelola_biayaoperasional',$dataoperasional);
		  		$this->load->view('footer');
		    }
		  	else
		  	{
		    	redirect('index.php/c_login', 'refresh');
		    }
		}
		//redirect('index.php/Kelola_operasional');
	}

	function do_uploadlain()
	{
		date_default_timezone_set("Asia/Jakarta");
	    $datebaru = date('Y-m-d H:i:s');
	    $datebaru = str_replace( ':', '', $datebaru);
		$config2['upload_path'] = './uploads/lainlain/'.$datebaru;
		$config2['allowed_types'] = 'jpg|png|jpeg';
		$config2['remove_spaces'] = 'TRUE';
		$config2['overwrite'] ='FALSE';
		
		
		$this->load->library('upload', $config2);
		
		if (!is_dir('uploads/lainlain/'.$datebaru)) 
		{
			mkdir('./uploads/lainlain/'.$datebaru, 0777, TRUE);
			$upload=$this->upload->do_upload('filebarang');
			if($upload == TRUE)
			{
				 $databarang = $this->upload->data('filebarang');
				 $pathbarang=$databarang['file_name'];
			}
			elseif($upload== FALSE)
			{
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			}

			$datalainlain=array
			(
				'harga' => $this->input->post('harga'),
				'namabarang' => $this->input->post('namabarang'),
				'filebarang' => $pathbarang,
				'namafolder' => $datebaru
				
			);
			//print_r($dataoperasional);
			$this->m_operasional->insertlainlain($datalainlain);
			$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
					Data Berhasil ditambahkan <a href=".base_url('index.php/kelola_operasional/pengeluaranlain')." class=\"alert-link\">Kembali?</a>
					</div>";
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['hakakses'] = $session_data['hakakses'];
			$data['idPegawai'] = $session_data['idPegawai'];
	    	if($session_data['hakakses']=="pegawai")
			{
	    		$datalainlain['success'] = $sukses;
				$this->load->view('header');
				$this->load->view('header_pegawai', $data);
			  	$this->load->view('pegawai/form_tambahbiayaoperasional',$datalainlain);
			  	$this->load->view('footer');
			}
			else
	   		{
	    		redirect('index.php/c_login', 'refresh');
	    	}
		//	redirect('index.php/kelola_operasional','refresh');
		    
    	}
	}
	public function pengeluaranlain()
	{
		if($this->session->userdata('logged_in'))
		{
	      	$session_data = $this->session->userdata('logged_in');
	      	$data['username'] = $session_data['username'];
	      	$data['hakakses'] = $session_data['hakakses'];

	     	//$dataoperasional['hasil'] = $this->m_operasional->getall();
	     	$hakakses=$session_data['hakakses'];
	    	if( ($hakakses=="pegawai") || ($hakakses="direktur"))
		    {
		    	$jumlah = $this->m_operasional->jumlahlain();
				$config['base_url'] = base_url().'index.php/kelola_operasional/pengeluaranlain/';
				$config['total_rows'] = $jumlah;
				$config['per_page']=5;

				$dari = $this->uri->segment('3');
				$datalainlain['hasil'] = $this->m_operasional->lihatlain($config['per_page'],$dari);
				$datalainlain['success'] = '';

				$this->pagination->initialize($config); 
	      		$this->load->view('header');
		  		$this->load->view('header_pegawai', $data);
		  		$this->load->view('pegawai/v_mengelola_biayalainlain',$datalainlain);
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

	function deletelain($idCost_lainlain)
	{

		$this->m_operasional->deletelain($idCost_lainlain);
		$this->m_operasional->delete_costlain($idCost_lainlain);
		echo "<script type='text/javascript'>
				window.setTimeout(function(){window.location.href ='" . base_url() . "index.php/kelola_operasional/pengeluaranlain';}, 2000);

				</script>";
		if($this->session->userdata('logged_in'))
		{
	      	$session_data = $this->session->userdata('logged_in');
	      	$data['username'] = $session_data['username'];
	      	$data['hakakses'] = $session_data['hakakses'];

	     	$datalainlain['hasil'] = $this->m_operasional->getall_lain();
	     	$hakakses=$session_data['hakakses'];
	    	if( ($hakakses=="pegawai") || ($hakakses="direktur"))
		    {
		    	$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  						<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
						Data Berhasil dihapus
						</div>";
				$datalainlain['success'] = $sukses;

	      		$this->load->view('header');
		  		$this->load->view('header_pegawai', $data);
		  		$this->load->view('pegawai/v_mengelola_biayalainlain',$datalainlain);
		  		$this->load->view('footer');
		    }
		  	else
		  	{
		    	redirect('index.php/c_login', 'refresh');
		    }
		}
		//redirect('index.php/Kelola_operasional');
	}


}