<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KhususAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_galery');
        $this->load->model('M_loker');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function index()
    {
        echo '<a href="'. base_url('index.php/KhususAdmin/galery').'"><h2>upload galery</h2></a><br>';
        echo '<a href="'. base_url('index.php/KhususAdmin/loker').'"><h2>upload loker</h2></a>';
    }

    public function galery()
    {
        $this->load->view('upload_galery');
    }

    public function loker()
    {
        $this->load->view('upload_loker');
    }

    public function insertGalery()
    {
        $title = $this->input->post('title');
        $desc = $this->input->post('desc');
        $image = $this->do_upload();

        $this->M_galery->insertGalery($image, $title, $desc);
        redirect('Welcome/galery');
    }

    public function insertLoker()
    {
        $title = $this->input->post('title');
        $desc = $this->input->post('desc');
        $image = $this->do_upload();

        $this->M_loker->insertLoker($image, $title, $desc);
        redirect('Welcome/loker');
    }

    function do_upload()
    {
        $url = "../images";
        $image = basename($_FILES['image']['name']);
        $image = str_replace(' ', '|', $image);
        $type = explode(".", $image);
        $type = $type[count($type) - 1];
        if (in_array($type, array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'))) {
            $tmppath = "images/" . uniqid(rand()) . "." . $type;
            if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                move_uploaded_file($_FILES['image']['tmp_name'], $tmppath);
                return $tmppath;
            }
        } else {
            $tmppath = "";
            return $tmppath;
        }
    }
}
