<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_users extends CI_Model{

	public function getdata($key){
		$this->db->where('user_id',$key);
		$hasil = $this->db->get('users');
		return $hasil;
	}

	public function getupdate($key,$data){
		$this->db->where('user_id',$key);
		$this->db->update('users',$data);
	}

	public function getinsert($data){
		$this->db->insert('users',$data);
	}

	public function getdelete($key){
		$this->db->where('user_id',$key);
		$this->db->delete('users');
	}
}
