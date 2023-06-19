<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{

    public function getAllCategories()
    {
        $query = $this->db->get('tbl_category');

        return $query->result_array();
    }

    public function createdCategory($data)
    {
        $this->db->insert('tbl_category', $data);
        $query = $this->db->insert_id();

        return $query;
    }

    public function categoryGetById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_categori');
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->row_array();
    }

    public function updatedCategory($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_category', $data);
    }

    public function deleteById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_category');
    }
}
