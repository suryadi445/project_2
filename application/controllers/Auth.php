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

                $this->session->set_userdata($data);
                $this->session->set_flashdata('sukses', 'selamat datang ' . $user['nama']);
                redirect('home/index');
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
            'password' => $password
        ];

        if ($this->form_validation->run() == false) {
            // gagal
            $this->session->set_flashdata('error', 'Registrasi gagal. Masukkan data dengan benar!!');
            $this->session->set_flashdata('validasi', '<div class="alert alert-danger" role="alert">' . validation_errors() . '</div>');
            redirect('auth/login');
        } else {
            // berhasil
            $this->auth_model->insert($data);
            $this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
            redirect('auth/login');
        }
    }


    public function logout()
    {
        session_destroy();
        redirect('home/index');
    }
}
