<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Toko extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Toko_model');
    }

    public function index()
    {
        $data['title'] = "My Profile";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header');
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('admin/toko/index', $data);
        $this->load->view('layout/footer');
    }

    public function createdToko()
    {

        $data['title'] = "My Profile";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_toko', 'Title', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('alamat_toko', 'Product Price', 'required|trim');
        $this->form_validation->set_rules('phone', 'Product Quantity', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Added FAILED!</div>');

            redirect('toko');
        } else {

            $nama_toko = htmlspecialchars($this->input->post('nama_toko'));
            $description = $this->input->post('description');
            $alamat_toko = $this->input->post('alamat_toko');
            $phone = $this->input->post('phone');

            $dataToko = [
                'nama_toko' => $nama_toko,
                'description' => htmlspecialchars(strip_tags($description)),
                'alamat_toko' => $alamat_toko,
                'phone' => $phone,
                'role_id' => $this->session->userdata('role_id')
            ];
            // var_dump($dataToko);
            // die();

            if (!empty($_FILES['profile']['name'])) {
                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = 5096;
                $config['max_width']     = 5000;
                $config['max_height']    = 5000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('profile')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', $error);
                    redirect('toko');
                } else {
                    $post_image = $this->upload->data();

                    // Generate new file name with current date
                    $new_file_name = date('YmdHis') . '_' . date('Y') . '_' . date('D') . '_' . $this->session->userdata('role_id') . '.' . pathinfo($post_image['file_name'], PATHINFO_EXTENSION);

                    // Rename the uploaded file
                    rename($post_image['full_path'], $post_image['file_path'] . $new_file_name);

                    $dataToko['profile'] = $new_file_name;
                }
            }


            $this->Toko_model->createdStore($dataToko);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Added Succes!</div>');

            redirect('toko');
        }
    }
}
