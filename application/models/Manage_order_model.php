<?php
defined("BASEPATH") or exit('No direct script access allowed');

class Manage_order_model extends CI_Model
{
    public function manage_order_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->join('tbl_customer', 'tbl_customer.customer_id = tbl_order.customer_id');
        $this->db->join('tbl_checkout', 'tbl_checkout.checkout_id = tbl_order.checkout_id');
        $result = $this->db->get();
        return $result->result();
    }

    public function order_info_by_id($order_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('order_id', $order_id);
        $result = $this->db->get();
        return $result->row();
    }

    public function customer_info_by_id($custoemr_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id', $custoemr_id);
        $result = $this->db->get();
        return $result->row();
    }

    public function shipping_info_by_id($checkout_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_checkout');
        $this->db->where('checkout_id', $checkout_id);
        $result = $this->db->get();
        return $result->row();
    }

    public function payment_info_by_id($id_transaction)
    {
        $this->db->select('*');
        $this->db->from('transactions');
        $this->db->where('id_transaction', $id_transaction);
        $result = $this->db->get();
        return $result->row();
    }

    public function orderdetails_info_by_id($order_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_order_details');
        $this->db->join('tbl_product', 'tbl_product.product_id = tbl_order_details.product_id');
        $this->db->where('order_id', $order_id);
        $result = $this->db->get();
        return $result->result();
    }
}
