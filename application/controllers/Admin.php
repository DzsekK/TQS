<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auto extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('felhasznalo_model');
        $this->load->model('admin_model');

	}

    public function index()
	{
	}

    

}