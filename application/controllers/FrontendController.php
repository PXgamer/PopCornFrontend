<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontendController extends CI_Controller {
  
     public function index() {
         $this->load->view('templates/header');
         $this->load->view('main');
         $this->load->view('templates/footer');
    }

    public function details($id) {
        $this->load->view('templates/header');
        $this->load->view('movie_details', array('id'=>$id));
        $this->load->view('templates/footer');
    }

}