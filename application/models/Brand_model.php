<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Brand_model extends CI_Model
{
    public function brandGetAll()
    {
        $query = $this->db->get('tbl_brand');
        return $query->result_array();
    }

    public function brandGetById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_brand');
        $this->db->where('brand_id', $id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function createdBrand($data)
    {
        $this->db->insert('tbl_brand', $data);
        return $this->db->insert_id();
    }

    public function updatedBrand($id, $data)
    {
        $this->db->where('brand_id', $id);

        return $this->db->update('tbl_brand', $data);
    }

    public function deletedBrand($id)
    {
        $this->db->where('brand_id', $id);
        return $this->db->delete('tbl_brand');
    }
}
