<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Pages extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('PagesModel');
    }

	public function index()
	{
		$items = $this->PagesModel->getAll();
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/menu');
		$this->load->view('admin/pages', array('pages' => $items));
		$this->load->view('admin/include/footer');
	}

	public function create()
	{
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/menu');
		$this->load->view('admin/form_page', 
			array(
				'title' => 'Create a New Page',
				'save_button' => 'Save New Page'
				));
		$this->load->view('admin/include/footer');
	}

	public function save()
	{
		$data = $this->input->post();
		$data['date_modified'] = date('Y-m-d');

		if(@$data['id'] > 0)
		{
			// Update 
			$status = (!$this->PagesModel->save($data, true, array('id' => $data['id']))) ? 'err' : 'saved';
		} else {
			// Insert 
			$status = (!$this->PagesModel->save($data)) ? 'err' : 'saved';
		}

		redirect("admin_pages/index/created_page/" . $status);
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$obj = $this->PagesModel->getOne(array('id' => $id));

		$this->load->view('admin/include/header');
		$this->load->view('admin/include/menu');
		$this->load->view('admin/form_page',
			array(
				'page' => $obj, 
				'title' => 'Edit Page',
				'save_button' => 'Save Changes'
				));
		$this->load->view('admin/include/footer');
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$is_deleted = ( !$this->PagesModel->delete(array('id' => $id)) ) ? 'no' : 'yes';

		redirect("admin_pages/index/is_deleted/" . $is_deleted);
	}

}
