<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_galery');
		$this->load->model('M_loker');
		$this->load->helper('url');
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function galery()
	{
		$data['galeryData'] = $this->M_galery->getAllGalery();
		$this->load->view('galery', $data);
	}

	public function loker()
	{
		$data['lokerData'] = $this->M_loker->getAllLoker();
		$this->load->view('loker', $data);
	}

	public function about()
	{
		$this->load->view('about');
	}
}
