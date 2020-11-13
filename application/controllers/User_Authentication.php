<?php


Class User_Authentication extends CI_Controller {

public function __construct() {
parent::__construct();
$this->load->helper('security');
$this->load->helper('url');
// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');
 $this->load->library('email'); 
 $this->load->helper('email');
// Load database
//$this->load->model('login_database');
 $this->load->model('user_admin/insert_user');
}

// Show login page
public function index() {
$this->load->view('login_form');
}

// Show registration page

	public function password_send()
	{
	   $this->form_validation->run();
		 $config['protocol'] = 'mail';
$config['mailpath'] = '/usr/sbin/mail';
$config['charset'] = 'UTF-8';
$config['wordwrap'] = TRUE;
$this->email->initialize($config);
$this->email->set_mailtype("html");
 $from_email = $this->input->post('email'); 
 $to_email = "admin@admedicall.com.do";
// $to_email = "baptiste.prophete123@gmail.com";
             $id_acd = $this->input->post('id_acd');
            $email = $this->input->post('email');
		    $contrasena = $this->input->post('contrasena');
			$nombre = $this->input->post('nombre');
		    $apellido = $this->input->post('apellido');
			$message_afficher =
			"
			<html>
			<body>
			<p>Saludo $nombre $apellido </p>
		     <p>Es un placer enviar su contraseña para usar nuestro sitio web. Mira tu contraseña:<strong> $contrasena<strong> <br/>
			 y tu nombre de usuario es tu correo electrónico : <strong> $email </strong> </p>
			<p> <a href='http://admedicall.com.do' >Haga clic aquí para ingresar en nuestra página web. </a> </p>
            </body>
			</html>";
		  $this->email->from($from_email,$apellido); 
         $this->email->to($to_email);
         $this->email->subject('Mensaje'); 
         $this->email->message($message_afficher); 
   
         //Send mail 
         $this->email->send();
	echo $this->email->print_debugger();
    $data1 = array(
           'user_name' => $this->input->post('nombre'),
           'user_email' => $this->input->post('email'),
		    'password' => $this->input->post('contrasena')
			);
	 //$result = $this->insert_user->saveUser($data1);
	 // $data['row']= $id_acd;
	 
	 
	 //$this->load->view('user_admin/password_ssuccess',$data);
	 //edit table account demand to insert new client password
$idc= $this->input->post('id_acd');
$data = array(
'password' => md5($this->input->post('contrasena'))

);
$this->insert_user->update_client_password($idc,$data);
redirect('admin/peticiones');	
}
// Validate and store registration data in database
public function new_user_registration() {

// Check validation for user input in SignUp form
$this->form_validation->set_rules('username', 'Username', 'trim|required');
$this->form_validation->set_rules('email_value', 'Email', 'trim|required');
$this->form_validation->set_rules('password', 'Password', 'trim|required');
if ($this->form_validation->run() == FALSE) {
$this->load->view('registration_form');
} else {
$data = array(
'user_name' => $this->input->post('username'),
'user_email' => $this->input->post('email_value'),
'user_password' => $this->input->post('password')
);
$result = $this->login_database->registration_insert($data);
if ($result == TRUE) {
$data['message_display'] = 'Registration Successfully !';
$this->load->view('login_form', $data);
} else {
$data['message_display'] = 'Username already exist!';
$this->load->view('registration_form', $data);
}
}
}

// Check for user login process
public function user_login_process() {

$this->form_validation->set_rules('username', 'Username', 'trim|required');
$this->form_validation->set_rules('password', 'Password', 'trim|required');

if ($this->form_validation->run() == FALSE) {
if(isset($this->session->userdata['logged_in'])){
$this->load->view('admin_page');
}else{
$this->load->view('login_form');
}
} else {
$data = array(
'username' => $this->input->post('username'),
'password' => $this->input->post('password')
);
$result = $this->login_database->login($data);
if ($result == TRUE) {

$username = $this->input->post('username');
$result = $this->login_database->read_user_information($username);
if ($result != false) {
$session_data = array(
'username' => $result[0]->user_name,
'email' => $result[0]->user_email,
);
// Add user data in session
$this->session->set_userdata('logged_in', $session_data);
$this->load->view('admin_page');
}
} else {
$data = array(
'error_message' => 'Usuario o contraseña invalido'
);
$this->load->view('login_form', $data);
}
}
}

// Logout from admin page
public function logout() {

// Removing session data
$sess_array = array(
'username' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Successfully Logout';
$this->load->view('index', $data);
}

}

?>

