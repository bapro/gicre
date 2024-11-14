 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SendEmailToUsers extends CI_Controller {

public function __construct()
{
parent::__construct();

$this->load->model('model_admin'); 
$this->load->library('session');

 $this->load->library('email');
 $this->load->helper('email');

}
 
function check_correo()
{
$correo = $this->input->post('correo');
$rslt=$this->db->select('id_user')->where('correo',$correo)->get('users');
$num=$rslt->num_rows();
if($num == 1){
$user=$this->db->select('id_user,name')->where('correo',$correo)->get('users')->row_array();
$user_name=$user['name'];
$chars = "01234567989-";
$codigo_seguriad = substr( str_shuffle( $chars ), 0, 8 );

	$save = array(
   'codigo_seguriad' =>md5($codigo_seguriad)
  );
$this->model_admin->DeactivarUser($user['id_user'],$save);

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
Saludos Sr(a).  <span style='text-transform:uppercase'><strong>$user_name</strong></span><br/> <br/>
Para cambiar su contraseña entra el codigo siguiente : <br/>
<br>
<h3>:CODIGO DE SECURIDAD : <span style='color:blue'>$codigo_seguriad</span></h3>
<br/><br/><br/>
Atentamente,<br/>
GICRE
</body>
</html>";


$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to($correo);// change it to yours
$this->email->subject('Codigo de seguridad');
$this->email->message($msg);
 if ($this->email->send()) {
	 $response['message'] = "Ingrese el codigo de seguridad que recibiste por correo!"; 
     $response['status'] =  1;	
 } else {
			 $response['message'] =  "Failed to send email";
			 $response['status'] = 2;
            show_error($this->email->print_debugger());
        }

}else{
$response['message'] = "ese Correo electronica no esta enregistrado!"; 
$response['status'] =  3;
}
	
echo json_encode($response);	
}







public function send_security_code_to_user_after_registration($user_email,$codigo_seguriad,$user_name){
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
Saludos Sr(a).  <span style='text-transform:uppercase'><strong>$user_name</strong></span><br/> <br/>
Para cambiar su contraseña entra el codigo siguiente : <br/>
<br>
<h3>:CODIGO DE SECURIDAD : <span style='color:blue'>$codigo_seguriad</span></h3>
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
$this->email->subject('Codigo de seguridad');
$this->email->message($msg);
 if ($this->email->send()) {
	 $response['message'] = "Your Email has successfully been sent!"; 
     $response['status'] =  0;	
 } else {
			 $response['message'] =  "Failed to send email";
			 $response['status'] = 2;
            show_error($this->email->print_debugger());
        }

}




}