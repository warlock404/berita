<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_konfigurasi extends CI_Model{

	public function getdata($key){
		$this->db->where('id',$key);
		$hasil = $this->db->get('instansi');
		return $hasil;
	}

	public function getupdate($key,$data){
		$this->db->where('id',$key);
		$this->db->update('instansi',$data);
	}

	public function getinsert($data){
		$this->db->insert('instansi',$data);
	}
}
