<?php
defined('BASEPATH') or exit('No direct script allowe access');

class Toko_model extends CI_Model
{
    public function createdStore($dataToko)
    {
        $this->db->insert('tbl_toko', $dataToko);

        return $this->db->insert_id();
    }
}
