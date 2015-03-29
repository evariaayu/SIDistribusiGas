<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Kelola_pegawai extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session', 'pagination'));
        $this->load->model('m_pegawai');
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
	      $hakakses=$session_data['hakakses'];
	      	if( $hakakses="direktur" )
	      	{

		      	$jumlah = $this->m_pegawai->jumlah();
				$config['base_url'] = base_url().'index.php/kelola_pegawai/index';
				$config['total_rows'] = $jumlah;
				$config['per_page']=5;

				$dari = $this->uri->segment('3');
				$datapegawai['hasil'] = $this->m_pegawai->lihat($config['per_page'],$dari);
				$this->pagination->initialize($config); 
	   		 //  $datapangkalan['hasil'] = $this->m_pangkalan->getall();
				$datapegawai['success'] = '';
	      		$this->load->view('header');
		  		$this->load->view('header_pegawai', $data);
		  		$this->load->view('direktur/v_mengelolapegawai',$datapegawai);
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
	     redirect('index.php/c_login', 'refresh');
	   }
		
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect(site_url()."index.php/c_login");
	}
	public function form_tambahdata()
	{
		if($this->session->userdata('logged_in'))
		{
	      	$session_data = $this->session->userdata('logged_in');
	      	$data['username'] = $session_data['username'];
	      	$data['hakakses'] = $session_data['hakakses'];
	     	$hakakses=$session_data['hakakses'];
	    	if( $hakakses="direktur" )
	      	{
	      		$datapegawai['success']='';
				$this->load->view('header');
		 		$this->load->view('header_pegawai', $data);
		  		$this->load->view('direktur/form_tambahdatapegawai', $datapegawai);
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

	public function insert()
	{
		$datapegawai=array
		(
			'namapegawai' => $this->input->post('namapegawai'),
			'alamatpegawai' => $this->input->post('alamatpegawai'),
			'jk' => $this->input->post('jk'),
			'notelepon' => $this->input->post('notelepon'),
			'idKeterangan_jabatan' => $this->input->post('idKeterangan_jabatan'),
		);
		$this->m_pegawai->insert($datapegawai);
		$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
					Data Berhasil ditambahkan <a href=".base_url('index.php/kelola_pegawai')." class=\"alert-link\">Kembali?</a>
					</div>";

		if($this->session->userdata('logged_in'))
		{
	     	$session_data = $this->session->userdata('logged_in');
	      	$data['username'] = $session_data['username'];
	      	$data['hakakses'] = $session_data['hakakses'];
	      	$datapegawai['success'] = $sukses;
	      	$hakakses=$session_data['hakakses'];
	    	if( $hakakses="direktur")
	      	{
				$this->load->view('header');
		 		$this->load->view('header_pegawai', $data);
		  		$this->load->view('direktur/form_tambahdatapegawai', $datapegawai);
		  		$this->load->view('footer');
		  	}
			else
	   		{
	     //If no session, redirect to login page
	     		redirect('index.php/c_login/logout', 'refresh');
	   		}
	   	}

	}

	public function delete($idPegawai)
	{
		$this->m_pegawai->delete($idPegawai);
		//redirect setelah 2 detik
		echo "<script type='text/javascript'>
				window.setTimeout(function(){window.location.href ='" . base_url() . "index.php/kelola_pegawai';}, 2000);

				</script>";
		$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
					Data berhasil dihapus
					</div>";
		if($this->session->userdata('logged_in'))
		{
	     	$session_data = $this->session->userdata('logged_in');
	      	$data['username'] = $session_data['username'];
	      	$data['hakakses'] = $session_data['hakakses'];
	      	$datapegawai['success'] = $sukses;
	      	$hakakses=$session_data['hakakses'];
	    	if( $hakakses="direktur" )
	      	{
	      		$datapegawai['hasil'] = $this->m_pegawai->getall();
				$this->load->view('header');
		 		$this->load->view('header_pegawai', $data);
		  		$this->load->view('direktur/v_mengelolapegawai', $datapegawai);
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

	   		redirect('index.php/c_login/logout', 'refresh');
	   	}
	}

	public function edit($idPegawai)
	{
		if($this->session->userdata('logged_in'))
		{
		    $session_data = $this->session->userdata('logged_in');
	      	$data['username'] = $session_data['username'];
	     	$data['hakakses'] = $session_data['hakakses'];
	      	$hakakses=$session_data['hakakses'];
	    	if( $hakakses="direktur" )
	     	{
	    		$datapegawai['hasil']	= $this->m_pegawai->getby($idPegawai);
				$datapegawai['success'] = '';
				$this->load->view('header');
				$this->load->view('header_pegawai', $data);
				$this->load->view('direktur/form_editpegawai', $datapegawai);
			  	$this->load->view('footer');
	  		}
			else
   			{
		     //If no session, redirect to login page
		     	redirect('index.php/c_login', 'refresh');
   			}
	  }
		
	}

	public function update($idPegawai)
	{
	
		$data['namapegawai'] = $this->input->post('namapegawai');
		$data['alamatpegawai'] = $this->input->post('alamatpegawai');
		$data['jk'] = $this->input->post('jk');
		$data['notelepon'] = $this->input->post('notelepon');
		$data['idKeterangan_jabatan'] = $this->input->post('idKeterangan_jabatan');
		$data['idPegawai'] = $idPegawai;
	
		$this->m_pegawai->update($data);
		$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
					Data berhasil diubah <a href=".base_url('index.php/kelola_pegawai')." class=\"alert-link\">Kembali?</a>
					</div>";
		if($this->session->userdata('logged_in'))
		{
	     	$session_data = $this->session->userdata('logged_in');
	      	$data['username'] = $session_data['username'];
	      	$data['hakakses'] = $session_data['hakakses'];
	      	$datapegawai['success'] = $sukses;
	      	$hakakses=$session_data['hakakses'];
	    	if( $hakakses="direktur" )
	      	{
				$datapegawai['hasil']	= $this->m_pegawai->getby($idPegawai);
				$datapegawai['success'] = $sukses;
				$this->load->view('header');
				$this->load->view('header_pegawai', $data);
				$this->load->view('direktur/form_editpegawai', $datapegawai);
			  	$this->load->view('footer');
		  	}
			else
	   		{
	     //If no session, redirect to login page
	     		redirect('index.php/c_login', 'refresh');
	   		}
	   	}
	}

}


/* Location: ./application/controllers/welcome.php */