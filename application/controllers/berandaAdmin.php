<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class berandaAdmin extends CI_Controller {

	public function index()
	{
		$this->load->view('headerAdmin');
		$this->load->view('berandaAdmin');
		$this->load->view('footer');
	}
}
