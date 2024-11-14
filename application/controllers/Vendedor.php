<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vendedor extends CI_Controller { 
public function __construct()
{
parent::__construct();
$this->load->model('user');
$this->load->model('model_admin');
$this->load->model('account_demand_model');
 $this->load->library('email'); 
 $this->load->helper('email');
  /*session checks */ 
if($this->session->userdata('vendedor_is_logged_in')=='')
{
$this->session->set_flashdata('msg','Please Login to Continue');
redirect('login');
}
}


public function index()
{
$id_user=$this->session->userdata['vendedor_id'];
$data['id_user']=$id_user;
$data['name']=$this->session->userdata['vendedor_name'];
$data['perfil']=$this->session->userdata['vendedor_perfil'];
$data['controller']=$this->input->post('cont');
$data['perfil']='Medico';
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['execuatur'] = $this->model_admin->getExecuatur();
$data['causa']=$this->model_admin->getCausa();
$data['medical_centers'] = $this->model_admin->display_all_medical_centers();
$sql ="SELECT id_user, name,perfil,insert_date FROM  users WHERE inserted_by=$id_user ORDER BY id_user DESC";
$data['query'] = $this->db->query($sql);
$this->load->view('seller/header',$data);
$this->load->view('seller/index',$data);
$this->load->view('admin/medicos/footer');
}


public function changePassw()
{
	$data['control']= 'vendedor';
	$data['id_admin']= $this->uri->segment(3);
$this->load->view('admin/users/update-passw', $data);
}





public function SaveMedico(){
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
  'inserted_by' => $this->session->userdata['vendedor_id'],
  'updated_by' =>$this->session->userdata['vendedor_id'],   
 'insert_date'=> $date,
  'update_date' => $date,
  'plazo'=> $date,
  'payment_plan' =>0,
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
$this->session->set_userdata('user_id',$id_doc_user);
$vendedor_name= $this->db->select('name')->where('id_user',$this->session->userdata['vendedor_id'])->get('users')->row('name');
$this->session->set_userdata('vendedor_name',$vendedor_name);
$this->send_message_to_new_user();
$this->newUserNotification();
$msg = "<div  style='text-align:center;font-size:20px' id='deletesuccess'> <span style='color:green'>Usuario esta creado .</div>";
$this->session->set_flashdata('success_msg_create_user', $msg);
$this->session->set_userdata('id_doc_user',$id_doc_user);
redirect("vendedor/update_user/$id_doc_user/1");
}



public function update_user()
{
$id_cu_us=$this->session->userdata['vendedor_id'];
$id= $this->uri->segment(3);
$data['id_doc']=$id;
$data['user']=2;
$perfil= $this->uri->segment(4);
$data['id_cu_us']=$id_cu_us;	
$if_use_exist=$this->db->select('id_user')->where('id_user',$id)->where('inserted_by',$id_cu_us)->get('users')->row('id_user');
if($if_use_exist){
$data['hide']='none';
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['causa']=$this->model_admin->getCausa();
$data['execuatur'] = $this->model_admin->getExecuatur();
$data['editUser'] = $this->model_admin->editUser($id);
$data['DOCTORS'] = $this->model_admin->getDoctorForUpdate($id);
$data['agend_result']=$this->model_admin->agend_result($id);
$data['agendaDocCentro']=$this->model_admin->agendaDocCentro($id);
$data['diaries']=$this->model_admin->getDiaries();
$data['id_user'] =$id;
$data['id_doctor'] =$id;
if($perfil==1){
$data['SEGURO_MEDICO_DOCTOR']= $this->model_admin->view_doctor_seguro($id);
$data['SOLICITUDES']= $this->model_admin->view_doctor_solicitud($id);
$this->load->view('admin/users/update-medico', $data);
} else {
$this->load->view('admin/users/update-asistente-medico', $data); 
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
}else{
	echo "<h1 style='text-align:center;color:red'>Pagina no existe</h1>";
}
}

public function SaveUserAsM(){
$centro_medico= $this->input->post('centro_medico');
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
  'inserted_by' => $this->session->userdata['vendedor_id'],
  'updated_by' =>$this->session->userdata['vendedor_id'],   
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

$this->session->set_userdata('user_email', $this->input->post('email'));
$this->session->set_userdata('passwuser', $passwuser);
$this->session->set_userdata('user_name', $this->input->post('nombre'));
$this->session->set_userdata('user_perfil', $this->input->post('perfil'));
$this->session->set_userdata('user_id',$id_as_doc_user);
$vendedor_name= $this->db->select('name')->where('id_user',$this->session->userdata['vendedor_id'])->get('users')->row('name');
$this->session->set_userdata('vendedor_name',$vendedor_name);
$this->send_message_to_new_user();
$this->newUserNotification();
//----------------------------------------------------------
$msg = "<div class='alert alert-success' style='text-align:center;font-size:20px' id='deletesuccess'> <span style='color:green'>Usuario esta creado con éxito.</div>";
$this->session->set_flashdata('success_msg_create_user', $msg);
$this->session->set_userdata('id_as_doc_user',$id_as_doc_user);
redirect('vendedor');
}


public function newUserNotification(){
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
$user_id =$this->session->userdata('user_id');
$vendedor_name =$this->session->userdata('vendedor_name');
$msg ="
<html>
<body style='font-family: 'Playfair Display', serif;color:red'>
A NEW USER HAS BEEN ADDED To GICRE BY VENDEDOR: $vendedor_name <br/>
<strong>User ID : $user_id</strong><br/>
<strong>User Name : $user_name</strong><br/>
<strong>User Perfil : $user_perfil</strong>
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


}