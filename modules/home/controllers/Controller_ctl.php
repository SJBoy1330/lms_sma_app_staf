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
		// echo 'LAT : ' . $_COOKIE['LAT'] . ' LONG : ' . $_COOKIE['LONG'];
		// LOAD TITLE
		$mydata['title'] = 'Home';
		// LOAD API
		$mydata['result_aktif'] = curl_get('jadwal/today', array('id_sekolah' => $this->id_sekolah, 'hari' => date('N'), 'aktif' => 'Y', 'id_staf' =>  $this->id_staf, 'kbm' => 'Y'))->data;
		$mydata['result_old'] = curl_get('jadwal/today', array('id_sekolah' => $this->id_sekolah, 'hari' => date('N'), 'aktif' => 'N', 'id_staf' =>  $this->id_staf, 'kbm' => 'Y'))->data;
		$mydata['pengumuman'] = curl_get('pengumuman/all', array('id_sekolah' => $this->id_sekolah, 'limit' => 3))->data;
		$mydata['berita'] = curl_get('berita', array('id_sekolah' => $this->id_sekolah, 'limit' => 5))->data;
		$mydata['presensi'] = curl_get('presensi/today', array('id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf))->data;
		$mydata['presensi_setting'] = $presensi_setting = curl_get('presensi/setting', array('id_sekolah' => $this->id_sekolah));

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
		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/kbm/jadwal.js"></script>';
		// LOAD VIEW
		$this->data['content'] = $this->load->view('index', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function list_pengumuman()
	{
		// LOAD TITLE
		$mydata['title'] = 'Pengumuman';
		$result = curl_get(
			'pengumuman/all',
			[
				"id_sekolah" => $this->id_sekolah
			]
		);
		$mydata['data_pengumuman'] = $result->data;

		// LOAD CONFIG PAGE
		$this->data['judul_halaman'] = 'Pengumuman';
		$this->data['button_back'] = base_url('home');
		$this->data['config_hidden']['notifikasi'] = TRUE;
		$this->data['config_hidden']['footer'] = TRUE;

		// LOAD VIEW
		$this->data['content'] = $this->load->view('list_pengumuman', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function detail_pengumuman($id = NULL)
	{

		if ($id == NULL) {
			redirect('home');
		}
		// LOAD TITLE
		$result = curl_get(
			'pengumuman/all/',
			[
				"id_sekolah" => $this->id_sekolah,
				"id_pengumuman" => $id
			]
		);
		$mydata['result'] = $result->data;

		// LOAD CONFIG PAGE
		$this->data['judul_halaman'] = 'Detail Pengumuman';
		if ($this->input->get('redirect') == true) {
			$this->data['button_back'] = base_url('home');
		} else {
			$this->data['button_back'] = base_url('home/list_pengumuman');
		}

		// LOAD CONFIG PAGE
		$this->data['config_hidden']['notifikasi'] = TRUE;
		$this->data['config_hidden']['footer'] = TRUE;

		// LOAD VIEW
		$this->data['content'] = $this->load->view('detail_pengumuman', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function list_berita()
	{
		// LOAD TITLE
		$mydata['title'] = 'List Berita';

		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/berita/listberita.js"></script>';

		// meta data
		$idkategori = $this->input->get('kategori', TRUE);

		$filter_berita['id_sekolah'] = $this->id_sekolah;

		$result = curl_get('berita', $filter_berita);
		$mydata['result'] = $result->data;

		$result = curl_get('berita/kategori', [
			"id_sekolah" => $this->id_sekolah,
		]);
		$mydata['kategori'] = $result->data;

		// LOAD CONFIG PAGE
		$this->data['button_back'] = base_url('home');
		$this->data['judul_halaman'] = 'Berita';
		$this->data['config_hidden']['notifikasi'] = TRUE;
		$this->data['config_hidden']['footer'] = TRUE;

		// LOAD VIEW
		$this->data['content'] = $this->load->view('list_berita', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function detail_berita($id = NULL)
	{
		if ($id == NULL) {
			redirect('home');
		}
		// LOAD TITLE
		$mydata['title'] = 'Detail Berita';

		$result = curl_get('berita', [
			"id_sekolah" => $this->id_sekolah,
			'id_konten' => $id
		]);
		$mydata['result'] = $result->data;
		// LOAD CONFIG PAGE
		$this->data['judul_halaman'] = 'Detail Berita';
		if ($this->input->get('redirect')) {
			$this->data['button_back'] = base_url('home');
		} else {
			$this->data['button_back'] = base_url('home/list_berita');
		}

		// LOAD CONFIG PAGE
		$this->data['config_hidden']['notifikasi'] = TRUE;
		$this->data['config_hidden']['footer'] = TRUE;

		// LOAD VIEW
		$this->data['content'] = $this->load->view('detail_berita', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}


	public function set_cookie()
	{
		setcookie('LAT', '-7.4640797', time() + (86400 * 30), "/");
		setcookie('LONG', '112.7214074', time() + (86400 * 30), "/");
	}
}
