<?php defined('BASEPATH') or exit('No direct script access allowed');

class Function_ctl extends MY_Frontend
{
    protected $id_sekolah = '';
    protected $id_staf = '';
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->id_sekolah = $this->session->userdata('lms_staf_id_sekolah');
        $this->id_staf = $this->session->userdata('lms_staf_id_staf');
    }

    public function index()
    {
        redirect('home');
    }

    public function presensi_staf()
    {
        $post['id_sekolah'] = $this->id_sekolah;
        $post['id_staf'] = $this->id_staf;
        $post['jam_masuk'] = $this->input->post('jam_masuk');
        $post['jam_pulang'] = $this->input->post('jam_pulang');
        $post['lat'] = $this->input->post('lat');
        $post['long'] = $this->input->post('long');
        $post['checkout'] = $this->input->post('checkout');
        $scan_masuk =  $this->input->post('scan_masuk');

        if ($scan_masuk == 'Y') {
            $post['scan_masuk'] = date('H:i:s');
            $post['scan_pulang'] = NULL;
        } else {
            $post['scan_masuk'] = NULL;
            $post['scan_pulang'] = date('H:i:s');
        }
        $response = curl_post('presensi/staf', $post);
        $data['status'] = $response->status;
        if ($response->status == 200) {
            $data['alert']['title'] = 'PEMBERITAHUAN';
            $data['load'][0]['parent'] = '#parent_presensi';
            $data['load'][0]['reload'] = base_url('home #form_presensi_siswa');

            $data['modal']['id'] = '#presensiModal';
            $data['modal']['action'] = 'hide';
        } else {
            $data['alert']['title'] = 'PERINGATAN';
        }
        $data['alert']['message'] = $response->message;
        echo json_encode($data);
    }

    public function get_modal()
    {
        $id_jadwal = $this->input->post('id_jadwal');
        $result = curl_get('presensi/detail_jadwal/', ['id_sekolah' => $this->id_sekolah, 'id_jadwal' => $id_jadwal]);

        $arr['kelas'] = $result->data->nama_kelas;
        $arr['pelajaran'] = $result->data->nama_pelajaran;
        $arr['waktu'] = $result->data->waktu;
        $arr['id_staf'] = $result->data->id_staf;
        $arr['id_pelajaran'] = $result->data->id_pelajaran;
        $arr['id_kelas'] = $result->data->id_kelas;
        if (isset($_COOKIE['LAT']) && isset($_COOKIE['LONG'])) {
            $arr['jarak'] = get_jarak($_COOKIE['LAT'], $_COOKIE['LONG'], $result->data->lat_sekolah, $result->data->long_sekolah)['meters'];
        } else {
            $arr['jarak'] = NULL;
        }
        sleep(1.5);
        echo json_encode($arr);
    }


    public function mapel()
    {
        $post['id_sekolah'] = $this->id_sekolah;
        $post['id_staf'] = $this->id_staf;
        $post['lat'] = $this->input->post('lat');
        $post['long'] = $this->input->post('long');
        $post['scan_masuk'] = date('H:i:s');
        $post['id_kelas'] = $this->input->post('id_kelas');
        $post['id_pelajaran'] = $this->input->post('id_pelajaran');

        $response = curl_post('presensi/mapel', $post);
        $data['status'] = $response->status;
        if ($response->status == 200) {
            $data['alert']['title'] = 'PEMBERITAHUAN';
            $data['redirect'] = base_url('kbm/detail_kbm/' . $this->input->post('id_pelajaran') . '/' . $this->input->post('id_kelas') . '/' . $this->input->post('id_staf'));
        } else {
            $data['alert']['title'] = 'PERINGATAN';
        }
        $data['alert']['message'] = $response->message;



        echo json_encode($data);
    }
}
