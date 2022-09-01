<?php defined('BASEPATH') or exit('No direct script access allowed');

class Controller_ctl extends MY_Frontend
{
	public function __construct()
	{
		// Load the constructer from MY_Controller
		parent::__construct();
		$this->id_sekolah = $this->session->userdata('lms_staf_id_sekolah');
		$this->id_staf = $this->session->userdata('lms_staf_id_staf');
	}


	public function index()
	{
		// LOAD TITLE
		$mydata['title'] = 'Notifikasi';

		// LOAD CONFIG PAGE
		if ($_SERVER['HTTP_REFERER'] == NULL || $_SERVER['HTTP_REFERER'] == base_url('notifikasi')) {
			$link = base_url('home');
		} else {
			$link = $_SERVER['HTTP_REFERER'];
		}
		$this->data['button_back'] =  $link;
		$this->data['config_hidden']['notifikasi'] = TRUE;
		$this->data['config_hidden']['footer'] = TRUE;
		$this->data['judul_halaman'] = 'Notifikasi';

		// 	GET API
		$result = curl_get(
			'notifikasi',
			[
				"id_sekolah" => $this->id_sekolah,
				"id_staf" => $this->id_staf
			]
		);
		$mydata['result'] = $result->data;

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/notifikasi/notifikasi.css') . '">';

		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/notifikasi/notifikasi.js"></script>';

		// LOAD CONFIG PAGE
		$this->data['khusus']['notifikasi'] = TRUE;
		// LOAD VIEW
		$this->data['content'] = $this->load->view('index', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}


	public function read_notif()
	{
		// Load meta data
		$id_notifikasi_staf = $this->input->post('id_notifikasi_staf');
		$action =  curl_post(
			'notifikasi/read',
			[
				"id_sekolah" => $this->id_sekolah,
				"id_notifikasi_staf" => $id_notifikasi_staf
			]
		);

		echo json_encode($action);
	}

	public function detail_notif()
	{
		$id_notifikasi_staf = $this->input->post('id_notifikasi_staf');

		// 	GET API
		$result = curl_get(
			'notifikasi',
			[
				"id_sekolah" => $this->id_sekolah,
				"id_staf" => $this->id_staf,
				"id_notifikasi_staf" => $id_notifikasi_staf
			]
		);
		$this->load->view('modal_notifikasi', $result->data);
	}

	public function hapus_all()
	{
		// Load meta data
		$id_sekolah = $this->session->userdata('lms_wali_id_sekolah');
		$id_notifikasi_staf = $this->input->post('id_notifikasi_staf');

		$api = curl_post('notifikasi/hapus', ['id_sekolah' => $id_sekolah, 'id_notifikasi_staf' => json_encode($id_notifikasi_staf)]);

		$data['status'] = 200;
		$data['id_notifikasi_staf'] = $id_notifikasi_staf;

		sleep(1.5);
		echo json_encode($data);
	}

	public function read_all()
	{
		// Load meta data
		$id_sekolah = $this->session->userdata('lms_wali_id_sekolah');
		$id_notifikasi_staf = $this->input->post('id_notifikasi_staf');

		$api = curl_post('notifikasi/read_all', ['id_sekolah' => $id_sekolah, 'id_notifikasi_staf' => json_encode($id_notifikasi_staf)]);

		$data['status'] = 200;
		// $data['load']['parent'] = '#parent_notif';
		// $data['load']['reload'] = base_url('notifikasi #reload_content_notif');
		$data['id_notifikasi_staf'] = $id_notifikasi_staf;

		sleep(2);
		echo json_encode($data);
	}
}
