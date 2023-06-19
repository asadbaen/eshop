<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{

    public function productGetAll()
    {

        // query tampil data
        // method 3
        // 1 GET => Menampilkan data => bisa berupa semua data yang berada pada tbl_database => atau hanya mengambil ID dari database get
        $query = $this->db->get('tbl_product');
        // fungsi get untuk mengambil dan menampilkan data dari database
        // 2 POST => untuk menyimpan data atau mengirim data 
        return $query->result_array();
    }

    public function productGetById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_id', $id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function createdProduct($data)
    {
        $this->db->insert('tbl_product', $data);

        return $this->db->insert_id();
    }

    public function updatedProduct($id, $data)
    {
        $this->db->where('product_id', $id);
        return $this->db->update('tbl_product', $data);
    }

    public function deletedProduct($id)
    {
        $this->db->where('product_id', $id);
        return $this->db->delete('tbl_product');
    }
}
