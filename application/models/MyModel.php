<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model {

	// Model Home
	public function getLogin($data)
	{
		$this->db->select('tmst_pengguna.nama, tmst_pengguna.password, tmst_pengguna.login_terakhir, tran_login.login_id, tran_login.role_id, tmst_pengguna.email');
		$this->db->from('tran_login');
		$this->db->join('tref_role','tran_login.role_id=tref_role.id','left');
		$this->db->join('tmst_pengguna','tran_login.login_id=tmst_pengguna.id','left');
		$this->db->where($data);

		$query = $this->db->get();
		return $query;
	}

	public function getRole($email){
		$this->db->select('*');
		$this->db->from('tref_role');
		$this->db->join('tran_login', 'tref_role.id = tran_login.role_id', 'left');
		$this->db->join('tmst_pengguna', 'tran_login.login_id = tmst_pengguna.id', 'left');
		$this->db->where('tmst_pengguna.email', $email);

		$query = $this->db->get();
		return $query;
	}

	public function getUser($email){
		$role = $this->session->userdata('role');
		$id_login = $this->session->userdata('id');

		$array = array('tran_login.login_id' => $id_login, 'tran_login.role_id' => $role);

		$this->db->select('*');
		$this->db->from('tran_login');
		$this->db->join('tmst_pengguna', 'tmst_pengguna.id = tran_login.login_id', 'left');
		$this->db->where($array);

		$query = $this->db->get();
		return $query;
	}

	public function getCountRole($email){
		$this->db->select('*');
		$this->db->from('tran_login');
		$this->db->join('tmst_pengguna', 'tran_login.login_id = tmst_pengguna.id','left');
		$this->db->where('tmst_pengguna.email', $email);

		$query = $this->db->get();
		return $query;
	}

	// Model gak tau
}
