<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class berandaBidan extends CI_Controller {

	public function index()
	{
		$this->load->view('headerBidan');
		$this->load->view('berandaBidan');
		$this->load->view('footer');
	}
}
