<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('Cart_model');
    }

    public function index()
    {
        $data['cart_contents'] = $this->cart->contents();
        $this->load->view('themes/_partials/header');
        $this->load->view('themes/_partials/navbar', $data);
        $this->load->view('themes/cart', $data);
        $this->load->view('themes/_partials/footer');
    }
    public function card_order()
    {
        $product_id = $this->input->post('product_id');
        $results = $this->Cart_model->get_product_by_id($product_id);

        if ($results) {
            $data = array(
                'id' => $product_id,
                'name' => $results->product_title,
                'price' => $results->product_price,
                'qty' => $this->input->post('qty'),
                'options' => array('image' => $results->product_image)
            );

            $this->cart->insert($data);

            redirect('cart');
        } else {
            // Handle jika produk tidak ditemukan
            echo "Produk tidak ditemukan.";
        }
    }
    public function update_cart()
    {
        $data          = array();
        $data['qty']   = $this->input->post('qty');
        $data['rowid'] = $this->input->post('rowid');

        $this->cart->update($data);
        redirect('cart');
    }
    public function remove_cart()
    {

        $data = $this->input->post('rowid');
        $this->cart->remove($data);
        redirect('cart');
    }
}
