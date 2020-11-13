<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Estudios extends CI_Controller { 
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

    if($this->session->userdata('estudios_is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login');
}
}

 public function search_code1()
{
	$code=md5($this->input->get('code'));
	$this->session->set_userdata('codepat',$code);
	redirect("estudios/search_code");
}
 public function search_code()
{ 
$code=$this->session->userdata['codepat'];
$this->load->view('estudios/header');
$id_usr=$this->session->userdata['estudios_id'];
$data['id_usr']=$id_usr; 
$sql ="SELECT * FROM h_c_indicaciones_estudio WHERE encrypt_estudio='$code'";
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
$id_usr=$this->session->userdata['estudios_id'];	
$data['id_usr']=$id_usr;

$estudio_cat=$this->db->select('id_estudio')->where('id_user',$id_usr)->get('user_estudios')->row('id_estudio');

 $config = array();
        $config["base_url"] = base_url() . "estudios/despachadas";
        $sqlc ="SELECT * FROM h_c_indicaciones_estudio WHERE estudio_cat=$estudio_cat";
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
$data['query'] = $this->model_admin->getDespachadasEst($config["per_page"], $page, $estudio_cat);

$data['title']="<h3>Recetas Despachadas $tot </h3>";	
$this->load->view('estudios/index', $data);	
$this->load->view('farmacia/footer');
}



 public function index()
{
$this->load->view('estudios/header');	
$id_usr=$this->session->userdata['estudios_id'];
$data['id_usr']=$id_usr; 

$this->load->view('farmacia/footer');

}




public function despachar(){
	
$where = array(
'id_i_e' =>$this->input->post('id')
);
$data = array(
'despachada'=>1,
'despachada_por'=>$this->input->post('id_usr'),
'estudio_cat'=>$this->input->post('estudio_cat')
);
$this->db->where($where);
$this->db->update("h_c_indicaciones_estudio",$data);
}


 public function viewPatientDetail($id,$pat,$desp,$id_usr){
$data['id_estudio']=$this->db->select('id_estudio')->where('id_user',$id_usr)->get('user_estudios')->row('id_estudio'); 
 $paciente=$this->db->select('photo,ced1,ced2,ced3,provincia,municipio,nombre,tel_resi,tel_cel,email,afiliado,cedula,nacionalidad,date_nacer,seguro_medico,afiliado,plan,calle')->where('id_p_a',$pat)
 ->get('patients_appointments')->row_array(); 
 
  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';	
}
else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';		

}
 
$data['display']="<td style='width:40px'>$imgpat</td>";	 

//--------------------------------------------------------------------------------------------------------------------
$data['nombre']=$paciente['nombre'];
 $data['provincia']=$this->db->select('title')->where('id',$paciente['provincia'])
 ->get('provinces')->row('title');


$data['municipio']=$this->db->select('title_town')->where('id_town',$paciente['municipio'])
 ->get('townships')->row('title_town');

$data['afiliado']=$paciente['afiliado'];
$seguron=$this->db->select('title,logo')->where('id_sm',$paciente['seguro_medico'])->get('seguro_medico')->row_array();

$data['paciente']=$paciente;

if($seguron['logo']==""){
$data['logoseg']="<span style='font-size:12px'><strong>Seguro Medico</strong> Privado</span>";
}
else{
$data['logoseg']='<img  style="width:50px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguron['logo'].'"  />';
}
$nss=$this->db->select('input_name,inputf')->where('patient_id',$pat)
 ->get('saveinput')->row_array();
 $data['inputf']=$nss['inputf'];
 $data['input_name']=$nss['inputf'];
$data['plan']=$this->db->select('name')->where('id',$paciente['plan'])->get('seguro_plan')->row('name');
$data['id']=$id;
$data['pat']=$pat; 
$data['desp']=$desp;
$data['id_usr']=$id_usr;
$sql ="SELECT * FROM h_c_indicaciones_estudio WHERE id_i_e=$id";
$data['query']= $this->db->query($sql);
$this->load->view('estudios/data', $data);

}




}