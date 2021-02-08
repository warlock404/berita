<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_berita extends CI_Model{

	public function getdata($key){
		$this->db->where('id_berita',$key);
		$hasil = $this->db->get('berita');
		return $hasil;
	}

	public function getupdate($key,$data){
		$this->db->where('id_berita',$key);
		$this->db->update('berita',$data);
	}

	public function getinsert($data){
		$this->db->insert('berita',$data);
	}

	public function getdelete($key){
		$this->db->where('id_berita',$key);
		$this->db->delete('berita');
	}

	public function berita($limit, $start, $tanggal){
		return $this->db->query("SELECT * FROM berita WHERE tanggal = '$tanggal' ORDER BY id_berita DESC LIMIT $start, $limit");
	}

	public function berita_numrows($tanggal){
		return $this->db->query("SELECT * FROM berita WHERE tanggal = '$tanggal'")
					->num_rows();
	}
}
