<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MyModel');
	}

	public function index()
	{
		$this->load->view('frontend/index');
	}

	public function getLogin()
	{
		$data = array('email' => $this->input->post('email', TRUE),
					  'password' => md5($this->input->post('password', TRUE))
		);

		$hasil = $this->MyModel->getLogin($data);

		if($hasil->num_rows() == TRUE) 
		{
			foreach($hasil->result() as $sess) 
			{				
				$sess_data['id'] = $sess->login_id;
				$sess_data['nama'] = $sess->nama;
				$sess_data['email'] = $sess->email;
				$sess_data['role'] = $sess->role_id;
				$sess_data['login_terakhir'] = $sess->login_terakhir;
				$this->session->set_userdata($sess_data);
			}

			$this->db->update('tmst_pengguna',
                array('login_terakhir'=>date('y-m-d H:i:s')),
                array('id'=>$sess->login_id)
            );

            $role = $this->session->userdata('role');

            if ($role == 1) {
				redirect('home');
			} else {
				redirect('website');
			}
		} else {
			echo "<script>alert('Gagal login: Cek username atau password!');history.go(-1);</script>";
		}
	}
}
