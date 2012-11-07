<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Login extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/include/header_login');
		$this->load->view('admin/login');
		$this->load->view('admin/include/footer_login');
	}
}
