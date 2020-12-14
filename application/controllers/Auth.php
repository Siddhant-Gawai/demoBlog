<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_auth');
	}
	public function password_hash($pass = '')
	{
		if ($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}
	/* 
		Check if the login form is submitted, and validates the user credential
		If not submitted it redirects to the guest page
	*/

	public function login()
	{
		$this->logged_in();
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == TRUE) {
			// true case
			$email_exists = $this->Model_auth->check_email($this->input->post('email'));

			if ($email_exists == TRUE) {
				$login = $this->Model_auth->login($this->input->post('email'), $this->input->post('password'));

				if ($login) {

					$logged_in_sess = array(
						'id' => $login['user_id'],
						'username'  => $login['name'],
						'email'     => $login['email'],
						'logged_in' => TRUE
					);
					$this->session->set_userdata($logged_in_sess);
					redirect('Welcome/index', 'refresh');
				} else {
					$this->data['errors'] = 'Incorrect username/password combination';
					$this->load->view('include/header');
					$this->load->view('login', $this->data);
					$this->load->view('include/footer');

				}
			} else {
				$this->data['errors'] = 'Email does not exists';
				$this->load->view('include/header');
				$this->load->view('login', $this->data);
				$this->load->view('include/footer');

			}
		} else {
			// false case
			$this->load->view('include/header');
			$this->load->view('login');
			$this->load->view('include/footer');
		}
	}

	/* 
		Creates a new user
	*/

	function register()
	{
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required',
			'email'
		);
		$this->form_validation->set_rules(
			'fname',
			'First Name',
			'required'
		);
		$this->form_validation->set_rules(
			'lname',
			'Last Name',
			'required'
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'trim|required|min_length[8]'
		);
		if ($this->form_validation->run() == true) {

			$email_exists = $this->Model_auth->check_email($this->input->post('email'));
			if ($email_exists == TRUE) {
				$this->session->set_flashdata('success', '<div class="alert alert-danger">Email already exits.</div>');
				redirect('Auth/login');
			}
			$password = $this->password_hash($this->input->post('password'));
			$params = [
				'email' => $this->input->post('email'),
				'password' => $password,
				'name' => $this->input->post('fname'),
				'lastname' => $this->input->post('lname'),
			];

			$this->Model_auth->add_user($params);
			$this->session->set_flashdata('success', '<div class="alert alert-success">Account Created successfully. Login for further process </div>');
			redirect('Auth/login');
		} else {
			$this->load->view('include/header');
			$this->load->view('registration');
			$this->load->view('include/footer');
		}
	}

	/*
		clears the session and redirects to login page
	*/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth/login', 'refresh');
	}
}
