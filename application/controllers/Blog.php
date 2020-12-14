<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends Admin_Controller
{


	function __construct()
	{

		parent::__construct();
		$this->load->model('Model_blog');
		$this->load->library('upload');
	}
	public function index()
	{
		$this->load->view('include/header');
		$this->load->view('userblog/index');
		$this->load->view('include/footer');
	}
	function add()
	{
		date_default_timezone_set("Asia/Kolkata");
		$this->form_validation->set_rules(
			'title',
			'Title',
			'required'
		);
		$this->form_validation->set_rules(
			'desc',
			'Description',
			'required'
		);

		$config['upload_path']          = './images/';
		$config['allowed_types']        = 'jpg|png|JPEG|jpeg|JPG|PNG';
		$config['encrypt_name']        = true;
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('image')) {
			$error = array('error' => $this->upload->display_errors('<p>', '</p>'));
			$this->load->view('include/header');
			$this->load->view('userblog/add', $error);
			$this->load->view('include/footer');
		} else {
			if ($this->form_validation->run() == true) {
				$this->upload->do_upload('image');
				$data = $this->upload->data();
				$image = base_url('images/' . $data['raw_name'] . $data['file_ext']);
				$params = array(
					'title' => $this->input->post('title'),
					'category' => $this->input->post('category'),
					'created' => date("d-m-Y H:i:s a"),
					'description' => $this->input->post('desc'),
					'attachment' => $image,
					'user_id' => $this->session->userdata('id'),
				);
				$this->Model_blog->add_blog($params);
				$this->session->set_flashdata('success', '<div class="alert alert-success">Blog Added successfully. </div>');
				redirect('Welcome/index');
			} else {
				$this->load->view('include/header');
				$this->load->view('userblog/add');
				$this->load->view('include/footer');
			}
		}
	}
	function userindex()
	{
		$data['blog'] = $this->Model_blog->getblogby_userid();
		$this->load->view('include/header');
		$this->load->view('userblog/index', $data);
		$this->load->view('include/footer');
	}
}
