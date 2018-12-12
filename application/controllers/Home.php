<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('role')!=1) {
			redirect('website');
		}
		$this->load->helper('text');
	}

	public function index()
	{
		$email = $this->session->userdata('email');

		$data['content']	= 'backend/contents/home';
		$data['judul']		= 'Beranda';
		$data['sub_judul']	= '';
		$data['role']		= $this->MyModel->getRole($email)->row_array();
		$data['user']		= $this->MyModel->getUser($email)->row_array();
		$data['count']		= $this->MyModel->getCountRole($email)->num_rows();
		
		$this->load->view('backend/homepage', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('website');
	}
}