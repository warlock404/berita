<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model{

	public function actionLogin($username, $password)
	{
		$pwd = md5($password);
		$this->db->where('user_id', $username);
		$this->db->where('password',$pwd);
		$query = $this->db->get('users');
		return $query;
	}

}
