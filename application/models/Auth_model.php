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
}
