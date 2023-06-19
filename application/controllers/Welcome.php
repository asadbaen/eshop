<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('Web_model');
		$this->load->model('Category_model');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function index()
	{
		$data['all_product'] = $this->Web_model->getAllProducts();
		$data['categories'] = $this->Category_model->getAllCategories();

		$this->load->view('themes/_partials/header');
		$this->load->view('themes/_partials/navbar', $data);
		$this->load->view('themes/home', $data);
		$this->load->view('themes/_partials/footer');
	}

	public function search()
	{

		$search = $this->input->get('search');

		if (!empty($search)) {
			$data                    = array();
			$data['get_all_product'] = $this->Web_model->get_all_search_product($search);
			$data['search']          = $search;

			if ($data['get_all_product']) {

				$this->load->view('themes/_partials/header');
				$this->load->view('themes/_partials/navbar', $data);
				$this->load->view('themes/home', $data);
				$this->load->view('themes/_partials/footer');
			} else {
				redirect('error');
			}
		} else {
			redirect('error');
		}
	}

	public function detail($id)
	{
		$data['detail_product'] = $this->Web_model->getById($id);
		$this->load->view('themes/_partials/header');
		$this->load->view('themes/_partials/navbar', $data);
		$this->load->view('themes/detail', $data);
		$this->load->view('themes/_partials/footer');
	}
	public function cart()
	{
		$data['cart_contents'] = $this->cart->contents();
		$this->load->view('themes/_partials/header');
		$this->load->view('themes/_partials/navbar', $data);
		$this->load->view('themes/cart', $data);
		$this->load->view('themes/_partials/footer');
	}

	public function save_card_order()
	{

		$product_id = $this->input->post('product_id');
		$results    = $this->Web_model->productById($product_id);

		$data['id']      = $results->product_id;
		$data['name']    = $results->product_title;
		$data['price']   = $results->product_price;
		$data['qty']     = $this->input->post('qty');
		$data['options'] = array('product_image' => $results->product_image);

		$this->cart->insert($data);
		redirect('welcome/cart');
	}

	public function tentang()
	{
		$this->load->view('themes/_partials/header');
		$this->load->view('themes/_partials/navbar');
		$this->load->view('themes/tentang');
		$this->load->view('themes/_partials/footer');
	}
}
