<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index(){
		$this->load->view('head');
		$this->load->view('beranda_body');
		$this->load->view('end');
	}

	public function get_data(){
		echo json_encode($this->home_model->get_data());
	}
}
