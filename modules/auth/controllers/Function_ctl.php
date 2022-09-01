<?php defined('BASEPATH') or exit('No direct script access allowed');

class Function_ctl extends MY_Welcome
{
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
    }

    public function login_proses()
    {
        $arrVar['kode_sekolah']         = 'Kode sekolah';
        $arrVar['username']    = 'ID Pengguna';
        $arrVar['kata_sandi'] = 'Kata sandi';
        foreach ($arrVar as $var => $value) {
            $$var = $this->input->post($var);

            if (!$$var) {
                $data['required'][] = ['req_' . $var, $value . ' tidak boleh kosong !'];
                $arrAccess[] = false;
            } else {
                $arrAccess[] = true;
            }
        }

        if (!in_array(false, $arrAccess)) {
            // CURL POST
            $arrPost['kode_sekolah'] = $kode_sekolah;
            $arrPost['username'] = $username;
            $arrPost['password'] = $kata_sandi;
            $response = curl_post('login', $arrPost, 0);
            if ($response->status == 200) {
                $arrSession['lms_staf_id_staf'] = $response->data->id_staf;
                $arrSession['lms_staf_id_sekolah'] = $response->data->id_sekolah;
                $arrSession['lms_staf_role'] = $response->data->role;
                $arrSession['lms_staf_nama'] = $response->data->nama;
                $arrSession['lms_staf_wali_kelas'] = $response->data->wali_kelas;
                if ($response->data->wali_kelas == true) {
                    $arrSession['lms_staf_id_kelas'] = $response->data->id_kelas;
                }
                $arrSession['lms_staf_foto'] = $response->data->foto;


                $this->session->set_userdata($arrSession);
                $data['status'] = TRUE;
                $data['alert']['title'] = 'PEMBERITAHUAN';
                $data['alert']['message'] = $response->message;
                $data['redirect'] = base_url('home');
                echo json_encode($data);
                exit;
            } else {
                $data['status'] = FALSE;
                $data['alert']['title'] = 'PERINGATAN';
                $data['alert']['message'] = $response->message;
                echo json_encode($data);
                exit;
            }
        } else {
            $data['status'] = FALSE;
            echo json_encode($data);
            exit;
        }
    }
}
