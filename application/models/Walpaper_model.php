<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Walpaper_model extends CI_Model
{

    public function getWalpapers()
    {
        $query = $this->db->get('tbl_walpaper');

        return $query->result_array();
    }

    public function getWalpaperById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_walpaper');
        $query = $this->db->where('walapaper_id', $id);

        return $query->row_array();
    }

    public function createdWalpaper($data)
    {
        $this->db->insert('tbl_walpaper', $data);
        return $this->db->insert_id();
    }

    public function updatedWalpaper($id, $data)
    {
        $this->db->where('walpaper_id', $id);
        return $this->db->update('tbl_walpaper', $data);
    }

    public function deletedWalpaper($id)
    {
        $this->db->where('walpaper_id', $id);
        return $this->db->delete('tbl_walpaper');
    }
}
