<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/menu');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/include/footer');
	}
}