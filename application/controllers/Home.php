<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Home_model');
    }

    public function index()
    {
        $url = 'https://bioskop-api-zahirr.herokuapp.com/api/now-playing';

        // init cURL
        $ch = curl_init($url);

        // set to json
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);

        curl_close($ch);

        $result = json_decode($result, true);

        $data['result'] = $result['result']['hasil'];
        $data['judul'] = 'Home';

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function kirim_pesan()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $pesan = $this->input->post('pesan');

        $data = [
            'nama'  => $nama,
            'email' => $email,
            'phone' => $phone,
            'pesan' => $pesan
        ];


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|numeric');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Home';

            $this->load->view('templates/header', $data);
            $this->load->view('home/index', $data);
            $this->load->view('templates/footer');
        } else {
            // insert kedalam tabel users
            $this->Home_model->insert($data);

            // function kirim email yang memiliki identitas verivikasi
            // $this->_sendEmail();

            $this->session->set_flashdata('alert_sukses', 'Yeayy, Berhasil..!!');
            $this->session->set_flashdata('sukses', 'Terima kasih, pesan Anda sudah tersimpan');

            redirect('home');
        };
    }

    private function _sendEmail()
    {
        // konfigurasi untuk library email CI
        $config = [
            'protocol'      => 'smtp',
            'smtp_host'     => 'ssl://smtp.googlemail.com',
            'smtp_user'     => 'suryadi.sender@gmail.com',
            'smtp_pass'     => 'mahasiwa',
            'smtp_port'     => 465,
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'newline'       => "\r\n"
        ];
        // load library email
        $this->load->library('email', $config);
        // email pengirimnya
        $this->email->from('suryadi.sender@gmail.com', 'Suryadi');
        // email penerima atau email yg digunakan untuk registrasi
        $this->email->to($this->input->post('email'));
        $this->email->subject('Account Verifikasi');
        $this->email->message('Klik untuk verifikasi akun Anda : <a href="' . base_url() . 'auth/verifikasi?email=' . $this->input->post('email') .  '"> Aktifkan </a>');


        // jika email terkirim
        if ($this->email->send()) {
            // mengembalikan jika nilainya benar
            return true;
        } else {
            // menghentikan program dan menampilkan pesan kesalahan jika email tidak terkirim
            echo $this->email->print_debugger();
            die;
        }
    }
}
