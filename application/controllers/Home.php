<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->model('model_tanggal');
		$isi['content'] 		= 'home';
		$isi['judul'] 			= 'Berita';
		$isi['sub_judul']		= 'Home';
		$isi['data']			= $this->db->query("SELECT * FROM berita ORDER BY id_berita DESC");
		$this->load->view('berita',$isi);
	}

	public function berita()
	{
		$this->load->model('model_tanggal');
		$key = $this->uri->segment(3);
		$isi['content'] 		= 'detail_berita';
		$isi['judul'] 			= 'Berita';
		$isi['sub_judul']		= 'Detail Berita';
		$isi['data']			= $this->db->query("SELECT
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
		$this->load->view('berita',$isi);
	}

	public function kategori(){
		$key = $this->uri->segment(3);
		$this->load->model('model_tanggal');
		$isi['content'] 		= 'kategori_berita';
		$isi['judul'] 			= 'Berita';
		$isi['sub_judul']		= 'Kategori Berita';
		$isi['data']			= $this->db->query("SELECT * FROM berita WHERE sumber = '$key' ORDER BY id_berita DESC");
		$this->load->view('berita',$isi);
	}

	public function search(){
		$cari = $this->input->get('cari');
		$this->load->model('model_tanggal');
		$isi['content'] 		= 'kategori_berita';
		$isi['judul'] 			= 'Berita';
		$isi['sub_judul']		= 'Hasil Pencarian';
		$this->db->like('judul',$cari);
		$isi['data'] = $this->db->get('berita');
		$this->load->view('berita',$isi);
	}
}
