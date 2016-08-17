<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}

	public function add($data){
		$this->db->insert('users',$data);
	}

	public function auth_user($data){
		$this->db->where($data);
		$query=$this->db->get('users');
   		$user=$query->row();
   		return $user;
	}
}