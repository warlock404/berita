<?php 

class Login extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_login');
	}

	public function index()
	{
		if(!empty($this->session->userdata('user_id'))){
			redirect('admin/home');
		}else{	
			$this->load->view('admin/login');
		}
	}

	public function getlogin(){
		$username 	= addslashes(htmlentities(trim($this->input->post('username'))));
		$password 	= addslashes(htmlentities(trim($this->input->post('password'))));
		$query = $this->model_login->actionLogin($username,$password);
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$sess = array('user_id' => $row->user_id,
							  'namalengkap' => $row->namalengkap,
							  'level' => $row->level);
				$this->session->set_userdata($sess);
				redirect('admin/home');
			}
		}else{
			$this->session->set_flashdata('info',"<div class='callout callout-danger'>Username Atau Password Salah</div>");
			redirect('/login');
		}
	}
}