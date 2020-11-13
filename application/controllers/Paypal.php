<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends CI_Controller{
	
	 function  __construct(){
		parent::__construct();
		
		// Load paypal library & product model
		$this->load->library('paypal_lib');
		$this->load->model('product');
		$this->load->model('model_admin');
		$this->load->model('login_model');
		$this->load->library('session');
	 }
	 
 function cancel(){
		// Load payment failed view
		$this->load->view('paypal/cancel');
	 }
	 
	 function ipn(){
		// Paypal posts the transaction data
		$paypalInfo = $this->input->post();
		
		if(!empty($paypalInfo)){
			// Validate and get the ipn response
			$ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
           // Check whether the transaction is valid
			if($ipnCheck){
			 $data = array(
			 'id_doctor' =>$paypalInfo["custom"],
			'product_id' =>$paypalInfo["item_number"],
			'txn_id' =>$paypalInfo["txn_id"],
			'payment_gross' =>$paypalInfo["mc_gross"],
			'currency_code' =>$paypalInfo["mc_currency"],
			'payer_email' =>$paypalInfo["payer_email"],
			'payment_status' =>$paypalInfo["payment_status"],
			'payment_time' =>date("Y-m-d H:i:s")
			);
			$this->db->insert("payments",$data);
			$payment_id=$this->db->insert_id();

		$update = array(
		'plazo' =>date("Y-m-d")
		);
  
		$where = array(
		'id_user' =>$paypalInfo["custom"]
		);

		$this->db->where($where);
		$this->db->update("users",$update);
				
			}
		}
    }
	
	
	
function success(){
	$id_doc= $this->session->userdata['id_doc'];
	if(empty($this->session->userdata['id_doc'])){
      redirect('/page404');
     }
	$this->load->view('navigation/header');
	$user=$this->db->select('correo,payment_plan')->where('id_user',$id_doc)->get('users')->row_array();
	$data['product']=$this->db->select('plan,precio')->where('id',$user['payment_plan'])->get('medico_precio_plan')->row_array();
   $data['id_doc']= $id_doc;
    $data['correo']= $user['correo'];
$this->load->view('medico/user/new-account-created', $data);
}

//--------------------------------MEDICO DEBE PAGAR PARA SEGUIR USANDO EL SERVICIO--------------------------------------------------------------------------

	function doctor_account_payment_($id_doctor,$id_plan){
		$this->session->set_userdata('id_doctor',$id_doctor);
		$this->session->set_userdata('id_plan',$id_plan);
		redirect("paypal/doctor_account_payment");
	}
	

	
    function doctor_account_payment(){
		$id_doctor =$this->session->userdata('id_doctor');
		$id_plan =$this->session->userdata('id_plan');
		
		if(empty($id_doctor)){
		redirect('/page404');
		}
		
		$this->load->view('navigation/header');
		$doctor=$this->db->select('name,area,plazo,cuenta_gratis,payment_plan')->where('id_user',$id_doctor)->get('users')->row_array();
		$data['doctor']=$doctor;
		$data['doctor_name']=$doctor['name'];
		 $data['title_area']=$this->db->select('title_area')->where('id_ar',$doctor['area'])->get('areas')->row('title_area');
		$data['id_doctor']=$id_doctor;
		 $sql2 ="SELECT * FROM  medico_precio_plan WHERE id=$id_plan";
         $data['query2']= $this->db->query($sql2);
		 $data['especialidades'] = $this->model_admin->getEspecialidades();
		 $sql ="SELECT * FROM  users WHERE id_user=$id_doctor";
         $data['query']= $this->db->query($sql);
		 //---------------------------------------------------------------
		$this->load->view('paypal/payment-medico', $data);
		$this->load->view('navigation/footer');
	 }

public function update_account_doctor(){
	
$data = array(
   'payment_plan' => $this->input->post('plan-pago')
 );
  
$where = array(
'id_user' =>$this->input->post('id_doctor')
);

$this->db->where($where);
$this->db->update("users",$data);	
redirect($_SERVER['HTTP_REFERER']);	
}

//------------------------------------------------------------------------------------------------------------

 function createDocPass(){
$id= $this->input->post('id_user');
$username= $this->input->post('username');
$pass=$this->input->post('pass1');
$data = array(
  'password' => md5($pass),
  'inserted_by' => $this->input->post('id_user'),
  'insert_date' => date("Y-m-d H:i:s"),
  'updated_by' => $this->input->post('id_user'),
  'update_date' => date("Y-m-d H:i:s")
  );
$this->model_admin->DeactivarUser($id,$data);

$this->session->set_userdata('id_us',$id);
redirect("paypal/login");
}	


 function login(){
	 $id_us= $this->session->userdata['id_us'];

  
$this->load->library('user_agent');


$userInfo=$this->db->select('username,password')->where('id_user',$id_us)->get('users')->row_array();
//$this->session->set_userdata('id_us',$id_us);
$username = $userInfo['username'];
$password = $userInfo['password'];

$is_valid = $this->login_model->validate($username, $password);


if($is_valid)
{
$get_id = $this->login_model->get_id($username, $password);                

foreach($get_id as $val)
{
//$getloc = json_decode(file_get_contents("http://ipinfo.io/"));
$save = array(
'ip'  =>$this->input->ip_address(),
//'location'  =>$getloc,
'OpeSys'  =>$this->agent->platform(),
'Browser'  =>$this->agent->browser(),
'user_id'  =>$val->id_user,
'browser_v'  =>$this->agent->version(),
'date_time'  =>date("Y-m-d H:i:s")
);
$this->db->insert("current_user_info",$save);


$id=$val->id_user;
$name = $val->name; 
$last_name = $val->last_name;
$perfil=$val->perfil;





if($perfil=='Medico')
{

$data = array(
'medico_id'=>$id,
'medico_name' =>$name,
'medico_perfil'=>$perfil,
'medico_is_logged_in' => true
);
$this->session->set_userdata($data); 


$save = array(
'user_id'=>$id,'login_time'=>date("Y-m-d H:i:s"),'dateo'=>date("Y-m-d")
); 
$this->login_model->user_login_twice($save);

$dataLogIn = array(
'is_log_in'=>1,
'login_time'=>date("Y-m-d H:i:s"),
'last_login_time'=>date("Y-m-d H:i:s")
);

$this->login_model->is_user_login($id,$dataLogIn);
$this->session->unset_userdata('id_doc');

$this->sendEmailToUs($id_us);
redirect('medico');
}


}       


}
else // incorrect username or password
{

$mes=' <span style="color:red">¡ Usuario o contraseña incorrectos !</span>';
$this->session->set_flashdata('msg_pass_ac', $mes);
redirect('login');
}

}


public function sendEmailToUs($id_doc){

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






	
	
}