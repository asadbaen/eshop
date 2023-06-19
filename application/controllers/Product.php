<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Product_model');
        $this->load->model('Category_model');
        $this->load->model('Brand_model');
    }

    public function index()
    {
        $data['title'] = "Products Options";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();



        $data['products'] = $this->Product_model->productGetAll();
        $data['categories'] = $this->Category_model->getAllCategories();


        $this->load->view('layout/header');
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('admin/products/index', $data);
        $this->load->view('layout/footer');
    }

    public function create()
    {
        $data['title'] = "Products Options";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['products'] = $this->Product_model->productGetAll();
        $data['setCategory'] = $this->Category_model->getAllCategories();
        $data['setBrand'] = $this->Brand_model->brandGetAll();


        $this->load->view('layout/header');
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('admin/products/create', $data);
        $this->load->view('layout/footer');
    }

    public function saveCreated()
    {

        $data['title'] = "Products Options";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('product_title', 'Title', 'required|trim');
        $this->form_validation->set_rules('product_description', 'Description', 'required|trim');
        $this->form_validation->set_rules('product_price', 'Product Price', 'required|trim');
        $this->form_validation->set_rules('product_quantity', 'Product Quantity', 'required|trim');
        $this->form_validation->set_rules('product_category', 'Product Category', 'required|trim');
        $this->form_validation->set_rules('product_brand', 'Product Brand', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Added FAILED!</div>');

            redirect('product/create');
        } else {

            $title = htmlspecialchars($this->input->post('product_title'));
            $description = $this->input->post('product_description');
            $category = $this->input->post('product_category');
            $brand = $this->input->post('product_brand');
            $price = $this->input->post('product_price');
            $quantity = $this->input->post('product_quantity');
            $status = $this->input->post('publication_status');

            $status = ($status == 1) ? true : false;

            $productData = [
                'product_title' => $title,
                'product_description' => htmlspecialchars(strip_tags($description)),
                'product_category' => $category,
                'product_brand' => $brand,
                'product_price' => $price,
                'product_quantity' => $quantity,
                'publication_status' => $status,
                'product_author' => $this->session->userdata('role_id')
            ];

            if (!empty($_FILES['product_image']['name'])) {
                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = 4096;
                $config['max_width']     = 2000;
                $config['max_height']    = 2000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('product_image')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', $error);
                    redirect('product');
                } else {
                    $post_image = $this->upload->data();

                    // Generate new file name with current date
                    $new_file_name = date('YmdHis') . '_' . date('Y') . '_' . date('D') . '_' . $this->session->userdata('role_id') . '.' . pathinfo($post_image['file_name'], PATHINFO_EXTENSION);

                    // Rename the uploaded file
                    rename($post_image['full_path'], $post_image['file_path'] . $new_file_name);

                    $productData['product_image'] = $new_file_name;
                }
            }


            $this->Product_model->createdProduct($productData);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Added Succes!</div>');

            redirect('product');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Products Options";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['products'] = $this->Product_model->productGetById($id);
        $data['setCategory'] = $this->Category_model->getAllCategories();
        $data['setBrand'] = $this->Brand_model->brandGetAll();


        $this->load->view('layout/header');
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('admin/products/edit', $data);
        $this->load->view('layout/footer');
    }

    public function saveUpdated()
    {
        $data['title'] = "Products Options";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('product_title', 'Title', 'required|trim');
        $this->form_validation->set_rules('product_description', 'Description', 'required|trim');
        $this->form_validation->set_rules('product_price', 'Product Price', 'required|trim');
        $this->form_validation->set_rules('product_quantity', 'Product Quantity', 'required|trim');
        $this->form_validation->set_rules('product_category', 'Product Category', 'required|trim');
        $this->form_validation->set_rules('product_brand', 'Product Brand', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Update FAILED!</div>');
            redirect('product');
        } else {
            $id = $this->input->post('product_id');
            $title = htmlspecialchars($this->input->post('product_title'));
            $description = $this->input->post('product_description');
            $category = $this->input->post('product_category');
            $brand = $this->input->post('product_brand');
            $price = $this->input->post('product_price');
            $quantity = $this->input->post('product_quantity');
            $status = $this->input->post('publication_status');

            $status = ($status == 1) ? true : false;

            $productData = [
                'product_title' => $title,
                'product_description' => htmlspecialchars(strip_tags($description)),
                'product_category' => $category,
                'product_brand' => $brand,
                'product_price' => $price,
                'product_quantity' => $quantity,
                'publication_status' => $status,
                'product_author' => $this->session->userdata('role_id')
            ];

            $product_delete_image = $this->input->post('product_delete_image');
            $delete_image = substr($product_delete_image, strlen(base_url()));

            if (!empty($_FILES['product_image']['name'])) {
                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = 4096;
                $config['max_width']     = 2000;
                $config['max_height']    = 2000;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('product_image')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', $error);
                    redirect('product');
                } else {
                    // $post_image = $this->upload->data();
                    // $productData['product_image'] = $post_image['file_name'];
                    // unlink($delete_image);
                    $post_image = $this->upload->data();

                    // Generate new file name based on date, year, day, and role_id
                    $file_name = date('Ymd') . '_' . date('Y') . '_' . date('D') . '_' . $this->session->userdata('role_id') . '_' . $post_image['file_name'];

                    // Rename the uploaded file
                    rename($post_image['full_path'], $post_image['file_path'] . $file_name);

                    $productData['product_image'] = $file_name;

                    unlink($delete_image);
                }
            }

            $result = $this->Product_model->updatedProduct($id, $productData);

            if ($result) {
                $this->session->set_flashdata('message', 'Product Updated Successfully');
                redirect('product');
            } else {
                $this->session->set_flashdata('message', 'Product Update Failed');
                redirect('product');
            }
        }
    }
    public function delete($id)
    {
        $delete_image = $this->get_image_by_id($id);
        unlink('uploads/' . $delete_image->product_image);
        $result = $this->Product_model->deletedProduct($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Product Deleted Sucessfully');
            redirect('product');
        } else {
            $this->session->set_flashdata('message', 'Product Deleted Failed');
            redirect('product');
        }
    }
    private function get_image_by_id($id)
    {
        $this->db->select('product_image');
        $this->db->from('tbl_product');
        $this->db->where('tbl_product.product_id', $id);
        $info = $this->db->get();
        return $info->row();
    }
}
