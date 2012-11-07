<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Casinos extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('CasinosModel');
    }

	public function index()
	{
		$items = $this->CasinosModel->getAll();
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/menu');
		$this->load->view('admin/casinos', array('casinos' => $items));
		$this->load->view('admin/include/footer');
	}

	public function create()
	{
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/menu');
		$this->load->view('admin/form_casino', 
			array(
				'title' => 'Create a New Casino',
				'save_button' => 'Save New Casino'
				));
		$this->load->view('admin/include/footer');
	}



	public function save()
	{
		$data = $this->input->post();

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1024';
		$config['max_width']  = '400';
		$config['max_height']  = '200';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			error_log( print_r( $this->upload->display_errors(), true ) );
		}
		else
		{
			error_log( print_r( $this->upload->data(), true ) );
		}

		if(@$data['id'] > 0)
		{
			// Update 
			$status = (!$this->CasinosModel->save($data, true, array('id' => $data['id']))) ? 'err' : 'saved';
		} else {
			// Insert 
			$status = (!$this->CasinosModel->save($data)) ? 'err' : 'saved';
		}

		redirect("admin_casinos/index/created_casino/" . $status);
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$obj = $this->CasinosModel->getOne(array('id' => $id));

		$this->load->view('admin/include/header');
		$this->load->view('admin/include/menu');
		$this->load->view('admin/form_casino',
			array(
				'casino' => $obj, 
				'title' => 'Edit Member Data',
				'save_button' => 'Save Changes'
				));
		$this->load->view('admin/include/footer');
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$is_deleted = ( !$this->CasinosModel->delete(array('id' => $id)) ) ? 'no' : 'yes';

		redirect("admin_casinos/index/is_deleted/" . $is_deleted);
	}
}