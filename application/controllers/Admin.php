<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('model_login');
		$this->load->model('model_konfigurasi');
		$this->load->model('model_profile');
		$this->load->model('model_users');
		$this->load->model('model_berita');
		$this->load->model('model_tanggal');
		$this->load->model('model_sumber');
		$this->model_keamanan->getkeamanan();

	}

	protected function color(){
		return [
			'#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'
		];	
	} 

	protected function highlight(){
		return [
			'#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'
		];
	}

	public function setting(){
		if($_SESSION['level'] == 'Super Admin'){
			
			$isi['content'] 		= 'admin/setting';
			$isi['judul'] 			= 'Konfigurasi';
			$isi['sub_judul']		= 'Setting';
			$query = $this->db->query("SELECT * FROM instansi LIMIT 1");
			if($query->num_rows()>0){
				foreach($query->result() as $row){
					$isi['nama']		= $row->nama;
					$isi['alamat']		= $row->alamat;
					$isi['nama_pim']	= $row->nama_pim;
					$isi['nip_pim']		= $row->nip_pim;
					$isi['logo']		= $row->logo;
				}
			}else{
				$isi['nama']		= '';
				$isi['alamat']		= '';
				$isi['nama_pim']	= '';
				$isi['nip_pim']		= '';
				$isi['logo']		= '';

			}
			$this->load->view('admin/home', $isi);
		}else{
			redirect('error');
		}
	}

	public function piechartApi()
	{
		$data = [
	      "labels" => ["January", "February", "March", "April", "May", "June", "July"],
	      "datasets" => [
	        [
	          "label" => "Electronics",
	          "fillColor" => "rgba(210, 214, 222, 1)",
	          "strokeColor" => "rgba(210, 214, 222, 1)",
	          "pointColor" => "rgba(210, 214, 222, 1)",
	          "pointStrokeColor" => "#c1c7d1",
	          "pointHighlightFill" => "#fff",
	          "pointHighlightStroke" => "rgba(220,220,220,1)",
	          "data" => [65, 59, 80, 81, 56, 55, 40]
	        ],[
	          "label" => "Digital Goods",
	          "fillColor" => "rgba(60,141,188,0.9)",
	          "strokeColor" => "rgba(60,141,188,0.8)",
	          "pointColor" => "#3b8bba",
	          "pointStrokeColor" => "rgba(60,141,188,1)",
	          "pointHighlightFill" => "#fff",
	          "pointHighlightStroke" => "rgba(60,141,188,1)",
	          "data" => [28, 48, 40, 19, 86, 27, 90]
	        ]
	      ]
	    ];
	    echo json_encode($data);
	}

	public function barchartApi()
	{
		$data = [];
		$color = $this->color();
		$highlight = $this->highlight();
		if(!empty($this->setSourceNews())){
			foreach($this->setSourceNews()->result() as $key => $value){
				$data[] = [
	              "value" => 700,
	              "color" => $color[rand(0, (count($color) - 1))],
	              "highlight" => $highlight[rand(0, (count($highlight) - 1))],
	              "label" => $value->sumber
	            ];
			}
		}
         echo json_encode($data);
	}

	protected function setNewsValueBySource()
	{
		return $this->model_sumber->getNewsValueBySource();
	}

	protected function setSourceNews()
	{
		return $this->model_sumber->getAll();
	}	

	public function simpan_setting(){
		if($_SESSION['level'] == 'Super Admin'){
			
			$key = $this->uri->segment(3);

			$config['upload_path'] 		= './upload/image';
			$config['allowed_types'] 	= 'jpg|png|jpeg';
			$config['max_size']			= '2000';
			$config['max_width']  		= '3000';
			$config['max_height'] 		= '3000';

			$this->load->library('upload', $config);
			
			
			if ($this->upload->do_upload('logo')) {
				$up_data	 		= $this->upload->data();
				$data['nama']		= addslashes(htmlentities(trim($this->input->post('nama'))));
				$data['alamat']		= addslashes(htmlentities(trim($this->input->post('alamat'))));
				$data['nama_pim']	= addslashes(htmlentities(trim($this->input->post('nama_pim'))));
				$data['nip_pim']	= addslashes(htmlentities(trim($this->input->post('nip_pim'))));
				$data['logo']		= $up_data['file_name'];

				$query = $this->model_konfigurasi->getdata($key);
				if($query->num_rows()>0){
					$edit = $this->model_konfigurasi->getupdate($key,$data);
					if($edit){	
						$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Edit!</div>");
					}else{
						$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Edit!</div>");
					}
				}else{
					$simpan = $this->model_konfigurasi->getinsert($data);
					if($simpan){	
						$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Simpan!</div>");
					}else{
						$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Simpan!</div>");
					}
				}
			}else{
				$data['nama']		= addslashes(htmlentities(trim($this->input->post('nama'))));
				$data['alamat']		= addslashes(htmlentities(trim($this->input->post('alamat'))));
				$data['nama_pim']	= addslashes(htmlentities(trim($this->input->post('nama_pim'))));
				$data['nip_pim']	= addslashes(htmlentities(trim($this->input->post('nip_pim'))));

				$query = $this->model_konfigurasi->getdata($key);
				if($query->num_rows()>0){
					$edit = $this->model_konfigurasi->getupdate($key,$data);
					if($edit){	
						$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Edit!</div>");
					}else{
						$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Edit!</div>");
					}
				}else{
					$simpan = $this->model_konfigurasi->getinsert($data);
					if($simpan){	
						$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Simpan!</div>");
					}else{
						$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Simpan!</div>");
					}
				}
			}
			redirect('admin/setting');
		}else{
			redirect('error');
		}
	}


	public function home()
	{
		
		$isi['judul'] 		= 'Dashboard';
		$isi['sub_judul']	= 'Dashboard';
		$isi['content'] 	= 'admin/dashboard';
		$this->load->view('admin/home', $isi);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	public function profile(){
		
		$isi['content'] 	= 'admin/lihat_profile';
		$isi['judul'] 		= 'Dashboard';
		$isi['sub_judul']	= ' View Profile';
		$key = $_SESSION['user_id'];
		$this->db->where('user_id',$key);
		$isi['data'] 		= $this->db->get('users');
		$this->load->view('admin/home', $isi);
	}

	public function editprofile()
	{
		
		$isi['content'] 	= 'admin/edit_profile';
		$isi['judul'] 		= 'Dashboard';
		$isi['sub_judul']	= ' Edit Profile';
		$key = $_SESSION['user_id'];
		$this->db->where('user_id',$key);
		$query = $this->db->get('users');
		foreach($query->result() as $row){
			$isi['namalengkap']	= $row->namalengkap;
			$isi['foto']		= $row->foto;
		}
		$this->load->view('admin/home', $isi);
	}

	public function simpanprofile(){
		
		
		//upload config 
		$config['upload_path'] 		= './upload/image';
		$config['allowed_types'] 	= 'jpg|png';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('foto_user')) {
			$up_data	 	= $this->upload->data();
			$key = $_SESSION['user_id'];
			$data['namalengkap']	= addslashes(htmlentities(trim($this->input->post('namalengkap'))));
			$data['foto']			= $up_data['file_name'];
			$query = $this->model_profile->getdata($key);
			if($query->num_rows()>0){
				$edit = $this->model_profile->getupdate($key,$data);
				if($edit){	
					$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Edit!</div>");
				}else{
					$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Di Simpan!</div>");
				}
			}else{
				$simpan = $this->model_profile->getinsert($data);
				if($simpan){	
					$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Simpan!</div>");
				}else{
					$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Simpan!</div>");
				}
			}
		}else{
			$key = $_SESSION['user_id'];
			$data['namalengkap']	= addslashes(htmlentities(trim($this->input->post('namalengkap'))));
			$query = $this->model_profile->getdata($key);
			if($query->num_rows()>0){
				$edit = $this->model_profile->getupdate($key,$data);
				if($edit){	
					$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Simpan!</div>");
				}else{
					$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Di Simpan!</div>");
				}
			}else{
				$simpan = $this->model_profile->getinsert($data);
				if($simpan){	
					$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Simpan!</div>");
				}else{
					$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Simpan!</div>");
				}
			}
		}

		redirect('admin/editprofile');
	}

	public function ganti_password()
	{
		
		$isi['content'] 	= 'admin/ganti_password';
		$isi['judul'] 		= 'Dashboard';
		$isi['sub_judul']	= ' Ganti Password';
		$this->load->view('admin/home', $isi);
	}

	public function submitpassword(){
		$berlaku 	= addslashes(htmlentities(md5($this->input->post('berlaku'))));
		$baru 		= addslashes(htmlentities(md5($this->input->post('baru'))));
		$ulang 		= addslashes(htmlentities(md5($this->input->post('ulang'))));
		
		if(empty($_SESSION['user_id'])){
			redirect('admin/login');
		}else{
			$user_id 		= $_SESSION['user_id'];
			$sql = $this->db->query("SELECT * FROM users WHERE user_id = '$user_id' AND password = '$berlaku'");
			$cocok = $sql->num_rows();

			if($cocok > 0){
				if($baru != $ulang){
					$this->session->set_flashdata('info',"<div class='callout callout-danger'>Password Baru dan Lama Harus Sama</div>");
				}else{
					$sql = $this->db->query("SELECT * FROM users WHERE user_id = '$user_id' AND password = '$berlaku'");
					$cekpass = $sql->num_rows();
					if($cekpass>0){
						$update = $this->db->query("UPDATE users SET password = '$ulang' WHERE user_id = '$user_id'");
						if($update){	
						$this->session->set_flashdata('info',"<div class='callout callout-success'>Password Berhasil di Edit!</div>");
						}
					}else{
						$this->session->set_flashdata('info',"<div class='callout callout-danger'>Password Gagal di Edit</div>");
					}
				}
			}else{
				$this->session->set_flashdata('info',"<div class='callout callout-danger'>Password Tidak Cocok!</div>");
			}		
		}
		redirect('admin/ganti_password');
	}

	public function users(){
		if($_SESSION['level'] == 'Super Admin'){
			
			$isi['judul'] 		= 'Users';
			$isi['sub_judul']	= 'Lihat Users';
			$isi['content'] 	= 'admin/lihat_users';
			$isi['data']		= $this->db->get('users');
			$this->load->view('admin/home', $isi);
		}else{
			redirect('error');
		}
	}

	public function tambah_users(){
		if($_SESSION['level'] == 'Super Admin'){
			
			$isi['content'] 	= 'admin/tambah_user';
			$isi['judul'] 		= 'Users';
			$isi['sub_judul']	= ' Tambah Users';
			$isi['user_id']		= '';
			$isi['namalengkap']	= '';
			$isi['level']		= '';
			$this->load->view('admin/home', $isi);
		}else{
			redirect('error');
		}
	}

	public function edit_users(){
		if($_SESSION['level'] == 'Super Admin'){
			
			$isi['content'] 		= 'admin/tambah_user';
			$isi['judul'] 			= 'User';
			$isi['sub_judul']		= 'Edit User';
			$key = $this->uri->segment(3);
			$this->db->where('user_id',$key);
			$query = $this->db->get('users');
			if($query->num_rows()>0){
				foreach($query->result() as $row){
					$isi['user_id']		= $row->user_id;
					$isi['namalengkap']	= $row->namalengkap;
					$isi['level']		= $row->level;

				}
			}else{
					$isi['user_id']		= '';
					$isi['namalengkap']	= '';
					$isi['level']		= '';
			}
			$this->load->view('admin/home', $isi);
		}else{
			redirect('error');
		}
	}
		

	public function simpan_users(){
		if($_SESSION['level'] == 'Super Admin'){
			
			$key = $this->input->post('user_id');
			
			$query = $this->model_users->getdata($key);
			if($query->num_rows()>0){
				$data['namalengkap']= addslashes(htmlentities(trim($this->input->post('namalengkap'))));
				$data['level']		= addslashes(htmlentities(trim($this->input->post('level'))));
				$edit = $this->model_users->getupdate($key,$data);
				if($edit){	
					$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Edit!</div>");
				}else{
					$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Edit!</div>");
				}
			}else{
				$data['user_id']	= addslashes(htmlentities(trim($this->input->post('user_id'))));
				$data['namalengkap']= addslashes(htmlentities(trim($this->input->post('namalengkap'))));
				$data['level']		= addslashes(htmlentities(trim($this->input->post('level'))));
				$data['password']	= addslashes(htmlentities(trim(md5($this->input->post('password')))));
				$simpan = $this->model_users->getinsert($data);
				if($simpan){	
					$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Simpan!</div>");
				}else{
					$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Simpan!</div>");
				}
			}
			redirect('admin/users');
		}else{
			redirect('error');
		}
	}

	public function hapus_users(){
		if($_SESSION['level'] == 'Super Admin'){
			
			
			$key = $this->uri->segment(3);
			$this->db->where('user_id',$key);
			$query = $this->db->get('users');
			if($query->num_rows()>0){
				$this->model_users->getdelete($key);
				$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Hapus!</div>");
			}else{
				$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di hapus!</div>");
			}
			redirect('admin/users');
		}else{
			redirect('error');
		}
	}

	public function ubahpassword(){
		if($_SESSION['level'] == 'Super Admin'){
			
			$isi['content'] 	= 'admin/ganti_password2';
			$isi['judul'] 		= 'Dashboard';
			$isi['sub_judul']	= ' Ganti Password';
			$this->load->view('admin/home', $isi);
		}else{
			redirect('error');
		}
	}

	public function submitpassword2(){
		if($_SESSION['level'] == 'Super Admin'){
			
			$key = $this->uri->segment(3);
			$data['password']		= addslashes(htmlentities(md5($this->input->post('password'))));
			$query = $this->model_users->getdata($key);
			if($query->num_rows()>0){
				$edit = $this->model_users->getupdate($key,$data);
				if($edit){	
					$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Edit!</div>");
				}else{
					$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Edit!</div>");
				}
			}
			redirect('admin/users');
		}else{
			redirect('error');
		}
	}

	public function tambah_berita()
	{
		
		$isi['content'] 	= 'admin/tambah_berita';
		$isi['judul'] 		= 'Berita';
		$isi['sub_judul']	= ' Tambah Berita';
		$isi['id_berita']	= '';
		$isi['judul']		= '';
		$isi['sumber']		= '';
		$isi['tanggal']		= '';
		$isi['halaman']		= '';
		$isi['reporter']	= '';
		$isi['upload']		= '';
		$isi['label']		= '';
		$isi['resume']		= '';
		$this->load->view('admin/home', $isi);
	}

	public function simpan_berita(){
		
		$config['upload_path'] 		= './upload/berita';
		$config['allowed_types'] 	= 'jpg|png|pdf|doc|docx';
		$config['max_size']			= '10000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('upload')) {
			$up_data	 	= $this->upload->data();
			$key = $this->input->post('id_berita');
			$data['judul']		= addslashes(htmlentities(trim($this->input->post('judul'))));
			$data['sumber']		= addslashes(htmlentities(trim($this->input->post('sumber'))));
			$data['tanggal']	= addslashes(htmlentities(trim($this->input->post('tanggal'))));
			$data['halaman']	= addslashes(htmlentities(trim($this->input->post('halaman'))));
			$data['reporter']	= addslashes(htmlentities(trim($this->input->post('reporter'))));
			$data['label']		= addslashes(htmlentities(trim($this->input->post('label'))));
			$data['resume']		= addslashes(htmlentities(trim($this->input->post('resume'))));
			$data['upload']		= $up_data['file_name'];
			$query = $this->model_berita->getdata($key);
			if($query->num_rows()>0){
				$edit = $this->model_berita->getupdate($key,$data);
				if($edit){	
					$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Edit!</div>");
				}else{
					$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Edit!</div>");
				}
			}else{
				$simpan = $this->model_berita->getinsert($data);
				if($simpan){	
					$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Simpan!</div>");
				}else{
					$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Simpan!</div>");
				}
			}
		}else{
			$key = $this->input->post('id_berita');
			$data['judul']		= addslashes(htmlentities(trim($this->input->post('judul'))));
			$data['sumber']		= addslashes(htmlentities(trim($this->input->post('sumber'))));
			$data['tanggal']	= addslashes(htmlentities(trim($this->input->post('tanggal'))));
			$data['halaman']	= addslashes(htmlentities(trim($this->input->post('halaman'))));
			$data['reporter']	= addslashes(htmlentities(trim($this->input->post('reporter'))));
			$data['label']		= addslashes(htmlentities(trim($this->input->post('label'))));
			$data['resume']		= addslashes(htmlentities(trim($this->input->post('resume'))));
			$query = $this->model_berita->getdata($key);
			if($query->num_rows()>0){
				$edit = $this->model_berita->getupdate($key,$data);
				if($edit){	
					$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Edit!</div>");
				}else{
					$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Edit!</div>");
				}
			}else{
				$simpan = $this->model_berita->getinsert($data);
				if($simpan){	
					$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Simpan!</div>");
				}else{
					$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Simpan!</div>");
				}
			}
		}

			redirect('admin/tambah_berita');
	}

	public function lihat_berita(){
		
		$isi['content'] 	= 'admin/lihat_berita';
		$isi['judul'] 		= 'Berita';
		$isi['sub_judul']	= ' Lihat Berita';
		$this->load->view('admin/home', $isi);
	}

	public function edit_berita(){
		
		$isi['content'] 		= 'admin/tambah_berita';
		$isi['judul'] 			= 'Berita';
		$isi['sub_judul']		= 'Edit Berita';
		$key = $this->uri->segment(3);
		$this->db->where('id_berita',$key);
		$query = $this->db->get('berita');
		if($query->num_rows()>0){
			foreach($query->result() as $row){
				$isi['id_berita']	= $row->id_berita;
				$isi['judul']		= $row->judul;
				$isi['sumber']		= $row->sumber;
				$isi['tanggal']		= $row->tanggal;
				$isi['halaman']		= $row->halaman;
				$isi['reporter']	= $row->reporter;
				$isi['upload']		= $row->upload;
				$isi['label']		= $row->label;
				$isi['resume']		= $row->resume;

			}
		}else{
				$isi['id_berita']	= '';
				$isi['judul']		= '';
				$isi['sumber']		= '';
				$isi['tanggal']		= '';
				$isi['halaman']		= '';
				$isi['reporter']	= '';
				$isi['upload']		= '';
				$isi['label']		= '';
				$isi['resume']		= '';
		}
		$this->load->view('admin/home', $isi);
	}

	public function hapus_berita(){
		
		$key = $this->uri->segment(3);
		$this->db->where('id_berita',$key);
		$query = $this->db->get('berita');
		if($query->num_rows()>0){
			$this->model_berita->getdelete($key);
			$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Hapus!</div>");
		}else{
			$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Edit!</div>");
		}
		redirect('admin/lihat_berita');
	}

	public function detail_berita(){
		
		$key = $this->uri->segment(3);
		$isi['content'] 	= 'admin/detail_berita';
		$isi['judul'] 		= 'Berita';
		$isi['sub_judul']	= ' Detail Berita';
		$isi['data']		= $this->db->query("SELECT
							berita.judul,
							berita.label,
							berita.upload,
							berita.resume,
							berita.id_berita,
							sumber.sumber,
							berita.tanggal,
							berita.halaman,
							berita.reporter
							FROM
							berita
							INNER JOIN sumber ON sumber.id_sumber = berita.sumber
							WHERE id_berita = $key");
		$this->load->view('admin/home', $isi);
	}

	public function upload_gambar(){
		
		$key = $this->uri->segment(3);
		$isi['content'] 	= 'admin/upload_gambar';
		$isi['judul'] 		= 'Upload';
		$isi['sub_judul']	= ' Upload Cover';
		$this->db->where('id_berita',$key);
		$query = $this->db->get('berita');
		if($query->num_rows()>0){
			foreach($query->result() as $row){
				$isi['id_berita']	= $row->id_berita;
				$isi['foto']		= $row->foto;

			}
		}else{
			$isi['id_berita']	= '';
			$isi['foto']		= '';
		}
		$this->load->view('admin/home', $isi);
	} 

	public function simpan_gambar(){
		
		$config['upload_path'] 		= './upload/berita';
		$config['allowed_types'] 	= 'jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('foto')) {
			$up_data	 	= $this->upload->data();
			$key = $this->input->post('id_berita');
			$data['foto']		= $up_data['file_name'];
			$query = $this->model_berita->getdata($key);
			if($query->num_rows()>0){
				$edit = $this->model_berita->getupdate($key,$data);
				if($edit){	
					$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Edit!</div>");
				}else{
					$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Edit!</div>");
				}
			}else{
				$simpan = $this->model_berita->getinsert($data);
				if($simpan){	
					$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Simpan!</div>");
				}else{
					$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Simpan!</div>");
				}
			}
		}

			redirect('admin/upload_gambar/'.$key);
	}

	public function lihat_sumber(){
		
		$isi['content'] 	= 'admin/lihat_sumber';
		$isi['judul'] 		= 'Sumber';
		$isi['sub_judul']	= ' Lihat Sumber';
		$isi['data']		= $this->db->get('sumber');
		$this->load->view('admin/home', $isi);
	}

	public function tambah_sumber()
	{
		
		$isi['content'] 	= 'admin/tambah_sumber';
		$isi['judul'] 		= 'Sumber';
		$isi['sub_judul']	= ' Tambah Sumber';
		$isi['id_sumber']	= '';
		$isi['sumber']		= '';
		$isi['ket']			= '';
		$this->load->view('admin/home', $isi);
	}

	public function edit_sumber(){
		
		$isi['content'] 		= 'admin/tambah_sumber';
		$isi['judul'] 			= 'Sumber';
		$isi['sub_judul']		= 'Edit Sumber';
		$key = $this->uri->segment(3);
		$this->db->where('id_sumber',$key);
		$query = $this->db->get('sumber');
		if($query->num_rows()>0){
			foreach($query->result() as $row){
				$isi['id_sumber']	= $row->id_sumber;
				$isi['sumber']		= $row->sumber;
				$isi['ket']			= $row->ket;

			}
		}else{
			$isi['id_sumber']	= '';
			$isi['sumber']		= '';
			$isi['ket']			= '';
		}
		$this->load->view('admin/home', $isi);
	}

	public function simpan_sumber(){
		$key = $this->input->post('id_sumber');
			$data['sumber']		= addslashes(htmlentities(trim($this->input->post('sumber'))));
			$data['ket']		= addslashes(htmlentities(trim($this->input->post('ket'))));
			$query = $this->model_sumber->getdata($key);
			if($query->num_rows()>0){
				$edit = $this->model_sumber->getupdate($key,$data);
				if($edit){	
					$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Edit!</div>");
				}else{
					$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Edit!</div>");
				}
			}else{
				$simpan = $this->model_sumber->getinsert($data);
				if($simpan){	
					$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Simpan!</div>");
				}else{
					$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Simpan!</div>");
				}
			}
		redirect('admin/lihat_sumber');
	}

	public function hapus_sumber(){
		
		$key = $this->uri->segment(3);
		$this->db->where('id_sumber',$key);
		$query = $this->db->get('sumber');
		if($query->num_rows()>0){
			$this->model_sumber->getdelete($key);
			$this->session->set_flashdata('info',"<div class='callout callout-success'>Data Berhasil di Hapus!</div>");
		}else{
			$this->session->set_flashdata('info',"<div class='callout callout-danger'>Data Gagal di Edit!</div>");
		}
		redirect('admin/lihat_sumber');
	}

	public function lihat_report(){
		
		$isi['content'] 	= 'admin/report';
		$isi['judul'] 		= 'Report';
		$isi['sub_judul']	= ' Report Berita';
		$this->load->view('admin/home', $isi);
	}

	public function report(){
		
		$tgl_start	= addslashes(htmlentities(trim($this->input->post('thn')))).'-'.addslashes(htmlentities(trim($this->input->post('bln')))).'-'.addslashes(htmlentities(trim($this->input->post('tgl'))));
		$tgl_end 	= addslashes(htmlentities(trim($this->input->post('thn2')))).'-'.addslashes(htmlentities(trim($this->input->post('bln2')))).'-'.addslashes(htmlentities(trim($this->input->post('tgl2'))));
		$sumber = addslashes(htmlentities(trim($this->input->post('sumber'))));
		$isi['dari'] = $tgl_start;
		$isi['sampai'] = $tgl_end;

		if($sumber == 'all'){
			$isi['data'] = $this->db->query("SELECT
							berita.judul,
							sumber.sumber as nama_sumber,
							berita.tanggal,
							berita.halaman,
							berita.label,
							berita.reporter
							FROM
							berita
							INNER JOIN sumber ON sumber.id_sumber = berita.sumber
							WHERE tanggal >= '$tgl_start' AND tanggal <= '$tgl_end' ");
		}else{
			$isi['data'] = $this->db->query("SELECT
						berita.judul,
						sumber.sumber as nama_sumber,
						berita.tanggal,
						berita.halaman,
						berita.label,
						berita.reporter,
						berita.sumber
						FROM
						berita
						INNER JOIN sumber ON sumber.id_sumber = berita.sumber
						WHERE
						berita.sumber = $sumber AND tanggal >= '$tgl_start' AND tanggal <= '$tgl_end' ");
		}
		$this->load->view('admin/report_berita',$isi);
	}

}
