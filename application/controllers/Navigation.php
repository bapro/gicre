<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navigation extends CI_Controller {

	  function __construct()
  {
    parent::__construct();
	$this->load->model('navigation/account_demand_model');
	$this->load->model('model_admin');
	$this->load->model('user');
 $this->load->library('email'); 
 $this->load->helper('email');
 $this->load->model("padron_model");
 $this->load->library("pagination");
   $this->load->library('form_validation');
  }
  
  
public function updatePatientAccount(){
	
$this->form_validation->set_rules('correo', 'Correo Elec.', 'trim|required');
//$this->form_validation->set_rules('username', 'Usuario', 'trim|required');
if ($this->form_validation->run() == FALSE) {
   $array = array(
    'error'   => true,
	'correo_error' => form_error('correo')
	//'username_error' => form_error('username')
   );
}else{
$update = array(
   'username' => $this->input->post('correo'),
   'correo' => $this->input->post('correo'),
   'updated_by' =>$this->input->post('id_p_a'),
	 'update_date' =>date("Y-m-d H:i:s")
  );
  
$where = array(
'id_p_a' =>$this->input->post('id_p_a')
);

$this->db->where($where);
$this->db->update("users",$update);
$array = array(
'success' => '<div class="alert alert-success">Message send successfully</div>'
);
}
echo json_encode($array);
}	




public function createPatientAccount(){
$action=$this->input->post('action');
$this->form_validation->set_rules('correo', 'Correo Elec.', 'trim|required');
//$this->form_validation->set_rules('username', 'Usuario', 'trim|required');
$this->form_validation->set_rules('password1', 'Contraseña', 'trim|required');
$this->form_validation->set_rules('password2', 'Confirmar Contraseña', 'trim|required|matches[password1]');

if ($this->form_validation->run() == FALSE) {
   $array = array(
    'error'   => true,
	'correo_error' => form_error('correo'),
	//'username_error' => form_error('username'),
    'password1_error' => form_error('password1'),
    'password2_error' => form_error('password2')
   );
} elseif($action==1){
	$update = array(
   'username' =>$this->input->post('correo'),
   'correo' => $this->input->post('correo'),
   'password' => md5($this->input->post('password1')),
     'updated_by' =>$this->input->post('id_p_a'),
	 'update_date' =>date("Y-m-d H:i:s")
  );
  
$where = array(
'id_p_a' =>$this->input->post('id_p_a')
);

$this->db->where($where);
$this->db->update("users",$update);

	$updateTabPat = array(
   'email' =>$this->input->post('correo')
  );


$this->db->where($where);
$this->db->update("patients_appointments",$updateTabPat);
$array = array(
'success' => '<div class="alert alert-success">Su cuenta ha sido modificada.</div>'
);
}else {	
$save = array(
  'name'  => $this->input->post('nombres'),
   'perfil' => "Paciente",
   'correo' => $this->input->post('correo'),
   'correo' => $this->input->post('correo'),
   'password' => md5($this->input->post('password1')),
  'inserted_by' =>$this->input->post('id_p_a'),
  'updated_by' =>$this->input->post('id_p_a'),
  'id_p_a' =>$this->input->post('id_p_a'),
 'insert_date'=>date("Y-m-d H:i:s"),
  'update_date' =>date("Y-m-d H:i:s"),
   'status' =>1
   );

$this->db->insert('users', $save);
if($this->db->affected_rows() > 0){
$array = array(
'success' => '<div class="alert alert-success">Su cuenta ha sido creada.</div>'
);

}else{
$array = array(
'failed' => '<div class="alert alert-dander">Failed</div>'
);
}
}
 echo json_encode($array);
}




function uploadImg()  
{  
if(isset($_FILES["image_file"]["name"]))  
{  

$config = array(
'upload_path' => "./assets/img/patients-pictures/",
'allowed_types' => "gif|jpg|png|jpeg",
'overwrite' => TRUE,
'max_size' => "3048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
//'max_height' => "768",
//'max_width' => "1024"
);
$this->load->library('upload', $config);  
if(!$this->upload->do_upload('image_file'))  
{  
$error =  $this->upload->display_errors(); 
echo json_encode(array('failed_saved' => $error, 'success' => false));
}  
else 
{  

$photo=$this->db->select('photo')->where('id_p_a',$this->input->post('id_p_a'))->get('patients_appointments')->row('photo');
if($photo){
	unlink("./assets/img/patients-pictures/".$photo);
}


$data = $this->upload->data(); 
$saveImg = array(
'photo'  => $data['file_name'],
'update_date' =>date("Y-m-d H:i:s"),
'updated_by' => $this->input->post('id_p_a')

);
$this->model_admin->saveUpdatePatient($this->input->post('id_p_a'),$saveImg);	
if($this->db->affected_rows() > 0){  
$arr = array(
'success_saved' => '<div class="alert alert-success">Foto guardado</div>'
);
}else{
$arr = array(
'failed_saved' => '<div class="alert alert-danger">Grabacion fallo</div>'
);
}
echo json_encode($arr);
} 

}  
} 


public function createAccount($nec)
{
$this->load->view('navigation/header');
$nec_ = decrypt_url($nec);
$data['nec'] = $nec;
$data['patient_admedicall']= $this->model_admin->historial_medical($nec_);
$data['correo']=$this->db->select('correo')->where('inserted_by',$nec_)->get('users')->row('correo');
$this->load->view('navigation/create-patient-account', $data);

}


	//registration to receive password
	public function registration()
	{
		$this->load->view('navigation/view_registration');
	}
	public function AddRequest()
	{
		$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
		$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
		$data['especialidad'] = $this->account_demand_model->getEspecialidad();
		$data['causa']=$this->account_demand_model->getCausa();
		$data['doctors'] = $this->account_demand_model->getDoctor();
		$this->load->view('navigation/view_cita',$data);
		$this->load->view('admin/pacientes-citas/footer_patient_search');
        $this->load->view('medico/pacientes-citas/cita-footer');
	}
	
	
	public function create_doctor_account()
	{
	$this->load->view('navigation/header');
	$data['perfil']='medico';
	$data['controller']='navigation';
	$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
	$data['especialidades'] = $this->model_admin->getEspecialidades();
	$data['execuatur'] = $this->model_admin->getExecuatur();
	$data['causa']=$this->model_admin->getCausa();
	$data['medical_centers'] = $this->model_admin->display_all_medical_centers();
	$this->load->view('navigation/get_doc_user_form', $data);
	$this->load->view('navigation/footer');
	}
	
public function update_account_doctor(){
	
	$data = array(
  'name'  => $this->input->post('nombre'),
  'exequatur' => $this->input->post('exequatur'),
   'cedula' => $this->input->post('cedula'),
   'area' => $this->input->post('especialidad'),
 'update_date' =>date("Y-m-d H:i:s"),
 'updated_by' =>$this->input->post('id_doctor'),
  'insert_date' =>date("Y-m-d H:i:s"),
 'inserted_by' =>$this->input->post('id_doctor')
  );
  
$where = array(
'id_user' =>$this->input->post('id_doctor')
);

$this->db->where($where);
$this->db->update("users",$data);	
redirect($_SERVER['HTTP_REFERER']);	
}	

	
public function saveMedico(){

$rules = array(
array(
'field' => 'exequatur',
'label' => 'Exequatur',
'rules' => 'required'

),

array(
'field' => 'nombre',
'label' => 'Nombres Correo electrónico',
'rules' => 'required'

),

array(
'field' => 'cedula',
'label' => 'Cedula',
'rules' => 'required'

),
array(
'field' => 'phone',
'label' => 'Telefono',
'rules' => 'required'
),

array(
'field' => 'especialidad',
'label' => 'Especialidad',
'rules' => 'required'
),
array(
'field' => 'seguro_medico[]',
'label' => 'Seguro medicos',
'rules' => 'required'
),
array(
'field' => 'email',
'label' => 'Correo electrónico',
'rules' => 'required'

),
);

$this->form_validation->set_rules($rules);
$this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="text-align:center">', '</div>'); 
if ($this->form_validation->run() == FALSE) {
$msg='<h3 style="color:red;text-align:center">El formulario no se ha guadado, favor revisar :</h3>';
$this->session->set_flashdata('error_messages', $msg);

$this->load->view('navigation/header');
$data['perfil']='medico';
$data['controller']='navigation';
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['execuatur'] = $this->model_admin->getExecuatur();
$data['causa']=$this->model_admin->getCausa();
$data['medical_centers'] = $this->model_admin->display_all_medical_centers();
$this->load->view('navigation/get_doc_user_form', $data);
$this->load->view('navigation/footer');
}else{
$date=date("Y-m-d H:i:s");
$seguro_medico=$this->input->post('seguro_medico');
$save = array(
'name'=> $this->input->post('nombre'),
'perfil' =>'Medico',
'username' => $this->input->post('email'),
'password' => '',
'correo' => $this->input->post('email'),
'exequatur' => $this->input->post('exequatur'),
'cedula' => $this->input->post('cedula'),
'cell_phone' => $this->input->post('phone'),
'area' => $this->input->post('especialidad'),
'insert_date' =>date('Y-m-d H:i:s'),
'update_date' =>date('Y-m-d H:i:s'),
'status' =>0
);
$id_doc_user=$this->model_admin->CreateUser($save);

$where = array(
'id_user' =>$id_doc_user
);
$data = array(
'inserted_by'=>$id_doc_user,
'updated_by'=>$id_doc_user
);
$this->db->where($where);
$this->db->update("users",$data);

for ($i = 0; $i < count($seguro_medico); ++$i ) {
$seg = $seguro_medico[$i];

$saveD= array(
'id_doctor' =>$id_doc_user,
'seguro_medico' => $seg
);

$this->model_admin->saveDoctorSeguro($saveD);
}


$this->model_admin->delete_doctor_seguro2();


$msg = "<div  style='text-align:center;font-size:20px' id='deletesuccess'> <span style='color:green'>Usuario esta creado .</div>";
$this->session->set_flashdata('success_msg_create_user', $msg);
$this->session->set_userdata('id_doc_user',$id_doc_user);
$this->sendEmailToUs($id_doc_user);
redirect("navigation/asasfdd09808sfsdfsddf098");

}
}

function asasfdd09808sfsdfsddf098(){
$this->load->view('navigation/contact_success');
}
	
	
function  sendEmailToUs($id_doc){

//-------------------------------DOCTOR INFO------------------------------------------------------

$doctor=$this->db->select('name,correo,cell_phone')->where('id_user',$id_doc)->get('users')->row_array();
$doctor_name=$doctor['name'];
$doctor_correo=$doctor['correo'];
$cell_phone=$doctor['cell_phone'];

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
<meta charset='utf-8'>
<body style='font-family: 'Playfair Display', serif;'>

<p style='text-transform:uppercase'>El doc.(a) <strong>$doctor_name (Tel: $cell_phone, correo: $doctor_correo </strong><br/> acabo de crear su cuenta en GICRE, favor dale seguimiento.</p>

</body>
</html>";
//-----------SEND EMAIL TO THE DOCTOR
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to("admedicall@gmail.com");// change it to yours
$this->email->subject("Nueva cuenta creada por doc.(a) $doctor_name");
$this->email->message($msg);
$this->email->send();


}	

	
		public function crear_solictud_de_cita()
	{
		$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
		$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
		$data['especialidad'] = $this->account_demand_model->getEspecialidad();
		$data['causa']=$this->account_demand_model->getCausa();
		$data['doctors'] = $this->account_demand_model->getDoctor();
		$this->load->view('navigation/crear_cita',$data);
	}
	
	public function get_input()
{
	$seguro_medico=$this->input->post('seguro_medico');
	$query = $this->account_demand_model->get_input($seguro_medico);
	$data['GET_INPUT'] =$query;
	//$data['GET_INPUT'] =$seguro_medico;
	$this->load->view('navigation/view_get_input', $data);
	 //echo json_encode ($query);
	 

}
	public function contacto()
	{
		$this->load->view('navigation/view_contacto');
	}
	
	public function registration_sent()
 {
	 $date1 = date("Y-m-d H:i:s");
  $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
  $save = array(
      'nombre'  => $this->input->post('nombre'),
      'apellido'=> $this->input->post('apellido'),
	  'gender' => $this->input->post('gender'),
      'ubicacion' => $this->input->post('ubicacion'),
      'servicio' => $this->input->post('servicio'), 
       'email' => $this->input->post('email'),
     // 'password' => md5($this->input->post('password')),   
      'telefono'=> $this->input->post('telefono'),
      'created'=>$date1	  
       );
if($this->form_validation->run() == true){
  $this->account_demand_model->saveDemande($save);
  $msg = "<div class='alert alert-success' style='text-align:center' id='deletesuccess'> Su información ha sido enviada con éxito y nos pondremos en contacto con usted pronto para darle nueva cuenta. 
		<br/>Asegúrese de proporcionar informaciónes confiables.</div>";
 
  $this->session->set_flashdata('success_msg', $msg);
  //$this->load->view('navigation/view_registration', $data);
  redirect('navigation/registration'); 
}
else{
	$data['user'] = $save;
	 $this->load->view('navigation/view_registration', $data);
	
	
}
 }
	 public function email_check($str){
        $con['returnType'] = 'count';
        $con['conditions'] = array('email'=>$str);
        $checkEmail = $this->user->getRows($con);
        if($checkEmail > 0){
			$msga = "<div class='alert alert-danger'>El correo electrónico ya existe.</div> ";
           $this->form_validation->set_message('email_check', $msga);
            return FALSE;
        } else {
            return TRUE;
        }
    }
	
	
public function cita_sent_patient_found(){

$id_p_a=$this->input->post('id_p_a');	
$rules = array(
array(
'field' => 'tel_cel',
'label' => 'Celular',
'rules' => 'required'

),

array(
'field' => 'causa',
'label' => 'Causa',
'rules' => 'required'

),
array(
'field' => 'doctor',
'label' => 'Doctor',
'rules' => 'required'
),

array(
'field' => 'centro_medico',
'label' => 'Centro Medico',
'rules' => 'required'
),
array(
'field' => 'fecha_propuesta',
'label' => 'Fecha Propuesta',
'rules' => 'required'
),
array(
'field' => 'especialidad',
'label' => 'especialidad'

)
);

$this->form_validation->set_rules($rules);
$this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="text-align:center">', '</div>'); 
if ($this->form_validation->run() == FALSE) {
$msg='<h3 style="color:red;text-align:center">El formulario no se ha guadado, favor revisar :</h3>';
$this->session->set_flashdata('error_messages', $msg);
$this->load->view('navigation/header');
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidad'] = $this->account_demand_model->getEspecialidad();
$data['causa']=$this->account_demand_model->getCausa();
$data['doctors'] = $this->account_demand_model->getDoctor();
$data['ifCentroDisabled'] ='';
$data['patient_admedicall']  = $this->model_admin->historial_medical($id_p_a);
$data['getPatientNameInfo']='';
$this->session->set_userdata('tranfer_pat_id', $id_p_a);
$this->load->view('navigation/pacient-found-create-cita', $data);
}	
else{	
$query = $this->db->get_where('rendez_vous',array('DATE(created_time)'=>date('Y-m-d'),'doctor'=>$this->input->post('doctor'),'id_patient'=>$id_p_a));
if($query->num_rows() == 0){
$filter_date = date("Y-m-d", strtotime($this->input->post('fecha_propuesta')));	
 $save2 = array(
'nec'=> "NEC-$id_p_a",
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'doctor' =>$this->input->post('doctor'),
'area' =>$this->input->post('especialidad'),
'id_patient' => $id_p_a,
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'weekday' =>'',
'confirmada' => 1,
'update_by' =>0,
'inserted_by' =>0,
'created_time' =>date("Y-m-d H:i:s"),
'update_time' =>date("Y-m-d H:i:s"),
'filter_date' =>$filter_date,
'cancelar' =>0
   );
$id_apoint=$this->model_admin->save_rendevous($save2);

$where = array(
  'id_p_a' =>$id_p_a
);
$data = array(
'tel_cel'=>$this->input->post('tel_cel'),
'email'=>$this->input->post('email')
);
$this->db->where($where);
$this->db->update("patients_appointments",$data);

$fecha=$this->input->post('fecha_propuesta');
$id_doctor=$this->input->post('doctor');


//------------------------------------------------------------------------------------------------
$this->load->view('navigation/confirm-cita', $data);
$this->sendEmailToDocAndAsistDoc($id_p_a,$fecha,$id_apoint,$id_doctor);

//redirect("navigation/cita_creada");	
} else{
$doc_n=$this->db->select('name')->where('id_user',$this->input->post('doctor'))->get('users')->row('name');
echo "<h3 style='text-align:center'>Usted tiene una solicitud de cita hoy con doc.(a) $doc_n</h3>";
echo '<script language="javascript">' .
'setTimeout(function(){ window.location.href = "/navigation/AddRequest"; }, 4000);' .
'</script>';	

}
}
}



	
public function cita_sent_patient_not_found()
{
 $rules = array(
 array(
                'field' => 'nombre',
                'label' => 'nombre',
                'rules' => 'required',
				
            ),
                 
			 array(
                'field' => 'tel_cel',
                'label' => 'Telefono celular',
                'rules' => 'required'
            ),
			
			  
        );

        $this->form_validation->set_rules($rules);
		     $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>'); 
		if ($this->form_validation->run() == FALSE) {
			$msg='<h3 style="color:red">El formulario no se ha guadado, favor revisar :</h3>';
			$this->session->set_flashdata('error_messages', $msg);
       $this->load->view('navigation/header');
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['id_url']=$this->input->post('id_url');
$this->load->view('navigation/pacient-not-found', $data);
$this->load->view('admin/pacientes-citas/footer_patient_search');
	} else{
$query = $this->db->get_where('patients_appointments',array('nombre'=>$this->input->post('nombre'),'date_nacer'=>$this->input->post('date_nacer'),'tel_cel'=>$this->input->post('tel_cel')));
if($query->num_rows() > 0){
echo "<h2 style='text-align:center'>Ya existe este paciente, buscarlo en el buscador.</h2>";
   echo '<script language="javascript">' .
     'setTimeout(function(){ window.location.href = "/navigation/AddRequest"; }, 4000);' .
     '</script>';
}	
	
else{	
	
/*if($this->input->post('seguro_medico')==11){
	$plan=0;
}else{
$plan=$this->input->post('plan');

}
$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');*/
$save1 = array(
'nombre'  => $this->input->post('nombre'),
'cedula'=> $this->input->post('cedula'),
'ced1' => $this->input->post('ced1'),
'ced2' => $this->input->post('ced2'),
'ced3' => $this->input->post('ced3'),
//'date_nacer' => $this->input->post('date_nacer'),
'photo' =>$this->input->post('photo'),
//'date_nacer_format' => $this->input->post('date_nacer_format'),
//'filter_date' => $this->input->post('fecha_filter'),
//'tel_resi'=> $this->input->post('tel_resi'),
'tel_cel'=> $this->input->post('tel_cel'),
'email' => $this->input->post('email'),
//'sexo' => $this->input->post('sexo'),
//'estado_civil' => $this->input->post('estado_civil'),
'seguro_medico' =>0,
//'afiliado'  => $this->input->post('afiliado'),
 'plan'  => "",
'confirmada1' => 1,
  'inserted_by' =>0,
  'updated_by' =>0,
'insert_date' => date("Y-m-d H:i:s"),
'update_date' => date("Y-m-d H:i:s"),
'filter_date' =>date("Y-m-d")	  
);

$last_id=$this->model_admin->save_patient($save1);
$saveN = array(
'nec1'  => "NEC-$last_id"
);

$this->model_admin->insert_nec($last_id,$saveN);

 $this->session->set_userdata('tranfer_pat_id', $last_id);
 $this->session->set_userdata('new_patient_asked_cita', $this->input->post('nombre'));
  $this->session->set_userdata('tel_resi', $this->input->post('tel_resi'));
   $this->session->set_userdata('tel_cel', $this->input->post('tel_cel'));
    $this->session->set_userdata('email', $this->input->post('email'));
$last_id_ = encrypt_url($last_id);
redirect("navigation/patient_found/$last_id_");

}
}
}

public function getDocCentro()
{
$id_doc=$this->input->post('id_doc');
$sql ="SELECT id_centro FROM  doctor_agenda_test WHERE id_doctor=$id_doc group by id_centro";
$query= $this->db->query($sql);
foreach ($query->result() as $rc)
$saveCentro= $this->db->select('name')->where('id_m_c',$rc->id_centro)->get('medical_centers')->row('name');
echo '<option value="'.$rf->id_centro.'">'.$saveCentro.'</option>';
foreach ($query->result() as $rf){
$centro= $this->db->select('name')->where('id_m_c',$rf->id_centro)->get('medical_centers')->row('name');
echo '<option value="'.$rf->id_centro.'">'.$centro.'</option>';

}
}

public function getDocArea()
{

$area= $this->db->select('area')->where('id_user',$this->input->post('id_doc'))->get('users')->row('area');
echo $area;
}



public function createNewRequestCita(){
$this->load->view('navigation/header');
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidad'] = $this->account_demand_model->getEspecialidad();
$data['causa']=$this->account_demand_model->getCausa();
$data['doctors'] = $this->account_demand_model->getDoctor();
$data['ifCentroDisabled'] ='disabled';
$this->load->view('navigation/pacient-not-found-cita', $data);

}

public function contacto_send(){
$email = $this->input->post('email');
$name = $this->input->post('name'); 
$apellido = $this->input->post('apellido');
$message = $this->input->post('message');
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
<style>

</style>
<body style='font-family: 'Playfair Display', serif;'>
<p><strong>un visitante de GICRE  ha enviado un mensaje.</strong></p>
<p>Se llama : $name $apellido </p>
<p> $message </p>
</body>
</html>";
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");	   
$this->email->from("$email"); // change it to yours
$this->email->to("soporte@admedicall.com");// change it to yours
$this->email->subject('Mensage');
$this->email->message($msg);
$this->email->send();
$data['row']= 'success';
$this->load->view('navigation/contact_success',$data);
}

public function get_doc()
{
	$id_esp=$this->input->post('id_esp');
	$data['doc'] = $this->account_demand_model->get_doc_esp($id_esp);
	$this->load->view('navigation/get_doc', $data);
	 //echo json_encode ($query);
}







public function send_cita_from_out()
	{

   $config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'smtp.hosting.gob.do',
    'smtp_port' => 25,
    'smtp_user' => 'citas@hospitalmarceinovelez.gob.do', // change it to yours
    'smtp_pass' => 'hospital2017', // change it to yours
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
  );

       	$msg = "<div class='alert alert-success' style='text-align:center' id='deletesuccess'> Estaremos dándole respuesta en un tiempo no mayor a 24 horas y le responderemos al correo electrónico que nos ha proporcionado.</div>";

	$name = $this->input->post('name');
	$cedula = $this->input->post('cedula');
	$fecha = $this->input->post('fecha');
	$tel = $this->input->post('tel');
	$telc = $this->input->post('telc');
	$email = $this->input->post('email');
	$seguro_medico = $this->input->post('seguro_medico');
	$causa = $this->input->post('causa');
	$especialidad = $this->input->post('especialidad');
	$comentario = $this->input->post('comentario');
	$turno = $this->input->post('turno');
	$frecuencia = $this->input->post('frecuencia');
	$via = $this->input->post('via');
	$nss = $this->input->post('nss');
	$numero = $this->input->post('numero');
	$this->session->set_userdata('this_email', $email);
		$cita_data =
		"
		<html>
		<body>
		<h2 style='color:red'>SOLICITUD DE CITA</h2>
		<p><strong style='color:black'>NOMBRES</strong> : $name </p>
		<p><strong style='color:black'>CEDULA</strong>: $cedula </p>
		<p><strong style='color:black'>NUMERO DE HISTORIAL CLINICO O RECORD (NHC)</strong> : $numero </p>
		<p><strong style='color:black'>FECHA PROPUESTA</strong> : $fecha </p>
		<p><strong style='color:black'>FRECUENCIA</strong> : $frecuencia </p>
		<p><strong style='color:black'>TURNO QUE DESEA PARA LA CITA</strong> : $turno </p>
		<p><strong style='color:black'>DESEA SER CONTACTADO</strong> : $via </p>
		<p><strong style='color:black'>TELEFONE RESIDENCIAL</strong> : $tel </p>
		<p><strong style='color:black'>TELEFONO CELULAR</strong> : $telc </p>
		<p><strong style='color:black'>CORREO ELECTRONICO</strong> : $email </p>
		<p><strong style='color:black'>SEGURO MEDICO</strong> : $seguro_medico </p>
		<p><strong style='color:black'>NSS</strong> : $nss </p>
		<p><strong style='color:black'>CAUSA</strong> : $causa </p>
		<p><strong style='color:black'>ESPECIALIDAD</strong> : $especialidad </p>
		<p><strong style='color:black'>COMENTARIO</strong> : $comentario </p>
	
		</body>
		</html>";
       $this->load->library('email', $config);
       $this->email->set_newline("\r\n");
       $this->email->set_mailtype("html");	   
       $this->email->from($email); // change it to yours
       $this->email->to('citas@hospitalmarceinovelez.gob.do');// change it to yours
       $this->email->subject('Solicitud de cita');
       $this->email->message($cita_data);
	   $this->email->send();
    // if($this->email->send())
    // {
     //  echo 'Email sent.';
    // }
    // else
    // {
    //  show_error($this->email->print_debugger());
     //}
	 
	 $this->send_confirmation_to_client_out();
	 
	$msg = "<div class='alert alert-success' style='text-align:center' id='deletesuccess'> Estaremos dándole respuesta en un tiempo no mayor a 24 horas y le responderemos al correo electrónico que nos ha proporcionado.</div>";
	$this->session->set_flashdata('success_msg', $msg);
	redirect("navigation/crear_solictud_de_cita");
		
	}

	
	
	
   public function send_confirmation_to_client_out(){
  $config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'smtp.hosting.gob.do',
    'smtp_port' => 25,
    'smtp_user' => 'citas@hospitalmarceinovelez.gob.do', // change it to yours
    'smtp_pass' => 'hospital2017', // change it to yours
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
  );

    		$msg ="
		   <html>
		<body>
		Saludos Sr(a).<br/> <br/> 
       Por medio de la presente le confirmamos la recepción de su solicitud de cita. Una vez comprobemos la disponibilidad del horario le confirmamos el día y la hora de su cita.<br/><br/>
	   Si desea comunicarse directamente con el departamento de citas, puede hacerlo marcando el número:<br/><br/>
	   (809) 560-6666<br/><br/>
	   
	   Su tiempo de respuesta para la solicitud de citas por Internet es de 24 horas, los fines de semana y días feriados no laboramos.<br/><br/>
	   
	   Horarios<br/>
          Lunes a viernes 8:00 AM – 07:00 PM
		</body>
		</html>";
		
		$this_email =$this->session->userdata('this_email');
		
		
       $this->load->library('email', $config);
       $this->email->set_newline("\r\n");
       $this->email->set_mailtype("html");	   
       $this->email->from("citas@hospitalmarceinovelez.gob.do"); // change it to yours
       $this->email->to($this_email);// change it to yours
       $this->email->subject('Solicitud de cita');
       $this->email->message($msg);
       $this->email->send();
     
      }
	  

public function nec_entry()
{
	$nec=$this->input->get('nec');
	$nec_ = encrypt_url($nec);
	$this->patient_found($nec_);
}


public function patient_found($nec)
{
$nec_ = decrypt_url($nec);
$query_admedicall = $this->model_admin->historial_medical($nec_);
$data['nec']=$nec;	

$this->load->view('navigation/header');
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidad'] = $this->account_demand_model->getEspecialidad();
$data['causa']=$this->account_demand_model->getCausa();
$data['doctors'] = $this->account_demand_model->getDoctor();
 if ($query_admedicall != null)
 {
$data['patient_admedicall']=$query_admedicall;
$data['base']="Admedicall";
$data['number_found']=count($query_admedicall);
$data['ifCentroDisabled'] ='disabled';
$data['getPatientNameInfo'] ='';
$this->session->set_userdata('tranfer_pat_id', $nec_);
$this->load->view('navigation/pacient-found-create-cita', $data);
//$this->load->view('navigation/pacient-not-found-cita', $data);
//$this->load->view('navigation/pacient-found', $data);
 }

else{
$ced=$this->db->select('cedula')->where('id_p_a',$nec_)->get('patients_appointments')->row('cedula');

$data['id_url'] =$ced;
$this->load->view('navigation/pacient-not-found', $data);
}


}





public function check_if_nombre_exist()
{
$nombre=$this->input->get('nombre');
$sql ="SELECT nombre,date_nacer,sexo,nacionalidad,tel_cel,nec1,ced1,ced2,ced3,photo,id_p_a FROM patients_appointments WHERE  nombre  LIKE '$nombre'";
$query = $this->db->query($sql);
$count=$query->num_rows();
if($count >0){
$data['query']=$query;
$data['count']=$count;
echo "<script>$('#hide-down').hide();</script>";
$this->load->view('navigation/check_if_patient_exist',$data);
}else{
echo "<script>$('#hide-down').show();</script>";	
}

}


public function sendZoomToPatient_($patid,$docid){
$this->session->set_userdata('pat_email_id',$patid);
$this->session->set_userdata('docid',$docid);
redirect('navigation/sendZoomToPatient');
}



public function sendZoomToPatient(){
$idpat =$this->session->userdata('pat_email_id');
$patient=$this->db->select('nombre,email')->where('id_p_a',$idpat)->get('patients_appointments')->row_array();
$data['email']=$patient['email'];
$data['nombre']=$patient['nombre'];
$data['idpat']=$idpat;
$docid =$this->session->userdata('docid');
$data['zoomlink']='';
$data['doctor']=$this->db->select('name')->where('id_user',$docid)->get('users')->row('name');
$this->load->view('navigation/header');
$this->load->view('navigation/sendZoomToPatient',$data);

}

public function sendZoom(){
$nombre=$this->input->post('nombre');
$email=$this->input->post('email');
$idpat=$this->input->post('idpat');
$doctor=$this->input->post('doctor');
$zoomlink=$this->input->post('zoom-link');
if($email=='' || $zoomlink=='' || $idpat=='' || $doctor=='' ){
$this->session->set_flashdata('error-fail','operación fallida');	
redirect("navigation/sendZoomToPatient");
} else{
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
<body style='font-family: 'Playfair Display', serif;'>
El doctor $doctor le invita a una video de conferencia por zoom.<br/>
$zoomlink

<br/><br/><br/>
Atentamente,<br/>
GICRE
</body>
</html>";
$title="INVITACION DEL DOCTOR $doctor";
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to($email);// change it to yours
$this->email->subject($title);
$this->email->message($msg);
$this->email->send();
redirect("navigation/emailSendOk");
}
}

public function emailSendOk(){
	
echo '<body>
<div style="background:#04A73A;text-align:center"> 
<h2 style="color:#A4FCC1">La invitación de Zoom ha sito enviada con éxito.</h2>
</div>

</body>';
	
}




public function cita_creada(){

echo '<body>
<div style="background:#04A73A;text-align:center"> 
<h2 style="color:#A4FCC1">La cita ha sido creada con éxito, el doctor le contactará para la confirmación de la misma.</h2>
</div>

</body>';

}


public function sendEmailToDocAndAsistDoc($id_paciente,$fecha,$id_apoint,$id_doctor){
$paciente=$this->db->select('nombre')->where('id_p_a',$id_paciente)->get('patients_appointments')->row('nombre');
$doctor=$this->db->select('name,correo')->where('id_user',$id_doctor)->get('users')->row_array();
$doctor_name=$doctor['name'];
$doctor_correo=$doctor['correo'];	
$link='href="'.base_url().'admin_medico/confirma_from_correo/'.$id_apoint.'/'.$id_doctor.'"';
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

<p><strong>Doctor $doctor_name paciente $paciente está solicitando cita para la fecha $fecha para usted.</strong></p>
<a style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;' $link >CONFIRMAR LA CITA</a>


</body>
</html>";
//-----------SEND EMAIL TO THE DOCTOR
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to($doctor_correo);// change it to yours
$this->email->subject("Paciente $paciente envia una solictud de cita al doctor $doctor_name");
$this->email->message($msg);
$this->email->send();

//-----------------------SEND EMAIL TO ALL DOCTOR ASISTENT------------------------------------------------

$sql ="SELECT id_doctor, id_asdoc FROM centro_doc_as WHERE id_doctor =$id_doctor group by id_asdoc";
 $query= $this->db->query($sql);
 foreach ($query->result() as $row){
	 
$correo=$this->db->select('correo')->where('id_user',$row->id_asdoc)->get('users')->row('correo');

$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to($correo);// change it to yours
$this->email->subject("Paciente $paciente envia una solictud de cita al doctor $doctor_name");
$this->email->message($msg);
$this->email->send();
 }     

$this->sendWhatSappMessage($id_paciente,$fecha,$id_apoint,$id_doctor);
  	
}


function sendWhatSappMessage($id_paciente,$fecha,$id_apoint,$id_doctor){

	
$paciente=$this->db->select('nombre')->where('id_p_a',$id_paciente)->get('patients_appointments')->row('nombre');
$doctor=$this->db->select('name,correo,cell_phone')->where('id_user',$id_doctor)->get('users')->row_array();
$doctor_name=$doctor['name'];
$cell_phone_doc=$doctor['cell_phone'];

$msg ="
Doctor $doctor_name paciente $paciente está solicitando cita para la fecha $fecha. Por favor confirmala por este enlace: 
https://admedicall.com/admin_medico/confirma_from_correo/$id_apoint/$id_doctor ";


$format_phone = str_replace( array("(", ")", " ", "", "-"), '', $cell_phone_doc);
$data = [
 "previewBase64"=> "data:image/jpeg;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAADwCAYAAAA+VemSAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAAZdEVYdFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAADbmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDggNzkuMTY0MDM2LCAyMDE5LzA4LzEzLTAxOjA2OjU3ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjA3YjYxZjJhLTBiMzQtZDU0Ni04YWFmLTc2YWZlNTRkMTJmYiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpDMDMyRTgzMTRFNDgxMUVBQThFQjk0MTc1OTFDMEM2NSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpDMDMyRTgzMDRFNDgxMUVBQThFQjk0MTc1OTFDMEM2NSIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxOSAoV2luZG93cykiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxQ0IwQzRCODgzQTAxMUU5QjA2N0RGN0E1MzU4RDE0OSIgc3RSZWY6ZG9jdW1lbnRJRD0i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",
  "body"=> "$msg",
 "phone"=> "+1$format_phone"
];

$json = json_encode($data); // Encode data to JSON
// URL for request POST /message
$token = '75ipcgb6m2xg52sl';
$instanceId = '270683';
$url = 'https://api.chat-api.com/instance'.$instanceId.'/message?token='.$token;
// Make a POST request
$options = stream_context_create(['http' => [
'method'  => 'POST',
'header'  => 'Content-type: application/json',
'content' => $json
]
]);
// Send a request
$result = file_get_contents($url, false, $options);

//----------------------------------------------------------------------------
$sql ="SELECT  id_asdoc FROM centro_doc_as WHERE id_doctor =$id_doctor group by id_asdoc";
 $query= $this->db->query($sql);
 foreach ($query->result() as $row){
$cell_phone=$this->db->select('cell_phone')->where('id_user',$row->id_asdoc)->get('users')->row('cell_phone');

$format_phone2 = str_replace( array("(", ")", " ", "", "-"), '', $cell_phone);

$msg2 ="
Doctor $doctor_name paciente $paciente está solicitando cita para la fecha $fecha. Por favor confirmala por este enlace: 
https://admedicall.com/admin_medico/confirma_from_correo/$id_apoint/$id_doctor ";

$data1 = [
 "previewBase64"=> "data:image/jpeg;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAADwCAYAAAA+VemSAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAAZdEVYdFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAADbmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDggNzkuMTY0MDM2LCAyMDE5LzA4LzEzLTAxOjA2OjU3ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjA3YjYxZjJhLTBiMzQtZDU0Ni04YWFmLTc2YWZlNTRkMTJmYiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpDMDMyRTgzMTRFNDgxMUVBQThFQjk0MTc1OTFDMEM2NSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpDMDMyRTgzMDRFNDgxMUVBQThFQjk0MTc1OTFDMEM2NSIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxOSAoV2luZG93cykiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxQ0IwQzRCODgzQTAxMUU5QjA2N0RGN0E1MzU4RDE0OSIgc3RSZWY6ZG9jdW1lbnRJRD0i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",
  "body"=> "$msg2",
 "phone"=> "+1$format_phone2"
];

$json1 = json_encode($data1); // Encode data to JSON
// URL for request POST /message
$token = '75ipcgb6m2xg52sl';
$instanceId = '270683';
$url = 'https://api.chat-api.com/instance'.$instanceId.'/message?token='.$token;
// Make a POST request
$options1 = stream_context_create(['http' => [
'method'  => 'POST',
'header'  => 'Content-type: application/json',
'content' => $json1
]
]);
// Send a request
$result = file_get_contents($url, false, $options1);
 }


}





















public function search_patient_ced()
{
$this->load->view('navigation/header');
$condition = array(
  'MUN_CED'=> $this->input->get('patient_cedula1'),
  'SEQ_CED'=>$this->input->get('patient_cedula2'),
  'VER_CED'=>$this->input->get('patient_cedula3')
  );
  
$query_padron = $this->padron_model->getPatientCedulaPad($condition);
$photo=$this->padron_model->getPhoto($condition);
 if ($query_padron != null)
 { 
 $this->load->view('navigation/pacientes-by-names', $data);	
 $data['patient_padron'] =$query_padron; 
		
}else{
$ced1=0;$ced2=0;$ced3=0;
	redirect("navigation/createNewRequest/$ced1/$ced2/$ced3");
} 
}



public function search_ced()
{
$ced1=$this->input->get('patient_cedula1');
$ced2=$this->input->get('patient_cedula2');
$ced3=$this->input->get('patient_cedula3');
$this->search_result($ced1,$ced2,$ced3);
}


public function search_result($ced1,$ced2,$ced3)
{
$this->load->view('navigation/header');
$cond = array(
  'MUN_CED' => $ced1,
  'SEQ_CED' => $ced2,
  'VER_CED' => $ced3
  );

$patient_padron = $this->padron_model->getPatientCedulaPad($cond);
$number_found=count($patient_padron);
$data['number_found']=$number_found;
$data['patient_padron']=$patient_padron;

$ced="$ced1$ced2$ced3";
$data['cedula'] =$ced;
$patient_admedicall= $this->model_admin->getPatientCedulaAd($ced);
$data['patient_admedicall']=$patient_admedicall;
$data['backbutton'] = '<a style="color:red"   href="'.base_url().'navigation/AddRequest"  >Volver a buscar</a>';
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidad'] = $this->account_demand_model->getEspecialidad();
$data['causa']=$this->account_demand_model->getCausa();
$data['doctors'] = $this->account_demand_model->getDoctor();
if($patient_admedicall !=NULL){
//$this->load->view('navigation/pacient-found', $data);
$nec=$this->db->select('id_p_a')->where('cedula',$ced)->get('patients_appointments')->row('id_p_a');
$nec_ = encrypt_url($nec);
redirect("navigation/patient_found/$nec_");
}
if($patient_padron !=NULL)
{
//$this->load->view('navigation/paciente-by-cedula', $data);
foreach($patient_padron as $row)
	$ddd=date("Y-m-d", strtotime($row->FECHA_NAC));
$dd=date("d-m-Y", strtotime($row->FECHA_NAC));
$nombres = "$row->NOMBRES $row->APELLIDO1 $row->APELLIDO2";
$save1 = array(
'nombre'  =>$nombres,
'cedula'=>"$row->MUN_CED$row->SEQ_CED$row->VER_CED",
'ced1' => $row->MUN_CED,
'ced2' => $row->SEQ_CED,
'ced3' => $row->VER_CED,
'date_nacer' =>$dd,
'date_nacer_format' =>$ddd,
'photo' =>"padron",
'seguro_medico' =>0,
'plan'  => "",
'confirmada1' => 1,
'inserted_by' =>0,
'updated_by' =>0,
'insert_date' => date("Y-m-d H:i:s"),
'update_date' => date("Y-m-d H:i:s"),
'filter_date' =>date("Y-m-d")	  
);

$last_id=$this->model_admin->save_patient($save1);
$saveN = array(
'nec1'  => "NEC-$last_id"
);

$this->model_admin->insert_nec($last_id,$saveN);
$nec=$this->db->select('id_p_a')->where('cedula',"$row->MUN_CED$row->SEQ_CED$row->VER_CED")->get('patients_appointments')->row('id_p_a');
$nec_ = encrypt_url($nec);
redirect("navigation/patient_found/$nec_");	
}
redirect("navigation/createNewRequest/$ced");	
$this->load->view('admin/pacientes-citas/footer_patient_search');
$this->load->view('medico/pacientes-citas/cita-footer');	
}




public function patient_paginate()
{
$this->load->view('navigation/header');
$val = array(
  'patient_nombres'=> $this->input->get('patient_nombres'),
  'patient_apellido'=>$this->input->get('patapellido'),
  'patient_apellido2'=>$this->input->get('patapellido2')
  );
  $data['backbutton'] = '<a style="color:red"   href="'.base_url().'navigation/AddRequest"  >Volver a buscar</a>';
 $total_rows_pad= $this->padron_model->getPatientNameOnSelectPadCount($val);
 $data['number_found']=$total_rows_pad;
$config = array();
$config["base_url"] = base_url() . "navigation/patient_paginate";	
$config["total_rows"] =$total_rows_pad;
$config["per_page"] = 10;
$config["uri_segment"] = 3;
$config['use_page_numbers'] = TRUE;
$config['reuse_query_string']=TRUE;
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
$this->pagination->initialize($config);

$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

$data["links"] = $this->pagination->create_links();

$data['patient_padron'] = $this->padron_model->getPatientNameOnSelectPad($val, $config["per_page"], $page);
		

$query_admedicall = $this->model_admin->findPatientByNombre($this->input->get('patient_nombres'),$this->input->get('patapellido'),$this->input->get('patapellido2'));	
$data['query_admedicall'] =	$query_admedicall;
  $data['patientNamesData'] = $val;
$this->load->view('navigation/pacientes-by-names', $data);	

}

public function createNewRequest($id_url){
$this->load->view('navigation/header');
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['id_url']="$id_url";
$this->load->view('navigation/pacient-not-found', $data);


}


public function search_recipe()
{
$this->load->view('navigation/header');
$this->load->view('farmacia/patient-view');


}

public function search_estudios()
{
$this->load->view('navigation/header');
$this->load->view('admin/historial-medical1/estudios/patient-search');


}

public function loadCodigo()
{
$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$ifEmailCorrect = substr( str_shuffle( $chars ), 0, 5);
echo $ifEmailCorrect;
}





public function sendConfirmationEmail(){

$email=$this->input->post('email');
$codigo=$this->input->post('codigo');

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

<p>
ENTRA EL CODIDO PARA CONTINUAR LA CREACION DE SU CUENTA<br/>
CODIGO ENVIADO POR GICRE <strong>$codigo</strong>

</p>
</body>
</html>";
//-----------SEND EMAIL TO THE DOCTOR
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to($email);// change it to yours
$this->email->subject("ENTRA EL CODIDO RECIBIDO PARA CONTINUAR LA CREACION DE SU CUENTA EN GICRE");
$this->email->message($msg);
if($this->email->send()){
	echo "Codigo enviado a $email";
}
    
  	
}





//--------------------------------------------------------------------
}
