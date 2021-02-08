<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_keamanan extends CI_Model{

	public function getkeamanan(){
		$username = $this->session->userdata('user_id');
		if(empty($username)){
			$this->session->sess_destroy();
			redirect('/login');
		}
	}
}
