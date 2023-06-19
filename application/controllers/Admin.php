<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
    }
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('layout/header');
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('admin/index', $data);
        $this->load->view('layout/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('admin/options/role', $data);
            $this->load->view('layout/footer');
        } else {
            $this->db->insert('user_role', ['role' => htmlspecialchars($this->input->post('role'))]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Added Succes!</div>');

            redirect('Admin/role');
        }
    }

    public function edit($id)
    {
        $data['role'] = $this->Admin_model->roleGetById($id);
    }

    public function update_role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('admin/role', $data);
            $this->load->view('layout/footer');
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Gagal memperbarui!</div>');
            redirect('Admin/role');
        } else {

            $id = $this->input->post('id', true);
            $role = $this->input->post('role', true);
            $query = $this->db->update('user_role', ['role' => $role], ['id' => $id]);


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembaruan Berhasil!</div>');

            redirect('Admin/role');
        }
    }
}
