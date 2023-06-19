<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Web_model');
        $this->load->model('Category_model');
        $this->load->model('Product_model');
    }

    public function index()
    {
        $this->load->view('themes/_partials/header');
        $this->load->view('themes/_partials/navbar');
        $this->load->view('themes/customer_login');
        $this->load->view('themes/_partials/footer');
    }

    public function customer_login()
    {
        $this->load->view('themes/_partials/header');
        $this->load->view('themes/_partials/navbar');
        $this->load->view('themes/customer_login');
        $this->load->view('themes/_partials/footer');
    }

    public function customer_check_login()
    {
        $data['customer_email']    = $this->input->post('customer_email');
        $data['customer_password'] = md5($this->input->post('customer_password'));

        $this->form_validation->set_rules('customer_email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('customer_password', 'Password', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->Web_model->get_customer_info($data);
            if ($result) {
                $this->session->set_userdata('customer_id', $result['customer_id']);
                $this->session->set_userdata('customer_email', $data['customer_email']);
                redirect('welcome');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
 Login Fail!</div>');
                redirect('customer/login');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('customer/login');
        }
    }

    public function register()
    {
        $this->load->view('themes/_partials/header');
        $this->load->view('themes/_partials/navbar');
        $this->load->view('themes/customer_register');
        $this->load->view('themes/_partials/footer');
    }

    public function customer_save()
    {
        $data['customer_name']     = $this->input->post('customer_name');
        $data['customer_email']    = $this->input->post('customer_email');
        $data['customer_phone']    = $this->input->post('customer_phone');
        $data['customer_password'] = md5($this->input->post('customer_password'));
        $data['customer_active'] = '1';

        $this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required');
        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email|is_unique[tbl_customer.customer_email]', [
            'is_unique' => 'This email has already exist!'
        ]);
        $this->form_validation->set_rules('customer_phone', 'Nomor Telepon', 'trim|required');
        $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required');
        if ($this->form_validation->run() == true) {
            $result = $this->Web_model->save_customer_info($data);
            if ($result) {
                $this->session->set_flashdata('customer_name', $data['customer_name']);
                $this->session->set_flashdata('customer_email', $data['customer_email']);
                redirect('register/success');
            } else {
                $this->session->set_flashdata('message', 'Customer Registration Fail');
                redirect('customer/register');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('customer/register');
        }
    }

    public function register_success()
    {
        $customer_name = $this->session->flashdata('customer_name');
        if (!$customer_name) {
            redirect('customer/register');
        }
        $this->load->view('themes/_partials/header');
        $this->load->view('themes/_partials/navbar',);
        $this->load->view('themes/register_success',);
    }


    public function save_checkout_address()
    {
        $data = array();
        $data['checkout_name'] = $this->input->post('checkout_name');
        $data['checkout_email'] = $this->input->post('checkout_email');
        $data['checkout_alamat'] = $this->input->post('checkout_alamat');
        $data['checkout_provinsi'] = $this->input->post('checkout_provinsi');
        $data['checkout_kota'] = $this->input->post('checkout_kota');
        $data['expedisi'] = $this->input->post('expedisi');
        $data['ongkir'] = $this->input->post('ongkir');
        $data['checkout_phone'] = $this->input->post('checkout_phone');
        $data['kodepos'] = $this->input->post('kodepos');
        $data['total_belanja'] = $this->input->post('total_belanja');

        $this->form_validation->set_rules('checkout_name', 'checkout Name', 'trim|required');
        $this->form_validation->set_rules('checkout_email', 'checkout Email', 'trim|required');
        $this->form_validation->set_rules('checkout_alamat', 'checkout Alamat', 'trim|required');
        $this->form_validation->set_rules('checkout_provinsi', 'Provinsi', 'trim|required');
        $this->form_validation->set_rules('checkout_kota', 'kota', 'trim|required');
        $this->form_validation->set_rules('expedisi', 'Expedisi', 'trim|required');
        $this->form_validation->set_rules('ongkir', 'Ongkir', 'trim|required');
        $this->form_validation->set_rules('checkout_phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('kodepos', 'Kode Pos', 'trim|required');
        $this->form_validation->set_rules('total_belanja', 'Total Belanja', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->Web_model->save_checkout($data);

            if ($result) {
                $this->session->set_userdata('checkout_id', $result);
                redirect('customer-checkout/' . $result);
            } else {
                echo 'Gagal melakukan checkout';
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('cart');
        }
    }


    public function customer_checkout($checkoutID)
    {
        // Mendapatkan total belanja dari tabel "checkout" berdasarkan checkoutID
        $this->db->select('total_belanja');
        $this->db->from('tbl_checkout');
        $this->db->where('checkout_id', $checkoutID);
        $query = $this->db->get();
        $result = $query->row();

        if ($result) {
            $totalBelanja = $result->total_belanja;
        } else {
            $totalBelanja = 'Belum ada data total belanja.';
        }

        $data['totalBelanja'] = $totalBelanja;

        $this->load->view('themes/_partials/header');
        $this->load->view('themes/_partials/navbar');
        $this->load->view('themes/checkout', $data);
        $this->load->view('themes/_partials/footer');
    }





    public function save_order()
    {
        $data['name'] = $this->input->post('name');
        $totalBelanja = $this->input->post('totalBelanja');
        $data['bank_name'] = $this->input->post('bank_name');
        $data['account_number'] = $this->input->post('account_number');

        $this->form_validation->set_rules('name', 'Nama tidak sesuai dengan username', 'required');
        $this->form_validation->set_rules('totalBelanja', 'total Belanja', 'required|numeric');
        $this->form_validation->set_rules('bank_name', 'Nama Bank', 'required');

        if ($this->form_validation->run() == true) {
            $id_transaction = $this->Web_model->save_payment_info($data);
            $odata = array();
            $odata['customer_id'] = $this->session->userdata('customer_id');
            $odata['checkout_id'] = $this->session->userdata('checkout_id');
            $odata['id_transaction'] = $id_transaction;
            $odata['order_total'] = $totalBelanja;

            $order_id = $this->Web_model->save_order_info($odata);

            $oddata = array();
            $myoddata = $this->cart->contents();

            foreach ($myoddata as $oddatas) {
                $oddata['order_id'] = $order_id;
                $oddata['product_id'] = $oddatas['id'];
                $oddata['product_name'] = $oddatas['name'];
                $oddata['product_price'] = $oddatas['price'];
                $oddata['product_sales_quantity'] = $oddatas['qty'];
                $oddata['product_image'] = $oddatas['options']['image'];

                // Mengurangi stok produk
                $this->reduceStock($oddatas['id'], $oddatas['qty']);

                $this->Web_model->save_order_details_info($oddata);
            }

            $this->cart->destroy();

            redirect('customer/order_success');
        } else {
            $this->session->set_flashdata('message', validation_errors());
            $checkoutID = $this->session->userdata('checkout_id');
            redirect('Customer/customer_checkout/' . $checkoutID);
        }
    }

    public function reduceStock($product_id, $quantity)
    {
        $current_stock = $this->db->get_where('tbl_product', ['product_id' => $product_id])->row()->product_quantity;
        $new_stock = $current_stock - $quantity;

        $this->db->where('product_id', $product_id);
        $this->db->update('tbl_product', ['product_quantity' => $new_stock]);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function order_success()
    {
        $this->load->view('themes/_partials/header');
        $this->load->view('themes/order_success.php');
    }
    public function logout()
    {
        $this->session->unset_userdata('customer_id');
        $this->session->unset_userdata('customer_email');
        redirect('welcome');
    }
}
