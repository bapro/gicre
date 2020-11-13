<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Serversidetable1 extends CI_Controller{

    function  __construct(){
        parent::__construct();
 $this->load->library("pagination");
        // Load serversidetable model
        $this->load->model('serversidetable');
    }

    function index(){
      $config = array();
      $config["base_url"] = base_url() . "admin";
      $config["total_rows"] = $this->serversidetable->get_count();
      $config["per_page"] = 10;
      $config["uri_segment"] = 2;

      $this->pagination->initialize($config);

      $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

      $data["links"] = $this->pagination->create_links();

      $data['authors'] = $this->serversidetable->get_authors($config["per_page"], $page);
        $this->load->view('serversidetable',$data);
    }



}
