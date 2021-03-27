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
        $this->load->view('templates/header');
        $this->load->view('auth/login');
        $this->load->view('templates/footer');
    }


    public function registrasi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Password2', 'required');

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
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">data gagal ditambahkan</div>');
            redirect('auth/login');
        } else {
            // berhasil
            $this->auth_model->insert($data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">data berhasil ditambahkan</div>');
            redirect('auth/login');
        }
    }
}
