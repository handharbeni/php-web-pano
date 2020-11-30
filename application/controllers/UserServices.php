<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserServices extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_galery');
        $this->load->helper('url');
        $this->load->helper('form');
        header('Access-Control-Allow-Origin: *');
    }

    public function index()
    {
        $this->load->view('upload_galery');
    }

    public function getAllCommentOnGalery($ID)
    {
        $data = $this->M_galery->getAllCommentGalery($ID);
        $responses['status'] = 1;
        $responses['data'] = $data;
        $responses['messages'] = "comment.dataFound";
        echo json_encode($responses);
    }

    public function insertCommentOnGalery()
    {
        $ID = $this->input->post('ID');
        $Name = $this->input->post('Name');
        $Value = $this->input->post('Value');

        if ($ID && $Name && $Value) {
            $this->M_galery->insertCommentGalery($ID, $Name, $Value);
            $responses['status'] = 1;
            $responses['data'] = [];
            $responses['messages'] = "comment.addSuccess";
            echo json_encode($responses);
        } else {
            $responses['status'] = 1;
            $responses['data'] = [];
            $responses['messages'] = "comment.wrongData";
            echo json_encode($responses);
        }
    }
}
