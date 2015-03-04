<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaksi_online extends CI_Controller {

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
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->view('v_transaksi_online');
    }

	public function index()
	{
		$today = date("Y-n-j");  
		
		$data=array(
			'BanyakPesanan' => $this->input->post('formbanyakpesanan'),
			'TglPesan' =>($today),

		);
		$this->m_transaksi_online->insert($data);
		$this->load->view('vberhasilpesan');
		//print_r($data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
