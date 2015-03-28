<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Kelola_pangkalan extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->library(array('form_validation','session','pagination'));
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
	      	if($session_data['hakakses']=="pegawai")
	      	{

		      	$jumlah = $this->m_pangkalan->jumlah();
				$config['base_url'] = base_url().'index.php/kelola_pangkalan/index';
				$config['total_rows'] = $jumlah;
				$config['per_page']=5;

				$dari = $this->uri->segment('3');
				$datapangkalan['hasil'] = $this->m_pangkalan->lihat($config['per_page'],$dari);
				$this->pagination->initialize($config); 
	   		 //  $datapangkalan['hasil'] = $this->m_pangkalan->getall();
				$datapangkalan['success'] = '';
	      		$this->load->view('header');
		  		$this->load->view('header_pegawai', $data);
		  		$this->load->view('pegawai/v_mengelola_pangkalan',$datapangkalan);
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

	public function form_tambahdata()
	{
		if($this->session->userdata('logged_in'))
		{
	      $session_data = $this->session->userdata('logged_in');
	      $data['username'] = $session_data['username'];
	      $data['hakakses'] = $session_data['hakakses'];
	      if($session_data['hakakses']=="pegawai")
	      {
	      	$datapangkalan['success']='';
			$this->load->view('header');
		 	$this->load->view('header_pegawai', $data);
		  	$this->load->view('pegawai/form_tambahdatapangkalan', $datapangkalan);
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
		$datapangkalan=array
		(
			'namapangkalan' => $this->input->post('namapangkalan'),
			'alamatpangkalan' => $this->input->post('alamatpangkalan'),
			
		);
		$this->m_pangkalan->insert($datapangkalan);
		$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
					Data Berhasil ditambahkan <a href=".base_url('index.php/kelola_pangkalan')." class=\"alert-link\">Kembali?</a>
					</div>";
		if($this->session->userdata('logged_in'))
		{
	     	$session_data = $this->session->userdata('logged_in');
	      	$data['username'] = $session_data['username'];
	      	$data['hakakses'] = $session_data['hakakses'];
	      	$datapangkalan['success'] = $sukses;
	      	if($session_data['hakakses']=="pegawai")
	      	{
				$this->load->view('header');
		 		$this->load->view('header_pegawai', $data);
		  		$this->load->view('pegawai/form_tambahdatapangkalan', $datapangkalan);
		  		$this->load->view('footer');
		  	}
			else
	   		{
	     //If no session, redirect to login page
	     		redirect('index.php/c_login', 'refresh');
	   		}
	   	}
	}

	public function delete($idPangkalan)
	{
		$this->m_pangkalan->delete($idPangkalan);
		//redirect setelah 2 detik
		echo "<script type='text/javascript'>
				window.setTimeout(function(){window.location.href ='" . base_url() . "index.php/kelola_pangkalan';}, 2000);

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
	      	$datapangkalan['success'] = $sukses;
	      	if($session_data['hakakses']=="pegawai")
	      	{
	      		$datapangkalan['hasil'] = $this->m_pangkalan->getall();
				$this->load->view('header');
		 		$this->load->view('header_pegawai', $data);
		  		$this->load->view('pegawai/v_mengelola_pangkalan', $datapangkalan);
		  		$this->load->view('footer');
		  	}
			else
	   		{
	     //If no session, redirect to login page
	     		redirect('index.php/c_login', 'refresh');
	   		}
	   	}
	//	redirect('index.php/kelola_pangkalan');
	}

	public function edit($idPangkalan)
	{
		if($this->session->userdata('logged_in'))
		{
	      	$session_data = $this->session->userdata('logged_in');
	      	$data['username'] = $session_data['username'];
	     	$data['hakakses'] = $session_data['hakakses'];
	      	if($session_data['hakakses']=="pegawai")
	     	{
	    		$datapangkalan['hasil']	= $this->m_pangkalan->getby($idPangkalan);
				$datapangkalan['success'] = '';
				$this->load->view('header');
				$this->load->view('header_pegawai', $data);
				$this->load->view('pegawai/form_editpangkalan', $datapangkalan);
			  	$this->load->view('footer');
	  		}
			else
   			{
		     //If no session, redirect to login page
		     	redirect('index.php/c_login', 'refresh');
   			}
		}
	}

	public function update($idPangkalan)
	{
		$data['namapangkalan'] = $this->input->post('namapangkalan');
		$data['alamatpangkalan'] = $this->input->post('alamatpangkalan');
		$data['idPangkalan'] = $idPangkalan;
		$this->m_pangkalan->update($data);
		$sukses = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
					Data berhasil diubah <a href=".base_url('index.php/kelola_pangkalan')." class=\"alert-link\">Kembali?</a>
					</div>";
		if($this->session->userdata('logged_in'))
		{
	     	$session_data = $this->session->userdata('logged_in');
	      	$data['username'] = $session_data['username'];
	      	$data['hakakses'] = $session_data['hakakses'];
	      	$datapangkalan['success'] = $sukses;
	      	if($session_data['hakakses']=="pegawai")
	      	{
				$datapangkalan['hasil']	= $this->m_pangkalan->getby($idPangkalan);
				$datapangkalan['success'] = $sukses;
				$this->load->view('header');
				$this->load->view('header_pegawai', $data);
				$this->load->view('pegawai/form_editpangkalan', $datapangkalan);
			  	$this->load->view('footer');
		  	}
			else
	   		{
	     //If no session, redirect to login page
	     		redirect('index.php/c_login', 'refresh');
	   		}
	   	}

	//	redirect('index.php/kelola_pangkalan');

	}
	public function editdata($idPangkalan)
	{

		$query = $this->m_pangkalan->get_id($idPangkalan);
		$hasil=$query->result();	
	//	print_r($result);
		echo json_encode($hasil[0]);
	}

	public function deletedata()
	{
		$this->m_pangkalan->deletedata($this->input->post('idPangkalan'));
	}
	function deleteajax()
	{
		$idPangkalan = $this->input->post('id');
		$this->db->delete('pangkalan', array('idPangkalan' => $idPangkalan));
	}
}


/* Location: ./application/controllers/welcome.php */