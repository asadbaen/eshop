<?php

defined('BASEPATH') or exit('No direct access allowed');

class Admin_model extends CI_Model
{
    public function roleGetById($id)
    {
        $this->db->select('*');
        $this->db->from('user_role');
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row_array();
    }
}
