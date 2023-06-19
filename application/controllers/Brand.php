<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Brand_model');
    }

    public function index()
    {
        $data['title'] = "Brand Options";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['brand_list'] = $this->Brand_model->brandGetAll();

        $this->form_validation->set_rules('brand_name', 'Brand', 'required');
        $this->form_validation->set_rules('brand_description', 'Descriptions', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('admin/brand/index', $data);
            $this->load->view('layout/footer');
        } else {
            $published = $this->input->post('publication_status');

            $published = ($published == 1) ? true : false;

            $brandData = [
                'brand_name' => htmlspecialchars(strip_tags($this->input->post('brand_name'))),
                'brand_description' => htmlspecialchars(strip_tags($this->input->post('brand_description'))),
                'publication_status' => $published
            ];

            $this->Brand_model->createdBrand($brandData);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Added Succes!</div>');

            redirect('Brand');
        }
    }
    public function update()
    {
        // update
        $data['title'] = "Menu Managemen";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('brand_name', 'Brand', 'required');
        $this->form_validation->set_rules('brand_description', 'Descriptions', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">failed to updated!</div>');
            redirect('brand');
        } else {
            $id = $this->input->post('brand_id');
            $published = $this->input->post('publication_status');

            $published = ($published == 1) ? true : false;

            $brandData = [
                'brand_name' => htmlspecialchars(strip_tags($this->input->post('brand_name'))),
                'brand_description' => htmlspecialchars(strip_tags($this->input->post('brand_description'))),
                'publication_status' => $published
            ];

            $queryUpdate = $this->Brand_model->updatedBrand($id, $brandData);

            if (
                $queryUpdate > 0
            ) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Updated Success!</div>');

                redirect('brand');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">failed to add!</div>');
                redirect('brand');
            }
        }
    }
    public function delete($id)
    {
        // delected
        $data['title'] = "Menu Managemen";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->Brand_model->deletedBrand($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Succes!</div>');

        redirect('brand');
    }
}
