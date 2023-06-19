<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManageOrder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Manage_order_model');
    }

    public function index()
    {
        $data['title'] = "Order Options";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['manage_order'] = $this->Manage_order_model->manage_order_info();

        $this->load->view('layout/header');
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('admin/manage_order/index', $data);
        $this->load->view('layout/footer');
    }

    public function order_details($order_id)
    {
        $data['title'] = "Order Options";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $order_info = $this->Manage_order_model->order_info_by_id($order_id);
        $customer_id = $order_info->customer_id;
        $checkout_id = $order_info->checkout_id;
        $id_transaction = $order_info->id_transaction;

        $data['customer_info'] = $this->Manage_order_model->customer_info_by_id($customer_id);
        $data['payment_info'] = $this->Manage_order_model->payment_info_by_id($id_transaction);
        $data['order_details_info'] = $this->Manage_order_model->orderdetails_info_by_id($order_id);
        $data['order_info'] = $this->Manage_order_model->order_info_by_id($order_id);

        // Get shipping info
        $shipping_info = $this->Manage_order_model->shipping_info_by_id($checkout_id);

        // Get provinsi name from Raja Ongkir API
        $checkout_provinsi_id = $shipping_info->checkout_provinsi;
        $checkout_kota_id = $shipping_info->checkout_kota;
        // var_dump($checkout_kota_id);
        // die();
        $api_key = "325ece4edd25f5720cfe09e0b188c831"; // Ganti dengan API Key Raja Ongkir Anda

        // Get provinsi name
        $api_url_provinsi = "https://api.rajaongkir.com/starter/province?id=" . $checkout_provinsi_id;
        $ch_provinsi = curl_init();
        curl_setopt($ch_provinsi, CURLOPT_URL, $api_url_provinsi);
        curl_setopt($ch_provinsi, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch_provinsi, CURLOPT_HTTPHEADER, array('key: ' . $api_key));
        curl_setopt($ch_provinsi, CURLOPT_SSL_VERIFYPEER, 0); // Menonaktifkan verifikasi sertifikat SSL
        curl_setopt($ch_provinsi, CURLOPT_SSL_VERIFYHOST, 0); // Menonaktifkan verifikasi host SSL
        $response_provinsi = curl_exec($ch_provinsi);
        curl_close($ch_provinsi);

        $result_provinsi = json_decode($response_provinsi, true);
        $province_name = isset($result_provinsi['rajaongkir']['results']['province']) ? $result_provinsi['rajaongkir']['results']['province'] : '';

        // Get kota name
        $api_url_kota = "https://api.rajaongkir.com/starter/city?id=" . $checkout_kota_id;
        // var_dump($api_url_kota);
        // die();
        $ch_kota = curl_init();
        curl_setopt($ch_kota, CURLOPT_URL, $api_url_kota);
        curl_setopt($ch_kota, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch_kota, CURLOPT_HTTPHEADER, array('key: ' . $api_key));
        curl_setopt($ch_kota, CURLOPT_SSL_VERIFYPEER, 0); // Menonaktifkan verifikasi sertifikat SSL
        curl_setopt($ch_kota, CURLOPT_SSL_VERIFYHOST, 0); // Menonaktifkan verifikasi host SSL
        $response_kota = curl_exec($ch_kota);
        curl_close($ch_kota);

        $result_kota = json_decode($response_kota, true);
        // var_dump($result_kota);
        // die();

        if (isset($result_kota['rajaongkir']['results']['type'])) {
            $type = $result_kota['rajaongkir']['results']['type'];
            if ($type == 'Kota' || $type == 'Kabupaten') {
                $city_name = $result_kota['rajaongkir']['results']['city_name'];
            }
        }

        // var_dump($city_name);
        // die();

        // Add provinsi name and city name to shipping info
        $shipping_info->checkout_provinsi = $province_name;
        $shipping_info->checkout_kota = $city_name;
        $data['shipping_info'] = $shipping_info;

        // Get ongkir from Raja Ongkir API
        $api_url_ongkir = "https://api.rajaongkir.com/starter/cost";
        $origin = "501"; // Ganti dengan ID kota pengirim
        $destination = $checkout_kota_id; // ID kota penerima diambil dari checkout_kota_id
        $weight = "1700"; // Ganti dengan berat barang dalam gram
        $courier = $shipping_info->expedisi; // Mengambil nilai courier dari tabel tbl_checkout

        $ch_ongkir = curl_init();
        curl_setopt($ch_ongkir, CURLOPT_URL, $api_url_ongkir);
        curl_setopt($ch_ongkir, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch_ongkir, CURLOPT_HTTPHEADER, array('key: ' . $api_key));
        curl_setopt($ch_ongkir, CURLOPT_SSL_VERIFYPEER, 0); // Menonaktifkan verifikasi sertifikat SSL
        curl_setopt($ch_ongkir, CURLOPT_SSL_VERIFYHOST, 0); // Menonaktifkan verifikasi host SSL
        curl_setopt($ch_ongkir, CURLOPT_POST, 1);
        curl_setopt($ch_ongkir, CURLOPT_POSTFIELDS, http_build_query(array(
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier
        )));
        $response_ongkir = curl_exec($ch_ongkir);
        curl_close($ch_ongkir);

        $result_ongkir = json_decode($response_ongkir, true);
        $ongkir_id = $shipping_info->ongkir;
        $ongkir = '';
        if (isset($result_ongkir['rajaongkir']['results'][0]['costs'])) {
            $costs = $result_ongkir['rajaongkir']['results'][0]['costs'];
            $cost = $costs[$ongkir_id - 1]; // Ambil data ongkir pertama

            $description = '';
            foreach ($cost['cost'] as $value) {
                $description .= '  Rp. ' . number_format($value['value']) . '<br>' . ' Lama Kirim :' .  $value['etd'] . ' Hari';
            }
            $ongkir = ' ' . $description;
            // var_dump($ongkir);
            // die();
        }

        $result_ongkirValue = json_decode($response_ongkir, true);
        $id_ongkirValue = $shipping_info->ongkir;

        $ongkirValue = '';

        if (isset($result_ongkirValue['rajaongkir']['results'][0]['costs'][$id_ongkirValue - 1]['cost'][0]['value'])) {
            $ongkirValue = $result_ongkirValue['rajaongkir']['results'][0]['costs'][$id_ongkirValue - 1]['cost'][0]['value'];
        }

        $shipping_info->ongkir = $ongkir;
        $shipping_info->ongkirValue = $ongkirValue;
        $data['shipping_info'] = $shipping_info;


        // Show order details
        $this->load->view('layout/header');
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('admin/manage_order/order_detail', $data);
        $this->load->view('layout/footer');
    }
}
