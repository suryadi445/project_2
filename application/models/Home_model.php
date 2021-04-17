<?php

class Home_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('tbl_pesan', $data);
    }
}
