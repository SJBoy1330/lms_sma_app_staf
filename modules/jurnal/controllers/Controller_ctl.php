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
		// DEKLARASI DATA 
		$tanggal = $this->input->get('tanggal');
		if (!$tanggal) {
			$tanggal = date('Y-m-d');
		}
		// LOAD TITLE
		$mydata['title'] = 'Jurnal Guru';
		$nice_tanggal =
			day_from_number(date('N', strtotime($tanggal))) . ', ' . date('d', strtotime($tanggal)) . ' ' . month_from_number(date('m', strtotime($tanggal))) . ' ' . date('Y', strtotime($tanggal));
		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/jurnal/jurnal.css') . '">';
		// CONFIG HALAMAN
		if ($_SERVER['HTTP_REFERER'] == NULL) {
			$link = base_url('home');
		} else {
			$arrLink = explode('/', $_SERVER['HTTP_REFERER']);
			if (in_array('jurnal', $arrLink)) {
				$link = base_url('home');
			} else {
				$link = $_SERVER['HTTP_REFERER'];
			}
		}
		$this->data['button_back'] = $link;
		$this->data['config_hidden']['notifikasi'] = true;
		$this->data['config_hidden']['footer'] = true;
		$this->data['judul_halaman'] = 'Jurnal Guru<br><span style="font-size : 14px; font-weight: normal; color : #EC3528;">' . $nice_tanggal . '</span>';
		$this->data['right_button']['jurnal_guru'] = true;

		// LOAD API 
		$result = curl_get('jurnal/guru', ['id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf, 'tanggal' => $tanggal]);
		// DEKLARASI MYDATA
		$mydata['result'] = $result->data;
		$mydata['nice_tanggal'] = $nice_tanggal;
		$mydata['tanggal'] = $tanggal;

		// LOAD VIEW
		$this->data['content'] = $this->load->view('jurnal_guru', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function detail_jurnal_guru($id_pelajaran = NULL, $id_kelas = NULL)
	{
		if ($id_pelajaran == NULL || $id_kelas == NULL) {
			redirect('jurnal');
		}
		$tanggal = $this->input->get('tanggal');
		if (!$tanggal) {
			$tanggal = date('Y-m-d');
		}
		// LOAD TITLE
		$mydata['title'] = 'Jurnal Guru';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/jurnal/jurnal.css') . '">';

		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/jurnal/detail_jurnal.js"></script>';
		// LOAD CONFIG
		if ($_SERVER['HTTP_REFERER'] == NULL) {
			$link = base_url('home');
		} else {
			$arrLink = explode('/', $_SERVER['HTTP_REFERER']);
			if (in_array('jurnal', $arrLink)) {
				$link = base_url('jurnal');
			} else {
				$link = $_SERVER['HTTP_REFERER'];
			}
		}
		$this->data['button_back'] = $link;
		$this->data['config_hidden']['notifikasi'] = true;
		$this->data['config_hidden']['footer'] = true;
		$this->data['judul_halaman'] = 'Detail Jurnal Guru';
		$result = curl_get('jurnal/detail_jurnal_guru/', ['id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf, 'id_kelas' => $id_kelas, 'id_pelajaran' => $id_pelajaran, 'tanggal' => $tanggal]);
		// LOAD MYDATA
		$mydata['result'] = $result->data;
		$mydata['id_pelajaran'] = $id_pelajaran;
		$mydata['id_kelas'] = $id_kelas;
		$mydata['tanggal'] = $tanggal;
		// LOAD VIEW
		$this->data['content'] = $this->load->view('detail_jurnal_guru', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function jurnal_staf()
	{
		// LOAD TITLE
		$mydata['title'] = 'Jurnal Staf';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/jurnal/jurnal.css') . '">';

		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/jurnal/jurnal.js"></script>';
		// CONFIG HALAMAN
		if ($_SERVER['HTTP_REFERER'] == NULL) {
			$link = base_url('home');
		} else {
			$arrLink = explode('/', $_SERVER['HTTP_REFERER']);
			if (in_array('jurnal', $arrLink)) {
				$link = base_url('home');
			} else {
				$link = $_SERVER['HTTP_REFERER'];
			}
		}
		$this->data['button_back'] = $link;
		$this->data['config_hidden']['notifikasi'] = true;
		$this->data['config_hidden']['footer'] = true;
		$this->data['judul_halaman'] = 'Jurnal Staf';
		$this->data['right_button']['jurnal_staf'] = true;
		// LOAD API 
		$tanggal = $this->input->get('tahun') . '-' . '0' . $this->input->get('bulan');
		if (!$tanggal) {
			$tanggal = date('Y-m');
		}
		$params['id_sekolah'] = $this->id_sekolah;
		$params['id_staf'] = $this->id_staf;
		$params['tanggal'] = $tanggal;
		$result = curl_get('jurnal/staf/', $params);
		$tugas = curl_get('jurnal/tugas_staf/', ['id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf]);
		// DEKLARASI MYDATA 
		$tahun = $this->input->get('tahun');
		if (!$tahun) {
			$tahun = date('Y');
		}
		$bulan = intval($this->input->get('bulan'));
		if (!$bulan) {
			$bulan = intval(date('m'));
		}
		$mydata['tahun'] = $tahun;
		$mydata['bulan'] = $bulan;
		$mydata['result'] = $result->data;
		$mydata['tugas'] = $tugas->data;
		// LOAD VIEW
		$this->data['content'] = $this->load->view('jurnal_staf', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}
}
