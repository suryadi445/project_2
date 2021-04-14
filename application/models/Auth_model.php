<?php

class Auth_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('tbl_users', $data);
    }

    public function insert_token($user_token)
    {
        $this->db->insert('tbl_user_token', $user_token);
    }

    public function getUser($email)
    {
        return $this->db->get_where('tbl_user_token', ['email' => $email])->row_array();
    }

    public function getUserToken($token)
    {
        return $this->db->get_where('tbl_user_token', ['token' => $token])->row_array();
    }

    public function update_password($password, $email)
    {
        $this->db->set('password', $password);
        $this->db->where('email', $email);
        $this->db->update('tbl_users');
    }
}
