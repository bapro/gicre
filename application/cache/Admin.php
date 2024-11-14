<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
public function __construct()
{
parent::__construct();
 $this->load->library('email');
 $this->load->helper('email');
$this->load->model('navigation/account_demand_model');
$this->load->model('user');
$this->load->model('model_admin');
$this->load->model("model_emergencia");
$this->load->model("product");
$this->load->model("padron_model");
//$this->load->library('Ajax_pagination');
$this->perPage = 3;
$this->load->model('excel_import_model');
$this->load->library('excel');
$this->load->library('user_agent');
   $this->load->model('login_model');
    $this->load->library("pagination");
	 $this->load->library('form_validation'); 
	  

  /*session checks */

    if($this->session->userdata('is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login');
}
}
 public  function searchChart()
        {
			$this->load->view('admin/chart/index');
		}


Public function mensagesUpdte(){
	$config['upload_path']="./assets/update";
	$config['allowed_types']='doc|docx|pdf';
	$config['encrypt_name'] = TRUE;

	$this->load->library('upload',$config);
	if($this->upload->do_upload("file")){
	$data = $this->upload->data();
	$doc= $data["file_name"];
	$sql = "SELECT id_user from users";
  $query= $this->db->query($sql);
	foreach ($query->result() as $row) {
	$save = array(
	'titulo'=>$this->input->post('titulo'),
	'userid'=>$row->id_user,
	'message'=>$doc,
	'video'=>$this->input->post('videol'),
	'timesent'=>date("Y-m-d H:i")
	);
	$this->db->insert("message_to_users",$save);

	}
	}
	}


	Public function mensagesToAllUsers(){
	$id_ur=$this->session->userdata['admin_id'];
	$type=$this->input->post('tipo');
	$area=$this->input->post('area');
	if($type=="Todo"){
		$where="WHERE id_user !=$id_ur";
	}
	 else if($type=="med-as"){
	$where="WHERE perfil LIKE '%Medico%'";
	}else if($type=="Medico" && $area !="" ){
	$where="WHERE area='$area' AND id_user !=$id_ur";
	} else
	{
	$where="WHERE perfil='$type'  AND id_user !=$id_ur";
	}
	$sql = "SELECT id_user from users $where";
    $query= $this->db->query($sql);
	foreach ($query->result() as $row) {
	$save = array(
	'message_from'=>$id_ur,
	'message_to'=>$row->id_user,
	'message'=>$this->input->post('content'),
	'stime'=>date("Y-m-d H:i")
	);
	$this->db->insert("chat_medico",$save);

	}
	}




 Public function chatBox()
{
$data['iduser']=$this->session->userdata['admin_id'];
$perfil=$this->session->userdata['admin_perfil'];
$name=$this->session->userdata['admin_name'];
$userInfo="$name $perfil";
$data['userInfo']=$userInfo;
$data['onlyadmin']="";
$this->load->view('chat/chatBox',$data);

}

public function chatWithBoxId()
{
$idChatWith=$this->input->post('idChatWith');
$this->session->set_userdata('idChatWith',$this->input->post('idChatWith'));
redirect('admin/chatWithBox');
}


public function redirectFromCorro($sender_id,$receive_id)
{
$this->session->set_userdata('admin_id',$sender_id);
$this->session->set_userdata('idChatWith',$receive_id);
redirect('admin/chatWithBox');
}





public function chatWithBox()
{
$id_user=$this->session->userdata['admin_id'];
$idChatWith=$this->session->userdata['idChatWith'];
//---------------------------------LOAD USERS----------------------------------------------------------
 $data['output']= '';
  $query = '';
$data['id_user']=$id_user;
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data['dataUsers'] = $this->model_admin->search_fetch_medico_chat($query,$id_user);
 $query= $this->db->get_where('chat_medico',array('message_to'=>$id_user));
$data['numMes']=$query->num_rows();

//----------------------------------LOAD CHAT DATA------------------------------------------------

$where2 = array(
  'message_from' =>$idChatWith,
  'message_to'   =>$id_user
);
$updateData2 = array(
'seen'  =>1);
$this->db->where($where2);
$this->db->update("chat_medico",$updateData2);
//--------------------------------------------------------------------------------------------------
$data['messageFromiD']=$id_user;
$data['messageToName']=$this->db->select('name')->where('id_user',$idChatWith)->get('users')->row('name');
$data['messageFromName']=$this->db->select('name')->where('id_user',$id_user)->get('users')->row('name');
$sql ="SELECT id, message,stime,message_from,message_to,seen  FROM  chat_medico
 WHERE
message_from=$id_user AND message_to=$idChatWith
OR
message_from=$idChatWith AND message_to=$id_user
 order by id asc";
$query= $this->db->query($sql);
$data['query']=$query;
$data['messageTo']=$idChatWith;
$data['messageFrom']=$id_user;
//--------------------------------------------------------------------------------------------------
 $query1 = $this->db->get_where('chat_is_user_typing',array('id_user'=>$id_user,'id_sender'=>$idChatWith));
	if($query1->num_rows() == 0 && $idChatWith !=0)
	{
$save = array(
'id_user'  =>$id_user,
'id_sender'  =>$idChatWith,
'is_typing'  =>"no"
);
$this->db->insert("chat_is_user_typing",$save);
	}

	$where2 = array(
  'message_from' =>$idChatWith,
  'message_to'   =>$id_user
);
$updateData2 = array(
'seen'  =>1);
$this->db->where($where2);
$this->db->update("chat_medico",$updateData2);

	$data['idChatWith']=$idChatWith;
$data['id_user']=$id_user;
$data['messageFromiD']=$id_user;
$data['messageTo']=$idChatWith;
$data['messageFrom']=$id_user;
$user=$this->db->select('name,perfil')->where('id_user',$idChatWith)->get('users')->row_array();
$name=$user['name'];$perfil=$user['perfil'];
$data['messageToName']="$name - $perfil";
$data['messageFromName']=$this->db->select('name')->where('id_user',$id_user)->get('users')->row('name');
$sql ="SELECT id, message,stime,message_from,message_to,seen  FROM  chat_medico
 WHERE
message_from=$id_user AND message_to=$idChatWith
OR
message_from=$idChatWith AND message_to=$id_user
 order by id asc";
$query= $this->db->query($sql);
$data['query']=$query;

$this->load->view('chat/chatHistorialData',$data);

}


public function newMessageReceived()
{
$data['iduser']=$this->session->userdata['admin_id'];
$data['perfil']=$this->session->userdata['admin_perfil'];
$message= $this->db->select('id')->where('message_to',$this->session->userdata['admin_id'])->where('seen',0)->get('chat_medico');
$data['result']=$message->num_rows();
$this->load->view('chat/medico/new-message-medico', $data);
}





 Public function index()
{
$iduser=$this->session->userdata['admin_id'];


$where = array(
'user' =>$iduser
);

$this->db->where($where);
$this->db->delete('detect_user_on_hist');


$data['iduser']=$iduser;
$data['perfil']=$this->session->userdata['admin_perfil'];
$data['name']=$this->session->userdata['admin_name'];

$logint=$this->db->select('user_id')->where('user_id',$iduser)->where('dateo',date("Y-m-d"))->get('user_login_twice');
$login=$logint->num_rows();

$last_time=$this->db->select('login_time')->where('user_id',$iduser)->where('dateo',date("Y-m-d"))->order_by('user_id','desc')->limit(1)->get('user_login_twice')->row('login_time');
$data['last_time']= date("d-m-Y H:i",strtotime($last_time));

$this->load->view('admin/header_admin',$data);
 if($login >1) {
$row=$this->db->select('id')->like('data',$iduser)->get('ci_sessions');

$data['found']=$row->num_rows();

/*if ($this->agent->is_browser())
{
        $agent = $this->agent->browser().' '.$this->agent->version();
}
elseif ($this->agent->is_robot())
{
        $agent = $this->agent->robot();
}
elseif ($this->agent->is_mobile())
{
        $agent = $this->agent->mobile();
}
else
{
        $agent = 'Unidentified User Agent';
}

$data['agent']=$agent;

$data['platform']=$this->agent->platform();
*/
$this->load->view('admin/users/login_twice',$data);
 } else {

$this->load->view('admin/index');
 }
}


 Public function user_in_danger()
{
 $codigo_securidad = md5($this->input->post('codigo_securidad'));
$row=$this->db->select('codigo_seguriad')->where('codigo_seguriad',$codigo_securidad)->get('users');
$found=$row->num_rows();
echo json_encode($found);

}



 Public function check_if_password_exist()
{
 $password = md5($this->input->post('password'));
$row=$this->db->select('password')->where('password',$password)->get('users');
$found=$row->num_rows();
echo json_encode($found);

}




 public function orden_medica()
{
$user_id= decrypt_url($this->uri->segment(3));$id_historial= decrypt_url($this->uri->segment(4));
if($user_id=="" || $id_historial=="" ){
redirect('/page404');
}
$data['user_id'] = $user_id;
$data['id_historial'] = $id_historial;

$data['title']="ORDEN MEDICA";
$this->padron_database = $this->load->database('padron',TRUE);
$paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$this->uri->segment(4))
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


$this->load->view('admin/historial-medical1/orden-medica/index',$data);
}



Public function user_in_danger2()
{
	$data['id_admin']=$this->session->userdata['admin_id'];
	$this->load->view('admin/users/user_in_danger',$data);
}






 Public function was_me()
{
	$this->model_admin->was_me($this->session->userdata['admin_id']);
 $this->load->view('admin/users/was_me');

}

	public function historial_medical()
	{
   $data['perfil']=$this->session->userdata['admin_perfil'];
   $queryHist = $this->db->get_where('h_c_sinopsis',array(
'historial_id'=>decrypt_url($this->uri->segment(3)),
'inserted_by'=> $this->session->userdata['admin_id'],
'filter_date'=>date('Y-m-d')
));
if($queryHist->num_rows() == 0){
$id_con_d= $this->db->select('id_cdia')
->where('historial_id',decrypt_url($this->uri->segment(3)))
->where('inserted_by',$this->session->userdata['admin_id'])
->where('current_day',date('Y-m-d'))
->order_by('id_cdia','desc')->get('h_c_conclusion_diagno')->row('id_cdia');
$wheres = array(
'id_cdia'=>$id_con_d
);
$this->db->where($wheres);
$this->db->delete('h_c_conclusion_diagno');

$where2 = array(
'con_id_link'=>$id_con_d
);
$this->db->where($where2);
$this->db->delete('h_c_diagno_def_link');
 }
   $this->load->view('admin/historial-medical1/view-historial-clinica',$data);

	}


		public function historial_medical_past()
	{
    $data['perfil']=$this->session->userdata['admin_perfil'];
	   $queryHist = $this->db->get_where('h_c_sinopsis',array(
'historial_id'=>decrypt_url($this->uri->segment(3)),
'inserted_by'=> $this->session->userdata['admin_id'],
'filter_date'=>date('Y-m-d')
));
	if($queryHist->num_rows() == 0){
$id_con_d= $this->db->select('id_cdia')
->where('historial_id',decrypt_url($this->uri->segment(3)))
->where('inserted_by',$this->session->userdata['admin_id'])
->where('current_day',date('Y-m-d'))
->order_by('id_cdia','desc')->get('h_c_conclusion_diagno')->row('id_cdia');
$wheres = array(
'id_cdia'=>$id_con_d
);
$this->db->where($wheres);
$this->db->delete('h_c_conclusion_diagno');

$where2 = array(
'con_id_link'=>$id_con_d
);
$this->db->where($where2);
$this->db->delete('h_c_diagno_def_link');
 }
   $this->load->view('admin/historial-medical1/view-historial-clinica-past',$data);

	}

	//--------------------------------------------------------------------

public function demand_form()
{
$save = array(
  'nombre'  => $this->input->post('nombre'),
  'apellido'=> $this->input->post('apellido'),
  'ubicacion' => $this->input->post('ubicacion'),
  'servicio' => $this->input->post('servicio'),
   'email' => $this->input->post('email'),
  'telefono'=> $this->input->post('telefono')
   );

$this->account_demand_model->saveDemande($save);
$data['message'] = 'Data Inserted Successfully';
$this->load->view('navigation/view_registration', $data);
}

//display peticiones de contrasenas
public function peticiones(){
$query = $this->account_demand_model->getDemands();
$data['EMPLOYEES'] = null;
$data['EMPLOYEES'] =  $query;
$this->load->view('admin/display_demands', $data);

}


public function patients_requests(){
$data['user_id']=$this->session->userdata['admin_id'];
$data['perfil']=$this->session->userdata['admin_perfil'];
$data['name']=$this->session->userdata['admin_name'];
$this->load->view('admin/header_admin',$data);
$admin_position_centro=$this->session->userdata['admin_position_centro'];
if($admin_position_centro){
  $where_centro = "&& centro = $admin_position_centro";
}else{
  $where_centro = "";
 
}
$sql ="SELECT id_patient, id_apoint, fecha_propuesta, nec FROM rendez_vous WHERE  confirmada=1 $where_centro  ORDER BY id_apoint DESC";
$query= $this->db->query($sql);
$data['query']=$query;
$this->load->view('admin/pacientes-citas/patients_requests', $data);

}


public function appointments()
{
$hoy=date("d-m-Y");
$where = array(
'user' =>$this->session->userdata['admin_id']
);

$this->db->where($where);
$this->db->delete('detect_user_on_hist');



$where = array(
'operator' =>$this->session->userdata['admin_id']
);
$update = array(
'printing'  =>0
);
$this->db->where($where);
$this->db->update("h_c_indications_labs",$update);


$where = array(
'operator' =>$this->session->userdata['admin_id']
);
$update = array(
'singular_id'  =>0
);
$this->db->where($where);
$this->db->update("h_c_indicaciones_medicales",$update);

$where1 = array(
'userid' =>$this->session->userdata['admin_id'],
'id_enfermedad' =>0
);

$this->db->where($where1);
$this->db->delete('saveEnfImage');

$admin_position_centro=$this->session->userdata['admin_position_centro'];

if($admin_position_centro){
  $where_centro = "&& centro = $admin_position_centro";
  $querycentro = $this->db->query("SELECT id_m_c, name FROM medical_centers WHERE id_m_c=$admin_position_centro");
  
  $sqlsss = "select id_patient FROM rendez_vous WHERE fecha_propuesta='$hoy' && centro=$admin_position_centro && cancelar=0 && confirmada=0";
 $querysss= $this->db->query($sqlsss);
  $totalrows =$querysss->num_rows();
  
  
}else{
  $where_centro = "";
  $querycentro = $this->db->query('SELECT id_m_c, name FROM medical_centers');
$appointments = $this->model_admin->getConfirmSolicitud();
$totalrows = count($appointments);

}


$data['iduser']=$this->session->userdata['admin_id'];
$data['perfil']=$this->session->userdata['admin_perfil'];
$data['name']=$this->session->userdata['admin_name'];

$query_results_centro = $querycentro->result() ;
$data['centro_medico']=$query_results_centro;
$data['countc']=count($query_results_centro);

$countTotalCitaDoc=$this->model_admin->countTotalCitaDoc($admin_position_centro);
$cnt_tot_cit_doc = count($countTotalCitaDoc);
$data['countTotalCitaDoc']=$countTotalCitaDoc;

$data['countTotalCitaDocNum']="$totalrows cita(s) por hoy de $cnt_tot_cit_doc medico(s)";
$data['displayTotInfo']='';
 $config = array();
 $config["base_url"] = base_url() . "admin/appointments";

$config["total_rows"] = $totalrows;

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

$data['appointments'] = $this->product->getConfirmSolicitudTestSpeed($config["per_page"], $page, $admin_position_centro);
$qt=$this->db->select('id_patient')->where('filter_date',date("Y-m-d"))->get('rendez_vous');
$data['num_r']=$qt->num_rows();
$data['area_id']=0;
$this->load->view('admin/header_admin',$data);
$data['controller']='admin';

$sql = "select id_patient FROM rendez_vous WHERE fecha_propuesta='$hoy' $where_centro && cancelar=0 ORDER BY id_patient DESC ";
 $query= $this->db->query($sql);
$data['patientHoyQ'] =$query->result();
$data['is_phone_update']="";
$this->load->view('medico/index',$data);

}


public function getConfirmSolicitudByDoc()
{
$iduser= $this->input->post('iduser');
$data['iduser']=$iduser;
$id_doc= $this->input->post('id_doc');
$data['perfil']='Admin';
$data['area_id']=0;
$data['controller']='admin';
$data['appointments'] = $this->model_admin->getConfirmSolicitudByDoc($id_doc);
$this->load->view('medico/refreshCitaHoy',$data);
}






public function SeachCitaResult()
{

	$where = array(
	'user' =>$this->session->userdata['admin_id']
	);

	$this->db->where($where);
	$this->db->delete('detect_user_on_hist');

    $querycentro = $this->account_demand_model->getCentroMedico();
	$data['centro_medico']=$querycentro;
	$data['countc']=count($querycentro);
   $data['perfil']= $this->session->userdata['admin_perfil'];
	$iduser=$this->session->userdata['admin_id'];
	$data['iduser'] =$iduser;
	$data['area_id'] =0;
	$date1=date("Y-m-d", strtotime($this->input->get('date_from')));
	$date2=date("Y-m-d", strtotime($this->input->get('date_to')));
	$datas = array(
   'date1' => $date1,
	'date2' => $date2,
	'centro' =>$this->input->get('centro')
	);
	$data['exam']=2;
	$query = $this->model_admin->get_centro_medico_datepicker($datas);
	$data['VER_CONFIRMADA_SOLICITUD'] =$query;
	$data['date1']=$this->input->get('date_from');
	$data['date2']=$this->input->get('date_to');
	$data['centro']=$this->input->get('centro');
	$this->load->view('admin/header_admin',$data);
	$this->load->view('admin/pacientes-citas/view_get_centro_medico', $data);
	 //echo json_encode ($query);
}








public function patients()
{
$iduser=($this->session->userdata['admin_id']);
	$data['perfil']=($this->session->userdata['admin_perfil']);
	$data['name']=($this->session->userdata['admin_name']);
	$data['id_user']=$iduser;
$this->load->view('admin/pacientes-citas/header_cita',$data);
$this->load->view('admin/pacientes-citas/search_patient',$data);
$this->load->view('admin/pacientes-citas/patients');
$this->load->view('admin/pacientes-citas/footer_patient_search');
$this->load->view('medico/pacientes-citas/cita-footer');
}





public function get_centro_medico()
{
	$iduser=$this->session->userdata['admin_id'];
	$data['id_usr'] =$iduser;
	$data['area_id'] =0;
	$centro_medico=$this->input->post('centro_medico');

	$data['exam']=1;

	$data['centro_name']=$this->db->select('name')->where('id_m_c',$centro_medico)->get('medical_centers')->row('name');
    $data['VER_CONFIRMADA_SOLICITUD'] = $this->model_admin->get_centro_medico($centro_medico);
	$this->load->view('admin/pacientes-citas/view_get_centro_medico', $data);
	 //echo json_encode ($query);
}

public function versionViewd($version)
{
$sqlv="SELECT name, id_user, perfil FROM users a WHERE a.id_user NOT IN (SELECT b.userid FROM message_to_users b  WHERE b.titulo='$version') ORDER BY perfil ASC";
$qviews = $this->db->query($sqlv);
echo '<div class="modal-header">';
echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
echo "<h4 class='modal-title'>Usuarios que han visto la actualización $version</h4>";
echo '</div>';
echo '<div class="modal-body" >';
echo"<ol>";
 foreach ($qviews->result() as $rowu){
echo "<li>$rowu->perfil $rowu->name</li>";

}
echo"</ol>";
echo '</div>';
}



public function ver_area()
{
	$id= $this->uri->segment(3);
	$data['VER_AREA'] = $this->model_admin->ver_area($id);
	$data['RESULT_DOCTOR'] = $this->model_admin->ver_area_doctor($id);
	$this->load->view('admin/medicos/doctor-area', $data);

}

public function Province()
{
	$id= $this->uri->segment(3);
	$data['PROVINCIA'] = $this->model_admin->view_provincia($id);
	$data['PROVINCIA_DIRECION'] = $this->model_admin->view_provincia_direcion($id);
	$data['CENTRO_MEDICO_PROVINCIA']= $this->model_admin->view_provincia_centro($id);
	$this->load->view('admin/view_provincia', $data);



}
public function Township()
{
	$id= $this->uri->segment(3);
	$data['MUNICIPIO'] = $this->model_admin->view_municipio($id);
	$data['MUNICIPIO_DIRECION'] = $this->model_admin->get_municipio_direcion($id);
	$data['CENTRO_MEDICO_MUNCIPIO']= $this->model_admin->view_muncipio_centro($id);
	$this->load->view('admin/view_municipio', $data);



}





public function create_cita()
{
$data['name']=$this->session->userdata['admin_id'];
$data['id_user']=$this->session->userdata['admin_id'];
$data['perfil']=$this->session->userdata['admin_perfil'];
$data['nec'] = $this->model_admin->getNec();
$data['countries'] = $this->model_admin->getCountries();
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();


$admin_position_centro=$this->session->userdata['admin_position_centro'];

if($admin_position_centro){
  $where_centro = "&& centro = $admin_position_centro";
  $querycentro = $this->db->query("SELECT id_m_c, name FROM medical_centers WHERE id_m_c=$admin_position_centro");
}else{
  $where_centro = "";
  $querycentro = $this->db->query('SELECT id_m_c, name FROM medical_centers');

}



$data['centro_medico'] = $querycentro->result();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['provinces']=$this->model_admin->getProvinces();
$data['causa']=$this->model_admin->getCausa();
$data['municipios'] = $this->model_admin->getTownships();
$last_patient_id=$this->db->select('id_p_a')->order_by('id_p_a','desc')->limit(1)->get('patients_appointments')->row('id_p_a');
$lidp=$last_patient_id + 1;
$data['patid']=$lidp;
$data['is_admin']="yes";
$ctutor=$this->model_admin->CountTutor($last_patient_id);
$data['ctutor']=$ctutor;
$data['tutor']=$this->model_admin->getTutor($last_patient_id);

//-----------EMERGENCIA----------------------------------

$sqlc = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=1";
$data['queryc']= $this->db->query($sqlc);


$sqlrp = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=2";
$data['queryrp']= $this->db->query($sqlrp);

$sqlml = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=3";
$data['queryml']= $this->db->query($sqlml);


$sqlep = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=4";
$data['queryep']= $this->db->query($sqlep);
$data['centro_type']='privado';
$this->load->view('admin/header_admin',$data);
$data['controllerUser']='admin';
$this->load->view('admin/pacientes-citas/search_patient',$data);
$this->load->view('medico/pacientes-citas/create-cita',$data);
$this->load->view('admin/pacientes-citas/footer_patient_search');
$this->load->view('medico/pacientes-citas/cita-footer');

}



public function create_cita_(){

 $rules = array(
 array(
                'field' => 'nombre',
                'label' => 'nombre',
                'rules' => 'required',
				
            ),
                 
            array(
                'field' => 'date_nacer',
                'label' => 'Fecha de nacimiento',
                'rules' => 'required'
            ),
			 array(
                'field' => 'seguro_medico', 
                'label' => 'seguro médico',
                'rules' => 'required'
            ),
			  array(
                'field' => 'tel_cel',
                'label' => 'Telefono celular',
                'rules' => 'required'
            ),
			  array(
                'field' => 'sexo',
                'label' => 'sexo',
                'rules' => 'required'
            ),
			  array(
                'field' => 'estado_civil',
                'label' => 'Estado civil',
                'rules' => 'required'
            ),
			  array(
                'field' => 'nacionalidad',
                'label' => 'Nacionalidad',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($rules);
		     $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>'); 
		if ($this->form_validation->run() == FALSE) {
			$msg='<h3 style="color:red">El formulario no se ha guadado, favor revisar :</h3>';
			$this->session->set_flashdata('error_messages', $msg);
      $this->create_cita();		
			
		} else{
			
$controller=$this->input->post('controller');
$query = $this->db->get_where('patients_appointments',array('nombre'=>$this->input->post('nombre'),'date_nacer'=>$this->input->post('date_nacer'),'tel_cel'=>$this->input->post('tel_cel')));
if($query->num_rows() > 0){
$data['controller']="admin";
$this->load->view('admin/pacientes-citas/duplicate_patient_padron', $data);
} else{					
			
if($this->input->post('seguro_medico')==11){
	$plan=0;
}else{
	if($this->input->post('plan')){
$plan=$this->input->post('plan');
	}else{
		$plan==0;
	}

}		
$photo_location = $this->input->post('photo_location');
$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');
$insert_date=date("Y-m-d H:i:s");
$filter_date=date("Y-m-d");	
			
	if($photo_location==2)
{
$imgExt = strtolower(pathinfo($_FILES["picture"]['name'],PATHINFO_EXTENSION));
$extension = explode('.', $_FILES['picture']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/img/patients-pictures/' . $logo;
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
} else {
$logo="";
}		
			

$save1 = array(
  'nombre'  => $this->input->post('nombre'),
  'apodo'=> $this->input->post('apodo'),
  'photo'  =>$logo,
  'cedula' => $this->input->post('cedula'),
  'date_nacer' => $this->input->post('date_nacer'),
    'date_nacer_format' => $this->input->post('date_nacer_format'),
   'edad' => $this->input->post('age'),
  'frecuencia'=> $this->input->post('frecuencia'),
 'tel_resi'  => $this->input->post('tel_resi'),
  'tel_cel'=> $this->input->post('tel_cel'),
  'email' => $this->input->post('email'),
  'sexo' => $this->input->post('sexo'),
   'estado_civil' => $this->input->post('estado_civil'),
  'nacionalidad'=> $this->input->post('nacionalidad'),
 'seguro_medico'  => $this->input->post('seguro_medico'),
 'afiliado'  => $this->input->post('afiliado'),
 'plan'  => $plan,
  'provincia'=> $this->input->post('provincia'),
  'municipio' => $this->input->post('municipio'),
  'barrio' => $this->input->post('barrio'),
   'calle' => $this->input->post('calle'),
  'contacto_em_nombre'=> $this->input->post('contacto_em_nombre'),
 'contacto_em_alias'  => $this->input->post('contacto_em_alias'),
  'contacto_em_cel'=> $this->input->post('contacto_em_cel'),
  'contacto_em_tel1' => $this->input->post('contacto_em_tel1'),
  'contacto_em_tel2' => $this->input->post('contacto_em_tel2'),
   'responsable_legal' => $this->input->post('responsable_legal'),
  'cedula_o_pass_menos_edad'=> $this->input->post('cedula_o_pass_menos_edad'),
  'inserted_by' =>$this->input->post('creadted_by'),
  'updated_by' =>$this->input->post('creadted_by'),
 'insert_date' => $insert_date,
  'update_date' => $insert_date,
  'filter_date' => $filter_date
  );
$id_pat=$this->model_admin->save_patient($save1);

$this->session->set_userdata('sessionIdPatient',$id_pat);
 $saveN = array(
'nec1'  => "NEC-$id_pat"
);

$this->model_admin->insert_nec($id_pat,$saveN);
//------------------------------------------------------------

for ($i = 0; $i < count($inputname), $i < count($inputf); ++$i ) {
    $inp = $inputname[$i];
	$inf = $inputf[$i];
   $saveInputs= array(
	'patient_id' =>$id_pat,
	'input_name' => $inp,
	'inputf' => $inf,
	'seguro_id' =>$this->input->post('seguro_medico')//when remove a seguro field we remove it in patient seguro field as well with this id
	);

	$this->model_admin->saveInput($saveInputs);
}

 $msg = "<div  style='text-align:center;font-size:20px;color:green' id='deletesuccess'>La cita se guada con exito .</div>";

$this->session->set_flashdata('success_msg', $msg);

$centro_type=$this->db->select('type')->where('id_m_c',$this->input->post('centro_medico'))->get('medical_centers')->row('type');
$this->session->set_userdata('sessionCentroTypeSeguroNewCitaAgain',$centro_type);
$this->session->set_userdata('sessionIdPatientNewCita',$id_pat);
$this->session->set_userdata('sessionIdDocNewCita', $this->input->post('doctor'));
$this->session->set_userdata('sessionIdCentNewCita',$this->input->post('centro_medico'));
$this->session->set_userdata('sessionIdSegNewCita',$this->input->post('seguro_medico'));
$this->session->set_userdata('id_user', $this->input->post('id_user'));

//------ADD NEW CAUSA IF NOT EXIST----------------------------------------------------------------
if($this->input->post('orientation')==0){
$dayNumber=$this->db->select('id')->where('title',$this->input->post('fecha_filter'))->get('diaries')->row('id');
$filter_date1 = date("Y-m-d", strtotime($this->input->post('fecha_propuesta')));
 $save2 = array(
'nec'=> "NEC-$id_pat",
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'area' =>$this->input->post('especialidad'),
'doctor' =>$this->input->post('doctor'),
'id_patient' => $id_pat,
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'weekday' =>$dayNumber,
'update_by' => $this->input->post('creadted_by'),
'inserted_by' => $this->input->post('creadted_by'),
'created_time' => $insert_date,
'update_time' => $insert_date,
'filter_date' => $filter_date1,
'cancelar' =>0
   );
$id_rdv =$this->model_admin->save_rendevous($save2);
$this->session->set_userdata('sessionIdNewCitaAgain', $id_rdv);

$query1 = $this->db->get_where('type_reasons',array('title'=>$this->input->post('causa')));
		if($query1->num_rows() == 0)
	{
		$save = array(
       'title'=>$this->input->post('causa'),
	   'inserted_by' => $this->input->post('creadted_by'),
	   'inserted_time' =>$insert_date,
       'updated_by' => $this->input->post('creadted_by'),
	   'updated_time' => $insert_date
	   );
		$this->model_admin->save_new_causa($save);
	}
//------------------------------------------------------------------------------------------------

redirect("$controller/gh0rtgkrr4g5");
}


//------HOSPITALIZACION----------------------------------------------------------------
if($this->input->post('orientation')==3){
 $savedas = array(
'centro'=> $this->input->post('hosp_centro'),
'esp'  => $this->input->post('hosp_esp'),
'doc'=> $this->input->post('hosp_doctor'),
'causa' =>$this->input->post('hosp_causa'),
'via' =>$this->input->post('hosp_ingreso'),
'id_patient' => $id_pat,
'sala' => $this->input->post('hosp_sala'),
'servicio' => $this->input->post('hosp_servicio'),
'cama' => $this->input->post('hosp_cama'),
'hosp_auto' => $this->input->post('hosp_auto'),
'hosp_auto_por' => $this->input->post('hosp_auto_por'),
'inserted' => $this->input->post('creadted_by'),
'updated' => $this->input->post('creadted_by'),
'timeinserted' => $insert_date,
'timeupdated' => $insert_date,
'canceled' =>0
   );
$this->db->insert("hospitalization_data",$savedas);

//------------------------------------------------------------------------------------------------
$id_p_ai = encrypt_url($id_pat);
$id_useri = encrypt_url($this->input->post('creadted_by'));
redirect("hospitalizacion/hospitalizacion_list/$id_p_ai/$id_useri");
}



elseif($this->input->post('orientation')==2){

//-------------------------------SAVE EMERGENCIA DATA------------------------------------------------
$query1 = $this->db->get_where('emergency_adm_data',array('id_em_c'=>$this->input->post('em_name')));
if($query1->num_rows() == 0)
{
$save = array(
'em_name'=>$this->input->post('em_name'),
'id'=>1
);
$this->db->insert("emergency_adm_data",$save);
}

//----------------------------------------------------------------------------------------

$query2 = $this->db->get_where('emergency_adm_data',array('id_em_c'=>$this->input->post('paciente_referido')));
if($query2->num_rows() == 0)
{
$save = array(
'em_name'=>$this->input->post('paciente_referido'),
'id'=>2
);
$this->db->insert("emergency_adm_data",$save);
}


//----------------------------------------------------------------------------------------

$query3 = $this->db->get_where('emergency_adm_data',array('id_em_c'=>$this->input->post('medio_llegado')));
if($query3->num_rows() == 0)
{
$save = array(
'em_name'=>$this->input->post('medio_llegado'),
'id'=>3
);
$this->db->insert("emergency_adm_data",$save);
}

//----------------------------------------------------------------------------------------

$query3 = $this->db->get_where('emergency_adm_data',array('id_em_c'=>$this->input->post('estado_paciente')));
if($query3->num_rows() == 0)
{
$save = array(
'em_name'=>$this->input->post('estado_paciente'),
'id'=>4
);
$this->db->insert("emergency_adm_data",$save);
}

if($this->input->post('enviado_a')==1){
	$go_to="triaje";
}else{
$go_to="Emergencia General";	
}
$save = array(
'id_pat'=>$id_pat,
'centro'=>$this->input->post('emergencia-centro'),
'causa'=>$this->input->post('em_name'),
'paciente_referido_por'=>$this->input->post('paciente_referido'),
'medio_de_llegado'=>$this->input->post('medio_llegado'),
'enviado_a'=>$this->input->post('enviado_a'),
'enviado_name'=>$go_to,
'estado_de_paciente'=>$this->input->post('estado_paciente'),
'inserted_by'=>$this->input->post('creadted_by'),
'update_by'=>$this->input->post('creadted_by'),
'created_date'=>date("Y-m-d"),
'create_time'=>date("H:i:s"),
'update_date'=>date("Y-m-d"),
'update_time'=>date("H:i:s")
);
$this->db->insert("emergency_patients",$save);
$enviado_a=$this->input->post('enviado_a');
$id_pat_emergencia= $id_pat;
$iduser=$this->input->post('creadted_by');
redirect("emergency/emergency_patient/$enviado_a/$id_pat_emergencia/$iduser");

}

else{
$this->session->set_userdata('id_cm',$this->input->post('factura-centro'));
$this->session->set_userdata('id_d',$this->input->post('facturar-doc'));
$this->session->set_userdata('id_p_a',$id_pat);
$this->session->set_userdata('id_seg',$this->input->post('seguro_medico'));
redirect("$controller/redirect_fac");
}
		}//patient is new
}//required field
}





public function patient_paginate()
{
  $data['id_user']=$this->session->userdata['admin_id'];
    $data['user_id']=$this->session->userdata['admin_id'];
  $data['perfil']=$this->session->userdata['admin_perfil'];
  $data['nombre']=$this->input->get('patient_nombres');
    $data['patient_apellido']=$this->input->get('patient_apellido');
    $data['patient_apellido2']=$this->input->get('patient_apellido2');
    $data['controllerUser']='admin';
    $this->load->view('admin/header_admin',$data);
   $data['backbutton'] = '<a style="color:red"   href="'.base_url().'admin/create_cita/"  >Volver a buscar</a>';
    $this->load->view('admin/pacientes-citas/display-names',$data);

}




public function loadData()
{
	$loadType=$_POST['loadType'];
	$loadId=$_POST['loadId'];
  $result=$this->model_admin->getData($loadType,$loadId);
	$HTML="";

	if($result->num_rows() > 0){
		foreach($result->result() as $list){
			$HTML.="<option value='".$list->id_town."'>".$list->name."</option>";
		}
	}
	echo $HTML;
}
//especialidades y doctor





public function get_input_view()
{
	$idpatient=$this->input->post('idpatient');
	$data['GET_NAMEF']= $this->model_admin->GET_NAMEF($idpatient);
	$this->load->view('admin/get_input_view', $data);
	 //echo json_encode ($query);
}

public function get_input_view_edit()
{
	$idpatient=$this->input->post('idpatient');
	$data['idpatient']=$idpatient;
	$data['GET_NAMEF']= $this->model_admin->GET_NAMEF($idpatient);
	$seguro_medico=$this->input->post('seguro_medico');
	$data['GET_INPUT']= $this->model_admin->get_input($seguro_medico);
	$this->load->view('admin/get_input_view_edit', $data);
	 //echo json_encode ($query);
}



public function do_upload_patient_photo()
{
  $image=basename($_FILES['picture']['name']);
  $image=str_replace(' ','|',$image);
  $type = explode(".",$image);
  $type = $type[count($type)-1];
  if (in_array($type,array('jpg','jpeg','png','gif')))
  {
    $tmppath="./assets/img/patients-pictures/".uniqid(rand()).".".$type; // uniqid(rand()) function generates unique random number.
    if(is_uploaded_file($_FILES["picture"]["tmp_name"]))
    {
      move_uploaded_file($_FILES['picture']['tmp_name'],$tmppath);
      return $tmppath; // returns the url of uploaded image.
    }
  }
  else
  {
    redirect(base_url() . 'admin/create_cita', 'refresh');// redirect to show file type not support message
  }
}



public function update_centro_medico()
{
	$data['admin_centro']=$this->session->userdata['admin_position_centro'];
	$edit_id= $this->uri->segment(3);
	$data['id_centro']=$edit_id;
	$data['EDIT_ID'] = $this->model_admin->edit_centro_medico($edit_id);
	$data['provinces']=$this->model_admin->getProvinces();
	$CentroDoctorRowEdit= $this->model_admin->display_all_doctors();
	$data['CentroDoctorRowEdit']=$CentroDoctorRowEdit;
	$data['countCD']=count($CentroDoctorRowEdit);
	$data['CentroSeguroRowEdit'] = $this->model_admin->display_all_seguro_medico();
	$data['municipios'] = $this->model_admin->getTownships();
	$data['CentroAreaRowEdit'] = $this->model_admin->display_all_areas();
	$this->load->view('admin/centers/update', $data);


}

public function update_doctor()
{
	$edit_id= $this->uri->segment(3);
	$data['id_doc']=$edit_id;
	$data['DOCTORS'] = $this->model_admin->getDoctorForUpdate($edit_id);
	$data['especialidades'] = $this->model_admin->getEspecialidades();
	$data['centro_all'] = $this->account_demand_model->getCentroMedico();
	$data['seguro_all'] = $this->model_admin->display_all_seguro_medico();
	$data['agenda_all']=$this->model_admin->getDiaries();

	//$data['EDIT_ID'] =$query;
	$this->load->view('admin/medicos/update', $data);

}
public function new_centro_medico()
{
$data['controller']='admin';
$data['inserted_by']=$this->session->userdata['admin_id'];
$data['countries'] = $this->model_admin->getCountries();
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['provinces']=$this->model_admin->getProvinces();
$data['DOCTORS']=$this->model_admin->display_all_doctors();
$data['causa']=$this->model_admin->getCausa();
  $this->load->view('admin/header_admin');
$this->load->view('admin/centers/create', $data);

}

public function new_field()
{

$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$this->load->view('admin/health_insurances/new_field', $data);

}






public function medical_centers(){
	
$admin_position_centro=$this->session->userdata['admin_position_centro'];
if($admin_position_centro){

  $querycentro = $this->db->query("SELECT * FROM medical_centers WHERE id_m_c=$admin_position_centro");
}else{

  $querycentro = $this->db->query('SELECT * FROM medical_centers');

}
	
$data['all_medical_centers'] = $querycentro->result();

$this->load->view('admin/centers/medical_centers', $data);

}


public function users(){
$data['admin_centro']=$this->session->userdata['admin_position_centro'];
$this->load->view('admin/users/users', $data);
}


public function userLocation(){
$id=$this->uri->segment(3);
//$data['res'] = file_get_contents('https://www.iplocate.io/api/lookup/'.$ip);
$data['name']= $this->db->select('name')->where('id_user',$id)->get('users')->row('name');
 $data['machine']= $this->db->select('ip,OpeSys,Browser,browser_v')->where('user_id',$id)->get('current_user_info')->row_array();
$this->load->view('admin/users/userLocation', $data);
//var_dump($res);


}





public function current_login(){

$today= $this->model_admin->current_login();
$data['today']=$today;
$data['ctoday']=count($today);
$this->load->view('admin/users/current_login', $data);

}

public function current_user_login()
{
$admin_centro=$this->session->userdata['admin_position_centro'];	
if($admin_centro){
	$sqlUsC ="SELECT is_log_in FROM users INNER JOIN user_centro_administrativo
	ON users.id_user=user_centro_administrativo.id_user 
	WHERE id_centro =$admin_centro && is_log_in=1";
$queryUsC= $this->db->query($sqlUsC);
 $nb=$queryUsC->num_rows();
}else{
$user_connected=$this->db->select('is_log_in')->where('is_log_in',1)->where('id_user !=',1)->like('login_time',date("Y-m-d"))->get('users');
$nb=$user_connected->num_rows();
}
		
echo $nb;
}


public function create_doctor()
{

$this->load->view('admin/medicos/create');

}




public function doctors(){
$id_medical_center=$this->session->userdata['admin_position_centro'];
if($id_medical_center){
$query= $this->model_admin->get_doctor($id_medical_center);

}else{
$query = $this->model_admin->display_all_doctors();
}


$data['all_doctor'] =  $query;
$this->load->view('admin/medicos/doctors', $data);

}

public function update_area()
{
	$id=$this->uri->segment(3);
	$data['id']=$id;
 $data['title_area']=$this->db->select('title_area')->where('id_ar',$id)->get('areas')->row('title_area');

   $this->load->view('admin/medicos/edit_area', $data);
}





public function edit_area()
{
$especialidad=$this->input->post('especialidad');
$id= $this->input->post('ida');
$query = $this->db->get_where('areas',array('title_area'=>$especialidad));
	if($query->num_rows() > 0 )
	{
$msg = "<div class='alert alert-warning' style='text-align:center;font-size:20px' id='deletesuccess'>Area : <span style='color:green'>$especialidad</span> ya existe .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect($_SERVER['HTTP_REFERER']);
}
else{
$data = array(
'title_area'=>$especialidad
);
$this->model_admin->edit_area($id,$data);
$msg = "<div  style='text-align:center;font-size:20px' id='deletesuccess'> <span style='color:green'>area ha sido modificado con exito .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect($_SERVER['HTTP_REFERER']);
}
}


public function lab(){
$this->load->view('admin/header_admin');
 $sqllbb ="SELECT * FROM h_c_groupo_lab WHERE  rmvd=0 GROUP BY groupo ORDER BY id DESC";
$querylbb= $this->db->query($sqllbb);
$data['totallab'] = $querylbb->num_rows();
$data['medico_id']=-1;
$this->load->view('admin/medicos/lab',$data);

}


public function areas(){

$data['all_areas'] = $this->model_admin->display_all_areas();
$this->load->view('admin/medicos/areas', $data);

}
public function load_areas(){

$data['all_areas'] = $this->model_admin->display_all_areas();
$this->load->view('admin/load_areas', $data);

}

public function diseases(){
$data['all_reasons'] = $this->model_admin->display_all_reasons();
$this->load->view('admin/diseases/diseases', $data);

}


public function update_field()
{
$id_field= $this->uri->segment(3);
$data['id_field']= $this->uri->segment(3);
$data['ALL_SEGURO'] = $this->model_admin->display_all_seguro_medico();
$data['EditField'] = $this->model_admin->view_field($id_field);
$this->load->view('admin/health_insurances/update_field', $data);

}

public function edit_seguro_medico()
{

$id= $this->input->post('idsm');
$data = array(
'title'=>$this->input->post('seguro_medico')
);
$this->model_admin->edit_seguro_medico($id,$data);
$msg = "<div  style='text-align:center;font-size:20px' id='deletesuccess'> <span style='color:green'>seguro medico ha sido modificado con exito .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('admin/health_insurance');

}


public function health_insurances(){
$data['all_seguro_medico'] = $this->model_admin->display_all_seguro_medico();
$data['ALL_FIELDS'] = $this->model_admin->all_fields();

$this->load->view('admin/health_insurances/index', $data);

}
public function Provinces(){
$query = $this->model_admin->all_provinces();

$data['all_provinces'] =  $query;
$this->load->view('admin/all_provicnes', $data);

}
public function Townships(){
$data['all_municipio'] = $this->model_admin->all_municipio();

$this->load->view('admin/all_municipio', $data);

}


public function save_area(){
$area  = $this->input->post('title_area');

$query = $this->db->get_where('areas',array('title_area'=>$area));
	if($query->num_rows() > 0 )
	{
$msg = "<div class='alert alert-warning' style='text-align:center;font-size:20px' id='deletesuccess'>Area : <span style='color:green'>$area</span> ya existe .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('admin/areas');
}
else{
$save = array(
  'title_area'  => $area
  );
$this->model_admin->save_area($save);

$msg = "<div  style='text-align:center;font-size:20px' id='deletesuccess'>Area : <span style='color:green'>$area</span> se guada con exito .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('admin/areas');
}
}

public function save_disease(){
$disease  = $this->input->post('disease');

$query = $this->db->get_where('type_reasons',array('title'=>$disease));
	if($query->num_rows() > 0 )
	{
$msg = "<div class='alert alert-warning' style='text-align:center;font-size:20px' id='deletesuccess'>Area : <span style='color:green'>$disease</span> ya existe .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('admin/diseases');
}
else{
$save = array(
  'title'  => $disease
  );
$this->model_admin->save_disease($save);

$msg = "<div  style='text-align:center;font-size:20px' id='deletesuccess'>Causa : <span style='color:green'>$disease</span> se guada con exito .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('admin/diseases/diseases');
}
}

public function delete_area(){
$query = $this->model_admin->delete_area($this->uri->segment(3));
$msg = "<div  style='text-align:center;font-size:20px' id='deletesuccess'> <span style='color:green'>area se elimina con exito .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('admin/Areas');

}

public function delete_causa(){
$query = $this->model_admin->delete_causa($this->input->post('id'));

}





public function DeleteDoctor(){

$id_doc  = $this->input->post('id');
$query = $this->model_admin->delete_doctor($id_doc);
$query = $this->model_admin->delete_doctor_agenda($id_doc);
$query = $this->model_admin->delete_doctor_centro($id_doc);
$query = $this->model_admin->delete_doctor_seguro($id_doc);
$msg = "<div  style='text-align:center;font-size:20px' id='deletesuccess'> <span style='color:green'>El doctor se elimina con exito .</div>";
$this->session->set_flashdata('success_msg', $msg);
//redirect('admin/Doctors');
redirect($_SERVER['HTTP_REFERER']);

}


public function delete_doctor_centro2(){
$id_cd  = $this->input->post('id');
$query = $this->model_admin->delete_doctor_centro2($id_cd);
}

public function delete_seguro_centro(){
$id_cd  = $this->input->post('id');
$query = $this->model_admin->delete_seguro_centro($id_cd);
}

public function DeleteDoctorS(){

$id_doc  = $this->uri->segment(3);
$query = $this->model_admin->delete_doctor($id_doc);
$query = $this->model_admin->delete_doctor_agenda($id_doc);
$query = $this->model_admin->delete_doctor_centro($id_doc);
$query = $this->model_admin->delete_doctor_seguro($id_doc);
$msg = "<div  style='text-align:center;font-size:20px' id='deletesuccess'> <span style='color:green'>El doctor se elimina con exito .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('admin/Doctors');

}
public function DeleteCentroMedico(){
$id  = $this->input->post('id');

$data = array(
  'activate'  =>1
   );

$this->model_admin->delete_centro_medico($id,$data);
//$this->model_admin->delete_centro_medico_doc($id);
}


public function DeleteDiaryDoctor(){
	$id_doctor  = $this->input->post('id');
$query = $this->model_admin->DeleteDiaryDoctor($id_doctor);


}

public function AddDiaryDoctor(){
$id_doctor  = $this->input->post('id_doc');
$save = array(
  'id_doctor'  => $id_doctor,
  'agenda'=> $this->input->post('title')
  );
 // $data['AGENDA']= $this->model_admin->view_doctor_agenda($id_doctor);
$this->model_admin->AddDiaryDoctor($save);
//$this->load->view('admin/view_doctor', $data);

}

public function delete_seguro_medico(){
	$id_seguro  = $this->input->post('id');
	$data = array(
  'activate'=> 1
  );
$this->model_admin->delete_seguro_medico($id_seguro,$data);
//$this->model_admin->delete_seguro_medico_field($id_seguro);
}


public function delete_seguro_link(){
//$id_field== $this->uri->segment(3);
$id_field  = $this->input->post('id');
$this->model_admin->delete_seguro_medico_field($id_field);

}
public function delete_field(){
$id  = $this->input->post('id');
$this->model_admin->delete_field($id);
$this->model_admin->delete_field_link($id);
}

public function save_s_m(){
//if($this->input->post('submitSeguro')){
$field_id  = $this->input->post('field_id');
$title  = $this->input->post('title');
$query = $this->db->get_where('seguro_medico',array('title'=>$title));
	if($query->num_rows() > 0 )
	{
$msg = "<div class='alert alert-warning' style='text-align:center;font-size:20px' id='deletesuccess'>seguro_medico : <span style='color:green'>$seguro_medico</span> ya existe .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('admin/health_insurances');
}
else{
if(isset($_FILES["picture"]['name']))
{
$imgSize = $_FILES['picture']['size'];
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
$imgExt = strtolower(pathinfo($_FILES["picture"]['name'],PATHINFO_EXTENSION));
$extension = explode('.', $_FILES['picture']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/img/seguros_medicos/' . $logo;
if(in_array($imgExt, $valid_extensions) && $imgSize < 5000000)
{
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);

}
else {
	$msg = "<div id='deletesuccess' style='text-align:center;color:green'>Este tipo de archivo no está permitido, la inserción falla.</div>";
	$this->session->set_flashdata('success_msg', $msg);
redirect('admin/health_insurances');
}
}
//Check whether user upload picture
$insert_date=date("Y-m-d H:i:s");

//Prepare array of user data
$save = array(
'title'  => $title,
'logo' => $logo,
'rnc' => $this->input->post('rnc'),
'tel' => $this->input->post('tel'),
'email' => $this->input->post('email'),
'direccion' =>$this->input->post('direccion'),
'inserted_time' => $insert_date,
'inserted_by' =>$this->input->post('user_name'),
'updated_by' =>$this->input->post('user_name'),
'updated_time' =>$insert_date
);

//Pass user data to model
$insertUserData = $this->model_admin->save_s_m($save);
$last_id_seguro=$this->db->select('id_sm')->order_by('id_sm','desc')->limit(1)->get('seguro_medico')->row('id_sm');
foreach ($field_id as $key=>$id_f) {
   $saveS= array(
	'medical_insurance_id' =>$last_id_seguro,
	'field_id' => $id_f

	);

	$this->model_admin->saveSeguroField($saveS);
}
//Storing insertion status message.
if($insertUserData){
	$msg = "<div id='deletesuccess' style='text-align:center;color:green'>El seguro medico se guada con exito.</div>";
	$this->session->set_flashdata('success_msg', $msg);
}else{
$msger="Hubo algunos problemas, por favor intente de nuevo.";
$this->session->set_flashdata('error_msg', $msger);
}
redirect('admin/health_insurances');
}
//}
//Form for adding user data


}


public function health_insurance_fields(){
$data['name']=$this->session->userdata['admin_name'];
$id_user=$this->uri->segment(3);
$data['perfil']=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
$data['id_user'] = $id_user ;
$query = $this->model_admin->all_fields();
$data['all_fields'] =  $query;
$this->load->view('admin/header_admin',$data);

$this->load->view('admin/health_insurances/fields', $data);

}



public function Diary()
{
$id_diary= $this->uri->segment(3);
$data['DIARY'] = $this->model_admin->diary($id_diary);
$data['DIARY_DOCTORS'] = $this->model_admin->diary_doctors($id_diary);
$this->load->view('admin/ver_diary', $data);


}
	public function field()
{
$id_field= $this->uri->segment(3);
$data['id_field']= $this->uri->segment(3);
$data['ALL_SEGURO'] = $this->model_admin->display_all_seguro_medico();
$data['EditField'] = $this->model_admin->view_field($id_field);
$this->load->view('admin/health_insurances/field', $data);

}

public function SaveField(){
	$title  = $this->input->post('title');
$description  = $this->input->post('description');
$active  = $this->input->post('activo');
$activee  =(isset($active)) ? 1 : 0;
$seguro_id  = $this->input->post('activo_seguro');
//$insert_date=date("Y-m-d H:i:s");
//$modify_date=date("Y-m-d H:i:s");

$save = array(
  'name'  => $title,
  'description'=> $description,
  'active' => $activee
  //'insert_date'=> $insert_date,
  //'modify_date' => $modify_date
  );
$this->model_admin->SaveField($save);
$last_id_field=$this->db->select('id')->order_by('id','desc')->limit(1)->get('fields')->row('id');

foreach ($seguro_id as $key=>$id_seg) {
   $saveS= array(
	'medical_insurance_id' =>$id_seg,
	'field_id' => $last_id_field

	);

	$this->model_admin->saveSeguroField($saveS);
}
$msg = "<div id='deletesuccess' style='text-align:center;color:green'>El Campo : <u> <b>$title</b></u> se guada con exito.</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect($_SERVER['HTTP_REFERER']);
}




public function relatedDoctor(){
$id_area= $this->uri->segment(3);
$data['iduser']=$this->session->userdata['admin_id'];
$data['idarea']=$id_area;
$data['area']=$this->db->select('title_area')->where('id_ar',$id_area)->limit(1)->get('areas')->row('title_area');
$data['relatedDoctor'] = $this->model_admin->relatedDoctor($id_area);
$data['messages'] = $this->model_admin->messageToDoc($id_area);
$this->load->view('admin/medicos/RelatedDoctor', $data);

}



 public function SaveUpdateField(){
$id_field  = $this->input->post('id_field');
	$name  = $this->input->post('title');
$description  = $this->input->post('descripcion');
$active  = $this->input->post('activo');
$active_field  =(isset($active)) ? 1 : 0;
$seguro_id  = $this->input->post('seguro_id');

$data = array(
  'name'  => $name,
  'description'=> $description,
   'active'=> $active_field
  );
$this->model_admin->updateField($id_field,$data);

$this->model_admin->deleteField($id_field);
foreach ($seguro_id as $id_seguro) {

   $data= array(
   'medical_insurance_id' => $id_seguro,
	'field_id' => $id_field

	);

	$this->model_admin->saveSeguroField($data);
}
$msg = "<div id='deletesuccess' style='text-align:center;color:green'>El Campo : <u> <b>$name</b></u> se ha editado con exito.</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect($_SERVER['HTTP_REFERER']);
}



public function deleteProvinceDirection(){
$id  = $this->input->post('id');
$this->model_admin->deleteProvinceDirection($id);

}

public function deleteDoctorAgenda(){
$id  = $this->input->post('id');
$this->model_admin->deleteDoctorAgenda ($id);

}

public function deleteProvinceCentro(){
$id  = $this->input->post('id');
$delete="";
$data= array(
   'provincia' => $delete
	);
$this->model_admin->deleteProvinceCentro($id,$data);

}
public function deleteMunicipioCentro(){
$id  = $this->input->post('id');
$delete="";
$data= array(
   'municipio' => $delete
	);
$this->model_admin->deleteMunicipioCentro($id,$data);

}

public function saveEditCentroMedico(){
$id_m_c  = $this->input->post('id_m_c');
$name  = $this->input->post('name');
$municipio_id  = $this->input->post('municipio');

$name_success  = $this->input->post('name');
$especialidad  = $this->input->post('especialidad');
$seguro_medico  = $this->input->post('seguro_medico');
$doctor  = $this->input->post('doctor');
$modify_date=date("Y-m-d H:i:s");

//===================================================
if($_FILES['picture']['tmp_name'] != '')
{
$extension = explode('.', $_FILES['picture']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/img/centros_medicos/' . $logo;
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
 }

else {
$old_logo=$this->db->select('logo')->where('id_m_c',$id_m_c)->get('medical_centers')->row('logo');
$logo = $old_logo;

	}

//===================================================

$data = array(
  'name'  => $this->input->post('name'),
   'logo'  =>$logo,
    'rnc'=> $this->input->post('rnc'),
  'primer_tel'=> $this->input->post('primer_tel'),
  'segundo_tel' => $this->input->post('segundo_tel'),
  'email' => $this->input->post('email'),
   'fax' => $this->input->post('fax'),
 'provincia'=> $this->input->post('provincia'),
  'municipio' => $this->input->post('municipio'),
   'barrio' => $this->input->post('barrio'),
   'calle' => $this->input->post('calle'),
  'pagina_web'=> $this->input->post('pagina_web'),
 'modify_date' => $modify_date,
  'updated_by'=> $this->session->userdata['admin_id'],
 'type' => $this->input->post('typo')
  );
$this->model_admin->SaveUpdateCentroMedico($id_m_c,$data);
//-------------------------------------------------------

$this->model_admin->deleteCentroEsp($id_m_c);

//insert doctor in table doctor_centro_medico
foreach ($especialidad as $esp) {

	$saveE= array(
	'id_medical_center' =>$id_m_c,
	'especialidad' => $esp
	);

	$this->model_admin->SaveCentroEsp($saveE);
}
//----------------------------------------------------

//delete centro in medial_center_esp
$this->model_admin->deleteCentroSeguro($id_m_c);

//insert seguro in table medical_centro_seguro
foreach ($seguro_medico as $seg) {

	$saveSe= array(
	'id_medical_center' =>$id_m_c,
	'seguro_id' => $seg
	);

	$this->model_admin->SaveCentroSeg($saveSe);
}

//--------------------CAMA DE MAPA-------------------------------------------------
if($_FILES["mapacama"]["name"])
{

$path = $_FILES["mapacama"]["tmp_name"];
$object = PHPExcel_IOFactory::load($path);
foreach($object->getWorksheetIterator() as $worksheet)
{
$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();
for($row=2; $row<=$highestRow; $row++)
{
$sala = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
$num_cama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
$servicio = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
$datamp[] = array(
'sala'=>$sala,
'num_cama'=>$num_cama,
'servicio'=>$servicio,
'centro'=>$id_m_c
);
}

}
$this->db->insert_batch('mapa_de_cama', $datamp);


}
//-----------------------------------------------------------------------------




$msg = "<div id='deletesuccess'  style='text-align:center;color:green'>El Centro Medico se edita con exito .</div>";
$this->session->set_flashdata('success_msg', $msg);
//redirect('admin/medical_centers');
redirect($_SERVER['HTTP_REFERER']);
}







public function UpdateAgendaDoctor(){
$id_doctor  = $this->input->post('id_doctor');
$agenda_id  = $this->input->post('agenda_id');
$this->model_admin->deleteAgendaDoctor($id_doctor);
foreach ($agenda_id as $agend) {
 $saveAD= array(
  'id_doctor' => $id_doctor,
	'agenda' => $agend

	);

	$this->model_admin->SaveAgendaDoctor($saveAD);
}

}


public function DeleteDoctorCentro(){
	$id_cd  = $this->input->post('id');
$query = $this->model_admin->DeleteDoctorCentro($id_cd);


}


public function DeleteDoctorSeguro(){
	$id_d_s  = $this->input->post('id');
$query = $this->model_admin->DeleteDoctorSeguro($id_d_s);


}


public function create_user()
{
$data['admin_centro'] =$this->session->userdata['admin_position_centro'];
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['diaries']=$this->model_admin->getDiaries();
$data['causa']=$this->model_admin->getCausa();
$data['seguros'] = $this->model_admin->display_all_seguro_medico();
$this->load->view('admin/users/create', $data);
}

public function changePassw()
{
	$data['control']= 'admin';
	$data['id_admin']= $this->uri->segment(3);
$this->load->view('admin/users/update-passw', $data);
}


public function extendUserAccount()
{
$data['id']= $this->uri->segment(3);
$user=$this->db->select('perfil,name,plazo')->where('id_user',$this->uri->segment(3))->get('users')->row_array();
$name=$user['name'];
$perfil=$user['perfil'];
$plazo=$user['plazo'];
$data['plazo']=date("d-m-Y",strtotime($plazo));
$data['user_info']="$perfil $name";
$this->load->view('admin/users/extendUserAccount', $data);
}


public function SaveUser2(){
$date=date("Y-m-d H:i:s");
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$passwuser = substr( str_shuffle( $chars ), 0, 8 );
	$save = array(
  'name'  => $this->input->post('nombre1'),
  'perfil' => $this->input->post('perfil1'),
   'username' => $this->input->post('email'),
   'password' => md5($passwuser),
    'correo' => $this->input->post('email'),
	//'cedula' => $this->input->post('cedula'),
   'user_ars' => $this->input->post('seguro'),
  'inserted_by' => $this->session->userdata['admin_id'],
  'updated_by' =>$this->session->userdata['admin_id'],
 'insert_date'=> $date,
 'plazo'=> $date,
  'update_date' => $date,
   'payment_plan' =>0,
   'status' => 1 );
$id_user=$this->model_admin->CreateUser($save);

if($this->input->post('perfil1')=='Farmacia'){
	
	$savefa= array(
	'id_user' =>$id_user,
	'id_farmacia' => $this->input->post('farmacia')
	);

	$this->db->insert("user_farmacia",$savefa);
}


if($this->input->post('perfil1')=='Técnico de lentes'){
	
	$savefa= array(
	'id_user' =>$id_user,
	'id_tecnico_lentes' => $this->input->post('tecnico-de-lente')
	);

	$this->db->insert("user_tecnico_lentes",$savefa);
}



if($this->input->post('perfil1')=='Estudios'){
	
	$savest= array(
	'id_user' =>$id_user,
	'id_estudio' => $this->input->post('estudio')
	);

	$this->db->insert("user_estudios",$savest);
}

if($this->input->post('perfil1')=='Farmacia Interna'){
	
	$saveucent= array(
	'id_user' =>$id_user,
	'id_centro' => $this->input->post('centro')
	);

	$this->db->insert("internal_drugstores_center",$saveucent);
}

if($this->input->post('area')=='Optómetra'){

$where = array(
'id_user' =>$id_user
);
$data = array(
'area'  =>87);
$this->db->where($where);
$this->db->update("users",$data);
	
	
}

$this->session->set_userdata('user_email', $this->input->post('email'));
$this->session->set_userdata('passwuser', $passwuser);
$this->session->set_userdata('user_name', $this->input->post('nombre1'));
$this->session->set_userdata('user_perfil', $this->input->post('perfil1'));
$this->send_message_to_new_user();

$msg = "<div class='alert alert-success' style='text-align:center;font-size:20px' id='deletesuccess'> <span style='color:green'>Usuario esta creado con éxito.</div>";
$this->session->set_flashdata('success_msg_create_user', $msg);
$this->newUserNotification();
redirect("admin/create_user");
}


public function SaveUser(){
$date=date("Y-m-d H:i:s");
$seguro_medico=$this->input->post('seguro_medico');
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$passwuser = substr( str_shuffle( $chars ), 0, 8 );
$save = array(
  'name'  => $this->input->post('nombre'),
   'perfil' => $this->input->post('perfil'),
    'cell_phone' => $this->input->post('tel_cell'),
   'username' => $this->input->post('email'),
   'password' => md5($passwuser),
   'correo' => $this->input->post('email'),
  'exequatur' => $this->input->post('exequatur'),
   'cedula' => $this->input->post('cedula'),
   'area' => $this->input->post('especialidad'),
  'inserted_by' => $this->session->userdata['admin_id'],
  'updated_by' =>$this->session->userdata['admin_id'],
 'insert_date'=> $date,
  'update_date' => $date,
  'plazo'=> $date,
   'payment_plan' =>0,
   'link_pago' => $this->input->post('link_pago'),
   'link_video_conf' => $this->input->post('link_video_conf'),
   'status' => 1
   );
$id_doc_user=$this->model_admin->CreateUser($save);


for ($i = 0; $i < count($seguro_medico); ++$i ) {
    $seg = $seguro_medico[$i];

	$saveD= array(
	'id_doctor' =>$id_doc_user,
	'seguro_medico' => $seg
	);

	$this->model_admin->saveDoctorSeguro($saveD);
}


$this->model_admin->delete_doctor_seguro2();

$this->session->set_userdata('passwuser', $passwuser);
$this->session->set_userdata('user_email', $this->input->post('email'));
$this->session->set_userdata('user_name', $this->input->post('nombre'));
$this->session->set_userdata('user_perfil', $this->input->post('perfil'));
$this->send_message_to_new_user();


$msg = "<div  style='text-align:center;font-size:20px' id='deletesuccess'> <span style='color:green'>Usuario esta creado .</div>";
$this->session->set_flashdata('success_msg_create_user', $msg);
$this->session->set_userdata('id_doc_user',$id_doc_user);
$this->newUserNotification();
	redirect("admin/update_user/$id_doc_user/1");
}




public function SaveUserAsM(){
$centro_medico= $this->input->post('centro_medico');
$medico= $this->input->post('medico');
$exequatur=$this->input->post('exequatur');
$date=date("Y-m-d H:i:s");
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$passwuser = substr( str_shuffle( $chars ), 0, 8 );
$save = array(
  'name'  => $this->input->post('nombre'),
   'perfil' => $this->input->post('perfil'),
   'cell_phone' => $this->input->post('tel_cell'),
   'username' => $this->input->post('email'),
   'password' => md5($passwuser),
   'correo' => $this->input->post('email'),
  'inserted_by' => $this->session->userdata['admin_id'],
  'updated_by' =>$this->session->userdata['admin_id'],
 'insert_date'=> $date,
  'update_date' => $date,
  'plazo'=> $date,
   'payment_plan' =>0,
   'status' => 1
   );
$id_as_doc_user=$this->model_admin->CreateUser($save);

for ($i = 0; $i < count($centro_medico); ++$i ) {
    $idcentro = $centro_medico[$i];

	$saveD= array(
	'id_doctor' =>$id_as_doc_user,
	'centro_medico' => $idcentro
	);

	$this->model_admin->saveDoctorCentroMedico($saveD);
}
//---------------save asistente for each doctor--------------------------------------------------------------

for ($i2 = 0; $i2 < count($medico); ++$i2 ) {
    $idmedico = $medico[$i2];

	$savedas= array(
	'id_doctor' =>$idmedico,
	'id_asdoc' => $id_as_doc_user
	);

	$this->db->insert("centro_doc_as",$savedas);
}





$this->session->set_userdata('user_email', $this->input->post('email'));
$this->session->set_userdata('passwuser', $passwuser);
$this->session->set_userdata('user_name', $this->input->post('nombre'));
$this->session->set_userdata('user_perfil', $this->input->post('perfil'));
$this->send_message_to_new_user();
//-------------save doctor--------------------------------

$msg = "<div class='alert alert-success' style='text-align:center;font-size:20px' id='deletesuccess'> <span style='color:green'>Usuario esta creado con éxito.</div>";
$this->session->set_flashdata('success_msg_create_user', $msg);
$this->session->set_userdata('id_as_doc_user',$id_as_doc_user);
$this->newUserNotification();
redirect('admin/create_user');
}



public function newUserNotification(){

 $user=$this->db->select('id_user,name,perfil')->order_by('id_user','desc')->limit(1)->get('users')->row_array();
 $user_id= $user['id_user'];
$user_name= $user['name'];
$user_peril= $user['perfil'];
$config = Array(
'protocol' => 'smtp',
'smtp_host' => '162.144.158.119',
'smtp_port' => 26,
'smtp_user' => 'soporte@admedicall.com', // change it to yours
'smtp_pass' => 'sopote_adm123QW', // change it to yours
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);
$msg ="
<html>
<body style='font-family: 'Playfair Display', serif;color:red'>
A NEW USER HAS BEEN ADDED To GICRE <br/>
<strong>User ID : $user_id</strong><br/>
<strong>User Name : $user_name</strong><br/>
<strong>User Perfil : $user_peril</strong>
<br>

</body>
</html>";
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to("baptiste.prophete123@gmail.com,admedicall@gmail.com");// change it to yours
$this->email->subject('New user from GICRE');
$this->email->message($msg);
$this->email->send();
}




public function create_doctor_agenda(){
if(empty($this->session->userdata['id_doc_user']))	{
redirect('/page404');
}
$data['id_doc_user']=$this->session->userdata['id_doc_user'];
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['diaries']=$this->model_admin->getDiaries();
$this->load->view('admin/medicos/create_doctor_agenda',$data);

}




public function load_doc_ag(){
 $data['id_doctor']= $this->input->get('id_doc_user');

$data['agend_result']=$this->model_admin->agend_result($this->input->get('id_doc_user'));
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$this->load->view('admin/medicos/agend_result',$data);
}




public function save_edit_agenda(){
$id_centro=$this->db->select('id_m_c')->where('name',$this->input->post('centro'))->get('medical_centers')->row('id_m_c');

	$agd = array(
   'agenda' => $this->input->post('agenda'),
   'id_centro' => $id_centro,
   'citas' => $this->input->post('citas')
   );

 $this->model_admin->update_doc_agenda($this->input->post('id_agenda'),$agd);


}








//-----------------------------message
public function SaveMessage(){
$id_area=$this->input->post('idarea');
$doc=$this->input->post('doc');
$insert_date=date("Y-m-d H:i:s");
$save = array(
  'id_area'  => $id_area,
  'message'=> $this->input->post('message'),
  'iduser'=> $this->input->post('iduser'),
  'insert_time'=> $insert_date
   );
$idmsg=$this->model_admin->SaveMessage($save);
$data['messages'] = $this->model_admin->messageToDoc($id_area);


for ($i = 0; $i < count($doc); ++$i ) {
$dc = $doc[$i];

$save = array(
  'id_doc'  =>$dc,
  'id_msg'=> $idmsg,
  );
$this->model_admin->doctors_message_view($save);
}

$this->load->view('admin/SendMessage', $data);
//---------------------------------------------


}

public function DeleteMessage(){

	$id  = $this->input->post('id');
$query = $this->model_admin->DeleteMessage($id);

$query = $this->model_admin->DeleteMessageSent($id);
}








public function obstetrico()
{
$historial_id  = $this->input->post('id_historial');
$data['id_historial']=$historial_id;
$data['obs_nav']=$this->model_admin->sObs($historial_id);
$data['count_obs']=$this->model_admin->countObs($historial_id);
$this->load->view('admin/historial-medical/obstetrico/index',$data);
$this->load->view('admin/historial-medical/obstetrico/footer',$data);

}

public function enfermedadshow()
{
$historial_id  = $this->input->post('id_historial');
$data['historial_id']=$historial_id;
$data['count_enf']=$this->model_admin->CountEnfermedad($historial_id);
$data['enfermedad']=$this->model_admin->Enfermedad($historial_id);
$this->load->view('admin/historial-medical/enfermedad-actual/index',$data);
}






 public function examenf()
{
$historial_id  = $this->input->post('id_historial');
$data['historial_id']=$historial_id;
$data['cabeza']=$this->model_admin->Cabeza();
$data['cuello']=$this->model_admin->examenCuello();
$data['torax']=$this->model_admin->examenTorax();
$data['mama']=$this->model_admin->examenMama();
$data['axilar']=$this->model_admin->examenAxilar();
$data['genitalf']=$this->model_admin->examenGenitalf();
$data['genitalm']=$this->model_admin->examenGenitalm();
$data['vagina']=$this->model_admin->examenVagina();
$data['rectal']=$this->model_admin->examenRectal();
$data['inspeccion_vulvar']=$this->model_admin->examenInspeccion_vulvar();
$data['ext_inf']=$this->model_admin->examenExtinf();
//------------------------------------------------------------
$data['count_signos']=$this->model_admin->count_signos($historial_id);
$data['signos']=$this->model_admin->Signos($historial_id);
//------------------------------------------------------------
$this->load->view('admin/historial-medical/examen-fisico/index',$data);
$this->load->view('admin/historial-medical/examen-fisico/footer');
}


 public function signos()
{
$historial_id  = $this->input->post('id_historial');
$data['historial_id']=$historial_id;
$data['count_signos']=$this->model_admin->count_signos($historial_id);
$data['signos']=$this->model_admin->Signos($historial_id);
$this->load->view('admin/signos',$data);
}








public function show_exam_by_id(){
$id_enf  = $this->input->post('on_select_show');
$data['show_exam_by_id'] = $this->model_admin->show_exam($id_enf);
$this->load->view('admin/show_select_exam_by_id', $data);

}


//---------------------------------------------------------------------
 public function examensis()
{
$historial_id  = $this->input->post('id_historial');
$data['historial_id']=$historial_id;
$data['count_examensis']=$this->model_admin->count_examenes_sis($historial_id);
$data['examensis']=$this->model_admin->Examensis($historial_id);
$data['digest']=$this->model_admin->sistemaDigest();
$data['musculo']=$this->model_admin->sistemaMusculo();
$data['urogenial']=$this->model_admin->sistemaUrogenial();
$data['cardiov']=$this->model_admin->sistemaCardiov();
$data['neuro']=$this->model_admin->sistemaNeuro();
$data['resp']=$this->model_admin->sistemaResp();
$data['endocrino']=$this->model_admin->sistemaEndo();
$data['relativo']=$this->model_admin->sistemaRelat();
$this->load->view('admin/historial-medical/examen-sistema/index',$data);
$this->load->view('admin/historial-medical/examen-sistema/footer');
}






//Estudios
public function Estudios()
{
$historial_id  = $this->input->post('id_historial');
$data['historial_id']=$historial_id;
$data['estudios'] = $this->model_admin->estudios();
$data['cuerpo'] = $this->model_admin->cuerpo();
$data['IndicacionesPreviasEstudios'] = $this->model_admin->IndicacionesPreviasEs($historial_id);
$data['num_count_es']=$this->model_admin->hist_count_es($historial_id);

$this->load->view('admin/estudios',$data);
}

//-------------------------------------------------------------

//Laboratorios

//------------------------------------------
public function Conclucion()
{
$historial_id  = $this->input->post('historial_id');
$data['historial_id']=$historial_id;
$data['concluciones'] = $this->model_admin->concluciones($historial_id);
$data['count_conc']=$this->model_admin->count_con_dia($historial_id);
//$data['diag_pres']=$this->model_admin->Diag_pres();
//$data['diag_pro']=$this->model_admin->Diag_pro();
$this->load->view('admin/historial-medical/conclusion/index',$data);
$this->load->view('admin/historial-medical/conclusion/footer');
}


public function exploracionFP()
{
$historial_id  = $this->input->post('id_historial');
$data['historial_id']=$historial_id;
$this->load->view('admin/exploracionFP',$data);
}


//--------------------------------------------------------------


public function ConclucionUpdate()
{
$id_con  = $this->input->post('id_con');
$historial_id  = $this->input->post('historial_id');
$data['historial_id']=$historial_id;
$data['concluciones'] = $this->model_admin->concluciones($historial_id);
$data['count_conc']=$this->model_admin->count_con_dia($historial_id);
$data['show_diagno_def'] = $this->model_admin->show_diagno_def($id_con);
$data['show_diagno_pro1'] = $this->model_admin->show_diagno_pro1($id_con);


$data['show_con_by_id'] = $this->model_admin->show_con_by_id($id_con);
$data['diag_pro']=$this->model_admin->Diag_pro();
$this->load->view('admin/ConclucionUpdate',$data);
$this->load->view('admin/conclusion_footer');
}

public function DeactivarUser()
{
$id= $this->uri->segment(3);
$data = array(
'status'=> 0
);
$this->model_admin->DeactivarUser($id,$data);
$msg = "<div  style='text-align:center;font-size:20px' id='deletesuccess'> <span style='color:green'>Usuario esta deactivado .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('admin/users');

}

public function ActivarUser()
{
$id= $this->uri->segment(3);
$data = array(
'status'=> 1
);
$this->model_admin->DeactivarUser($id,$data);
$msg = "<div  style='text-align:center;font-size:20px' id='deletesuccess'> <span style='color:green'>Usuario esta activado .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('admin/users');

}

public function update_user()
{
$admin_centro=$this->session->userdata['admin_position_centro'];

if($admin_centro){
$data['admin_centro']="&& id_m_c =$admin_centro";
}else{
$data['admin_centro']= "";
}

$id= $this->uri->segment(3);
$data['id_doc']=$id;
$perfil= $this->uri->segment(4);
$data['perfil']= $this->session->userdata['admin_perfil'];
$data['user']=1;
$data['hide']='';
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['causa']=$this->model_admin->getCausa();
$editUser = $this->model_admin->editUser($id);
$data['editUser']=$editUser;
$data['DOCTORS'] = $this->model_admin->getDoctorForUpdate($id);
$data['agend_result']=$this->model_admin->agend_result($id);
$data['agendaDocCentro']=$this->model_admin->agendaDocCentro($id);
$data['diaries']=$this->model_admin->getDiaries();
$data['id_user'] =$id;
$data['id_doctor'] =$id;
$data['id_cu_us']=$this->session->userdata['admin_id'];
 $data['updated_password']= base_url().'password_processing/updated_password_admin';
$data['hide']="";
  $this->load->view('admin/header_admin',$data);
 if($perfil==1){
	 $data['SEGURO_MEDICO_DOCTOR']= $this->model_admin->view_doctor_seguro($id);
	 $data['SOLICITUDES']= $this->model_admin->view_doctor_solicitud($id);
	 $this->load->view('admin/users/update-medico', $data);

 } else if($perfil==2){
	 $this->load->view('admin/users/update-asistente-medico', $data);

 
  } else if($perfil==4){
	
	  $data['query']=$editUser;
	$this->load->view('optica/tecnico-de-lentes/account',$data);
 }
 else if($perfil==3){
		$id_centro=$this->db->select('id_centro')->where('id_user',$id)->get('internal_drugstores_center')->row('id_centro');
		 $data['id_centro']=$id_centro;
	  $data['query']=$editUser;
	$this->load->view('internal-drugstore/account',$data);
 } 

 else
 {
$id_farmacia=$this->db->select('id_farmacia')->where('id_user',$id)->get('user_farmacia')->row('id_farmacia');
$data['farmacia']=$this->db->select('noma')->where('id',$id_farmacia)->get('drug_stores')->row('noma');
$this->load->view('admin/users/update_user', $data);
 }
 $modal='<div class="modal fade" id="changepassw" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>';
echo $modal;
}


public function get_centro_medico2()
{
$id_centro=$this->input->post('id_centro');
$id_user=$this->input->post('id_user');
if($id_centro !=NULL){

for ($i = 0; $i < count($id_centro); ++$i ) {
    $idcentro = $id_centro[$i];
	$sql ="SELECT id_doctor,id_centro FROM doctor_agenda_test WHERE id_centro =$idcentro group by id_doctor";
 $query= $this->db->query($sql);
 foreach ($query->result() as $row){
$asdoc= $this->db->select('id_doctor')->where('id_asdoc',$id_user)->where('id_doctor',$row->id_doctor)->get('centro_doc_as')->row('id_doctor');
		if($row->id_doctor==$asdoc){
		        $selected="selected";
		} else {
		       $selected="";
	    }	 
	 
	 
$name= $this->db->select('name')->where('id_user',$row->id_doctor)->get('users')->row('name');
$centro= $this->db->select('name')->where('id_m_c',$row->id_centro)->get('medical_centers')->row('name');
echo "<option $selected value='$row->id_doctor'>Dr $name - Centro $centro</option>";
 }
}
}
}

public function bill_()
{
$id = encrypt_url($this->uri->segment(3));
$identificar = encrypt_url($this->uri->segment(4));				
redirect("admin/billView/$id/$identificar");		

}


public function bill()
{
$id = $this->uri->segment(3);
$identificar = $this->uri->segment(4);	
$this->billView($id,$identificar);
}



public function billView($idFac,$ident){	
$data['name']=$this->session->userdata['admin_id'];
$data['is_admin']="yes";
$data['controller']="admin";
$this->load->view('admin/header_admin',$data);
$data['id']=$idFac;
$data['identificar']=$ident;
$this->load->view('medico/billing/bill/view-bill-commnun',$data);	
}


public function disableCitaAgendaDoc()
{
$doc=$this->uri->segment(3);
$centro=$this->uri->segment(4);
$data['centro']=$centro;
$data['doc']=$doc;
$QuerycountRdv=$this->db->select('id_apoint')->where('doctor',$doc)->where('centro',$centro)->get('rendez_vous');
$countRdv=$QuerycountRdv->num_rows();
if($countRdv==0){
$where = array(
'id_doctor' =>$doc,
'id_centro' =>$centro
);
$updateData = array(
'active'  =>1);
$this->db->where($where);
$this->db->update("doctor_agenda_test",$updateData);

echo'<div class="modal-header "  id="background_">
<h5 class="modal-title">USTED NO TIENE CITA CON ESTE CENTRO MEDICO, SIN EMBARGO TU AGENDA CON EL HA SIDO INHABILITADA </h5>
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
</div>';
} else{
$this->load->view('admin/users/disabled-rvd-doc-agenda',$data);
}
}



public function SaveUserEdit(){
$id= $this->input->post('id_user');
$centro_medico= $this->input->post('centromedico');
$modify_date=date("Y-m-d H:i:s");
$data = array(
  'name'  => $this->input->post('nombre'),
  'user_ars'=> $this->input->post('seguro'),
  'username' => $this->input->post('user'),
  'updated_by' =>$this->session->userdata['admin_id'],
 'update_date' => $modify_date
  );
$this->model_admin->DeactivarUser($id,$data);
//---------------------------------------------
 $this->model_admin->DelAsistenteCentro($id);
/*foreach ($centro_medico as $idcentro) {

	$data= array(
	'iduser' =>$id,
	'idcentro' => $idcentro
	);

	$this->model_admin->SaveAsistenteCentro($data);
}*/
$msg = "<div  style='text-align:center;font-size:20px' id='deletesuccess'> <span style='color:green'>Modification ok.</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect($_SERVER['HTTP_REFERER']);
}



public function print_estudios()
{
$historial_id= $this->uri->segment(3);
$data['HISTORIAL_MEDICAL'] = $this->model_admin->historial_medical($historial_id);
$data['estudios']=$this->model_admin->print_estudio($historial_id);
$this->load->view('admin/print/estudios', $data);

}


public function print_recetas()
{
$historial_id= $this->uri->segment(3);
$data['HISTORIAL_MEDICAL'] = $this->model_admin->historial_medical($historial_id);
$data['IndicacionesPrevias'] = $this->model_admin->Singularid();
$this->load->view('admin/print/recetas', $data);

}



public function print_laboratorios()
{
$historial_id= $this->uri->segment(3);
$data['HISTORIAL_MEDICAL'] = $this->model_admin->historial_medical($historial_id);
$data['IndicacionesLab'] = $this->model_admin->IndicacionesLab($historial_id);
$data['num_count_lab']=$this->model_admin->hist_count_lab($historial_id);
$this->load->view('admin/print/lab', $data);

}

//----------------------------------------------------------------

public function save_update_patient(){
$idp = $this->input->post('id_p_a');
$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');
//$this->model_admin->deleteInput(4);
//--------------------------------------------

if($_FILES['picture']['tmp_name'] != '')
{
$extension = explode('.', $_FILES['picture']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/img/patients-pictures/' . $logo;
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
 }

else {
	$old_photo=$this->db->select('photo')->where('id_p_a',$idp)->get('patients_appointments')->row('photo');
$logo = $old_photo;

	}

$modify_date=date("Y-m-d H:i:s");
$filter_date=date("Y-m-d");
$save = array(
  'nombre'  => $this->input->post('nombre'),
  'photo'  => $logo,
  'cedula' => $this->input->post('cedula'),
 'date_nacer' => $this->input->post('date_nacer'),
   'edad' => $this->input->post('age'),
  'frecuencia'=> $this->input->post('frecuencia'),
 'tel_resi'  => $this->input->post('tel_resi'),
  'tel_cel'=> $this->input->post('tel_cel'),
  'email' => $this->input->post('email'),
  'sexo' => $this->input->post('sexo'),
   'estado_civil' => $this->input->post('estado_civil'),
  'nacionalidad'=> $this->input->post('nacionalidad'),
 'seguro_medico'  => $this->input->post('seguro_medico'),
 'afiliado'  => $this->input->post('afiliado'),
 'plan'  => $this->input->post('plan'),
  'provincia'=> $this->input->post('provincia'),
  'municipio' => $this->input->post('municipio'),
  'barrio' => $this->input->post('barrio'),
   'calle' => $this->input->post('calle'),
  'contacto_em_nombre'=> $this->input->post('contacto_em_nombre'),
 //'contacto_em_alias'  => $this->input->post('contacto_em_alias'),
  'contacto_em_cel'=> $this->input->post('contacto_em_cel'),
  'contacto_em_tel1' => $this->input->post('contacto_em_tel1'),
  'contacto_em_tel2' => $this->input->post('contacto_em_tel2'),
   'responsable_legal' => $this->input->post('responsable_legal'),
  'cedula_o_pass_menos_edad'=> $this->input->post('cedula_o_pass_menos_edad'),
  'update_date' => $modify_date,
  'filter_date' => $filter_date
  );
$this->model_admin->saveUpdatePatient($idp,$save);
//--------------------------------------


for ($i = 0; $i < count($inputname), $i < count($inputf); ++$i ) {
    $inp = $inputname[$i];
	$inf = $inputf[$i];
   $saveInputs= array(
	'patient_id' =>$idp,
	'input_name' => $inp,
	'inputf' => $inf
	);

	$this->model_admin->saveInput($saveInputs);
}

 $msg = "<div  style='text-align:center;font-size:20px;color:green' id='deletesuccess'>Cambio ha sido hecho con exito .</div>";
$this->session->set_flashdata('save_patient_success', $msg);
//redirect('admin/ver_confirmada_solicitud');
redirect($_SERVER['HTTP_REFERER']);
}



public function SaveConPrenatales()
{

$insert_date=date("Y-m-d H:i:s");
$historial_id=$this->input->post('historial_id');
$save = array(
  'fecha'  => $this->input->post('fecha'),
  'semana'  => $this->input->post('semana'),
  'peso'=> $this->input->post('peso'),
  'tension' => $this->input->post('tension1'),
  'tension11' => $this->input->post('tension11'),
  'alt' => $this->input->post('alt1'),
  'alt11' => $this->input->post('alt11'),
  'alt111' => $this->input->post('alt111'),
  'fetal' => $this->input->post('fetal1'),
  'fetal11' => $this->input->post('fetal11'),
  'edema' => $this->input->post('edema1'),
  'edema11' => $this->input->post('edema11'),
  'otros' => $this->input->post('otros'),
  'evolucion' => $this->input->post('evolucion'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' => $historial_id,
 'inserted_time'=> $insert_date

  );
$this->model_admin->SaveConPrenatales($save);
//----------------------------------------------------
$save2 = array(
  'fecha'  => $this->input->post('fecha2'),
  'semana'  => $this->input->post('semana2'),
  'peso'=> $this->input->post('peso2'),
  'tension' => $this->input->post('tension2'),
  'tension11' => $this->input->post('tension22'),
  'alt' => $this->input->post('alt2'),
  'alt11' => $this->input->post('alt22'),
  'alt111' => $this->input->post('alt222'),
  'fetal' => $this->input->post('fetal2'),
  'fetal11' => $this->input->post('fetal22'),
  'edema' => $this->input->post('edema2'),
  'edema11' => $this->input->post('edema22'),
  'otros' => $this->input->post('otros2'),
  'otros' => $this->input->post('otros2'),
  'evolucion' => $this->input->post('evolucion2'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' => $historial_id,
 'inserted_time'=> $insert_date

  );
$this->model_admin->SaveConPrenatales2($save2);
//-------------------------------------------------------

$save3 = array(
  'fecha'  => $this->input->post('fecha3'),
  'semana'  => $this->input->post('semana3'),
  'peso'=> $this->input->post('peso3'),
  'tension' => $this->input->post('tension3'),
  'tension11' => $this->input->post('tension33'),
  'alt' => $this->input->post('alt3'),
  'alt11' => $this->input->post('alt33'),
  'alt111' => $this->input->post('alt333'),
  'fetal' => $this->input->post('fetal3'),
  'fetal11' => $this->input->post('fetal33'),
  'edema' => $this->input->post('edema3'),
  'edema11' => $this->input->post('edema33'),
  'otros' => $this->input->post('otros3'),
  'evolucion' => $this->input->post('evolucion3'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' => $historial_id,
 'inserted_time'=> $insert_date

  );
$this->model_admin->SaveConPrenatales3($save3);
//----------------------------------------------------
$save4 = array(
  'fecha'  => $this->input->post('fecha4'),
  'semana'  => $this->input->post('semana4'),
  'peso'=> $this->input->post('peso4'),
  'tension' => $this->input->post('tension4'),
  'tension11' => $this->input->post('tension44'),
  'alt' => $this->input->post('alt4'),
  'alt11' => $this->input->post('alt44'),
  'alt111' => $this->input->post('alt444'),
  'fetal' => $this->input->post('fetal4'),
  'fetal11' => $this->input->post('fetal44'),
  'edema' => $this->input->post('edema4'),
  'edema11' => $this->input->post('edema44'),
  'otros' => $this->input->post('otros4'),
  'evolucion' => $this->input->post('evolucion4'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' => $historial_id,
 'inserted_time'=> $insert_date

  );
  $this->model_admin->SaveConPrenatales4($save4);
  //------------------------------------------------------------
  $save5 = array(
  'fecha'  => $this->input->post('fecha5'),
  'semana'  => $this->input->post('semana5'),
  'peso'=> $this->input->post('peso5'),
  'tension' => $this->input->post('tension5'),
  'tension11' => $this->input->post('tension55'),
  'alt' => $this->input->post('alt5'),
  'alt11' => $this->input->post('alt55'),
  'alt111' => $this->input->post('alt555'),
  'fetal' => $this->input->post('fetal5'),
  'fetal11' => $this->input->post('fetal55'),
  'edema' => $this->input->post('edema5'),
  'edema11' => $this->input->post('edema55'),
  'otros' => $this->input->post('otros5'),
  'evolucion' => $this->input->post('evolucion5'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' => $historial_id,
 'inserted_time'=> $insert_date

  );
  $this->model_admin->SaveConPrenatales5($save5);
  //--------------------------------------------------------

  $save6 = array(
  'fecha'  => $this->input->post('fecha6'),
  'semana'  => $this->input->post('semana6'),
  'peso'=> $this->input->post('peso6'),
  'tension' => $this->input->post('tension6'),
  'tension11' => $this->input->post('tension66'),
  'alt' => $this->input->post('alt6'),
  'alt11' => $this->input->post('alt66'),
  'alt111' => $this->input->post('alt666'),
  'fetal' => $this->input->post('fetal6'),
  'fetal11' => $this->input->post('fetal66'),
  'edema' => $this->input->post('edema6'),
  'edema11' => $this->input->post('edema66'),
  'otros' => $this->input->post('otros6'),
  'evolucion' => $this->input->post('evolucion6'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' => $historial_id,
 'inserted_time'=> $insert_date

  );
  $this->model_admin->SaveConPrenatales6($save6);
  //-----------------------------------------------------------
  $save7 = array(
  'fecha'  => $this->input->post('fecha7'),
  'semana'  => $this->input->post('semana7'),
  'peso'=> $this->input->post('peso7'),
  'tension' => $this->input->post('tension7'),
  'tension11' => $this->input->post('tension77'),
  'alt' => $this->input->post('alt7'),
  'alt11' => $this->input->post('alt77'),
  'alt111' => $this->input->post('alt777'),
  'fetal' => $this->input->post('fetal7'),
  'fetal11' => $this->input->post('fetal77'),
  'edema' => $this->input->post('edema7'),
  'edema11' => $this->input->post('edema77'),
  'otros' => $this->input->post('otros7'),
  'evolucion' => $this->input->post('evolucion7'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' => $historial_id,
 'inserted_time'=> $insert_date

  );
  $this->model_admin->SaveConPrenatales7($save7);
  //------------------------------------------------------
  $save8 = array(
  'fecha'  => $this->input->post('fecha8'),
  'semana'  => $this->input->post('semana8'),
  'peso'=> $this->input->post('peso8'),
  'tension' => $this->input->post('tension8'),
  'tension11' => $this->input->post('tension88'),
  'alt' => $this->input->post('alt8'),
  'alt11' => $this->input->post('alt88'),
  'alt111' => $this->input->post('alt888'),
  'fetal' => $this->input->post('fetal8'),
  'fetal11' => $this->input->post('fetal88'),
  'edema' => $this->input->post('edema8'),
  'edema11' => $this->input->post('edema88'),
  'otros' => $this->input->post('otros8'),
  'evolucion' => $this->input->post('evolucion8'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' => $historial_id,
 'inserted_time'=> $insert_date

  );
  $this->model_admin->SaveConPrenatales8($save8);
  //--------------------------------------------------
  $save9 = array(
  'fecha'  => $this->input->post('fecha9'),
  'semana'  => $this->input->post('semana9'),
  'peso'=> $this->input->post('peso9'),
  'tension' => $this->input->post('tension9'),
  'tension11' => $this->input->post('tension99'),
  'alt' => $this->input->post('alt9'),
  'alt11' => $this->input->post('alt99'),
  'alt111' => $this->input->post('alt999'),
  'fetal' => $this->input->post('fetal9'),
  'fetal11' => $this->input->post('fetal99'),
  'edema' => $this->input->post('edema9'),
  'edema11' => $this->input->post('edema99'),
  'otros' => $this->input->post('otros9'),
  'evolucion' => $this->input->post('evolucion9'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' => $historial_id,
 'inserted_time'=> $insert_date

  );
  $this->model_admin->SaveConPrenatales9($save9);
  $this->model_admin->DeleteEmptyControlPrenatal2();
  $this->model_admin->DeleteEmptyControlPrenatal3();
  $this->model_admin->DeleteEmptyControlPrenatal4();
  $this->model_admin->DeleteEmptyControlPrenatal5();
  $this->model_admin->DeleteEmptyControlPrenatal6();
  $this->model_admin->DeleteEmptyControlPrenatal7();
  $this->model_admin->DeleteEmptyControlPrenatal8();
  $this->model_admin->DeleteEmptyControlPrenatal9();
  //----------------------------------------------------
  $data['historial_id']=$historial_id;
   $data['ControPrenal']=$this->model_admin->ControPrenal($historial_id);
	$data['count_cont_prenal']=$this->model_admin->CountControPrenal($historial_id);
$this->load->view('admin/historial-medical/control-prenatal/index',$data);
}

public function Controprenal()
{
$historial_id  = $this->input->post('id_historial');
$data['historial_id']=$historial_id;
$data['ControPrenal']=$this->model_admin->ControPrenal($historial_id);
	$data['count_cont_prenal']=$this->model_admin->CountControPrenal($historial_id);

$this->load->view('admin/historial-medical/control-prenatal/index',$data);
}





  public function rehabilitation()
{
$id_historial=$this->uri->segment(3);
$this->session->set_userdata('historial_id', $id_historial);
$data['historial_id']=$id_historial;
$if_reab_found=$this->model_admin->IfReabFound($id_historial);
 if($if_reab_found < 1){
$this->load->view('admin/historial-medical/rehabilitation/index',$data);
  }
  else{
	  //$data['rehab']=$this->model_admin->showRehabilidad($historial_id);
	  //$this->load->view('admin/rehabilitation_not_empty',$data);
	  redirect('admin/historial-medical/rehabilitation/data');

  }
}


  public function rehabilitation_not_empty() {
	   $data = array();
	  //total rows count
        $totalRec = count($this->cipaginationmodel->getRows());

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'admin/ajaxPaginationDataRehabilitation';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
          $data['tot_rows']=$totalRec;

        //get the posts data
        $data['displayRehab'] = $this->cipaginationmodel->getRows(array('limit'=>$this->perPage));
        //load the view
		$this->load->view('admin/historial_top',$data);
        $this->load->view('admin/historial-medical/rehabilitation/data', $data);
        }

function ajaxPaginationDataRehabilitation(){
        $page1 = $this->input->post('page');
        if(!$page1){
            $offset = 0;
        }else{
            $offset = $page1;
        }

        //total rows count
        $totalRec = count($this->cipaginationmodel->getRows());

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'admin/ajaxPaginationDataRehabilitation';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);

        //get the posts data
        $data['displayRehab'] = $this->cipaginationmodel->getRows(array('start'=>$offset,'limit'=>$this->perPage));

        //load the view
        $this->load->view('admin/ajax-pagination-data', $data, false);
    }


  public function test_ssr() {
	   $data = array();
	  //total rows count
        $totalRec = count($this->cipaginationmodel->getRowsSSR());

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'admin/paginationSSR';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
          $data['tot_rows']=$totalRec;

        //get the posts data
        $data['displaySSR'] = $this->cipaginationmodel->getRowsSSR(array('limit'=>$this->perPage));
        //load the view

        $this->load->view('admin/historial-medical1/ante_ssr/test', $data);
        }



function paginationSSR(){
        $page1 = $this->input->post('page');
        if(!$page1){
            $offset = 0;
        }else{
            $offset = $page1;
        }

        //total rows count
        $totalRec = count($this->cipaginationmodel->getRowsSSR());

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'admin/paginationSSR';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);

        //get the posts data
        $data['displaySSR'] = $this->cipaginationmodel->getRowsSSR(array('start'=>$offset,'limit'=>$this->perPage));

        //load the view
         $this->load->view('admin/historial-medical1/ante_ssr/pagination-ssr', $data);
    }

public function newRehabilitation()
{
$historial_id= $this->input->post('id_historial');
//$historial_id=$this->uri->segment(3);
$this->session->set_userdata('historial_id', $historial_id);
$data['HISTORIAL_MEDICAL'] = $this->model_admin->historial_medical($historial_id);
$data['historial_id']=$historial_id;
//$totalRec = count($this->cipaginationmodel->getRows());
//$data['tot_rows']=$totalRec;
$data['count_rehab']=$this->model_admin->countRehab($historial_id);
$data['rehab']=$this->model_admin->Rehab($historial_id);
//$this->load->view('admin/historial_top.php',$data);
$this->load->view('admin/historial-medical/rehabilitation/index',$data);


}


public function showOftalById(){
$id = $this->input->post('on_select_show');
$data['showOftalById'] = $this->model_admin->showOftalById($id);
$this->load->view('admin/showOftalById', $data);

}



  //-----------------oftalmologia----------------------------------------------------------------------




   public function oftalmologia_not_empty() {
	   $data = array();
	    //total rows count
        $totalRec = count($this->cipaginationmodel->getRowsOftal());
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'admin/ajaxPaginationDataOftalmologia';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
        //get the posts data
        $data['posts'] = $this->cipaginationmodel->getRowsOftal(array('limit'=>$this->perPage));
        $this->load->view('admin/historial_top.php',$data);
        //load the view
        $this->load->view('admin/historial-medical/oftalmologia/data', $data);
        }

function ajaxPaginationDataOftalmologia(){
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }

        //total rows count
        $totalRec = count($this->cipaginationmodel->getRowsOftal());

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'admin/ajaxPaginationDataOftalmologia';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);

        //get the posts data
        $data['posts'] = $this->cipaginationmodel->getRowsOftal(array('start'=>$offset,'limit'=>$this->perPage));

        //load the view
        $this->load->view('admin/ajax-pagination-data-oftalmologia', $data, false);
    }





  public function oftalmologia()
{
$id_historial=$this->uri->segment(3);
$this->session->set_userdata('historial_id', $id_historial);
$data['historial_id']=$id_historial;
$if_oftal_found=$this->model_admin->IfOftalFound($id_historial);
 if($if_oftal_found < 1){
$this->load->view('admin/historial-medical/oftalmologia/index',$data);
  }
  else{
	 redirect('admin/historial-medical/oftalmologia/data',$data);

  }
}


 public function createOftalmologia()
{
$historial_id= $this->input->post('id_historial');
//$historial_id=$this->uri->segment(3);
$this->session->set_userdata('historial_id', $historial_id);
$data['HISTORIAL_MEDICAL'] = $this->model_admin->historial_medical($historial_id);
$data['historial_id']=$historial_id;
//$totalRec = count($this->cipaginationmodel->getRowsOftal());
//$data['tot_rows']=$totalRec;
//$this->load->view('admin/historial_top.php',$data);
$data['count_oftal']=$this->model_admin->countOftal($historial_id);
$data['oftal']=$this->model_admin->Oftal($historial_id);
$this->load->view('admin/historial-medical/oftalmologia/index',$data);

}





public function NewPassword(){
$id= $this->input->post('id_user');
$data = array(
  'password' => md5($this->input->post('pass1'))
  );
$this->model_admin->DeactivarUser($id,$data);
$msgs='<p  class="alert alert-success">La Contraseña esta cambiada.</p>';
$this->session->set_flashdata('msg_pass',$msgs);
redirect($_SERVER['HTTP_REFERER']);
}


public function newPasswordAsitente(){
$pass1=$this->input->post('pass1');
$pass2=$this->input->post('pass2');
$id_user=$this->input->post('id_user');
$id_table=$this->input->post('id_table');

if($pass1=='' || $pass2==''){
 $response['status'] =0;
$response['message'] = 'los dos campos son obligatorios!'; 
} elseif($pass1 != $pass2){
 $response['status'] =2;
$response['message'] = 'la contraseña no coincide!'; 	
}
else{		
$data = array(
  'password' => md5($pass1),
  'updated_by' => $id_user,
  'update_date' => date("Y-m-d H:i:s")
  );
$this->model_admin->DeactivarUser($id_table,$data);
 $response['status'] =1;
$response['message'] = 'Cambiada con éxito!.'; 
$where = array(
'user_id' =>$id_user
);

$this->db->where($where);
$this->db->delete('current_user_info');

}
echo json_encode($response);
}




public function cambiarPlazo(){
$id= $this->input->post('id_user');
$plazo= $this->input->post('plazo');
$plazo= date("Y-m-d",strtotime($plazo));
$data = array(
  'plazo' => $plazo
  );
$this->model_admin->DeactivarUser($id,$data);
$msgs='<p  class="alert alert-success">Plazo ha sido cambiado.</p>';
$this->session->set_flashdata('msg_pass',$msgs);
redirect($_SERVER['HTTP_REFERER']);
}





public function NewPasswordSolved(){
$id= $this->input->post('id_user');
$data = array(
  'password' => md5($this->input->post('pass1'))
  );
$this->model_admin->DeactivarUser($id,$data);
$this->login_model->user_login_twice_remove($id);
$msgs='<p  class="alert alert-success">La Contraseña esta cambiada.</p>';
$this->db->like('data', $id);
 $this->db->delete('ci_sessions');
$this->session->set_flashdata('msg_pass',$msgs);
redirect('login');
}

public function UpdatePatient()
{
$id= $this->uri->segment(3);
$seguro_medico= $this->uri->segment(4);
//$id = $this->input->post('idpatient');
//$seguro_medico = $this->input->post('seguro_name');
$data['patient_id']=$id;
$data['GET_INPUT']= $this->model_admin->get_input($seguro_medico);
$data['patient'] = $this->model_admin->historial_medical($id);
$data['countries'] = $this->model_admin->getCountries();
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['provinces']=$this->model_admin->getProvinces();
$data['causa']=$this->model_admin->getCausa();
$data['municipios'] = $this->model_admin->getTownships();
$data['doctors'] = $this->model_admin->display_all_doctors();
$this->load->view('admin/UpdatePatient', $data);
}







public function PatientNec()
{
$idpatient = $this->input->get('patient_nec');
$data['nec'] = $this->model_admin->getNec();
$data['idpatient']=$idpatient;
$data['GET_NAMEF']= $this->model_admin->GET_NAMEF($idpatient);
$data['countries'] = $this->model_admin->getCountries();
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['municipios'] = $this->model_admin->getTownships();
$data['provinces']=$this->model_admin->getProvinces();
$data['causa']=$this->model_admin->getCausa();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['doctors'] = $this->model_admin->display_all_doctors();
$data['patient'] = $this->model_admin->historial_medical($idpatient);
$query = $this->model_admin->RendezVous($idpatient);
$data['rendez_vous']=$query;
$data['number_cita']=count($query);
//$data['FindCita'] = $this->model_admin->FindCita($id);
$this->load->view('admin/header_patient');
$this->load->view('admin/search_patient',$data);
$this->load->view('admin/Patient', $data);
$this->load->view('admin/modal_cita',$data);
 $this->load->view('admin/footer');
 $this->load->view('admin/footer_patient_search');

}



 public function save_new_name()
{
$save= array(
  'name'=> $this->input->post('new_name'),
  'location'=> $this->input->post('location')
   );
    $this->model_admin->saveName($save);
}

	 public function SaveMedicine()
	{
	$medicine= $this->input->post('selectmedic');

	foreach ($medicine as $med) {
	$save = array(
	  'medicine'  => $med,
	 'id_patient' => $this->input->post('id_historial')
	);
		$this->model_admin->SaveMedicine($save);
	}
	//delete duplicate medicine
	$this->db->query("DELETE e1 FROM patient_medicine e1, patient_medicine e2
	WHERE e1.medicine = e2.medicine AND e1.id > e2.id");
	}

	public function get_doc()
{
	$id_esp=$this->input->post('id_esp');
	$data['doc'] = $this->model_admin->get_doc_esp_tarif($id_esp);
	$this->load->view('admin/get_doc', $data);
	 //echo json_encode ($query);
}



public function getDocSeg()
{
$id_doc=$this->input->post('id_doc');

//SELECT id_sm,title FROM seguro_medico WHERE  id_sm NOT IN (SELECT id_seguro from tarifarios where id_doctor=!)
//$sql ="SELECT a.* FROM seguro_medico a NATURAL LEFT JOIN tarifarios b WHERE b.id_doctor !=$id_doc";
$sql ="SELECT id_sm,title FROM seguro_medico";
$query= $this->db->query($sql);
foreach($query->result() as $row) {
$id_seguro=$this->db->select('id_seguro')->where('id_doctor',$id_doc)->where('id_seguro',$row->id_sm)->get('tarifarios')->row('id_seguro');
if($row->id_sm ==$id_seguro){
$disabled="disabled";
}else{
$disabled="";
}
echo "<option value=''></option>";
echo "<option value='$row->id_sm' $disabled >$row->title</option>";
}

}







public function getMuncipio()
{
	$id_mun=$this->input->post('id_mun');
	$data['municipio'] = $this->model_admin->getMuncipio($id_mun);
	$this->load->view('admin/getMuncipio', $data);
	 //echo json_encode ($query);
}



 public function drugstores()
{ $data['drugstores'] = $this->model_admin->Drugstores();
	$this->load->view('admin/drugstores/view_drugstores', $data);
}

	 public function newDrugstore()
{
	$perfil="Farmacia";
	$data['users'] = $this->model_admin->DrugstoreUser($perfil);
	$this->load->view('admin/drugstores/newDrugstore',$data);
}



 public function pharmaceutical_laboratory()
{ 
$this->load->view('admin/header_admin');
$sql ="SELECT * FROM pharmaceutical_laboratory ORDER BY id DESC";
$data['query']= $this->db->query($sql);
$this->load->view('admin/pharmaceutical-laboratory/list-pha-lab', $data);
}


public function listOfEstudios(){
$this->load->view('admin/header_admin');
$sql ="SELECT * FROM estudios ORDER BY id DESC";
$data['query']= $this->db->query($sql);
$this->load->view('admin/estudios/index',$data);

}


 public function newEstudios()
{
$this->load->view('admin/header_admin');
$this->load->view('admin/estudios/create');
}



public function saveEstudios(){
$name=$this->input->post('name');
$insert_date=date("Y-m-d H:i:s");
$query = $this->db->get_where('estudios',array('nombre_comercial'=>$name));
	if($query->num_rows() > 0 )
{
$msg = "<div class='alert alert-warning' style='text-align:center;font-size:20px' id='deletesuccess'>El centro medico : <span style='color:green'>$name</span> ya existe .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('admin/newEstudios');
}
else{
if(isset($_FILES["picture"]['name']))
{
$imgExt = strtolower(pathinfo($_FILES["picture"]['name'],PATHINFO_EXTENSION));
$extension = explode('.', $_FILES['picture']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/img/centros_medicos/' . $logo;
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);

if($imgExt==""){
	$logo="";
}
}
//================================================================================
$save = array(
  'nombre_comercial'  => $name,
  'logo'  => $logo,
  'registro_sanitario'=> $this->input->post('registro'),
  'rnc'=> $this->input->post('rnc'),
  'direccion' => $this->input->post('direccion'),
  'pais' => $this->input->post('pais'),
   'provincia' => $this->input->post('provincia'),
 'ciudad'=> $this->input->post('ciudad'),
  'telefono' => $this->input->post('primer_tel'),
   'pagina_web' => $this->input->post('email'),
   'correo' => $this->input->post('web'),
  'inserted_by'=> $this->session->userdata['admin_id'],
  'updated_by'=> $this->session->userdata['admin_id'],
 'inserted_time'=> $insert_date,
  'updated_time' => $insert_date
  );
$this->db->insert("estudios",$save);
$msg = "<div  style='text-align:center'>El Centro Medico : <span style='color:green'>$name_success</span> se guada con exito .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('admin/newEstudios');
}
}


 public function newPhaLab()
{
$this->load->view('admin/header_admin');
$this->load->view('admin/pharmaceutical-laboratory/create-pha-lab');
}

 public function create_lab_lentes()
{
$this->load->view('admin/header_admin');
$this->load->view('optica/labo/create');
}



 public function updatePhaLab($id)
{
$this->load->view('admin/header_admin');
$sql ="SELECT * FROM pharmaceutical_laboratory WHERE id=$id";
$data['query']= $this->db->query($sql);
$this->load->view('admin/pharmaceutical-laboratory/update-pha-lab',$data);
}


 public function updateLabLentes($id)
{
$this->load->view('admin/header_admin');
$sql ="SELECT * FROM labo_lentes WHERE id=$id";
$data['query']= $this->db->query($sql);
$this->load->view('optica/labo/update',$data);
}




 public function updateEstudios($id)
{
$this->load->view('admin/header_admin');
$sql ="SELECT * FROM estudios WHERE id=$id";
$data['query']= $this->db->query($sql);
$this->load->view('admin/estudios/update',$data);
}





 public function viewPhaLab($id)
{
$this->load->view('admin/header_admin');
$sql ="SELECT * FROM pharmaceutical_laboratory WHERE id=$id";
$data['query']= $this->db->query($sql);
$this->load->view('admin/pharmaceutical-laboratory/view-pha-lab',$data);
}


 public function viewLabLentes($id)
{
$this->load->view('admin/header_admin');
$sql ="SELECT * FROM labo_lentes WHERE id=$id";
$data['query']= $this->db->query($sql);
$this->load->view('optica/labo/view',$data);
}

 public function viewEstudios($id)
{
$this->load->view('admin/header_admin');
$sql ="SELECT * FROM estudios WHERE id=$id";
$data['query']= $this->db->query($sql);
$this->load->view('admin/estudios/view',$data);
}


public function saveLaboLentes(){
$name=$this->input->post('name');
$lab_user=$this->input->post('lab_user');
$insert_date=date("Y-m-d H:i:s");
$query = $this->db->get_where('labo_lentes',array('nombre_comercial'=>$name));
	if($query->num_rows() > 0 )
{
$msg = "<div class='alert alert-warning' style='text-align:center;font-size:20px' id='deletesuccess'>El centro medico : <span style='color:green'>$name</span> ya existe .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('admin/lab_lentes');
}
else{
if(isset($_FILES["picture"]['name']))
{
$imgExt = strtolower(pathinfo($_FILES["picture"]['name'],PATHINFO_EXTENSION));
$extension = explode('.', $_FILES['picture']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/img/centros_medicos/' . $logo;
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);

if($imgExt==""){
	$logo="";
}
}
//================================================================================
$save = array(
  'nombre_comercial'  => $name,
  'logo'  => $logo,
  'rnc'=> $this->input->post('rnc'),
  'direccion' => $this->input->post('direccion'),
  'pais' => $this->input->post('pais'),
   'provincia' => $this->input->post('provincia'),
 'ciudad'=> $this->input->post('ciudad'),
  'telefono' => $this->input->post('primer_tel'),
   'pagina_web' => $this->input->post('email'),
   'correo' => $this->input->post('web'),
  'inserted_by'=> $this->session->userdata['admin_id'],
  'updated_by'=> $this->session->userdata['admin_id'],
 'inserted_time'=> $insert_date,
  'updated_time' => $insert_date
  );
$this->db->insert("labo_lentes",$save);
$id_m_c=$this->db->insert_id();
foreach ($lab_user as $adduser) {

	$savelabu= array(
	'id_lab_lente' =>$id_m_c,
	'id_user' => $adduser
	);

	$this->db->insert("user_oftal_lab_lentes",$savelabu);
	//update lab lentes
	$savelabl= array(
	'id_lab_lente' =>$id_m_c
	);
	$wherelabl = array(
      'id_doc' =>$adduser
     );
	$this->db->where($wherelabl);
	$this->db->update("laboratory_lentes",$savelabl);
}



$msg = "<div  style='text-align:center'>El Centro Medico : <span style='color:green'>$name_success</span> se guada con exito .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('admin/lab_lentes');
}
}



public function saveUpdateLabLentes(){
$id_m_c  = $this->input->post('id_m_c');
$lab_user  = $this->input->post('lab_user');
//===================================================
if($_FILES['picture']['tmp_name'] != '')
{
$extension = explode('.', $_FILES['picture']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/img/centros_medicos/' . $logo;
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
 }

else {
$old_logo=$this->db->select('logo')->where('id',$id_m_c)->get('labo_lentes')->row('logo');
$logo = $old_logo;

	}

//===================================================

$data = array(
  'nombre_comercial'  => $this->input->post('name'),
  'logo'  => $logo,
  'rnc'=> $this->input->post('rnc'),
  'direccion' => $this->input->post('direccion'),
  'pais' => $this->input->post('pais'),
   'provincia' => $this->input->post('provincia'),
 'ciudad'=> $this->input->post('ciudad'),
  'telefono' => $this->input->post('primer_tel'),
   'pagina_web' => $this->input->post('email'),
   'correo' => $this->input->post('web'),
  'updated_by'=> $this->session->userdata['admin_id'],
  'updated_time' => date("Y-m-d H:i:s")
  );
$where = array(
'id' =>$id_m_c
);

$this->db->where($where);
$this->db->update("labo_lentes",$data);

if($lab_user ){
$wherelab = array(
'id_lab_lente' =>$id_m_c
);

$this->db->where($wherelab);
$this->db->delete('user_oftal_lab_lentes');

//insert seguro in table medical_centro_seguro
foreach ($lab_user as $adduser) {

	$savelabu= array(
	'id_lab_lente' =>$id_m_c,
	'id_user' => $adduser
	);

	$this->db->insert("user_oftal_lab_lentes",$savelabu);
	//update lab lentes
	$savelabl= array(
	'id_lab_lente' =>$id_m_c
	);
	$wherelabl = array(
      'id_doc' =>$adduser
     );
	$this->db->where($wherelabl);
	$this->db->update("laboratory_lentes",$savelabl);
	
}
}

redirect($_SERVER['HTTP_REFERER']);
}


public function savePhaLab(){
$name=$this->input->post('name');
$insert_date=date("Y-m-d H:i:s");
$query = $this->db->get_where('pharmaceutical_laboratory',array('nombre_comercial'=>$name));
	if($query->num_rows() > 0 )
{
$msg = "<div class='alert alert-warning' style='text-align:center;font-size:20px' id='deletesuccess'>El centro medico : <span style='color:green'>$name</span> ya existe .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('admin/newPhaLab');
}
else{
if(isset($_FILES["picture"]['name']))
{
$imgExt = strtolower(pathinfo($_FILES["picture"]['name'],PATHINFO_EXTENSION));
$extension = explode('.', $_FILES['picture']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/img/centros_medicos/' . $logo;
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);

if($imgExt==""){
	$logo="";
}
}
//================================================================================
$save = array(
  'nombre_comercial'  => $name,
  'logo'  => $logo,
  'registro_sanitario'=> $this->input->post('registro'),
  'rnc'=> $this->input->post('rnc'),
  'direccion' => $this->input->post('direccion'),
  'pais' => $this->input->post('pais'),
   'provincia' => $this->input->post('provincia'),
 'ciudad'=> $this->input->post('ciudad'),
  'telefono' => $this->input->post('primer_tel'),
   'pagina_web' => $this->input->post('email'),
   'correo' => $this->input->post('web'),
  'inserted_by'=> $this->session->userdata['admin_id'],
  'updated_by'=> $this->session->userdata['admin_id'],
 'inserted_time'=> $insert_date,
  'updated_time' => $insert_date
  );
$this->db->insert("pharmaceutical_laboratory",$save);
$msg = "<div  style='text-align:center'>El Centro Medico : <span style='color:green'>$name_success</span> se guada con exito .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('admin/newPhaLab');
}
}


public function payByOtherMeans(){
	
$data = array(
   'payment_plan' => $this->input->post('plan-pago'),
   'plazo' =>date('Y-m-d'),
   'cuenta_gratis' =>1
 );
  
$where = array(
'id_user' =>$this->input->post('this-doc-plan')
);

$this->db->where($where);
$this->db->update("users",$data);	
redirect($_SERVER['HTTP_REFERER']);	
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
redirect('admin/newDrugstore');
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
     $this->load->view('admin/drugstores/view_drugstore', $data);
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
	$this->load->view('admin/drugstores/load_drugstore_by_id', $data);
     }



 public function patient_medica()
	 {
	 $id= $this->uri->segment(3);
	$query = $this->model_admin->patMedica($id);
	$data['info']=$query;
     $data['num']=count($query);
     $this->load->view('admin/drugstores/pop_up_medica', $data);
     }

 public function ante_ssr()
{
$historial_id  = $this->input->post('id_historial');
$data['id_historial']=$historial_id;
$data['count_ssr']=$this->model_admin->count_ssr($historial_id);
$data['ssr']=$this->model_admin->getSSR($historial_id);
$rows=$this->model_admin->countSSR($historial_id);
$this->load->view('admin/historial-medical/ante_ssr/index',$data);
$this->load->view('admin/historial-medical/ante_ssr/footer');
}








public function printAntGeneral()
{
$historial_id= $this->uri->segment(3);
$data['HISTORIAL_MEDICAL'] = $this->model_admin->historial_medical($historial_id);
$data['row_ant'] = $this->model_admin->showAnte($historial_id);
$this->load->view('admin/print/ant_general', $data);
}


 public function data_ssr_by_id(){
//$id  = $this->input->post('id_ssr');
//$historial_id = $this->input->post('hist_id');

$id=$this->uri->segment(3);
$historial_id=$this->uri->segment(4);


$data['id_historial'] =$historial_id;
$data['ssr'] = $this->model_admin->data_ssr_by_id($id);
$data['count_ssr']=$this->model_admin->count_ssr($historial_id);
$data['ssr_nav'] = $this->model_admin->getSSR($historial_id);
//$this->load->view('admin/historial-medical/ante_ssr/navegador',$data);
$this->load->view('admin/historial-medical/ante_ssr/ant_ssr_data', $data);
$this->load->view('admin/historial-medical/ante_ssr/footer');
}







public function pediatrico()
{
$historial_id  = $this->input->post('id_historial');
$data['id_historial']=$historial_id;
$data['medicamentos'] = $this->model_admin->medicamentos();
$data['count_pedia']=$this->model_admin->countant_pedia($historial_id);
$data['pedia']=$this->model_admin->Getpedia($historial_id);
$this->load->view('admin/historial-medical/pediatrico/index',$data);
$this->load->view('admin/historial-medical/pediatrico/footer');

}

public function vacuna()
{
$historial_id  = $this->input->post('id_historial');
$data['id_historial']=$historial_id;
$data['date_nacer'] = $this->model_admin->historial_medical($historial_id);
$this->load->view('admin/vacuna',$data);
//$this->load->view('admin/pediatrico_footer');
}

 public function vacuna_data(){
$id_historial  = $this->input->get('id_historial');
$data['vacuna'] = $this->model_admin->getVacunaData($id_historial);
$this->load->view('admin/vacuna_data', $data);
}



//----------------------------------------------------------------------











/*public function billing_centro_medico()
{
$this->load->view('admin/head_admin');
$this->load->view('admin/billing/bill/centro/create');

}*/




public function get_tarifario()
{
	$id=$this->input->post('id');
	$data['result'] = $this->model_admin->get_tarifario($id);
	$this->load->view('admin/billing/mssm/get-tarifario', $data);
}


public function docInfo()
{
$id=$this->input->get('id');
$data['RESULT_DOCTOR']= $this->model_admin->view_doctor($id);
$result= $this->model_admin->view_doctor_centro($id);
$data['CENTRO_MEDICO_DOCTOR']=$result;
$data['count']=count($result);
$this->load->view('admin/billing/mssm/get_doc_on_select',$data);

}

public function centro_info()
{
$id=$this->input->get('id');
$data['RESULT_CENTRO']= $this->model_admin->display_centro_medico($id);
$result= $this->model_admin->get_doctor($id);
$data['RESULT_DOCTOR']=$result;
$data['count']=count($result);
$this->load->view('admin/billing/mssm/centro/get_centro_on_select',$data);

}

public function ajaxsearchcedulafac()
{

if(is_null($this->input->get('cedula')))
{

//$this->load->view('admin/examenf');

}
else
{
$id_p=$this->db->select('id_p_a')->where('cedula',$this->input->get('cedula'))->get('patients_appointments')->row('id_p_a');
$id_doctor=$this->db->select('doctor')->where('id_patient',$id_p)->get('rendez_vous')->row('doctor');
$data['CENTRO_MEDICO_DOCTOR']= $this->model_admin->view_doctor_centro($id_doctor);
//$data['diag_pro']=$this->model_admin->Diag_pro();
//$data['diag_pres']=$this->model_admin->Diag_pres();
$data['necpatient']=$this->model_admin->CedulaPatientFac($id_p);
$data['serv']=$this->model_admin->Serviciomssm();
$this->load->view('admin/outputpatientnecfac',$data);

}
}
















public function saveMss()
{
//$insum=$this->model_admin->countSearchInsumno($this->input->post('insumservicio'));

//if($insum == 0){
$seguro = $this->input->post('seguro');
$codigo = $this->input->post('codigo');
$precio = $this->input->post('precio');
$insumservicio =$this->input->post('insumservicio');
$insert_date=date("Y-m-d H:i:s");

$save= array(
'categoria' =>$this->input->post('categoria'),
'codcup' =>$this->input->post('codcup'),
'insumservicio' =>$insumservicio,
'doctorid' =>$this->input->post('doctorid'),
'inserted_by' =>$this->input->post('inserted_by'),
'inserted_time' =>$insert_date,
'updated_by' =>$this->input->post('inserted_by'),
'updated_time' =>$insert_date
);
$this->model_admin->saveMss1($save);
$last_mssm1_id=$this->db->select('id')->order_by('id','desc')->limit(1)->get('mssn1')->row('id');

for ($i = 0; $i < count($seguro); ++$i ) {
$s = $seguro[$i];
$c= $codigo[$i];
$p = $precio[$i];
$save2= array(
'seguro' =>$s,
'codigo' =>$c,
'precio' =>$p,
'doc_id' =>$this->input->post('doctorid'),
'ins_date' =>$insert_date,
'upd_date' =>$insert_date,
'id_mssm1' =>$last_mssm1_id
);
$this->model_admin->saveMss2($save2);
};

//}
}



public function save_mss2()
{
//$insum=$this->model_admin->countSearchInsumno($this->input->post('insumservicio'));

//if($insum == 0){
$seguro = $this->input->post('seguro');
$codigo = $this->input->post('codigo');
$precio = $this->input->post('precio');
$insumservicio =$this->input->post('insumservicio');
$insert_date=date("Y-m-d H:i:s");

$save= array(
'categoria' =>$this->input->post('categoria'),
'codcup' =>$this->input->post('codcup'),
'insumservicio' =>$insumservicio,
'centroid' =>$this->input->post('id_centro'),
'inserted_by' =>$this->input->post('inserted_by'),
'inserted_time' =>$insert_date,
'updated_by' =>$this->input->post('inserted_by'),
'updated_time' =>$insert_date
);
$this->model_admin->saveMss1($save);
$last_mssm1_id=$this->db->select('id')->order_by('id','desc')->limit(1)->get('mssn1')->row('id');

for ($i = 0; $i < count($seguro); ++$i ) {
$s = $seguro[$i];
$c= $codigo[$i];
$p = $precio[$i];
$save2= array(
'seguro' =>$s,
'codigo' =>$c,
'precio' =>$p,
'centro_id' =>$this->input->post('id_centro'),
'ins_date' =>$insert_date,
'upd_date' =>$insert_date,
'id_mssm1' =>$last_mssm1_id
);
$this->model_admin->saveMss2($save2);
};

//}
}




 public function updateCat()
{
$idmssm1 =$this->input->post('idmssm1');
$data= array(
'categoria' =>$this->input->post('categ'),
'codcup' =>$this->input->post('codcup'),
'insumservicio' =>$this->input->post('insumservicio'),
'updated_by' =>$this->input->post('update_by')
);
$this->model_admin->updateMss1($idmssm1,$data);
}



public function medical_insurance_audit_profile()
{
	$data['id_user']=$this->session->userdata['admin_id'];
	$data['name']=$this->session->userdata['admin_name'];
	$data['perfil']=$this->session->userdata['admin_perfil'];
	$data['model']="model_admin";
	$data['id_seguro']="";
$data['codigo']=$this->model_admin->all_codigo_prestador();
$data['medicos_facturar']=$this->model_admin->medicos_facturar();
$data['exequatur_medico_factura']=$this->model_admin->exequatur_medico_factura();
$data['cedula_medico_factura']=$this->model_admin->cedula_medico_factura();
$this->load->view('admin/header_admin',$data);
$this->load->view('admin/billing/medical_insurance_audit_profile/create',$data);
 $this->load->view('admin/footer');
}





public function count_patient_num_contrato()
{
	$god_own = $this->input->get('god_own');
	$data['medico'] =$this->input->get('medico');
	$data = array(
   'desde' =>$this->input->get('desde'),
	'hasta' =>$this->input->get('hasta'),
	'medico' =>$this->input->get('medico')
	);
	$count = $this->model_admin->count_patient_num_contrato($data);
	$data['count']=count($count);
	$data['get_numero_contrado_patients']=$count;
	if($god_own=="no"){
	$this->load->view('admin/billing/medical_insurance_audit_profile/count_patient_num_contrato', $data);

	}
	else{
	$this->load->view('admin/billing/medical_insurance_audit_profile/go_down_patient_num_con',$data);

	}

}








public function medical_insurance_audit_profile_print()
{
$data = array(
'desde' =>$this->uri->segment(3),
'hasta' =>$this->uri->segment(4),
'medico' =>$this->uri->segment(5)
);
$data['last_id']=$this->db->select('id')->order_by('id','desc')->limit(1)->get('medical_insurance_audit_profile')->row('id');
$results=$this->model_admin->show_patient_arc_report($data);
$data['patient_rows']=$results;
$data['count']=count($results);
$this->load->view('admin/print/medical_insurance_audit_profile',$data);

}

public function test()
{



$this->load->view('admin/test');

}





//===================Import excel file==========================================================










public function edit_tarifario()
{
$id_tarif =$this->uri->segment(3);
$data['isedit'] =$this->uri->segment(4);
$data['results']= $this->model_admin->edit_tarifario($id_tarif);
$this->load->view('admin/tarifarios/doctors/update', $data);
}


public function edit_tarifario_centro()
{
$id_tarif =$this->uri->segment(3);
$data['results']= $this->model_admin->edit_tarifario_centro($id_tarif);
$this->load->view('admin/tarifarios/centros/update', $data);
}







public function addDoctTarif1(){
$id_doc = $this->input->post('id_doc');
$id_categoria = $this->input->post('id_categoria');
$insert_date=date("Y-m-d H:i:s");

for ($i = 0; $i < count($id_doc); ++$i ) {
$d = $id_doc[$i];
$data= array(
'id_cat' =>$id_categoria,
'id_doct' =>$d
);
$this->model_admin->addDoctTarif($data);
};
}






public function DeleteDoctorTarif()
{
$delete= array(
'id_cat' =>$this->input->post('id_categoria'),
'id_doct' =>$this->input->post('id')
);
$query = $this->model_admin->delete_doctor_tarif($delete);

//===========================================================================
$id_seguro = $this->input->post('id_seguro');
$results= $this->model_admin->display_tarif_seguro($id_seguro);
$data['results']=$results;
$data['DOCTORS']=$this->model_admin->doctors_no_tarifs();
$this->load->view('admin/tarifarios/doctors/new_doctor_added_to_tarif_result', $data);
//$this->load->view('admin/tarifarios/doctors/display_tarif_seguro_footer', $data);
}


//-------------------------MSSM FUNCTIONS-----------------------------------


public function mssm()
{
$data['name']=$this->session->userdata['admin_name'];
$admin_centro=$this->session->userdata['admin_position_centro'];
$data['tarifarios_grouped'] = $this->model_admin->tarifarios_grouped();
$data['tarifarios_grouped_seguro'] = $this->model_admin->tarifarios_grouped_seguro();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$identificar=$this->uri->segment(3);
$data['privado']=$this->db->select('title')->where('title','PRIVADO')->limit(1)->get('seguro_medico')->row('title');
$data['tarif_cat']=$this->model_admin->tarif_cat();
$data['all_seguro'] = $this->model_admin->display_all_seguro_medico();

if($admin_centro){
$data['DOCTORS']= $this->model_admin->get_doctor($admin_centro);

$querycentro = $this->db->query("SELECT id_m_c,name FROM medical_centers 
LEFT JOIN centros_tarifarios
ON medical_centers.id_m_c=centros_tarifarios.centro_id
WHERE id_m_c=$admin_centro GROUP BY centro_id");
$all_medical_centers = $querycentro->result();
}else{
$data['DOCTORS']=$this->model_admin->display_all_doctors();

$all_medical_centers = $this->model_admin->all_centro_medicos_tarifs();
}
$data['message']="";
$this->load->view('admin/header_admin',$data);

if($identificar=="medico"){

$this->load->view('admin/billing/mssm/create',$data);
} else{
	
$data['all_medical_centers']=$all_medical_centers;	
	
$this->load->view('admin/billing/mssm/centro/create-centro',$data);
}
}


public function get_category_name()
{
	$cat=$this->input->post('cat');
	$data['result'] = $this->model_admin->getCatName($cat);
	$this->load->view('admin/billing/mssm/get_cat_lab', $data);
}


public function getSeguro()
{
$id_centro=$this->input->post('id');
$sql ="SELECT id_sm, title  FROM  seguro_medico
INNER JOIN codigo_contrato ON seguro_medico.id_sm = codigo_contrato.id_seguro
WHERE id_centro=$id_centro";
$query= $this->db->query($sql);
foreach($query->result() as $row) {
echo "<option></option>";
echo "<option value='$row->id_sm'>$row->title</option>";
}

}

public function mssm_service_data(){
$id_tarif=$this->input->get('id_tarif');

$procedimiento=$this->db->select('procedimiento')->where('id_tarif',$id_tarif)->get('tarifarios')->row('procedimiento');
$data['servicio']=$procedimiento;

$data['tarifarios_by_seguros']=$this->model_admin->tarifarios_by_seguros($procedimiento);


$this->load->view('admin/tarifarios/doctors/search-by-service-result', $data);
}

public function mssm_doc()
{
	$data['name']=$this->session->userdata['admin_name'];
    $data['user_name']=$this->session->userdata['admin_id'];
	$data['DOCTORS']=$this->model_admin->display_all_doctors();
	$data['especialidades'] = $this->model_admin->getEspecialidades();
	$this->load->view('admin/header_admin',$data);
	$this->load->view('admin/billing/mssm/create',$data);
}

public function display_tarif_doc()
{
$this->mssm_doc();
$doct_tarif=$this->input->get('doct_tarif');
$data['id_doctor']=$doct_tarif;
$results= $this->model_admin->display_tarif_doc($doct_tarif);
$data['results']=$results;
$count=count($results);
$id_seguro_medico=$this->db->select('seguro_medico')->where('id_doctor',$doct_tarif)->get('doctor_seguro')->row('seguro_medico');
$data['id_seguro_medico']=$id_seguro_medico;
if($count >0){
$this->load->view('admin/tarifarios/doctors/display_tarif_doc', $data);
}else{
$data['doctor']=$this->db->select('area,name')->where('id_user',$doct_tarif)->get('users')->row_array();
$sql ="SELECT seguro_medico  FROM  doctor_seguro WHERE id_doctor=$doct_tarif";
$data['query']= $this->db->query($sql);
$data['id_centro']=0;
$this->load->view('admin/tarifarios/doctors/facturarPatNotFound', $data);

}
}



public function loadSeguroDocTarifSinPlan()
{
$val = array(
  'id_seguro'=>$this->input->post('id_seguro'),
  'id_doctor'=>$this->input->post('id_doctor'),
   'id_plan'=>'none'
);
$data['id_doctor']=$this->input->post('id_doctor');
$data['id_seguro']=$this->input->post('id_seguro');
$data['results']= $this->model_admin->other_seguro_tarif($val);
$this->load->view('admin/tarifarios/doctors/loadSeguroDocTarifSinPlan', $data);
}



public function display_tarif_seguro()
{
$data['seguro_id']=$this->input->post('seguro_id');

$this->load->view('admin/tarifarios/doctors/display_tarif_seguro', $data);
}


public function loadSeguroTarif()
{
$seguro_id=$this->input->post('seguro_id');
$results= $this->model_admin->display_tarif_seguro($seguro_id);
$data['results']=$results;
$data['count']=count($results);
$id_medico=$this->db->select('id_doctor')->where('seguro_medico',$seguro_id)->get('doctor_seguro')->row('id_doctor');
$data['view_doctor_centro']=$this->model_admin->view_doctor_centro($id_medico);
$data['seguro_doc_tarif_grouped1']=$this->model_admin->seguro_doc_tarif_grouped1($seguro_id);
$this->load->view('admin/tarifarios/doctors/loadSeguroTarif', $data);
}






public function EditSeguroMedico()
{
$data['name']=$this->session->userdata['admin_name'];
$id_seguro= $this->uri->segment(3);
$data['id_seguro']= $id_seguro;

$data['ALL_FIELDS'] = $this->model_admin->all_fields();
$data['EditSeguroMedico'] = $this->model_admin->EditSeguroMedico($id_seguro);
$this->load->view('admin/health_insurances/modal-update', $data);

}



public function RelatedCentro(){

$data['id_user']=$this->uri->segment(4);
$data['seguro_name']=$this->db->select('title')->where('id_sm',$this->uri->segment(3))->limit(1)->get('seguro_medico')->row('title');
$data['RelatedCentro'] = $this->model_admin->RelatedCentro($this->uri->segment(3));
$this->load->view('admin/health_insurances/RelatedCentro', $data);

}







public function centro_medico()
{
$data['name']=$this->session->userdata['admin_name'];
	$id_medical_center= $this->uri->segment(3);
$data['CENTRO_MEDICO'] = $this->model_admin->display_centro_medico($id_medical_center);
$data['CENTRO_MEDICO_ESPECIALIDADED'] = $this->model_admin->display_centro_medical_esp($id_medical_center);
$data['CENTRO_MEDICO_SEGURO']= $this->model_admin->display_centro_medical_seguro($id_medical_center);
$data['RESULT_DOCTOR']= $this->model_admin->get_doctor($id_medical_center);
$data['RESULT_ASDOCTOR']= $this->model_admin->get_asistente_doctor($id_medical_center);
$data['CENTRO_PROVINCE']= $this->db->select('title')->join('medical_centers', 'provinces.id = medical_centers.provincia')->where('id_m_c',$id_medical_center)->limit(1)->get('provinces')->row('title');
 $data['CENTRO_MUNICIPIO']= $this->db->select('title_town')->join('medical_centers', 'townships.id_town = medical_centers.municipio')->where('id_m_c',$id_medical_center)->limit(1)->get('townships')->row('title_town');
$this->load->view('admin/header_admin',$data);
 $data['hide']=0;
 $this->load->view('admin/centers/medical_center', $data);


}



public function import_rates()
	{
		$data['name']=$this->session->userdata['admin_id'];
		$data['tarifarios_grouped'] = $this->model_admin->tarifarios_grouped();
		$data['last_id_doc']=$this->db->select('id_doctor')->order_by('id_tarif','desc')->limit(1)->get('tarifarios')->row('id_doctor');
        $data['especialidades'] = $this->model_admin->getEspecialidades();
        $data['all_seguro'] = $this->model_admin->display_all_seguro_medico();
		
		$admin_position_centro=$this->session->userdata['admin_position_centro'];

		if($admin_position_centro){
		$querycentro = $this->db->query("SELECT id_m_c, name FROM medical_centers WHERE id_m_c=$admin_position_centro");
		}else{
		$querycentro = $this->db->query('SELECT id_m_c, name FROM medical_centers');

		}
      $data['all_medical_centers'] = $querycentro->result();
		$this->load->view('admin/header_admin',$data);
		$this->load->view('admin/tarifarios/excel_import',$data);
	}

public function load_tarif_doc_form()
	{
		$data['user_name']=$this->session->userdata['admin_id'];

		$data['area']=$this->input->post('area');
		$data['a_i']=$this->input->post('a_i');
		$data['perfil']=$this->input->post('perfil');
		$data['tarifarios_grouped'] = $this->model_admin->tarifarios_grouped();
		$data['last_id_doc']=$this->db->select('id_doctor')->order_by('id_tarif','desc')->limit(1)->get('tarifarios')->row('id_doctor');
        $data['especialidades'] = $this->model_admin->getEspecialidades();
        $data['all_seguro'] = $this->model_admin->display_all_seguro_medico();
		$this->load->view('admin/tarifarios/doctors/load_tarif_doc_form',$data);
	}


public function check_if_doc_has_tarifarios_for_this_seguro()
{
	$data['updated_by']=$this->session->userdata['admin_name'];
$data['id_doctor']=$this->input->post('id_doctor');
$data['id_seguro']=$this->input->post('id_seguro');

$get= array(
'id_doctor'=>$this->input->post('id_doctor'),
'id_seguro'=>$this->input->post('id_seguro')
);
$data['results']=$this->model_admin->check_if_doc_has_tarifarios_for_this_seguro($get);
$this->load->view('admin/tarifarios/doctors/check_if_doc_has_tarifarios_for_this_seguro', $data);
}


	public function check_if_centro_medico_has_tarifarios_already()
{
	$data['updated_by']=$this->session->userdata['admin_id'];
$id_c=$this->input->post('id_c');
$id_sm=$this->input->post('id_sm');
$data['id_c']=$id_c;
$data['results']=$this->model_admin->check_if_centro_medico_has_tarifarios_already($id_c,$id_sm);
$this->load->view('admin/tarifarios/centros/check_if_centro_medico_has_tarifarios_already', $data);
}


public function delete_tarifarios_centro(){
	$id  = $this->input->post('id');
	$query = $this->model_admin->delete_tarifarios_centro($id);
	}


public function fetch_excel_import()
{
$cpt="";
$last_id_cat=$this->db->select('id_categoria')->order_by('id_tarif','desc')->limit(1)->get('tarifarios')->row('id_categoria');
$data = $this->excel_import_model->select();
$data_centro = $this->excel_import_model->select_centros();
$output = '
<span style="display:none" id="id_categoria">'.$last_id_cat.'</span>
<h3 align="center">Total Tarifarios Medicos- '.$data->num_rows().'</h3>
<h3 align="center" id="hide_last_centro">Total Tarifarios Centro Medicos- '.$data_centro->num_rows().'</h3>
';


echo $output;
}




 public function save_edit_tarifario_centro(){
$updated_date=date("Y-m-d H:i:s");
$id  = $this->input->post('id_c_taf');
$data = array(
'cups'=>$this->input->post('cups'),
'simons'=>$this->input->post('simons'),
'sub_groupo'=>$this->input->post('sub_groupo'),
 'monto'=>$this->input->post('monto'),
  'updated_by'=>$this->session->userdata['admin_id'],
   'updated_date'=>$updated_date
  );
$this->model_admin->save_edit_tarifario_centro($id,$data);


}





public function display_tarif_centro_categoria()
{
$data['user_name']=$this->session->userdata['admin_id'];
$id_seguro=$this->input->post('id_seguro');
$id_centro=$this->input->post('id_centro');
$results= $this->model_admin->display_tarif_centro_categoria($id_centro,$id_seguro);
$data['results']=$results;
$data['id_seguro']=$id_seguro;
$data['id_centro']=$id_centro;
$this->load->view('admin/tarifarios/centros/display_tarif_centro', $data);

}

public function display_centro_tarif_cat()
{
$id_seguro=$this->input->post('id_seguro');
$id_centro=$this->input->post('id_centro');
$results= $this->model_admin->display_tarif_centro_categoria($id_centro,$id_seguro);
$data['results']=$results;
$data['count']=count($results);
$this->load->view('admin/tarifarios/centros/display_centro_tarif_cat', $data);

}

public function check_if_group_exist()
{
$query = $this->db->get_where('centros_tarifarios',array('groupo'=>$this->input->post('groupo'),'centro_id'=>$this->input->post('id_centro'),'seguro_id'=>$this->input->post('id_seguro')));
$num=$query->num_rows();
echo json_encode($num);

}

public function centro_categoria_servicios()
{

$data['categoria']=$this->input->post('categoria');
$data['id_centro']=$this->input->post('id_centro');
$data['id_seguro']=$this->input->post('id_seguro');

$this->load->view('admin/tarifarios/centros/centro_categoria_servicios', $data);
}


public function loadCatTarif()
{
$data['updated_by']=$this->session->userdata['admin_id'];
$val = array(
'categoria'=>$this->input->post('categoria'),
'id_centro'=>$this->input->post('id_centro'),
'id_seguro'=>$this->input->post('id_seguro')
 );
$data['categoria']=$this->input->post('categoria');
$data['id_centro']=$this->input->post('id_centro');
$data['id_seguro']=$this->input->post('id_seguro');
$results= $this->model_admin->centro_categoria_servicios($val);
$data['results']=$results;
$data['count']=count($results);
$this->load->view('admin/tarifarios/centros/loadCatTarif', $data);
}

public function saveNewTarifCentro()
{
if($this->input->post('cups') !="" && $this->input->post('simons') !="" && $this->input->post('categoria') !=""){
$save = array(
'cups'  => $this->input->post('cups'),
'simons' => $this->input->post('simons'),
'sub_groupo' => $this->input->post('consulta'),
'groupo' => $this->input->post('categoria'),
'monto' =>$this->input->post('monto'),
'centro_id' =>$this->input->post('id_centro'),
'seguro_id' =>$this->input->post('id_seguro'),
'inserted_date' => date("Y-m-d H:i"),
'inserted_by' =>$this->session->userdata['admin_id'],
'updated_by' =>$this->session->userdata['admin_id'],
'updated_date' =>date("Y-m-d H:i")
);

$this->model_admin->saveNewTarifCentro($save);
}
}
//==============================FACTURA=============================================


public function billing_report()
{
$data['name']=($this->session->userdata['admin_name']);
$data['user_id']=$this->session->userdata['admin_id'];
$data['controller']="admin";
$this->load->view('admin/header_admin',$data);
$this->load->view('admin/billing/bill/all-billings');

}


public function bills_data()
{

$data['blocked']=$this->model_admin->CountFactura2Blocked();
$data['un_blocked']=$this->model_admin->CountFactura2UnBlocked();
$data['billings']=$this->model_admin->Billings();


$this->load->view('admin/billing/bill/data',$data);

}


public function block_factura(){
$id = $this->input->post('id');
$data= array(
'block' => 1,
);
$query = $this->model_admin->block_factura2($id,$data);
$query = $this->model_admin->block_factura1($id,$data);
}



public function save_patients_appointmentss(){
	if($this->input->post('seguro_medico')==11){
	$plan=0;
}else{
$plan=$this->input->post('plan');

}
$controllername=$this->input->post('controllername');
$query = $this->db->get_where('patients_appointments',array('nombre'=>$this->input->post('nombre'),'date_nacer'=>$this->input->post('date_nacer'),'tel_cel'=>$this->input->post('tel_cel')));
if($query->num_rows() > 0){
$data['controller']="admin";
$this->load->view('admin/pacientes-citas/duplicate_patient_padron', $data);
} else{
$photo_location = $this->input->post('photo_location');
$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');
$insert_date=date("Y-m-d H:i:s");
$filter_date=date("Y-m-d");
//$area= $this->db->select('area')->where('first_name',($this->session->userdata['medico_id']))->get('doctors')->row('area');
if($photo_location==2)
{
$imgExt = strtolower(pathinfo($_FILES["picture"]['name'],PATHINFO_EXTENSION));
$extension = explode('.', $_FILES['picture']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/img/patients-pictures/' . $logo;
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
} else {
$logo="";
}
$save1 = array(
  'nombre'  => $this->input->post('nombre'),
  'photo'  =>$logo,
  'cedula' => $this->input->post('cedula'),
  'date_nacer' => $this->input->post('date_nacer'),
    'date_nacer_format' => $this->input->post('date_nacer_format'),
   'edad' => $this->input->post('age'),
  'frecuencia'=> $this->input->post('frecuencia'),
 'tel_resi'  => $this->input->post('tel_resi'),
  'tel_cel'=> $this->input->post('tel_cel'),
  'email' => $this->input->post('email'),
  'sexo' => $this->input->post('sexo'),
   'estado_civil' => $this->input->post('estado_civil'),
  'nacionalidad'=> $this->input->post('nacionalidad'),
 'seguro_medico'  => $this->input->post('seguro_medico'),
 'afiliado'  => $this->input->post('afiliado'),
 'plan'  => $plan,
  'provincia'=> $this->input->post('provincia'),
  'municipio' => $this->input->post('municipio'),
  'barrio' => $this->input->post('barrio'),
   'calle' => $this->input->post('calle'),
  'contacto_em_nombre'=> $this->input->post('contacto_em_nombre'),
 'contacto_em_alias'  => $this->input->post('contacto_em_alias'),
  'contacto_em_cel'=> $this->input->post('contacto_em_cel'),
  'contacto_em_tel1' => $this->input->post('contacto_em_tel1'),
  'contacto_em_tel2' => $this->input->post('contacto_em_tel2'),
   'responsable_legal' => $this->input->post('responsable_legal'),
  'cedula_o_pass_menos_edad'=> $this->input->post('cedula_o_pass_menos_edad'),
  'inserted_by' =>$this->input->post('creadted_by'),
  'updated_by' =>$this->input->post('creadted_by'),
 'insert_date' => $insert_date,
  'update_date' => $insert_date,
  'filter_date' => $filter_date
  );
$id_pat=$this->model_admin->save_patient($save1);

$this->session->set_userdata('sessionIdPatient',$id_pat);
 $saveN = array(
'nec1'  => "NEC-$id_pat"
);

$this->model_admin->insert_nec($id_pat,$saveN);
//------------------------------------------------------------

for ($i = 0; $i < count($inputname), $i < count($inputf); ++$i ) {
    $inp = $inputname[$i];
	$inf = $inputf[$i];
   $saveInputs= array(
	'patient_id' =>$id_pat,
	'input_name' => $inp,
	'inputf' => $inf,
	'seguro_id' =>$this->input->post('seguro_medico')//when remove a seguro field we remove it in patient seguro field as well with this id
	);

	$this->model_admin->saveInput($saveInputs);
}

 $msg = "<div  style='text-align:center;font-size:20px;color:green' id='deletesuccess'>La cita se guada con exito .</div>";

$this->session->set_flashdata('success_msg', $msg);

$centro_type=$this->db->select('type')->where('id_m_c',$this->input->post('centro_medico'))->get('medical_centers')->row('type');
$this->session->set_userdata('sessionCentroTypeSeguroNewCitaAgain',$centro_type);
$this->session->set_userdata('sessionIdPatientNewCita',$id_pat);
$this->session->set_userdata('sessionIdDocNewCita', $this->input->post('doctor'));
$this->session->set_userdata('sessionIdCentNewCita',$this->input->post('centro_medico'));
$this->session->set_userdata('sessionIdSegNewCita',$this->input->post('seguro_medico'));
$this->session->set_userdata('id_user', $this->input->post('id_user'));

//------ADD NEW CAUSA IF NOT EXIST----------------------------------------------------------------
if($this->input->post('orientation')==0){
$dayNumber=$this->db->select('id')->where('title',$this->input->post('fecha_filter'))->get('diaries')->row('id');
$filter_date1 = date("Y-m-d", strtotime($this->input->post('fecha_propuesta')));
 $save2 = array(
'nec'=> "NEC-$id_pat",
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'area' =>$this->input->post('especialidad'),
'doctor' =>$this->input->post('doctor'),
'id_patient' => $id_pat,
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'weekday' =>$dayNumber,
'update_by' => $this->input->post('creadted_by'),
'inserted_by' => $this->input->post('creadted_by'),
'created_time' => $insert_date,
'update_time' => $insert_date,
'filter_date' => $filter_date1,
'cancelar' =>0
   );
$id_rdv =$this->model_admin->save_rendevous($save2);
$this->session->set_userdata('sessionIdNewCitaAgain', $id_rdv);

$query1 = $this->db->get_where('type_reasons',array('title'=>$this->input->post('causa')));
		if($query1->num_rows() == 0)
	{
		$save = array(
       'title'=>$this->input->post('causa'),
	   'inserted_by' => $this->input->post('creadted_by'),
	   'inserted_time' =>$insert_date,
       'updated_by' => $this->input->post('creadted_by'),
	   'updated_time' => $insert_date
	   );
		$this->model_admin->save_new_causa($save);
	}
//------------------------------------------------------------------------------------------------

redirect('admin/gh0rtgkrr4g5');
}
elseif($this->input->post('orientation')==2){

//-------------------------------SAVE EMERGENCIA DATA------------------------------------------------
$query1 = $this->db->get_where('emergency_adm_data',array('id_em_c'=>$this->input->post('em_name')));
if($query1->num_rows() == 0)
{
$save = array(
'em_name'=>$this->input->post('em_name'),
'id'=>1
);
$this->db->insert("emergency_adm_data",$save);
}

//----------------------------------------------------------------------------------------

$query2 = $this->db->get_where('emergency_adm_data',array('id_em_c'=>$this->input->post('paciente_referido')));
if($query2->num_rows() == 0)
{
$save = array(
'em_name'=>$this->input->post('paciente_referido'),
'id'=>2
);
$this->db->insert("emergency_adm_data",$save);
}


//----------------------------------------------------------------------------------------

$query3 = $this->db->get_where('emergency_adm_data',array('id_em_c'=>$this->input->post('medio_llegado')));
if($query3->num_rows() == 0)
{
$save = array(
'em_name'=>$this->input->post('medio_llegado'),
'id'=>3
);
$this->db->insert("emergency_adm_data",$save);
}

//----------------------------------------------------------------------------------------

$query3 = $this->db->get_where('emergency_adm_data',array('id_em_c'=>$this->input->post('estado_paciente')));
if($query3->num_rows() == 0)
{
$save = array(
'em_name'=>$this->input->post('estado_paciente'),
'id'=>4
);
$this->db->insert("emergency_adm_data",$save);
}

if($this->input->post('enviado_a')==1){
	$go_to="triaje";
}else{
$go_to="Emergencia General";	
}
$save = array(
'id_pat'=>$id_pat,
'centro'=>$this->input->post('emergencia-centro'),
'causa'=>$this->input->post('em_name'),
'paciente_referido_por'=>$this->input->post('paciente_referido'),
'medio_de_llegado'=>$this->input->post('medio_llegado'),
'enviado_a'=>$this->input->post('enviado_a'),
'enviado_name'=>$go_to,
'estado_de_paciente'=>$this->input->post('estado_paciente'),
'inserted_by'=>$this->input->post('creadted_by'),
'update_by'=>$this->input->post('creadted_by'),
'created_date'=>date("Y-m-d"),
'create_time'=>date("H:i:s"),
'update_date'=>date("Y-m-d"),
'update_time'=>date("H:i:s")
);
$this->db->insert("emergency_patients",$save);
$enviado_a=$this->input->post('enviado_a');
$id_pat_emergencia= $id_pat;
$iduser=$this->input->post('creadted_by');
redirect("emergency/emergency_patient/$enviado_a/$id_pat_emergencia/$iduser");

}

else{
$this->session->set_userdata('id_cm',$this->input->post('factura-centro'));
$this->session->set_userdata('id_d',$this->input->post('facturar-doc'));
$this->session->set_userdata('id_p_a',$id_pat);
$this->session->set_userdata('id_seg',$this->input->post('seguro_medico'));
redirect("admin/redirect_fac");
}
}
}



public function save_new_patient_from_padron(){
	 $rules = array(

			 array(
                'field' => 'seguro_medico', 
                'label' => 'seguro médico',
                'rules' => 'required'
            ),
			  array(
                'field' => 'tel_cel',
                'label' => 'Telefono celular',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($rules);
		     $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>'); 
		if ($this->form_validation->run() == FALSE) {
			$msg='<h3 style="color:red">El formulario no se ha guadado, favor revisar :</h3>';
			$this->session->set_flashdata('error_messages', $msg);
			$ced1=$this->input->post('ced1');  $ced2=$this->input->post('ced2');  $ced3=$this->input->post('ced3');
      $this->create_new_patient_from_padron($ced1,$ced2,$ced3);		
	
		}else{	
	
$queryd = $this->db->get_where('patients_appointments',array('ced1'=>$this->input->post('ced1'),'ced2'=>$this->input->post('ced2'),'ced3'=>$this->input->post('ced3')));
if($queryd->num_rows() > 0)
{
$data['controller']="admin";

$this->load->view('admin/pacientes-citas/duplicate_patient_padron', $data);
}
else {

if($this->input->post('seguro_medico')==11){
$plan=0;
}else{
$plan=$this->input->post('plan');

}

$MUN_CED = $this->input->post('ced1');
$SEQ_CED = $this->input->post('ced2');
$VER_CED = $this->input->post('ced3');
$id_user = $this->input->post('id_user');

$this->session->set_userdata('MUN_CED', $MUN_CED);
$this->session->set_userdata('SEQ_CED', $SEQ_CED);
$this->session->set_userdata('VER_CED', $VER_CED);
$this->session->set_userdata('id_user', $id_user);
$this->session->set_userdata('sessionIdSegNewCita', $this->input->post('seguro_medico'));
$centro_type=$this->db->select('type')->where('id_m_c',$this->input->post('centro_medico'))->get('medical_centers')->row('type');
$this->session->set_userdata('sessionCentroTypeSeguroNewCitaAgain',$centro_type);
$this->session->set_userdata('sessionIdCentNewCita',$this->input->post('centro_medico'));
$this->session->set_userdata('sessionIdDocNewCita',$this->input->post('doctor'));
$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');
$insert_date=date("Y-m-d H:i:s");
$modify_date=date("Y-m-d H:i:s");
$filter_date=date("Y-m-d");
$photo_location = $this->input->post('photo_location');

if($photo_location==2)
{
$imgExt = strtolower(pathinfo($_FILES["picture"]['name'],PATHINFO_EXTENSION));
$extension = explode('.', $_FILES['picture']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/img/patients-pictures/' . $logo;
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);

}
else if($photo_location==1)
{
$logo="padron";
}
else if ($photo_location==0)
{
$logo="";
}
else {

}

$nationalidad="Dominican Republic";
$save1 = array(
'nombre'  => $this->input->post('nombre'),
'photo'  =>$logo,
'cedula' => $this->input->post('cedula'),
'ced1' => $this->input->post('ced1'),
'ced2' => $this->input->post('ced2'),
'ced3' => $this->input->post('ced3'),
'date_nacer' => $this->input->post('date_nacer'),
'date_nacer_format' => $this->input->post('date_nacer_format'),
'edad' => $this->input->post('age'),
'frecuencia'=> $this->input->post('frecuencia'),
'tel_resi'  => $this->input->post('tel_resi'),
'tel_cel'=> $this->input->post('tel_cel'),
'email' => $this->input->post('email'),
'sexo' => $this->input->post('sexo'),
'estado_civil' => $this->input->post('estado_civil'),
'nacionalidad'=>$nationalidad,
'seguro_medico'  => $this->input->post('seguro_medico'),
'afiliado'  => $this->input->post('afiliado'),
'plan'=>$plan,
'provincia'=> $this->input->post('provincia'),
'municipio' => $this->input->post('municipio'),
'barrio' => $this->input->post('barrio'),
'calle' => $this->input->post('calle'),
'contacto_em_nombre'=> $this->input->post('contacto_em_nombre'),
'contacto_em_alias'  => $this->input->post('contacto_em_alias'),
'contacto_em_cel'=> $this->input->post('contacto_em_cel'),
'contacto_em_tel1' => $this->input->post('contacto_em_tel1'),
'contacto_em_tel2' => $this->input->post('contacto_em_tel2'),
'responsable_legal' => $this->input->post('responsable_legal'),
'cedula_o_pass_menos_edad'=> $this->input->post('cedula_o_pass_menos_edad'),
'inserted_by' =>$this->input->post('id_user'),
'updated_by' =>$this->input->post('id_user'),
'insert_date' => $insert_date,
'update_date' => $insert_date,
'filter_date' => $filter_date
);
$id_pat=$this->model_admin->save_patient($save1);
$this->session->set_userdata('sessionIdPatient',$id_pat);
$saveN = array(
'nec1'  => "NEC-$id_pat"
);

$this->model_admin->insert_nec($id_pat,$saveN);

for ($i = 0; $i < count($inputname), $i < count($inputf); ++$i ) {
$inp = $inputname[$i];
$inf = $inputf[$i];
$saveInputs= array(
'patient_id' =>$id_pat,
'input_name' => $inp,
'inputf' => $inf
);

$this->model_admin->saveInput($saveInputs);
}

$msg = "<div  style='text-align:center;font-size:20px;color:green' id='deletesuccess'>La cita se guada con exito .</div>";

$this->session->set_flashdata('success_msg', $msg);

if($this->input->post('orientation')==0){

 $dayNumber=$this->db->select('id')->where('title',$this->input->post('weekday'))->get('diaries')->row('id');
 $filter_date1 = date("Y-m-d", strtotime($this->input->post('fecha_propuesta')));
 $save2 = array(
'nec'=> "NEC-$id_pat",
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'area' => $this->input->post('especialidad'),
'doctor' => $this->input->post('doctor'),
'id_patient' => $id_pat,
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'weekday' => $dayNumber,
'update_by' => $this->input->post('id_user'),
'inserted_by' => $this->input->post('id_user'),
'created_time' => $insert_date,
'update_time' => $insert_date,
'filter_date' => $filter_date1,
'cancelar' =>0
   );
$id_rdv =$this->model_admin->save_rendevous($save2);
$this->session->set_userdata('sessionIdNewCitaAgain', $id_rdv);
$this->session->set_userdata('id_esp',$this->input->post('especialidad'));
redirect('admin/gh0rtgkrr4g5');

}elseif($this->input->post('orientation')==3){
 $savedas = array(
'centro'=> $this->input->post('hosp_centro'),
'esp'  => $this->input->post('hosp_esp'),
'doc'=> $this->input->post('hosp_doctor'),
'causa' =>$this->input->post('hosp_causa'),
'via' =>$this->input->post('hosp_ingreso'),
'id_patient' => $id_pat,
'sala' => $this->input->post('hosp_sala'),
'servicio' => $this->input->post('hosp_servicio'),
'cama' => $this->input->post('hosp_cama'),
'hosp_auto' => $this->input->post('hosp_auto'),
'hosp_auto_por' => $this->input->post('hosp_auto_por'),
'inserted' => $this->input->post('id_user'),
'updated' => $this->input->post('id_user'),
'timeinserted' => $insert_date,
'timeupdated' => $insert_date,
'canceled' =>0
   );
$this->db->insert("hospitalization_data",$savedas);

//------------------------------------------------------------------------------------------------
$id_p_ai = encrypt_url($id_pat);
$id_useri = encrypt_url($this->input->post('id_user'));
redirect("hospitalizacion/hospitalizacion_list/$id_p_ai/$id_useri");
}

 else{
$this->session->set_userdata('id_cm',$this->input->post('factura-centro'));
$this->session->set_userdata('id_d',$this->input->post('facturar-doc'));
$this->session->set_userdata('id_p_a',$id_pat);
$this->session->set_userdata('id_seg',$this->input->post('seguro_medico'));
redirect("admin/redirect_fac");
}
}
}
}



public function gh0rtgkrr4g5(){


$idpatient=$this->session->userdata['sessionIdPatient'];
$data['idpatient']=$idpatient;
$data['patid']=$idpatient;

$patient=$this->db->select('nombre,nec1,photo,ced1,ced2,ced3')->where('id_p_a',$idpatient)->get('patients_appointments')->row_array();
$data['nombre']=$patient['nombre'];
$data['nec']=$patient['nec1'];
$data['photo']=$patient['photo'];
$data['ced1']=$patient['ced1'];
$data['ced2']=$patient['ced2'];
$data['ced3']=$patient['ced3'];
$data['perfil']=$this->session->userdata['admin_perfil'];
$data['id_dd']=$this->session->userdata['sessionIdDocNewCita'];
$data['id_cm']=$this->session->userdata['sessionIdCentNewCita'];
$data['id_rdv']=$this->session->userdata['sessionIdNewCitaAgain'];
$data['id_seguro']=$this->session->userdata['sessionIdSegNewCita'];
$data['centro_type']=$this->session->userdata['sessionCentroTypeSeguroNewCitaAgain'];


$query  = $this->model_admin->RendezVous($idpatient);
		$val = array(
       'doctor'=>$this->session->userdata['sessionIdDocNewCita'],
	   'id_patient' => $idpatient
	   );
$query_doc  = $this->model_admin->RendezVousDoc($val);
$data['area']=0;
$data['is_admin']="yes";
$data['number_cita']=count($query);
$this->load->view('admin/header_admin',$data);

$this->load->view('admin/pacientes-citas/tutor/124gh0rtgkrr4g5',$data);
$data['id_usr']=$this->session->userdata['id_user'];
$this->load->view('admin/footer',$data);
}



public function fact()
{
$this->session->set_userdata('id_cm',$this->input->get('centro'));
$this->session->set_userdata('id_d',$this->input->get('doc'));
$this->session->set_userdata('id_p_a',$this->input->get('id'));
$this->session->set_userdata('id_seg',$this->input->get('seg'));
redirect('admin/redirect_fac');
}





public function editPrivateBill(){
$this->session->set_userdata('id_fac_private',$this->uri->segment(3));
$this->session->set_userdata('centro_fac_id',$this->uri->segment(4));
redirect('admin/billingProcess');
}


public function billingProcess(){
$idfac=$this->session->userdata['id_fac_private'];
$centro_id=$this->session->userdata['centro_fac_id'];
$data['id']=$idfac;
$this->load->view('admin/header_admin',$data);
$data['name']=$this->session->userdata['admin_id'];
$data['is_admin']="yes";
$data['identificar']=$this->db->select('type')->where('id_m_c',$centro_id)->get('medical_centers')->row('type');
$data['controller']="admin";
$this->load->view('medico/billing/bill/seguro-privado/view-bill-commnun',$data);
}





public function redirect_fac()
{
$identificar_=$this->db->select('type')->where('id_m_c',$this->session->userdata['id_cm'])->get('medical_centers')->row('type'); 
$id_apoint=encrypt_url('fac');
$id_cm=encrypt_url($this->session->userdata['id_cm']);
$identificar=encrypt_url($identificar_);
$id_d=encrypt_url($this->session->userdata['id_d']);
$id_seg=encrypt_url($this->session->userdata['id_seg']);
$id_p_a=encrypt_url($this->session->userdata['id_p_a']);
redirect("admin/patient_billing/$identificar/$id_apoint/$id_d/$id_cm/$id_seg/$id_p_a");

}




public function patient_billing_()
{
$identificar=$this->uri->segment(3);
$id_apoint=$this->uri->segment(4);
$id_d=$this->uri->segment(5);
$id_cm=$this->uri->segment(6);
$id_seg=$this->uri->segment(7);
$id_p_a=$this->uri->segment(8);
redirect("admin/patient_billing/$identificar/$id_apoint/$id_d/$id_cm/$id_seg/$id_p_a");

}





public function patient_billing($identificar,$id_apoint,$id_d,$id_cm,$id_seg,$id_p_a)
{
$identificar=decrypt_url($identificar);
$id_apoint=decrypt_url($id_apoint);
$id_d=decrypt_url($id_d);
$id_cm=decrypt_url($id_cm);
$id_seg=decrypt_url($id_seg);
$id_p_a=decrypt_url($id_p_a);

if($identificar=="" || $id_apoint=="" || $id_d=="" || $id_cm=="" || $id_seg==""){
redirect('admin/billing_medicos');
}			
$data['is_admin']="yes";
$data['identificar']=$identificar;
$data['id_apoint']=$id_apoint;
$data['id_d']=$id_d;
$data['id_cm']=$id_cm;
$data['id_seg']=$id_seg;
$data['id_p_a']=$id_p_a;
$data['perfil']=$this->session->userdata['admin_perfil'];
$data['name']=$this->session->userdata['admin_id'];
$this->load->view('admin/header_admin',$data);
$this->load->view('medico/billing/bill/billing-commun',$data);

}




public function viewPrivateBill_()
{
$id = encrypt_url($this->uri->segment(3));
$identificar = encrypt_url($this->uri->segment(4));				
redirect("admin/privateBillView/$id/$identificar");
}


public function viewPrivateBill()
{
$id=$this->uri->segment(3);
$identificar=$this->uri->segment(4);
$this->privateBillView($id,$identificar);
}


function privateBillView($idbill,$identificar){
$data['id']=$idbill;
$data['identificar']=$identificar;
$data['name']=$this->session->userdata['admin_id'];
$data['is_admin']="yes";
$this->load->view('admin/header_admin',$data);
$data['controller']="admin";
$this->load->view('medico/billing/bill/seguro-privado/view-bill-commnun',$data);		
}





public function get_seguro_date_range(){
$data['perfil']=$this->session->userdata['admin_perfil'];
$data['name']=$this->session->userdata['admin_name'];
$id_user=$this->session->userdata['admin_id'];
$data['id_user'] = $id_user;
$this->load->view('admin/header_admin',$data);
$data['seguro']=$this->input->post('seguro');
$data['desde']=$this->input->post('desde');
$data['hasta']=$this->input->post('hasta');
$data['centro']=$this->input->post('centro');
$this->load->view('admin/billing/bill/get_seguro_date_range',$data);
}

public function citas_hoy(){
$admin_centro=$this->session->userdata['admin_position_centro'];	
if($admin_centro){
$query_citas=$this->db->select('confirmada')->where('confirmada',0)->where('cancelar',0)->where('centro',$admin_centro)->where('fecha_propuesta',date("d-m-Y"))->get('rendez_vous');

}else{
$query_citas=$this->db->select('confirmada')->where('confirmada',0)->where('cancelar',0)->where('fecha_propuesta',date("d-m-Y"))->get('rendez_vous');
}
echo $query_citas->num_rows();

}

public function cola_de_solicitud(){
$admin_centro=$this->session->userdata['admin_position_centro'];
if($admin_centro){
$query_sol=$this->db->select('id_apoint')->where('centro',$admin_centro)->where('confirmada',1 )->get('rendez_vous');	
}else{
$query_sol=$this->db->select('id_apoint')->where('confirmada',1 )->get('rendez_vous');
}
echo $query_sol->num_rows();

}

public function billing_medicos()
{
$admin_centro=$this->session->userdata['admin_position_centro'];
$data['name']=$this->session->userdata['admin_name'];
$id_user=$this->session->userdata['admin_id'];
$perfil=$this->session->userdata['admin_perfil'];
$data['perfil']=$perfil;
$data['contler']='admin';
$data['id_user']=$id_user;
$this->load->view('admin/header_admin',$data);
$search_patients_factura=$this->model_admin->search_patients_factura();

$data['centro']=$this->model_admin->report_bill_by_date_centro($id_user,$perfil);


if($admin_centro){
$querycentro1 = $this->db->query("SELECT id_m_c, name FROM medical_centers WHERE id_m_c=$admin_centro");
$queryAm= $this->model_admin->get_doctor($admin_centro);	
$data['centro']=$this->model_admin->billCentroAdministrativo($admin_centro);
$data['admin_centro']= $admin_centro;
}else{
$data['admin_centro']= 0;
$data['centro']=$this->model_admin->report_bill_by_date_centro($id_user,$perfil);
$querycentro1 = $this->db->query('SELECT id_m_c, name FROM medical_centers');
$sqlAm ="SELECT id_user, name FROM users WHERE perfil ='Medico' ORDER BY  name ASC";
$queryt= $this->db->query($sqlAm);
$queryAm=$queryt->result();
}
$data['queryAm']= $queryAm;
$data['search_patients_factura']= $search_patients_factura;
$data['querycentro1']= $querycentro1;
$data['count']=count($search_patients_factura);
$data['search_date_range_seguro_factura']=$this->model_admin->search_date_range_seguro_factura_adm();
$this->load->view('admin/billing/bill/create-bill',$data);

}

public function print_billing_report()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
   $desde=$this->uri->segment(3);
	$hasta=$this->uri->segment(4);
	$checkval=$this->uri->segment(5);
	$id_user=$this->uri->segment(6);
	$doctor=$this->uri->segment(7);
	$centro=$this->uri->segment(8);
	$data1 = array(
	'doctor' => $doctor,
	'centro' => $centro,
   'desde' => $desde,
	'hasta' => $hasta,
	'id_user' => $id_user,
    'checkval' => $checkval,
    'perfil' => $this->session->userdata['admin_perfil']
	);
$mpdf->AddPage('L');
$mpdf->setFooter("Página {PAGENO} de {nb}");
if($checkval=="privado"){
	if($doctor==0){
	$display_report= $this->model_admin->get_fac_date_report_privado($data1);
    } else{
 $display_report = $this->model_admin->get_fac_date_report_centro_privado($data1);
    }

    } else {
 	  if($doctor==0){
	$display_report = $this->model_admin->get_fac_date_report_general($data1);
    } else{
    $display_report= $this->model_admin->get_fac_date_report_general_centro_privado($data1);
     }
     }
 $this->data['display_report']=$display_report;
 $this->data['count']=count($display_report);
$this->data['checkval']=$checkval;
$this->data['doctor']=$doctor;
$this->data['centro']=$centro;
$this->data['desde']=$desde;
$this->data['hasta']=$hasta;
$html = $this->load->view('admin/print/print_billing_report',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->Output();

}

public function print_billing()
{
$print= $this->uri->segment(3);
$last_bill_id=$this->db->select('idfacc,paciente')->order_by('idfacc','desc')->limit(1)->get('factura2')->row_array();
$data['last_bill_id']=$last_bill_id['idfacc'];
$id_usr=$this->session->userdata['admin_id'];
$data['show_diagno_pat']=$this->model_admin->show_diagno_pat($last_bill_id['paciente'],$id_usr);
$data['show_diagno_pro_pat'] = $this->model_admin->show_diagno_pro_pat($last_bill_id['paciente']);
$data['billing1']=$this->model_admin->showBilling1($last_bill_id['idfacc']);
$data['billing2']=$this->model_admin->showBilling2($last_bill_id['idfacc']);

$seguro_medico=$this->db->select('seguro_medico')->where('idfacc',$last_bill_id['idfacc'])->limit(1)->get('factura2')->row('seguro_medico');
$centro_medico=$this->db->select('centro_medico')->where('idfacc',$last_bill_id['idfacc'])->limit(1)->get('factura2')->row('centro_medico');

$data['logoc']=$this->db->select('logo')->where('name',$centro_medico)->get('medical_centers')->row('logo');

$data['logo']=$this->db->select('logo')->where('title',$seguro_medico)->get('seguro_medico')->row('logo');

if($print=="medico"){
$this->load->view('admin/print/billing', $data);
} else{
$this->load->view('admin/print/billing_centro', $data);
}
}





public function invoice_ars_claim()
{
	$data['name']=($this->session->userdata['admin_name']);
   $data['results']=$this->model_admin->invoice_ars_claim();
	$this->load->view('admin/header_admin',$data);
	$this->load->view('admin/billing/invoice_ars_claim/view-all',$data);
}



public function create_invoice_ars_claim()
{
	$admin_position_centro=$this->session->userdata['admin_position_centro'];
	$data['admin_position_c']=$admin_position_centro;
	$data['option']="";
	$sql1 ="SELECT filter_date FROM factura2 WHERE seguro_medico !=11 GROUP BY filter_date";
    $data['query1'] = $this->db->query($sql1);
	$sql2 ="SELECT filter_date FROM factura2 WHERE seguro_medico !=11 GROUP BY filter_date ORDER BY filter_date DESC";
    $data['query2'] = $this->db->query($sql2);
    $data['is_admin']="yes";
	$data['perfil']=$this->session->userdata['admin_perfil'];
	$data['name']=$this->session->userdata['admin_id'];
	$data['date_range1']=$this->model_admin->date_range1();
	
	$this->load->view('admin/header_admin',$data);
	$data['where_report']="";
	$this->load->view('medico/billing/invoice_ars_claim/create',$data);
}



public function get_fac_ars_by_patient()
{
$patient = $this->input->get('patient');
$desde = $this->input->get('desde');
$hasta = $this->input->get('hasta');
$data['patient']=$patient;
$data['desde']=$desde;
$data['hasta']=$hasta;
$data['display_billings'] = $this->model_admin->get_fac_ars_by_patient_adm($patient,$desde,$hasta);
$data['is_admin']= $this->input->get('is_admin');
$this->load->view('admin/billing/invoice_ars_claim/get_fac_ars_patient_adm', $data);

	 //echo json_encode ($query);
}


public function facturas_borradas(){
$data['user']=$this->session->userdata['admin_id'];
$data['perfil']=$this->session->userdata['admin_perfil'];
$this->load->view('admin/header_admin',$data);
$this->load->view('medico/billing/bill/view-facturas-borradas',$data);
}


public function saveInvoiceArsClaim()
{
$nota = $this->input->post('nota');
$ncf = $this->input->post('ncf');
$fecha = $this->input->post('fecha');
$paciente = $this->input->post('paciente');
$num_af = $this->input->post('num_af');
$numauto = $this->input->post('numauto');
$tsubtotal = $this->input->post('tsubtotal');
$totpagseg = $this->input->post('totpagseg');
$totpagpa = $this->input->post('totpagpa');
$medico = $this->input->post('medico');
$servicio = $this->input->post('servicio');
$codigoprestado = $this->input->post('codigoprestado');
$rnc = $this->input->post('rnc');
$seguro_medico = $this->input->post('seguro_medico');
$idfacc = $this->input->post('idfacc');
$time=date("Y-m-d H:i:s");
$data= array(
'value' =>$this->input->post('ncf'),
'nota' =>$this->input->post('nota')
);
$this->model_admin->ncf($data);
$last_id=$this->db->select('id_ncf')->order_by('id_ncf','desc')->limit(1)->get('ncf')->row('id_ncf');
//=========================================================
for ($i = 0; $i < count($fecha); ++$i ) {
$f = $fecha[$i];
$pa = $paciente[$i];
$nf = $num_af[$i];
$na = $numauto[$i];
$ts = $tsubtotal[$i];
$tp = $totpagseg[$i];
$tpg = $totpagpa[$i];
$med= $medico[$i];
$serv = $servicio[$i];
$cod = $codigoprestado[$i];
$rn = $rnc[$i];
$sm= $seguro_medico[$i];
$if= $idfacc[$i];
$save= array(
'fecha' =>$f,
'paciente' =>$pa,
'num_af' =>$nf,
'numauto' =>$na,
'tsubtotal' =>$ts,
'totpagseg' =>$tp,
'totpagpa' =>$tpg,
'medico' =>$med,
'servicio' =>$serv,
'codigoprestado' =>$cod,
'rnc' =>$rn,
'seguro_medico' =>$sm,
'inserted_by' =>$this->input->post('inserted_by'),
'updated_by' =>$this->input->post('inserted_by'),
'inserted_time' =>$time,
'updated_date' =>$time,
'ncf_id' =>$last_id,
'id_fac2' =>$if

);
$this->model_admin->saveInvoiceArsClaim($save);
};

}



public function UpdateSeguroField(){
//if($this->input->post('submitSeguro')){
$id_seguro  = $this->input->post('id_seguro');
$title  = $this->input->post('title');
$active  = $this->input->post('activo');

if($_FILES['picture']['tmp_name'] != '')
{
$imgSize = $_FILES['picture']['size'];
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
$imgExt = strtolower(pathinfo($_FILES["picture"]['name'],PATHINFO_EXTENSION));
$extension = explode('.', $_FILES['picture']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/img/seguros_medicos/' . $logo;
if(in_array($imgExt, $valid_extensions) && $imgSize < 5000000)
{
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);

}
else {
	$msg = "<div id='deletesuccess' style='text-align:center'>Este tipo de archivo no está permitido, la inserción falla.</div>";
	$this->session->set_flashdata('success_msg', $msg);
redirect('admin/health_insurance');
}
}
else {
	$old_logo=$this->db->select('logo')->where('id_sm',$id_seguro)->get('seguro_medico')->row('logo');
$logo = $old_logo;

	}
//Check whether user upload picture
$insert_date=date("Y-m-d H:i:s");

//Prepare array of user data
$save = array(
'title'  => $this->input->post('title'),
'logo' => $logo,
'rnc' => $this->input->post('rnc'),
'tel' => $this->input->post('tel'),
'email' => $this->input->post('email'),
'direccion' =>$this->input->post('direccion'),
'inserted_time' => $insert_date,
'updated_by' =>$this->session->userdata['admin_id'],
'updated_time' =>$insert_date
);

//Pass user data to model
$insertUserData = $this->model_admin->updateSeguro($id_seguro,$save);
//---------------------------------seguro_field
$this->model_admin->deleteSeguroField($id_seguro);
$this->model_admin->deleteSeguroFieldInPatient($id_seguro);
foreach ($active as $key=>$id_f) {
   $saveS= array(
	'medical_insurance_id' =>$id_seguro,
	'field_id' => $id_f

	);

	$this->model_admin->saveSeguroField($saveS);
}
//Storing insertion status message.
if($insertUserData){
$msgs="seguro medico se guada con exito.";
$this->session->set_flashdata('success_msg',$msgs);
}else{
$msger="Hubo algunos problemas, por favor intente de nuevo.";
$this->session->set_flashdata('error_msg', $msger);
}
//redirect('admin/health_insurances');
redirect($_SERVER['HTTP_REFERER']);
//}
//Form for adding user data


}



public function doctor()
{
	$id_doctor= $this->uri->segment(3);
	$data['idd']=$id_doctor;
$data['CENTRO_MEDICO'] = $this->model_admin->display_centro_medico($id_doctor);
$data['CENTRO_MEDICO_ESPECIALIDADED'] = $this->model_admin->display_centro_medical_esp($id_doctor);
$data['CENTRO_MEDICO_SEGURO']= $this->model_admin->display_centro_medical_seguro($id_doctor);
$data['RESULT_DOCTOR']= $this->model_admin->view_doctor($id_doctor);
$data['AGENDA']= $this->model_admin->view_doctor_agenda($id_doctor);
 $data['num_rows']= count($data['AGENDA']);
$data['SEGURO_MEDICO_DOCTOR']= $this->model_admin->view_doctor_seguro($id_doctor);
$data['CENTRO_MEDICO_DOCTOR']= $this->model_admin->view_doctor_centro($id_doctor);
$sql ="SELECT id_asdoc FROM centro_doc_as WHERE id_doctor =$id_doctor group by id_asdoc";
 $data['query']= $this->db->query($sql);
$data['ALLAGENDAS']= $this->model_admin->Agendas();
$data['name']=($this->session->userdata['admin_name']);
$this->load->view('admin/header_admin',$data);
$this->load->view('admin/medicos/doctor', $data);


}




public function lab_lentes(){
$data['perfil']=$this->session->userdata['admin_perfil'];
$data['name']=$this->session->userdata['admin_name'];
$user_id=$this->session->userdata['admin_id'];
$data['user_id']=$user_id;
$this->load->view('admin/header_admin',$data);

$sql ="SELECT * FROM labo_lentes ORDER BY id DESC";

$query= $this->db->query($sql);
$data['query']=$query;

$this->load->view('optica/labo/list', $data);

}




public function patient()
{
$data['name']=$this->session->userdata['admin_name'];
$data['id_user']=$this->session->userdata['admin_id'];
$data['perfil']=$this->session->userdata['admin_perfil'];
$data['area']=0;
$idpatient= $this->uri->segment(3);
$data['id_cm'] =$this->uri->segment(4);
$data['doc'] =$this->uri->segment(5);
$data['nec'] = $this->model_admin->getNec();
$data['idpatient']=$idpatient;
$data['GET_NAMEF']= $this->model_admin->GET_NAMEF($idpatient);
$data['countries'] = $this->model_admin->getCountries();
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['municipios'] = $this->model_admin->getTownships();
$data['provinces']=$this->model_admin->getProvinces();
$data['causa']=$this->model_admin->getCausa();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['doctors'] = $this->model_admin->display_all_doctors();
$data['patient'] = $this->model_admin->historial_medical($idpatient);


  //if($this->uri->segment(4)=='s'){
	$query = $this->model_admin->RendezVousBySearch($idpatient);
 // } else {
	//$query = $this->model_admin->RendezVousByCentro($idpatient,$this->uri->segment(4));
  //}

$data['patid']=$idpatient;
$ctutor=$this->model_admin->CountTutor($idpatient);
$data['ctutor']=$ctutor;
$data['tutor']=$this->model_admin->getTutor($idpatient);
$data['rendez_vous']=$query;
$data['number_cita']=count($query);
$data['nueva_cita']="";
$data['is_admin']="yes";
//---EMERGENCIA------------------------
$patient_admitas= $this->model_emergencia->emergency_patient($idpatient);
$data['patient_admitas']=$patient_admitas;
$data['number_patient_admitas']=count($patient_admitas);
$this->load->view('admin/header_admin',$data);
$data['is_historial']=$this->model_admin->countAnte1($idpatient);
$this->load->view('admin/pacientes-citas/patient', $data);
 $this->load->view('admin/pacientes-citas/footer_patient_search');
$this->load->view('medico/pacientes-citas/cita-footer');
}

public function view_input()
{
	$idpatient=$this->input->post('idpatient');
	$data['idpatient']=$idpatient;
	$data['GET_NAMEF']= $this->model_admin->GET_NAMEF($idpatient);
	$seguro_medico=$this->input->post('seguro_medico');
	$sm=$this->db->select('title')->where('id_sm',$seguro_medico)->get('seguro_medico')->row('title');;
	$data['seguro_medico'] =$sm;
	$data['GET_INPUT']= $this->model_admin->get_input($seguro_medico);
	$this->load->view('admin/pacientes-citas/get-seguro-codigo-edit', $data);
	 //echo json_encode ($query);
}


public function seguro_name()
{
	$seguro_medico_id=$this->input->post('seguro_medico');
	$sm=$this->db->select('title')->where('id_sm',$seguro_medico_id)->get('seguro_medico')->row('title');;
	$data['seguro_medico'] =$sm;
	$query = $this->model_admin->get_input($seguro_medico_id);
	$data['GET_INPUT'] =$query;
	$this->load->view('admin/pacientes-citas/get-seguro-codigo', $data);
	 //echo json_encode ($query);
}




public function get_patient_cedula()
{
$executionStartTime = microtime(true);
$user_id= $this->input->get('user');
$data = array(
  'MUN_CED' => $this->input->get('patient_cedula1'),
  'SEQ_CED' => $this->input->get('patient_cedula2'),
  'VER_CED' => $this->input->get('patient_cedula3')
  );
$patient_cedula2 = $this->input->get('patient_cedula2');
$query_admedicall = $this->model_admin->getPatientCedulaAd($patient_cedula2);
$query_padron = $this->padron_model->getPatientCedulaPad($data);
$photo=$this->padron_model->getPhoto($data);
$data['photo']=$photo;
$executionEndTime = microtime(true);
$now = $executionEndTime - $executionStartTime;
$data['now'] =number_format($now,3);


 if ($query_admedicall != null)
 {
$data['user_id']=$user_id;
$data['patient_admedicall']=$query_admedicall;
$data['base']="Admedicall";
$data['number_found']=count($query_admedicall);
$this->load->view('admin/pacientes-citas/search-patient-result', $data);
 }
 else if ($query_admedicall == null)
 {
$data['user_id']=$user_id;
$data['patient_admedicall']=$query_admedicall;
$data['patient_padron']=$query_padron;
$data['base']="Padron";
$data['number_found']=count($query_padron);
$this->load->view('admin/pacientes-citas/search-patient-result', $data);

 }
else{

$no_patient_name_found = "<div  style='text-align:center;color:red' id='deletesuccess'>Lo siento, no hemos encuentrado el cedula : <b><i>$patient_cedula</i></b></div>";
$this->session->set_flashdata('no_patient_name_found', $no_patient_name_found);
//redirect('admin/create_cita');
redirect($_SERVER['HTTP_REFERER']);
}
}

public function create_new_patient_from_padron($ced1,$ced2,$ced3)
{
	$data['name']=$this->session->userdata['admin_name'];
   $data['perfil']=$this->session->userdata['admin_perfil'];
   $data['id_user']=$this->session->userdata['admin_id'];
      $this->load->view('admin/header_admin',$data);
   $data['is_admin']="yes";
   $data['ced1'] = $ced1;
   $data['ced2'] = $ced2;
   $data['ced3'] = $ced3;
  $data['doc'] =$this->session->userdata['admin_id'];
  $data['area']=0;
  $result=$this->db->select('id_p_a')->where('ced1',$this->uri->segment(3))->where('ced2',$this->uri->segment(4))->where('ced3',$this->uri->segment(5))->get('patients_appointments')->row('id_p_a');
$data['result']=$result;
  $patient_admitas= $this->model_emergencia->emergency_patient($result);
$data['patient_admitas']=$patient_admitas;
$data['number_patient_admitas']=count($patient_admitas);
$this->load->view('admin/pacientes-citas/redirect_patient_result', $data);
$data['id_p_ai'] = encrypt_url($result);
$data['id_useri'] = encrypt_url($this->session->userdata['admin_id']);
$this->load->view('hospitalizacion/create_new_hosp_footer', $data );
}


public function cita_patient_padron()
{
$data['perfil']=$this->session->userdata['admin_perfil'];
$data['name']=$this->session->userdata['admin_id'];
$data['id_user']=$this->session->userdata['admin_id'];
$data['is_admin']="yes";
$val = array(
  'MUN_CED' => $this->uri->segment(3),
  'SEQ_CED' => $this->uri->segment(4),
  'VER_CED' => $this->uri->segment(5)
  );
$data['photo']=$this->padron_model->getPhoto($val);
$patient = $this->padron_model->getPatientCedulaPad($val);
$data['patient']=$patient;
$data['nec'] = $this->model_admin->getNec();
$data['countries'] = $this->model_admin->getCountries();
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['provinces']=$this->model_admin->getProvinces();
$data['causa']=$this->model_admin->getCausa();
$data['municipios'] = $this->model_admin->getTownships();
$data['doctors'] = $this->model_admin->display_all_doctors();
$last_patient_id=$this->db->select('id_p_a')->order_by('id_p_a','desc')->limit(1)->get('patients_appointments')->row('id_p_a');
$lidp=$last_patient_id + 1;
$data['patid']=$lidp;
$ctutor=$this->model_admin->CountTutor($lidp);
$data['ctutor']=$ctutor;
$data['tutor']=$this->model_admin->getTutor($lidp);
$this->load->view('admin/header_admin',$data);
//$this->load->view('admin/pacientes-citas/search_patient',$data);
$this->load->view('medico/pacientes-citas/patient-found-in-padron', $data);
$this->load->view('admin/pacientes-citas/footer_patient_search');
$this->load->view('medico/pacientes-citas/cita-footer');
}


public function ajaxsearchnec()
{

if(is_null($this->input->get('id')))
{

//$this->load->view('admin/examenf');

}
else
{
$val=$this->input->get('id');
$nec="NEC-$val";

$data['necpatient']=$this->model_admin->NecPatient($nec);

$this->load->view('admin/pacientes-citas/outputpatientnec',$data);

}
}




public function import_rates_fac_centro()
{
$data['id_c']=$this->uri->segment(3);
$data['id_seg']=$this->uri->segment(4);
$data['created_by']=$this->session->userdata['admin_id'];
$this->load->view('admin/tarifarios/excel_import_fac_centro',$data);
}






public function edit_causa()
{
$date=date("Y-m-d H:i:s");
$id= $this->input->post('ida');
$updated_by=($this->session->userdata['admin_name']);
$data = array(
'title'=>$this->input->post('title'),
'updated_by'=>$updated_by,
'updated_time'=>$date
);
$this->model_admin->edit_causa($id,$data);


}



//send a security code by email to user

public function send_message_to_new_user(){
$config = Array(
'protocol' => 'smtp',
'smtp_host' => '162.144.158.119',
'smtp_port' => 26,
'smtp_user' => 'soporte@admedicall.com', // change it to yours
'smtp_pass' => 'sopote_adm123QW', // change it to yours
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);
$user_perfil =$this->session->userdata('user_perfil');
$user_name =$this->session->userdata('user_name');
$user_email =$this->session->userdata('user_email');
$passwuser =$this->session->userdata('passwuser');
$msg ="
<html>
<body style='font-family: 'Playfair Display', serif;'>
Saludo Sr(a). <span style='text-transform:uppercase'><strong>$user_name</strong></span><br/> <br/>
Bienvenido a <strong>GICRE (Gestion Integral de Consultas y Recetas Electrónicas)</strong>.<br/>
Usted es un nuevo usuario con el perfil: <strong>$user_perfil</strong> <br/>
Nombre usuario : <strong>$user_email</strong><br/>
Contraseña : <strong>$passwuser</strong><br/>
Puede loguearse a <a href='https://www.admedicall.com/login'>Nuetra página de inicio de sesión</a>
<br/>
<br/><br/><br/>
Atentamente,<br/>
GICRE
</body>
</html>";

$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to($user_email);// change it to yours
$this->email->subject('Bienvenido');
$this->email->message($msg);
$this->email->send();

}



//-------------------CHART-----------------------------------

public  function showChart()
{
$desde=$this->input->get('desde');
$hasta=$this->input->get('hasta');
$centro=$this->input->get('centro');
$medico=$this->input->get('medico');
$dato=$this->input->get('dato');
$this->session->set_userdata('desde_bar',$desde);
$this->session->set_userdata('hasta_bar',$hasta);
$this->session->set_userdata('centro_bar',$centro);
$this->session->set_userdata('medico_bar',$medico);
$data['desde']= date("d-m-Y",strtotime($desde));
$data['hasta']= date("d-m-Y",strtotime($hasta));
if($centro==""){
$medico_name=$this->db->select('name')->where('id_user',$medico)->get('users')->row('name');
$data['val']="Doc. $medico_name";
}else{
$centro_name=$this->db->select('name')->where('id_m_c',$centro)->get('medical_centers')->row('name');
$data['val']="$centro_name";
}

if($dato==1){
$data['bardata1']= $this->model_admin->getBarCha1($desde,$hasta,$centro,$medico);
$this->load->view('admin/chart/bar1', $data);


}
else if($dato==2){
$query = $this->model_admin->getPieChat($desde,$hasta,$centro,$medico);
$data['query']=$query;
$data['bar1']=json_encode($query);
$this->load->view('admin/chart/pie1',$data);
}
else if($dato==3){

$query1 = $this->model_admin->getBarChartAge($desde,$hasta,$centro,$medico);
$data['query']= $query1;

$this->load->view('admin/chart/bar4',$data);
}
else if($dato==4){
$query = $this->model_admin->getBarChart2($desde,$hasta,$centro,$medico);

$data['query']=$query;
$this->load->view('admin/chart/bar2',$data);
}

else if($dato==5){
$query= $this->model_admin->getBarChart3($desde,$hasta,$centro,$medico);
$data['query']=$query;
$this->load->view('admin/chart/bar3',$data);
}

else if($dato==6){
$query = $this->model_admin->getBarChart4($desde,$hasta,$centro,$medico);
$data['query']=$query;
$this->load->view('admin/chart/bar5',$data);
}

else if($dato==7){
$query = $this->model_admin->getBarChart5($desde,$hasta,$centro,$medico);
$data['query']=$query;
$this->load->view('admin/chart/bar6',$data);
}

}



public function emergency_triaje_data($id_em)
{
$data['id_ur']=$this->session->userdata['admin_id'];
$data['idpat']=$id_pat;
$data['id_em']=$id_em;
$data['iduser']=$this->session->userdata['admin_id'];
$data['perfil']=$this->session->userdata['admin_perfil'];
$data['name']=$this->session->userdata['admin_name'];
$data['controller']="admin";
$data['patient_data']=$this->db->select('*')->where('id_ep',$id_em)->get('emergency_patients')->row_array();
$this->load->view('admin/header_admin',$data);
$sql = "SELECT * from emergency_triaje where id_em=$id_em";
$data['query']= $this->db->query($sql);
$this->load->view('admin/emergencia/triage',$data);

}
public function emergency_triaje($id_pat,$id_em)
{
$data['id_ur']=$this->session->userdata['admin_id'];
$data['idpat']=$id_pat;
$data['id_em']=$id_em;
$data['iduser']=$this->session->userdata['admin_id'];
$data['perfil']=$this->session->userdata['admin_perfil'];
$data['name']=$this->session->userdata['admin_name'];
$data['controller']="admin";
$data['patient_data']=$this->db->select('*')->where('id_ep',$id_em)->get('emergency_patients')->row_array();
$this->load->view('admin/header_admin',$data);
$sql = "SELECT * from emergency_triaje where id_em=$id_em";
$data['query']= $this->db->query($sql);
$this->load->view('admin/emergencia/triage',$data);

}




	public function almacen_general()
	{
	$data['admin_centro']=$this->session->userdata['admin_position_centro'];
	$data['iduser']=$this->session->userdata['admin_id'];
	$data['perfil']=$this->session->userdata['admin_perfil'];
	$data['name']=$this->session->userdata['admin_name'];
    $this->load->view('admin/header_admin',$data);
	$this->load->view('admin/emergencia/almacen_general/index',$data);

	}



	public function internal_drugstores()
	{
	$data['iduser']=$this->session->userdata['admin_id'];
	$data['perfil']=$this->session->userdata['admin_perfil'];
	$data['name']=$this->session->userdata['admin_name'];
    $this->load->view('admin/header_admin',$data);
	$data['id_centro']= -1;
	$this->load->view('internal-drugstore/index',$data);

	}


public function payment_received()
{
$perfil=$this->session->userdata['admin_perfil'];
$admin_centro=$this->session->userdata['admin_position_centro'];
$data['perfil']=$perfil;
$data['name']=$this->session->userdata['admin_name'];
$id_doctor=$this->session->userdata['admin_id'];

$this->load->view('admin/header_admin',$data);

$sql ="SELECT * FROM payments  ORDER BY payment_id DESC";
 $data['query']= $this->db->query($sql);
 $data['id_doctor']=$id_doctor;
$this->load->view('medico/payment/payment_received',$data);

}

public function affiliated_codes()
{
$perfil=$this->session->userdata['admin_perfil'];
$data['perfil']=$perfil;
$data['name']=$this->session->userdata['admin_name'];

$this->load->view('admin/header_admin',$data);

$sql ="SELECT * FROM payments  ORDER BY payment_id DESC";
 $data['query']= $this->db->query($sql);
 $data['id_user']=$this->session->userdata['admin_id'];
 $data['especialidades'] = $this->model_admin->getEspecialidades();
$this->load->view('admin/affilated/affiliated_codes',$data);

}



public function downloadDoc($id){
$folder = $this->db->select('folder, file_type, file_ext')->where('id',$id)->get('patients_folders')->row_array(); 
$type=$folder['file_type'];
$ext=$folder['file_ext'];
$fileName=$folder['folder'];
$file = './assets/img/patients-folder/'.$fileName;
if($type=='img'){
echo '<img oncontextmenu="return false" style="width:70%;display: block;margin-left: auto; margin-right: auto; " class="center img" src="'.base_url().'/assets/img/patients-folder/'.$fileName.'"  />';
}elseif($ext=='pdf'){
redirect("admin/read_pdf_file/$id");
}else{
$this->load->helper('download');
force_download($file, NULL);	
}

  }



public function read_pdf_file($id){ 
$fileName = $this->db->select('folder')->where('id',$id)->get('patients_folders')->row('folder'); 
$file = './assets/img/patients-folder/'.$fileName;
  	
// Header content type
header('Content-type: application/pdf');
  
header('Content-Disposition: inline; filename="' . $fileName . '"');
  
header('Content-Transfer-Encoding: binary');
  
header('Accept-Ranges: bytes');
  
// Read the file
@readfile($file);
		
	}



public function downloadDocEmp($id){
        $this->load->helper('download');
        $fileName = $this->db->select('folder')->where('id',$id)->get('employee_folders')->row('folder'); 
        $file = './assets/img/employee-folder/'.$fileName;
        force_download($file, NULL);
	}





}
