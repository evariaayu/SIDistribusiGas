<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_verifyLogin extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->model('m_login','login',TRUE);
        $this->load->helper(array('form', 'url','html'));
        $this->load->library(array('form_validation','session'));
    }
 
    function index() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
 
        if($this->form_validation->run() == FALSE) {
            $this->load->view('logingagal');
            } else 
            {

               $session_data = $this->session->userdata('logged_in');
                if($session_data['hakakses']=="pegawai"){
                redirect('index.php/pegawai', 'refresh');
              }
              elseif($session_data['hakakses']=="pangkalan"){
                redirect('index.php/pangkalan', 'refresh');
              }
              elseif($session_data['hakakses']=="direktur"){
                redirect('index.php/direktur', 'refresh');
              }
                
            }      
     }



     function check_database($password) {
         //Field validation succeeded.  Validate against database
         $username = $this->input->post('username');
         //query the database
         $result = $this->login->login($username, $password);
         if($result) {
             $sess_array = array();

             foreach($result as $row) {
                 //create the session
                 $sess_array = array(
                     'username'   => $row->username,
                     'hakakses'   => $row->hakakses,
                     'idPegawai'  => $row->idPegawai,
                     'tahun'      => getdate()['year'],
                     'bulan'      => getdate()['mon'],
                     'idPangkalan' => $row->idPangkalan

                  );
                 //set session with value from database
                 $this->session->set_userdata('logged_in', $sess_array);
                 }
          return TRUE;
          } else {
              //if form validate false
              $this->form_validation->set_message('check_database', 'Invalid username or password');
              return FALSE;
          }
      }
}
/* End of file c_verifylogin.php */
/* Location: ./application/controllers/c_verifylogin.php */