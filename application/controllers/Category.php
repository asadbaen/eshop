<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Category_model');
    }

    public function index()
    {
        $data['title'] = "Category Options";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['category'] = $this->Category_model->getAllCategories();

        $this->form_validation->set_rules('category_name', 'Category', 'required|trim');
        $this->form_validation->set_rules('category_description', 'Description', 'required|trim');
        $this->form_validation->set_rules('published');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('admin/category/index.php', $data);
            $this->load->view('layout/footer');
        } else {

            $category = htmlspecialchars($this->input->post('category_name'));
            $description = htmlspecialchars($this->input->post('category_description'));

            $published = ($published == 1) ? true : false;


            $dataCategory = [
                'category_name' => $category,
                'category_description' => $description,
                'published' => $published
            ];

            $this->Category_model->createdCategory($dataCategory);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Added Succes!</div>');

            redirect('category');
        }
    }

    public function editCategory($id)
    {
        $data['title'] = "Category Options";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->Category_model->categoryGetById($id);
    }

    public function saveUpdate()
    {
        $data['title'] = "Category Options";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');
        $this->form_validation->set_rules('category_description', 'Category Description', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header');
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('admin/category/index', $data);
            $this->load->view('layout/footer');
        } else {

            $id = $this->input->post('id');
            $category = htmlspecialchars($this->input->post('category_name'));
            $description = htmlspecialchars($this->input->post('category_description'));
            $published = $this->input->post('published');

            $published = ($published == 1) ? true : false;


            $dataCategory = [
                'category_name' => $category,
                'category_description' => $description,
                'published' => $published
            ];

            $this->Category_model->updatedCategory($id, $dataCategory);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Updated Succes!</div>');

            redirect('category');
        }
    }

    public function delete($id)
    {
        $query = $this->Category_model->deleteById($id);

        if ($query > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted Failed!</div>');

            redirect('category');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted Success!</div>');

            redirect('category');
        }
    }
}
