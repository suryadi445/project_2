<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('auth_model');
    }


    public function login()
    {
        $this->form_validation->set_rules('email_login', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password_login', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Form Login';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email_login');
        $password = $this->input->post('password_login');

        $user = $this->db->get_where('tbl_users', ['email' => $email])->row_array();

        // var_dump($user);
        // die;

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'nama' => $user['nama']
                ];

                if ($user['aktivasi'] == 0) {
                    $this->session->set_flashdata('error', 'Email anda belum diAktivasi');
                    redirect('auth/login');
                } else {
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('sukses', 'Selamat datang ' . $user['nama']);
                    redirect('home/index');
                }
            } else {
                $this->session->set_flashdata('error', 'Password yang anda masukkan salah');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('error', 'Anda belum terdaftar, mohon registrasi terlebih dahulu..');
            redirect('auth/login');
        }
    }


    public function registrasi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_users.email]');
        $this->form_validation->set_rules('password', 'Konfirmasi Password', 'required|trim|min_length[4]|matches[password2]', [
            'min_length' => 'Password minimal 4 karakter',
            'matches' => 'Konfirmasi password tidak sama'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

        $nama = htmlspecialchars($this->input->post('nama', true));
        $email = htmlspecialchars($this->input->post('email', true));
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $data = [
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'aktivasi' => 0
        ];

        // siapkan token
        // base64 merubah menjadi karakter
        // random_bytes membangkitkan bilangan random tapi tidak berupa karakter yang bida dibaca
        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email'         => $email,
            'token '        => $token,
            'date_created'  => time()
        ];

        if ($this->form_validation->run() == false) {
            // gagal
            $this->session->set_flashdata('error', 'Registrasi gagal. Masukkan data dengan benar!!');
            $this->session->set_flashdata('validasi', validation_errors());
            redirect('auth/login');
        } else {
            // berhasil
            // insert kedalam tabel users
            $this->auth_model->insert($data);
            // insert kedalam tabel users_token
            $this->auth_model->insert_token($user_token);

            // function kirim email yang memiliki identitas verivikasi
            $this->_sendEmail($token, 'verifikasi');

            $this->session->set_flashdata('sukses', 'data berhasil ditambahkan');

            redirect('auth/login');
        }
    }

    private function _sendEmail($token, $type)
    {
        // konfigurasi untuk library email CI
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'suryadi.sender@gmail.com',
            'smtp_pass' => 'mahasiwa',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];
        // load library email
        $this->load->library('email', $config);
        // email pengirimnya
        $this->email->from('suryadi.sender@gmail.com', 'Suryadi');
        // email penerima atau email yg digunakan untuk registrasi
        $this->email->to($this->input->post('email'));

        // validasi jika typenya verifikasi maka menjalankan fungsi berikut
        if ($type == 'verifikasi') {
            $this->email->subject('Account Verifikasi');
            $this->email->message('Klik untuk verifikasi akun Anda : <a href="' . base_url() . 'auth/verifikasi?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Aktifkan </a>');
        }

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

    public function verifikasi()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tbl_users', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('tbl_user_token', ['token' => $token])->row_array();

            if ($user_token) {
                // validasi untuk menentukan waktu untuk lamanya token bisa digunakan
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {

                    // query untuk merubah aktivasi pada tabel users menjadi 1 dari nilai awal 0
                    $this->db->set('aktivasi', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tbl_users');

                    // menghapus token dari tabel user_token jika user sudah aktifasi
                    $this->db->delete('tbl_user_token', ['email' => $email]);

                    $this->session->set_flashdata('sukses', 'Aktifasi ' . $email . ' berhasil, Silahkan Login');
                    redirect('auth/login');
                } else {

                    // menghapus token jika lebih dari 1 hari pada tabel users dan tabel user_token
                    $this->db->delete('tbl_users', ['email' => $email]);
                    $this->db->delete('tbl_user_token', ['email' => $email]);

                    $this->session->set_flashdata('error', 'Aktifasi Gagal, Token sudah tidak berlaku');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('error', 'Aktifasi Gagal, Token yang Anda masukkan salah');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('error', 'Aktifasi Gagal, Email yang Anda masukkan salah');
            redirect('auth/login');
        }
    }

    public function lupa_password()
    {
        // $row = $this->db->get_where('tbl_users', ['id' => $id]);
    }


    public function logout()
    {
        // $this->session->set_flashdata('logout', validation_errors());
        session_destroy();
        redirect('home/index');
    }
}
