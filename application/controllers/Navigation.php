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
if($this->input->post('detect')==""){
$plan_pago=$this->input->post('plan-pago');
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


$msg = "<div  style='text-align:center;font-size:20px' id='deletesuccess'> <span style='color:green'>Usuario esta creado .</div>";
$this->session->set_flashdata('success_msg_create_user', $msg);
$this->session->set_userdata('id_doc_user',$id_doc_user);
$this->sendEmailToUs($id_doc_user);
redirect("products/doctor_account_payment_/$id_doc_user/$plan_pago");
}else{
echo "Eres un robot";	
}
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
	
$rules = array(
 array(
                'field' => 'causa',
                'label' => 'Causa',
                'rules' => 'required'
				
            ),
                 
            array(
                'field' => 'especialidad',
                'label' => 'Especialidad',
                'rules' => 'required'
            ),
			 
			  array(
                'field' => 'doctor',
                'label' => 'Doctor',
                'rules' => 'required'
            ),
			 array(
                'field' => 'fecha_propuesta',
                'label' => 'Fecha Propuesta',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($rules);
		     $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>'); 
		if ($this->form_validation->run() == FALSE) {
			$msg='<h3 style="color:red">El formulario no se ha guadado, favor revisar :</h3>';
			$this->session->set_flashdata('error_messages', $msg);
   $this->load->view('navigation/header');
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidad'] = $this->account_demand_model->getEspecialidad();
$data['causa']=$this->account_demand_model->getCausa();
$data['doctors'] = $this->account_demand_model->getDoctor();
$this->load->view('navigation/pacient-not-found-cita', $data);
$this->load->view('admin/pacientes-citas/footer_patient_search');
$this->load->view('medico/pacientes-citas/cita-footer');
		}	
	
	else{
$id_p_a=$this->input->post('id_p_a');
$query = $this->db->get_where('rendez_vous',array('filter_date'=>date('Y-m-d'),'doctor'=>$this->input->post('doctor'),'id_patient'=>$id_p_a));
if($query->num_rows() > 0){
$doc_n=$this->db->select('name')->where('id_user',$this->input->post('doctor'))->get('users')->row('name');
echo "<h3 style='text-align:center'>Usted tiene una solicitud de cita hoy con doc.(a) $doc_n</h3>";
   echo '<script language="javascript">' .
     'setTimeout(function(){ window.location.href = "/navigation/AddRequest"; }, 4000);' .
     '</script>';
} else{
$dayNumber=$this->db->select('id')->where('title',$this->input->post('fecha_filter'))->get('diaries')->row('id');
$filter_date = date("Y-m-d", strtotime($this->input->post('fecha_propuesta')));	
 $save2 = array(
'nec'=> "NEC-$id_p_a",
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'area' =>$this->input->post('especialidad'),
'doctor' =>$this->input->post('doctor'),
'id_patient' => $id_p_a,
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'weekday' =>$dayNumber,
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
'tel_resi'=>$this->input->post('tel_resi'),
'email'=>$this->input->post('email')
);
$this->db->where($where);
$this->db->update("patients_appointments",$data);

$fecha=$this->input->post('fecha_propuesta');
$id_doctor=$this->input->post('doctor');


//------------------------------------------------------------------------------------------------

$this->sendEmailToDocAndAsistDoc($id_p_a,$fecha,$id_apoint,$id_doctor);

redirect("navigation/cita_creada");	
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
                'field' => 'date_nacer',
                'label' => 'Fecha de nacimiento',
                'rules' => 'required'
            ),
			 
			  array(
                'field' => 'tel_cel',
                'label' => 'Telefono celular',
                'rules' => 'required'
            ),
			 array(
                'field' => 'email',
                'label' => 'Correo',
                'rules' => 'required'
            ),
			  array(
                'field' => 'sexo',
                'label' => 'sexo',
                'rules' => 'required'
            ),
			 array(
                'field' => 'estado_civil',
                'label' => 'estado civil',
                'rules' => 'required'
            ),
			 array(
                'field' => 'seguro_medico',
                'label' => 'seguro medico',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($rules);
		     $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>'); 
		if ($this->form_validation->run() == FALSE) {
			$msg='<h3 style="color:red">El formulario no se ha guadado, favor revisar :</h3>';
			$this->session->set_flashdata('error_messages', $msg);
       $this->load->view('navigation/header');
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['ced']="";
$this->load->view('navigation/pacient-not-found', $data);
$this->load->view('admin/pacientes-citas/footer_patient_search');
$this->load->view('medico/pacientes-citas/cita-footer');		
			
		} else{
$query = $this->db->get_where('patients_appointments',array('nombre'=>$this->input->post('nombre'),'date_nacer'=>$this->input->post('date_nacer'),'tel_cel'=>$this->input->post('tel_cel')));
if($query->num_rows() > 0){
echo "<h2 style='text-align:center'>Ya existe este paciente, buscarlo en el buscador.</h2>";
   echo '<script language="javascript">' .
     'setTimeout(function(){ window.location.href = "/navigation/AddRequest"; }, 4000);' .
     '</script>';
}	
	
else{	
	
if($this->input->post('seguro_medico')==11){
	$plan=0;
}else{
$plan=$this->input->post('plan');

}

$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');
$save1 = array(
'nombre'  => $this->input->post('nombre'),
'cedula'=> $this->input->post('cedula'),
'ced1' => $this->input->post('ced1'),
'ced2' => $this->input->post('ced2'),
'ced3' => $this->input->post('ced3'),
'date_nacer' => $this->input->post('date_nacer'),
'photo' =>$this->input->post('photo'),
'date_nacer_format' => $this->input->post('date_nacer_format'),
'filter_date' => $this->input->post('fecha_filter'),
'tel_resi'=> $this->input->post('tel_resi'),
'tel_cel'=> $this->input->post('tel_cel'),
'email' => $this->input->post('email'),
'sexo' => $this->input->post('sexo'),
'estado_civil' => $this->input->post('estado_civil'),
'seguro_medico' => $this->input->post('seguro_medico'),
'afiliado'  => $this->input->post('afiliado'),
 'plan'  => $plan,
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
//--------------------------------------------------------------------------------------
for ($i = 0; $i < count($inputname), $i < count($inputf); ++$i ) {
    $inp = $inputname[$i];
	$inf = $inputf[$i];
   $saveInputs= array(
	'patient_id' =>$last_id,
	'input_name' => $inp,
	'inputf' => $inf,
	'seguro_id' =>$this->input->post('seguro_medico')
	);
    
	 $this->db->insert("saveinput",$saveInputs);
}
 $this->session->set_userdata('tranfer_pat_id', $last_id);
  $this->session->set_userdata('tel_resi', $this->input->post('tel_resi'));
   $this->session->set_userdata('tel_cel', $this->input->post('tel_cel'));
    $this->session->set_userdata('email', $this->input->post('email'));
redirect("navigation/createNewRequestCita");	
}
}
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
	$this->search_result_nec($nec);
}


public function search_result_nec($nec)
{

$query_admedicall = $this->model_admin->historial_medical($nec);
$ced='';	

$this->load->view('navigation/header');
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidad'] = $this->account_demand_model->getEspecialidad();
$data['causa']=$this->account_demand_model->getCausa();
$data['doctors'] = $this->account_demand_model->getDoctor();
 if ($query_admedicall != null)
 {
$data['ced']='';
$data['patient_admedicall']=$query_admedicall;
$data['base']="Admedicall";
$data['number_found']=count($query_admedicall);
$this->load->view('navigation/pacient-found', $data);
 }

else{
$data['ced']=$ced;
$this->load->view('navigation/pacient-not-found', $data);
}

$this->load->view('admin/pacientes-citas/footer_patient_search');
$this->load->view('medico/pacientes-citas/cita-footer');
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
$data['removeData']='none';
$this->load->view('navigation/check_if_patient_exist',$data);
}else{
$data['removeData']='';	
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

<p><strong>Doctor $doctor_name paciente $paciente está solicitando cita ($fecha) para usted.</strong></p>
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
$data['number_found']=count($patient_padron);
$data['patient_padron']=$patient_padron;

$ced="$ced1$ced2$ced3";

$patient_admedicall= $this->model_admin->getPatientCedulaAd($ced);
$data['patient_admedicall']=$patient_admedicall;
$data['backbutton'] = '<a style="color:red"   href="'.base_url().'navigation/AddRequest"  >Volver a buscar</a>';
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidad'] = $this->account_demand_model->getEspecialidad();
$data['causa']=$this->account_demand_model->getCausa();
$data['doctors'] = $this->account_demand_model->getDoctor();
if($patient_admedicall !=NULL){
$this->load->view('navigation/pacient-found', $data);
}else{
$this->load->view('navigation/paciente-by-cedula', $data);	
}
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

$this->load->view('navigation/pacientes-by-names', $data);	

}

public function createNewRequest($ced1,$ced2,$ced3){
$this->load->view('navigation/header');
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['ced']="$ced1$ced2$ced3";
$this->load->view('navigation/pacient-not-found', $data);
$this->load->view('admin/pacientes-citas/footer_patient_search');
$this->load->view('medico/pacientes-citas/cita-footer');
}


public function createNewRequestCita(){
$this->load->view('navigation/header');
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidad'] = $this->account_demand_model->getEspecialidad();
$data['causa']=$this->account_demand_model->getCausa();
$data['doctors'] = $this->account_demand_model->getDoctor();
$this->load->view('navigation/pacient-not-found-cita', $data);
$this->load->view('admin/pacientes-citas/footer_patient_search');
$this->load->view('medico/pacientes-citas/cita-footer');
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
