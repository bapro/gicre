<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alcalde extends CI_Controller { 
public function __construct()
{
parent::__construct();
$this->load->model("alcade");
$this->load->model("padron_model");
$this->padron_database = $this->load->database('padron',TRUE);
 $this->load->library("pagination");
}


	public function index()
	{
	$this->load->view('alcade/header');
    $data['ced1']="";
	$data['ced2']="";
	$data['ced3']="";
	$this->load->view('alcade/busquador',$data);
	$this->load->view('alcade/footer');
	}	

	public function listCoordonador()
	{
	$this->load->view('alcade/header');
	 $config = array();
	 $count = $this->alcade->showCoordinadores();
 $config["base_url"] = base_url() . "alcalde/listCoordonador";

$config["total_rows"] = count($count);

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

$data['memData'] = $this->alcade->getCoordinadores($config["per_page"], $page);
	$this->load->view('alcade/listCoordonador', $data);
	
	}
	
	
  
  
  
	
		public function printListCoordonador()
	{

	$this->load->view('alcade/printListCoordonador',$data);
	
	}
	
	
	
	public function member($cedula)
	{
	$this->load->view('alcade/header');
	//$cedula=$this->session->userdata['new_cedula'];
	$ced1 = substr($cedula, 0, 3);
	$ced2 = substr($cedula, 3, 7);
	$ced3 = substr($cedula, -1);
    $data['ced1']=$ced1;
	$data['ced2']=$ced2;
	$data['ced3']=$ced3;
	$this->load->view('alcade/busquador',$data);
	$this->load->view('alcade/footer');
	}
	




	public function savesupervisor()
	{
	$save = array(
	'nombres'=>$this->input->post('nombre'),
	'photo'=>$this->input->post('photo'),
	'cedula'=>$this->input->post('cedula'),
	'direccion'=>$this->input->post('direccion'),
	'telefono'=>$this->input->post('telefono'),
	'mesa'=>$this->input->post('mesa'),
	'sector'=>$this->input->post('sector'),
	'recinto'=>$this->input->post('recinto')
	);
	
	$this->db->insert("soto_supervisor",$save);
	  $insert_id = $this->db->insert_id();
	  
	$sa = array(
	'id_member'=>$insert_id,
	'member'=>'super',
	'cedula'=>$this->input->post('cedula')
	);
	  
	 $this->db->insert("soto_alcalde_cedula",$sa);
	  $msg = "<div class='alert alert-success' > <span style='color:green'>Supervisor esta creado con éxito.</div>";
   $this->session->set_flashdata('success_msg', $msg);
	 
	$cedula=$this->input->post('cedula');
	//$this->session->set_userdata('new_cedula',$cedula);
	redirect("alcalde/member/$cedula");
	}
	
	
    public function savecoordinador()
	{
	$save = array(
	'nombres'=>$this->input->post('nombre'),
	'photo'=>$this->input->post('photo'),
	'cedula'=>$this->input->post('cedula'),
	'direccion'=>$this->input->post('direccion'),
	'mesa'=>$this->input->post('mesa'),
	'sector'=>$this->input->post('sector'),
	'telefono'=>$this->input->post('telefono'),
	'recinto'=>$this->input->post('recinto')
	);
	$this->db->insert("soto_coordinador",$save);
	$id_coord=$this->db->insert_id() ;
	 //--insert link-------------
	$sa = array(
	'id_member'=>$id_coord,
	'member'=>'coor',
	'cedula'=>$this->input->post('cedula')
	);
	 $this->db->insert("soto_alcalde_cedula",$sa);
	 $msg = "<div class='alert alert-success' > <span style='color:green'>Coodinador esta creado con éxito.</div>";
   $this->session->set_flashdata('success_msg', $msg);
    $cedula=$this->input->post('cedula');
	//$this->session->set_userdata('new_cedula',$cedula);
	redirect("alcalde/member/$cedula");
	}



	public function supervisor()
	{
	$this->load->view('alcade/header');
	$insert_id_sup=$this->session->userdata['insert_id_sup'];
	$supervisor=$this->db->select('id,nombres,photo,cedula,coodinador')->where('id',$insert_id_sup)->get('soto_supervisor')->row_array();
    $data['supervisor']=$supervisor;
	$data['who']="COORDINATOR";
	$data['id_supervisor']=$supervisor['id'];
	$data['table']="savecoordinador";
	$data['coodhide']="";
	$data['superhide']="none";
	$data['munihide']="none";
		$data['checkedmuni']="";
	 $data['checkedsuper']="";
	$data['checkedcood']="checked";
	$this->load->view('alcade/supervisor',$data);
	$this->load->view('alcade/footer');
	}



	public function municipe($id_muni)
	{
	$this->load->view('alcade/header');
	/*$id_muni=$this->db->select('id_muni')->where('id_supm',$id_muni)->get('muni_super')->row('id_muni');*/
	$data['id_muni']=$id_muni;
	$municipe=$this->db->select('id,nombres,photo,cedula')->where('id',$id_muni)->get('soto_municipe')->row_array();
    $data['municipe']=$municipe;
	$data['who']="SUPERVISOR";
	$data['id_supervisor']=$id_muni;
	$data['coodhide']="none";
	$data['superhide']="";
	$data['munihide']="none";
	$data['checkedmuni']="";
	 $data['checkedsuper']="checked";
	$data['checkedcood']="";
	$this->session->set_userdata('id_sup',$id_muni);
	$data['table']="savesupervisor";
	$this->load->view('alcade/municipe',$data);
	$this->load->view('alcade/footer');
	}


	public function savemunicipe()
	{
	$save = array(
	'nombres'=>$this->input->post('nombre'),
	'photo'=>$this->input->post('photo'),
	'cedula'=>$this->input->post('cedula'),
	'direccion'=>$this->input->post('direccion'),
	'mesa'=>$this->input->post('mesa'),
	'telefono'=>$this->input->post('telefono'),
	'sector'=>$this->input->post('sector'),
	'recinto'=>$this->input->post('recinto')
	);
	$this->db->insert("soto_municipe",$save);
	$id_muni=$this->db->insert_id() ;
	 //--insert link-------------
	 
	$sa = array(
	'id_member'=>$id_muni,
	'member'=>'muni',
	'cedula'=>$this->input->post('cedula')
	);
	 $this->db->insert("soto_alcalde_cedula",$sa);
	 	 $msg = "<div class='alert alert-success' > <span style='color:green'>Municipe esta creado con éxito.</div>";
   $this->session->set_flashdata('success_msg', $msg);
	 $cedula=$this->input->post('cedula');
	//$this->session->set_userdata('new_cedula',$cedula);
	redirect("alcalde/member/$cedula");
	}

public function get_patient_cedula()
{
$executionStartTime = microtime(true);
$data['memberoption']=$this->input->get('memberoption');
$cedula1 = $this->input->get('patient_cedula1');
$cedula2 = $this->input->get('patient_cedula2');
$cedula3 = $this->input->get('patient_cedula3');
$cedula="$cedula1$cedula2$cedula3"; 
$sql ="SELECT member,id_member FROM soto_alcalde_cedula WHERE cedula='$cedula'";
$querysearch = $this->db->query($sql);
$count=$querysearch->num_rows();
//----------------------------------------------------------------------
$value = array(
  'MUN_CED' => $this->input->get('patient_cedula1'),
  'SEQ_CED' => $this->input->get('patient_cedula2'),
  'VER_CED' => $this->input->get('patient_cedula3')
  );	 
$query_padron = $this->padron_model->getPatientCedulaPad($value);
$photo=$this->padron_model->getPhoto($value);
$found=count($query_padron);
//-----------------------------------------------------------------------

 if ($count != 0)
 {	 
$row = $querysearch->row();
$data['id_member']=$row->id_member;
if($row->member=='supe'){
$tablemember='soto_supervisor';
$member="SUPERVISOR";
$view="alcalde_supervisor";
}else if($row->member=='coor'){
$tablemember='soto_coordinador';
$member="COORDINADOR";
$view="alcalde_coordinador";	
}else{
$tablemember='soto_municipe';
$member="MUNICIPE";	
$view="alcalde_municipe";	
}
$data['cedula']=$cedula;
$sql ="SELECT * FROM $tablemember WHERE cedula='$cedula'";
$data['tablemember']=$tablemember;
$querysearchtable = $this->db->query($sql);	
$data['member']=$member;	
$data['search']=$querysearchtable;
$data['count']=$count;
$executionEndTime = microtime(true);
$now = $executionEndTime - $executionStartTime;
$data['now'] =number_format($now,3);

$this->load->view("alcade/$view", $data);
 }
 
 
 else if ($found != 0)
 {
$data['count']=$found;	 
$data['query_padron']=$query_padron;
$data['photo']=$photo;

$executionEndTime = microtime(true);
$now = $executionEndTime - $executionStartTime;
$data['now'] =number_format($now,3);

$this->load->view('alcade/padron-result', $data);
 
 }
else{
$data['cedula']=$cedula;
$this->load->view('alcade/create_member', $data);
}

}


public function municipe_data()
{
$data['mun_id'] = $this->input->get('mun_id');
$this->load->view('alcade/municipe_data',$data);
}


public function asociate_supervisor_muncipe()
{
$id_muni= $this->input->get('id_muni');
$id_sup= $this->input->get('id_sup');
//--------update supervisor---------
$where = array(
'id' =>$id_muni
);
$Data = array(
'supervisor'  =>$id_sup);
$this->db->where($where);
$this->db->update("soto_municipe",$Data);

$this->load->view('alcade/asociate_member_data',$data);
}



public function load_asociate_supervisor_muncipe(){
$id_sup= $this->input->get('id_sup');
$sql ="SELECT * FROM soto_municipe  WHERE supervisor=$id_sup";
$data['querym'] = $this->db->query($sql);
$data['unique']=2;
$this->load->view('alcade/asociate_member_data',$data);
}


public function asociate_muncipe_sup_data()
{
$id_muni= $this->input->get('id_muni');
$id_sup= $this->input->get('id_sup');

//--------update supervisor---------
$where = array(
'id' =>$id_sup
);
$Data = array(
'id_municipe'  =>$id_muni);
$this->db->where($where);
$this->db->update("soto_supervisor",$Data);
//--update municipe--------------


$where = array(
'id' =>$id_muni
);
$Data = array(
'supervisor'  =>$id_sup);
$this->db->where($where);
$this->db->update("soto_municipe",$Data);




}



public function load_asociate_muni_super2(){
$id_muni= $this->input->get('id_muni');
$supervisor=$this->db->select('supervisor')->where('id',$id_muni)->get('soto_municipe')->row('supervisor');
$sql ="SELECT * FROM soto_supervisor  WHERE id=$supervisor";
$data['tablemember'] ='soto_supervisor';
$data['querym'] = $this->db->query($sql);
$this->load->view('alcade/munici_super_data',$data);
}






public function load_asociate_member_data(){
$id_sup= $this->input->get('id_sup');
$sql ="SELECT * FROM soto_municipe  WHERE supervisor=$id_sup";
$data['querym'] = $this->db->query($sql);
$this->load->view('alcade/asociate_member_data',$data);
}



public function load_asociate_supervisor_coordinador(){
$id_sup= $this->input->get('id_sup');
$sql ="SELECT * FROM soto_coordinador  WHERE super_id=$id_sup";
$data['querym'] = $this->db->query($sql);
$data['unique']=2;
$this->load->view('alcade/asociate_member_data',$data);
}



public function load_asociate_supervisor(){
$super_id= $this->input->get('super_id');
$sql ="SELECT * FROM soto_supervisor  WHERE id=$super_id ";
$data['querym'] = $this->db->query($sql);
$data['unique'] = 1;
$this->load->view('alcade/asociate_member_data',$data);
}




public function asociate_supervisor_coordinador_data()
{
$id_coord= $this->input->get('id_coord');
$id_sup= $this->input->get('id_sup');
//--------update supervisor---------
$where = array(
'id' =>$id_coord
);
$Data = array(
'super_id'  =>$id_sup);
$this->db->where($where);
$this->db->update("soto_coordinador",$Data);

//--------update municipe---------
$wherem = array(
'id' =>$id_sup
);
$Datam = array(
'coord_id'  =>$id_coord);
$this->db->where($wherem);
$this->db->update("soto_supervisor",$Datam);


}


public function asociate_supervisor_data()
{
$id_coord= $this->input->get('id_coord');
$id_super= $this->input->get('id_super');

//--------update supervisor---------
$where = array(
'id' =>$id_super
);
$Data = array(
'coord_id'  =>$id_coord);
$this->db->where($where);
$this->db->update("soto_supervisor",$Data);



$sql ="SELECT * FROM soto_supervisor  WHERE coord_id=$id_coord";
$data['querym'] = $this->db->query($sql);
$this->load->view('alcade/asociate_member_data',$data);
}




public function load_asociate_supermuni(){
$id_municipe= $this->input->get('id_municipe');
$sql ="SELECT * FROM soto_supervisor  WHERE id_municipe=$id_municipe";
$data['tablemember'] ='soto_supervisor';
$data['querym'] = $this->db->query($sql);
$this->load->view('alcade/munici_super_data',$data);
}


public function load_asociate_muni_super(){
$id_super= $this->input->get('id_super');
$sql ="SELECT * FROM soto_municipe  WHERE supervisor=$id_super";
$data['tablemember'] ='soto_supervisor';
$data['querym'] = $this->db->query($sql);
$this->load->view('alcade/munici_super_data',$data);
}





public function ver_cood($super_id){
$sql ="SELECT * FROM soto_coordinador  WHERE super_id=$super_id";
$data['super_id']=$super_id;
$data['querym'] = $this->db->query($sql);
$this->load->view('alcade/asociate_supervisor_cood',$data);
}



public function edit_member(){
$id = $this->uri->segment(3);
$data['id']=$id;
$ced1 = $this->uri->segment(4);
$ced2 = $this->uri->segment(5);
$ced3 = $this->uri->segment(6);
$table = $this->uri->segment(7);
$data['table']=$table;
$sql ="SELECT * FROM $table  WHERE id=$id";
$data['search'] = $this->db->query($sql);
$this->load->view('alcade/edit_member',$data);
}




public function PatientName()
{
$executionStartTime = microtime(true);
$patient_nombres = $this->input->get('patient_nombres');
$patient_apellido = $this->input->get('patient_apellido');
$patient_apellido2 = $this->input->get('patient_apellido2');

$nombres="$patient_nombres $patient_apellido $patient_apellido2"; 
$sql ="SELECT member,id_member FROM soto_alcalde_cedula WHERE nombres='$nombres'";
$querysearch = $this->db->query($sql);
$count=$querysearch->num_rows();

$data['memberoption']=$this->input->get('memberoption');


$val = array(
  'patient_nombres'=>$this->input->get('patient_nombres'),
  'patient_apellido'=>$this->input->get('patient_apellido'),
  'patient_apellido2'=>$this->input->get('patient_apellido2')
  );
  $query_padron = $this->padron_model->getPatientNameOnSelectPad($val);


 if ($query_padron != null)
 {	 
$data['number_found']=count($query_padron);	 
$data['patient_padron']=$query_padron;


$executionEndTime = microtime(true);
$now = $executionEndTime - $executionStartTime;
$data['now'] =number_format($now,3);

$this->load->view('alcade/padron-result-name', $data);
 }



}





public function redirect_member_found()
{
	$this->load->view('alcade/header');
	
$this->load->view('alcade/busquador');

	
$ced1 = $this->uri->segment(3);
  $ced2 = $this->uri->segment(4);
  $ced3 = $this->uri->segment(5);
  $data['memberoption']=$this->uri->segment(6);
  $cedula="$ced1$ced2$ced3";
 $memberval=$this->db->select('id_member,member')->where('cedula',$cedula)->get('soto_alcalde_cedula')->row_array();
 if ($memberval['id_member'] > 0){
	   
$data['id_member']=$memberval['id_member'];
if($memberval['member']=='supe'){
$tablemember='soto_supervisor';
$member="SUPERVISOR";
$view="alcalde_supervisor";
}else if($row->member=='coor'){
$tablemember='soto_coordinador';
$member="COORDINADOR";
$view="alcalde_coordinador";	
}else{
$tablemember='soto_municipe';
$member="MUNICIPE";	
$view="alcalde_municipe";	
}
$data['cedula']='';
$sql ="SELECT * FROM $tablemember WHERE cedula='$cedula'";
$data['tablemember']=$tablemember;
$querysearchtable = $this->db->query($sql);	
$data['member']=$member;	
$data['search']=$querysearchtable;
//$data['count']=$count;

$data['now'] ='';

$this->load->view("alcade/$view", $data);   
	   
	   
	   
	   

}

	$this->load->view('alcade/footer');	
/*	else{
			
$val = array(
  'MUN_CED' => $this->uri->segment(3),
  'SEQ_CED' => $this->uri->segment(4),
  'VER_CED' => $this->uri->segment(5)
  );
$data['photo']=$this->padron_model->getPhoto($val);
$patient = $this->padron_model->getPatientCedulaPad($val);
$data['patient']=$patient;
$last_patient_id=$this->db->select('id_p_a')->order_by('id_p_a','desc')->limit(1)->get('patients_appointments')->row('id_p_a');
$lidp=$last_patient_id + 1;
$data['patid']=$lidp;
$ctutor=$this->model_admin->CountTutor($lidp);
$data['ctutor']=$ctutor;
$data['tutor']=$this->model_admin->getTutor($lidp);
$this->load->view('medico/pacientes-citas/patient-found-in-padron', $data);
 }*/

} 


public function save_edit_member()
{
$table= $this->input->post('table');

$where = array(
'id' =>$this->input->post('id')
);
$save = array(
'nombres'=>$this->input->post('nombres'),
'cedula'=>$this->input->post('cedula'),
'direccion'=>$this->input->post('direccion'),
'mesa'=>$this->input->post('mesa'),
'sector'=>$this->input->post('sector'),
'telefono'=>$this->input->post('telefono'),
'recinto'=>$this->input->post('recinto')
);                                                      

$this->db->where($where);
$this->db->update("$table",$save);
$cedula=$this->input->post('cedula');
//$this->session->set_userdata('new_cedula',$cedula);
redirect("alcalde/member/$cedula");
}



public function member_selected($cedula)
{

//$this->session->set_userdata('new_cedula',$cedula);
redirect("alcalde/member/$cedula");
}




}
