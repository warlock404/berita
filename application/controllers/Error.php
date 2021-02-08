<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {

	public function index()
	{
		$this->model_keamanan->getkeamanan();
		$isi['content'] 	= '404';
		$isi['judul'] 		= '';
		$isi['sub_judul']	= '';
		$this->load->view('admin/home', $isi);
	}

}
