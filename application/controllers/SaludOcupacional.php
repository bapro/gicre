<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SaludOcupacional extends CI_Controller {

public function __construct()
{
parent::__construct();

$this->load->model('login_model'); 
$this->load->library('session');



}
/*
*Showing  Login page here 
*/
function index()
{
$dat=$this->db->select('dateo')->where('dateo',date("Y-m-d"))->get('user_login_twice')->row('dateo');
if($dat==""){
$this->db->empty_table('ci_sessions'); 
$this->db->empty_table('user_login_twice');
$this->db->empty_table('current_user_info');
$updateData = array(
'is_log_in'  =>0,
'login_time' =>'');
$this->db->update("users",$updateData); 			
}
$this->load->view('login_form_salud_ocupacional');  
// $this->load->view('index'); 
}


/**
* check the username and the password with the database
* @return void
*/

function validate()
{  
$this->load->library('user_agent');

$username = $this->input->post('username');
$password = md5($this->input->post('password'));

$id_us=$this->db->select('id_user')->where('password',$password)->where('username',$username)->get('users')->row('id_user');
$this->session->set_userdata('id_us',$id_us);


$is_valid = $this->login_model->validate($username, $password);


if($is_valid)/*If valid username and password set */
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



if($perfil=='Medico'  || $perfil=='Asistente Medico')
{

$data = array(
'medico_id'=>$id,
'medico_name' =>$name,
'medico_perfil'=>$perfil,
'medico_is_logged_in' => true
);
$this->session->set_userdata($data); /*Here  setting the  staff datas values in session */


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
redirect('medico');
}
 


}       


}
else // incorrect username or password
{

$mes=' <span style="color:red">¡ Usuario o contraseña incorrectos !</span>';
$this->session->set_flashdata('msg_pass_ac', $mes);
redirect('saludOcupacional');
}

}




public function medico_logout()
{
	 if($this->session->userdata('id_us')=='')
    {
     redirect('login');
	}
$dataLogOut = array(
'is_log_in'=>0,
'login_time'=>"",
'last_login_time'=>date("Y-m-d H:i:s")
);
$this->login_model->user_logout($this->session->userdata['id_us'],$dataLogOut);
$this->login_model->user_login_twice_remove($this->session->userdata['id_us']); 

$where = array(
'user_id' =>$this->session->userdata['id_us']
);

$this->db->where($where);
$this->db->delete('current_user_info');

$array_items = array(   

'medico_name',
'medico_password' ,
'medico_perfil',
'medico_id',
'medico_is_logged_in'
);

$this->session->unset_userdata($array_items);
$this->session->sess_destroy();
$this->session->set_flashdata('msg', 'Medico Signed Out Now!');
redirect('saludOcupacional');

}






}    
