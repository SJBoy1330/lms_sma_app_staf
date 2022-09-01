<?php defined('BASEPATH') or exit('No direct script access allowed');

class Function_ctl extends MY_Frontend
{
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->id_sekolah = $this->session->userdata('lms_staf_id_sekolah');
        $this->id_staf = $this->session->userdata('lms_staf_id_staf');
        is_logged_in();
    }

    public function tambah_bab()
    {
        $arrVar['nama_bab']   = 'Judul bab';
        $arrVar['id_pelajaran']   = 'ID Pelajaran';
        foreach ($arrVar as $var => $value) {
            $$var = $this->input->post($var);
            if (!$$var) {
                $data['required'][] = ['req_' . $var, $value . ' tidak boleh kosong !'];
                $arrAccess[] = false;
            } else {
                $arrAccess[] = true;
            }
        }
        if (!in_array(FALSE, $arrAccess)) {
            // DEKLARASI DATA
            $arr['id_sekolah'] = $this->id_sekolah;
            $arr['nama'] = $nama_bab;
            $arr['id_pelajaran'] = $id_pelajaran;
            // LOAD DATA API
            $insert = curl_post('materi/tambah_bab/', $arr);
            $data['status'] = $insert->status;
            $data['alert']['message'] = $insert->message;
            if ($insert->status == 200) {
                $data['alert']['title'] = 'PEMBERITAHUAN';
                $data['modal']['id'] = '#modalTambahBab';
                $data['modal']['action'] = 'hide';
                $data['load'][0]['parent'] = '#display_bab';
                $data['load'][0]['reload'] = base_url('materi/detail_bab/' . $id_pelajaran) . ' #reload_bab';
                $data['load'][1]['parent'] = '#display_detail';
                $data['load'][1]['reload'] = base_url('materi/detail_bab/' . $id_pelajaran) . ' #reload_detail';
                $data['load'][2]['parent'] = '#select_bab_parent';
                $data['load'][2]['reload'] = base_url('materi/detail_bab/' . $id_pelajaran) . ' #req_select_bab';
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

    public function update_multiple_bab()
    {
        $id_pelajaran = $this->input->post('id_pelajaran');
        $bab = $this->input->post('bab');
        $id_bab = $this->input->post('id_bab');
        if (count($bab) > 0) {
            for ($i = 0; $i < count($bab); $i++) {
                $arr[$i]['id_bab'] = $id_bab[$i];
                $arr[$i]['judul'] = $bab[$i];
                if (!$bab[$i]) {
                    $res['status'] = false;
                    $res['alert']['title'] = 'PERINGATAN';
                    $res['alert']['message'] = 'Judul bab tidak boleh kosong!';
                    echo json_encode($res);
                    exit;
                }
            }

            $dt['id_sekolah'] = $this->id_sekolah;
            $dt['data_bab'] = json_encode($arr);

            $result = curl_post('materi/edit_bab_multi', $dt);
            $res['alert']['message'] = $result->message;
            if ($result->status == 200) {
                $res['status'] = true;
                $res['alert']['title'] = 'PEMBERITAHUAN';
                $res['load'][0]['parent'] = '#display_bab';
                $res['load'][0]['reload'] = base_url('materi/detail_bab/' . $id_pelajaran) . ' #reload_bab';
                $res['load'][1]['parent'] = '#display_detail';
                $res['load'][1]['reload'] = base_url('materi/detail_bab/' . $id_pelajaran) . ' #reload_detail';
                echo json_encode($res);
                exit;
            } else {
                $res['status'] = false;
                $res['alert']['title'] = 'PERINGATAN';
                echo json_encode($res);
                exit;
            }
        } else {
            $res['status'] = false;
            $res['title'] = 'PERINGATAN';
            $res['message'] = 'Tambah bab terlebih dahulu!';
            echo json_encode($res);
            exit;
        }
    }

    public function hapus_materi()
    {
        $id_materi = $this->input->post('id_materi');

        $result = curl_post('materi/hapus_materi/', ['id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf, 'id_materi' => $id_materi]);
        if ($result->status == 200) {
            $data['status'] = true;
        } else {
            $data['status'] = false;
            $data['title'] = 'PARINGATAN';
            $data['message'] = $result->message;
        }
        echo json_encode($data);
    }
    public function hapus_bab()
    {
        $id_bab = $this->input->post('id_bab');

        $result = curl_post('materi/hapus_bab/', ['id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf, 'id_bab' => $id_bab]);
        if ($result->status == 200) {
            $data['status'] = true;
        } else {
            $data['status'] = false;
            $data['title'] = 'PARINGATAN';
            $data['message'] = $result->message;
        }
        echo json_encode($data);
    }
    public function tambah_materi()
    {
        $arrVar['select_bab']   = 'Bab';
        $arrVar['id_pelajaran']   = 'ID Pelajaran';
        $arrVar['judul_materi']   = 'Judul';
        $arrVar['keterangan_materi']   = 'Keterangan';
        foreach ($arrVar as $var => $value) {
            $$var = $this->input->post($var);
            if (!$$var) {
                $data['required'][] = ['req_' . $var, $value . ' tidak boleh kosong !'];
                $arrAccess[] = false;
            } else {
                $arrAccess[] = true;
            }
        }

        if (!in_array(FALSE, $arrAccess)) {
            // DEKLARASI DATA
            $arr['id_sekolah'] = $this->id_sekolah;
            $arr['id_staf'] = $this->id_staf;
            $arr['id_bab'] = $select_bab;
            $arr['judul'] = $judul_materi;
            $arr['keterangan'] = $keterangan_materi;
            // LOAD DATA API
            $insert = curl_post('materi/tambah_materi/', $arr);
            $data['status'] = $insert->status;
            $data['alert']['message'] = $insert->message;
            if ($insert->status == 200) {
                $data['alert']['title'] = 'PEMBERITAHUAN';
                $data['modal']['id'] = '#modalTambahMateri';
                $data['modal']['action'] = 'hide';
                $data['load'][0]['parent'] = '#display_bab';
                $data['load'][0]['reload'] = base_url('materi/detail_bab/' . $id_pelajaran) . ' #reload_bab';
                $data['load'][1]['parent'] = '#display_detail';
                $data['load'][1]['reload'] = base_url('materi/detail_bab/' . $id_pelajaran) . ' #reload_detail';
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

    public function tambah_video()
    {
        $arrVar['id_materi']   = 'Materi';
        $arrVar['judul_video']   = 'Judul video';
        $arrVar['url_video']   = 'Url video';
        foreach ($arrVar as $var => $value) {
            $$var = $this->input->post($var);
            if (!$$var) {
                $data['required'][] = ['req_' . $var, $value . ' tidak boleh kosong !'];
                $arrAccess[] = false;
            } else {
                $arrAccess[] = true;
            }
        }

        if (!in_array(FALSE, $arrAccess)) {
            // DEKLARASI DATA
            $arr['id_sekolah'] = $this->id_sekolah;

            $arr['id_materi'] = $id_materi;
            $arr['judul'] = $judul_video;
            $arr['url'] = $url_video;
            // LOAD DATA API
            $insert = curl_post('materi/tambah_video/', $arr);
            $data['status'] = $insert->status;
            $data['alert']['message'] = $insert->message;
            if ($insert->status == 200) {
                $data['alert']['title'] = 'PEMBERITAHUAN';
                $data['load'][0]['parent'] = '#parent_video';
                $data['load'][0]['reload'] = base_url('materi/detail_materi/' . $id_materi) . ' #reload_video';
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


    public function tambah_dokumen()
    {
        $arrVar['id_materi']   = 'Materi';
        $arrVar['judul_dokumen']   = 'Judul dokumen';
        foreach ($arrVar as $var => $value) {
            $$var = $this->input->post($var);
            if (!$$var) {
                $data['required'][] = ['req_' . $var, $value . ' tidak boleh kosong !'];
                $arrAccess[] = false;
            } else {
                $arrAccess[] = true;
            }
        }

        if (!$_FILES['dokumen']['tmp_name']) {
            $data['required'][] = ['req_dokumen', 'Dokumen tidak boleh kosong !'];
            $arrAccess[] = false;
        } else {
            $dokumen  = $_FILES['dokumen'];
            $arrAccess[] = true;
        }
        if (!in_array(FALSE, $arrAccess)) {
            // DEKLARASI DATA
            $arr['id_sekolah'] = $this->id_sekolah;

            $arr['id_materi'] = $id_materi;
            $arr['judul'] = $judul_dokumen;
            $arre['dokumen'] = $dokumen;
            // LOAD DATA API
            $insert = curl_post('materi/tambah_dokumen/', $arr, $arre);
            $data['status'] = $insert->status;
            $data['alert']['message'] = $insert->message;
            if ($insert->status == 200) {
                $data['alert']['title'] = 'PEMBERITAHUAN';
                $data['load'][0]['parent'] = '#parent_dokumen';
                $data['load'][0]['reload'] = base_url('materi/detail_materi/' . $id_materi) . ' #reload_dokumen';
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
    public function hapus_video_materi()
    {
        $id_materi_video = $this->input->post('id_materi_video');

        $result = curl_post('materi/hapus_materi_video/', ['id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf, 'id_materi_video' => $id_materi_video]);
        if ($result->status == 200) {
            $data['status'] = true;
        } else {
            $data['status'] = false;
            $data['title'] = 'PARINGATAN';
            $data['message'] = $result->message;
        }
        echo json_encode($data);
    }

    public function hapus_dokumen_materi()
    {
        $id_materi_dokumen = $this->input->post('id_materi_dokumen');

        $result = curl_post('materi/hapus_materi_dokumen/', ['id_sekolah' => $this->id_sekolah, 'id_staf' => $this->id_staf, 'id_materi_dokumen' => $id_materi_dokumen]);
        if ($result->status == 200) {
            $data['status'] = true;
        } else {
            $data['status'] = false;
            $data['title'] = 'PARINGATAN';
            $data['message'] = $result->message;
        }
        echo json_encode($data);
    }


    public function edit_materi()
    {
        $arrVar['id_materi'] = 'ID Materi';
        $arrVar['judul_materi'] = 'Judul materi';
        $arrVar['keterangan'] = 'Keterangan';
        $arrVar['id_bab'] = 'Bab';
        foreach ($arrVar as $var => $value) {
            $$var = $this->input->post($var);
            if (!$$var) {
                $data['required'][] = ['req_' . $var, $value . ' tidak boleh kosong !'];
                $arrAccess[] = false;
            } else {
                $arrAccess[] = true;
            }
        }

        if (in_array(false, $arrAccess)) {
            $data['status'] = false;
            echo json_encode($data);
            exit;
        }
        $request_data = [
            "id_sekolah" => $this->id_sekolah,
            "id_materi" => $id_materi,
            "judul" => $judul_materi,
            "keterangan" => $keterangan,
            "id_bab" => $id_bab,
        ];

        $result = curl_post('materi/edit_materi', $request_data);
        $data['status'] = !$error;
        if (!$result->error) {
            $data['status'] = TRUE;
            $data['alert']['title'] = 'PEMBERITAHUAN';
            $data['alert']['message'] = $result->message;
            $data['load'][0]['parent'] = '#form_edit_materi';
            $data['load'][0]['reload'] = base_url('materi/detail_materi/' . $id_materi) . ' #reload-detail-materi';
            $data['load'][1]['parent'] = '#parent_header_materi';
            $data['load'][1]['reload'] = base_url('materi/detail_materi/' . $id_materi) . ' #reload_header_materi';
        } else {
            $data['status'] = FALSE;
            $data['alert']['title'] = 'PERINGATAN';
            $data['alert']['message'] = $result->message;
        }
        echo json_encode($data);
        exit;
    }
}
