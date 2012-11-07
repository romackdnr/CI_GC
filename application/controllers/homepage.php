<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomePage extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('site/include/header_homepage', 
			array(
				'metatitle' => "Golden Cricket - Casino Jackpot Payout Forum",
				'pattern' => 'home'
				)
			);
		$this->load->view('site/homepage');
		$this->load->view('site/include/footer');
	}
}