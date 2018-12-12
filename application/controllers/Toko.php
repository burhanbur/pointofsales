<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller
{
	var $table = 'tref_toko';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MyModel');
	}

	public function index()
	{
		$email = $this->session->userdata('email');

		$data['content']	= 'backend/contents/toko/show';
		$data['judul']		= 'Toko';
		$data['sub_judul']	= '';
		$data['role']		= $this->MyModel->getRole($email)->row_array();
		$data['user']		= $this->MyModel->getUser($email)->row_array();
		$data['count']		= $this->MyModel->getCountRole($email)->num_rows();
		$data['toko']		= $this->db->select('*')->from($this->table)->order_by('id','asc')->get()->result();
		
		$this->load->view('backend/homepage', $data);
	}
}