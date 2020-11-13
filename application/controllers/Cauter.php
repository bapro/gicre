
<?php

class Cauter extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

	$this->load->model('navigation/account_demand_model');
      $this->load->model('model_admin');

    if($this->session->userdata('cauter_is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login');
   }

    }

    Public function index()
    {  
	$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
	$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
	$data['especialidad'] = $this->account_demand_model->getEspecialidad();
	$data['causa']=$this->account_demand_model->getCausa();
	$data['doctors'] = $this->account_demand_model->getDoctor();
    $this->load->view('cauter/index',$data);
	$this->load->view('footer');
    }
	
  
public function create_appointment()
{
$data['countries'] = $this->account_demand_model->getCountries();
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidad'] = $this->account_demand_model->getEspecialidad();
$data['provinces']=$this->account_demand_model->getProvinces();
$data['causa']=$this->account_demand_model->getCausa();
$data['municipios'] = $this->account_demand_model->getTownships();
$last_patient_id=$this->db->select('id_apoint')->order_by('id_apoint','desc')->limit(1)->get('rendez_vous')->row('id_apoint');
$lidp=$last_patient_id + 1;
$data['patid']=$lidp;

$this->load->view('cauter/cita/create',$data);
$this->load->view('footer');

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
	redirect("cauter/index");
		
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
       $this->email->subject('Solicitud de Citas');
       $this->email->message($msg);
       $this->email->send();
     
      }

	
	
	
	
	
public function save_patients_appointments(){
$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');
$insert_date=date("Y-m-d H:i:s");
$filter_date=date("Y-m-d");

$save1 = array(
  'nombre'  => $this->input->post('nombre'),
  'photo' => "",
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
 'plan'  => $this->input->post('plan'),
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
 'insert_date' => $insert_date,
  'update_date' => $insert_date,
  'filter_date' => $filter_date,
  'user' => 1
  );
$this->account_demand_model->save_patient($save1);
$last_patient_id=$this->db->select('id_p_a')->order_by('id_p_a','desc')->limit(1)->get('patients_appointments')->row('id_p_a');
 //------------------------Save cita----------------------------
 $nec="RD-$last_patient_id";
 $save2 = array(
'nec'=> $nec,
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'area' => $this->input->post('especialidad'),
'doctor' => $this->input->post('doctor'), 
'id_patient' => $last_patient_id, 
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'update_by' => $this->input->post('creadted_by'),
'inserted_by' => $this->input->post('creadted_by'),
'created_time' => $insert_date,
'update_time' => $insert_date,
'filter_date' => $filter_date,
'user' => 1
   );
$this->account_demand_model->save_rendevous($save2);
//--------------------------------------

for ($i = 0; $i < count($inputname), $i < count($inputf); ++$i ) {
    $inp = $inputname[$i];
	$inf = $inputf[$i];
   $saveInputs= array(
	'patient_id' =>$last_patient_id,
	'input_name' => $inp,
	'inputf' => $inf,
	'seguro_id' =>$this->input->post('seguro_medico')//when remove a seguro field we remove it in patient seguro field as well with this id
	);
    
	$this->account_demand_model->saveInput($saveInputs);
}

 $msg = "<div  style='text-align:center;font-size:20px;color:green' id='deletesuccess'>La cita se guada con exito .</div>";

$this->session->set_flashdata('success_msg', $msg);
//redirect('admin/create_cita');
redirect('cauter/redirect_after_save_cita');
}	

public function redirect_after_save_cita()
{

$this->load->view('cauter/cita/after-cita-save');
	
}

public function municipio_dropdown()
{
	$provincia=$this->input->post('provincia');
	
	$query = $this->account_demand_model->municipio_dropdown($provincia);
	$data['municipio_dropdown'] =$query;
	$this->load->view('cauter/cita/municipio_dropdown', $data);
	 //echo json_encode ($query);
}


public function patient_billing()
{
$identificar=$this->uri->segment(3);
$id_p_a=$this->db->select('id_p_a')->order_by('id_p_a','desc')->limit(1)->get('patients_appointments')->row('id_p_a');
$nec=$this->db->select('nec')->where('id_apoint',$id_p_a)->get('rendez_vous')->row('nec');
$id_doctor=$this->db->select('doctor')->where('nec',$nec)->get('rendez_vous')->row('doctor');
$data['CENTRO_MEDICO_DOCTOR']= $this->model_admin->view_doctor_centro($id_doctor); 
$id_centro=$this->db->select('centro')->where('id_patient',$id_p_a)->get('rendez_vous')->row('centro');
$data['necpatient']=$this->model_admin->NecPatientFac($id_p_a); 
$data['serv']=$this->model_admin->Serviciomssm($id_doctor); 
$data['serv_centro']=$this->model_admin->Service_centro($id_centro);  
$data['show_diagno_pat'] = $this->model_admin->show_diagno_pat($id_p_a);
$data['show_diagno_pro_pat'] = $this->model_admin->show_diagno_pro_pat($id_p_a);
$data['billing']="FACTURACION";
if($identificar=="medico"){ 
$this->load->view('cauter/billing/medico/get-patient-name-for-billing-after-create-new-cita',$data);
} else{
$this->load->view('cauter/billing/centro/get-patient-name-for-billing-after-create-new-cita',$data);
}

}



public function appointments()
{
$query = $this->account_demand_model->getConfirmSolicitud();
$data['VER_CONFIRMADA_SOLICITUD'] =  $query;
$this->load->view('cauter/cita/appointments', $data);
$this->load->view('footer');
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

	public function get_doc()
{
	$id_esp=$this->input->post('id_esp');
	$data['doc'] = $this->model_admin->get_doc_esp($id_esp);
	$this->load->view('admin/get_doc', $data);
	 //echo json_encode ($query);
}
public function patient()
{
$idpatient= $this->uri->segment(3);
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
$data['patid']=$idpatient;
$ctutor=$this->model_admin->CountTutor($idpatient);
$data['ctutor']=$ctutor;
$data['tutor']=$this->model_admin->getTutor($idpatient);
$data['rendez_vous']=$query;
$data['fecha']=$query;
$data['number_cita']=count($query);
$data['nueva_cita']="";

$this->load->view('cauter/cita/patient',$data);
$this->load->view('footer');
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


public function save_update_patient(){
$idp = $this->input->post('id_p_a');
$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');
//$this->model_admin->deleteInput(4);
//--------------------------------------------
	
$modify_date=date("Y-m-d H:i:s");
$filter_date=date("Y-m-d");
$save = array(
  'nombre'  => $this->input->post('nombre'),
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

public function create_cita_again()
{
	$id_apoint= $this->uri->segment(3);
	$val=$this->db->select('nec,id_patient')->where('id_apoint',$id_apoint)->get('rendez_vous')->row_array();
	$data['nec']=$val['nec'];
	$data['id_patient']=$val['id_patient'];
	$data['causa']=$this->model_admin->getCausa();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
//$this->load->view('admin/pacientes-citas/header_patient');
 $this->load->view('cauter/cita/create_cita_again',$data);
}

public function UpdateCita()
{
	$id_cita= $this->uri->segment(3);
	$data['FindCita'] = $this->model_admin->FindCita($id_cita);
	$data['causa']=$this->model_admin->getCausa();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['doctors'] = $this->model_admin->display_all_doctors();
	$this->load->view('cauter/cita/UpdateCita', $data);
}

 public function add_new_cita()
{ 
$nec=$this->input->post('nec');
$idpatient=$this->input->post('id_patient');
$insert_date=date("Y-m-d H:i:s");
 $save2 = array(
'nec'=> $this->input->post('nec'),
'causa'  => $this->input->post('causa'),
'area' => $this->input->post('especialidad'),
'doctor' => $this->input->post('doctor'), 
'id_patient' =>$idpatient, 
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'created_time' => $insert_date,
'update_time' => $insert_date,
'update_by' => $this->input->post('creadted_by'),
'inserted_by' => $this->input->post('creadted_by'),
'filter_date' => $this->input->post('filter_date'),
'confirmada' => 0
   );
$this->model_admin->save_rendevous($save2);
$msg="La nueva cita <b>$nec</b>  se guada con exito. ";
$this->session->set_flashdata('message_cita',$msg);
$id=$this->db->select('id_apoint')->order_by('id_apoint','desc')->limit(1)->get('rendez_vous')->row('id_apoint');
 $query = $this->model_admin->RendezVous($id);
 $data['rendez_vous']=$query;
$data['number_cita1']=count($query); 
$this->session->set_userdata('sessionIdCita', $id);
$this->session->set_userdata('sessionIdPatient', $idpatient);
//redirect('admin/citaUpdate');
}




public function saveUpdateCita()
{
	$update_date=date("Y-m-d H:i:s");
$idpatient=$this->input->post('id_patient');
$data['idpatient'] = $idpatient;
$id=$this->input->post('id_cita');
$nec=$this->input->post('nec');
$save = array(
'causa'  => $this->input->post('causa'),
'area' => $this->input->post('especialidad'),
'doctor' => $this->input->post('doctor'), 
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'update_time' => $update_date,
'update_by' => $this->input->post('update_by'),
   );
$this->model_admin->saveUpdateCita($id,$save);
$msg = "<div  style='text-align:center;font-size:20px;color:green' >La cita $nec ha sido modificada con exito.</div>";
$this->session->set_flashdata('save_patient_success',$msg);
$this->session->set_userdata('sessionIdCita', $id);
$this->session->set_userdata('sessionIdPatient', $idpatient);
//redirect('admin/new_cita');
redirect($_SERVER['HTTP_REFERER']);
}


public function request(){
$id=$this->uri->segment(3);
$data['GET_NAMEF']= $this->model_admin->GET_NAMEF($id);
$data['VerSolicitud']= $this->model_admin->VerSolicitud($id);
$this->load->view('cauter/cita/patient-request', $data);

}

public function requests(){
$query = $this->model_admin->getCitas();
$data['cita'] = "";
$data['CITAS'] = null;
$data['CITAS'] =  $query;
$this->load->view('cauter/cita/patients_requests', $data);
$this->load->view('footer');
}

public function confirmar_solicitud()
{
$insert_date=date("Y-m-d H:i:s");	
$idc=$this->uri->segment(3);
$solicitud=$this->uri->segment(4);
$data = array(
'confirmada1'=>0
);

$data1 = array(
'confirmada'=>0
);
$this->model_admin->set_cita_to_confirm_patient($idc,$data);
$this->model_admin->set_cita_to_confirm_rendez_vous($idc,$data1);
//-----add solicitud to cita----------------------
$msg = "<div id='deletesuccess' style='text-align:center;color:green'>Solicitud # <b>$solicitud</b> esta confirmada.</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('cauter/requests');
}





}