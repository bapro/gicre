<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TestSpeed extends CI_Controller {
public function __construct()
{
parent::__construct();

$this->load->model('navigation/account_demand_model');
$this->load->model('model_admin');
$this->load->model('product');
 $this->load->library("pagination");

}

public function index()
{

$data['iduser']=1;
$data['perfil']='admin';
$data['name']='Baptiste Prophete';
$querycentro = $this->account_demand_model->getCentroMedico();
$data['centro_medico']=$querycentro;
$data['countc']=count($querycentro);
$appointments = $this->model_admin->getConfirmSolicitud();
$data['count']=count($appointments);
 $config = array();
 $config["base_url"] = base_url() . "testSpeed/index";

$config["total_rows"] = count($appointments);
$data["totalrows"] = count($appointments);
$totalrows = count($appointments);
$config['full_tag_open']    = "<ul class='pagination'>";
       $config['full_tag_close']   = "</ul>";
       $config['num_tag_open']     = '<li>';
       $config['num_tag_close']    = '</li>';
       $config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
       $config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
       $config['next_tag_open']    = "<li>";
       $config['next_tagl_close']  = "</li>";
       $config['prev_tag_open']    = "<li>";
       $config['prev_tagl_close']  = "</li>";
       $config['first_tag_open']   = "<li>";
       $config['first_tagl_close'] = "</li>";
       $config['last_tag_open']    = "<li>";
       $config['last_tagl_close']  = "</li>";
       $config['first_link'] = 'Primero';
       $config['last_link'] = 'Último';
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		
        $data["links"] = $this->pagination->create_links();

$data['appointments'] = $this->product->getConfirmSolicitudTestSpeed($config["per_page"], $page);
 

$qt=$this->db->select('id_patient')->where('filter_date',date("Y-m-d"))->get('rendez_vous');
$data['num_r']=$qt->num_rows();
$data['area_id']=0;
//$this->load->view('admin/header_admin',$data);
$data['controller']='admin';
$this->load->view('test_speed',$data);

}


}