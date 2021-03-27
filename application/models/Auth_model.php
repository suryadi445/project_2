<?php

class Auth_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('tbl_users', $data);
    }
}
