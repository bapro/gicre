<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_filter extends CI_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('product_filter_model');
  $this->load->library('header_user');
 }

 function index()
 {
	 $this->header_user->headerAdmin(1);
	 $fecha = date('Y-m-d');
  $data['brand_data'] = $this->product_filter_model->fetch_filter_type($fecha);
  $this->load->view('product_filter', $data);
 }

 function fetch_data()
 {
  sleep(1);
  $brand = $this->input->post('brand');
  $this->load->library('pagination');
  $config = array();
  $config['base_url'] = '#';
  $config['total_rows'] = $this->product_filter_model->count_all($brand);
  $config['per_page'] = 6;
  $config['uri_segment'] = 3;
  $config['use_page_numbers'] = TRUE;
  $config['full_tag_open'] = '<ul class="pagination">';        
    $config['full_tag_close'] = '</ul>';        
    $config['first_link'] = 'Primero';        
    $config['last_link'] = 'Ultimo';        
    $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['first_tag_close'] = '</span></li>';        
    $config['prev_link'] = '&laquo';        
    $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['prev_tag_close'] = '</span></li>';        
    $config['next_link'] = '&raquo';        
    $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['next_tag_close'] = '</span></li>';        
    $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['last_tag_close'] = '</span></li>';        
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
    $config['cur_tag_close'] = '</a></li>';        
    $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['num_tag_close'] = '</span></li>';
  $config['num_links'] = 3;
  $this->pagination->initialize($config);
  $page = $this->uri->segment(3);
  $start = ($page - 1) * $config['per_page'];
  $output = array(
   'pagination_link'  => $this->pagination->create_links(),
   'product_list'   => $this->product_filter_model->fetch_data($config["per_page"], $start, $brand)
  );
  echo json_encode($output);
 }
  
}
?>