<?php  
class Welcome extends CI_Controller{

		function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->load->helper('url');
		$this->load->library('session');
	}

	function index(){
		$this->load->view('login');
	}

	function auth(){
        $this->m_login->auth();
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
}
