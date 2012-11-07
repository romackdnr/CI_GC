<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Members extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('MembersModel');
    }

	public function index()
	{
		$items = $this->MembersModel->getAll();
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/menu');
		$this->load->view('admin/members', array('members' => $items));
		$this->load->view('admin/include/footer');
	}

	public function create()
	{
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/menu');
		$this->load->view('admin/form_member', 
			array(
				'title' => 'Create a New Member',
				'save_button' => 'Save New Member'
				));
		$this->load->view('admin/include/footer');
	}

	public function save()
	{
		$data = $this->input->post();		
		$data['date_registered'] = date('Y-m-d');
		unset($data['confirm_password']);	// clean post data

		// update password only when user changed it
		if(strlen($data['password']) < 1) unset($data['password']);

		if(@$data['id'] > 0)
		{
			// Update 
			$status = (!$this->MembersModel->save($data, true, array('id' => $data['id']))) ? 'err' : 'saved';
		} else {
			// Insert 
			$status = (!$this->MembersModel->save($data)) ? 'err' : 'saved';
		}

		redirect("admin_members/index/created_member/" . $status);
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$obj = $this->MembersModel->getOne(array('id' => $id));

		$this->load->view('admin/include/header');
		$this->load->view('admin/include/menu');
		$this->load->view('admin/form_member',
			array(
				'member' => $obj, 
				'title' => 'Edit Member Data',
				'save_button' => 'Save Changes'
				));
		$this->load->view('admin/include/footer');
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$is_deleted = ( !$this->MembersModel->delete(array('id' => $id)) ) ? 'no' : 'yes';

		redirect("admin_members/index/is_deleted/" . $is_deleted);
	}
}