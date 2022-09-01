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
		$mydata['title'] = 'Jadwal';
		// LOAD DATA
		if ($this->input->get('hari')) {
			$day = $this->input->get('hari');
		} else {
			$day = date('N');
		}
		$mydata['result'] = curl_get('jadwal/lengkap', ['id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf])->data;

		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/kbm/jadwal.js"></script>';
		// LOAD VIEW
		$this->data['content'] = $this->load->view('jadwal', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function detail_kbm($id_pelajaran = NULL, $id_kelas = NULL)
	{
		if ($id_pelajaran == NULL || $id_kelas == NULL) {
			redirect('kbm/kbm');
		}
		if ($this->input->get('tanggal')) {
			$tanggal = $this->input->get('tanggal');
		} else {
			$tanggal = date('Y-m-d');
		}
		// LOAD TITLE
		$mydata['title'] = 'Detail KBM';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/kbm/kbm.css') . '">';
		// CONFIG PAGE
		$link = base_url('kbm/kbm') . '?tanggal=' . $tanggal;
		if ($this->input->get('redirect') == true) {
			$link = base_url('home');
		}
		$this->data['config_hidden']['notifikasi'] = true;
		$this->data['config_hidden']['footer'] = true;
		$this->data['button_back'] = $link;
		$this->data['judul_halaman'] = 'Detail Kbm';
		// LOAD API
		$result = curl_get('kbm/today', ['id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf, 'id_kelas' => $id_kelas, 'id_pelajaran' => $id_pelajaran, 'tanggal' => $tanggal]);
		$presensi_setting = curl_get('presensi/setting', array('id_sekolah' => $this->id_sekolah));
		$materi = curl_get('materi/bab_materi/', ['id_sekolah' => $this->id_sekolah, 'id_pelajaran' => $id_pelajaran, 'notnull' => true]);

		$nu = 0;
		if ($result->data->result->materi) {
			foreach ($result->data->result->materi as $ma) {
				$num = $nu++;
				$arr[$num] = $ma->id_materi;
			}
		} else {
			$arr = array();
		}
		// LOAD MYDATA
		$mydata['id_kelas'] = $id_kelas;
		$mydata['tanggal'] = $tanggal;
		$mydata['id_pelajaran'] = $id_pelajaran;
		$mydata['result'] = $result->data;
		$mydata['materi'] = $materi->data;
		$mydata['presensi_setting'] = $presensi_setting;
		$mydata['id_materi'] = $arr;

		if (isset($_COOKIE['LAT']) && isset($_COOKIE['LONG'])) {
			$mydata['map'] = "https://maps.google.com/maps?q=" . $_COOKIE['LAT'] . "," . $_COOKIE['LONG'] . "&hl=en;z=14&output=embed";
			$mydata['lat'] = $_COOKIE['LAT'];
			$mydata['long'] = $_COOKIE['LONG'];
			$mydata['jarak'] = get_jarak($_COOKIE['LAT'], $_COOKIE['LONG'], $presensi_setting->setting_presensi_staf->lat_sekolah, $presensi_setting->setting_presensi_staf->lon_sekolah)['meters'];
		} else {
			$mydata['map'] = NULL;
			$mydata['lat'] = NULL;
			$mydata['long'] = NULL;
			$mydata['jarak'] = NULL;
			$this->data['js_add'][] = '<script>
				var lat_sekul = ' . $presensi_setting->setting_presensi_staf->lat_sekolah . ';
				var long_sekul = ' . $presensi_setting->setting_presensi_staf->lon_sekolah . ';
			</script>';
			$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/get_location.js"></script>';
		}
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/kbm/kbm.js"></script>';

		// LOAD VIEW
		$this->data['content'] = $this->load->view('detail_kbm', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function presensi_siswa($id_pelajaran = NULL, $id_kelas = NULL)
	{
		if ($id_pelajaran == NULL || $id_kelas == NULL) {
			redirect('kbm/kbm');
		}
		$tanggal = $this->input->get('tanggal');
		if (!$tanggal) {
			$tanggal = date('Y-m-d');
		}
		// LOAD TITLE
		$mydata['title'] = 'Presensi Siswa';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/kbm/presensi_siswa.css') . '">';
		// LOAD CONFIG PAGE
		if ($_SERVER['HTTP_REFERER'] == NULL) {
			$link = base_url('kbm/detail_kbm/' . $id_pelajaran . '/' . $id_kelas) . '?tanggal=' . $tanggal;
		} else {
			$arrLink = explode('/', $_SERVER['HTTP_REFERER']);
			if (in_array('presensi_siswa', $arrLink)) {
				$link = base_url('kbm/detail_kbm/' . $id_pelajaran . '/' . $id_kelas) . '?tanggal=' . $tanggal;
			} else {
				$link = $_SERVER['HTTP_REFERER'];
			}
		}
		// LOAD API 
		$result = curl_get('kbm/presensi/', ['id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf, 'id_pelajaran' => $id_pelajaran, 'id_kelas' => $id_kelas, 'tanggal' => $tanggal]);

		// LOAD MYDATA 
		$mydata['detail'] = $detail = $result->data->detail;
		$mydata['peserta'] = $peserta =  $result->data->peserta;
		$mydata['id_pelajaran'] = $id_pelajaran;
		$mydata['id_kelas'] = $id_kelas;
		if (isset($_COOKIE['LAT']) && isset($_COOKIE['LONG'])) {
			$mydata['lat'] = $_COOKIE['LAT'];
			$mydata['long'] = $_COOKIE['LONG'];
		} else {
			$mydata['lat'] = '-7.7084159';
			$mydata['long'] = '112.4174668';
			// $this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/get_location.js"></script>';
		}

		// CONFIG PAGE
		$this->data['config_hidden']['notifikasi'] = true;
		$this->data['config_hidden']['footer'] = true;
		$this->data['button_back'] = $link;
		if (strlen($detail->pelajaran) > 20) {
			$pelajaran = inisial($detail->pelajaran);
		} else {
			$pelajaran = $detail->pelajaran;
		}
		$this->data['judul_halaman'] = $detail->kelas . '<br><span style="font-size : 14px; font-weight: normal; color : #EC3528;">' . $pelajaran . '</span>';

		// LOAD VIEW
		$this->data['content'] = $this->load->view('presensi_siswa', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function kbm()
	{
		// LOAD TITLE
		$mydata['title'] = 'KBM';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/kbm/kbm.css') . '">';

		// LOAD CONFIG PAGE
		if ($_SERVER['HTTP_REFERER'] == NULL) {
			$link = base_url('home');
		} else {
			$arrLink = explode('/', $_SERVER['HTTP_REFERER']);
			if (in_array('kbm', $arrLink)) {
				$link = base_url('home');
			} else {
				$link = $_SERVER['HTTP_REFERER'];
			}
		}
		// LOAD GET FORM 
		$tanggal = $this->input->get('tanggal');
		if (!$tanggal) {
			$tanggal = date('Y-m-d');
		}
		$nice_tanggal = day_from_number(date('N', strtotime($tanggal))) . ', ' . date('d', strtotime($tanggal)) . ' ' . month_from_number(date('m', strtotime($tanggal))) . ' ' . date('Y', strtotime($tanggal));
		$this->data['config_hidden']['notifikasi'] = TRUE;
		$this->data['config_hidden']['footer'] = TRUE;
		$this->data['judul_halaman'] = 'Daftar KBM<br><span style="font-size : 14px; font-weight: normal; color : #EC3528;">' . $nice_tanggal . '</span>';
		$this->data['button_back'] = $link;
		$this->data['right_button']['kbm'] = true;
		// LOAD API 
		$result = curl_get('kbm', ['id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf, 'tanggal' => $tanggal]);

		// LOAD MYDATA 
		$mydata['result'] = $result->data;
		$mydata['tanggal'] = $tanggal;
		// LOAD VIEW
		$this->data['content'] = $this->load->view('kbm', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}


	public function tambah_materi()
	{
		$vars = $_POST;
		// var_dump($vars);
		foreach ($vars as $key => $value) {
			$$key = $value;
			if (!$$key) {
				$data['required'][] = ['req_' . $key, $value . ' tidak boleh kosong !'];
				$arrAccess[] = false;
			} else {
				$arrAccess[] = true;
				if ($key == 'materi') {
					$arr[$key] = json_encode($$key);
				} else {
					$arr[$key] = $$key;
				}
			}
		}

		if (!in_array(FALSE, $arrAccess)) {
			// DEKLARASI DATA
			$arr['id_sekolah'] = $this->id_sekolah;
			$arr['id_staf'] = $this->id_staf;
			// LOAD DATA API
			$insert = curl_post('kbm/materi/', $arr);
			$data['status'] = $insert->status;
			$data['alert']['message'] = $insert->message;
			if ($insert->status == 200) {
				$data['alert']['title'] = 'PEMBERITAHUAN';
				$data['modal']['id'] = '#modalTambahMateri';
				$data['modal']['action'] = 'hide';
				$data['load'][0]['parent'] = '#parent_tambah_materi_kbm';
				$data['load'][0]['reload'] = base_url('kbm/detail_kbm/' . $id_pelajaran . '/' . $id_kelas) . ' #tambah_materi_kbm';
				$data['load'][1]['parent'] = '#parent_materi';
				$data['load'][1]['reload'] = base_url('kbm/detail_kbm/' . $id_pelajaran . '/' . $id_kelas) . ' #display_materi';
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

	public function tambah()
	{
		$vars = $_POST;
		// var_dump($vars);
		foreach ($vars as $key => $value) {
			$$key = $value;
			if (!$$key) {
				if (!in_array($key, ['domain', 'link', 'chatting'])) {
					$data['required'][] = ['req_' . $key, $value . ' tidak boleh kosong !'];
					$arrAccess[] = false;
				}
			} else {
				$arrAccess[] = true;
				$arr[$key] = $$key;
			}
		}

		if (!in_array(FALSE, $arrAccess)) {
			// DEKLARASI DATA
			$arr['id_sekolah'] = $this->id_sekolah;
			$arr['id_staf'] = $this->id_staf;
			// LOAD DATA API
			$insert = curl_post('kbm/tambah/', $arr);
			$data['status'] = $insert->status;
			$data['alert']['message'] = $insert->message;
			if ($insert->status == 200) {
				$data['alert']['title'] = 'PEMBERITAHUAN';
				$data['modal']['id'] = '#modalEdit';
				$data['modal']['action'] = 'hide';
				$data['load'][0]['parent'] = '#parent_modal_edit';
				$data['load'][0]['reload'] = base_url('kbm/detail_kbm/' . $id_pelajaran . '/' . $id_kelas) . '?tanggal=' . $tanggal . ' #reload_modal_edit';
				$data['load'][1]['parent'] = '#parent_utama';
				$data['load'][1]['reload'] = base_url('kbm/detail_kbm/' . $id_pelajaran . '/' . $id_kelas) . '?tanggal=' . $tanggal . ' #reload_utama';
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

	public function func_presensi()
	{
		$id_pelajaran = $this->input->post('id_pelajaran');
		$id_kelas = $this->input->post('id_kelas');
		$lat = $this->input->post('lat');
		$long = $this->input->post('long');
		$id_siswa = $this->input->post('id_siswa');
		$no = 0;
		foreach ($id_siswa as $id) {
			$status = $this->input->post('status-presensi-' . $id);
			$presensi = $this->input->post('presensi-' . $id);
			if ($presensi != 1) {
				$num = $no++;
				$arr[$num]['id_siswa'] = $id;
				$arr[$num]['presensi'] = $presensi;
			} else {
				if ($status != 1) {
					$num = $no++;
					$arr[$num]['id_siswa'] = $id;
					$arr[$num]['presensi'] = $presensi;
				}
			}
		}
		$p = json_encode($arr);
		$result = curl_post('kbm/presensi/', ['id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf, 'id_pelajaran' => $id_pelajaran, 'id_kelas' => $id_kelas, 'tanggal' => date('Y-m-d'), 'scan' => date('H:i:s'), 'presensi_siswa' => $p, 'lat' => $lat, 'long' => $long]);
		if ($result->status == 200) {
			$dt['status'] = true;
			$dt['load'][0]['parent'] = '#parent_presensi';
			$dt['load'][0]['reload'] = base_url('kbm/presensi_siswa/' . $id_pelajaran . '/' . $id_kelas) . ' #reload_presensi';
			$dt['alert']['title'] = 'PEMBERITAHUAN';
		} else {
			$dt['status'] = false;
			$dt['alert']['title'] = 'PERINGATAN';
		}
		$dt['alert']['message'] = $result->message;

		echo json_encode($dt);
	}
}
