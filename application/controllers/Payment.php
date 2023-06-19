<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Load library atau helper yang dibutuhkan
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        // Tampilkan halaman pembayaran
        $this->load->view('payment');
    }

    public function process_payment()
    {
        // Validasi input pembayaran
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('amount', 'Jumlah', 'required|numeric');
        $this->form_validation->set_rules('bank_name', 'Nama Bank', 'required');
        $this->form_validation->set_rules('account_number', 'Nomor Rekening', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali halaman pembayaran dengan pesan kesalahan
            $this->load->view('payment');
        } else {
            // Ambil data pembayaran yang diisi oleh pengguna
            $data = array(
                'name' => $this->input->post('name'),
                'amount' => $this->input->post('amount'),
                'bank_name' => $this->input->post('bank_name'),
                'account_number' => $this->input->post('account_number')
            );

            // Simpan data transaksi ke dalam database
            $this->db->insert('transactions', $data);
            $transaction_id = $this->db->insert_id();

            // Setelah simpan transaksi berhasil, tampilkan halaman konfirmasi pembayaran
            $data['transaction_id'] = $transaction_id;
            $this->load->view('payment_success', $data);
        }
    }
}
