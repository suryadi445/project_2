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

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'nama' => $user['nama']
                ];

                if ($user['aktivasi'] == 0) {
                    $this->session->set_flashdata('gagal', 'Login GAGAL!!');
                    $this->session->set_flashdata('error', 'Email anda belum diAktivasi, mohon cek email anda untuk mengaktivasi');
                    redirect('auth/login');
                } else {
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('alert_sukses', 'Yeayy, Berhasil..!!');
                    $this->session->set_flashdata('sukses', 'Selamat datang ' . $user['nama']);
                    redirect('home/index');
                }
            } else {
                $this->session->set_flashdata('gagal', 'Login GAGAL!!');
                $this->session->set_flashdata('error', 'Password yang anda masukkan salah');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Login GAGAL!!');
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
        // random_bytes membangkitkan bilangan random tapi tidak berupa karakter yang bisa dibaca
        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email'         => $email,
            'token '        => $token,
            'date_created'  => time()
        ];

        if ($this->form_validation->run() == false) {
            // gagal
            $this->session->set_flashdata('gagal', 'registrasi GAGAL!!');
            $this->session->set_flashdata('error', 'Masukkan data dengan benar!!');
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

            $this->session->set_flashdata('alert_sukses', 'Yeayy, Berhasil..!!');
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan, cek email anda untuk mengaktivasi akun Anda');

            redirect('auth/login');
        }
    }

    private function _sendEmail($token, $type)
    {
        // konfigurasi untuk library email CI
        $config = [
            'protocol'      => 'smtp',
            'smtp_host'     => 'ssl://smtp.googlemail.com',
            // ini percobaan cadangan untuk digunakan pengganti smtp_host
            // 'smtp_crypto'   => 'tls',
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

        // validasi jika typenya verifikasi maka menjalankan fungsi berikut
        if ($type == 'verifikasi') {
            // subject untuk judul emailnya
            $this->email->subject('Account Verifikasi');
            // untuk isi/body emailnya
            // urlencode digunakan untuk meng-encode menjadi url
            $this->email->message('Klik untuk verifikasi akun Anda : <a href="' . base_url() . 'auth/verifikasi?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Aktifkan </a>');
        } elseif ($type == 'forgot') {
            // subject untuk judul emailnya
            $this->email->subject('Reset Password');
            // untuk isi/body emailnya
            // urlencode digunakan untuk meng-encode menjadi url
            $this->email->message('reset password : <a href="' . base_url() . 'auth/reset_password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Reset </a>');
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

                    $this->session->set_flashdata('alert_sukses', 'Yeayy, Berhasil..!!');
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
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('gagal', 'Permintaan Anda GAGAL');
            $this->session->set_flashdata('validasi', validation_errors());
            $this->session->set_flashdata('error', 'Ada kesalahan pada pengisian data anda, Silahkan ulangi kembali');
            redirect('auth/login');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('tbl_users', ['email' => $email, 'aktivasi' => 1])->row_array();
            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('tbl_user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('alert_sukses', 'Yeayy, Berhasil..!!');
                $this->session->set_flashdata('sukses', 'Cek email anda untuk mengganti password Anda');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('gagal', 'Ganti password GAGAL');
                $this->session->set_flashdata('error', 'Email Anda salah atau email anda belum di aktivasi, mohon masukkan email yang benar untuk mengganti password Anda');
                redirect('auth/login');
            }
        }
    }

    public function reset_password()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->auth_model->getUser($email);

        if ($user) {
            // ada
            $user_token = $this->auth_model->getUserToken($token);

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->ganti_password();
            } else {
                $this->session->set_flashdata('gagal', 'Permintaan ganti Password gagal');
                $this->session->set_flashdata('error', 'Token yang anda masukkan salah, mohon masukkan token yang benar');
                redirect('auth/login');
            }
        } else {
            // gak ada
            $this->session->set_flashdata('gagal', 'Permintaan ganti Password gagal');
            $this->session->set_flashdata('error', 'Email yang anda masukkan salah, mohon masukkan email yang benar');
            redirect('auth/login');
        }
    }

    public function ganti_password()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth/login');
        }

        $this->form_validation->set_rules('ganti_password1', 'Password', 'required|trim|min_length[6]|matches[ganti_password2]');
        $this->form_validation->set_rules('ganti_password2', 'Konfirmasi Password', 'required|trim|min_length[6]|matches[ganti_password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Ganti Password';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/ganti_password');
            $this->load->view('templates/footer');
        } else {
            // berhasil
            $password = password_hash($this->input->post('ganti_password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->auth_model->update_password($password, $email);

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('alert_sukses', 'Yeayy, Berhasil..!!');
            $this->session->set_flashdata('sukses', 'Password berhasil diubah..! Silahkan login');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('home/index');
    }
}
