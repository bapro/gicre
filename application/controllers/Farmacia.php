<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Farmacia extends CI_Controller { 
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

    if($this->session->userdata('farmacia_is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login');
}
}

 public function search_code1()
{
	$code=md5($this->input->get('code'));
	$this->session->set_userdata('codepat',$code);
	redirect("farmacia/search_code");
}
 public function search_code()
{ 
$code=$this->session->userdata['codepat'];
$this->load->view('farmacia/header');
$id_usr=$this->session->userdata['farmacia_id'];
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
$this->load->view('farmacia/index', $data);
$this->load->view('farmacia/footer');
}

public function despachadas(){
$this->load->view('farmacia/header');
$id_usr=$this->session->userdata['farmacia_id'];	
$data['id_usr']=$id_usr;
$id_farma=$this->db->select('id_farmacia')->where('id_user',$id_usr)->get('user_farmacia')->row('id_farmacia');

 $config = array();
        $config["base_url"] = base_url() . "farmacia/despachadas";
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
$this->load->view('farmacia/index', $data);	
$this->load->view('farmacia/footer');
}



 public function index()
{
$this->load->view('farmacia/header');	
$id_usr=$this->session->userdata['farmacia_id'];
$data['id_usr']=$id_usr; 

$this->load->view('farmacia/footer');

}


	 public function drugstore()
	 { 
	 $id= $this->uri->segment(3);
	 $data['drugstore'] = $this->model_admin->Drugstore($id);
	 $query = $this->model_admin->drugStoreMedica($id);
	 $data['drugStoreMedica']=$query;
	 $data['count1']=count($query);
	$query2 = $this->model_admin->farmaPatient($id);
      $data['fm']=$query2;
	  $data['count2']=count($query2);
	  $this->load->view('farmacia/header', $data);
     $this->load->view('farmacia/view_drugstore', $data);
     }

	 public function load_drugstore_by_id()
	 { 
	 $id= $this->uri->segment(3);
	 $query = $this->model_admin->drugStoreMedica($id);
	 $data['drugStoreMedica']=$query;
	 $data['count1']=count($query);
	 $query2 = $this->model_admin->farmaPatient($id);
      $data['fm']=$query2;
	  $data['count2']=count($query2);
	$this->load->view('farmacia/load_drugstore_by_id', $data);
     } 
	 




 public function viewPatientDetail($id,$pat,$desp,$id_usr){
	 
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
$data['idf']=$id;
$data['pat']=$pat; 
$data['desp']=$desp;
$data['id_usr']=$id_usr;
$data['id_farma']=$this->db->select('id_farmacia')->where('id_user',$id_usr)->get('user_farmacia')->row('id_farmacia');
$sql ="SELECT * FROM h_c_indicaciones_medicales WHERE id_i_m=$id";
$data['query']= $this->db->query($sql);
$this->load->view('farmacia/recetas', $data);

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


 public function patient_medica()
	 { 
	 $id= $this->uri->segment(3);
	$query = $this->model_admin->patMedica($id);
	$data['info']=$query;
     $data['num']=count($query);
     $this->load->view('admin/drugstores/pop_up_medica', $data);
     }



	 public function newDrugstore()
{
	$data['id_user']=($this->session->userdata['farmacia_id']);
	$this->load->view('farmacia/header', $data);
	$this->load->view('farmacia/newDrugstore',$data);
}




 public function SaveFarmacia()
{

//-----------------------------------	

if(isset($_FILES["logo"]['name']))  
{	
$imgExt = strtolower(pathinfo($_FILES["logo"]['name'],PATHINFO_EXTENSION));
$extension = explode('.', $_FILES['logo']['name']);  
$logo = rand() . '.' . $extension[1];  
$destination = './assets/img/farmacias/' . $logo;		
move_uploaded_file($_FILES['logo']['tmp_name'], $destination); 

if($imgExt==""){
	$logo="";
}
}
$insert_date=date("Y-m-d H:i:s");
 $save = array(
'noma'=> $this->input->post('noma'),
'nomc'  => $this->input->post('nomc'),
'dire'=> $this->input->post('dir'),
'tel' => $this->input->post('tel'),
'web' => $this->input->post('web'), 
'email' => $this->input->post('email'),
'rnc' => $this->input->post('rnc'),
'san' => $this->input->post('san'),
'creation_date' => $insert_date,
'update_time' => $insert_date,
'operator' => $this->input->post('operator'),
'id_user' => $this->input->post('user_id'),
'logo' =>$logo
 );
$this->model_admin->saveFarmacia($save);
 $msg = "<div  style='text-align:center;font-size:20px;color:green' >La nueva farmacia se guarda con exito .</div>";
$this->session->set_flashdata('save_farmacia', $msg);
redirect($_SERVER['HTTP_REFERER']);
}



 public function SaveFarmaciaUp()
{
$id=$this->input->post('id');
$insert_date=date("Y-m-d H:i:s");
 $save = array(
'noma'=> $this->input->post('noma'),
'nomc'  => $this->input->post('nomc'),
'dire'=> $this->input->post('dir'),
'tel' => $this->input->post('tel'),
'web' => $this->input->post('web'), 
'email' => $this->input->post('email'),
'rnc' => $this->input->post('rnc'),
'san' => $this->input->post('san'),
'update_time' => $insert_date,
'operator' => $this->input->post('operator'),
'id_user' => $this->input->post('user_id'),
'logo' =>$logo
 );
$this->model_admin->saveFarmaciaUp($id,$save);
 $msg = "<div  style='text-align:center;font-size:20px;color:green' >Cambio hecho con exito .</div>";
$this->session->set_flashdata('save_farmacia', $msg);
redirect($_SERVER['HTTP_REFERER']);
}




}