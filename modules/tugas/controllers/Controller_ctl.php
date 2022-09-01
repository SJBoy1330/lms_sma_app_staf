<?php defined('BASEPATH') or exit('No direct script access allowed');

class Controller_ctl extends MY_Frontend
{
	public function __construct()
	{
		// Load the constructer from MY_Controller
		parent::__construct();
		$this->id_sekolah = $this->session->userdata('lms_staf_id_sekolah');
		$this->id_staf = $this->session->userdata('lms_staf_id_staf');
		$this->id_kelas = $this->session->userdata('lms_staf_wali_kelas');
		is_logged_in();
	}


	public function index()
	{
		// LOAD TITLE
		$mydata['title'] = 'Tugas';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/tugas/tugas.css') . '">';
		// LOAD JS 
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/tugas/tugas.js"></script>';
		// CONFIG HALAMAN
		if ($_SERVER['HTTP_REFERER'] == NULL) {
			$link = base_url('home');
		} else {
			$arrLink = explode('/', $_SERVER['HTTP_REFERER']);
			if (in_array('tugas', $arrLink)) {
				$link = base_url('home');
			} else {
				$link = $_SERVER['HTTP_REFERER'];
			}
		}
		$this->data['button_back'] = $link;
		$this->data['config_hidden']['notifikasi'] = true;
		$this->data['config_hidden']['footer'] = true;
		$this->data['judul_halaman'] = 'Tugas';

		// LOAD API 
		$params['id_sekolah'] = $this->id_sekolah;
		$params['id_staf'] = $this->id_staf;
		if ($this->id_kelas) {
			$params['id_kelas'] = $this->id_kelas;
		}
		$result = curl_get('tugas/get_kelas/', $params);
		$pelajaran = curl_get('tugas/pelajaran', ['id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf]);


		// DEKLARASI MYDATA 
		$mydata['result'] = $result->data;
		$mydata['pelajaran'] = $pelajaran->data;
		// LOAD VIEW
		$this->data['content'] = $this->load->view('index', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function pelajaran($id_kelas = NULL)
	{
		if ($id_kelas == NULL) {
			redirect('tugas');
		}
		// LOAD TITLE
		$mydata['title'] = 'Pelajaran';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/tugas/tugas.css') . '">';

		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/tugas/tugas.js"></script>';

		// CONFIG HALAMAN
		if ($_SERVER['HTTP_REFERER'] == NULL) {
			$link = base_url('tugas');
		} else {
			$arrLink = explode('/', $_SERVER['HTTP_REFERER']);
			if (in_array('tugas', $arrLink)) {
				$link = base_url('tugas');
			} else {
				$link = $_SERVER['HTTP_REFERER'];
			}
		}
		$this->data['button_back'] = $link;
		$this->data['config_hidden']['notifikasi'] = true;
		$this->data['config_hidden']['footer'] = true;
		$this->data['judul_halaman'] = 'Pelajaran';

		$wali_kelas = $this->input->get('wali_kelas');
		if (!$wali_kelas) {
			$wali_kelas = false;
			$mydata['wali_kelas'] = '';
		} else {
			$mydata['wali_kelas'] = '?wali_kelas=true';
		}
		// LOAD API 
		$par['id_staf'] = $this->id_staf;
		$par['id_sekolah'] = $this->id_sekolah;
		$par['id_kelas'] = $id_kelas;
		$par['wali_kelas'] = $wali_kelas;
		$result = curl_get('tugas/get_kelas_pelajaran/', $par);

		// DEKLARASI MYDATA 
		$mydata['id_kelas'] = $id_kelas;
		$mydata['result'] = $result->data;
		// LOAD VIEW
		$this->data['content'] = $this->load->view('pelajaran', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function tugas_sekolah($id_kelas = NULL, $id_pelajaran = NULL)
	{
		if ($id_kelas == NULL || $id_pelajaran == NULL) {
			redirect('tugas');
		}
		// LOAD TITLE
		$mydata['title'] = 'Tugas Sekolah';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/tugas/tugas.css') . '">';

		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/tugas/tugas_sekolah.js"></script>';
		// CONFIG HALAMAN
		$wali_kelas = $this->input->get('wali_kelas');
		if (!$wali_kelas) {
			$wali_kelas = false;
			$get = '';
		} else {
			$wali_kelas = true;
			$get = '?wali_kelas=true';
		}
		$mydata['status_wali'] = $wali_kelas;
		$mydata['wali_kelas'] = $get;
		if ($_SERVER['HTTP_REFERER'] == NULL) {
			$link = base_url('tugas/pelajaran/' . $id_kelas . $get);
		} else {
			$arrLink = explode('/', $_SERVER['HTTP_REFERER']);
			if (in_array('tugas', $arrLink)) {
				$link = base_url('tugas/pelajaran/' . $id_kelas . $get);
			} else {
				$link = $_SERVER['HTTP_REFERER'];
			}
		}
		$this->data['button_back'] = $link;
		$this->data['config_hidden']['notifikasi'] = true;
		$this->data['config_hidden']['footer'] = true;
		$this->data['judul_halaman'] = 'Tugas Sekolah';
		// LOAD API 
		$result = curl_get('tugas/', ['id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf, 'id_pelajaran' => $id_pelajaran, 'id_kelas' => $id_kelas]);

		// DEKLARASI MYDATA 
		$mydata['id_kelas'] = $id_kelas;
		$mydata['id_pelajaran'] = $id_pelajaran;
		$mydata['result'] = $result->data;
		// LOAD VIEW
		$this->data['content'] = $this->load->view('tugas_sekolah', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function jawaban_siswa($id_kelas = NULL, $id_pelajaran = NULL, $id_tugas = NULL)
	{
		if ($id_kelas == NULL || $id_pelajaran == NULL || $id_tugas == NULL) {
			redirect('tugas');
		}
		// LOAD TITLE
		$mydata['title'] = 'Tugas Sekolah';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/tugas/tugas.css') . '">';
		$this->data['css_add'][] = '<style>
			.header.active:after {
				opacity: 0;
			}
        </style>';
		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/tugas/detail_tugas_utama.js"></script>';
		// CONFIG HALAMAN
		$wali_kelas = $this->input->get('wali_kelas');
		if (!$wali_kelas) {
			$mydata['wali_kelas'] = false;
			$mydata['get'] = $get = '';
		} else {
			$mydata['wali_kelas'] = true;
			$mydata['get'] = $get = '?wali_kelas=true';
		}
		if ($_SERVER['HTTP_REFERER'] == NULL) {
			$link = base_url('tugas/tugas_sekolah/' . $id_kelas . '/' . $id_pelajaran . $get);
		} else {
			$arrLink = explode('/', $_SERVER['HTTP_REFERER']);
			if (in_array('tugas', $arrLink)) {
				$link = base_url('tugas/tugas_sekolah/' . $id_kelas . '/' . $id_pelajaran . $get);
			} else {
				$link = $_SERVER['HTTP_REFERER'];
			}
		}
		$this->data['button_back'] = $link;
		$this->data['config_hidden']['notifikasi'] = true;
		$this->data['config_hidden']['footer'] = true;
		$this->data['khusus']['tugas'] = true;
		$this->data['text']['white'] = true;
		$this->data['judul_halaman'] = 'Detail Tugas';


		// LOAD API 
		$result = curl_get('tugas/peserta_kelas/', ['id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf, 'id_kelas' => $id_kelas, 'id_tugas' => $id_tugas]);
		$detail = curl_get('tugas/single/', ['id_sekolah' => $this->id_sekolah, 'id_tugas' => $id_tugas]);
		// LOAD MYDATA 
		$mydata['result'] = $result->data;
		$mydata['detail'] = $detail->data;
		$mydata['id_tugas'] = $id_tugas;
		$mydata['id_pelajaran'] = $id_pelajaran;
		$mydata['id_kelas'] = $id_kelas;
		// LOAD VIEW
		$this->data['content'] = $this->load->view('jawaban_siswa', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function detail_tugas($id_siswa = NULL, $id_tugas = NULL)
	{
		if (!$id_siswa || !$id_tugas) {
			redirect('tugas');
		}
		// LOAD TITLE
		$mydata['title'] = 'Detail Tugas';

		// LOAD CSS
		$this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/tugas/detail_tugas.css') . '">';

		// LOAD JS
		$this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/tugas/detail_tugas.js"></script>';

		// LOAD CONFIG 
		$wali_kelas = $this->input->get('wali_kelas');
		if (!$wali_kelas) {
			$mydata['wali_kelas'] = false;
			$mydata['get'] = $get = '';
		} else {
			$mydata['wali_kelas'] = true;
			$mydata['get'] = $get = '?wali_kelas=true';
		}
		// CONFIG HALAMAN
		if ($_SERVER['HTTP_REFERER'] == NULL) {
			$link = base_url('tugas');
		} else {
			$arrLink = explode('/', $_SERVER['HTTP_REFERER']);
			if (in_array('detail_tugas', $arrLink)) {
				$link = base_url('tugas');
			} else {
				$link = $_SERVER['HTTP_REFERER'];
			}
		}
		$this->data['config_hidden']['notifikasi'] = true;
		$this->data['config_hidden']['footer'] = true;
		$this->data['judul_halaman'] = 'Detail Tugas';
		$this->data['button_back'] = $link;

		// LOAD API 
		$result = curl_get('tugas/siswa/', ['id_sekolah' => $this->id_sekolah, 'id_siswa' => $id_siswa, 'id_tugas' => $id_tugas]);
		// LOAD MYDATA 
		$mydata['id_siswa'] = $id_siswa;
		$mydata['id_tugas'] = $id_tugas;
		$mydata['result'] = $result->data;
		// LOAD VIEW
		$this->data['content'] = $this->load->view('detail_tugas', $mydata, TRUE);
		$this->display($this->input->get('routing'));
	}

	public function upload()
	{
		$id_tugas = $this->input->post('id_tugas');
		$arr['id_sekolah'] = $this->id_sekolah;
		$arr['id_staf'] = $this->id_staf;
		$arr['id_tugas'] = $id_tugas;
		if (!$_FILES['file_jawaban']['tmp_name'][0]) {
			$data['status'] = FALSE;
			$data['title'] = 'PERINGATAN';
			$data['message'] = 'File jawaban tidak boleh kosong!';
			echo json_encode($data);
			exit;
		}
		// var_dump($_FILES['file_jawaban']);
		$jmlh = count($_FILES['file_jawaban']['tmp_name']);
		$tugas = $_FILES['file_jawaban'];
		for ($i = 0; $i < $jmlh; $i++) {
			if ($tugas['size'][$i] > (10 * 1024 * 1024)) {
				$data['status'] = false;
				$data['title'] = 'PERINGATAN';
				$data['message'] = 'File ' . $tugas['name'][$i] . ' terlalu besar!';
				echo json_encode($data);
				exit;
			}
			$test = explode('.', $tugas["name"][$i]);
			$ext = end($test);
			if (!in_array($ext, array('jpg', 'png', 'rar', 'zip', 'docx', 'doc', 'pdf', 'xls', 'xlsx', 'jpeg', 'mp3', 'mp4'))) {
				$data['status'] = false;
				$data['title'] = 'PERINGATAN';
				$data['message'] = 'File ' . $tugas['name'][$i] . ' Tidak di izinkan!';
				echo json_encode($data);
				exit;
			}
			$name = uniqid() . '.' . $ext;
			$location = APPPATH . '../../data/sekolah_' . $this->id_sekolah . '/tugas/' . $name;
			$move = move_uploaded_file($tugas["tmp_name"][$i], $location);
			if ($move) {
				$fil[$i]['name'] = $tugas['name'][$i];
				$fil[$i]['unik'] = $name;
			} else {
				$data['status'] = false;
				$data['title'] = 'PERINGATAN';
				$data['message'] = 'File ' . $tugas['name'][$i] . ' gagal di upload!';
				echo json_encode($data);
				exit;
			}
		}
		$arr['tugas'] = json_encode($fil);
		$result = curl_post('tugas/upload_sementara/', $arr);
		if ($result->status == 200) {
			$rr['status'] = true;
			$rr['title'] = 'PEMBERITAHUAN';
		} else {
			$rr['status'] = false;
			$rr['title'] = 'PERINGATAN';
		}
		$rr['message'] = $result->message;

		echo json_encode($rr);
	}

	public function hapus_file()
	{
		$id_file = $this->input->post('id_file');
		$result = curl_post('tugas/hapus_file/', ['id_sekolah' => $this->id_sekolah, 'id_file' => $id_file]);
		if ($result->status == 200) {
			$data['status'] = true;
		} else {
			$data['status'] = false;
			$data['message'] = $result->message;
		}
		echo json_encode($data);
	}

	public function nilai()
	{
		$arrVar['nilai']     = 'Nilai';
		$arrVar['id_tugas'] = 'Tugas siswa';
		$arrVar['id_siswa'] = 'ID Siswa';
		$arrVar['id_kelas'] = 'ID Kelas';
		$arrVar['id_pelajaran'] = 'ID Pelajaran';
		foreach ($arrVar as $var => $value) {
			$$var = $this->input->post($var);
			if (!$$var) {
				$data['required'][] = ['req_' . $var, $value . ' tidak boleh kosong !'];
				$arrAccess[] = false;
			} else {
				$arrAccess[] = true;
			}
		}
		$id_tugas_siswa = $this->input->post('id_tugas_siswa');

		$arr['id_sekolah'] = $this->id_sekolah;
		$arr['id_tugas'] = $id_tugas;
		$arr['id_siswa'] = $id_siswa;
		if ($id_tugas_siswa) {
			$arr['id_tugas_siswa'] = $id_tugas_siswa;
		}
		$arr['nilai'] = $nilai;
		if (!in_array(FALSE, $arrAccess)) {
			$action = curl_post('tugas/nilai/', $arr);
			if ($action->status == 200) {
				$data['status'] = true;
				$data['modal']['id'] = '#modalInputNilai';
				$data['modal']['action'] = 'hide';
				$data['load'][0]['parent'] = '#display_siswa';
				$data['load'][0]['reload'] = base_url('tugas/jawaban_siswa/' . $id_kelas . '/' . $id_pelajaran . '/' . $id_tugas . ' #reload_siswa');
				$data['alert']['title'] = 'PEMBERITAHUAN';
			} else {
				$data['status'] = false;
				$data['alert']['title'] = 'PERINGATAN';
			}
			$data['alert']['message'] = $action->message;
			echo json_encode($data);
			exit;
		} else {
			echo json_encode($data);
			exit;
		}
	}

	public function terima()
	{
		$arrVar['nilai']     = 'Nilai';
		$arrVar['id_tugas'] = 'Tugas siswa';
		$arrVar['id_siswa'] = 'ID Siswa';
		foreach ($arrVar as $var => $value) {
			$$var = $this->input->post($var);
			if (!$$var) {
				$data['required'][] = ['req_' . $var, $value . ' tidak boleh kosong !'];
				$arrAccess[] = false;
			} else {
				$arrAccess[] = true;
			}
		}
		$id_tugas_siswa = $this->input->post('id_tugas_siswa');

		$arr['id_sekolah'] = $this->id_sekolah;
		$arr['id_tugas'] = $id_tugas;
		$arr['id_siswa'] = $id_siswa;
		if ($id_tugas_siswa) {
			$arr['id_tugas_siswa'] = $id_tugas_siswa;
		}
		$arr['nilai'] = $nilai;
		if (!in_array(FALSE, $arrAccess)) {
			$action = curl_post('tugas/nilai/', $arr);
			if ($action->status == 200) {
				$data['status'] = true;
				$data['modal']['id'] = '#modalInputNilai';
				$data['modal']['action'] = 'hide';
				$data['load'][0]['parent'] = '#display_tugas';
				$data['load'][0]['reload'] = base_url('tugas/detail_tugas/' . $id_siswa . '/' . $id_tugas . ' #reload_tugas');
				$data['alert']['title'] = 'PEMBERITAHUAN';
			} else {
				$data['status'] = false;
				$data['alert']['title'] = 'PERINGATAN';
			}
			$data['alert']['message'] = $action->message;
			echo json_encode($data);
			exit;
		} else {
			echo json_encode($data);
			exit;
		}
	}

	public function tolak()
	{
		$arrVar['keterangan']     = 'Keterangan';
		$arrVar['id_tugas'] = 'Tugas siswa';
		$arrVar['id_siswa'] = 'ID Siswa';
		foreach ($arrVar as $var => $value) {
			$$var = $this->input->post($var);
			if (!$$var) {
				$data['required'][] = ['req_' . $var, $value . ' tidak boleh kosong !'];
				$arrAccess[] = false;
			} else {
				$arrAccess[] = true;
			}
		}

		$arr['id_sekolah'] = $this->id_sekolah;
		$arr['id_tugas'] = $id_tugas;
		$arr['id_siswa'] = $id_siswa;
		$arr['keterangan'] = $keterangan;
		if (!in_array(FALSE, $arrAccess)) {
			$action = curl_post('tugas/tolak/', $arr);
			if ($action->status == 200) {
				$data['status'] = true;
				$data['modal']['id'] = '#modalTolak';
				$data['modal']['action'] = 'hide';
				$data['load'][0]['parent'] = '#display_tugas';
				$data['load'][0]['reload'] = base_url('tugas/detail_tugas/' . $id_siswa . '/' . $id_tugas . ' #reload_tugas');
				$data['alert']['title'] = 'PEMBERITAHUAN';
			} else {
				$data['status'] = false;
				$data['alert']['title'] = 'PERINGATAN';
			}
			$data['alert']['message'] = $action->message;
			echo json_encode($data);
			exit;
		} else {
			echo json_encode($data);
			exit;
		}
	}

	public function hapus_tugas()
	{
		$id_tugas = $this->input->post('id_tugas');

		$result = curl_post('tugas/hapus_tugas/', ['id_sekolah' => $this->id_sekolah, 'id_tugas' => $id_tugas]);
		if ($result->status == 200) {
			$data['status'] = true;
		} else {
			$data['status'] = false;
			$data['title'] = 'PARINGATAN';
			$data['message'] = $result->message;
		}
		echo json_encode($data);
	}
	public function get_kelas()
	{
		$id_pelajaran = $this->input->post('id_pelajaran');

		$result = curl_get('tugas/kelas_pelajaran/', ['id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf, 'id_pelajaran' => $id_pelajaran]);
		$msg = '';
		if ($result->status == 200) {
			if ($result->data) {
				foreach ($result->data as $row) {
					$msg .= '<div class="col-12 zoom-filter target_search showing">';
					$msg .= '<div class="input-checkbox-tagar d-flex">';
					$msg .= '<div class="wrapper-tagar mb-1">';
					$msg .= '<input id="check-' . $row->id_kelas . '" onchange="pilih(this,' . $row->id_kelas . ')" name="id_kelas[]" value="' . $row->id_kelas . '" class="form-check-input" type="checkbox">';
					$msg .= '</div>';
					$msg .= '<label class="ps-2" id="label-' . $row->id_kelas . '" for="check-' . $row->id_kelas . '">' . $row->kelas . '</label>';
					$msg .= '</div>';
					$msg .= '</div>';
				}
			} else {
				$msg .= '';
			}
		} else {
			$msg .= '';
		}
		echo $msg;
	}


	public function tambah_tugas()
	{
		$arrVar['id_kelas']     = 'Kelas';
		$arrVar['id_pelajaran'] = 'Pelajaran';
		$arrVar['nama'] = 'ID Siswa';
		$arrVar['batas_waktu'] = 'Batas Waktu';
		foreach ($arrVar as $var => $value) {
			$$var = $this->input->post($var);
			if (!$$var) {
				$data['required'][] = ['req_' . $var, $value . ' tidak boleh kosong !'];
				$arrAccess[] = false;
			} else {
				$arrAccess[] = true;
				if (!in_array($var, ['id_kelas'])) {
					$arr[$var] = $$var;
				} else {
					$arr[$var] = json_encode($$var);
				}
			}
		}
		$sumber = $this->input->post('sumber');
		if (!in_array(FALSE, $arrAccess)) {
			$arr['keterangan'] = $this->input->post('keterangan');
			$arr['id_sekolah'] = $this->id_sekolah;
			$arr['id_staf'] = $this->id_staf;
			$arr['tanggal'] = date('Y-mpd H:i:s');
			if ($this->input->post('izin_terlambat') == NULL) {
				$arr['izin_terlambat'] = 'N';
			} else {
				$arr['izin_terlambat'] = 'Y';
			}

			if ($_FILES['tugas']['tmp_name'][0]) {
				$jmlh = count($_FILES['tugas']['tmp_name']);
				$tugas = $_FILES['tugas'];
				for ($i = 0; $i < $jmlh; $i++) {
					if ($tugas['size'][$i] > (10 * 1024 * 1024)) {
						$data['status'] = false;
						$data['alert']['title'] = 'PERINGATAN';
						$data['alert']['message'] = 'File ' . $tugas['name'][$i] . ' terlalu besar!';

						echo json_encode($data);
						exit;
					}
					$test = explode('.', $tugas["name"][$i]);
					$ext = end($test);
					if (!in_array($ext, array('jpg', 'png', 'rar', 'zip', 'docx', 'doc', 'pdf', 'xls', 'xlsx', 'jpeg', 'mp3', 'mp4'))) {
						$data['status'] = false;
						$data['alert']['title'] = 'PERINGATAN';
						$data['alert']['message'] = 'File ' . $tugas['name'][$i] . ' Tidak di izinkan!';
						echo json_encode($data);
						exit;
					}
					$name = uniqid() . '.' . $ext;
					$location = APPPATH . '../../data/sekolah_' . $this->id_sekolah . '/tugas/' . $name;
					$move = move_uploaded_file($tugas["tmp_name"][$i], $location);
					if ($move) {
						$fil[$i]['name'] = $tugas['name'][$i];
						$fil[$i]['unik'] = $name;
					} else {
						$data['status'] = false;
						$data['alert']['title'] = 'PERINGATAN';
						$data['alert']['message'] = 'File ' . $tugas['name'][$i] . ' gagal di upload!';
						echo json_encode($data);
						exit;
					}
				}
				$arr['tugas'] = json_encode($fil);
			}
			// var_dump($_FILES['file_jawaban']);

			$result = curl_post('tugas/tambah/', $arr);
			if ($result->status == 200) {
				$rr['status'] = true;
				$rr['alert']['title'] = 'PEMBERITAHUAN';
				$rr['modal']['id'] = '#filterTambahTugas';
				$rr['modal']['action'] = 'hide';
				if ($sumber == 1) {
					$rr['load'][0]['parent'] = '#parent_modal';
					$rr['load'][0]['reload'] = base_url('tugas/') . '  #form_tambah_tugas';
				} elseif ($sumber == 2) {
					$rr['load'][0]['parent'] = '#parent_modal';
					$rr['load'][0]['reload'] = base_url('tugas/pelajaran/' . $id_kelas . '/') . '  #form_tambah_tugas';
				} elseif ($sumber == 3) {
					$rr['load'][0]['parent'] = '#parent_modal';
					$rr['load'][0]['reload'] = base_url('tugas/tugas_sekolah/' . $id_kelas . '/' . $id_pelajaran . '/') . ' #form_tambah_tugas';
					$rr['load'][1]['parent'] = '#parent_tugas';
					$rr['load'][1]['reload'] = base_url('tugas/tugas_sekolah/' . $id_kelas . '/' . $id_pelajaran . '/') . ' #reload_tugas';
				}
			} else {
				$rr['status'] = false;
				$rr['alert']['title'] = 'PERINGATAN';
			}
			$rr['alert']['message'] = $result->message;

			echo json_encode($rr);
			exit;
		} else {
			echo json_encode($data);
			exit;
		}
	}
}
