<?php

class Home_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('tbl_pesan', $data);
    }

    public function getPesan()
    {
        return $this->db->get('tbl_pesan')->result_array();
    }
}
