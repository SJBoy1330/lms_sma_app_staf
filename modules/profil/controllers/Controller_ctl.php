<?php defined('BASEPATH') or exit('No direct script access allowed');

class Controller_ctl extends MY_Frontend
{
	public function __construct()
	{
		// Load the constructer from MY_Controller
		parent::__construct();
		$this->id_sekolah = $this->session->userdata('lms_staf_id_sekolah');
		$this->id_staf = $this->session->userdata('lms_staf_id_staf');
		is_logged_in();
	}


	public function index()
	{
		// LOAD TITLE
		$mydata['title'] = 'Profil';

		// Meta Data
		$mydata['id_sekolah'] = $this->id_sekolah;
		$mydata['id_staf'] = $this->id_staf;
		$mydata['role'] = $this->session->userdata('lms_staf_role');
		$mydata['foto'] = $this->session->userdata('lms_staf_foto');
		$mydata['nama'] = $this->session->userdata('lms_staf_nama');
		$mydata['wali_kelas'] = $this->session->userdata('lms_staf_wali_kelas');

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/style-dewa.css') . '">';
		// $this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/loader.css') . '">';

		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/profil/uploadfoto.js"></script>';

		// LOAD VIEW
		$this->data['content'] = $this->load->view('index', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function ubah_profil()
	{
		// LOAD TITLE
		$mydata['title'] = 'Ubah Profil';

		$result = curl_get(
			'profil',
			[
				"id_sekolah" => $this->id_sekolah,
				"id_staf" => $this->id_staf
			]
		);
		$mydata['result'] = $result->data;

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/style-dewa.css') . '">';

		// LOAD CONFIG PAGE 
		$this->data['config_hidden']['notifikasi'] = TRUE;
		$this->data['config_hidden']['footer'] = TRUE;
		$this->data['button_back'] = base_url('profil');
		$this->data['judul_halaman'] = 'Ubah Profil';
		$this->data['right_button']['profil'] = true;

		// LOAD VIEW
		$this->data['content'] = $this->load->view('ubah_profil', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function ubah_password()
	{
		// LOAD TITLE
		$mydata['title'] = 'Ubah Kata Sandi';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/style-dewa.css') . '">';

		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/profil/ubahpassword.js"></script>';

		// LOAD CONFIG HALAMAN
		$this->data['judul_halaman'] = 'Ubah Kata Sandi';
		$this->data['button_back'] = base_url('profil');
		$this->data['config_hidden']['notifikasi'] = TRUE;
		$this->data['config_hidden']['footer'] = TRUE;
		$this->data['right_button']['ubah_password'] = true;
		// LOAD VIEW
		$this->data['content'] = $this->load->view('ubah_password', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}


	public function laporan_presensi()
	{
		// LOAD TITLE
		$mydata['title'] = 'Laporan Presensi Staf';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/style-dewa.css') . '">';

		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/vendor/evo-calendar/js/evo-calendar.js"></script>';
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/laporan/laporan_presensi.js"></script>';

		// LOAD CONFIG PAGE
		$this->data['judul_halaman'] = 'Laporan Presensi';
		$this->data['config_hidden']['notifikasi'] = TRUE;
		$this->data['config_hidden']['footer'] = TRUE;
		$this->data['button_back'] = base_url('profil');

		// LOAD VIEW
		$this->data['content'] = $this->load->view('laporan_presensi', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function laporan_wali_kelas()
	{
		// LOAD TITLE
		$mydata['title'] = 'Laporan Presensi Siswa';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/style-dewa.css') . '">';

		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/vendor/evo-calendar/js/evo-calendar-2.js"></script>';
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/laporan/laporan_wali_kelas.js"></script>';

		// LOAD CONFIG PAGE
		$this->data['judul_halaman'] = 'Laporan Presensi';
		$this->data['config_hidden']['notifikasi'] = TRUE;
		$this->data['config_hidden']['footer'] = TRUE;
		$this->data['button_back'] = base_url('profil');


		// LOAD VIEW
		$this->data['content'] = $this->load->view('laporan_wali_kelas', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function tentang_sekolah()
	{
		// LOAD TITLE
		$mydata['title'] = 'Tentang Sekolah';

		$result = curl_get(
			'profil/tentang_sekolah',
			[
				"id_sekolah" => $this->id_sekolah,
			]
		);
		$mydata['data_sekolah'] = $result->data->sekolah;
		$mydata['count_siswa'] = $result->data->jumlah->siswa;
		$mydata['count_staf'] = $result->data->jumlah->staf;

		// LOAD CONFIG HALAMAN
		$this->data['button_back'] = base_url('profil');
		$this->data['config_hidden']['notifikasi'] = TRUE;
		$this->data['config_hidden']['footer'] = TRUE;
		$this->data['judul_halaman'] = 'Tentang Sekolah';

		// HIDDEN FOOTER
		$mydata['config_hidden']['footer'] = true;
		$mydata['config_hidden']['button_back'] = true;

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/style-dewa.css') . '">';

		// LOAD VIEW
		$this->data['content'] = $this->load->view('tentang_sekolah', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function bantuan()
	{
		// LOAD TITLE
		$mydata['title'] = 'Bantuan';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/style-dewa.css') . '">';

		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/profil/bantuan.js"></script>';


		// LOAD API 
		$result = curl_get(
			'attribut/bantuan/',
			NULL
		);
		$mydata['result'] = $result->data;
		// LOAD CONFIG HALAMAN
		$this->data['button_back'] = base_url('profil');
		$this->data['config_hidden']['notifikasi'] = TRUE;
		$this->data['judul_halaman'] = 'Bantuan';
		$this->data['config_hidden']['footer'] = TRUE;

		// LOAD VIEW
		$this->data['content'] = $this->load->view('bantuan', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function get_report_absen()
	{
		$date = strtotime($this->input->post('date'));
		$hari = day_from_number(date('N', $date));
		$bulan = month_from_number(date('m', $date));
		$mydata['tanggal'] = $hari . ', ' . date('d', $date) . ' ' . $bulan . ' ' . date('Y', $date);

		// LOAD API 
		$data = curl_get(
			'presensi/report/',
			[
				'id_sekolah' => $this->id_sekolah,
				'id_staf' => $this->id_staf,
				'tanggal' => date('Y-m-d', $date)
			]
		);
		$mydata['result'] = $data->data;
		$this->load->view('display/laporan_presensi', $mydata);
	}
	public function get_report_wali()
	{
		$date = strtotime($this->input->post('date'));
		$hari = day_from_number(date('N', $date));
		$bulan = month_from_number(date('m', $date));
		$mydata['tanggal'] = $hari . ', ' . date('d', $date) . ' ' . $bulan . ' ' . date('Y', $date);
		$mydata['time'] = date('Y-m-d', $date);
		// LOAD API 
		$data = curl_get(
			'presensi/report_kelas/',
			[
				'id_sekolah' => $this->id_sekolah,
				'id_staf' => $this->id_staf,
				'tanggal' => date('Y-m-d', $date)
			]
		);
		$mydata['result'] = $data->data;
		$this->load->view('display/laporan_presensi_wali_kelas', $mydata);
	}

	public function get_modal_presensi()
	{
		$status = $this->input->post('status');
		$id_presensi_mapel = $this->input->post('id_presensi_mapel');
		$id_kelas = $this->input->post('id_kelas');

		$mydata['jumlah_ijin'] = 0;
		$mydata['jumlah_sakit'] = 0;
		$mydata['jumlah_alpha'] = 0;
		$mydata['jumlah_masuk'] = 0;

		if ($status != 'tdk' && $id_presensi_mapel != 0) {
			// LOAD API 
			$data = curl_get(
				'presensi/detail_report/',
				[
					'id_sekolah' => $this->id_sekolah,
					'id_presensi_mapel' => $id_presensi_mapel,
					'id_kelas' => $id_kelas
				]
			);
			if ($data->status == 200) {
				$mydata['jumlah_ijin'] = $data->data->ijin;
				$mydata['jumlah_sakit'] = $data->data->sakit;
				$mydata['jumlah_alpha'] = $data->data->alpha;
				$mydata['jumlah_masuk'] = $data->data->hadir;
			} else {
				$mydata['jumlah_ijin'] = 0;
				$mydata['jumlah_sakit'] = 0;
				$mydata['jumlah_alpha'] = 0;
				$mydata['jumlah_masuk'] = 0;
			}
		}
		$mydata['result'] = $data->data;
		$this->load->view('display/modal_detail_presensi', $mydata);
	}


	public function get_modal_presensi_kelas()
	{
		$id_kelas = $this->input->post('id_kelas');
		$tanggal = $this->input->post('tanggal');
		$id_pelajaran = $this->input->post('id_pelajaran');

		$mydata['jumlah_ijin'] = 0;
		$mydata['jumlah_sakit'] = 0;
		$mydata['jumlah_alpha'] = 0;
		$mydata['jumlah_masuk'] = 0;
		// LOAD API 
		$data = curl_get(
			'presensi/detail_report_kelas/',
			[
				'id_sekolah' => $this->id_sekolah,
				'tanggal' => date('Y-m-d', strtotime($tanggal)),
				'id_kelas' => $id_kelas,
				'id_pelajaran' => $id_pelajaran
			]
		);
		if ($data->status == 200) {
			$mydata['jumlah_ijin'] = $data->data->ijin;
			$mydata['jumlah_sakit'] = $data->data->sakit;
			$mydata['jumlah_alpha'] = $data->data->alpha;
			$mydata['jumlah_masuk'] = $data->data->hadir;
		}

		$mydata['result'] = $data->data;
		$this->load->view('display/modal_detail_presensi', $mydata);
	}
}
