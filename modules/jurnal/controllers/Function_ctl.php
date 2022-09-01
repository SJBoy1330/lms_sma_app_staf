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

    public function edit_jurnal_guru()
    {
        $arrVar['id_kelas'] = 'Id Kelas';
        $arrVar['id_pelajaran'] = 'Id Pelajaran';
        $arrVar['materi'] = 'Materi';
        $arrVar['tanggal'] = 'Tanggal';
        $arrVar['kegiatan_guru'] = 'Kegiatan Guru';
        $arrVar['kegiatan_siswa'] = 'Kegiatan Siswa';
        $arrVar['kegiatan_kelas'] = 'Kejadian Kelas';
        foreach ($arrVar as $var => $value) {
            $$var = $this->input->post($var);
            if (!$$var) {
                $data['required'][] = ['req_' . $var, $value . ' tidak boleh kosong !'];
                $arrAccess[] = false;
            } else {
                $set[$var] = $$var;
                $arrAccess[] = true;
            }
        }
        if (!in_array(FALSE, $arrAccess)) {
            // DEKLARASI DATA
            $set['id_sekolah'] = $this->id_sekolah;
            $set['id_staf'] = $this->id_staf;
            // LOAD DATA API
            $insert = curl_post('jurnal/edit_jurnal_guru/', $set);
            $data['status'] = $insert->status;
            $data['alert']['message'] = $insert->message;
            if ($insert->status == 200) {
                $data['alert']['title'] = 'PEMBERITAHUAN';
                $data['load'][0]['parent'] = '#display_jurnal';
                $data['load'][0]['reload'] = base_url('jurnal/detail_jurnal_guru/' . $id_pelajaran . '/' . $id_kelas . '?tanggal=' . $tanggal) . ' #form_edit_jurnal';
            } else {
                $data['alert']['title'] = 'PERINGATAN';
            }
            sleep(1.5);
            echo json_encode($data);
            exit;
        } else {
            sleep(1.5);
            $data['status'] = false;
            echo json_encode($data);
            exit;
        }
    }

    public function tambah_jurnal_staf()
    {
        // DEKLARASI DATA
        $set['id_sekolah'] = $this->id_sekolah;
        $set['id_staf'] = $this->id_staf;
        $set['tanggal'] = $this->input->post('tanggal');
        $set['jenis_tugas'] = json_encode($this->input->post('jenis_tugas'));
        $tugas_lain = $this->input->post('tugas_lain');
        if ($tugas_lain) {
            $set['tugas_lain'] = $tugas_lain;
        }



        // LOAD DATA API
        $insert = curl_post('jurnal/action_jurnal_staf/', $set);
        $data['status'] = $insert->status;
        $data['alert']['message'] = $insert->message;
        if ($insert->status == 200) {
            $data['alert']['title'] = 'PEMBERITAHUAN';
            $data['load'][0]['parent'] = '#parent_jurnal_staf';
            $data['load'][0]['reload'] = base_url('jurnal/jurnal_staf/') . ' #reload_jurnal_staf';
            $data['modal']['id'] = '#filterTambahJurnal';
            $data['modal']['action'] = 'hide';
        } else {
            $data['alert']['title'] = 'PERINGATAN';
        }
        sleep(1.5);
        echo json_encode($data);
        exit;
    }
}
