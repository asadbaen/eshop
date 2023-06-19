<?php

defined('BASEPATH') or exit('No direct access allowed');

class Kategori_model extends CI_Model
{
    public function getKategoriAll()
    {
        $query = $this->db->get('kategori_buku');
        return $query->result_array();
    }

    public function getKategoriById($id)
    {
        $this->db->select('*');
        $this->db->from('kategori_buku');
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->row_array();
    }

    public function updateKategori($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('kategori_buku', $data);
    }
}
