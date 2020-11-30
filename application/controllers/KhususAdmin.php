<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KhususAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_galery');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function index()
    {
        $this->load->view('upload_galery');
    }

    public function insertGalery()
    {
        $title = $this->input->post('title');
        $desc = $this->input->post('desc');
        $image = $this->do_upload();

        $this->M_galery->insertGalery($image, $title, $desc);
        redirect('Welcome/galery');
    }

    function do_upload()
    {
        $url = "../images";
        $image = basename($_FILES['image']['name']);
        $image = str_replace(' ', '|', $image);
        $type = explode(".", $image);
        $type = $type[count($type) - 1];
        if (in_array($type, array('jpg','jpeg','png','gif', 'JPG','JPEG','PNG','GIF'))) {
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
