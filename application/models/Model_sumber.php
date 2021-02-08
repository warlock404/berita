<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sumber extends CI_Model{

	public function getdata($key){
		$this->db->where('id_sumber',$key);
		$hasil = $this->db->get('sumber');
		return $hasil;
	}

	public function getAll()
	{
		return $this->db->get('sumber');
	}

	public function getupdate($key,$data){
		$this->db->where('id_sumber',$key);
		$this->db->update('sumber',$data);
	}

	public function getinsert($data){
		$this->db->insert('sumber',$data);
	}

	public function getdelete($key){
		$this->db->where('id_sumber',$key);
		$this->db->delete('sumber');
	}
}
