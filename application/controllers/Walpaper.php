<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Walpaper extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Walpaper_model');
    }
}
