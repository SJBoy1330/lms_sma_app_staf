<?php defined('BASEPATH') or exit('No direct script access allowed');

class Controller_ctl extends MY_Frontend
{
	protected $id_sekolah = '';
	protected $id_staf = '';
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
		$mydata['title'] = 'Surat Ijin';

		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/surat_ijin/surat_ijin.js"></script>';

		// LOAD CONFIG PAGE
		if ($_SERVER['HTTP_REFERER'] == NULL) {
			$link = base_url('home');
		} else {
			$arrLink = explode('/', $_SERVER['HTTP_REFERER']);
			if (in_array('suratijin', $arrLink)) {
				$link = base_url('home');
			} else {
				$link = $_SERVER['HTTP_REFERER'];
			}
		}


		// CONFIG PAGE 
		$this->data['judul_halaman'] = 'Surat Ijin';
		$this->data['config_hidden']['notifikasi'] = true;
		$this->data['config_hidden']['footer'] = true;
		$this->data['button_back'] = $link;

		// GET API 
		$result = curl_get('surat/', ['id_sekolah' => $this->id_sekolah, 'id_kelas' => $this->session->userdata('lms_staf_id_kelas')]);
		// LOAD MYDATA 
		$mydata['result'] = $result->data;
		// LOAD VIEW
		$this->data['content'] = $this->load->view('index', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function modal_detail()
	{
		$id_surat_ijin = $this->input->post('id_surat_ijin');
		// Meta data
		$id_kelas = $this->session->userdata('lms_staf_id_kelas');
		// LOAD DATA API
		$result = curl_get(
			'surat',
			[
				'id_sekolah' => $this->id_sekolah,
				'id_surat_ijin' => $id_surat_ijin,
				'id_kelas' => $id_kelas
			]
		);
		$this->load->view('modal_surat_ijin', $result->data);
	}

	public function edit()
	{
		$arrVar['status']     = 'Status';
		$arrVar['id_surat_ijin']     = 'ID Surat';
		$arrVar['berlaku_mulai']   = 'Tanggal Mulai';
		$arrVar['berlaku_sampai']   = 'Tanggal Sampai';
		foreach ($arrVar as $var => $value) {
			$$var = $this->input->post($var);

			if (!$$var) {
				$data['required'][] = ['req_' . $var, $value . ' tidak boleh kosong !'];
				$arrAccess[] = false;
			} else {
				$arrAccess[] = true;
			}
		}
		$komentar = $this->input->post('komentar');
		if (!in_array(FALSE, $arrAccess)) {
			// DEKLARASI DATA
			$arr['id_sekolah'] = $this->id_sekolah;
			$arr['id_surat_ijin'] = $id_surat_ijin;
			$arr['status'] = $status;
			$arr['tanggal_mulai'] = $berlaku_mulai;
			$arr['tanggal_sampai'] = $berlaku_sampai;
			$arr['komentar'] = $komentar;
			// LOAD DATA API
			$update = curl_post('surat/edit', $arr);
			$data['status'] = $update->status;
			$data['alert']['message'] = $update->message;
			if ($update->status == 200) {
				$data['alert']['title'] = 'PEMBERITAHUAN';
				$data['load'][0]['parent'] = '#parent_reload';
				$data['load'][0]['reload'] = base_url('suratijin') . ' #display_surat';
				$data['modal']['id'] = '#modalDetailSuratIjin';
				$data['modal']['action'] = 'hide';
			} else {
				$data['alert']['title'] = 'PERINGATAN';
			}
			echo json_encode($data);
			exit;
		} else {
			$data['status'] = false;
			echo json_encode($data);
			exit;
		}
	}
}
