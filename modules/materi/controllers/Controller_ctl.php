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
		$mydata['title'] = 'Materi';

		// LOAD CONFIG PAGE
		$this->data['button_back'] = base_url('home');
		$this->data['judul_halaman'] = 'Materi Pelajaran';
		$this->data['config_hidden']['notifikasi'] = true;
		$this->data['config_hidden']['footer'] = true;

		// LOAD API 
		$result = curl_get('materi/pelajaran/', ['id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf]);
		$tingkat = curl_get('attribut/tingkat/', ['id_sekolah' => $this->id_sekolah]);
		$mydata['result'] = $result->data;
		$mydata['tingkat'] = $tingkat->data;
		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/materi/materi.js"></script>';
		// LOAD VIEW
		$this->data['content'] = $this->load->view('index', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function detail_bab($id_pelajaran = NULL)
	{
		if ($id_pelajaran == NULL) {
			redirect('materi');
		}
		// LOAD TITLE
		$mydata['title'] = 'Detail Bab';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/materi/detail_bab.css') . '">';

		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/materi/detail_bab.js"></script>';

		// LOAD CONFIG PAGE
		$this->data['button_back'] = base_url('materi');
		$this->data['judul_halaman'] = 'Detail Bab';
		$this->data['config_hidden']['notifikasi'] = true;
		$this->data['config_hidden']['footer'] = true;

		// LOAD API 
		$arr['id_sekolah'] = $this->id_sekolah;
		$arr['id_pelajaran'] = $id_pelajaran;
		$result = curl_get('materi/bab_materi/', $arr);

		// LOAD MYDATA 
		$mydata['id_pelajaran'] = $id_pelajaran;
		$mydata['result'] = $result->data;
		// LOAD VIEW
		$this->data['content'] = $this->load->view('detail_bab', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function edit_materi()
	{
		// LOAD TITLE
		$mydata['title'] = 'Edit Nateri';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/materi/materi.css') . '">';

		// LOAD VIEW
		$this->data['content'] = $this->load->view('edit_materi', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function tambah_materi()
	{
		// LOAD TITLE
		$mydata['title'] = 'Tambah Nateri';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/materi/materi.css') . '">';

		// LOAD VIEW
		$this->data['content'] = $this->load->view('tambah_materi', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function detail_materi($id_materi = NULL)
	{
		if ($id_materi == NULL) {
			redirect('materi');
		}
		// LOAD TITLE
		$mydata['title'] = 'Detail KBM';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/materi/detail_materi.css') . '">';

		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/materi/detail_materi.js"></script>';

		// LOAD CONFIG PAGE
		if ($_SERVER['HTTP_REFERER'] == NULL || $_SERVER['HTTP_REFERER'] == base_url('materi/detail_materi/' . $id_materi)) {

			$this->data['button_back'] = base_url('materi/detail_bab');
		} else {
			$this->data['button_back'] = $_SERVER['HTTP_REFERER'];
		}
		// LOAD API 
		$result = curl_get('materi/detail_materi', ['id_sekolah' => $this->id_sekolah, 'id_materi' => $id_materi]);
		$this->data['judul_halaman'] = 'Detail Materi';
		$this->data['config_hidden']['notifikasi'] = true;
		$this->data['config_hidden']['footer'] = true;

		$this->data['right_button']['materi'] = true;

		// LOAD MYDATA
		$mydata['id_materi'] = $id_materi;
		$mydata['result'] = $result->data;
		$mydata['bab'] = $bab = curl_get('materi/get_bab/', ['id_sekolah' => $this->id_sekolah, 'id_pelajaran' => $result->data->detail->id_pelajaran])->data;
		// LOAD VIEW
		$this->data['content'] = $this->load->view('detail_materi', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}
}
