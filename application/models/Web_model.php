<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Web_model extends CI_Model
{

    public function getAllProducts()
    {
        $this->db->select('*,tbl_product.publication_status as status');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
        $this->db->order_by('tbl_product.product_id', 'DESC');
        $this->db->where('tbl_product.publication_status', 1);
        // $this->db->limit(8);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
        $this->db->where('tbl_product.product_id', $id);
        $info = $this->db->get();
        return $info->row_array();
    }

    public function productById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
        $this->db->order_by('tbl_product.product_id', 'DESC');
        $this->db->where('tbl_product.publication_status', 1);
        $this->db->where('tbl_product.product_id', $id);
        $info = $this->db->get();
        return $info->row_array();
    }
    public function get_product_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
        $this->db->order_by('tbl_product.product_id', 'DESC');
        $this->db->where('tbl_product.publication_status', 1);
        $this->db->where('tbl_product.product_id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function get_customer_info($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where($data);
        $info = $this->db->get();
        return $info->row_array();
    }

    public function save_checkout($data)
    {
        $this->db->insert('tbl_checkout', $data);
        return $this->db->insert_id();

        if ($checkout_id) {
            // Simpan total belanja
            $totalBelanja = $this->input->post('total_belanja');
            $this->db->set('total_belanja', $totalBelanja);
            $this->db->where('checkout_id', $checkout_id);
            $this->db->update('checkout');

            return $checkout_id;
        } else {
            return false;
        }
    }
    public function save_payment_info($data)
    {
        $this->db->insert('transactions', $data);

        return $this->db->insert_id();
    }

    public function save_order_info($data)
    {
        $this->db->insert('tbl_order', $data);

        return $this->db->insert_id();
    }

    public function save_order_details_info($oddata)
    {

        $this->db->insert('tbl_order_details', $oddata);

        return $this->db->insert_id();
    }
    public function get_all_search_product($search)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
        // $this->db->join('tbl_user', 'tbl_user.user_id=tbl_product.product_author');
        $this->db->order_by('tbl_product.product_id', 'DESC');
        $this->db->where('tbl_product.publication_status', 1);
        $this->db->like('tbl_product.product_title', $search, 'both');
        $this->db->or_like('tbl_product.product_description', $search, 'both');
        $this->db->or_like('tbl_category.category_name', $search, 'both');
        $this->db->or_like('tbl_brand.brand_name', $search, 'both');
        $info = $this->db->get();
        return $info->result();
    }

    public function save_customer_info($data)
    {
        $this->db->insert('tbl_customer', $data);

        return $this->db->insert_id();
    }
}
