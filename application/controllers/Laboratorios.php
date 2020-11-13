<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laboratorios extends CI_Controller { 
public function __construct()
{
parent::__construct();
$this->load->model('navigation/account_demand_model');
$this->load->model('user');
$this->load->model('model_admin');
$this->padron_database = $this->load->database('padron',TRUE);
$this->load->model("cipaginationmodel");
$this->load->model("padron_model");
$this->load->library('Ajax_pagination');
$this->perPage = 3;
$this->load->library("pagination");
$this->load->model('excel_import_model');

  /*session checks */ 

    if($this->session->userdata('laboratorios_is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login');
}
}

 public function search_code1()
{
	$code=md5($this->input->get('code'));
	$this->session->set_userdata('codepat',$code);
	redirect("laboratorios/search_code");
}
 public function search_code()
{ 
$code=$this->session->userdata['codepat'];
$this->load->view('laboratorios/header');
$id_usr=$this->session->userdata['estudios_id'];
$data['id_usr']=$id_usr; 
$sql ="SELECT id_i_m, historial_id,branch,despachada FROM h_c_indicaciones_medicales WHERE encrypt_recetas='$code'";
$query= $this->db->query($sql);
if($query->num_rows() >0){
	$data['title']='<div class="alert alert-success">
  <strong>EXITO!</strong> Codigo Encontrado
</div>';
}else{
$data['title']='<div class="alert alert-danger">
  <strong>INCORRECTO!</strong> Codigo No Encontrado
</div>';	
}
$data['query']=$query->result();
$data['links']='';
$this->load->view('estudios/index', $data);
$this->load->view('farmacia/footer');
}

public function despachadas(){
$this->load->view('estudios/header');
$id_usr=$this->session->userdata['farmacia_id'];	
$data['id_usr']=$id_usr;
$id_farma=$this->db->select('id_farmacia')->where('id_user',$id_usr)->get('user_farmacia')->row('id_farmacia');

 $config = array();
        $config["base_url"] = base_url() . "estudios/despachadas";
        $sqlc ="SELECT id_i_m, historial_id,branch,despachada FROM h_c_indicaciones_medicales WHERE farma=$id_farma";
$queryc=$this->db->query($sqlc);

$config["total_rows"] = $queryc->num_rows();
$tot = $queryc->num_rows();
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

  
//------------------------------------------------------------------------------------------------------------------------------------
$data['query'] = $this->model_admin->getRecetaForFarmacia($config["per_page"], $page, $id_farma);

$data['title']="<h3>Recetas Despachadas $tot </h3>";	
$this->load->view('laboratorios/index', $data);	
$this->load->view('farmacia/footer');
}



 public function index()
{
$this->load->view('laboratorios/header');	
$id_usr=$this->session->userdata['laboratorios_id'];
$data['id_usr']=$id_usr; 

$this->load->view('farmacia/footer');

}




public function despachar(){
	
$where = array(
'id_i_m' =>$this->input->post('idfa')
);
$data = array(
'despachada'=>1,
'farma'=>$this->input->post('id_farma')
);
$this->db->where($where);
$this->db->update("h_c_indicaciones_medicales",$data);
}







}