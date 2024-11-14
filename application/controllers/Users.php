<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Users extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user');
		$this->load->model('model_admin');
		$this->load->model('navigation/account_demand_model');
		$this->USER_CONTROLLER=$this->session->userdata('USER_CONTROLLER');
		$this->ID_USER =$this->session->userdata('user_id');
		$this->PERFIL_USER =$this->session->userdata('user_perfil');
		$this->IS_ADMINISTRATIVO=$this->session->userdata('admin_position_centro');
		$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
    }
    
    /*
     * User account information
     */
	  public function userTable(){
		  $data['perfil']=$this->input->post("perfil");
		    $data['id']=$this->input->post("id");
		$this->load->view('admin/users/table-data', $data);  
		  
	  }
	  
	    public function areaTable(){
		$this->load->view('admin/users/area/table-data');  
		  
	  }
	  
	  
	  
	 public function listAreas(){
    $draw=intval($this->input->get("draw"));
    $start=intval($this->input->get("start"));
    $length=intval($this->input->get("length"));
    $query=$this->db->query("SELECT * FROM  areas  ORDER BY title_area ASC");
    $data= [];
    foreach($query->result() as $row) {
			

 $doctors_area = '';
$sqln="SELECT id_user, name FROM users WHERE area=$row->id_ar ";
$queryn= $this->db->query($sqln);
foreach ($queryn->result() as $rn){
	 $doctors_area .= '<li class="list-group-item"><a  href="'.base_url().'admin/doctor_account/'.$rn->id_user.'" >Dr(a) '.$rn->name.'</li>';
	
}
 

 $ol = "<ol class='list-group list-group-flush list-group-numbered'>$doctors_area</ol>";
 
 
 $areas = $row->title_area . " <em>(".$queryn->num_rows() ." doctores)</em>";
 
 
 
 
$action='';		
		
    $sub_array = array();
	 $sub_array[] = $row->id_ar;
         $sub_array[] = $areas .$ol;	
   
        $sub_array[] = $action; 
     $data[] = $sub_array; 
}

    $result=array(
             "draw"=>$draw,
               "recordsTotal"=>$query->num_rows(),
               "recordsFiltered"=>$query->num_rows(),
               "data"=>$data
          );
    echo json_encode($result);
    exit();

 }  
	 public function saveArea(){
		 if($this->input->post("area")){
		 $data= array(
	'title_area' =>$this->input->post("area"),
	);

	$this->db->insert("areas",$data);
	redirect($_SERVER['HTTP_REFERER']);
		 }
	 }
	 
 public function listUsers(){
    $draw=intval($this->input->get("draw"));
    $start=intval($this->input->get("start"));
    $length=intval($this->input->get("length"));
	  $perfil=$this->input->get("perfil");
	  
	 if($this->IS_ADMINISTRATIVO){
		 if($perfil=='Medico'){
		$query=$this->db->query("SELECT * FROM users 
	RIGHT JOIN doctor_agenda_test ON users.id_user=doctor_agenda_test.id_doctor 
	WHERE id_centro =$this->IS_ADMINISTRATIVO  GROUP BY id_doctor ORDER BY is_log_in DESC");
		 }elseif($perfil=='Asistente Medico'){
			$query=$this->db->query("SELECT * FROM users 
	RIGHT JOIN doctor_centro_medico ON users.id_user=doctor_centro_medico.id_doctor 
	WHERE centro_medico =$this->IS_ADMINISTRATIVO  GROUP BY id_doctor ORDER BY is_log_in DESC"); 
		 } else{
			$query=$this->db->query("SELECT * FROM users 
	RIGHT JOIN user_centro_administrativo ON users.id_user=user_centro_administrativo.id_user 
	WHERE id_centro =$this->IS_ADMINISTRATIVO  GROUP BY user_centro_administrativo.id_user ORDER BY is_log_in DESC"); 
		 }
	 }else{
	  
	  $query=$this->db->query("SELECT * FROM users WHERE perfil='$perfil' ORDER BY is_log_in DESC");
	 }
    $data= [];
	$i=1;
    foreach($query->result() as $row) {
			
       $area=$this->db->select('title_area')->where('id_ar',$row->area)->get('areas')->row('title_area');
		if($perfil=="Medico"){
			$showArea =  $area;
			$page = "doctor_account";
		}elseif($perfil=="Asistente Medico" || $perfil=="Enfermera"  || $perfil=="Farmacia Interna"){
			$showArea =  '';
			$page = "medical_assistent";
		}else{
		$showArea = "";
      $page = "admin_account";		
		}
		$GOTO ='<a  href="'.base_url().''.$this->USER_CONTROLLER.'/'.$page.'/'.$row->id_user.'" >'.$row->name.'</a>';
		
        if($row->status==1){
			$isActive = 'Activado';
			$isBtnActiveAction = '<button type="button"   id="'.$row->id_user.'" title="Desactivar" class="action-user btn btn-danger btn-sm 0"><i class="bi bi-x-octagon"></i></button>';
		}else{
		$isActive = 'Desactivado';
         $isBtnActiveAction = '<button type="button"   id="'.$row->id_user.'" title="Activar" class="action-user btn btn-success btn-sm 1"><i class="bi bi-check2-circle"></i></button>';
		}
		
		  if($row->is_log_in==1){
			$connection = ' <span style="display:none">1</span><span class="bi bi-person-check-fill text-success" title="connectado a '.$row->login_time.'" style="font-size:26px"></span>';
		}else{
		$connection = ' <span style="display:none">0</span><span class="bi bi-person-x-fill text-danger" style="font-size:26px" title="dedconnectado a '.$row->last_login_time.'" ></span>';
		}
		
		
    $sub_array = array();
         $sub_array[] = $i ++;	
        $sub_array[] = $GOTO;
		$sub_array[] = $connection;
	  $sub_array[] = $row->perfil ." ". $showArea;
    $sub_array[] = $isActive; 
        $sub_array[] = $isBtnActiveAction; 
     $data[] = $sub_array; 
}

    $result=array(
             "draw"=>$draw,
               "recordsTotal"=>$query->num_rows(),
               "recordsFiltered"=>$query->num_rows(),
               "data"=>$data
          );
    echo json_encode($result);
    exit();

 }
 

public function action_user()
{
	$data = array(
  'status' => $this->input->post('action'),
  'updated_by' => $this->ID_USER,
  'update_date' => date("Y-m-d H:i:s")
  );
$this->model_admin->DeactivarUser($this->input->post('id'),$data);
}


public function get_medico_from_center()
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


public function saveAsDoctorUpdate(){
$modify_date=date("Y-m-d H:i:s");
$id_user  = $this->input->post('id_user_cu');

$centro_medico  = $this->input->post('centro_medico_doct');
$medico  = $this->input->post('doc_centro_medico');

$this->model_admin->deleteDocCentro($id_user);

$whereh = array(
'id_doctor' =>$id_user
);

$this->hospitalization_emgergency->where($whereh);
$this->hospitalization_emgergency->delete('doctor_centro_medico');

for ($i = 0; $i < count($centro_medico); ++$i ) {
    $idcentro = $centro_medico[$i];

	$saveD= array(
	'id_doctor' =>$id_user,
	'centro_medico' => $idcentro
	);

	$this->model_admin->saveDoctorCentroMedico($saveD);
	$this->hospitalization_emgergency->insert("doctor_centro_medico",$saveD);
}
//-----------------------------------------------------------------------
if($this->PERFIL_USER =="Asistente Medico" || $this->PERFIL_USER =="Admin" ){
$where1 = array(
'id_asdoc' =>$id_user
);

$this->db->where($where1);
$this->db->delete('centro_doc_as');

for ($i2 = 0; $i2 < count($medico); ++$i2 ) {
    $idmedico = $medico[$i2];

	$savedas= array(
	'id_doctor' =>$idmedico,
	'id_asdoc' => $id_user
	);

	$this->db->insert("centro_doc_as",$savedas);
}
}
redirect($_SERVER['HTTP_REFERER']);
}


public function showCreateForm(){
	$form=$this->input->post('form');
	if($form==1){
	$this->load->view('admin/users/create/medico');	
	}elseif($form==2){
		echo 2;
	}
	elseif($form==3){
		echo 3;
	}
}

public function saveNewPassword(){
$pass1=$this->input->post('pass1');
$pass2=$this->input->post('pass2');
$id_user=$this->ID_USER;
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
$response['message'] = 'Cambiada con éxito!<br/>El usuario debe Loguearse de nuevo.'; 
//if($this->PERFIL_USER !="Admin"){
$where = array(
'user_id' =>$id_table
);

$this->db->where($where);
$this->db->delete('current_user_info');


$this->db->like('data', $id_table);
$this->db->delete('ci_sessions');
//}
}
echo json_encode($response);
}

function saveDocSello(){

 if($this->input->post('if-selloimage')==1){
			
  $extension = explode('.', $_FILES['selloimage']['name']);
$sello = rand() . '.' . $extension[1];
$destination = './assets/update/' . $sello;
move_uploaded_file($_FILES['selloimage']['tmp_name'], $destination);
			$save = array(
			'sello'=>$sello,
			'doc'=>$this->input->post('id_doctor_for')
			);
			$this->db->insert("doctor_sello",$save);

		}	
		redirect($_SERVER['HTTP_REFERER']);
}


public function updateUserAccount(){
$id_user  = $this->input->post('id_user');

$data3 = array(
'name' =>$this->input->post('userName'),
'correo' =>$this->input->post('userEmail'),
'area' =>$this->input->post('especialidad'),
'exequatur' =>$this->input->post('exequatur'),
 'cedula' =>$this->input->post('userCedula'),
'cell_phone' => $this->input->post('userPhone'),
'whatsapp_link'=>$this->input->post('whatsapp_link'),
'update_date' => date("Y-m-d H:i:s"),
'updated_by' => $this->ID_USER
  );

$this->model_admin->DeactivarUser($id_user,$data3);

//-----------------------SAVE SELLO-----------------------------------------------------------
 if($this->input->post('if-selloimage')==1){
			
  $extension = explode('.', $_FILES['selloimage']['name']);
$sello = rand() . '.' . $extension[1];
$destination = './assets/update/' . $sello;
move_uploaded_file($_FILES['selloimage']['tmp_name'], $destination);
			$save = array(
			'sello'=>$sello,
			'doc'=>$id_user
			);
			$this->db->insert("doctor_sello",$save);

		}

//-----------------------SAVE LOGO TIPO-----------------------------------------------------------
 if($this->input->post('if-logo-tipo-empty')==1){
      $extension = explode('.', $_FILES['logo-tipo']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/update/' . $logo;
move_uploaded_file($_FILES['logo-tipo']['tmp_name'], $destination);


$save = array(
'sello'=>$logo,
'doc'=>$id_user,
'dist'=>1
);
$this->db->insert("doctor_sello",$save);;
}





$msg = "<h4 id='deletesuccess'  style='text-align:center;color:green'>Usuario se edita con exito.</h4>";
$this->session->set_flashdata('success_msg', $msg);

redirect($_SERVER['HTTP_REFERER']);

}


public function removeSello(){
$answerid=$this->input->post('answerid');
$id=$this->input->post('id');
if($answerid !=2){
$sello=$this->db->select('sello')->where('doc',$id)->where('dist',$answerid)->get('doctor_sello')->row('sello');	
unlink("assets/update/".$sello);	
		
$where = array(
'doc'=>$this->input->post('id'),
'dist'=>$answerid
);

$this->db->where($where);
$this->db->delete('doctor_sello');
}else{
$upload_dir = './assets/update/';
$file2 = $upload_dir ."278-1.png";
unlink($file2);	
}
}

public function get_medico_exequatur()
{
$exequatur=$this->input->post('exequatur');
$sql ="SELECT name, exeq FROM  exequatur WHERE exeq = '$exequatur' AND exeq !='' AND name NOT IN (SELECT name from users)";
$data['query']= $this->db->query($sql);
$this->load->view('admin/medicos/medico-exequatur', $data);
}



public function get_medico_name()
{
$nombres=$this->input->post('nombres');
$sql ="SELECT name, exeq FROM  exequatur WHERE name LIKE '%$nombres' AND exeq !='' AND name NOT IN (SELECT name from users)";
$data['query']= $this->db->query($sql);
$this->load->view('admin/medicos/medico-exequatur', $data);
}




public function autoCompleteDoctor()
{
$keyword=$this->input->post('keyword');
if(!empty($keyword)) {
$table= $this->input->post('table');
$data['field_name_in_table']= "name";
$data['input_name']=  'userName';
$data['div_result']= 'search-by-nombres';
$sql ="SELECT name FROM exequatur  WHERE  name LIKE '" . $keyword . "%' AND name NOT IN (SELECT name from users)";
$data['query']=$this->db->query($sql); 
$this->load->view('clinical-history/auto-complete-field-results', $data);


    }
}


public function saveUser(){
$date=date("Y-m-d H:i:s");
$seguro_medico=$this->input->post('seguro_medico');
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
//$passwuser = substr( str_shuffle( $chars ), 0, 8 );
$passwuser = "gicre";
if($this->input->post('perfil')=="Médico"){
$perfil="Medico";
$page="doctor_account";	
}elseif($this->input->post('perfil')=="Asistente Médico"){
$perfil="Asistente Medico";	
$page="medical_assistent";
}
elseif($this->input->post('perfil')=="Enfermera"){
$perfil="Enfermera";	
$page="medical_assistent";
}

elseif($this->input->post('perfil')=="Farmacia Interna"){
$perfil="Farmacia Interna";	
$page="medical_assistent";
}

elseif($this->input->post('perfil')=="Auditoria Médico"){
$perfil="Auditoria Medico";	
$page="medical_assistent";
}



else{
$perfil="Admin";	
$page="admin_account";	
}



if($this->input->post('payment-plan')==0){
	$cuenta_gratis = 0;
}else{
$cuenta_gratis = 1;	
}
$save = array(
  'name'  => $this->input->post('userName'),
   'perfil' =>$perfil,
    'cell_phone' => $this->input->post('userPhone'),
   'username' => $this->input->post('userEmail'),
   'password' => md5($passwuser),
   'correo' => $this->input->post('userEmail'),
  'exequatur' => $this->input->post('exequatur'),
   'cedula' => $this->input->post('userCedula'),
   'area' => $this->input->post('especialidad'),
  'inserted_by' => $this->session->userdata['user_id'],
  'updated_by' =>$this->session->userdata['user_id'],
 'insert_date'=> $date,
  'update_date' => $date,
  'plazo'=> $date,
   'payment_plan' =>$this->input->post('payment-plan'),
   'cuenta_gratis' =>$cuenta_gratis,
   'status' => 1,
   'whatsapp_link'=>$this->input->post('whatsapp_link')
   );
$id_doc_user=$this->model_admin->CreateUser($save);

if($perfil=="Medico"){
	$segArray =  array(); 		
for ($i = 0; $i < count($seguro_medico); ++$i ) {
$seg = $seguro_medico[$i];
 $segArray[] = array(
'id_doctor' =>$id_doc_user,
	'seguro_medico' => $seg
); 
} 
$this->db->insert_batch('doctor_seguro', $segArray);
	
$this->model_admin->delete_doctor_seguro2();
}


if($this->input->post('perfil')=="Administrativo"){
$data = array(
  'id_user' => $id_doc_user,
  'id_centro' => $this->input->post('centro'),
  'inserted_time' => date("Y-m-d H:i:s")
  );	
$this->db->insert("user_centro_administrativo",$data);
}



	redirect("admin/$page/$id_doc_user/");
}




function updateDocSeguroMed(){
$id_doc_user=$this->input->post('id_user_seg');
	
$where1 = array(
'id_doctor' =>$id_doc_user
);

$this->db->where($where1);
$this->db->delete('doctor_seguro');
	
$seguro_medico=$this->input->post('seguro_medicos_');
	$segArray =  array(); 		
for ($i = 0; $i < count($seguro_medico); ++$i ) {
$seg = $seguro_medico[$i];
 $segArray[] = array(
'id_doctor' =>$id_doc_user,
	'seguro_medico' => $seg
); 
} 
$this->db->insert_batch('doctor_seguro', $segArray);

redirect("admin/doctor_account/$id_doc_user/");	
}




public function saveNewPassWebService(){
$perfil= $this->db->select('perfil')->where('id_user',$this->input->post('id_user'))->get('users')->row('perfil');
$password=$this->input->post('password');
$id_seguro=$this->input->post('id_seguro');
$id_user=$this->input->post('id_user');
$id_centro=$this->input->post('id_centro');
if($perfil=="Medico"){
	$passField = "passwordDoc";
	$centro_type = "privado";
	$idUserField="id_doctor";
	$idUserValue=$id_user;
}else{
	$passField = "passwordCentro";
	$centro_type = "publico";
    $idUserField="id_centro";
    $idUserValue=$id_centro;	
}

$query = $this->db->get_where('doctor_web_services_credentials',
array(
$idUserField=>$idUserValue,
'id_seguro'=>$id_seguro,
));



if($password=='' || $id_seguro==''){
 $response['status'] =0;
$response['message'] = 'los dos campos son obligatorios!'; 
} elseif($query->num_rows() == 1){
	$where= array(
   'id_seguro' => $id_seguro,
  $idUserField => $idUserValue
);


$data = array(
  $passField => $password
 );


 
$this->db->where($where);
$this->db->update("doctor_web_services_credentials",$data);
 $response['status'] =2;
$response['message'] = 'Cambiado con éxito.'; 
}
else{	
$data = array(
  $passField => $password,
  'id_seguro' => $id_seguro,
  $idUserField => $idUserValue,
  'centro_type' =>$centro_type,
   'id_user' =>$this->input->post('id_user')   
  );	
$this->db->insert("doctor_web_services_credentials",$data);
 $response['status'] =1;
$response['message'] = 'Agregado con éxito.'; 

}
echo json_encode($response);
}







	
}